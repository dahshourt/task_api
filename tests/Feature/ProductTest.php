<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_product_index()
    {

        $this->json('get', '/api/products', ['Accept' => 'application/json'])
            ->assertStatus(200);

    }

    public function test_enter_product_validate()
    {
        $this->json('POST', '/api/products')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'product_name' => ["The product name field is required."],
                    'price' => ["The price field is required."
                    ],
                ]


            ]);
    }

    public function test_sore_product()
    {
        $productData = ['product_name' => 'asd', 'price' => 30];

        $this->json('POST', '/api/products', $productData, ['Accept' => 'application/json'])
            ->assertStatus(201);;
    }

    public function test_update_product()
    {

        $product = Product::factory()->create([
            "product_name" => "koko",
            "price"=> 30,

        ]);

        $productupdated = [
            "product_name" => "koko3",
            "price" => "30",
        ];

        $this->json('PATCH', 'api/products/' .  $product->id,$productupdated, ['Accept' => 'application/json'])
            ->assertStatus(201);

    }


}
