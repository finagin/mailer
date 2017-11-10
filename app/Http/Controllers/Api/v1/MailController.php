<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Jobs\Api\v1\Mail\Send;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Mail\Send as RequestSend;
use App\Http\Requests\Api\v1\Mail\PlatformaLP as RequestPlatformaLP;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')
            ->except('platformalp');
    }

    public function send(RequestSend $request)
    {
        try {
            return response()->success(Send::dispatch($request->all()));
        } catch (Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function platformalp(RequestPlatformaLP $request)
    {
        try {
            $body = '';
            foreach ($request->input('fields') as $field) {
                $body .= $field['name'].': '.($field['value'] ?? '').'<br>';
            }

            $host = parse_url($_SERVER['HTTP_REFERER'] ?? $_SERVER['HTTP_HOST'], PHP_URL_HOST) ? '' : 'platformalp.ru';
            $site = parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_HOST) ?? '';

            Send::dispatch([
                'from' => 'no-reply@'.$host,
                'to' => env('BLASTINGRF_MAIL', 'spam@finag.in'),
                'subject' => 'Заявка с сайта '.$site,
                'body' => $body,
                'driver' => 'sendmail',
            ]);

            return response()
                ->json([
                    'result' => 1,
                    'time' => time(),
                    'msg' => $request->input('form.msg'),
                ])
                ->withCallback(request()->input('callback'));
        } catch (Exception $e) {
            return response()->error($e->getMessage());
        }
    }
}
