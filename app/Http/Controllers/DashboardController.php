<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\appoint;
use App\Models\patient;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //dd($user->userType);
        if($user->userType=='super_admin'){
            return view('admin.dashboard');
        }
        elseif($user->userType=='staff'){
            $appoint=appoint::whereDate('Preferred_date', Carbon::today())->get();
            $todayApprove=$appoint->where('Status', 'Approve');
            $todayHomeApprove=$appoint->where('Status', 'H_Approve');
            return view('staff.dashboard')->with('todayApprove',$todayApprove)->with('todayHomeApprove',$todayHomeApprove);
        }
        else{
            $patient=patient::where('patient_user_id', $user_id)->first();
            return view('frontend.patient.dashboard')->with('patient',$patient)->with('patient_user',$user);
        }
    }
}
