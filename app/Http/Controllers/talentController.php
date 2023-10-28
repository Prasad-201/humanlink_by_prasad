<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\talent;
use App\Models\TalentProfExperience;
use App\Models\TalentMajorProjects;
use App\Models\TalentCoreCompetencies;
use App\Models\TalentCoreCompeAchievement;
use App\Models\TalentEducation;
use App\Models\TalentCertification;
use App\Models\TalentTestimonial;
use App\Models\Assessment;
use App\Models\AssessmentQuestion;
use App\Models\assessementCandidateAppear;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\VideoModuleTable;
use App\Models\VideoModule;

class talentController extends Controller
{
    public function index()
    {
        $talentID = getUserId();
        $data['talentInfo'] = talent::where('id', $talentID)->first();
        return view('talent.dashboard', $data);
    }

    public function profile()
    {
        $talentID = getUserId();
        $data['talentInfo'] = talent::where('id', $talentID)->first();
        $data['talentExperience'] = TalentProfExperience::where('talent_idfk', $talentID)->get();
        $data['talentEducation'] = TalentEducation::where('talent_idfk', $talentID)->get();
        $data['talentCertificate'] = TalentCertification::where('talent_idfk', $talentID)->get();
        $data['talentMajorProject'] = TalentMajorProjects::where('talent_idfk', $talentID)->get();
        $data['talentTestimonial'] = TalentTestimonial::where('talent_idfk', $talentID)->get();
        $data['talentAchievement'] = TalentCoreCompetencies::with('core')->where('talent_idfk', $talentID)->get();

        return view('talent.profile', $data);
    }

