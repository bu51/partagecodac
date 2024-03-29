<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
        if (request()->routeIs('ads.store')){
            $imageRule='image|required';
        } elseif (request()->routeIs('ads.update')){
            $imageRule = 'image|sometimes';
        }
        return [
            'title'=>'required',
            'content'=>'required',
            'image'=>$imageRule,
            'category'=>'required'
        ]; 
    }
    protected function prepareForValidation(){
        if ($this->image == null){
            $this->request->remove('image');
        }
    }
}
