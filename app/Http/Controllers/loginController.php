<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\talent;
use App\Models\HireTalent;
use App\Models\SuperAdminModel;

class loginController extends Controller
{
    public function index()
    {
        return view('talent.signin');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'username' => ['required', 'email', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $talent = talent::where('email_address', $request->username)->first();
        $SuperAdmin = SuperAdminModel::where('email_address', $request->username)->first();
        $HireTalent = HireTalent::where('email_address', $request->username)->first();
        if ($SuperAdmin) {
            if (md5($request->password) == $SuperAdmin->password) {
                $SuperAdminInfo = array(
                    HID => $SuperAdmin->id,
                    HMAILID => $SuperAdmin->email_address,
                    HROLE => SUPERADMIN,
                );
                Session()->put(HLINK, $SuperAdminInfo);
                return redirect(url('/SuperAdmin'));
            } else {
                session()->flash('error', 'User/Password not match !!');
                return back();
            }
        } elseif ($HireTalent) {
            if (md5($request->password) == $HireTalent->password) {
                $talentinfo = array(
                    HID => $HireTalent->id,
                    HMAILID => $HireTalent->email_address,
                    HROLE => EMPLOYER,
                );
                Session()->put(HLINK, $talentinfo);
                return redirect(url('/HireTalent'));
            } else {
                session()->flash('error', 'User/Password not match !!');
                return back();
            }
        } elseif ($talent) {
            if (md5($request->password) == $talent->password) {
                $talentinfo = array(
                    HID => $talent->id,
                    HMAILID => $talent->email_address,
                    HROLE => CANDIDATE,
                );
                Session()->put(HLINK, $talentinfo);
                return redirect(url('/Talent/Dashboard'));
            } else {
                session()->flash('error', 'User/Password not match !!');
                return back();
            }
        } else {
            session()->flash('error', 'User not register Found !!');
            return back();
        }
    }

    public function hiretalent()
    {
        return view('talent.hiretalent');
    }

    public function submit_hiretalent(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255', 'unique:hire_talent'],
            'email_address' => ['required', 'email', 'max:255', 'unique:hire_talent', 'unique:talent', 'unique:super_admin_models'],
            'mobile_number' => ['required', 'numeric', 'digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'password' => ['required', 'string', 'min:6', 'max:35'],
        ]);
        $HireTalent = new HireTalent;
        $HireTalent->full_name = $request->full_name;
        $HireTalent->email_address = $request->email_address;
        $HireTalent->company_name = $request->company_name;
        $HireTalent->mobile_number = $request->mobile_number;
        $HireTalent->password = md5($request->password);
        $talentSave = $HireTalent->save();
        $talentID = $HireTalent->id;
        if ($talentSave) {
            $talentinfo = array(
                HID => $talentID,
                HMAILID => $request->email_address,
                HROLE => EMPLOYER,
            );
            Session()->put(HLINK, $talentinfo);
            return redirect(url('/HireTalent'));
        }
    }

    public function Register_Talent()
    {
        $otp_number = random_int(100000, 999999);
        $data['otp_number'] = $otp_number;

        return view('talent.Register_Talent', $data);
    }

    public function store_basic_info(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'string', 'email', 'max:255', 'unique:talent'],
            'mobile_number' => ['required', 'numeric', 'digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $talent = new talent;
        $talent->full_name = $request->full_name;
        $talent->email_address = $request->email_address;
        $talent->mobile_number = $request->mobile_number;
        $talent->password = md5($request->password);
        $talentSave = $talent->save();
        $talentID = $talent->id;
        if ($talentSave) {
            $talentinfo = array(
                HID => $talentID,
                HMAILID => $request->email_address,
                'otp_number' => $request->otp_number,
                HROLE => CANDIDATE,
            );
            Session()->put(HLINK, $talentinfo);
            return redirect('/Talent/Verify');
        }
    }

    public function talent_verify()
    {
        if (session()->has(HLINK)) {
            return view('talent.talent_verify');
        } else {
            return redirect('/Register/Talent');
        }
    }

    public function talent_check_otp(Request $request)
    {
        $messsages = [
            'otp_number.required' => 'The :attribute field is required.',
            'otp_number.same' => 'OTP not match !!',
        ];
        $rules = [
            'otp_number' => 'required|same:hidden_otp_number',
        ];
        $isValidate = request()->validate($rules, $messsages);
        if ($isValidate) {
            session()->forget('jobEntryTalent.otp_number');
            return redirect(url('/Talent/talent-registration'));
        }
    }

    public function talent_registration()
    {
        $talentID = getUserId();
        $data['talentinfo'] = DB::table('talent')->where('id', $talentID)->first();

        return view('talent.talent_registration', $data);
    }

    public function submit_talent_info(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'work_experience' => ['required', 'numeric', 'min:1', 'max:20'],
            'curret_ctc' => ['required', 'numeric'],
            'expected_ctc' => ['required', 'numeric'],
            'upload_resume' => ['required', 'mimes:pdf', 'max:5000'],
        ]);

        if ($request->hasFile('upload_resume')) {
            $image = $request->file('upload_resume');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/assets/talent/resume'), $image_name);
            $image_path = "/assets/talent/resume/" . $image_name;
        }

        $talentID = getUserId();
        $talent = talent::where('id', $talentID)->first();
        $talent->full_name = $request->full_name;
        $talent->mobile_number = $request->mobile_number;
        $talent->linkedin_profile = $request->linkedin_profile;
        $talent->position_applied = $request->position_applied;
        $talent->curret_employment_status = $request->curret_employment_status;
        $talent->work_experience = $request->work_experience;
        $talent->notice_period = $request->notice_period;
        $talent->curret_ctc = $request->curret_ctc;
        $talent->expected_ctc = $request->expected_ctc;
        $talent->work_method_1 = $request->work_method_1;
        $talent->work_method_2 = $request->work_method_2;
        $talent->work_method_3 = $request->work_method_3;
        $talent->work_hour_1 = $request->work_hour_1;
        $talent->work_hour_2 = $request->work_hour_2;
        $talent->work_hour_3 = $request->work_hour_3;
        $talent->emp_resume = $image_path;
        $talentSave = $talent->save();
        if ($talentSave) {
            return redirect(url('/Talent/Dashboard'));
        } else {
            return back()->with('error', 'something is wrong');
        }
    }

    public function sign_out()
    {
        session()->forget(HLINK);
        return redirect(url('/'));
    }


    // ******************************************************************************
    // ******************************************************************************

    
    public function loadRegister()
    {
        return view('register');
    }


    
    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|confirmed|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("/verification/".$user->id);
    }

    public function loadLogin()
    {
        if(Auth::user()){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP for Verification is: - '.$otp;

        Mail::send('mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        $userData = User::where('email',$request->email)->first();
        if($userData && $userData->is_verified == 0){
            $this->sendOtp($userData);
            return redirect("/verification/".$userData->id);
        }
        else if(Auth::attempt($userCredential)){
            return redirect('/dashboard');
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        if(Auth::user()){
            return view('dashboard');
        }
        return redirect('/');
    }

    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }
    


    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }
}
