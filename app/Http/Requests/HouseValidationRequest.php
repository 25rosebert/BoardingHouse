<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseValidationRequest extends FormRequest
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
            'file.*'=>'required|image|mimes:jpg,png,jpeg,gif',
                    'name'=>'required|max:25"|min:8|unique:properties',
                    'status'=>'required',
                    'barangay_id'=>'required',
                    'category_id'=>'required',
                    'classification_id'=>'required',
                    'bedroom'=>'required',
                    'comfortroom'=>'required',
                    'livingroom'=>'required',
                    'kitchen'=>'required',
                    'parkinglot'=>'required',
                    'description'=>'required','min:30','max:255',
                    'price'=>'required|min:3|max:12',
                    'floor_area'=>'required|min:2|max:12',
                    'floor_total'=>'required|min:1|max:12',
                    'land_size'=>'required|min:2|max:12',
                    'user_id'=>'required',
                    'contact_number' =>'required',
                    'address' => 'required|min:15|max:266',
                    'latitude' => 'required',
                    'longitude' => 'required',
                    'photo.*'=>'required|image|mimes:jpg,png,jpeg,gif',
                    'permit.*'=>'required|image|mimes:jpg,png,jpeg,gif',
                    'landmark'=>'required',
        ];
    }
}
