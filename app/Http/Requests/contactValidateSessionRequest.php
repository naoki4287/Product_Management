<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactValidateSessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if ($this->path() == 'contactValidateSession') {
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
        'name' => 'required',
        'mail' => 'required|email',
        'tel' => 'required|numeric',
        'contact' => 'required',
      ];
    }
  
    public function messages()
    {
      return [
        'name.required' => '名前は必ず入力してください',
        'mail.required' => 'メールアドレスは必ず入力してください',
        'mail.email' => '無効なメールアドレスです',
        'tel.required' => '電話番号は必ず入力してください',
        'tel.numeric' => '電話番号は数値で入力してください',
        'contact.required' => '問い合わせ内容は必ず入力してください',
      ];
    }
}
