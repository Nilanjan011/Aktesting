<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;
use App\Models\appoint;


class PatientController extends Controller
{
    public function patientProfile(){
        $patient_id = auth()->user()->id;
        $patient_user = User::find($patient_id);
        $patient=patient::where('patient_user_id', $patient_id)->first();
        //dd($patient);
        return view('frontend.patient.patientProfile')->with('patient_user',$patient_user)->with('patient',$patient);       

    }
    public function patientProfileEdit(Request $request,$id){
        $patient_id = auth()->user()->id;
        $patient_user = User::find($patient_id);
        $patient=patient::find($id);
        $patient_user->name=$request->patientName;
        $patient_user->email=$request->patientEmail;
        $patient->gender=$request->Gender;
        $patient->phone_No=$request->patientPhNo;
        $patient->address=$request->Address;
        $patient->date_of_birth=$request->Date_of_birth;
        $patient->pin_cord=$request->patientPin;
        if ($request->hasfile('uploadFile')) {
            // Get image file
            $image = $request->file('uploadFile');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $image -> move(public_path('/patient/ProfilePic'),$fileName);
            // Upload image
            $patient->pic = $fileName;
        }
        $patient->save();
        $patient_user->save();
        return redirect('/patientProfile')->with('success','Profile Update Successfuly');
    }


    public function HomeCollection(Request $request){
        $patient_id = auth()->user()->id;
        $patient=patient::where('patient_user_id', $patient_id)->first();
        $patient_user = User::find($patient_id);
        $appoint=new appoint;
        //dd($patient_user);
        $appoint->Name=$patient_user->name;
        $appoint->Email=$patient_user->email;
        $appoint->Date_of_Birth=$patient->date_of_birth;
        $appoint->Gender=$patient->gender;
        $appoint->Contact=$patient->phone_No;
        $appoint->Department=$request->appointmentfor;
        $appoint->Test=$request->sel_test;
        $appoint->Pincode=$patient->pin_cord;
        $appoint->Address=$patient->address;
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

    public function appointmentRequst(Request $request){
        $patient_id = auth()->user()->id;
        $patient=patient::where('patient_user_id', $patient_id)->first();
        $patient_user = User::find($patient_id);
        $appoint=new appoint;
        $appoint->Name=$patient_user->name;
        $appoint->Email=$patient_user->email;
        $appoint->Date_of_Birth=$patient->date_of_birth;
        $appoint->Gender=$patient->gender;
        $appoint->Contact=$patient->phone_No;
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
        return back()->with('success','Your appointment is registered, pending for approval');
    }

}
