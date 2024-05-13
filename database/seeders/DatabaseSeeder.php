<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        // Product::factory(20)->create();

        User::factory()->create([
            'name' => 'halo',
            'email' => 'test@example.com',
            'password' => 'admin',
            'username' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'alfathin',
            'email' => 'alfathin@example.com',
            'password' => 'alfathin',
            'username' => '123'
        ]);

        User::factory()->create([
            'name' => 'test',
            'email' => 'test1@example.com',
            'password' => 'test',
            'username' => 'admin'
        ]);

        Store::factory()->create([
            'name' => 'Ayang',
            'user_id' => 1
        ]);

        Store::factory()->create([
            'name' => 'Drakula',
            'user_id' => 2
        ]);

        Store::factory()->create([
            'name' => 'Shoppe',
            'user_id' => 3
        ]);

        Category::factory()->create([
            'name' => 'Makanan',
            'store_id' => 1
        ]);
        Category::factory()->create([
            'name' => 'Minuman',
            'store_id' => 1
        ]);
        Category::factory()->create([
            'name' => 'Snack',
            'store_id' => 1
        ]);

        Category::factory()->create([
            'name' => 'Makanan',
            'store_id' => 2
        ]);
        Category::factory()->create([
            'name' => 'Minuman',
            'store_id' => 2
        ]);
        Category::factory()->create([
            'name' => 'Snack',
            'store_id' => 2
        ]);

        Category::factory()->create([
            'name' => 'Makanan',
            'store_id' => 3
        ]);

        Category::factory()->create([
            'name' => 'Minuman',
            'store_id' => 3
        ]);

        Category::factory()->create([
            'name' => 'Snack',
            'store_id' => 3
        ]);

        Product::factory()->create([
            'name' => 'martabak',
            'price' => 7000,
            'category_id' => 1,
            'store_id' => 1,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Jus',
            'price' => 7000,
            'category_id' => 2,
            'store_id' => 1,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Chiki bals',
            'price' => 7000,
            'category_id' => 3,
            'store_id' => 1,
            'stock' => 50
        ]);

        Product::factory()->create([
            'name' => 'martabak',
            'price' => 7000,
            'category_id' => 4,
            'store_id' => 2,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Jus',
            'price' => 7000,
            'category_id' => 5,
            'store_id' => 2,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Chiki bals',
            'price' => 7000,
            'category_id' => 6,
            'store_id' => 2,
            'stock' => 50
        ]);

        Product::factory()->create([
            'name' => 'martabak',
            'price' => 7000,
            'category_id' => 7,
            'store_id' => 3,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Jus',
            'price' => 7000,
            'category_id' => 8,
            'store_id' => 3,
            'stock' => 50
        ]);
        Product::factory()->create([
            'name' => 'Chiki bals',
            'price' => 7000,
            'category_id' => 9,
            'store_id' => 3,
            'stock' => 50
        ]);
    }
}
