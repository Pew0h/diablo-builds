<?php

namespace Database\Seeders;

use App\Models\Build;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {


            DB::table('builds')->insert([
                'pseudo' => 'Pewoh#2673',
                'heroId' => '122099471',
                'nom' => 'Wizard build' . $i,
                'user_id' => '1',
                'classe' => 'wizard',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('builds')->insert([
                'pseudo' => 'Pewoh#2673',
                'heroId' => '109291696',
                'nom' => 'Barbarian build' . $i,
                'user_id' => '1',
                'classe' => 'barbarian',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('builds')->insert([
                'pseudo' => 'Pewoh#2673',
                'heroId' => '122099471',
                'nom' => 'necromancer build' . $i,
                'user_id' => '1',
                'classe' => 'necromancer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
