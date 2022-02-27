<?php

namespace App\Http\Controllers;


use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $user = User::all(); 
        return $user;
    }

    public function getAllEmployees(){
        $user = User::where('role', 'EMPLOYEE')->get();
        return $user;
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    // Use Case 1 เพิ่มผู้ใช้
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            if ($user->save()) {
                return [
                    'status' => 'success',
                    'data' => $user,
                ];
            } else {
                return [
                    'status' => 'error',
                    'data' => "Can't add user",
                ];
            }
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
           
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $user->name = $request->name;
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            if ($user->save()) {
                return $user;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "แก้ไขไม่ได้"
                    ];
            }
        }
    }

    
    public function login(Request $request)
    {
        // Use Case 2
        // กรอก username และ password
        // กดเข้าสู่ระบบ
        $user = User::where('username', $request->username)->first();
        // ไม่เป็น Null
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $this->jwt($user);
                $user["api_token"] = $token;
                return [
                    "user" => $user,
                    "status" => "success"
                ];
            } else {
                return [
                    "status" => "error",
                    "error" => "Password ไม่ถูกต้อง"
                ];
            }
        } else {
            return [
                "status" => "error",
                "error" => "ไม่พบ Username นี้"
            ];
        }
    }

    protected function jwt($user)
    {
        $payload = [
            'iss' => "website-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + env('JWT_EXPIRE_HOUR') * 60 * 60, // Expiration time
        ];
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->works()->delete();
        $user->appointments()->delete();

        if ($user->delete()) {
            return [
                "status" => "success"
            ];
        } else {
            return [
                "status" => "error",
                "error" => "ลบไม่ได้"
            ];
        }
    }
}
