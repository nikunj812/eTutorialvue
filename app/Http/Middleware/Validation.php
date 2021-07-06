<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class Validation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = User::make($request->all(), [
            'email'       => 'email|unique:table_name,col_name',
           ],[
            'email.unique' => 'email is already in used',
          ]);
       
       if ($validator->fails()) {
           return redirect()->back()->withInput($request->all())->withErrors($validator);
         }
        return $next($request);
    }
}
