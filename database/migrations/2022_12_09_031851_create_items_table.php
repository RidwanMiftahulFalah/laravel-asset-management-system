<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('items', function (Blueprint $table) {
      $table->uuid('id')->primary();
      // $table->string('qr_code', '25')->unique();
      $table->string('name', 100);
      $table->boolean('is_disposable');
      $table->integer('stock', false);
      $table->text('description')->nullable();
      $table->string('condition', 20);
      $table->string('usage_permission', 20);
      $table->boolean('is_active')->default(true);
      $table->foreignUuid('category_id')->constrained();
      $table->foreignUuid('work_unit_id')->constrained();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('items');
  }
};
