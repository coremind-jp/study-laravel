<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\FileNotFoundException;

class LogMiddleware
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
        $log_file = '/usr/share/nginx/html/access.log';

        file_put_contents($log_file, date('Y-m-d H:i:s')."\n", FILE_APPEND);

        $lines = explode(PHP_EOL, File::get($log_file));

        $splice_length = 5;

        $tail = implode(PHP_EOL, array_reverse(
            $splice_length < count($lines)
                ? array_splice($lines, -$splice_length)
                : $lines
        ));

        $request->merge([
            'msg' => 'middleware を利用してに現在のタイムスタンプをファイルに書き込みました。',
            'tail' => $tail
        ]);

        $response = $next($request);

        $response->setContent(str_replace(
            'replace me',
            'ここに記述されていた文字列は middleware によって書き換えられました',
            $response->content()
        ));

        return $response;
    }
}
