<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogList = Catalog::get();

        foreach ($catalogList as $catalog) {
            for ($i = 0; $i < 5; $i++) {
                Product::create([
                    'name' => $catalog->name . "_Item_" . ($i + 1),
                    'catalog_id' => $catalog->id,
                    'quantity' => 10
                ]);
            }
        }
    }
}
