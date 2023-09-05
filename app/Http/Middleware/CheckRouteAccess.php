<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckRouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $protectedRoutes = [
            'home',
            'diaries.index',
            'diaries.create',
            'diaries.show',
            'diaries.edit',
            'diaries.update',
            'diaries.store',
            'diaries.destroy',
            'diaries.print',
            'documentations.index',
            'documentations.create',
            'documentations.store',
            'documentations.show',
            'documentations.edit',
            'documentations.update',
            'documentation.destroy',
            'documentation.index',
            'documentation.create',
            'documentation.store',
            'documentation.show',
            'documentation.edit',
            'documentation.update',
            'documentation.destroy',
            'approval_request.index',
            'approval_request.create',
            'approval_request.store',
            'approval_request.show',
            'approval_request.edit',
            'approval_request.update',
            'approval_request.destroy',
            'approval_request.print',
            'approval_request.approve',
            'approval_request.reject',
            'users.index',
            'users.create',
            'users.store',
            'users.show',
            'users.edit',
            'users.update',
            'users.destroy',
            'users.updateProfileName',
            'profile.index',
            'profile.update',
        ];

        $currentRouteName = $request->route()->getName();
        
        $isProtectedRoute = in_array($currentRouteName, $protectedRoutes);
        // dd($currentRouteName, $isProtectedRoute, Auth::check());

        if ($isProtectedRoute && !Auth::check()) {
            return redirect()->route('no_permission');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $allowedRoles = [];
            if ($currentRouteName === 'home' || (in_array($currentRouteName,[

                'diaries.index',
                'diaries.create',
                'diaries.changeStatus',
                'diaries.show',
                'diaries.edit',
                'diaries.store',
                'diaries.destroy',
                'diaries.update',
                'diaries.print',

                'documentations.index',
                'documentations.create',
                'documentations.store',
                'documentations.show',
                'documentations.edit',
                'documentations.update',
                'documentation.destroy',
                'documentation.index',
                'documentation.create',
                'documentation.store',
                'documentation.show',
                'documentation.edit',
                'documentation.update',
                'documentation.destroy',

               
                
         
            ]))) {
                $allowedRoles = [1,2,3]; // Admin, Supervisor, Trainee
            } elseif (in_array($currentRouteName, [                    
                
                'approval_request.index',
                'approval_request.create',
                'approval_request.store',
                'approval_request.show',
                'approval_request.edit',
                'approval_request.update',
                'approval_request.destroy',
                'approval_request.print',
                'approval_request.approve',
                'approval_request.reject',
          

                ])) {
                $allowedRoles = [1,2]; // Admin, Supervisor,
            } elseif (in_array($currentRouteName,[
                

                'users.index',
                'users.create',
                'users.store',
                'users.show',
                'users.edit',
                'users.update',
                'users.destroy',

                
            ])) {
                $allowedRoles = [1]; // Admin
                
            }
            
            if (!in_array($user->role_id, $allowedRoles)) {
                return redirect()->route('no_permission');
            }
        }

        return $next($request);
    }
}