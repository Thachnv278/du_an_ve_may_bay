<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
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
                            'aircraft_id' => 'required',
                            'route_id' => 'required',
                            'DepartureTime' => 'required|after_or_equal:now',
                            'ArrivalTime' => 'required|after:DepartureTime',
                            'price_1' => 'required|numeric',
                            'price_2' => 'required|numeric',
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
            'route_id.required' => 'Bạn chưa nhập  chuyến bay',
            'aircraft_id.required' => 'Bạn chưa nhập tên máy bay ',
            'DepartureTime.required' => 'Bạn chưa nhập thời gian đi ',
            'ArrivalTime.required' => 'Bạn chưa nhập thời gian đến',
            'DepartureTime.after_or_equal' => 'Thời gian đi phải sau hoặc bằng thời gian hiện tại',
            'ArrivalTime.after' => 'Thời gian đến phải sau hoặc bằng thời gian đi',
            'price_1.required' => 'Giá vé phổ thông không được để trống',
            'price_2.required' => 'Giá vé thương gia không được để trống',
            'price_1.numeric' => 'Giá vé phổ thông phải là số',
            'price_2.numeric' => 'Giá vé thương gia phải là số',
        ];
    }
}
