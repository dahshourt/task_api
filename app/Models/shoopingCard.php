<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoopingCard extends Model
{
    use HasFactory;
    protected  $fillable=['id','product_name','currency_name'];
}
