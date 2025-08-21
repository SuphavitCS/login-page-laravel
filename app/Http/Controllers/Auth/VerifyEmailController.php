<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        
        if ($request->user()->hasVerifiedEmail()){
            return redirect()->intended(route('dashboard'));
        }
    
        if ($request->user()->markEmailAsVerified()){
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard').'/?verified=1');
    }
}
