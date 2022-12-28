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
      'name' => 'Super Admin',
      'phone' => '081234567891',
      'email' => 'superadmin@gmail.com',
      'password' => bcrypt('123'),
      'is_admin' => true,
      'is_active' => true
    ]);

    User::create([
      'name' => 'Admin',
      'phone' => '081234567891',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('123'),
      'is_admin' => true,
      'is_active' => true
    ]);

    Category::create([
      'name' => 'Elektronik'
    ]);

    Category::create([
      'name' => 'Alat Tulis Kantor'
    ]);

    WorkUnit::create([
      'name' => 'Rekayasa Perangkat Lunak'
    ]);

    WorkUnit::create([
      'name' => 'Teknik Komputer Jaringan'
    ]);

    Item::create([
      'name' => 'Projector',
      'is_disposable' => 0,
      'stock' => 0,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Siswa',
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
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Item::create([
      'name' => 'Laptop',
      'is_disposable' => 0,
      'stock' => 1,
      'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, cupiditate doloremque. Dolore consequatur rem modi deserunt sint quas eos consectetur.',
      'condition' => 'Layak Pakai',
      'usage_permission' => 'Guru',
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
      'usage_permission' => 'Guru & Siswa',
      'category_id' => 1,
      'work_unit_id' => 1
    ]);

    Transaction::create([
      'recipient_name' => 'Maman Sutisna',
      'quantity' => 1,
      'date' => Carbon::now(),
      'placement_location' => 'Kelas 12-A',
      'status' => 'Pending',
      'user_id' => 1,
      'item_id' => 1
    ]);
  }
}
