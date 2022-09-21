<?php

namespace App\Imports;

use App\Helpers\Helper;
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

class PlantasImport implements ToCollection, WithUpserts, WithUpsertColumns, WithStartRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            //Log::error($row);

            $nome_botanico = Helper::parseNomeBotanico($row[0]);
            Log::error($nome_botanico);

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
            $persistencia = Helper::parsePersistencia($row[14], $row[15], $row[16]);
            $tempo_crescimento = Helper::parseTempoCrescimento($row[17]);
            $densidade= Helper::parseDensidade($row[18]);


            if( !empty($nome_botanico) &&
                !empty($categoria) &&
                !empty($curiosidades) &&
                !empty($notas) &&
                !empty($tempo_crescimento) &&
                !empty($nome_comum) &&
                !empty($cor_sintese) &&
                !empty($luz) &&
                !empty($persistencia) &&
                !empty($estacao)
            ) {


                Planta::create([
                    'abreviatura' => $abreviatura,
                    'nome_botanico' => $nome_botanico,
                    'curiosidades' => $curiosidades,
                    'notas' => $notas,
                    'tempo_crescimento' => $tempo_crescimento,
                    'nome_comum' => $nome_comum,
                    'cor_sintese' => $cor_sintese,
                    'luz' => $luz,
                    'persistencia' => $persistencia,
                    'estacao' => $estacao,

                ]);
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
