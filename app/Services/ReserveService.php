<?php
// Tweetクラスに直接依存しないためのクラス（テストの観点で良い）

namespace App\Services;

use App\Models\Reserve;
use Carbon\Carbon;

class ReserveService
{
    public function getReserves()
    {
        // 時間を取得
        $now = Carbon::now();
        $hour = $now->format('H');
        if ($hour < 13) {
            $end_time = $now->setTime(10, 0, 0);
        }else{
            $end_time = $now->addDay()->setTime(10, 0, 0);
        }
        $now = Carbon::now();
        return Reserve::where('start', '>=', $now->toDateTimeString())
                        ->where('end', '<', $end_time->toDateTimeString())->get();
    }
    
}