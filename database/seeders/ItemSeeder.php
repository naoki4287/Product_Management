<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('items')->insert([
      'product_name' => 'コーラ',
      'arrival_source' => 'テスト入荷元1',
      'manufacturer' => 'テスト製造元1',
      'price' => 100,
    ]);

    DB::table('items')->insert([
      'product_name' => 'フライドポテト',
      'arrival_source' => 'テスト入荷元2',
      'manufacturer' => 'テスト製造元2',
      'price' => 50,
    ]);
  
    DB::table('items')->insert([
      'product_name' => 'フライドチキン',
      'arrival_source' => 'テスト入荷元3',
      'manufacturer' => 'テスト製造元3',
      'price' => 150,
    ]);
  
    DB::table('items')->insert([
      'product_name' => 'ハンバーガー',
      'arrival_source' => 'テスト入荷元4',
      'manufacturer' => 'テスト製造元4',
      'price' => 70,
    ]);
  
    DB::table('items')->insert([
      'product_name' => 'オレンジジュース',
      'arrival_source' => 'テスト入荷元5',
      'manufacturer' => 'テスト製造元5',
      'price' => 60,
    ]);
  
    DB::table('items')->insert([
      'product_name' => 'ティッシュ',
      'arrival_source' => 'テスト入荷元6',
      'manufacturer' => 'テスト製造元6',
      'price' => 80,
    ]);
  
  }
}
