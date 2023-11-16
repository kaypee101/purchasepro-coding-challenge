<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $catalogList  = [
            'Chair',
            'Table',
            'Cabinet',
            'Drawer',
        ];

        foreach ($catalogList as $catalog) {
            Catalog::create([
                'name' => $catalog,
            ]);
        }
    }
}
