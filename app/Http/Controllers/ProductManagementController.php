<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactValidateSessionRequest;
use App\Http\Requests\ProductRegisterRequest;
use App\Mail\ContactMail;
use App\Models\Item;
use App\Models\Log;
use Illuminate\Http\Request;
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
    $items = DB::table('items')
      ->where('deleted_at', '=', NULL)
      ->paginate(5);
    // dd($items);
    return view('list', compact('items'));
  }

  public function newadd()
  {
    return view('newadd');
  }

  public function productRegister(ProductRegisterRequest $request)
  {
    $item = $request->only(['product_name', 'arrival_source', 'manufacturer', 'price']);
    $request->session()->put('item', $item);
    $log = $request->only(['mail', 'tel']);
    $request->session()->put('log', $log);

    return redirect()->route('confirm');
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

  public function delete(Request $request)
  {
    $deleteItems = $request->itemId;
    for ($i = 0; $i < count($deleteItems); $i++) {
      intval($deleteItems[$i]);
      Item::find($deleteItems[$i])->delete();
    }

    return back();
  }

  public function edit($id)
  {
    $item = Item::find($id);
    $log = Log::find($id);
    // dd($log);
    return view('edit', compact('item', 'log'));
  }

  public function update(Request $request)
  {
   
  }

  public function contact()
  {
    return view('contact');
  }

  public function contactValidateSession(contactValidateSessionRequest $request)
  {
    $contact = $request->only(['name', 'mail', 'tel', 'contact']);
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
    // dd($sesContact);
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
}
