<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ads;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::factory(5)->create();

        User::factory(10)->create()->each(function($user) use ($category) {
            Ads::factory(rand(1,3))->create([
                'user_id'=> $user->id,
                'category_id'=>($category->random(1)->first())->id
            ]);
        });
    }
}
