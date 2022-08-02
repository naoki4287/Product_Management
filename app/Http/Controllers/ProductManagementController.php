<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactValidateSessionRequest;
use App\Http\Requests\ProductRegisterRequest;
use App\Mail\ContactMail;
use App\Models\Favorite;
use App\Models\Item;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProductManagementController extends Controller
{
  public function top()
  {
    return view('top');
  }

  public function list()
  {
    $items = DB::table('items as i')
      ->leftjoin('favorites as f', 'i.id', '=', 'f.product_id')
      ->select('i.*', 'i.deleted_at', 'f.product_id', 'f.deleted_at as fDel_at')
      ->where('i.deleted_at', '=', NULL)
      ->orderBy('i.id', 'ASC')
      ->paginate(5);

    return view('list', compact('items'));
  }

  public function add()
  {
    return view('add');
  }

  public function productRegister(ProductRegisterRequest $request)
  {
    $item = $request->only(['product_name', 'arrival_source', 'manufacturer', 'price']);
    $mailTel = $request->only(['mail', 'tel']);
    $info = [
      'information' => date('m-d') . 'に' . $mailTel['mail'] . 'が商品登録を実施'
    ];
    $log = array_merge($mailTel, $info);

    $request->session()->put('item', $item);
    $request->session()->put('log', $log);

    return redirect()->route('confirm');
  }

  public function confirm(Request $request)
  {
    $sesItem = $request->session()->get('item');
    $sesLog = $request->session()->get('log');

    return view('confirm', compact('sesItem', 'sesLog'));
  }

  public function storeOrBack(Request $request)
  {
    $sesItem = $request->session()->get('item');
    $sesLog = $request->session()->get('log');

    if ($request->input('back') == 'back') {
      $regiInfo = array_merge($sesItem, $sesLog);

      return redirect('newadd')->withInput($regiInfo);
    } else {
      Item::create(['product_name' => $sesItem['product_name'], 'arrival_source' => $sesItem['arrival_source'], 'manufacturer' => $sesItem['manufacturer'], 'price' => $sesItem['price']]);

      Log::create(['email' => $sesLog['mail'], 'tel' => $sesLog['tel'], 'information' => $sesLog['information']]);

      $request->session()->forget('item');
      $request->session()->forget('log');

      return redirect()->route('complete');
    }
  }

  public function complete()
  {
    return view('complete');
  }

  public function delete(Request $request)
  {
    $deleteItems = $request->itemId;
    for ($i = 0; $i < count($deleteItems); $i++) {
      Item::find($deleteItems[$i])->delete();
    }

    return back();
  }

  

  public function contact()
  {
    return view('contact');
  }

  public function contactValidateSession(contactValidateSessionRequest $request)
  {
    $contact = $request->only(['name', 'mail', 'tel', 'syumi', 'tokugi', 'contact']);
    $request->session()->put('contact', $contact);

    return redirect()->route('contactConfirm');
  }

  public function contactConfirm(Request $request)
  {
    $sesContact = $request->session()->get('contact');
    return view('contactConfirm', compact('sesContact'));
  }

  public function sendOrBack(Request $request)
  {
    $sesContact = $request->session()->get('contact');
    if ($request->input('back') == 'back') {
      return redirect('contact')->withInput($sesContact);
    } else {
      Mail::to($sesContact['mail'])->send(new ContactMail($sesContact));
      Mail::to('naoki@gmail.com')->send(new ContactMail($sesContact));

      return redirect()->route('sendComplete');
    }
  }

  public function sendComplete()
  {
    return view('sendComplete');
  }

  public function mail()
  {
    return view('mail');
  }

  public function mypage()
  {
    $favorites = DB::table('items')
      ->join('favorites', 'items.id', '=', 'favorites.product_id')
      ->select('items.*', 'favorites.*')
      ->where('user_id', '=', Auth::id())
      ->where('favorites.deleted_at', '=', NULL)
      ->orderBy('favorites.created_at', 'DESC')
      ->get();

    return view('mypage', compact('favorites'));
  }

  public function favorite(Request $request)
  {
    $favoriteId = $request->favorite;

    $favoriteItem = DB::table('items')
      ->join('favorites', 'items.id', '=', 'favorites.product_id')
      ->select('items.*', 'favorites.*')
      ->where('user_id', '=', Auth::id())
      ->where('product_id', '=', $favoriteId)
      ->first();

    if ($favoriteItem === null) {
      Favorite::create(['user_id' => Auth::id(), 'product_id' => $favoriteId]);
    } elseif ($favoriteItem->deleted_at) {
      DB::table('favorites')
        ->where('product_id', $favoriteId)
        ->update(['deleted_at' => NULL]);
    } else {
      Favorite::find($favoriteItem->id)->delete();
    }

    return back();
  }
}
