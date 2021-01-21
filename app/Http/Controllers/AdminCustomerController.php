<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function activate(User $user)
    {
        $user->update(['active' => true]);
        return redirect()->back();
    }

    public function deactivate(User $user)
    {
        $user->update(['active' => false]);
        return redirect()->back();
    }
}
