<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = [
            [
                'designacao' => 'Privado'
            ],
            [
                'designacao' => 'Amigo'
            ],
            [
                'designacao' => 'Amigo de amigo'
            ],
            [
                'designacao' => 'Pública'
            ]
        ];

        foreach ($permissoes as $permissao) {
            Permissao::create($permissao);
        }
    }
}
