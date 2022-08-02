<?php

namespace Database\Seeders;

use App\Models\Log;
use App\Models\Shipping;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // seederを使う場合
    $this->call([
      // UserSeeder::class,
      ItemSeeder::class,
      LogSeeder::class
    ]);

    // factoryを使う場合
    User::factory(3)->create();
    Shipping::factory(18)->create();
  }
}
