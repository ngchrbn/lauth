<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (Session()->has('applocale') and array_key_exists(Session()->get('applocale'), config('languages'))) {
                try {
                    App::setLocale(Session()->get('applocale'));
                } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
                    Log::error($e->getMessage());
                }
            }
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            Log::error($e->getMessage());
        }
        return $next($request);
    }
}
