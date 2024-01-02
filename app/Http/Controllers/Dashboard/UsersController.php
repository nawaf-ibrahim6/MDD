<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users=User::all();
        return view('dashboard.user_view')->with('users',$users);
    }

    public function create()
    {
        return view('dashboard.user_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role'     => ['required', 'in:super_admin,admin,user'],
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->username=$request->username;
        $user->role=$request->role;
        $user->password=Hash::make($request->password);
        $user->save();

        return back()->withStatus(__('user is created successfully'));
    }

    public function edit(User $user)
    {
        return view('dashboard.user_edit')->with('user',$user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['string', 'max:255'],
            'username' => ['string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ($request->password)?['string', 'min:8']:[],
            'role'     => ['in:super_admin,admin,user'],
        ]);

        if($request->name)
            $user->name=$request->name;
        if($request->username)
            $user->username=$request->username;
        if($request->password)
            $user->password=Hash::make($request->password);
        if($request->role)
            $user->role=$request->role;
        $user->save();

        return back()->withStatus(__('user is updated successfully'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->withStatus(__('user is deleted successfully'));
    }

    public function edit_profile()
    {
        return view('dashboard.profile');
    }

    public function update_profile(Request $request)
    {
        $user = to_user(Auth::user());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);
        if($request->name)
            $user->name=$request->name;
        if($request->username)
            $user->username=$request->username;
        $user->save();
        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function change_password(Request $request)
    {
        $user = to_user(Auth::user());
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if(!Hash::check($request->old_password, auth()->user()->password))
            return back()->withErrors(['old_password'=>'The current password field does not match your password']);
        $user->password=Hash::make($request->password);
        $user->save();
        return back()->withStatus(__('Password successfully updated.'));
    }
}
