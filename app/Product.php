<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    public function getHumanDataFromSessionForBasket($basket_session)
    {
        $products = Product::whereIn('id', array_keys($basket_session))->get();
        return $products;
    }
}
