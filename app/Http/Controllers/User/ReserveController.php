<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReserveRequest $request)
    {
        $s_hour = $request->s_hour();
        $s_min = $request->s_min();
        $e_hour = $request->e_hour();
        $e_min = $request->e_min();
        $thirteen = new \DateTime('13:00');
        $zero = new \DateTime('24:00');
        $now_time = new \DateTime('now');
        if ($thirteen < $now_time && $now_time < $zero) {
            if ( $s_hour < 13) {
                $s_now_date = date('Y-m-d', strtotime("+1 day"));
            }else{
                $s_now_date = date('Y-m-d');
            }
            if ( $e_hour < 13) {
                $e_now_date = date('Y-m-d', strtotime("+1 day"));
            }else{
                $e_now_date = date('Y-m-d');
            }
            $start = $s_now_date . " " . $s_hour . ":" . $s_min .":" . "00";
            $end = $e_now_date . " " . $e_hour . ":" . $e_min .":" . "00";
            $reserve = new Reserve;
            $reserve->start = $start;
            $reserve->end = $end;
            $reserve->user_id = $request->userId();
            $reserve->save();
            return redirect()->route('user.index')
                   ->with('feedback.success', "予約に成功しました。");
        }else{
            return redirect()->route('user.index')
                   ->with('feedback.false', "予約に失敗しました。");
        }
    }
}
