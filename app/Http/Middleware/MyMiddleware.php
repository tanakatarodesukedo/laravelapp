<?php

namespace App\Http\Middleware;

use App\Facades\MyService;
use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // before処理・開始
        $id = rand(0, count(MyService::allData()));
        MyService::setId($id);
        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::allData()
        ];
        $request->merge($merge_data);
        // before処理・終了

        $response = $next($request);

        // after処理・開始
        $content = $response->content();
        $content .= '<style>
            body { background-color: #eef; }
            p { font-size: 18pt; }
            li { color: red; font-weight:bold; }
        </style>';
        $response->setContent($content);
        // after処理・終了

        return $response;
    }
}
