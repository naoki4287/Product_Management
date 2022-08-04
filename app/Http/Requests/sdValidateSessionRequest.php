<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class sdValidateSessionRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->path() == 'shippingDestination/validateSession') {
      return true;
    } else {
      return false;
    }
  }

  /**
   * [override] バリデーション失敗時ハンドリング
   *
   * @param array $errors
   * @return JsonResponse
   */
  protected function failedValidation(Validator $validator)
  {
    $response['data']    = [];
    $response['status']  = 'NG';
    $response['summary'] = 'Failed validation.';
    $response['errors']  = $validator->errors()->toArray();

    throw new HttpResponseException(
      response()->json($response, 422)
    );
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'required',
      'address' => 'required',
      'tel' => 'required|numeric',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => '出荷先会社名は必ず入力してください',
      'address.required' => '出荷先住所は必ず入力してください',
      'tel.required' => '電話番号は必ず入力してください',
      'tel.numeric' => '電話番号は数値で入力してください',
    ];
  }
}
