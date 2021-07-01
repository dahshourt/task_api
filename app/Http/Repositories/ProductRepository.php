<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\CrudInterface;
use App\Http\Resources\productResource;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class ProductRepository implements CrudInterface
{
    // Show list of the user
    public function index(){
        return  Product::all();
    }

    // Show user create form
    public function create(){

    }

    // Store a new user record
    public function store(Request $request){
        if(is_numeric($request->price)){
            $product=new Product();
            $product->product_name=$request->product_name;
            $product->price=$request->price;
            $product->save();
            return response([
                'message'=>'data insert successfully',
                'data'=>new productResource($product)
            ],201);
        }
else {
    echo $request->price .' is not numeric number'; die;
}

    }

    // Show User edit form


    // Update user's existing data.


    // Delete a user
    public function delete($id){

    }
}
