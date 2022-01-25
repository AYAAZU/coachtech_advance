<?php

namespace App\Imports;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShopsImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable;
    public function model(array $row)
    {
        return new Shop([
            'area_id' => $row['area_id'],
            'genre_id' => $row['genre_id'],
            'name' => $row['name'],
            'kana' => $row['kana'],
            'info' => $row['info'],
            'image' => $row['image'],
        ]);
    }
}
