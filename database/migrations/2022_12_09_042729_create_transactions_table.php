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
    Schema::create('transactions', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('recipient_name', '75');
      $table->integer('quantity', false);
      $table->string('placement_location');
      $table->date('date');
      $table->string('status', 15);
      $table->foreignUuid('user_id')->constrained();
      $table->foreignUuid('item_id')->constrained();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('transactions');
  }
};
