<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\App;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
//$factory->define(App\User::class, function (Faker\Generator $faker) {

    public function definition()
    {
        return [
            'product_name'=>Product::all()[0]->product_name,
        'price'=>Product::all()[0]->price
        ];
    }
}
