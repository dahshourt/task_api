<?php namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface CrudInterface{
    // Show list of the user
    public function index();


    // Store a new record
    public function store(Request $request);

    // Show edit form

}
