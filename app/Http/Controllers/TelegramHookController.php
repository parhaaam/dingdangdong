<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Telegram\TelegramResponseService;

class TelegramHookController extends Controller
{

    public function __construct(private TelegramResponseService $telegramResponseService)
    {
    }

    public function hook(Request $request)
    {
        return $this->telegramResponseService->sendResonse($request);
    }
}
