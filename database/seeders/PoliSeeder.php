<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('polis')->insert([
            [
                'poli_code' => 'A',
                'poli_name' => 'Poli Umum',
            ],
            [
                'poli_code' => 'B',
                'poli_name' => 'Poli Gigi',
            ],
            [
                'poli_code' => 'C',
                'poli_name' => 'Poli Anak',
            ]
        ]);
    }
}
