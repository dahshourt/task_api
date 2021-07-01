<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CardRepository;
use App\Http\Requests\cardRequest;
use App\Models\currency;
use App\Models\Product;
use App\Models\shoopingCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  shoopingCard::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cardRequest $request){
        $crud = new CardRepository();

        return $crud->store($request);
    }


}
