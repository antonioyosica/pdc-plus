<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agente;
use Illuminate\Support\Facades\Hash;

class AgenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agente::create([
            'nome_completo' => 'Root',
            'username' => 'root',
            'email' => 'root@pdc.plus',
            'password' => Hash::make('root.123')
        ]);
    }
}
