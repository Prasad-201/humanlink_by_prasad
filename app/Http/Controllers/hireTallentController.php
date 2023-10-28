<?php

namespace App\Http\Controllers;



use App\Rules\ValidLinkedInUrl;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\HireTalentOpenPosition;
use App\Models\HireTalent;
use App\Models\talent;
use App\Models\TalentTestimonial;
use App\Models\TalentCoreCompetencies;
use App\Models\TalentEducation;
use App\Models\TalentMajorProjects;
use App\Models\TalentProfExperience;
use App\Models\ticket;
use App\Models\shortlistCandidate;
use App\Models\interviewSchedule;
use App\Models\feedback;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\UserFeedbackMail;


class hireTallentController extends Controller
{
    public function index()
    {
        $hireTalentID = getUserId();
        $openPosition = HireTalentOpenPosition::where('hireTalent_idfk', $hireTalentID)->get();
        return view('hireTalent.index', compact('openPosition'));
    }

    public function my_team()
    {
        return view('hireTalent.my_team');
    }

    public function your_point_of_contact()
    {
        return view('hireTalent.your_point_of_contact');
    }

    public function legal_agreement()
    {
        return view('hireTalent.legal_agreement');
    }

    public function open_position()
    {
        $hireTalentID = getUserId();
        $openPosition = HireTalentOpenPosition::where('hireTalent_idfk', $hireTalentID)->get();
        return view('hireTalent.open-position', compact('openPosition'));
    }

    public function talent_pool()
    {
        $employerId = getUserId();
        $talentInfo = DB::table('talent')
            ->leftJoin('talent_certifications', 'talent.id', '=', 'talent_certifications.talent_idfk')
            ->leftJoin('talent_core_competencies', 'talent.id', '=', 'talent_core_competencies.talent_idfk')
            ->leftJoin('shortlist_candidates', 'talent.id', 'shortlist_candidates.candidate_id')
            ->select(
                'talent.*',
                'talent_certifications.course_name',
                'talent_certifications.issue_organization',
                'talent_core_competencies.position_open_for',
                'talent_core_competencies.application_tool_used',
                'talent_core_competencies.skills',
                'shortlist_candidates.id As shortlist_id',
                'shortlist_candidates.empoyer_id As empoyer_id',
            )
            ->orderBy('talent.id', 'DESC')
            ->get();
            
        return view('hireTalent.talent_pool', compact('talentInfo', 'employerId'));
    }

    public function view_talent_profile($param = null)
    {
        if ($param) {
            $talentInfo = talent::where('id', $param)->first();
            $testimonials = TalentTestimonial::where('talent_idfk', $param)->get();
            $coreCompetencies = TalentCoreCompetencies::with('core')->where('talent_idfk', $param)->get();
            $majorProjects = TalentMajorProjects::where('talent_idfk', $param)->get();
            $educations = TalentEducation::where('talent_idfk', $param)->get();
            $profExperience = TalentProfExperience::where('talent_idfk', $param)->orderBy('end_date', 'ASC')->get();
            $profExperience = TalentProfExperience::where('talent_idfk', $param)->orderBy('end_date', 'ASC')->get();

            // echo '<pre>'; return print_r($coreCompetencies);
            return view('hireTalent.view-talent-profile', compact('talentInfo', 'testimonials', 'coreCompetencies', 'majorProjects', 'profExperience', 'educations'));
        } else {
            return view('hireTalent.sample-talent-profile');
        }
    }

    public function manage_account()
    {
        $hireTalentID = getUserId();
        $hireTalentInfo = HireTalent::where('id', $hireTalentID)->first();
        return view('hireTalent.manage-account', compact('hireTalentInfo'));
    }

