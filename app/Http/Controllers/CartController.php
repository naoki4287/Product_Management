<?php

namespace App\Http\Controllers;

use App\Models\Buy_item;
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

  public function buy()
  {
    $cartInItems = DB::table('items')
      ->join('carts', 'items.id', '=', 'carts.product_id')
      ->select('items.*', 'carts.*', 'items.id', 'carts.id as cart_id')
      ->where('carts.user_id', '=', Auth::id())
      ->orderBy('carts.id', 'DESC')
      ->get();

    for ($i = 0; $i < count($cartInItems); $i++) {
      $buy_item = new Buy_item();
      $buy_item->user_id = Auth::id();
      $buy_item->product_id = $cartInItems[$i]->id;
      $buy_item->item_num = $cartInItems[$i]->item_num;
      $buy_item->save();
      Cart::find($cartInItems[$i]->cart_id)->delete();
    }

    return redirect()->route('list');
  }
}
