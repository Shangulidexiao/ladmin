<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

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
