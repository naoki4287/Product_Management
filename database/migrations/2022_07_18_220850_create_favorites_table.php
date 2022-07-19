<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('favorites', function (Blueprint $table) {
      $table->unsignedBigInteger('id', true);
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('product_id');
      $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
      $table->softDeletes();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('product_id')->references('id')->on('items')->cascadeOnDelete()
      ->cascadeOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('favorites');
  }
};
