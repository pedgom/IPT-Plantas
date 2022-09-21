<?php

namespace App\Imports;

use App\Helpers\Helper;
use App\Models\FamiliaAtributo;
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




    private static function plantaRules(){
        $rules = [
            'nome_botanico'=>'required|string|min:3|max:255',
            'categoria'=> 'required|integer|exists:categoria_atributos,id',
            'familia'=>'required|string|min:3|max:255',
            'altura'=>'required|integer|exists:altura_atributos,id',
            'diametro'=>'required|integer|exists:diametro_atributos,id',
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
        foreach ($rows as $row)
        {


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

            $result=Helper::validateFakeRequest($request, self::plantaRules());

            if($result['success']){
                $validatedAttributes = $result['validated'];
                $exists=FamiliaAtributo::where('familia', $validatedAttributes['familia'])->exists();

                if(!$exists){

                    $familia = FamiliaAtributo::create(['familia'=>$validatedAttributes['familia']]);
                }

                else {
                   $familia = FamiliaAtributo::where('familia', $validatedAttributes['familia'])->first();
                }

                if(($model = Planta::create($validatedAttributes)) ) {
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
