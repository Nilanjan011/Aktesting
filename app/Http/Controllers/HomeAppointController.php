<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appoint;
use App\Models\patient;
use App\Models\User;
use App\Models\availablePin;
use App\Models\TestReport;
use App\Models\DepTestHome;


class HomeAppointController extends Controller
{
    public function availablePinChak(Request $request){
        if($request->get('pin'))
        {
            $pin = $request->get('pin');
            $data = availablePin::all()
            ->where('pin_cord', $pin)
            ->count();
            if($data == 0)
            {
                echo 'not_available';
            }
            else
            {
                echo 'available';
            }
        }
    }
    public function dep_test($dep){
        $testData['data']=DepTestHome::all()->where('Department',$dep);
        //dd($testData->test);
        //return $testData->test;
        return response()->json($testData);
    }

    
    public function HomeCollection(Request $request){
        $appoint=new appoint;
        $appoint->Name=$request->name;
        $appoint->Email=$request->email;
        $appoint->Date_of_Birth=$request->dob;
        $appoint->Gender=$request->Gender;
        $appoint->Contact=$request->Contact;
        $appoint->Department=$request->sel_depart;
        $appoint->Test=$request->sel_test;
        $appoint->Pincode=$request->pin;
        $appoint->Address=$request->address;
        $appoint->Preferred_date=$request->PreferredDate;
        $appoint->Description=$request->description;
        $appoint->Status="H_Pending";
        $appoint->type="2";
        if ($request->hasfile('Prescription')) {
            // Get image file
            $image = $request->file('Prescription');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $image -> move(public_path('/frontend/Prescription'),$fileName);
            // Upload image
            $appoint->Pescription = $fileName;
        }

        $appoint->save();
        return back()->with('success','Your Home appointment is registered, pending for approval');
    }

    public function appointmentpeningList(){
        $appointPanddind=appoint::all()->where('Status', 'H_Pending');
       //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.Homeappoint.pending')->with('appointPanddinds',$appointPanddind);
    }
    public function appointmentApproveList(){
        $appointApprove=appoint::all()->where('Status', 'H_Approve');
       //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.Homeappoint.approve')->with('appointApproves',$appointApprove);
    }
    public function appointmentCancelList(){
        $appointPanddind=appoint::all()->where('Status', 'H_Cancel');
        //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.Homeappoint.cancle')->with('appointPanddinds',$appointPanddind);
    }
    public function appointmentCancel($id){
        $appointCancel=appoint::find($id);
        $appointCancel->Status="H_Cancel";
        $appointCancel->save();
        return redirect('/Homeappointment/pendingList')->with('success','Home Appointment Cancel Successfuly');
    }

    public function appointmentApprove(Request $request){
        $approve=appoint::find($request->test_id);
        //dd($approve->Status);
        if($approve->Status=='Pending'){
            $approve->Status='Approve';
            //dd($approve->Status);
            $approve->Preferred_time=$request->test_time;
            $approve->save();
            return back()->with('success','Appointment Approve Successfuly');
        }
        if($approve->Status=='H_Pending'){
            $approve->Status='H_Approve';
            $approve->Preferred_time=$request->test_time;
            $approve->save();
            return back()->with('success','Home Appointment Approve Successfuly');
        }
        return back()->with('erorr','Appointment Cancel Successfuly');
    }

    public function appointmentpatientList(){
        $user_id = auth()->user()->id;
        $patient=patient::where('patient_user_id', $user_id)->first();
        $user = User::find($user_id);
        $appoint=appoint::all()->where('Email', $user->email)->where('type','2');
        //d($appoint);
        //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('frontend.patient.appointmentList')->with('appoints',$appoint)->with('patient',$patient)->with('patient_user',$user);
    }
    
}
