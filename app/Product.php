<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
     * Table name
     */
    protected $table = 'products';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'title',
        'price',
        'description',
    ];


}
