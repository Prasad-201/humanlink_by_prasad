<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperAdminModel;
use App\Models\Assessment;
use App\Models\HireTalent;
use App\Models\AssessmentQuestion;
use App\Models\HireTalentOpenPosition;
use App\Models\VideoModuleTable;
use App\Models\VideoModule;
use App\Models\ticket;
use App\Models\talent;
use App\Models\assessementCandidateAppear;
use Illuminate\Support\Facades\DB;

class SuperAdmin extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function admins()
    {
        $all_company = HireTalent::get();
        return view('superadmin.sample-talent', compact('all_company'));
    }

    public function hiring_requests($param = null)
    {
        if ($param != null) {
            $hiring_requests = HireTalentOpenPosition::where('hireTalent_idfk', $param)->paginate(5);
            return view('superadmin.open-position-view', compact('hiring_requests'));
        } else {
            $hiring_requests = HireTalentOpenPosition::paginate(5);
            return view('superadmin.open-position-view', compact('hiring_requests'));
        }
    }

    public function edit_password()
    {
        return view('superadmin.update-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);
        $SuperAdminInfo = SuperAdminModel::where('id', getUserId())->first();
        if (md5($request->old_password) == $SuperAdminInfo->password) {
            $SuperAdminInfo->password = md5($request->new_password);
            $SuperAdminUpdate =  $SuperAdminInfo->save();
            if ($SuperAdminUpdate) {
                return redirect(url('/SuperAdmin'))->with('success', 'Password Has been updated Successfully !!!');
            } else {
                return back()->with('error', 'Something is Wrong !!!');
            }
        } else {
            return back()->with('error', 'Password Not Match !!!');
        }
    }

    public function get_help()
    {
        return view('superadmin.get-help');
    }

    public function assessment()
    {
        $assessments = Assessment::get();
        return view('superadmin.assessment', compact('assessments'));
    }

    public function add_assessment()
    {
        return view('superadmin.add-assessment');
    }

    public function submit_assessment(Request $request)
    {
        $request->validate([
            'assessment_name' => ['required', 'string', 'min:2']
        ]);

        $assessment = new Assessment;
        $assessment->assessment_name = $request->assessment_name;
        $saveAssement = $assessment->save();
        if ($saveAssement) {
            return redirect(url('/SuperAdmin/assessment'))->with('success', 'Assessment Has been saved successfully !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function add_question($param)
    {
        $assessment = Assessment::where('assessments_id', $param)->first();
        return view('superadmin.add-question', compact('assessment', 'param'));
    }

    public function submit_question(Request $request, $param)
    {
        $request->validate([
            'assessment_question' => ['required', 'string', 'min:6'],
            'option_one' => ['required', 'string', 'min:2'],
            'option_two' => ['required', 'string', 'min:2'],
            'right_answer' => ['required', 'string', 'min:1'],
        ]);

        if (isset($request->option_three)) {
            $request->validate(['option_three' => ['string', 'min:2']]);
        }
        if (isset($request->option_four)) {
            $request->validate(['option_three' => ['string', 'min:2']]);
        }

        $assessmentQuestion = new AssessmentQuestion;
        $assessmentQuestion->assessments_idfk = $param;
        $assessmentQuestion->assessment_question = $request->assessment_question;
        $assessmentQuestion->assessment_option_1 = $request->option_one;
        $assessmentQuestion->assessment_option_2 = $request->option_two;
        $assessmentQuestion->assessment_option_3 = $request->option_three;
        $assessmentQuestion->assessment_option_4 = $request->option_four;
        $assessmentQuestion->assessment_answer = ucfirst($request->right_answer);
        $saveAssementQuestion = $assessmentQuestion->save();
        if ($saveAssementQuestion) {
            return back()->with('success', 'Assessment Has been saved successfully !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function get_questions($param)
    {
        $assessmentQuestion = AssessmentQuestion::where('assessments_idfk', $param)->get();
        if ($assessmentQuestion) {
            return view('superadmin.get-question', compact('assessmentQuestion', 'param'));
        }
    }

    public function edit_question($param)
    {
        $assessmentQuestion = AssessmentQuestion::where('id', $param)->first();
        return view('superadmin.edit-question', compact('assessmentQuestion', 'param'));
    }

    public function update_question(Request $request, $param)
    {
        $request->validate([
            'assessment_question' => ['required', 'string', 'min:6'],
            'option_one' => ['required', 'string', 'min:2'],
            'option_two' => ['required', 'string', 'min:2'],
            'right_answer' => ['required', 'string', 'min:1'],
        ]);

        if (isset($request->option_three)) {
            $request->validate(['option_three' => ['string', 'min:2']]);
        }
        if (isset($request->option_four)) {
            $request->validate(['option_three' => ['string', 'min:2']]);
        }

        $assessmentQuestion = AssessmentQuestion::where('id', $param)->first();
        $assessmentQuestion->assessment_question = $request->assessment_question;
        $assessmentQuestion->assessment_option_1 = $request->option_one;
        $assessmentQuestion->assessment_option_2 = $request->option_two;
        $assessmentQuestion->assessment_option_3 = $request->option_three;
        $assessmentQuestion->assessment_option_4 = $request->option_four;
        $assessmentQuestion->assessment_answer = ucfirst($request->right_answer);
        $saveAssementQuestion = $assessmentQuestion->save();
        if ($saveAssementQuestion) {
            return back()->with('success', 'Assessment Has been updated successfully !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function view_assessment_mark()
    {
        $select = ['assessement_candidate_appears.totalMark', 'assessement_candidate_appears.updated_at', 'assessement_candidate_appears.assCandAppearID', 'assessement_candidate_appears.attemptQuestion', 'talent.full_name', 'assessments.assessment_name'];
        $assCandMark =  DB::table('assessement_candidate_appears')
            ->select($select)
            ->join('talent', 'assessement_candidate_appears.talentIdFk', 'talent.id')
            ->join('assessments', 'assessement_candidate_appears.assessmentsIdFk', 'assessments.assessments_id')
            ->get();

        return view('superadmin.assessment-marks', compact('assCandMark'));
    }

    public function video_module()
    {
        $videoModules = VideoModule::get();
        return view('superadmin.video-module', compact('videoModules'));
    }

    public function addModule()
    {
        return view('superadmin.add-module');
    }

    public function submitModule(Request $request)
    {
        $request->validate([
            'moduleName' => ['required', 'string', 'min:3', 'max:22'],
        ]);

        $videModule = new VideoModule;
        $videModule->moduleName = $request->moduleName;
        $saveVideModule = $videModule->save();
        if ($saveVideModule) {
            return back()->with('success', 'Module Has been saved successfully !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function addVideoModule($param)
    {
        $VideoModule = VideoModule::where('id', $param)->first();
        return view('superadmin.addVideoModule', compact('VideoModule', 'param'));
    }

    public function submitVideoModule(Request $request, $param)
    {
        $vidModule = new VideoModuleTable;
        $vidModule->module_idfk = $param;

        $request->validate([
            'videoHeading' => ['required', 'string', 'min:3'],
        ]);
        $vidModule->videoHeading = $request->videoHeading;

        if ($request->hasFile('videoFile') || isset($request->videoLink)) {
            if ($request->hasFile('videoFile')) {
                $videoFile = $request->file('videoFile');
                $videoNameExten = $videoFile->getClientOriginalExtension();
                $videoName = $videoFile->getClientOriginalName();
                $videoArrayExten = array('MKV', 'MOV', 'mp4');
                if (in_array($videoNameExten, $videoArrayExten)) {
                    $videoFile->move(public_path('/assets/superAdmin/videoModule/'), $videoName);
                    $videoLink = 'assets/superAdmin/videoModule/' . $videoName;
                    $vidModule->videoModuleLink = $videoLink;
                    $vidModule->moduleType = 'file';
                } else {
                    return back()->withInput($request->input())->with('error', 'This type not valid !!!');
                }
            }

            if (isset($request->videoLink)) {
                $videoLink = $request->videoLink;
                if (filter_var($videoLink, FILTER_VALIDATE_URL) !== false) {
                    $vidModule->moduleType = 'link';
                    if (strpos($videoLink, "watch?v=") == true) {
                        $videoLink = str_replace("watch?v=", "embed/", $videoLink);
                        $vidModule->videoModuleLink = $videoLink;
                    } else {
                        $vidModule->videoModuleLink = $videoLink;
                    }
                } else {
                    return back()->withInput($request->input())->with('error', "$videoLink is not a valid URL");
                }
            }
        } else {
            return back()->withInput($request->input())->with('error', 'Atleast one input required !!!');
        }
        $saveVidModule = $vidModule->save();
        if ($saveVidModule) {
            return redirect(url('SuperAdmin/video-module'))->with('success', 'Password Has been updated Successfully !!!');
        } else {
            return back()->with('error', 'Something is Wrong !!!');
        }
    }

    public function showVideoModule($param)
    {
        $VideoModule = VideoModule::where('id', $param)->first();
        $videoModules = VideoModuleTable::where('module_idfk', $param)->get();
        return view('superadmin.showVideoModule', compact('param', 'videoModules', 'VideoModule'));
    }

    public function Ticket()
    {
        $query = DB::table('tickets')->leftjoin('hire_talent', 'hire_talent.id', '=', 'tickets.hiretalentId');
        $tickets = $query->select(['tickets.*', 'hire_talent.full_name As employer_name'])->get();
        return view('superadmin.show-ticket', compact('tickets'));
    }
}
