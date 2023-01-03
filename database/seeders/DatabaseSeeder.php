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
use Faker\Core\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
  }
}
