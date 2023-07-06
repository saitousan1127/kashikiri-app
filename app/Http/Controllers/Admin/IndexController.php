<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.index', ['reserves' => $reserves, 'us' => $us]);
    }
}
