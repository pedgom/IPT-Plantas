<?php

namespace App\Imports;

use App\Models\Planta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
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
            Planta::create([
                'abreviatura' => $row[1],
                'nome_botanico' => $row[2],
                'curiosidades' => $row[3],
                'notas' => $row[4],
                'tempo_crescimento' => $row[5],
                'nome_comum' => $row[6],
                'cor_sintese' => $row[7],
                'luz' => $row[8],
                'persistencia' => $row[9],
                'estacao' => $row[10]

            ]);
        }
    }

    public function startRow(): int
    {
        return 5;
    }

    public function upsertColumns()
    {

    }

    public function uniqueBy()
    {

    }
}
