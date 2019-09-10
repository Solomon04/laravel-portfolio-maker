<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateProject
 * @package App\Http\Requests
 * @property string title
 * @property string image
 * @property string description
 * @property string coa_name
 * @property string coa_url
 * @property array skills
 */
class CreateProject extends FormRequest
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
            'title' => 'required',
            'image' => 'required:file',
            'description' => 'required',
            'coa_name' => 'required',
            'coa_url' => 'required',
            'skills'
        ];
    }
}
