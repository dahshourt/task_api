<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_card_index()
    {

        $this->json('get', '/api/cards', ['Accept' => 'application/json'])
            ->assertStatus(200);

    }
    public function test_enter_cart_validate()
    {
        $this->json('POST', '/api/cards')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'product_name' => ["The product name field is required."],
                    'currency_name' => ["The currency name field is required."
                    ],
                ]


            ]);
    }
    public function test_sore_cart()
    {
        $cartData = [
            "product_name"=>["t-shirt","t-shirt","shoes"],
            "currency_name"=>"EGP"
    ];



        $this->json('POST', 'api/cards', $cartData, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }

}
