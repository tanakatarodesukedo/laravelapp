<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\HelloController;
use Illuminate\Http\Request;

class SampleController extends HelloController
{
    public function __construct()
    {
    }

    public function index()
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        return view('hello.index', $this->getInitData($sample_msg, null, $sample_data));
    }

    public function other(Request $request)
    {
        $request->bye = 'SAMPLE-CONTROLLER-OTHER!!';
        return parent::other($request);
    }
}
