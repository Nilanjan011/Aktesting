<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\staff;

class StaffController extends Controller
{
    public function staffProfile(){
        $staff_id = auth()->user()->id;
        $staff_user = User::find($staff_id);
        $staff=staff::where('staff_user_id', $staff_id)->first();
        return view('staff.staffProfile')->with('staff_user',$staff_user)->with('staff',$staff);       

    }
    public function staffProfileEdit(Request $request,$id){
        $staff_id = auth()->user()->id;
        $staff_user = User::find($staff_id);
        $staff=staff::find($id);
        $staff_user->name=$request->staffName;
        $staff_user->email=$request->staffEmail;
        $staff->gender=$request->Gender;
        $staff->phone_No=$request->staffPhNo;
        $staff->address=$request->Address;
        $staff->date_of_birth=$request->Date_of_birth;
        if ($request->hasfile('uploadFile')) {
            // Get image file
            $image = $request->file('uploadFile');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $image -> move(public_path('/staff/ProfilePic'),$fileName);
            // Upload image
            $staff->pic = $fileName;
        }
        $staff->save();
        $staff_user->save();
        return redirect('/staffProfile')->with('success','Profile Update Successfuly');
    }
}
