<?php

namespace App\Http\Middleware;

use Closure;

class CatchExceptions
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
        $response = $next($request);
        $e = $response->exception;

        if ($e) {
            return $this->formattedError($e);
        }
        
        return $response;
    }

    private function formattedError($e)
    {
        return response()->json([
            "error" => [
                "message" => $e->getmessage(),
                "internal" => [
                    "message" => $e->getmessage(),
                    "file" => $e->getfile(),
                    "line" => $e->getline(),
                ]
            ]
        ], 400);
    }
}
