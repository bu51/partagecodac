<?php

namespace Database\Factories;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    protected $model = Ads::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(rand(5,10),true),
            'content'=>$this->faker->sentences(5,true),
            'image'=> 'https://via.placeholder.com/1000'      
        ];
    }
}
