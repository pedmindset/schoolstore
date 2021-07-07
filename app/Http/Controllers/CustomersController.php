<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\School;
use App\Models\Account;
use App\Models\Profile;
use App\Models\Guarantor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SchoolCategory;
use App\Models\ThirdPartyAccess;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\CreateGuarantorRequest;
use App\Http\Requests\UpdateGuarantorRequest;

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

        $account = Account::whereUserId(auth()->id())->first();

        $pendingOrders = Order::whereUserId(auth()->id())
                                ->where('status', '!=', 'delivered')
                                ->where('status', '!=', 'failed')
                                ->where('status', '!=', 'cancelled')
                                ->get();

        $transactions = Transaction::whereUserId(auth()->id())
                                    ->latest()
                                    ->limit(5);

        $school_categories = SchoolCategory::get(['id', 'name']);

        $profile = auth()->user()->profile;
        $profile_picture = $profile->getFirstMedia('profile');
        $attachments = $profile->getMedia('attachments');

        $third_party_accesses = ThirdPartyAccess::limit(10)->latest()->get();

        return view('customers.dashboard', [
            "gurantors" => $guarantors,
            "account" => $account,
            "pendingOrders" => $pendingOrders,
            "transactions" => $transactions,
            "school_categories" => $school_categories,
            "profile_picture" => $profile_picture,
            "attachments" => $attachments,
            "third_party_accesses" => $third_party_accesses
        ]);
    }

    public function updateMomo(Request $request)
    {
        $profile = Profile::whereUserId(auth()->id())->first();
        $profile->phone = $request->phone;
        $profile->mobile_money_number = $request->momo;
        $profile->save();

        Session::flash('success', 'Phone & Mobile Money Number updated successfully!');
        return redirect('shop/dashboard#verification');
    }


    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = Profile::whereUserId(auth()->id())->first();
        $profile->phone = $request->phone;
        $profile->phone2 = $request->momo;
        $profile->address = $request->address;
        $profile->school_category_id = $request->level;
        $profile->date_of_birth = $request->dob;
        $profile->save();

        Session::flash('success', 'Profile updated successfully!');
        return redirect('shop/dashboard#profile');
    }

    public function createGuarantor(CreateGuarantorRequest $request)
    {
        $guarantor = new Guarantor();
        $guarantor->name = $request->name;
        $guarantor->email = $request->email;
        $guarantor->phone = $request->phone;
        $guarantor->momo_phone = $request->momo;
        $guarantor->address = $request->address;
        $guarantor->save();

        $guarantor->user()->attach(auth()->id());

        Session::flash('success', 'Guarantor addded successfully!');
        return redirect('shop/dashboard#guarantors');
    }

    public function updateGuarantor(UpdateGuarantorRequest $request)
    {
        $guarantor = Guarantor::find($request->guarantor_id);
        $guarantor->name = $request->guarantor_name;
        $guarantor->email = $request->guarantor_email;
        $guarantor->phone = $request->guarantor_phone;
        $guarantor->address = $request->guarantor_address;
        $guarantor->momo_phone = $request->guarantor_momo;
        $guarantor->save();

        if($guarantor){
            Session::flash('success', 'Guarantor updated successfully!');
            return redirect('shop/dashboard#guarantors');
        }

        Session::flash('error', 'Guarantor not found!');
        return redirect('shop/dashboard#guarantors');
    }

    public function deleteGuarantor($id)
    {
        $guarantor = Guarantor::find($id);

        if($guarantor){
            $guarantor->delete();
            Session::flash('success', 'Guarantor deleted successfully!');
            return redirect('shop/dashboard#guarantors');
        }

        Session::flash('error', 'Guarantor not found!');
        return redirect('shop/dashboard#guarantors');
    }
}
