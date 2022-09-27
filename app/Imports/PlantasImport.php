<?php

namespace App\Imports;

use App\Helpers\Helper;
use App\Models\FamiliaAtributo;
use App\Models\FormaArbustoAtributo;
use App\Models\FormaArvoreAtributo;
use App\Models\FormaHerbaceaAtributo;
use App\Models\Planta;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Http\Request;

class PlantasImport implements ToCollection, WithUpserts, WithUpsertColumns, WithStartRow
{
    use Importable;



    //rules criadas para cada atributo
    private static function plantaRules(){
        $rules = [
            'nome_botanico'=>'required|string|min:3|max:255',
            'categoria'=> 'required|integer|exists:categoria_atributos,id',
            'familia'=>'required|string|min:3|max:255',
            'altura'=>'required|array|min:1',
            'diametro'=>'required|array|min:1',
            'persistencia' => 'required|integer|exists:persistencia_atributos,id',
            'cor_sintese'=> 'required|integer|exists:cor_sintese_atributos,id',
            'estacao'=>'required|array|min:4',
            'luz'=> 'required|array|min:1',
            'solo'=>'required|array|min:1',
            'agua'=>'required|array|min:1',
            'resistencia'=>'required|array|min:1',
            'tempo_crescimento'=>'required|string|min:3|max:255',
            'densidade'=>'required|array|min:1'


        ];

        return $rules;
    }



