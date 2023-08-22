<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AircraftRequest extends FormRequest
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
                            'aircraft_name' => 'required|string',
                            'seating_capacity' => 'required|numeric',
                            'seat_type_1' => 'nullable|required_without_all:seat_type_2,seat_count_type_2|string',
                            'seat_count_type_1' => 'nullable|required_with:seat_type_1|numeric',
                            'seat_type_2' => 'nullable|required_without_all:seat_type_1,seat_count_type_1|string',
                            'seat_count_type_2' => 'nullable|required_with:seat_type_2|numeric',
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
    public function messages()
    {
        return [
            'aircraft_type.required' => 'Bạn chưa nhập Tên máy bay.',
            'seating_capacity.required' => 'Bạn chưa nhập số chỗ ngồi.',
            'seat_type_1.required_without_all' => 'Bạn phải nhập Tên ghế loại 1 hoặc loại 2.',
            'seat_count_type_1.required_with' => 'Bạn phải nhập Số lượng ghế loại 1 nếu có Tên ghế loại 1.',
            'seat_type_2.required_without_all' => 'Bạn phải nhập Tên ghế loại 2 hoặc loại 1.',
            'seat_count_type_2.required_with' => 'Bạn phải nhập Số lượng ghế loại 2 nếu có Tên ghế loại 2.',
        ];
    }
}
