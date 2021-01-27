<?php

namespace App\Http\Middleware;

use App\Models\Passport;
use Closure;
use Validator;

class TokenValidation
{
    protected $token;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */



    public function handle($request, Closure $next, Validator $validator)
    {
        // Pre-Middleware Action
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
