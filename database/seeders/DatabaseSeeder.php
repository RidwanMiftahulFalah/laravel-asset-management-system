<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WorkUnit;
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
      'name' => 'Elektronik',
      'is_active' => 1
    ]);

    Category::create([
      'name' => 'Alat Tulis Kantor',
      'is_active' => 1
    ]);

    WorkUnit::create([
      'name' => 'Rekayasa Perangkat Lunak',
      'is_active' => 1
    ]);

    WorkUnit::create([
      'name' => 'Teknik Komputer Jaringan',
      'is_active' => 1
    ]);

    Item::create([
      'name' => 'Projector',
      'is_disposable' => 0,
      'stock' => 1,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Siswa',
      'is_active' => 1,
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Item::create([
      'name' => 'Kabel',
      'is_disposable' => 1,
      'stock' => 12,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Siswa',
      'is_active' => 1,
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Item::create([
      'name' => 'Laptop',
      'is_disposable' => 0,
      'stock' => 1,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Siswa',
      'is_active' => 0,
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Item::create([
      'name' => 'Mouse',
      'is_disposable' => 0,
      'stock' => 1,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Siswa',
      'is_active' => 1,
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Room::create([
      'name' => '12-A',
      'is_active' => 1
    ]);

    Room::create([
      'name' => '11-B',
      'is_active' => 1
    ]);

    Transaction::create([
      'recipient_name' => 'Maman Sutisna',
      'quantity' => 2,
      'checkout_date' => Carbon::now(),
      'status' => 'Pending',
      'user_id' => 1,
      'item_id' => 1,
      'room_id' => 1
    ]);
  }
}
