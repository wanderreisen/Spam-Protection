<?php

namespace Wanderreisen\SpamProtection;

use Closure;
use Exception;
use Illuminate\Http\Request;

class SpamProtection
{
    
    public function handle(Request $request, Closure $next)
    {
        if ( ! config('spamprotection.enabled')) {
            return $next($request);
        }
        
        if ( ! $request->isMethod('POST')) {
            return $next($request);
        }
        
        $value = $request->get(config('spamprotection.name_field'));
        
        if ( ! empty($value)) {
            return $this->respondToSpam($request, $next);
        }
        
        if ($validFrom = $request->get(config('spamprotection.time_field'))) {
            try {
                $time = new EncryptedTime($validFrom);
            } catch (Exception $decryptException) {
                $time = null;
            }
            
            if ( ! $time || $time->isFuture()) {
                return $this->respondToSpam($request, $next);
            }
        }
        
        return $next($request);
    }
    
    private function respondToSpam()
    {
    
    }
}
