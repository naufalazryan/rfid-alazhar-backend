<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_role' => ['required', 'exists:roles,id_role'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'id_role' => $request->id_role,
            ]);

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json(['message' => 'Akun berhasil terdaftar', 'user' => $user, 'token' => $token], 201);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                throw ValidationException::withMessages([
                    'email' => ['Email sudah terdaftar.'],
                ]);
            }
            throw $e;
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $validator->errors()->toArray();
            if(isset($errors['password']) && $errors['password'][0] === 'The password must be at least 8 characters.') {
                throw ValidationException::withMessages([
                    'password' => ['Password minimal 8 karakter.'],
                ]);
            }
            throw $e;
        }
    }
}
