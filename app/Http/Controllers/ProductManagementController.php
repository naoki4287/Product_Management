<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
  public function top ()
  {
    return view('top');
  }
  
  public function list ()
  {
    $items = DB::table('items')->paginate(5);
    // dd($items);
    return view('list', compact('items'));
  }
  
  public function newadd ()
  {
    return view('newadd');
  }

  public function productRegister (Request $request)
  {
    $item = $request->only(['product_name', 'arrival_source', 'manufacturer', 'price']);
    $log = $request->only(['email', 'tel']);
    Item::create(['product_name' => $item['product_name'], 'arrival_source' => $item['arrival_source'], 'manufacturer' => $item['manufacturer'], 'price' => $item['price']]);
    Log::create(['email' => $log['email'], 'tel' => $log['tel']]);
    return redirect()->route('list');
  }
  
  public function contact ()
  {
    return view('contact');
  }
  
}
