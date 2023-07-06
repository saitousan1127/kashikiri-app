<?php
// Tweetクラスに直接依存しないためのクラス（テストの観点で良い）

namespace App\Services;

use App\Models\US;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class USService
{
    public function getUS()
    {
        $last = US::orderBy('created_at', 'DESC')->limit(1)->get();

        if (empty($last[0])) {
            return 'ご利用なし';
        }
        //dd($last);
        if(is_null($last[0]['end'])) {
            return 'ご利用中';
        }else{
            return 'ご利用なし';
        }

    }
    public function change()
    {
        DB::transaction(function (){
			$us = US::orderBy('created_at', 'DESC')->limit(1)->first();
            $now_time = new \DateTime('now');
            $us->end = $now_time->format('Y-m-d H:i:s');
			$us->save();
		});
    }
    
}