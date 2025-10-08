<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController
{
    public function showLoginForm(Request $request)
    {
        return view('admin.auth.login');
    }

    public function redirect(string $provider)
    {
        if ($provider === 'google') {
            try {
                return Socialite::driver($provider)->redirect();
            } catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return to_route('login.form')->withErrors(['provider' => 'Provider not supported.']);
    }

    public function callback(Request $request, string $provider)
    {
        $socialite_user = Socialite::driver($provider)->user();
        /*
         * If email is present in the users datbase, update the information and login
         * Else, deny authentication
         * */
        $user = User::where('email', $socialite_user->getEmail())->first();
        if (!$user || ! $user->canAccessAdminPanel()) {
            return to_route('filament.admin.auth.login')->withErrors(['provider' => 'You are not an admin. Please contact the site administrator.']);
        }

        $user->name = $socialite_user->getName();
        $user->provider_id = $socialite_user->getId();
        $user->provider_name = $provider;
        $user->provider_token = $socialite_user->token;
        $user->provider_refresh_token = $socialite_user->refreshToken;
        if ($user->email_verified_at === null) {
            $user->email_verified_at = now();
        }

        $user->save();

        auth()->login($user);
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
