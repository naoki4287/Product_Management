<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;

class CartController extends Controller
{
  public function addCart(Request $request)
  {
    $checkedItemsIds = $request->all();
    FacadesLog::debug($checkedItemsIds);
    // dd($cartItemId);
    $request->session()->put('checkedItemsIds', $checkedItemsIds);
  }

  public function cart(Request $request)
  {
    $checkedItemsIds = $request->session()->get('checkedItemsIds');
    $cartInItems = Arr::flatten($checkedItemsIds);

    $items = DB::table('items')
      ->whereIn('id', $cartInItems)
      ->get();
    // dd($items);
    // $request->session()->forget('checkedItemsIds');
    return view('cart', compact('items'));
  }
}
