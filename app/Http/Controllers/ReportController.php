<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestReport;
use App\Models\appoint;
use App\Models\patient;
use App\Models\User;


class ReportController extends Controller
{
    public function ReportUpload(){

        return view('staff.report.upload');
    }
    public function ReportSubmit(Request $request){
        $report=new TestReport;
        $stats=appoint::find($request->Test_id);
        $report->appoint_id=$request->Test_id;
        if ($request->hasfile('reportFile')) {
            // Get image file
            $image = $request->file('reportFile');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $image -> move(public_path('/Report/doc/'),$fileName);
            // Upload image
            $report->doc = $fileName;
        }
        $photos = array();

        if ( $request->hasFile('fileUpload') ) {
            foreach ( $request->fileUpload as $key => $photo ) {
                $image = $photo;
                $extension = $image->getClientOriginalExtension();
                $fileName = time().'-'.$key.'.'.$extension;
                $image -> move(public_path('/Report/Images'),$fileName);
                // $path = $photo->store('/Car/Images');
                array_push( $photos, $fileName );
            }
        }
        $report->pic = json_encode($photos);
        $report->save();
        if($stats->Status == "Approve"){
            $stats->Status = "Upload";
        }
        if($stats->Status == "H_Approve"){
            $stats->Status = "H_Upload";
        }
        $stats->uploadStatus = "1";
        $stats->save();
        return back()->with('success','Report Uploaded');;
    }

    public function reportUploadChak(Request $request){
        if($request->get('Test_id'))
        {
            $Test_id = $request->get('Test_id');
            $data = appoint::find($Test_id);
            //return $data;
            if($data->Status == "Approve"||$data->Status == "H_Approve")
            {
                
                echo 'available';
            }
            else
            {
                echo 'not_available';
            }
        }
    }

    public function reportAbalible(Request $request){
        if($request->get('Test_id'))
        {
            $Test_id = $request->get('Test_id');
            $data = appoint::find($Test_id);
            //return $data;
            if($data->Status == "Upload"||$data->Status == "H_Upload")
            {
                
                echo 'available';
            }
            else
            {
                echo 'not_available';
            }
        }
    }
    public function appointStatus(Request $request){
        if($request->get('Test_id'))
        {
            $Test_id = $request->get('Test_id');
            $data = appoint::find($Test_id);
            echo $data->Status;
            
        }
    }

    public function reportDownload(Request $request){
            $id=$request->ApointmentId;
            $report=TestReport::all()->where('appoint_id', $id)->first();
            //dd($report);
            $myFile = public_path("/Report/doc/".$report->doc);
            $headers = ['Content-Type: application/pdf'];
        //$extension = $myFile->getClientOriginalExtension();
    	    $newName = 'Report'.'.pdf';


    	return response()->download($myFile,$newName,$headers);
    }
    public function PatientreportDownload($id){
            //$id=$request->ApointmentId;
            $report=TestReport::all()->where('appoint_id', $id)->first();
            //dd($report);
            $myFile = public_path("/Report/doc/".$report->doc);
            $headers = ['Content-Type: application/pdf'];
        //$extension = $myFile->getClientOriginalExtension();
    	    $newName = 'Report'.'.pdf';


    	return response()->download($myFile,$newName,$headers);
    }
    public function reportList(){
        $user_id = auth()->user()->id;
        $patient=patient::where('patient_user_id', $user_id)->first();
        $user = User::find($user_id);
        $appoint=appoint::all()->where('Email', $user->email)->where('uploadStatus','1');
        //dd($appoint);
        return view('frontend.patient.reportList')->with('appoints',$appoint)->with('patient',$patient)->with('patient_user',$user);

    }
}
