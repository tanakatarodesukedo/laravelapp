<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
    <style>
        body {font-size:16pt; color:#999;}
        h1 {font-size:120pt; text-align:right; color:#eee;
            margin:-50px 0px -120px 0px;}
    </style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt)
{
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    public function index() {
        $data = [
            ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
            ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
            ['name'=>'鈴木さちこ', 'mail'=>'sachiko@happy']
        ];
        return view('hello.index', ['data'=>$data]);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = [
            'msg'=>$msg
        ];
        return view('hello.index', $data);
    }
}
