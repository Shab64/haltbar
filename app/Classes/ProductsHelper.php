<?php

namespace App\Classes;

use App\Models\Ralawise;
use App\Models\Uneek;
use Illuminate\Support\Arr;

class ProductsHelper
{
    public static $products = array();
    public static $size = 0;
    static function setProducts()
    {
        $products = array();
        $ralawise = Ralawise::select('*')->get()->groupBy('ProductGroup')->toArray();
        $uneek = Uneek::select('*')->get()->groupBy('Product_Code')->toArray();
        $products = array_merge($ralawise, $uneek);
        $products = ProductsHelper::shuffle_assoc($products);
        // ProductsHelper::$size = sizeof($products);
        // ProductsHelper::$products = $products;
        session()->put('products',$products);
        session()->put('products_size',sizeof($products));
        session()->Save();
    }

    static function shuffle_assoc($arr)
    {
        $shuffledArr = array();
        $keys = array_keys($arr);
        shuffle($keys);
        if(!empty($keys)){
            foreach($keys as $key){
                $shuffledArr[$key] = $arr[$key];
            }
        }
        return $shuffledArr;
    }

}
