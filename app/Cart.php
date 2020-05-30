<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity'];
    public function product() {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
