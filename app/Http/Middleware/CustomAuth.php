<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuth
{

    private function IsValidString ($token){
        if (!preg_match("#^[\(\)\[\]\{\}]+$#", $token)) return false;
        return true;
    }

    private function IsValidToken($token){
        $open = ["(", "{", "["];
        $queue = [];
        for ($i=0; $i < strlen($token); $i++){
            $current_char = $token[$i];
            if(in_array($current_char, $open)) $queue[] = $current_char;
            else{
                if (empty($queue)) return false;

                $last_open_char = array_pop($queue);
                if($last_open_char === '(' && $current_char !== ")" ) return false;
                if($last_open_char === '{' && $current_char !== "}" ) return false;
                if($last_open_char === '[' && $current_char !== "]" ) return false;
            }
        }
        return empty($queue);
    }

    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $valid = true;

        if(strlen($token) > 0){
            if(!$this->IsValidString($token)) $valid = false;
            else if (!$this->IsValidToken($token)) $valid = false;
        }

        if(!$valid){
            return response()->json([
                'msg'=> 'Invalid token',
            ],401);
        }

        return $next($request);
    }
}
