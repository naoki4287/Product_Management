<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRegisterRequest;
use App\Models\Item;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
  public function top()
  {
    return view('top');
  }

  public function list()
  {
    $items = DB::table('items')->paginate(5);
    // dd($items);
    return view('list', compact('items'));
  }

  public function newadd()
  {
    return view('newadd');
  }

  public function confirm(Request $request)
  {
    $sesItem = $request->session()->get('item');
    $sesLog = $request->session()->get('log');
    // dd($sesLog);
    return view('confirm', compact('sesItem', 'sesLog'));
  }

  public function storeOrBack(Request $request)
  {
    $sesItem = $request->session()->get('item');
    $sesLog = $request->session()->get('log');
    // dd($sesLog);
    if ($request->input('back') == 'back') {
      $regiInfo = array_merge($sesItem, $sesLog);
      return redirect('newadd')->withInput($regiInfo);
    } else {
      Item::create(['product_name' => $sesItem['product_name'], 'arrival_source' => $sesItem['arrival_source'], 'manufacturer' => $sesItem['manufacturer'], 'price' => $sesItem['price']]);
      Log::create(['email' => $sesLog['mail'], 'tel' => $sesLog['tel']]);
      $request->session()->forget('item');
      $request->session()->forget('log');
      return redirect()->route('complete');
    }
  }

  public function complete()
  {
    return view('complete');
  }

  public function productRegister(ProductRegisterRequest $request)
  {
    $item = $request->only(['product_name', 'arrival_source', 'manufacturer', 'price']);
    $request->session()->put('item', $item);
    $log = $request->only(['mail', 'tel']);
    $request->session()->put('log', $log);

    return redirect()->route('confirm');
  }

  public function contact()
  {
    return view('contact');
  }
}
