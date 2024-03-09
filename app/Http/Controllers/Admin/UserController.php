<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::latest()->paginate(10); // Corrected method names: latest() and paginate()
        // return Inertia::render('Dashboard/users', ['users' => $users]); // Pass $users to the view


        $search = request()->input('search');
        $users = User::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(5)
            ->withQueryString()
            ->through(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role'=> $user->role,
                    'status' => $user->status,
                    'img' => $user->img,
                    'created_at' => $user->created_at->diffForHumans(),
                ];
            });
        return Inertia::render('Dashboard/users', [
            'users' => $users,
            'filters' => request()->only(['search']),
        ]);

    }
}
