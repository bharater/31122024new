<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'pin_code' => ['required', 'digits:6'],
            'address' => ['required', 'string', 'max:499'],
        ]);

        $user = Auth::user();

        if ($user) {
            $user->update([
                'name' => $request->username
            ]);

            $user->userDetail()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'pin_code' => $request->pin_code,
                    'address' => $request->address,
                ]
            );

            return redirect()->back()->with('message', 'User Profile Updated');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    public function passwordCreate()
    {
        return view('frontend.user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Current Password does not match');
        }
    }
}
