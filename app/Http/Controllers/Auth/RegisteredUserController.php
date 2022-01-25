<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        /*'password' => ['required', 'confirmed', Rules\Password::defaults()]
        「password_confirmation」がないので'confirmed'を削除　12.21*/

        $user = User::create([
            'name' => $request->name,

            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        /*ハッシュ化（Hash::make）：特定の計算手法に基づいて、元のデータを不規則な文字列に置換する処理*/

        /*event(new Registered($user)); イベント発生はいらない？*/

        /*Auth::login($user);*/
        /*「AuthenticatedSessionController」とnamespaceが同じ*/

        return redirect("/complete");
        /*RouteServiceProvider::HOME)→'/dashboard'なので、変更予定*/
    }
}
