<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\talentController;
use App\Http\Controllers\hireTallentController;
use App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\MailController;

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

Route::group(['prefix' => 'SuperAdmin/'], function () {
    Route::get('/', [SuperAdmin::class, 'index'])->middleware('checkSuperAdmin');
    Route::get('/hiring-request/{id?}', [SuperAdmin::class, 'hiring_requests'])->middleware('checkSuperAdmin');
    Route::get('/admins', [SuperAdmin::class, 'admins'])->middleware('checkSuperAdmin');
    Route::get('/update-password', [SuperAdmin::class, 'edit_password'])->middleware('checkSuperAdmin');
    Route::post('/update-password', [SuperAdmin::class, 'update_password'])->middleware('checkSuperAdmin');
    Route::get('/get-help', [SuperAdmin::class, 'get_help'])->middleware('checkSuperAdmin');
    Route::get('/assessment', [SuperAdmin::class, 'assessment'])->middleware('checkSuperAdmin');
    Route::get('/add-assessment', [SuperAdmin::class, 'add_assessment'])->middleware('checkSuperAdmin');
    Route::post('/add-assessment', [SuperAdmin::class, 'submit_assessment'])->middleware('checkSuperAdmin');
    Route::get('/add-question/{id}', [SuperAdmin::class, 'add_question'])->middleware('checkSuperAdmin');
    Route::post('/add-question/{id}', [SuperAdmin::class, 'submit_question'])->middleware('checkSuperAdmin');
    Route::get('/view-questions/{id}', [SuperAdmin::class, 'get_questions'])->middleware('checkSuperAdmin');
    Route::get('/edit-question/{id}', [SuperAdmin::class, 'edit_question'])->middleware('checkSuperAdmin');
    Route::post('/edit-question/{id}', [SuperAdmin::class, 'update_question'])->middleware('checkSuperAdmin');
    Route::get('/view-assessment-marks', [SuperAdmin::class, 'view_assessment_mark'])->middleware('checkSuperAdmin');
    Route::get('/video-module', [SuperAdmin::class, 'video_module'])->middleware('checkSuperAdmin');
    Route::get('/add-module', [SuperAdmin::class, 'addModule'])->middleware('checkSuperAdmin');
    Route::post('/add-module', [SuperAdmin::class, 'submitModule'])->middleware('checkSuperAdmin');
    Route::get('/add-video-module/{id}', [SuperAdmin::class, 'addVideoModule'])->middleware('checkSuperAdmin');
    Route::post('/add-video-module/{id}', [SuperAdmin::class, 'submitVideoModule'])->middleware('checkSuperAdmin');
    Route::get('/view-module/{id}', [SuperAdmin::class, 'showVideoModule'])->middleware('checkSuperAdmin');

    Route::get('ticket', [SuperAdmin::class, 'Ticket'])->middleware('checkSuperAdmin');
});

// Candidate sign up and singin
Route::get('/', [loginController::class, 'index'])->middleware('CheckIsTalentLogin', 'LoginIs', 'checkIsSuperAdminLogin');
Route::post('/signin', [loginController::class, 'signin'])->middleware('CheckIsTalentLogin');
Route::get('/Register/HireTalent', [loginController::class, 'hiretalent'])->middleware('CheckHireTalentLogin');
Route::post('Register/HireTalent', [loginController::class, 'submit_hiretalent'])->middleware('CheckHireTalentLogin');
Route::get('/Register/Talent', [loginController::class, 'Register_Talent'])->middleware('CheckIsTalentLogin');
Route::get('/sign-out', [loginController::class, 'sign_out']);
Route::post('/Talent/submit-talent-info', [loginController::class, 'submit_talent_info'])->middleware('CheckIsTalentLogin');

