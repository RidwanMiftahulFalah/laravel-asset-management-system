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
      $table->id();
      $table->string('recipient_name', '75');
      $table->string('recipient_classroom', '10');
      $table->integer('quantity', false);
      $table->date('checkout_date');      
      $table->string('status', 15);
      $table->foreignId('user_id')->constrained('users', 'id');
      $table->foreignId('item_id')->constrained('items', 'id');
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