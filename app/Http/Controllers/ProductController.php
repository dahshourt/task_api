<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CrudRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\productrequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\productResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//
//        return  Product::all();
//    }
    public function index()
    {

        $crud = new ProductRepository();

        return $crud->index();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productrequest $request)
    {
        $crud = new ProductRepository();

        return $crud->store($request);


    }

    /**



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product  $product)
    {

$product->update($request->all());
        return response([
            'data'=>new productResource($product)
        ],201);

    }



}
