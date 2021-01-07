<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AppointmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('pdfcall','mypdfcall');
Route::get('pdfmaker',[AppointmentController::class,'pdfmaker']);
Route::get('/', function () {
    return view('pages.index');
})->name('home');

Auth::routes();

Route::post('/reportDownload', 'App\Http\Controllers\ReportController@reportDownload')->name('Download.Report');
Route::get('patient/reportDownload/{id}', 'App\Http\Controllers\ReportController@PatientreportDownload')->name('patient.Download.Report');
Route::get('/reportAbalible', 'App\Http\Controllers\ReportController@reportAbalible')->name('Abalible.Report');
Route::get('/appoint/status', 'App\Http\Controllers\ReportController@appointStatus')->name('Appoint.status');
Route::post('/appointment', 'App\Http\Controllers\AppointmentController@appointmentRequst')->name('appointment');
Route::post('/homeCollecton', 'App\Http\Controllers\HomeAppointController@HomeCollection')->name('homeCollection');
Route::post('/pinchak', 'App\Http\Controllers\HomeAppointController@availablePinChak')->name('pin_available.check');
Route::get('/dep_test/{dep}', 'App\Http\Controllers\HomeAppointController@dep_test');
Route::get('/ApproveList', 'App\Http\Controllers\AppointmentController@appointmentpatientList')->name('patient.appointList');
Route::get('/HomApproveList', 'App\Http\Controllers\HomeAppointController@appointmentpatientList')->name('patient.home.approveList');
Route::get('/ReportList', 'App\Http\Controllers\ReportController@reportList')->name('patient.report');

Route::group(['middleware' => ['auth:web']], function()  
{ 
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboardChoose');

Route::group(['middleware' => ['staff']], function()  
{

Route::post('/appointment/Aprove', 'App\Http\Controllers\HomeAppointController@appointmentApprove')->name('appointment.approve');

Route::get('/reportchak', 'App\Http\Controllers\ReportController@reportUploadChak')->name('report_available.check');
Route::get('/reportUpload', 'App\Http\Controllers\ReportController@ReportUpload')->name('report.upload');
Route::post('/reportUpload/submit', 'App\Http\Controllers\ReportController@ReportSubmit')->name('TestreportSubmit');

Route::get('/appointment/pendingList', 'App\Http\Controllers\AppointmentController@appointmentpeningList')->name('appointment.pendingList');
Route::get('/appointment/ApproveList', 'App\Http\Controllers\AppointmentController@appointmentApproveList')->name('appointment.approveList');
Route::get('/appointment/cancelList', 'App\Http\Controllers\AppointmentController@appointmentCancelList')->name('appointment.cancelList');
Route::get('/appointment/cancel/{id}', 'App\Http\Controllers\AppointmentController@appointmentCancel');

Route::get('/Homeappointment/pendingList', 'App\Http\Controllers\HomeAppointController@appointmentpeningList')->name('home.appointment.pendingList');
Route::get('/Homeappointment/ApproveList', 'App\Http\Controllers\HomeAppointController@appointmentApproveList')->name('home.appointment.approveList');
Route::get('/Homeappointment/cancelList', 'App\Http\Controllers\HomeAppointController@appointmentCancelList')->name('home.appointment.cancelList');
Route::get('/Homeappointment/cancel/{id}', 'App\Http\Controllers\HomeAppointController@appointmentCancel');
Route::get('/staffProfile', 'App\Http\Controllers\StaffController@staffProfile')->name('staff.Profile');
Route::post('/staffProfile/{id}', 'App\Http\Controllers\StaffController@staffProfileEdit')->name('staff.profille.edit');
});



Route::group(['middleware' => ['admin']], function()  
{ 

Route::get('/stafflist', 'App\Http\Controllers\SuperAdminController@staffList')->name('staffList');
Route::get('/staffadd', 'App\Http\Controllers\SuperAdminController@staffAdd')->name('staffAdd');
Route::get('/stafflist/deleted/{id}', 'App\Http\Controllers\SuperAdminController@staffDeleted')->name('staff.deleted');
Route::get('/stafflist/edit/{id}', 'App\Http\Controllers\SuperAdminController@staffedit')->name('staff.edit');
Route::post('/staffsubmit', 'App\Http\Controllers\SuperAdminController@staffSubmit')->name('staffSubmit');
Route::post('/staffEdit/{id}', 'App\Http\Controllers\SuperAdminController@staffEditSubmit')->name('staff.edit.submit');
});


Route::get('/patientProfile', 'App\Http\Controllers\PatientController@patientProfile')->name('patient.Profile');
Route::post('/patientProfile/{id}', 'App\Http\Controllers\PatientController@patientProfileEdit')->name('patient.profille.edit');
Route::post('/user_appointment', 'App\Http\Controllers\PatientController@appointmentRequst')->name('BookAppoint');
Route::post('/user_homeCollecton', 'App\Http\Controllers\PatientController@HomeCollection')->name('HomeAppointmentt');
// Route::post('/staffChangePassword/{id}', 'App\Http\Controllers\SuperAdminController@staffChangePassword')->name('staff.change.password');
// Route::post('/staffChangePassword/{id}', 'App\Http\Controllers\SuperAdminController@staffChangePassword')->name('staff.change.password');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
