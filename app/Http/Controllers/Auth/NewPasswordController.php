<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{

    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /** @throws \Illuminate\Validation\ValidationException   */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [

            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                $user->forceFill([

                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),

                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Jelszavad sikeresen visszaállítva! Most már be tudsz jelentkezni az új jelszóval.');
        }

        return back()->withInput($request->only('email'))
            ->withErrors(['email' => 'A jelszó-visszaállítás nem sikerült. Lehet, hogy a link lejárt vagy érvénytelen.']);
    }
}
