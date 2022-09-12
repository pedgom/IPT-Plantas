<?php

namespace App\Imports;

use App\Models\Planta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PlantasImport implements ToCollection, WithUpserts, WithUpsertColumns, WithStartRow, WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $abreviatura = $row[0]?? null;
            $nome_botanico = $row[1]?? null;
            $curiosidades = $row[2]?? null;
            $notas = $row[3]?? null;
            $tempo_crescimento = $row[4]?? null;
            $nome_comum = $row[5]?? null;
            $cor_sintese = $row[6]?? null;
            $luz = $row[7]?? null;
            $persistencia = $row[8]?? null;
            $estacao = $row[9]?? null;

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
