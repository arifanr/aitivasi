<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'Admin',
      'email' => 'admin@aitivasi.id',
      'username' => 'admin',
      'password' => 'password',
      'role' => 'admin',
      'avatar' => 'default.png',
      'created_at' => now(),
      'created_by' => 'system',
    ]);
  }
}
