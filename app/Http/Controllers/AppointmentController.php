<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appoint;
use App\Models\User;
use App\Models\patient;
use PDF;

class AppointmentController extends Controller
{
    public function appointmentRequst(Request $request){
        $appoint=new appoint;
        $appoint->Name=$request->name;
        $appoint->Email=$request->email;
        $appoint->Date_of_Birth=$request->dob;
        $appoint->Gender=$request->Gender;
        $appoint->Contact=$request->Contact;
        $appoint->Department=$request->appointmentfor;
        $appoint->Preferred_date=$request->PreferredDate;
        $appoint->Description=$request->description;
        $appoint->type="1";
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
        view()->share('employee',$appoint);
        $pdf = PDF::loadView('acknowledgement', $data);

        // download PDF file with download method
         $pdf->download('Acknowledgement.pdf');

        return back()->with('success','Your appointment is registered, pending for approval');
    }

    public function appointmentpeningList(){
        $appointPanddind=appoint::all()->where('Status', 'Pending');
       //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.appointment.pending')->with('appointPanddinds',$appointPanddind);
    }
    public function appointmentApproveList(){
        $appointPanddind=appoint::all()->where('Status', 'Approve');
       //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.appointment.approve')->with('appointApproves',$appointPanddind);
    }
    public function appointmentCancelList(){
        $appointPanddind=appoint::all()->where('Status', 'Cancel');
        //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('staff.appointment.cancle')->with('appointPanddinds',$appointPanddind);
    }
    public function appointmentpatientList(){
        $user_id = auth()->user()->id;
        $patient=patient::where('patient_user_id', $user_id)->first();
        $user = User::find($user_id);
        $appoint=appoint::all()->where('Email', $user->email)->where('type','1');
        //d($appoint);
        //$appointPanddind=$appointPanddinds->where('Test', '');
        return view('frontend.patient.appointmentList')->with('appoints',$appoint)->with('patient',$patient)->with('patient_user',$user);
    }
    public function appointmentCancel($id){
        $appointCancel=appoint::find($id);
        $appointCancel->Status="Cancel";
        $appointCancel->save();
        return redirect('/appointment/pendingList')->with('success','Appointment Cancel Successfuly');
    }
    public function pdfmaker(){

        $pdf = PDF::loadView('mypdfcall');
        return $pdf->download('pdfmaker.pdf');      
    }

}
