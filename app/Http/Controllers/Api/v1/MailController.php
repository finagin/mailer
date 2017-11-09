<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Jobs\Api\v1\Mail\Send;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Mail\Send as RequestSend;

class MailController extends Controller
{
    public function send(RequestSend $request)
    {
        try {
            return response()->success(Send::dispatch($request->all()));
        } catch (Exception $e) {
            return response()->error($e->getMessage());
        }
    }
}
