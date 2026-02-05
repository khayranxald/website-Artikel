<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptimizeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Compress HTML output
        if ($response instanceof Response && $response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $content = $response->getContent();
            
            // Remove comments
            $content = preg_replace('/<!--(?!<!)[^\[>].*?-->/s', '', $content);
            
            // Remove whitespace
            $content = preg_replace('/\s+/', ' ', $content);
            
            $response->setContent($content);
        }

        // Add caching headers
        $response->headers->set('Cache-Control', 'public, max-age=3600');
        
        return $response;
    }
}