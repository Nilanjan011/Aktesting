<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\staff;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function staffList(){

        $staffLists=User::all()->where('userType', 'staff');
        return view('admin.staff.staffList')->with('staffLists',$staffLists);
    }

    public function staffAdd(){

        return view('admin.staff.staffAdd');
    }
    public function staffSubmit(Request $request){
        $staff=new User;
        $staff->name=$request->staffName;
        $staff->email=$request->staffEmail;
        $staff->password= Hash::make($request->staffpassword);
        $staff->userType='staff';
        $staff->save();
        $staffdec=new staff;
        $staffdec->staff_user_id=$staff->id;
        $staffdec->role=$request->staffRole;
        $staffdec->save();


        return back()->with('success','Staff Added Successfuly');
    }

    public function staffDeleted($id){
        $staff_user=User::find($id);
        $staff=staff::where('staff_user_id', $id);
        $staff->delete();
        $staff_user->delete();
        return back()->with('success','Staff Delete Successfuly');
    }

    public function staffedit($id){
        $staff_user=User::find($id);
        $staff=staff::where('staff_user_id', $id)->first();
         return view('admin.staff.staffEdit')->with('staff_user',$staff_user)->with('staff',$staff);       
    }


    public function staffEditSubmit(Request $request,$id){
        $staff_user=User::find($id);
        $staff=staff::where('staff_user_id', $id)->first();
        $staff_user->name=$request->staffName;
        $staff_user->email=$request->staffEmail;
        $staff->role=$request->staffRole;
        $staff_user->save();
        $staff->save();
        return back()->with('success','Staff Update Successfuly');
    }

    public function staffChangePassword(Request $request,$id){
        $staff_user=User::find($id);
        $staff_user->password= Hash::make($request->staffpassword);
        $staff_user->save();
        return back()->with('success','Staff Password Update Successfuly');
    }
}
