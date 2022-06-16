<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotValidationRequest extends FormRequest
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
            'name'=>'required|max:25"|min:8|unique:properties',
            'category_id'=>'required',
            'classification_id'=>'required',
            'status'=>'required',
            'barangay_id'=>'required',
            'description'=>'required','min:30','max:255',
            'price'=>'required|min:3|max:12',   
            'user_id'=>'required',
            'contact_number' =>'required',
            'land_size'=>'required',
            'address'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'photo.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            // 'permit.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            'file.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            'landmark'=>'required',
        ];
    }
}
