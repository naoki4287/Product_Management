<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;

class CartController extends Controller
{
  public function addCart(Request $request)
  {
    $selectedItemsIds = $request->post('selectedItemsIds');
    $selectedItemsNum = $request->post('selectedItemsNum');

    for ($i = 0; $i < count($selectedItemsIds); $i++) {
      $cart = new Cart();
      $cart->user_id = Auth::id();
      $cart->product_id = $selectedItemsIds[$i];
      $cart->item_num = $selectedItemsNum[$i];
      $cart->save();
    }
  }

  public function cart(Request $request)
  {
    $cartInItems = DB::table('items')
      ->join('carts', 'items.id', '=', 'carts.product_id')
      ->select('items.*', 'carts.*', 'items.id', 'carts.id as cart_id')
      ->where('carts.user_id', '=', Auth::id())
      ->orderBy('carts.id', 'DESC')
      ->get();
    // dd($cartInItems);
    return view('cart', compact('cartInItems'));
  }

  public function cartDelete(Request $request)
  {
    Cart::find($request->cartItemId)->delete();
    return back();
  }
}
