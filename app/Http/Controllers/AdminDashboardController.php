<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // if (is_null($this->user) || !$this->user->can('dashboard.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        // }

        $total_roles = count(Role::select('id')->get());
        $total_admins = count(User::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        return view('backend.dashboard.index', compact('total_admins', 'total_roles', 'total_permissions'));
    }
}
