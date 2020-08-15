<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
    public function loginPage(request $request){
        if ($request->session()->has('logginedUser')) {
            # code...
            return redirect()->route('home')->with('flash_failure','user already logged');
        }
        return view('loginPage');
    }
    public function signupPage(request $request){
        if ($request->session()->has('logginedUser')) {
            # code...
            return redirect()->route('home')->with('flash_failure','user already logged');
        }
        return view('signupPage');
    }
    public function register(request $request){
        $rules = [
            'name' => 'required',
            'phone' => 'required|min:10|max:10|unique:users',
            'password' => 'required|min:6',
            'user_type' => 'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique:users' => 'This number is already registed'
        ];
    
        $this->validate($request, $rules, $customMessages);
        
        $name = $request->name;
        $phone = $request->phone;
        $user_type = $request->user_type;
        $password = $request->passwod;
        
        $user = DB::table('users')
        ->insert([
            'name' => $name,
            'phone' => $phone,
            'user_type' => $user_type,
            'password' => Hash::make($password),
            'created_at' => Carbon::now()
        ]);
        if ($user) {
            return redirect()->route('home')->with('flash_success','Your details are registed wait till superadmin approve you');
        }
    }
    public function login(request $request){
        $rules = [
            'phone' => 'required|min:10|max:10',
            'password' => 'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.',
        ];
    
        $this->validate($request, $rules, $customMessages);
        $phone = $request->phone;
        $password = $request->passwod;
        $checkExist = DB::table('users')
        ->where('phone',$phone)
        ->first();
        if (!is_null($checkExist)) {
            if ($checkExist->profile_status == 1) {
                if (Hash::check($password, $checkExist->password)) {
                    $request->session()->put('logginedUser',$checkExist);
                    return redirect()->route('home')->with('flash_success','login success');
                }else{
                    return back()->with('error','password is incurrect!');
                }
            }else{
            return back()->with('error','Your account is not approved yet!');
            }
        }else{
            return back()->with('error','number not registered please sign up');
        }
    }
    public function postPage(request $request){
        if ($request->session()->get('logginedUser') == 'user' and $request->session()->get('logginedUser') == '') {
            return redirect()->route('home');
        }
        $post = DB::table('posts')->where('user_id',$request->session()->get('logginedUser')->user_id)
        ->get();
        return view('postPage')->with('posts',$post);
    }
    public function postPageAdd(request $request){
        if ($request->session()->get('logginedUser') == 'user' and $request->session()->get('logginedUser') == '') {
            return redirect()->route('home');
        }
        return view('postPageAdd');
    }
    public function post(request $request){
        $rules = [
            'title' => 'required',
            'desc' => 'required|max:500|',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.',
        ];
    
        $this->validate($request, $rules, $customMessages);
        $title = $request->title;
        $desc = $request->desc;
        $savePost = DB::table('posts')
        ->insert([
            'title' => $title,
            'desc' => $desc,
            'user_id' => $request->session()->get('logginedUser')->user_id,
            'created_at' => Carbon::now(),
        ]);
        if ($savePost) {
            return redirect()->route('postPage')->with('flash_success','post saved successfully');
        } else {
            return back()->with('flash_success','post saved successfully');
        }
        
    }
    public function postFeed(request $request){
        if ($request->session()->get('logginedUser') == 'admin' and $request->session()->get('logginedUser') == '') {
            return redirect()->route('home');
        }
        $posts = DB::table('posts')
        ->join('users','users.user_id','=','posts.user_id')
        ->get()
        ->toArray();

        $admin = DB::table('users')
        ->where('user_type','admin')
        ->get();

        $data = [
            'posts' => array_reverse($posts),
            'admins' => $admin
        ];
        return view('postFeed')->with($data);
    }
    public function postFeedByUser($id){
        $postByadmin = DB::table('posts')
        ->join('users','users.user_id','=','posts.user_id')
        ->where('posts.user_id',$id)
        ->get()
        ->toArray();

        $by = DB::table('users')
        ->where('user_id',$id)
        ->first();

        $admins = DB::table('users')
        ->where('user_type','admin')
        ->get();
        $data = [
            'posts' => array_reverse($postByadmin),
            'admins' => $admins,
            'by' => $by,
        ];
        return view('postByUser')->with($data);
    }
    public function profiles(request $request){
        if ($request->session()->get('logginedUser')->user_type == 'superadmin' ) {
            $profiles = DB::table('users')->get()->toArray();
            return view('profiles')->with('profiles',array_reverse($profiles));
        }
        return redirect()->route('home');
    }
    public function ProfileApprove(request $request ,$user_id){
        if ($request->session()->get('logginedUser')->user_type == 'superadmin' ) {
            $profile = DB::table('users')
            ->where('user_id',$user_id)
            ->first();
            if ($profile->profile_status == 0) {
                # code...
                DB::table('users')
                ->where('user_id',$user_id)
                ->update([
                    'profile_status' => '1',
                ]);
                return back()->with('flash_success','profile approved');
            }else{
                DB::table('users')
                ->where('user_id',$user_id)
                ->update([
                    'profile_status' => '0',
                ]);
                return back()->with('flash_success','profile dis-approved');

            }
        }
        return redirect()->route('home');
    }
}
