<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = [
            [
                'nome' => 'Bengo',
                'pais_id' => 1
            ],
            [
                'nome' => 'Benguela',
                'pais_id' => 1
            ],
            [
                'nome' => 'Bié',
                'pais_id' => 1
            ],
            [
                'nome' => 'Cabinda',
                'pais_id' => 1
            ],
            [
                'nome' => 'Cuando Cubango',
                'pais_id' => 1
            ],
            [
                'nome' => 'Cuanza Norte',
                'pais_id' => 1
            ],
            [
                'nome' => 'Cuanza Sul',
                'pais_id' => 1
            ],
            [
                'nome' => 'Cunene',
                'pais_id' => 1
            ],
            [
                'nome' => 'Eastern Cape',
                'pais_id' => 2
            ],
            [
                'nome' => 'Free State',
                'pais_id' => 2
            ],
            [
                'nome' => 'Gauteng',
                'pais_id' => 2
            ],
            [
                'nome' => 'Huambo',
                'pais_id' => 1
            ],
            [
                'nome' => 'Huíla',
                'pais_id' => 1
            ],
            [
                'nome' => 'KwaZulu-Natal',
                'pais_id' => 2
            ],
            [
                'nome' => 'Limpopo',
                'pais_id' => 2
            ],
            [
                'nome' => 'Luanda',
                'pais_id' => 1
            ],
            [
                'nome' => 'Lunda Norte',
                'pais_id' => 1
            ],
            [
                'nome' => 'Lunda Sul',
                'pais_id' => 1
            ],
            [
                'nome' => 'Malanje',
                'pais_id' => 1
            ],
            [
                'nome' => 'Moxico',
                'pais_id' => 1
            ],
            [
                'nome' => 'Mpumalanga',
                'pais_id' => 2
            ],
            [
                'nome' => 'Namibe',
                'pais_id' => 1
            ],
            [
                'nome' => 'North-West',
                'pais_id' => 2
            ],
            [
                'nome' => 'Northern Cape',
                'pais_id' => 2
            ],
            [
                'nome' => 'Uíge',
                'pais_id' => 1
            ],
            [
                'nome' => 'Western Cape',
                'pais_id' => 2
            ],
            [
                'nome' => 'Zaire',
                'pais_id' => 1
            ]
        ];

        foreach ($cidades as $cidade) {
            Cidade::create($cidade);
        }
    }
}
