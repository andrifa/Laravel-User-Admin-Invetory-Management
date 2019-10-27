<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin', compact('users'))
            ->with('i',(request()->input('page',1)-1)*5);
    }


    public function update(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'active':
                $user = User::find($id);
                $user->status = "active";
                $user->save();
                return redirect()->route('admin.dashboard')
                                ->with('success', 'User activated successfully');
                break;

            case 'disable':
                $user = User::find($id);
                $user->status = "disable";
                $user->save();
                return redirect()->route('admin.dashboard')
                                ->with('success', 'User disabled successfully');
                break;

            case 'reset':
                $user = User::find($id);
                $user->password = bcrypt("password");
                $user->save();
                return redirect()->route('admin.dashboard')
                                ->with('success', 'Password reset successfully');
                break;
    
            case 'delete':
                $user = User::find($id);
                $user->delete();
                return redirect()->route('admin.dashboard')
                                ->with('success', 'User deleted successfully');
                break;
    
        }
        //
        
    }

    public function destroy($id)
    {
        //
        
    }
}
