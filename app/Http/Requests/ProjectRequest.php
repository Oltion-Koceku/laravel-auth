<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|min:3|max:100",
            "description" => "min:10",
            "img" => "image|mimes:png,jpg|max:20480"
        ];
    }

    public function messages(): array
    {

        return [

            "title.required" => "Devi inserire il titolo",
            "title.min" => "ci devono essere almeno :min caratteri",
            "title.max" => "ci sono più di :max caratteri",

            "description.min" => "ci devono essere almeno :min caratteri",

            "img.image" => "è richiesta un immagine",
            "img.mimes" => "è richiesto un file png oppure jpg",
            "img.max" => "L'immagine non deve superare i :max kb"

        ];


    }
}
