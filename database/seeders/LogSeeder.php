<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('logs')->insert([
      'email' => 'syogo@gmail.com',
      'tel' => '08011112222',
      'information' => '7/1にsyogo@gmail.comが商品登録を実施',
    ]);
    
    DB::table('logs')->insert([
      'email' => 'kenta@gmail.com',
      'tel' => '08033332222',
      'information' => '7/1にkenta@gmail.comが商品登録を実施',
    ]);

    DB::table('logs')->insert([
      'email' => 'syun@gmail.com',
      'tel' => '08044442222',
      'information' => '7/1にsyun@gmail.comが商品登録を実施',
    ]);

    DB::table('logs')->insert([
      'email' => 'naoya@gmail.com',
      'tel' => '08055552222',
      'information' => '7/1にnaoya@gmail.comが商品登録を実施',
    ]);

    DB::table('logs')->insert([
      'email' => 'hiroyuki@gmail.com',
      'tel' => '08066662222',
      'information' => '7/1にhiroyuki@gmail.comが商品登録を実施',
    ]);

    DB::table('logs')->insert([
      'email' => 'takuya@gmail.com',
      'tel' => '08077772222',
      'information' => '7/1にtakuya@gmail.comが商品登録を実施',
    ]);

  }
}
