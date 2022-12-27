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
      $table->id();
      $table->string('name');
      $table->boolean('is_disposable');
      $table->integer('stock', false);
      $table->text('description')->nullable();
      $table->string('condition');
      $table->string('usage_permission');
      $table->string('work_unit');
      $table->boolean('is_active')->default(true);
      $table->foreignId('category_id')->constrained('categories', 'id');
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