    public function collection(Collection $rows)
    {
        ini_set('memory_limit', '512M');

        foreach ($rows as $row)
        {
            //variáveis que irão chamar a função parse de cada atributo

            $nome_botanico = Helper::parseNomeBotanico($row[0]);
            $categoria = Helper::parseCategoria($row[1]);
            $familia = Helper::parseFamilia($row[2]);
            $altura = Helper::parseAltura($row[3]);
            $diametro = Helper::parseDiametro($row[4]);;
            $persistencia = Helper::parsePersistencia($row[5]);
            $cor_sintese = Helper::parseCorSintese($row[7]);
            $estacao = Helper::parseEstacao($row[8]);
            $luz = Helper::parseLuz($row[9]);
            $solo = Helper::parseSolo($row[12]);
            $agua = Helper::parseAgua($row[13]);
            $resistencia = Helper::parseResistencia($row[14], $row[15], $row[16]);
            $tempo_crescimento = Helper::parseTempoCrescimento($row[17]);
            $densidade= Helper::parseDensidade($row[18]);

            //variavel que irá criar um novo request
            $request = new Request();
            $request->merge([
                'nome_botanico'=>$nome_botanico,
                'categoria'=>$categoria,
                'familia'=>$familia,
                'altura'=>$altura,
                'diametro'=>$diametro,
                'persistencia'=>$persistencia,
                'cor_sintese'=>$cor_sintese,
                'estacao'=>$estacao,
                'luz'=>$luz,
                'solo'=>$solo,
                'agua'=>$agua,
                'resistencia'=>$resistencia,
                'tempo_crescimento'=>$tempo_crescimento,
                'densidade'=>$densidade


            ]);
            //variavel que ira chamar a funçao validateFakeRequest para assim validar os dados vindo do excel
            $result=Helper::validateFakeRequest($request, self::plantaRules());


            //if utilizado para caso nao exista o atributo na tabela Familia, este é adicionado à tabela
            if($result['success']){
                $validatedAttributes = $result['validated'];
                $exists=FamiliaAtributo::where('familia', $validatedAttributes['familia'])->exists();

                if(!$exists){

                    $familia = FamiliaAtributo::create(['familia'=>$validatedAttributes['familia']]);
                }

                else {
                   $familia = FamiliaAtributo::where('familia', $validatedAttributes['familia'])->first();
                }

                //atribuição de 'Na' por default em todas as formas
                $forma_herbacea_atributo_id = FormaHerbaceaAtributo::where('forma_herbacea', 'NA')->first()->id;
                $forma_arvore_atributo_id = FormaArvoreAtributo::where('forma_arvore', 'NA')->first()->id;
                $forma_arbusto_atributo_id = FormaArbustoAtributo::where('forma_arbusto', 'NA')->first()->id;


                $validatedAttributes['forma_herbacea_atributo_id'] = $forma_herbacea_atributo_id;

                $validatedAttributes['forma_arvore_atributo_id'] = $forma_arvore_atributo_id;

                $validatedAttributes['forma_arbusto_atributo_id'] = $forma_arbusto_atributo_id;

                $validatedAttributes['persistencia_atributo_id']= $validatedAttributes['persistencia'];
                unset($validatedAttributes['persistencia']);

                //$validatedAttributes['ordem_atributo_id']= $validatedAttributes['ordem'];
                //unset($validatedAttributes['ordem']);

                $validatedAttributes['familia_atributo_id'] = $familia->id;
                unset($validatedAttributes['familia']);


                //$validatedAttributes['genero_atributo_id']= $validatedAttributes['genero'];
                //unset($validatedAttributes['genero']);

               // $validatedAttributes['forma_arbusto_atributo_id']= $validatedAttributes['forma_arbusto'];
                //unset($validatedAttributes['forma_arbusto']);

                //$validatedAttributes['uso_atributo_id']= $validatedAttributes['uso'];
                //unset($validatedAttributes['uso']);

                //$validatedAttributes['origem_relacao_atributo_id']= $validatedAttributes['origem_relacao'];
                //unset($validatedAttributes['origem_relacao']);

                //$validatedAttributes['forma_arvore_atributo_id']= $validatedAttributes['forma_arvore'];
                //unset($validatedAttributes['forma_arvore']);

                //$validatedAttributes['colecao_atributo_id']= $validatedAttributes['colecao'];
                //unset($validatedAttributes['colecao']);


                //$validatedAttributes['forma_herbacea_atributo_id']= $validatedAttributes['forma_herbacea'];
                //unset($validatedAttributes['forma_herbacea']);

                $validatedAttributes['cor_sintese_atributo_id']= $validatedAttributes['cor_sintese'];
                unset($validatedAttributes['cor_sintese']);

                $arr = self::parseValues($validatedAttributes);
                Log::info($arr);

                if(($model = Planta::updateOrCreate(['nome_botanico'=>$validatedAttributes['nome_botanico']], $arr)) ) {


                    $model->alturaAtributos()->sync($validatedAttributes['altura']);
                    Log::info($validatedAttributes['altura']);
                    $model->categoriaAtributos()->sync($validatedAttributes['categoria']);
                    Log::info($validatedAttributes['categoria']);
                    $model->luzAtributos()->sync($validatedAttributes['luz']);
                    Log::info($validatedAttributes['luz']);
                    $model->diametroAtributos()->sync($validatedAttributes['diametro']);
                    Log::info($validatedAttributes['diametro']);
                    $model->densidadeAtributos()->sync($validatedAttributes['densidade']);
                    Log::info($validatedAttributes['densidade']);
                    $model->aguaAtributos()->sync($validatedAttributes['agua']);
                    Log::info($validatedAttributes['agua']);
                    $model->resistenciaAtributos()->sync($validatedAttributes['resistencia']);
                    Log::info($validatedAttributes['resistencia']);
                    $model->soloAtributos()->sync($validatedAttributes['solo']);
                    Log::info($validatedAttributes['solo']);
                    //$model->phSoloAtributos()->sync($validatedAttributes['ph_solo']);
                    $model->estacaoAtributos()->sync($validatedAttributes['estacao']);
                    Log::info($validatedAttributes['estacao']);
                }
            }




        }
    }

    private function parseValues( $validatedAttributes){



        $array = [];
        $validKeys = [

            'categoria',
            'familia',
            'altura',
            'diametro',
            'persistencia',
            'cor_sintese',
            'estacao',
            'luz',
            'solo',
            'agua',
            'resistencia',
            'tempo_crescimento',
            'densidade',
            'forma_herbacea_atributo_id',
            'forma_arvore_atributo_id',
            'forma_arbusto_atributo_id',
            'persistencia_atributo_id',
            'familia_atributo_id',
            'cor_sintese_atributo_id'
        ];
        foreach($validatedAttributes as $key => $value){
            if(in_array($key, $validKeys) && !empty($value)){
                $array[$key] = $value;
            }
        }
        return $array;

    }

    public function startRow(): int
    {
        return 2;
    }

    public function upsertColumns()
    {

    }

    public function uniqueBy()
    {

    }
}
