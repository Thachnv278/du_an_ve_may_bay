<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassengerRequest extends FormRequest
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
                            'name' => 'required',
                            'email'=> 'required',
                            'phone' => 'required',
                            'date_of_birth' => 'required',
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
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'date_of_birth.required' => 'Vui lòng nhập ngày sinh',
        ];
    }
}
