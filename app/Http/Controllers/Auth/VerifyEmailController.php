<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // 1. Pegamos o usuário e garantimos ao Larastan que ele é um User real (não null)
        /** @var \App\Models\User $user */
        $user = $request->user();

        // 2. Usamos a variável $user daqui para frente
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('transactions.index', absolute: false).'?verified=1');
        }

        if ($user->markEmailAsVerified()) {
            // 3. Agora passamos $user, que o Larastan sabe que não é null
            event(new Verified($user));
        }

        return redirect()->intended(route('transactions.index', absolute: false).'?verified=1');
    }
}
