<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateShopReqest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role == 3) {
            // ユーザーは店舗代表者
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
            'name' => 'required|max:255',
            'kana' => 'required|regex:/^[ぁ-ん]+$/u|max:255',
            'area_id' => 'required|integer',
            'genre_id' => 'required|integer',
            'info' => 'required|max:255',
        ];
    }
}
