<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    $cartInItemsNum = count($selectedItemsIds);

    // dd($cartItemId);
    // $request->session()->put('cartInItems', $cartInItems);
    $request->session()->put('cartInItemsNum', $cartInItemsNum);
  }

  public function cart(Request $request)
  {
    $cartInItemsNum = $request->session()->get('cartInItemsNum');

    $cartInItems = DB::table('items')
      ->join('carts', 'items.id', '=', 'carts.product_id')
      ->select('items.*', 'carts.*')
      ->where('carts.user_id', '=', Auth::id())
      ->orderBy('carts.id', 'DESC')
      ->limit($cartInItemsNum)
      ->get();
    // dd($cartInItems);
    // $request->session()->forget('cartInItemsNum');
    return view('cart', compact('cartInItems'));
  }
}
