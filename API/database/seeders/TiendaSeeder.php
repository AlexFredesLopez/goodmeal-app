<?php

namespace Database\Seeders;

use App\Models\Tienda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiendas = [
            [
                'nombre' => "Tienda 1",
                'direccion' => "Calle falsa 123",
                'telefono' => "+56911111111",
                'horario_retiro' => "12:00 - 24:00"
            ],
            [
                'nombre' => "Tienda 2",
                'direccion' => "Calle falsa 456",
                'telefono' => "+56922222222",
                'horario_retiro' => "11:00 - 23:00"
            ],
            [
                'nombre' => "Tienda 3",
                'direccion' => "Calle falsa 789",
                'telefono' => "+5693333333",
                'horario_retiro' => "14:00 - 20:00"
            ],
        ];

         foreach ($tiendas as $key => $value) {
            Tienda::create($value);
        }
    }
}
