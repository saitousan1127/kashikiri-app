<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\USService;

class ChangeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, USService $usService)
    {
        if ($usService->getUS() == "ご利用中"){
            $usService->change();
            return redirect()->route('admin.index')
               ->with('feedback.success', "変更に成功しました。");
        }else{
            return redirect()->route('admin.index')
               ->with('feedback.success', "変更に失敗しました。");
        }
    }
}
