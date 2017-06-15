<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackUploadRequest extends FormRequest
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
        return  [
            'artwork' => 'required|max:2000',
            'mp3' => 'required |max:12288',
            'title' =>'required|max: 255',
            'genre' =>'required',
        ];
    }
}
