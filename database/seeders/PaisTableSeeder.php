<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            [
                'nome' => 'Angola'
            ],
            [
                'nome' => 'África do Sul'
            ],
            [
                'nome' => 'República Democrática do Congo'
            ]
        ];

        foreach ($paises as $pais) {
            Pais::create($pais);
        }
    }
}
