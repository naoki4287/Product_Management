<?php

namespace App\Http\Controllers;

use App\Http\Requests\sdValidateSessionRequest;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Validator;
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

  public function ajaxValidate(Request $request)
  {
    $sdinfo = $request->post('sdinfo');
    $message = [
      'name.required' => '出荷先会社名は必ず入力してください',
      'address.required' => '出荷先住所は必ず入力してください',
      'tel.required' => '電話番号は必ず入力してください',
      'tel.numeric' => '電話番号は数値で入力してください',
    ];

    $rules = [
      'name' => 'required',
      'address' => 'required',
      'tel' => 'required|numeric',
    ];

    $validator = Validator::make($sdinfo, $rules, $message);

    if ($validator->fails()) {
      return response()->json($validator->messages()->toArray());
    }

    return $sdinfo;
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
