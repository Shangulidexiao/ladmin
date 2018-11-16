<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gregwar\Captcha\PhraseBuilder;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
    public function index(Request $request)
    {
        $captchaBuilder = new CaptchaBuilder(4);
        $captchaBuilder->setMaxFrontLines(2)->build();
        $request->session()->put('captcha', $captchaBuilder->getPhrase());
        return response($captchaBuilder->output())->header('Content-type','image/jpeg');
    }
}
