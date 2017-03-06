<?php

namespace App\Domain\_Classes;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $auth;
    private $successCode = 200;
    private $contentTypeJson = ['Content-Type' => 'application/json'];

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    public function view($view, $data = [], $mergeData = [])
    {
        $data['auth'] = $this->auth;

        return view($view, $data, $mergeData);
    }

    public function getJsonSuccess($data = null, $message = null)
    {
        $data = [
            'code'      => $this->successCode,
            'message'   => $message,
            'data'      => $data,
        ];

        return response($data, $this->successCode, $this->contentTypeJson);
    }

    public function getJsonError(\Exception $e, $message = null)
    {
        $data = [
            'code'      => $e->getCode(),
            'message'   => $message ? $message : $e->getMessage(),
        ];

        return response($data, $e->getCode(), $this->contentTypeJson);
    }
}
