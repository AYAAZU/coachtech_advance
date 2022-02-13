<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            // ユーザーはログイン済み
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after:tomorrow',
            /*|after:tomorrow 未設定*/
            /*unique（例　unique:テーブル名、カラム名）未設定*/
            'time' => 'required|max:255',
            'number' => 'required|integer|max:255',
        ];
    }
}
