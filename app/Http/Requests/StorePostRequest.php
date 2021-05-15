<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user_id == auth()->id()){
          return true;
        }else{
          return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
          'user_id' => 'required',
          'name' => 'required',
          'slug' => 'required|unique:posts',
          'category_id' => 'required',
          'status' => 'required|in:1,2'
        ];

        if($this->status == 2){
          $rules = array_merge($rules, [
            'taqs' => 'required',
            'extract' => 'required',
            'body' => 'required'
          ]);
        }

        return $rules;

      }























}
