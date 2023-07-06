<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReserveService;
use App\Services\USService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReserveService $reserveService, USService $usService)
    {
        $reserves = $reserveService->getReserves();
        $us = $usService->getUS();
        //dump($reserves);
        //app(\App\Exceptins\Handler::class)->render(request(), throw new \Error('dumpreport.'));
        return view('user.index', ['reserves' => $reserves, 'us' => $us]);
    }
}
