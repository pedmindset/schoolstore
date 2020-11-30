<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGuarantorRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Guarantor;
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
        $guarantors = Guarantor::whereHas('user', function($query){
            $query->where('user_id', auth()->id());
        })->get();

        return view('customers.dashboard', [
            "gurantors" => $guarantors,
        ]);
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

    public function createGuarantor(CreateGuarantorRequest $request)
    {
        $guarantor = new Guarantor();
        $guarantor->name = $request->name;
        $guarantor->email = $request->email;
        $guarantor->phone = $request->phone;
        $guarantor->address = $request->address;
        $guarantor->save();

        $guarantor->user()->attach(auth()->id());

        Session::flash('success', 'Guarantor addded successfully!');
        return back();
    }
}
