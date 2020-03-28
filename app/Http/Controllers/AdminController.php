<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\District;
use App\Area;
use App\Category;
use App\Post;
use App\Faq;
use App\Emergency;
use Alert;
use Auth;
use DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	return view('admin.dashboard');
    }

    public function allUsers(){
    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$users = User::orderBy('created_at','desc')->paginate(15);
    	return view('admin.allUsers',compact('users'));
    }

    public function onlineUsers(){
    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$users = User::all()->paginate(15);
    	return view('admin.onlineUsers',compact('users'));
    }

    public function activeDonors(){
    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$users = User::where('availability','1')->paginate(15);
    	return view('admin.activeDonors',compact('users'));
    }

    public function emergencyDonors(){

    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$users = User::where('emergency_contact',true)->paginate(15);
    	return view('admin.emergencyDonors',compact('users'));
    }

    public function deleteUser($id){

    	$users = User::findOrFail($id)->delete();

    	return redirect()->back()->withSuccessMessage('User Deleted');
    }

    public function blockUser($id){
    	$users = User::findOrFail($id);
    	$user->is_active = 0;
    	$user->save();

    	return redirect()->back()->withSuccessMessage('User Blocked');
    }


	public function addAddress(){

		if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

		$districts = District::all();
    	return view('admin.addAddress',compact('districts'));
    }

    public function addAddressStore(Request $request){

    	$validation = $request->validate([
                'district' => 'required',
                'area_name' => 'required|string|unique:areas',
            ]);

    	$area = new Area;
    	$area->district_id = $request->district;
    	$area->area_name = $request->area_name;
    	$area->save();
    	return redirect()->back()->withSuccessMessage('Area Successfully Added');
    }

    public function allDistricts(){

		$districts = District::orderBy('district_name','desc')->paginate(15);
    	return view('admin.districts',compact('districts'));
    }

    public function allAreas(){

		$areas = Area::orderBy('area_name')->paginate(15);
    	return view('admin.areas',compact('areas'));
    }


    public function addPost(){

		if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

		$categories = Category::all();
    	return view('admin.addPost',compact('categories'));
    }

    public function addPostStore(Request $request){

    	$validation = $request->validate([
                'title' => 'required',
                'category_name' => 'required',
                'body' => 'required',
                'image' => '',
            ]);

    	$post = new Post;
    	$post->title = $request->title;
    	$post->category_id = $request->category_name;
    	$post->body = $request->body;
    	$post->user_id = Auth::user()->id;
    	$post->save();


    	 if ($request->hasFile('image')) {
       
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $fileExtension = $image->getClientOriginalExtension();

            $image->move('uploads/', $fileName);

            $post->image = 'uploads/' . $fileName;
        }

        $post->save();

    	return redirect()->back()->withSuccessMessage('Post Successfully Added');
    }

    public function allPosts(){

		if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

		$posts = Post::orderBy('created_at','desc')->paginate(10);
    	return view('admin.allPosts',compact('posts'));
    }

    public function deletePost($id){

    	$post = Post::findOrFail($id)->delete();

    	return redirect()->back()->withSuccessMessage('Post Deleted');
    }

    public function editPost($id){
    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$post = Post::findOrFail($id);
    	$categories = Category::all();

    	return view('admin.editPost',compact('post','categories'));
    	
    }

    public function editPostStore(Request $request, $id){

    	$post = Post::findOrFail($id);

    	$post->title = $request->title;
    	$post->category_id = $request->category_name;
    	$post->body = $request->body;
    	$post->user_id = Auth::user()->id;
    	$post->save();


    	 if ($request->hasFile('image')) {
       
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $fileExtension = $image->getClientOriginalExtension();

            $image->move('uploads/', $fileName);

            $post->image = 'uploads/' . $fileName;
        }

        $post->save();

    	return redirect()->back()->withSuccessMessage('Post Updated');
    }


    public function categories(){

    	if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

    	$categories = Category::where('status',true)->paginate(10);
    	return view('admin.categories',compact('categories'));
    }

   public function addCategory(Request $request)
   {
   	 $category = new Category;
   	 $category->category_name = $request->category_name;
   	 $category->status = $request->status;
   	 $category->user_id = Auth::user()->id;
   	 $category->save();
   	 return redirect()->back()->withSuccessMessage('Category Added Successfully');
   }

    public function deleteCategory($id){

    	$category = Category::findOrFail($id)->delete();

    	return redirect()->back()->withSuccessMessage('Category Deleted');
    }

    public function blockCategory($id){
    	$category = Category::findOrFail($id);
    	$category->status = 0;
    	$category->save();

    	return redirect()->back()->withSuccessMessage('Category Inactivated');
    }

    public function faqs(){

        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $faqs = Faq::orderBy('created_at','desc')->paginate(10);
        return view('admin.faqs',compact('faqs'));
    }

    public function addFaqs()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        return view('admin.addFaqs');
    }

    public function addFaqStore(Request $request)
    {
     $faq = new Faq;
     $faq->question = $request->question;
     $faq->answer = $request->answer;
     $faq->added_by = Auth::user()->id;
     $faq->save();

     return redirect()->back()->withSuccessMessage('Faq Added Successfully');
    }

    public function deleteFaq($id){

        $category = Faq::findOrFail($id)->delete();

        return redirect()->back()->withSuccessMessage('Faq Deleted Successfully');
    }

    public function editFaq(Request $request, $id){

        $faq = Faq::findOrFail($id);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->withSuccessMessage('Faq Successfully Updated');
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query)->orWhere('phone', 'like', '%'.$query.'%')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        if($row->gender == 1){
            $gender = "Male";
        }
        else {
            $gender = "Female";
        }

        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->phone.'</td>
         <td>'.$row->blood_group.'</td>
         <td>'.$row->weight.'</td>
         <td>'.$gender.'</td>
         <td>'.$row->total_donated.'</td>
         <td>'.$row->created_at.'</td>
         <td>
            <a href="#viewModal-'.$row->id.'" class="btn btn-sm btn-primary" data-toggle="modal" >View</a>
            <a href="#blockModal-'.$row->id.'"  data-toggle="modal" class="btn btn-sm btn-dark" >Block</a>
            <a href="#deleteUserModal-'.$row->id.'" class="btn btn-sm btn-danger" data-toggle="modal" >Delete</a>
         </td>
        </tr>
        ';
        }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="10">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }


    public function emergencyCon()
    {

     if (session('success_message')) {
          Alert::success(session('success_message'))->toToast()->position('center-end');
     }

      $emergencies = Emergency::orderBy('priority_status','desc')->paginate(30);
      return view('admin.emergencyContact',compact('emergencies'));
    }

    public function AddEmergencyContact(Request $request)
    {
      $validation = $request->validate([
                'contact_name' => 'required',
                'contact_number' => 'required',
            ]);

      $emergencies = new Emergency;
      $emergencies->contact_name = $request->contact_name;
      $emergencies->contact_number = $request->contact_number;
      $emergencies->priority_status = $request->priority_status;
      $emergencies->save();

      return back()->withSuccessMessage('Emergency Contact Added To List');
    }

    public function EditEmergencyContact(Request $request,$id)
    {
      $emergencies = Emergency::findOrFail($id);

      $emergencies->contact_name = $request->contact_name;
      $emergencies->contact_number = $request->contact_number;
      $emergencies->priority_status = $request->priority_status;
      $emergencies->save();

      return back()->withSuccessMessage('Emergency Contact Updated');
    }

    
    public function deleteEmergencyContact($id){

        $category = Emergency::findOrFail($id)->delete();

        return redirect()->back()->withSuccessMessage('Emergency Contact Deleted Successfully');
    }

}
