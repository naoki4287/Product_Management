<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editValidateSessionRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->path() == 'editValidateSession') {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'product_name' => 'required',
      'arrival_source' => 'required',
      'manufacturer' => 'required',
      'price' => 'required|integer',
      'mail' => 'required|email',
      'tel' => 'required|numeric',
    ];
  }

  public function messages()
  {
    return [
      'product_name.required' => '商品名は必ず入力してください',
      'arrival_source.required' => '入荷元は必ず入力してください',
      'manufacturer.required' => '製造元は必ず入力してください',
      'price.required' => '金額は必ず入力してください',
      'price.integer' => '金額は数値で入力してください',
      'mail.required' => 'メールアドレスは必ず入力してください',
      'mail.email' => '無効なメールアドレスです',
      'tel.required' => '電話番号は必ず入力してください',
      'tel.integer' => '電話番号は数値で入力してください',
    ];
  }
}