// Candidate Views
Route::group(['prefix' => 'Talent/'], function () {
    Route::get('talent-registration', [loginController::class, 'talent_registration']);
    Route::get('Verify', [loginController::class, 'talent_verify']);
    Route::post('check-otp', [loginController::class, 'talent_check_otp']);
    Route::post('store_basic_info', [loginController::class, 'store_basic_info']);

    Route::get('Dashboard', [talentController::class, 'index'])->middleware('isLoginTalent');
    Route::get('assessments', [talentController::class, 'assessments'])->middleware('isLoginTalent');
    Route::get('profile', [talentController::class, 'profile'])->middleware('isLoginTalent');
    Route::get('feedback', [talentController::class, 'feedback'])->middleware('isLoginTalent');
    Route::get('point-of-contact', [talentController::class, 'point_contact'])->middleware('isLoginTalent');
    Route::post('save_talent_form', [loginController::class, 'store_talent_form'])->middleware('isLoginTalent');
    Route::get('edit-profile', [talentController::class, 'edit_profile'])->middleware('isLoginTalent');
    Route::post('edit-profile', [talentController::class, 'update_profile'])->middleware('isLoginTalent');
    Route::post('change-profile-pic', [talentController::class, 'change_profile_pic'])->middleware('isLoginTalent');
    Route::get('edit-prefernces', [talentController::class, 'edit_prefernces'])->middleware('isLoginTalent');
    Route::post('edit-prefernces', [talentController::class, 'update_prefernces'])->middleware('isLoginTalent');
    Route::get('add-experience', [talentController::class, 'add_experience'])->middleware('isLoginTalent');
    Route::post('add-experience', [talentController::class, 'submit_experience'])->middleware('isLoginTalent');
    Route::get('add-project', [talentController::class, 'add_project'])->middleware('isLoginTalent');
    Route::post('add-project', [talentController::class, 'submit_project'])->middleware('isLoginTalent');
    Route::get('edit-competencies', [talentController::class, 'edit_competencies'])->middleware('isLoginTalent');
    Route::post('edit-competencies', [talentController::class, 'update_competencie'])->middleware('isLoginTalent');
    Route::get('add-education', [talentController::class, 'add_education'])->middleware('isLoginTalent');
    Route::post('add-education', [talentController::class, 'submit_education'])->middleware('isLoginTalent');
    Route::get('add-certificate', [talentController::class, 'add_certificate'])->middleware('isLoginTalent');
    Route::post('add-certificate', [talentController::class, 'submit_certificate'])->middleware('isLoginTalent');
    Route::get('add-testimonial', [talentController::class, 'add_testimonial'])->middleware('isLoginTalent');
    Route::post('add-testimonial', [talentController::class, 'submit_testimonial'])->middleware('isLoginTalent');
    Route::get('edit-experience/{key}', [talentController::class, 'edit_experience'])->middleware('isLoginTalent');
    Route::post('edit-experience/{key}', [talentController::class, 'update_experience'])->middleware('isLoginTalent');
    Route::get('delete-experience/{key}', [talentController::class, 'delete_experience'])->middleware('isLoginTalent');
    Route::get('edit-project/{key}', [talentController::class, 'edit_project'])->middleware('isLoginTalent');
    Route::post('edit-project/{key}', [talentController::class, 'update_project'])->middleware('isLoginTalent');
    Route::get('delete-project/{key}', [talentController::class, 'delete_project'])->middleware('isLoginTalent');
    Route::get('edit-education/{key}', [talentController::class, 'edit_education'])->middleware('isLoginTalent');
    Route::post('edit-education/{key}', [talentController::class, 'update_education'])->middleware('isLoginTalent');
    Route::get('delete-education/{key}', [talentController::class, 'delete_education'])->middleware('isLoginTalent');
    Route::get('edit-certificate/{key}', [talentController::class, 'edit_certificate'])->middleware('isLoginTalent');
    Route::post('edit-certificate/{key}', [talentController::class, 'update_certificate'])->middleware('isLoginTalent');
    Route::get('delete-certificate/{key}', [talentController::class, 'delete_certificate'])->middleware('isLoginTalent');
    Route::get('edit-testimonial/{key}', [talentController::class, 'edit_testimonial'])->middleware('isLoginTalent');
    Route::post('edit-testimonial/{key}', [talentController::class, 'update_testimonial'])->middleware('isLoginTalent');
    Route::post('intro-assessment', [talentController::class, 'intro_assessment'])->middleware('isLoginTalent');
    Route::post('start-assessment', [talentController::class, 'start_assessment'])->middleware('isLoginTalent');
    Route::get('take-assessment/{key}', [talentController::class, 'take_assessment'])->middleware('isLoginTalent');
    Route::post('save-assessment', [talentController::class, 'submit_assessment'])->middleware('isLoginTalent');
    Route::get('view-assessment-marks', [talentController::class, 'view_assessment_marks'])->middleware('isLoginTalent');
    Route::get('video-module', [talentController::class, 'video_module'])->middleware('isLoginTalent');
    Route::get('/view-module/{id}', [talentController::class, 'showVideoModule'])->middleware('isLoginTalent');
    Route::get('get-help', [talentController::class, 'get_help'])->middleware('isLoginTalent');
    Route::get('common-talent', [talentController::class, 'common_talent'])->middleware('isLoginTalent');
    Route::get('open-position', [talentController::class, 'openPosition'])->middleware('isLoginTalent');
    Route::get('my-profile', [talentController::class, 'viewMyProfile'])->middleware('isLoginTalent');
});

// Employer Views
Route::group(['prefix' => 'HireTalent/'], function () {
    Route::get('/', [hireTallentController::class, 'index'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('my-team', [hireTallentController::class, 'my_team'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('open-position', [hireTallentController::class, 'open_position'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('ticket', [hireTallentController::class, 'ticket'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('ticket', [hireTallentController::class, 'valid_ticket'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('shortlist-talent', [hireTallentController::class, 'shortlist_candidate'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('talent-pool', [hireTallentController::class, 'talent_pool'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('your-point-of-contact', [hireTallentController::class, 'your_point_of_contact'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('view-talent-profile/{id?}', [hireTallentController::class, 'view_talent_profile'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('manage-account', [hireTallentController::class, 'manage_account'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('manage-account', [hireTallentController::class, 'update_manage_account'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('hiring-request', [hireTallentController::class, 'hiring_request'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('hiring-request', [hireTallentController::class, 'submit_hiring_request'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('update-password', [hireTallentController::class, 'update_password'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('update-password', [hireTallentController::class, 'client_update_password'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('get-help', [hireTallentController::class, 'get_help'])->middleware('CheckHireTalentIsNotLogin');

    Route::get('interview', [hireTallentController::class, 'interview'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('scedule-interview', [hireTallentController::class, 'scedule_interview'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('hiring-job-description', [hireTallentController::class, 'hiring_job_description'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('shortlist-candidate/{id}', [hireTallentController::class, 'add_shortlist_candidate'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('remove-shortlist-candidate/{id}', [hireTallentController::class, 'remove_shortlist_candidate'])->middleware('CheckHireTalentIsNotLogin');
    Route::post('send-feedback', [hireTallentController::class, 'send_feedback'])->middleware('CheckHireTalentIsNotLogin');

    //Worked by prasad 
    Route::get('feedback', [hireTallentController::class, 'hire_talent_feedback'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('mail', [MailController::class, 'index'])->middleware('CheckHireTalentIsNotLogin');
    Route::get('/feedbackmail/{id}', [MailController::class, 'sendFeedback'])->middleware('CheckHireTalentIsNotLogin');

    

});

