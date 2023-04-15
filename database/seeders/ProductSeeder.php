<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\barang;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = ['Faber castle', 'KYT', 'Adidas', 'Nabati', 'Aqua', 'Maspion', 'Sharp', 'Thosiba', 'Teh Pucuk', 'Cosmos',
                'Supreme', 'KitKat', 'Sedaap', 'Realme', 'Butterfly', '2B', 'Tebs', 'Joyko', 'Gajah Duduk', 'Oppo'];
        $cate = ['Stationery ', 'other', 'Fashion', 'Food', 'other', 'Electronic', 'Electronic', 'Electronic', 'other', 'Electronic', 'Fashion',
                 'Food', 'Food', 'Electronic', 'Stationery ', 'Stationery ', 'other', 'Stationery ', 'Fashion', 'Electronic', ];


        for($i=0; $i<20; $i++){
            DB::table('product')->insert([
                'product_code'=> 'PRD'.rand(001, 100),
                'product_name'=> $brand[$i],
                'product_category' => $cate[$i],
                'price' => rand(1,25)*1000,
                'quantity' => rand(10, 100)
            ]);
        }
    }
}
