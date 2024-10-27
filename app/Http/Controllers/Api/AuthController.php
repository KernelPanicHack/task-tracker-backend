<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResendEmailRequest;
use App\Mail\VerificationEmail;
use App\Models\EmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

// Не забудьте импортировать Carbon
class AuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $fullName = $request->fullName;
        $parts = preg_split('/[\s-]+/', $fullName);
        $parsed = [
            'surname' => $parts[0] ?? null,
            'name' => $parts[1] ?? null,
            'patronymic' => $parts[2] ?? null,
        ];



        $user = User::create([
            'name' => $parsed['name'],
            'surname' => $parsed['surname'],
            'patronymic' => $parsed['patronymic'],
            'login' => $request->login,
            'email' => $request->email,
            'password' => ($request->password),
        ]);
        $user->assignRole('guest');

        $token = Str::random(60);

        EmailVerification::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        Mail::to($user->email)->send(new VerificationEmail($token));

        return response()->json(['message' => 'User registered. Please verify your email.']);

    }

    public function verifyEmail($token)
    {
        $verification = EmailVerification::query()
            ->where('token', $token)
            ->first();


        if (!$verification) {
            return response()->json(['message' => 'Invalid token.'], 404);
        }

        if ($verification->updated_at != $verification->created_at) {
            return response()->json(['message' => 'account already confirm'], 404);
        }

        if ($verification->created_at->diffInHours(Carbon::now()) > 24) {
            return response()->json(['message' => 'token is expired']);
        }



        $user = $verification->user;
        $user->email_verified_at = Carbon::now();
        $user->save();

        $token = $user->createToken('token')->plainTextToken;

        $verification->touch();

        return redirect('/')
            ->with('status', 'Email успешно подтвержден.')
            ->cookie('api_token', $token, 60, null, null, false, false);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Please verify your email first.'], 403);
        }

        $user->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'login successful',
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken
        ]);
    }

    public function resendVerificationEmail(ResendEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response([
                'message' => 'user with this email doesnt find!'
            ], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 400);
        }
        $emailVerification = EmailVerification::where('user_id', $user->id);
        if($emailVerification){
            $emailVerification->delete();
        }

        $token = Str::random(60);

        EmailVerification::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        Mail::to($user->email)->send(new \App\Mail\VerificationEmail($token));

        return response()->json(['message' => 'Verification email resent.']);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => "Token removed successfully",
        ]);
    }
}


