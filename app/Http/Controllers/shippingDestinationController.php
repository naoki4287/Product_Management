<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shippingDestinationController extends Controller
{
  public function index()
  {
    return view('shippingDestination.index');
  }
}
