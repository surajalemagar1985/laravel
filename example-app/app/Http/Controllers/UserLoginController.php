<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetail;
use App\Models\Category;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;

class UserLoginController extends Controller
{
    public function userlogin(Request $request)
    {
        if (Auth::guard('myweb')->attempt(['user_email' => $request->email, 'password' => $request->password], 
            $request->remember)) 
        {
            return redirect()->intended(route('index'));
        } 
        return redirect()->back()->with('error','email or password does not match');  
    }

    public function userlogout(){
        Auth::guard('myweb')->logout();
        return redirect()->route('index');
    }

    public function userprofile($id){
        $show=UserDetail::find($id);
        $showcategory=Category::orderBy('id','asc')->get();
        return view('user.userprofile',compact('showcategory','show'));
    }
public function userprofileupdate(ProfileUpdateRequest $request){
      $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,999999).'_'.$file->getClientOriginalName();
            $file->move('user/upload/profileimage',$image);
        }
        UserProfile::create([
            'image'=>$image,
            'address'=>$request->get('address'),
            'dob'=>$request->get('dob'),
            'phone'=>$request->get('phone'),
            'user_id'=>$request->get('user_id')

        ]);
         $request->session()->flash('message','Profile Updated successfully');
        return redirect()->back();


}
        public function editprofile($id)
        {
            $show=UserDetail::find($id);
           $showcategory=Category::orderBy('id','asc')->get(); 
            return view('user.editprofile',compact('showcategory','show'));

        }

        public function updateprofile(Request $request,$id)
        {
            $detail = UserDetail::find($id);
            if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,999999).'_'.$file->getClientOriginalName();
            $file->move('user/upload/profileimage/',$image);
            if($detail->profiles->image){
                unlink('user/upload/profileimage/'.$detail->profiles->image);
            }
            $detail->profiles()->update(['image'=>$image]);
        }
        $detail->update([
            'user_name' =>$request->get('fname'),

        ]);
        $detail->profiles()->update([

            'address'=>$request->get('address'),
            'dob'=>$request->get('dob'),
            'phone'=>$request->get('phone'),


        ]);
        $request->session()->flash('success','Profile Updated successfully');
        return redirect()->back();
        }



}
