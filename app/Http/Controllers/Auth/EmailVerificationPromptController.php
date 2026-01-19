<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        $user = $request->user();
        $route = $user && $user->role === 'admin' ? 'admin.dashboard' : 'users.dashboard';

        return $user->hasVerifiedEmail()
                    ? redirect()->intended(route($route, absolute: false))
                    : view('auth.verify-email');
    }
}
