<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Closure;

class checkUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
	 * @param  \$permissions	Sending role from routes.
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
		if(Auth::check())
		{
			$current_user_id = Auth::id();
			$logged_in_user_role = Auth::user()->user_role;
			if($logged_in_user_role == $permissions)
			{
				return $next($request);
			}
		}
		return redirect('/login');
    }
}
