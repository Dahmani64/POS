<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Product, Category};
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // Product::factory(10)->create();
/*
        Category::factory()
        ->has(Product::factory()->count(4))
        ->count(10)
        ->create();
        */
       for($i=1;$i<9;$i++)
       {
            DB::table('categories')->insert(['name' => 'Categ_'.$i , 'created_at' => now()]);
           
            for($j=1;$j<25;$j++)
            {
                DB::table('products')->insert(
                   [            
                    'name' => 'Prdct_'.$i.'_'.$j,
                    'price' => rand(1,10),
                    'category_id' => $i,
                    'created_at' => now()
                  ]
               );
            }
       }
       
        DB::table('serveurs')->insert([
            ['nom' => 'Salah','role'=>'serveur', 'created_at' => now()],
            ['nom' => 'Sami','role'=>'serveur', 'created_at' => now()],
            ['nom' => 'Salem','role'=>'serveur', 'created_at' => now()]
        ]);
       
        


    }
}