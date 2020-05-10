<?php

use Illuminate\Database\Seeder;

class StoreTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-1.png",
            'store_type'=>"Men Garments",
            'slug'=>\Illuminate\Support\Str::slug("Men Garments"),

        ]);

        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-2.png",
            'store_type'=>"Ladies Garments",
            'slug'=>\Illuminate\Support\Str::slug("Ladies Garments"),

        ]);

        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-3.png",
            'store_type'=>"Child Garments",
            'slug'=>\Illuminate\Support\Str::slug("Child Garments"),

        ]);

        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-4.png",
            'store_type'=>"Shoes",
            'slug'=>\Illuminate\Support\Str::slug("Shoes"),

        ]);

        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-5.png",
            'store_type'=>"Watches",
            'slug'=>\Illuminate\Support\Str::slug("Watches"),

        ]);



        \App\StoreType::create([
            'image'=>"uploads/store_types/btn-6.png",
            'store_type'=>"Mobile And Other Accessories",
            'slug'=>\Illuminate\Support\Str::slug("Mobile And Other Accessories"),

        ]);
    }
}