    public function update_manage_account(Request $request)
    {
        $hireTalentID = getUserId();
        $hireTalentInfo = HireTalent::where('id', $hireTalentID)->first();

        $request->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'linked_in' => ['required', new ValidLinkedInUrl],
            // 'linked_in' => ['required', 'string', 'min:3'],
            'address' => ['required', 'string', 'min:3'],
            'contact_number' => ['required', 'numeric'],
            'company_size' => ['required', 'min:1', 'max:20'],
        ]);
        if (isset($request->profile_image)) {
            $request->validate([
                'profile_image' => ['image', 'mimes:jpeg,jpg,png'],
            ]);
        }
        if (isset($request->designation)) {
            $request->validate([
                'designation' => ['string', 'min:3'],
            ]);
        }
        if (isset($request->year_experience)) {
            $request->validate([
                'year_experience' => ['min:1', 'max:20'],
            ]);
        }
        if (isset($request->year_experience)) {
            $request->validate([
                'year_experience' => ['min:1', 'max:20'],
            ]);
        }
        if (isset($request->zip_code)) {
            $request->validate([
                'zip_code' => ['size:6'],
            ]);
        }
        if (isset($request->country_name)) {
            $request->validate([
                'country_name' => ['string', 'min:3'],
            ]);
        }
        if (isset($request->company_name)) {
            $request->validate([
                'company_name' => ['string', 'min:3'],
            ]);
        }
        if (isset($request->city_name)) {
            $request->validate([
                'city_name' => ['string', 'regex:/^[a-zA-Z]+$/u', 'min:3'],
            ]);
        }
        if (isset($request->state_name)) {
            $request->validate([
                'state_name' => ['string', 'regex:/^[a-zA-Z]+$/u', 'min:3'],
            ]);
        }
        if (isset($request->skype)) {
            $request->validate([
                'skype' => ['string', 'min:3'],
            ]);
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/assets/hiretalent/profile'), $image_name);
            $profile = "/assets/hiretalent/profile/" . $image_name;
            $hireTalentInfo->hiretalent_profile = $profile;
        }

        $full_name = $request->first_name . ' ' . $request->last_name;
        $hireTalentInfo->full_name = $full_name;
        $hireTalentInfo->designation = $request->designation;
        $hireTalentInfo->experience = $request->year_experience;
        $hireTalentInfo->company_name = $request->company_name;
        $hireTalentInfo->domain_name = $request->domain_name;
        $hireTalentInfo->mobile_number = $request->contact_number;
        $hireTalentInfo->company_size = $request->company_size;
        $hireTalentInfo->city_name = $request->city_name;
        $hireTalentInfo->state_name = $request->state_name;
        $hireTalentInfo->zip_code = $request->zip_code;
        $hireTalentInfo->address = $request->address;
        $hireTalentInfo->country_name = $request->country_name;
        $hireTalentInfo->linkedIn_profile = $request->linked_in;
        $hireTalentInfo->skype_profile = $request->skype;
        $hireTalentSave = $hireTalentInfo->save();
        if ($hireTalentSave) {
            return redirect(url('/HireTalent'))->with('success', 'Your Account Update !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function hiring_request()
    {
        return view('hireTalent.hiring_request');
    }

    public function submit_hiring_request(Request $request)
    {
        $hireTalentID = getUserId();
        $unique_id = 'HR' . time() . random_int(10, 99);
        $openPosition = new HireTalentOpenPosition;
        $openPosition->hireTalent_idfk = $hireTalentID;
        $openPosition->position_unique_id = $unique_id;
        if ($request->jsavailable == 'Yes') {
            $openPosition->developer_role = $request->developer_role_jd_available;
            $skills = implode(",", $request->skills_jd_available);
            if ($request->jdManual) {
                $openPosition->job_description = $request->jdManual;
            }
        } else {
            $openPosition->developer_role = $request->developer_role;
            $skills = implode(",", $request->skills);
        }
        if ($request->hasFile('job_desc_file')) {
            $image = $request->file('job_desc_file');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/assets/hiretalent/open-hiring'), $image_name);
            $profile = "/assets/hiretalent/open-hiring/" . $image_name;
            $openPosition->job_description_file = $profile;
        }
        $openPosition->skills = $skills;
        $openPosition->working_time_zone = $request->time_zone;
        $openPosition->working_with_period = $request->working_time_period;
        $openPosition->time_period = $request->time_period;
        $openPosition->experience_required = $request->experience_year;
        $openPosition->onboard_time_period = $request->onborading_time_period;
        $openPosition->required_developers = $request->developer_count;
        $positionSave = $openPosition->Save();
        if ($positionSave) {
            return redirect(url('/HireTalent'))->with('success', 'Position Successfully Store!!');
        } else {
            return back()->with('error', 'Something is missing !!');
        }
    }

    public function hiring_job_description(Request $request)
    {
        return $request->all();
        // $request->validate([
        //     'job_desc_file' => 'required|file|mimes:pdf,xml|max:2048',
        // ]);
        // $imageName = time() . '.' . $request->image->extension();
        // return $imageName;
        // $request->image->move(public_path('images'), $imageName);
        // Image::create(['name' => $imageName]);
        // return response()->json('Image uploaded successfully');
    }

    public function update_password()
    {
        $hireTalentInfo = HireTalent::where('id', getUserId())->first();
        return view('hireTalent.update-password', compact('hireTalentInfo'));
    }

    public function client_update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);
        $hireTalentInfo = HireTalent::where('id', getUserId())->first();
        if (md5($request->old_password) == $hireTalentInfo->password) {
            $hireTalentInfo->password = md5($request->new_password);
            $hireTalentupdate =  $hireTalentInfo->save();
            if ($hireTalentupdate) {
                return redirect(url('/HireTalent'))->with('success', 'Password Has been updated Successfully !!!');
            } else {
                return back()->with('error', 'Something is Wrong !!!');
            }
        } else {
            return back()->with('error', 'Old Password Not Match !!!');
        }
    }

    public function get_help()
    {
        return view('hireTalent.get-help');
    }

    public function ticket()
    {
        return view('hireTalent.ticket');
    }

    public function valid_ticket(Request $request)
    {
        $request->validate([
            'ticket_description' => ['required', 'string'],
        ]);

        $ticket = new ticket();
        $employerId = session()->get(HLINKID);
        $ticket->hiretalentId = $employerId;
        $ticket->ticket_description = $request->ticket_description;
        $ticket_raise =  $ticket->save();
        if ($ticket_raise) {
            return redirect(url('/HireTalent/mail'));
           
        } else {
            return back()->with('error', 'Old Password Not Match !!!');
        }
    }

    public function add_shortlist_candidate($param)
    {
        $shortList = new shortlistCandidate();
        $employerId = session()->get(HLINKID);
        $shortList->candidate_id = $param;
        $shortList->empoyer_id = $employerId;
        $shortListCandidate =  $shortList->save();
        if ($shortListCandidate) {
            return redirect(url('/HireTalent/talent-pool'))->with('success', 'Shortlist candidate successfully !!!');
        } else {
            return back()->with('error', 'Something wrong !!!');
        }
    }

    public function shortlist_candidate()
    {
        $employer_id =  session()->get(HLINKID);
        $shortlist_candidate = DB::table('shortlist_candidates')
            ->leftJoin('talent', 'shortlist_candidates.candidate_id', '=', 'talent.id')
            ->leftJoin('talent_certifications', 'talent.id', '=', 'talent_certifications.talent_idfk')
            ->leftJoin('talent_core_competencies', 'talent.id', '=', 'talent_core_competencies.talent_idfk')
            ->leftJoin('hire_talent', 'shortlist_candidates.empoyer_id', '=', 'hire_talent.id')
            ->select(
                'shortlist_candidates.id AS shortlist_id',
                'talent.*',
                'hire_talent.id As employer_id',
                'hire_talent.full_name As employer_name',
                'talent_certifications.course_name',
                'talent_certifications.issue_organization',
                'talent_core_competencies.position_open_for',
                'talent_core_competencies.application_tool_used',
                'talent_core_competencies.skills',
            )
            ->orderBy('shortlist_candidates.id', 'DESC')
            ->where('hire_talent.id', $employer_id)
            ->get();

        return view('hireTalent.shortlist-candidate', compact('shortlist_candidate'));
    }

    public function remove_shortlist_candidate($param)
    {
        $shortlist_remove = shortlistCandidate::where('id', $param)->delete();
        if ($shortlist_remove) {
            return redirect(url('HireTalent/shortlist-talent'))->with('success', 'Successfully remove !!');
        } else {
            return back()->with('success', 'Successfully remove !!');
        }
    }

    public function interview()
    {
        $employer_id =  session()->get(HLINKID);
        $interviews = DB::table('interview_schedules')
            ->leftJoin('talent', 'interview_schedules.candidate_id', '=', 'talent.id')
            ->select(
                'interview_schedules.id AS interview_id',
                'interview_schedules.interview_date',
                'interview_schedules.interview_time',
                'talent.*',
            )
            ->where('interview_schedules.empoyer_id', $employer_id)
            ->orderBy('interview_schedules.id', 'DESC')
            ->get();

        return view('hireTalent.show-interview', compact('interviews'));
    }

    public function scedule_interview(Request $request)
    {
        $interview = new interviewSchedule();
        $employerId = session()->get(HLINKID);
        $interview->interview_date = $request->interview_date;
        $interview->interview_time = $request->interview_time;
        $interview->candidate_id = $request->inerview_candidate;
        $interview->empoyer_id = $employerId;
        $interviewScedule =  $interview->save();
        if ($interviewScedule) {
            return redirect(url('/HireTalent/interview'))->with('success', 'Scedule interview successfully !!!');
        } else {
            return back()->with('error', 'Something wrong !!!');
        }
    }

    //changes made by Prasad 

    // public function send_feedback(Request $request)
    // {
    //     $feedback = new feedback();
    //     $employerId = session()->get(HLINKID);
    //     $feedback->feedback = $request->feedback;
    //     $feedback->interview_id = $request->inerview_id;
    //     $feedback->candidate_id = $request->candidate_id;
    //     $feedback->empoyer_id = $employerId;
    //     $feedback_send =  $feedback->save();
    //     if ($feedback_send) {
    //         return redirect(url('/HireTalent/interview'))->with('success', 'Feedback send successfully !!!');
    //     } else {
    //         return back()->with('error', 'Something wrong !!!');
    //     }

    //     $TalentDetails = DB::table('interview_schedules')
    //         ->leftJoin('talent', 'talent.id', '=', 'interview_schedules.candidate_id')
    //         ->select('interview_schedules.candidate_id', 'talent.full_name AS candidate_name', 'talent.email_address AS candidate_email')
    //         ->orderBy('interview_schedules.candidate_id', 'desc') 
    //         ->where('interview_schedules.id',$feedback->candidate_id )
    //         ->first();

    //         $cEmail =  $TalentDetails->candidate_email;
    //     $mailData = [
    //         'title' => 'Hi',
    //         'body' => 'How are you!!',
    //         'candidate_email' => $TalentDetails->candidate_email
            
    //     ];
    
    //     Mail::to($cEmail)->send(new DemoMail($mailData));
    
    //     return redirect(url('/HireTalent'))->with('success', 'Feedback sent successfully!');
    //      }

    public function hire_talent_feedback()
    {
        $employee_id = session()->get(HLINKID); 
        $feedbacks = DB::table('feedback')
            ->leftJoin('talent', 'feedback.candidate_id', '=', 'talent.id')
            ->select('feedback.id AS feedback_id', 'feedback.feedback AS feedback_text','feedback.updated_at AS date_time','talent.full_name As candidate_name')
            ->where('feedback.empoyer_id', $employee_id)
            ->orderBy('date_time', 'desc') 
            ->cursorPaginate(5);
            
            // ->get();
    
        return view('hireTalent.hire_talent_feedback', compact('feedbacks'));
    }




    public function send_feedback(Request $request)
{
    $feedback = new Feedback();
    $employerId = session()->get(HLINKID);
    $feedback->feedback = $request->feedback;
    $feedback->interview_id = $request->inerview_id;
    $feedback->candidate_id = $request->candidate_id;
    $feedback->empoyer_id = $employerId;
    $feedback_send = $feedback->save();

    if ($feedback_send) {
        $TalentDetails = DB::table('interview_schedules')
            ->leftJoin('talent', 'talent.id', '=', 'interview_schedules.candidate_id')
            ->leftJoin('hire_talent','hire_talent.id','=','interview_schedules.empoyer_id')
            ->select('interview_schedules.candidate_id', 'talent.full_name AS candidate_name', 'talent.email_address AS candidate_email','hire_talent.full_name AS emp_name')
            ->orderBy('interview_schedules.candidate_id', 'desc')
            ->where('interview_schedules.candidate_id',  $feedback->candidate_id)
            ->where('interview_schedules.empoyer_id',  $feedback->empoyer_id)
            ->first();

        
        if ($TalentDetails) {
            $cEmail =  $TalentDetails->candidate_email;
            $feedbackMail = [
                'title' => 'Hi',
                'body' => 'How are you!!',
                'candidate_name'=>$TalentDetails->candidate_name,
                'candidate_email' => $TalentDetails->candidate_email,
                'feedback'=>$feedback->feedback = $request->feedback,
                'emp_name'=>$TalentDetails->emp_name,
            ];

            Mail::to($cEmail)->send(new UserFeedbackMail($feedbackMail));

            return redirect(url('/HireTalent'))->with('success', 'Feedback sent successfully!');
        } else {
            return back()->with('error', 'Candidate not found!');
        }
    } else {
        return back()->with('error', 'Something went wrong!');
    }
}
}

    
    

//     public function hire_talent_feedback()
// {
//     return view('hireTalent.hire_talent_feedback');
// }


 

   
 

// *********************************************************************
// *****************************************************************************




