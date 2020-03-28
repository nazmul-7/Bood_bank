<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use Hash;

use App\User;
use App\District;
use App\Donation;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){

        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $donations = Donation::where('user_id',Auth::user()->id)->orderBy('donation_date','desc')->get();

    	$districts = District::all();

    	return view('user.profile',compact('districts','donations'));
    }

    public function storeTotalDonated(Request $request,$id)
    {
    	$donated = $request->total_donated;

    	$user = User::findOrFail($id);

    	$user->total_donated = $donated;
    	$user->save();

    	return back()->withSuccessMessage('Profile has been updated !');

    }

    public function storeTotalDonatedNo(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $user->total_donated = 0;
        $user->save();

        return back()->withSuccessMessage('Profile has been updated !');

    }

    public function profileUpdate(Request $request,$id)
    {

        $name = $request->name;
        $phone = $request->phone;
        $blood_group = $request->blood_group;
        $weight = $request->weight;
        $gender = $request->gender;
        $email = $request->email;
        $facebook_url = $request->facebook_url;

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->phone = $phone;
        $user->blood_group = $blood_group;
        $user->weight = $weight;
        $user->gender = $gender;
        $user->email = $email;
        $user->facebook_url = $facebook_url;

        $user->save();

        //toast('Profile Updated !','success','bottom-right');

        return back()->withSuccessMessage('Profile has been updated !');

    }

    public function emergency_contact(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->emergency_contact = $request->emergency_contact;
        $user->save();

        return back()->withSuccessMessage('Profile has been updated !');
    }

    public function desable_search(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->availability = $request->availability;
        $user->save();

        return back()->withSuccessMessage('Profile has been updated !');
    }

    public function donation_date(Request $request)
    {

        $donation = new Donation;
        $donation->user_id = Auth::user()->id;
        $donation->donation_date = $request->date;
        $donation->save();

        return back()->withSuccessMessage('Blood donation date added !');
    }

    public function deleteDonationDate($id)
    {

        $donation = Donation::findOrFail($id)->delete();

        return back()->withSuccessMessage('Blood donation date deleted !');
    }

    public function changePassword(Request $request,$id)
    {
            $user = User::findOrFail($id);
            
            if (!(Hash::check($request['password'],Auth::user()->password))) {
                return redirect()->back()->with('error',"Your current password does not match with password you provided.");
            }

             if (strcmp($request['password'], $request['new_password']) == 0) {
                return redirect()->back()->with('error',"New password can not be same as your current password.");
            }

            $validation = $request->validate([
                'new_password' => ['required', 'string', 'min:8'],
            ]);
            
            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->withSuccessMessage('Password changed successfully');
    }


}
