<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductManagement extends Controller
{
  public function top ()
  {
    return view('top');
  }
  
  public function list ()
  {
    return view('list');
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
