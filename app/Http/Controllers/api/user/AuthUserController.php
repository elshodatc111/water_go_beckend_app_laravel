<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AuthUserController extends Controller{
    public function sendCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^\+998\d{9}$/'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validatsiya xatosi',
                'errors' => $validator->errors()
            ], 411);
        }
        $code = rand(1000, 9999);
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            $user->code = $code;
            $user->status = 'pedding';
            $user->save();
        } else {
            $user = User::create([
                'name' => 'name',
                'phone' => $request->phone,
                'email' => time() . '@codestart.uz',
                'type' => 'user',
                'password' => Hash::make('password123'),
                'status' => 'pedding',
                'code' => $code,
            ]);
        }
    
        \Log::info("Phone: {$user->phone}, Code: $code");
    
        return response()->json(['message' => 'Tasdiqlash kodi yuborildi']);
    }

    public function verifyCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^\+998\d{9}$/',
            'code' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validatsiya xatosi',
                'errors' => $validator->errors()
            ], 411);
        }
        $user = User::where('phone', $request->phone)->where('code', $request->code)->select('id',"name","phone","type","status")->first();
        if (!$user) {
            return response()->json(['message' => 'Tasdiqlash kodi noto\'g\'ri'], 411);
        }
        if ($user->type!='user') {
            return response()->json(['message' => 'Sizga foydalanishga ruxsat etilmagan'], 411);
        }
        $user->code = null;
        $user->status = 'success';
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Kirish muvaffaqiyatli',
            'token' => $token,
            'user' => $user
        ],200);
    }


    
}