    public function edit_profile()
    {
        $data['talentInfo'] = talent::where('id', getUserId())->first();
        return view('talent.edit-profile', $data);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'min:8', 'max:255'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'date_of_birth' => ['required', 'date'],
            'contact_number' => ['required', 'numeric', 'digits:10'],
            'address' => ['required', 'string', 'min:4'],
            'city' => ['required', 'string', 'min:4', 'max:255'],
            'pincode' => ['required', 'numeric', 'digits:6'],
            'upload_resume' => ['mimes:pdf', 'max:2048'],
        ]);

        if ($request->hasFile('upload_resume')) {
            $image = $request->file('upload_resume');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/assets/talent/resume'), $image_name);
            $image_path = "/assets/talent/resume/" . $image_name;
        } else {
            $image_path = $request->hidden_resume;
        }

        $talentID = getUserId();
        $talent = talent::where('id', $talentID)->first();
        $talent->full_name = $request->full_name;
        $talent->gender = $request->gender;
        $talent->birth_date = $request->date_of_birth;
        $talent->mobile_number = $request->contact_number;
        $talent->address = $request->address;
        $talent->city_name = $request->city;
        $talent->pincode = $request->pincode;
        $talent->linkedin_profile = $request->linkedin_id;
        $talent->emp_resume = $image_path;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Information has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    // Preferences Functionality Section
    public function edit_prefernces()
    {
        $data['talentInfo'] = talent::where('id', getUserId())->first();
        return view('talent.edit-prefernces', $data);
    }

    public function update_prefernces(Request $request)
    {
        $request->validate([
            'current_job_title' => ['required', 'string', 'min:8', 'max:255'],
            'current_employment_status' => ['required', 'string'],
            'work_experience' => ['required', 'numeric', 'between:1,20'],
            'notice_period' => ['required', 'string'],
            'current_pay_annually' => ['required', 'numeric', 'min:1'],
            'expected_pay_annually' => ['required', 'numeric', 'min:1'],
            'work_method_1' => ['required', 'string'],
            'work_hour_1' => ['required', 'string'],
            'interests' => ['required', 'array'],
            'introduction' => ['required', 'string', 'min:8'],
        ]);
        $interests = implode(',', $request->interests);

        $talentID = getUserId();
        $talent = talent::where('id', $talentID)->first();
        $talent->position_applied = $request->current_job_title;
        $talent->curret_employment_status = $request->current_employment_status;
        $talent->work_experience = $request->work_experience;
        $talent->notice_period = $request->notice_period;
        $talent->curret_ctc = $request->current_pay_annually;
        $talent->expected_ctc = $request->expected_pay_annually;
        $talent->work_method_1 = $request->work_method_1;
        $talent->work_method_2 = $request->work_method_2;
        $talent->work_method_3 = $request->work_method_3;
        $talent->work_hour_1 = $request->work_hour_1;
        $talent->work_hour_2 = $request->work_hour_2;
        $talent->work_hour_3 = $request->work_hour_3;
        $talent->interest = $interests;
        $talent->international_client = $request->international_client;
        $talent->introduction = $request->introduction;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Prefernces has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function feedback()
    {
        $candidate_id =  session()->get(HLINKID);
        $feedbacks = DB::table('feedback')
            ->leftJoin('talent', 'feedback.candidate_id', '=', 'talent.id')
            ->leftJoin('hire_talent', 'feedback.empoyer_id', '=', 'hire_talent.id')
            ->select('feedback.id AS feedback_id', 'feedback.feedback AS feedback_text', 'hire_talent.full_name as emloyer_name', 'hire_talent.company_name')
            ->where('talent.id', $candidate_id)
            ->get();

        return view('talent.feedback', compact('feedbacks'));
    }

    // Experience Functionality section
    public function add_experience()
    {
        return view('talent.add-experience');
    }

    public function submit_experience(Request $request)
    {
        $request->validate([
            'skills' => ['required', 'array', 'min:1'],
            'designation' => ['required', 'string', 'min:6'],
            'company_name' => ['required', 'string', 'min:6'],
            'start_date' => ['required'],
            'roles_responsibilities' => ['required', 'string', 'min:8'],
        ]);
        if (!isset($request->currently_work)) {
            $request->validate([
                'end_date' => ['required', 'date', 'after:start_date'],
            ]);
            $currWork = 'No';
            $endDate = $request->end_date;
        } else {
            $endDate = NULL;
            $currWork = $request->currently_work;
        }
        $talentID = getUserId();
        $talent = new TalentProfExperience;
        $skills = implode(',', $request->skills);
        $talent->talent_idfk = $talentID;
        $talent->designation = $request->designation;
        $talent->skills = $skills;
        $talent->company_name = $request->company_name;
        $talent->roles_responsibilities = $request->roles_responsibilities;
        $talent->currently_work = $currWork;
        $talent->start_date = $request->start_date;
        $talent->end_date = $endDate;
        // return $talent;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Prefernces has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function edit_experience($param)
    {
        $talentID = getUserId();
        $data['talentExperience'] = TalentProfExperience::where('id', $param)->where('talent_idfk', $talentID)->first();
        if ($data['talentExperience']) {
            return view('talent.edit-experience', $data);
        } else {
            return redirect(url('Talent/profile'))->with('error', 'No Experience Find');
        }
    }

    public function update_experience(Request $request, $param)
    {
        $request->validate([
            'designation' => ['required', 'string', 'min:6'],
            'company_name' => ['required', 'string', 'min:6'],
            'skills' => ['required', 'array', 'min:1'],
            'start_date' => ['required', 'date'],
            'roles_responsibilities' => ['required', 'string', 'min:8'],
        ]);
        if (!isset($request->currently_work)) {
            $request->validate([
                'end_date' => ['required', 'date', 'after:start_date'],
            ]);
            $currWork = 'No';
            $endDate = $request->end_date;
        } else {
            $endDate = NULL;
            $currWork = $request->currently_work;
        }
        $skills = implode(',', $request->skills);
        $talentID = getUserId();
        $talent = TalentProfExperience::where('id', $param)->first();
        $talent->talent_idfk = $talentID;
        $talent->designation = $request->designation;
        $talent->skills = $skills;
        $talent->company_name = $request->company_name;
        $talent->roles_responsibilities = $request->roles_responsibilities;
        $talent->currently_work = $currWork;
        $talent->start_date = $request->start_date;
        $talent->end_date = $endDate;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Prefernces has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function delete_experience($param)
    {
        $talentID = getUserId();
        $deleteExp = TalentProfExperience::where('id', $param)->where('talent_idfk', $talentID)->delete();
        if ($deleteExp) {
            return redirect(url('/Talent/profile'))->with('success', 'Experience has been deleted successfully !!');
        } else {
            return redirect(url('/Talent/profile'))->with('error', 'Something is wrong !!');
        }
    }

    // Education Functionality Section
    public function add_education()
    {
        $data['talentInfo'] = TalentEducation::where('id', getUserId())->first();
        return view('talent.add-education', $data);
    }

    public function submit_education(Request $request)
    {
        $request->validate([
            'degree' => ['required', 'string', 'min:3'],
            'uiversity' => ['required', 'string', 'min:6'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);
        $talentID = getUserId();
        $talentEdu = new TalentEducation;
        $talentEdu->talent_idfk = $talentID;
        $talentEdu->degree = $request->degree;
        $talentEdu->university = $request->uiversity;
        $talentEdu->start_date = $request->start_date;
        $talentEdu->end_date = $request->end_date;
        $talentEduSave = $talentEdu->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Education has been Submited !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function edit_education($param)
    {
        $talentID = getUserId();
        $data['talentEducation'] = TalentEducation::where('id', $param)->where('talent_idfk', $talentID)->first();
        if ($data['talentEducation']) {
            return view('talent.edit-education', $data);
        } else {
            return redirect(url('Talent/profile'))->with('error', 'Education not Found !!');
        }
    }

    public function update_education(Request $request, $param)
    {
        $request->validate([
            'degree' => ['required', 'string', 'min:3'],
            'uiversity' => ['required', 'string', 'min:6'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);
        $talentID = getUserId();
        $talentEdu = TalentEducation::where('id', $param)->where('talent_idfk', $talentID)->first();
        $talentEdu->degree = $request->degree;
        $talentEdu->university = $request->uiversity;
        $talentEdu->start_date = $request->start_date;
        $talentEdu->end_date = $request->end_date;
        $talentEduSave = $talentEdu->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Education has been updated successfully !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function delete_education($param)
    {
        $talentID = getUserId();
        $educationDelete = TalentEducation::where('id', $param)->where('talent_idfk', $talentID)->delete();
        if ($educationDelete) {
            return redirect(url('/Talent/profile'))->with('success', 'Education has been deleted successfully !!');
        } else {
            return back()->with('error', 'Something is wrong !!');
        }
    }

    // Cerfification Functionality Section
    public function add_certificate()
    {
        $data['talentInfo'] = TalentCertification::where('id', getUserId())->first();
        return view('talent.add-certificate', $data);
    }

    public function submit_certificate(Request $request)
    {
        $request->validate([
            'course_name' => ['required', 'string'],
            'organization' => ['required', 'string', 'min:6'],
            'issue_date' => ['required', 'date'],
        ]);
        if (isset($request->expiration_date)) {
            $request->validate([
                'expiration_date' => ['required', 'date', 'after:issue_date'],
            ]);
        }

        $talentID = getUserId();
        $talentEdu = new TalentCertification;
        $talentEdu->talent_idfk = $talentID;
        $talentEdu->course_name = $request->course_name;
        $talentEdu->issue_organization = $request->organization;
        $talentEdu->issue_date = $request->issue_date;
        $talentEdu->expire_date = $request->expiration_date;
        $talentEdu->credential_id = $request->credential_id;
        $talentEdu->credential_url = $request->credential_url;
        $talentEduSave = $talentEdu->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Certificate has been Submited !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function edit_certificate($param)
    {
        $talentID = getUserId();
        $data['talentCertifcate'] = TalentCertification::where('id', $param)->where('talent_idfk', $talentID)->first();
        if ($data['talentCertifcate']) {
            return view('talent.edit-certificate', $data);
        } else {
            return redirect(url('/Talent/profile'))->with('error', 'Certificate Not Found !!');
        }
    }

    public function update_certificate(Request $request, $param)
    {
        $request->validate([
            'course_name' => ['required', 'string'],
            'organization' => ['required', 'string', 'min:6'],
            'issue_date' => ['required', 'date'],
        ]);
        if (isset($request->expiration_date)) {
            $request->validate([
                'expiration_date' => ['required', 'date', 'after:issue_date'],
            ]);
        }
        $talentID = getUserId();
        $talentEdu = TalentCertification::where('id', $param)->where('talent_idfk', $talentID)->first();
        $talentEdu->course_name = $request->course_name;
        $talentEdu->issue_organization = $request->organization;
        $talentEdu->issue_date = $request->issue_date;
        $talentEdu->expire_date = $request->expiration_date;
        $talentEdu->credential_id = $request->credential_id;
        $talentEdu->credential_url = $request->credential_url;
        $talentEduSave = $talentEdu->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Certificate has been Submited !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function delete_certificate($param)
    {
        $talentID = getUserId();
        $deleteCertificate = TalentCertification::where('id', $param)->where('talent_idfk', $talentID)->delete();
        if ($deleteCertificate) {
            return redirect(url('/Talent/profile'))->with('success', 'Certificate has been deleted Successfully !!');
        } else {
            return redirect(url('/Talent/profile'))->with('error', 'Something is wrong !!');
        }
    }

    // Testimonial FUnctionality Section
    public function add_testimonial()
    {
        $data['talentInfo'] = TalentTestimonial::where('id', getUserId())->first();
        return view('talent.add-testimonial', $data);
    }

    public function submit_testimonial(Request $request)
    {
        $request->validate([
            'testimonial' => ['required', 'string', 'min:8'],
        ]);
        if (isset($request->client_name)) {
            $request->validate([
                'client_name' => ['required', 'string', 'min:6'],
            ]);
        }
        if (isset($request->company_name)) {
            $request->validate([
                'company_name' => ['required', 'string', 'min:6'],
            ]);
        }

        $talentID = getUserId();
        $talentTest = new TalentTestimonial;
        $talentTest->talent_idfk = $talentID;
        $talentTest->client_name = $request->client_name;
        $talentTest->company_name = $request->company_name;
        $talentTest->testimonial = $request->testimonial;
        $talentEduSave = $talentTest->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Testimonal has been Submited !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function edit_testimonial($param)
    {
        $talentID = getUserId();
        $data['talentTestimonial'] = TalentTestimonial::where('id', $param)->where('talent_idfk', $talentID)->first();
        if ($data['talentTestimonial']) {
            return view('talent.edit-testimonial', $data);
        } else {
            return redirect(url('/Talent/profile'))->with('error', 'Testimonial not Found');
        }
    }

    public function update_testimonial(Request $request, $param)
    {
        $request->validate([
            'testimonial' => ['required', 'string', 'min:8'],
        ]);
        if (isset($request->client_name)) {
            $request->validate([
                'client_name' => ['required', 'string', 'min:6'],
            ]);
        }
        if (isset($request->company_name)) {
            $request->validate([
                'company_name' => ['required', 'string', 'min:6'],
            ]);
        }

        $talentID = getUserId();
        $talentTest = TalentTestimonial::where('talent_idfk', $talentID)->where('id', $param)->first();
        $talentTest->client_name = $request->client_name;
        $talentTest->company_name = $request->company_name;
        $talentTest->testimonial = $request->testimonial;
        $talentEduSave = $talentTest->save();
        if ($talentEduSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Testimonal has been Updated Successfully !!');
        } else {
            return back()->with('error', 'Something is wrong !!');
        }
    }

    // Project Functionality Section
    public function add_project()
    {
        $data['talentInfo'] = TalentMajorProjects::where('id', getUserId())->first();
        return view('talent.add-project', $data);
    }

    public function submit_project(Request $request)
    {
        $request->validate([
            'project_name' => ['required', 'string', 'min:6'],
            'company_name' => ['required', 'string', 'min:6'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'skills' => ['required', 'array', 'min:1'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'description' => ['required', 'string', 'min:8'],
        ]);
        $skills = implode(',', $request->skills);
        $talentID = getUserId();
        $talent = new TalentMajorProjects;
        $talent->talent_idfk = $talentID;
        $talent->project_name = $request->project_name;
        $talent->company_name = $request->company_name;
        $talent->skills = $skills;
        $talent->description = $request->description;
        $talent->start_date = $request->start_date;
        $talent->end_date = $request->end_date;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Prefernces has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function edit_project($param)
    {
        $talentID = getUserId();
        $data['talentProject'] = TalentMajorProjects::where('id', $param)->where('talent_idfk', $talentID)->first();
        if ($data['talentProject']) {
            return view('talent.edit-project', $data);
        } else {
            return redirect(url('/Talent/profile'))->with('error', 'project Not Found !!');
        }
    }

    public function update_project(Request $request, $param)
    {
        $request->validate([
            'project_name' => ['required', 'string', 'min:6'],
            'company_name' => ['required', 'string', 'min:6'],
            'skills' => ['required', 'array', 'min:1'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'description' => ['required', 'string', 'min:8'],
        ]);
        $skills = implode(',', $request->skills);
        $talentID = getUserId();
        $talent = TalentMajorProjects::where('id', $param)->where('talent_idfk', $talentID)->first();
        $talent->project_name = $request->project_name;
        $talent->company_name = $request->company_name;
        $talent->skills = $skills;
        $talent->description = $request->description;
        $talent->start_date = $request->start_date;
        $talent->end_date = $request->end_date;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Project has been updated successfully !!');
        } else {
            return back()->with('error', 'Something is wrong !!');
        }
    }

    public function delete_project($param)
    {
        $talentID = getUserId();
        $projectDelete = TalentMajorProjects::where('id', $param)->where('talent_idfk', $talentID)->delete();
        if ($projectDelete) {
            return redirect(url('/Talent/profile'))->with('success', 'Project has been deleted successfully !!');
        } else {
            return back()->with('error', 'Something is wrong !!');
        }
    }

    // Core Competencies Functionality section
    public function edit_competencies()
    {
        $talentID = getUserId();
        $data = TalentCoreCompetencies::where('talent_idfk', $talentID)->with('core')->get();
        return view('talent.edit-competencies')->with('data', $data);
    }

    public function update_competencie(Request $request)
    {
        $request->validate([
            'position_open' => ['required', 'string', 'min:6'],
            'application_tool' => ['required', 'array', 'min:1'],
            'skills' => ['required', 'array', 'min:1'],
        ]);
        $skills =  implode(',', $request->skills);
        $application_tool =  implode(',', $request->application_tool);
        $talentID = getUserId();
        $talentCore = TalentCoreCompetencies::where('talent_idfk', $talentID)->first();
        if ($talentCore) {
            $talentCore = $talentCore;
        } else {
            $talentCore = new TalentCoreCompetencies;
        }
        $talentCore->talent_idfk = $talentID;
        $talentCore->skills = $skills;
        $talentCore->application_tool_used = $application_tool;
        $talentCore->position_open_for = $request->position_open;
        $talentCore->portfolio = $request->portfolio_link;
        $talentCoreSave = $talentCore->save();
        $ComptenciesID = $talentCore->id;
        if ($talentCoreSave) {
            TalentCoreCompeAchievement::where('talent_idfk', $talentID)->delete();
            $talentCompAchievement = new TalentCoreCompeAchievement;
            $insertData = [];
            if (isset($request->achievementHidden)) {
                foreach ($request->achievementHidden as $key => $value) {
                    if (isset($request->achievement_note[$key]) || isset($request->achievement_file[$key])) {
                        $achievement_note = NULL;
                        $achievement_file = NULL;
                        $index = $key;
                        if (isset($request->achievement_note[$key])) {
                            $achievement_note = $request->achievement_note[$key];
                        }
                        $image_path = NULL;
                        if (isset($request->hiddenAchiveFile[$key])) {
                            $image_path = $request->hiddenAchiveFile[$key];
                        }
                        if ($request->hasFile('achievement_file')) {
                            foreach ($request->file('achievement_file') as $key1 => $image) {
                                if ($key1 == $index) {
                                    $destinationPath = 'assets/talent/achievement';
                                    $filename = $image->getClientOriginalName();
                                    $image->move($destinationPath, $filename);
                                    $fullPath = $destinationPath . $filename;
                                    $image_path = $image_path == NULL ? $fullPath : ';' . $fullPath;
                                }
                            }
                        }
                        $insertData = [
                            'talent_idfk' => $talentID,
                            'core_competencie_idfk' => $ComptenciesID,
                            'achievement' => $achievement_note,
                            'achievement_profile' => $image_path,
                        ];
                    }
                    $talentCompAchievement::insert($insertData);
                }
            }
        }
        if ($talentCoreSave) {
            return redirect(url('/Talent/profile'))->with('success', 'Achievement has been updated !!');
        } else {
            return back()->with('error', 'Something is Wrong !!');
        }
    }

    // Simple Views
    public function point_contact()
    {
        return view('talent.point_contact');
    }

    public function change_profile_pic(Request $request)
    {
        $request->validate([
            'change_profile_pic' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        if ($request->hasFile('change_profile_pic')) {
            $image = $request->file('change_profile_pic');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/assets/talent/profile'), $image_name);
            $image_path = "/assets/talent/profile/" . $image_name;
        }

        $talentID = getUserId();
        $talent = talent::where('id', $talentID)->first();
        $talent->user_profile = $image_path;
        $talentSave = $talent->save();
        if ($talentSave) {
            return back()->with('success', 'Profile photo has been updated !!');
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function common_talent()
    {
        return view('talent.common-talent');
    }

    public function get_help()
    {
        return view('talent.get-help');
    }

    public function assessments()
    {
        $assessments = Assessment::get();
        return view('talent.assessment', compact('assessments'));
    }

    public function intro_assessment(Request $request)
    {
        if (isset($request->assessmentId)) {
            $assessment = Assessment::where('assessments_id', $request->assessmentId)->first();
            return view('talent.intro-assessment', compact('assessment'));
        } else {
            return back();
        }
    }

    public function start_assessment(Request $request)
    {
        $assesCandAppear = new assessementCandidateAppear;
        $assesCandAppear->talentIdFk = getUserId();
        $assesCandAppear->assessmentsIdFk = $request->assessmentId;
        $assesCandAppear->totalMark = $request->totalMark;
        $assesCandAppearSave = $assesCandAppear->save();
        if ($assesCandAppearSave) {
            $assesCandAppearID = $assesCandAppear->id;
            return redirect('/Talent/take-assessment/' . $assesCandAppearID);
        } else {
            return back()->with('error', 'Something Went Wrong !!!');
        }
    }

    public function take_assessment($assesCandAppearID)
    {
        $talent = talent::where('id', getUserId())->first();
        $assAppear = assessementCandidateAppear::where('assCandAppearID', $assesCandAppearID)->first();
        $assessments = AssessmentQuestion::where('assessments_idfk', $assAppear->assessmentsIdFk)->limit(5)->get();
        return view('talent.assessment-take', compact('assessments', 'talent', 'assAppear'));
    }

    public function submit_assessment(Request $request)
    {
        $assesCandAppearSave = DB::table('assessement_candidate_appears')
            ->where('assCandAppearID', $request->assessAppearID)
            ->update(['totalMark' => $request->totalMark, 'attemptQuestion' => $request->attemptQuestion]);

        if ($assesCandAppearSave) {
            $response = [
                'status' => 'success',
                'message' => 'Exam is stored successfully !!'
            ];
            Session::flash('success', 'Exam is stored successfully !!');
        } else {
            $response = [
                'status' => 'fail',
                'message' => 'Exam is not store !!'
            ];
            Session::flash('error', 'Exam is not stored !!');
        }
        return response()->json($response);
    }

    public function view_assessment_marks()
    {
        $select = ['assessement_candidate_appears.totalMark', 'assessement_candidate_appears.updated_at', 'assessement_candidate_appears.assCandAppearID', 'assessement_candidate_appears.attemptQuestion', 'talent.full_name', 'assessments.assessment_name'];
        $assCandMark =  DB::table('assessement_candidate_appears')
            ->select($select)
            ->join('talent', 'assessement_candidate_appears.talentIdFk', 'talent.id')
            ->join('assessments', 'assessement_candidate_appears.assessmentsIdFk', 'assessments.assessments_id')
            ->where('talent.id', getUserId())
            ->get();

        return view('talent.assessment-marks', compact('assCandMark'));
    }

    public function video_module()
    {
        $videoModules = VideoModule::get();
        return view('talent.video-module', compact('videoModules'));
    }

    public function showVideoModule($param)
    {
        $VideoModule = VideoModule::where('id', $param)->first();
        $videoModules = VideoModuleTable::where('module_idfk', $param)->get();
        return view('talent.showVideoModule', compact('param', 'videoModules', 'VideoModule'));
    }
    
    public function openPosition()
    {
        $openPosition =  DB::table('hire_talent_open_positions')
            ->select('hire_talent_open_positions.*', 'hire_talent.full_name AS employer_name', 'hire_talent.company_name AS employer_company')
            ->join('hire_talent', 'hire_talent_open_positions.hireTalent_idfk', 'hire_talent.id')
            ->get();
            
        return view('talent.open-position', compact('openPosition'));
    }
    
    public function viewMyProfile()
    {
        $param = getUserId();
        $talentInfo = talent::where('id', $param)->first();
        $testimonials = TalentTestimonial::where('talent_idfk', $param)->get();
        $coreCompetencies = TalentCoreCompetencies::with('core')->where('talent_idfk', $param)->get();
        $majorProjects = TalentMajorProjects::where('talent_idfk', $param)->get();
        $educations = TalentEducation::where('talent_idfk', $param)->get();
        $profExperience = TalentProfExperience::where('talent_idfk', $param)->orderBy('end_date', 'ASC')->get();
        $profExperience = TalentProfExperience::where('talent_idfk', $param)->orderBy('end_date', 'ASC')->get();

        return view('hireTalent.view-talent-profile', compact('talentInfo', 'testimonials', 'coreCompetencies', 'majorProjects', 'profExperience', 'educations'));
    }
}
