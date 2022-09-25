<?php

namespace App\Http\Controllers;

use App\Models\RalawisePricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function index()
    {
        return view('web.cart');
    }

    //Add to Cart
    function addToCart(Request $request)
    {
        unset($request['_token']);

        $product = DB::table('product_styles')
            ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
            ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
            ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
            ->where('product_styles.code', $request['productID'])->groupBy('product_styles.code')->get()->first();

        //session()->flush('cart');
        $cart = session()->get('cart');

        $ralawiseCharges = RalawisePricing::all();
        foreach ($request['sizesQty'] as $size) {
            $sizeQTY = preg_split('#(?<=\d)(?=[a-z])#i', $size);

            foreach ($sizeQTY as $qty) {
                foreach ($ralawiseCharges as $charges) {
                    if ($qty[0] >= $charges['quantity_from'] && $qty[0] <= $charges['quantity_to']) {
                        $singlePrice = round($product->single_list_price * $charges['service_charges_pp'], 2);
                        $discountedPrice = round($singlePrice - ($singlePrice / 100 * $charges['discount_per_percent']), 2);
                        $totalPrice = round($discountedPrice * $qty[0], 2);
                    }
                }
            }

            if (isset($cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']])) {
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']]['qty'] += $sizeQTY[0];
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']]['item_total'] += $totalPrice;
            } else {
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']] = [
                    "product_name" => $product->title,
                    "qty" => $sizeQTY[0],
                    "size" => $sizeQTY[1],
                    "color" => $request['color'],
                    "item_total" => $totalPrice,
                    "image" => !empty($request['image']) ? $request['image'] : $product->image_url,
                ];
            }
        }

        session()->put('cart', $cart);

        return response([
            'sessionData' => session()->all()
        ]);
    }

    //Update Cart
    function updateCart(Request $request)
    {
        if ($request->product_id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->product_id]["qty"] = $request->quantity;
            $cart[$request->product_id]["item_total"] = $request->quantity * $cart[$request->product_id]['price'];
            session()->put('cart', $cart);
            return response()->json(session()->all());
        }
    }

    //Remove Item From Cart
    function removeFromCart(Request $request)
    {
        if ($request->product_id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            return response()->json(session()->all());
        }
    }
}
