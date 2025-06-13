<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if ($validate->fails()) {
            flash()->error('something went wrong');
            return redirect()->back()->withInput()->withErrors($validate);
        }
        
        $admin = User::where(['email' => $request->email])->first();
        // dd($admin);
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            flash()->error('Invalid credentials or unauthorized access');
            return redirect()->back()->withInput();
        }

        $request->session()->put('id', $admin->id);
        Auth::login($admin);

        flash()->success('Welcome Admin');
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        flash()->success('Logged out successfully.');
        return redirect()->route('admin.login');
    }

    public function admin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'role' => 'required|string',
            'password' => 'required|min:6|confirmed',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        flash()->success('Admin added successfully!');
        return redirect()->route('all.admin');
    }

    public function adminForm()
    {
        return view('admin.admin.admin');
    }

    public function adminList()
    {
        $data['admin'] = User::where('role', 'Admin')->get();
        return view('admin.admin.admin_all', $data);
    }

    public function productManager()
    {
        return view('admin.admin.product_manager');
    }

    public function productManagerPost(Request $request)
    {
      $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'role' => 'required|string',
            'password' => 'required|min:6|confirmed',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        flash()->success('Product Manager added successfully!');
        return redirect()->route('all.product.manager');
    }

    public function productManagerList()
    {
        $data['productManager'] = User::where('role', 'Product Manager')->get();
        return view('admin.admin.all_product_manager', $data);
    }

    public function machineOperator()
    {
        return view('admin.admin.machine_operator');
    }

    public function machineOperatorPost(Request $request)
    {
     $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'role' => 'required|string',
            'password' => 'required|min:6|confirmed',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        flash()->success('Machine Operator added successfully!');
        return redirect()->route('all.machine.operator');
    }

    public function machineOperatorList()
    {
        $data['machineOperator'] = User::where('role', 'Machine Operator')->get();
        return view('admin.admin.all_machine_operator', $data);
    }

    public function dispatch()
    {
        return view('admin.admin.dispatch');
    }

    public function dispatchPost(Request $request)
    {
         $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'role' => 'required|string',
            'password' => 'required|min:6|confirmed',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        flash()->success('Dispatch added successfully!');
        return redirect()->route('all.dispatch');
    }

    public function dispatchList()
    {
        $data['dispatch'] = User::where('role', 'Dispatch')->get();
        return view('admin.admin.all_dispatch', $data);
    }
}
