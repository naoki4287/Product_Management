<?php

namespace App\Http\Controllers;

use App\Http\Requests\sdValidateSessionRequest;
use Illuminate\Support\Facades\Log as FacadesLog;
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

  public function register()
  {
    return view('shippingDestination.register');
  }

  // public function validateSession(sdValidateSessionRequest $request)
  public function validateSession(Request $request)
  {
    // $sdinfo = $request->post('sdinfo');
    // FacadesLog::debug($sdinfo);
    // FacadesLog::debug($request->post('sdinfo'));
  //   $validated = $sdinfo->validate([
  //     'name' => 'required',
  //     'address' => 'required',
  //     'tel' => 'required|integer',
  // ]);
    $sdinfo = $request->validate([
      'name' => 'required',
      'address' => 'required',
      'tel' => 'required|numeric',
  ]);
    // $sd = $request->post('sd');
    // FacadesLog::debug($validated);
    // return $sd;
    return $sdinfo;
    // return $validated;
  }

  public function confirm()
  {
    return view('shippingDestination.confirm');
  }

  public function store()
  {
    // return
  }

  public function complete()
  {
    return view('shippingDestination.complete');
  }
}
