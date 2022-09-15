<?php

namespace App\Imports;

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

            $abreviatura = $row[0];
            Log::error($abreviatura);

            $nome_botanico = $row[1];
            Log::error($nome_botanico);

            $curiosidades = $row[2];
            $notas = $row[3];
            $tempo_crescimento = $row[4];
            $nome_comum = $row[5];
            $cor_sintese = $row[6];
            $luz = $row[7];
            $persistencia = $row[8];
            $estacao = $row[9];

            if( !empty($abreviatura) &&
                !empty($nome_botanico) &&
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
