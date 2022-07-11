<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagement extends Controller
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
  
  public function contact ()
  {
    return view('contact');
  }
  
}
