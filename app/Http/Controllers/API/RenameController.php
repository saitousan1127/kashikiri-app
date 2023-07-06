<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RenameController extends Controller
{
    public function index(Request $request, $id, $name)
    {

        DB::transaction(function (){
			$user = User::where('id', '=', $id)->first();
            $user->name = $name;
            $password = create_random_password(5);
            $user->password = Hash::make($password);
			$user->save();
		});
        $result = ['name' => $name, 'password' => $password];
        return $this->resConversionJson($result);
    }

    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
    private function create_random_password($length = 8)
    {
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }
}
