<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|max:100',
            'email' => 'required|max:255|email',
            'address' => 'required|max:100',
            'phone' => 'required|numeric',
            'group_id' => 'required',
            'file' => 'mimes:jpeg,png'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام باید وارد شود',
            'name.max' => 'نام حداکثر باید 100 کاراکتر باشد!',
            'email.required' => 'ایمیل باید وارد شود',
            'email.max' => 'ایمیل حداکثر باید 255 کاراکتر باشد!',
            'email.email' => 'ایمیل باید در قالب یک ایمیل معتبر باشد!',
            'address.required' => 'آدرس باید وارد شود',
            'address.max' => 'آدرس حداکثر باید 100 کاراکتر باشد!',
            'phone.required' => 'شماره تماس باید وارد شود',
            'phone.max' => 'شماره تماس حداکثر باید 11 کاراکتر باشد!',
            'phone.numeric' => 'شماره تماس  باید عدد شود',
            'file.mimes' => ' باید فرمت تصویر png یا jpg انتخاب شود',
            'group_id.required' => 'نقش کاربر باید انتخاب شود',


        ];
    }
}
