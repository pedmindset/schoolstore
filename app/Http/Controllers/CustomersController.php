<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class CustomersController.
 *
 * @package namespace App\Http\Controllers;
 */
class CustomersController extends Controller
{
    public function dashboard()
    {
        $guarantors = 
        return view('customers.dashboard');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        $profile = Profile::whereUserId(auth()->id())->first();
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->date_of_birth = $request->dob;
        $profile->save();

        Session::flash('success', 'Profile updated successfully!');
        return back();
    }
}
