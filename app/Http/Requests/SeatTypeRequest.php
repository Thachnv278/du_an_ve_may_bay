<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatTypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $curremtAction = $this->route()->getActionMethod();
        switch($this->method()):
            case 'POST':
                switch($curremtAction):
                    case 'add':
                        $rules = [
                            'seat_type_name' => 'required',
                           
                        ];
                        return $rules;
                        break;
                    endswitch;
                    break;
                endswitch;
        return [
            //
        ];
    }
    public function messages(){
        return [
            'seat_type_name.required' => 'Tên loại ghế không được để trống',
        ];
    }
}
