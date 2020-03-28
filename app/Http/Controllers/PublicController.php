<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Area;
use App\Address;
use App\User;
use App\Post;
use App\Category;
use App\Search;
use App\Contact;
use App\Faq;
use App\Emergency;
use Auth;
use Alert;


class PublicController extends Controller
{
    public function index()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();

        $districts = District::all();
    	return view('welcome',compact('districts','posts'));
    }

    public function about()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'));
        }

    	return view('about');
    }

    public function contact_message(Request $request)
    {
        $contact = new Contact;
        $contact->fullname = $request->fullname;
        $contact->contact = $request->contact;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return back()->withSuccessMessage('Thank You for contacting us. We will get back to you !');

    }

    public function blog()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(12);
    	return view('blog',compact('posts'));
    }

    public function faq()
    {
        $faqs = Faq::orderBy('created_at','desc')->paginate(10);
    	return view('faq',compact('faqs'));
    }

    public function search()
    {
        return view('searchResult');
    }

    public function searchResult(Request $request)
    {

        $validation = $request->validate([
                'blood_group' => 'required',
                'area' => 'required',
                'district' => 'required',
            ]);

        $blood_group = $request->blood_group;
        $area_id = $request->area;

        $userip = $request->ip();

        $search = new Search;
        $search->ip = $userip;
        if (Auth::check()) {
            $search->user_id = Auth::user()->id;
        } else {
            $search->user_id = 0;
        }
        $search->area_id = $area_id;
        $search->blood_group = $blood_group;
        $search->save();
        


        $districts = District::all();
        $area = Area::where('id',$area_id)->first();

        $users = Address::WhereHas('user', function($q) use ($blood_group,$area_id) {
            return $q->where('blood_group', $blood_group)->where('area_id',$area_id)->where('availability',1
        )->orderBy('total_donated','desc');
        })->paginate(10);

        $emergencies = Address::WhereHas('user', function($q) use ($blood_group,$area_id) {
            return $q->where('blood_group', $blood_group)->where('area_id',$area_id)->where('emergency_contact',1)->orderBy('total_donated','desc');

        })->paginate(10);

       // dd($users);


        return view('searchResult',compact('users','districts','blood_group','area','emergencies'));
    }

    public function singlePost($id)
    {

        $categories = Category::limit(5)->get();
        $post = Post::findOrFail($id);
        $recent = Post::orderBy('created_at','desc')->limit(3)->get();

        return view('singlePost',compact('post','categories','recent'));
    }

    public function emergency()
    {
        $emergencies = Emergency::orderBy('priority_status','desc')->paginate(20); 
        return view('emergency',compact('emergencies'));
    }

    public function findArea(Request $request)
    {
        $data = Area::select('area_name','id','district_id')->where('district_id',$request->id)->take(100)->get();
        return response()->json($data);
    }


}
