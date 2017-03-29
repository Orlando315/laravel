<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $tabe = "prducts";

    public $primaryKey ="id";

    public $fillable = [
    'user_id','stock','title','price','photo','description'
    ];
}
