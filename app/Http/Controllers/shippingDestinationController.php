<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shippingDestinationController extends Controller
{
  public function index()
  {
    $shippings = DB::table('shippings')
      ->select('shippings.*')
      ->where('deleted_at', '=', null)
      ->paginate(5);

    return view('shippingDestination.index', compact('shippings'));
  }

  public function delete(Request $request)
  {
    $deleteShippings = $request->shippingIds;
    for ($i = 0; $i < count($deleteShippings); $i++) {
      Shipping::find($deleteShippings[$i])->delete();
    }

    return back();
  }
}
