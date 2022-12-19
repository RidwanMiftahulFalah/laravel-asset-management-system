<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    User::create([
      'name' => 'Endang Wilhelmina',
      'phone' => '081234567891',
      'email' => 'endang@gmail.com',
      'password' => bcrypt('123')
    ]);

    Category::create([
      'name' => 'Elektronik'
    ]);

    Item::create([
      'name' => 'Projector',
      'stock' => 12,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'status' => 'Layak Pakai',
      'category_id' => 1
    ]);

    Transaction::create([
      'recipient_name' => 'Maman Sutisna',
      'recipient_classroom' => '9L',
      'quantity' => 2,
      'checkout_date' => Carbon::now(),
      'status' => 'Pending',
      'user_id' => 1,
      'item_id' => 1
    ]);
  }
}
