<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\US;
use App\Models\User;
use App\Models\Tag;
use App\Services\USService;

class USController extends Controller
{
    public function index(Request $request, USService $usService, $tag)
    {
        $last = US::join('users','u_s.user_id', '=', 'users.id')->orderBy('u_s.created_at', 'DESC')->limit(1)->get();
        $tag = Tag::where('info', '=', $tag)->get();
        if (is_null($last[0]['end'])) {
            if ($last[0]['id'] == $tag[0]['id']){ 
                $usService->change();
                $result = ['result' => "release"];
            }else{
                $result = ['result' => "error"];
            }
        }else{
            $us = new US;
            $user_info = USER::where('id', '=', $tag[0]['id'])->get();
            $now_time = new \DateTime('now');
            $us->start = $now_time->format('Y-m-d H:i:s');
            $us->user_id = $user_info[0]['id'];
            $us->save();
            $result = ['result' => "regist"];
        }
        return $this->resConversionJson($result);
    }

    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
