@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="profile-container">
            <div class="d-flex justify-content-end">
                <a href="{{ url('/Talent/my-profile') }}" class="btn btn-success" style="background: rgb(129, 197, 87); border-color: rgb(129, 197, 87);">View My Profile</a>
            </div>
            <div class="profile-Head">
                <div class="title">
                    <div class="d-flex content">
                        <div>
                            <h2 class="text-capitalize">{{ $talentInfo->full_name }}</h2>
                        </div>
                    </div>
                </div>
                @if (session()->has('error') || session()->has('success'))
                    <div class="alert alert-info alert-dismissible fade show d-block" style="margin-bottom: -48px;"
                        role="alert">
                        @if (session()->has('error'))
                            <small class="text-danger form-text">{{ session()->get('error') }}</small>
                        @endif
                        @if (session()->has('success'))
                            <small class="form-text">{{ session()->get('success') }}</small>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->has('change_profile_pic'))
                    <small class="text-danger form-text d-block" style="margin-bottom: -48px;">
                        {{ $errors->first('change_profile_pic') }}
                    </small>
                @endif
                <div class="overview">
                    <div class="profilePic">
                        @if ($talentInfo->user_profile != null && File::exists(public_path($talentInfo->user_profile)))
                            <img src="{{ asset($talentInfo->user_profile) }}" alt="Profile">
                        @else
                            <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/profile.png') }}"
                                alt="Profile">
                        @endif
                        <form action="{{ url('/Talent/change-profile-pic') }}" id="change-profile-pic" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="file-wrap">
                                <input id="profilePic" name="change_profile_pic" type="file">
                                <label for="profilePic"></label>
                            </div>
                        </form>
                    </div>
                    <div class="content">
                        <h6>Static - You still have some areas where your profile information is missing.<br>Let’s go finish it?
                        </h6>
                        <div class="progressBarDiv" style="width: 85%; margin: 9px 0px 16px;">
                            <div class="progressBar">
                                <div class="progress" style="width: 93%; background-color: rgb(129, 197, 87);"></div>
                            </div>
                            <div class="value">&nbsp;&nbsp;93%</div>
                        </div>
                        <div class="d-flex align-items-center flex-wrap">
                            <a href="{{ url('Talent/assessments') }}" class="underlinedBtn">GET STARTED WITH
                                ASSESSMENTS</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-page-accordion">
                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Personal Details</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <a class="text-dark" href="{{ url('Talent/edit-profile') }}">EDIT</a>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">Tell us about yourself</div>
                        <div class="row g-1">
                            <div class="col-6">
                                <label>Name</label>
                                <div class="fieldValue">{{ $talentInfo->full_name }}</div>
                            </div>
                            <div class="col-6">
                                <label>Gender</label>
                                <div class="fieldValue">{{ $talentInfo->gender }}</div>
                            </div>
                            <div class="col-6">
                                <label>Date of Birth</label>
                                <div class="fieldValue">{{ date('d-M-Y', strtotime($talentInfo->birth_date)) }}</div>
                            </div>
                            <div class="col-lg-6"><label>Email</label>
                                <div class="fieldValue">{{ $talentInfo->email_address }}</div>
                            </div>
                            <div class="col-lg-6 ">
                                <label>Phone Number</label>
                                <div class="fieldValue">{{ $talentInfo->mobile_number }}</div>
                            </div>
                            <div class="col-lg-6">
                                <label>Address</label>
                                <div class="fieldValue">{{ $talentInfo->address }}</div>
                            </div>
                            <div class="col-lg-6">
                                <label>Resume</label>
                                <div class="fieldValue">
                                    <div class="d-flex align-items-center" style="margin-top: -8px;">
                                        <img src="{{ asset('assets/talentconnet/profile/file-minus.svg') }}">
                                        &nbsp;
                                        <p class="resumeName mb-0">
                                            @php
                                                $resume = explode('/', $talentInfo->emp_resume);
                                                echo end($resume);
                                            @endphp
                                        </p>
                                        <button type="button" class="icon-btn ml-2">
                                            <img src="{{ asset('assets/talentconnet/profile/download.svg') }}"
                                                alt="download-icon">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"><label>LinkedIn Profile</label>
                                <div class="fieldValue">{{ $talentInfo->linkedin_profile }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Preferences</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <a class="text-dark" href="{{ url('Talent/edit-prefernces') }}">EDIT</a>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">Share more about yourself and what you hope to accomplish</div>
                        <div class="row g-1">
                            <div class="col-6"><label>Current Job Title</label>
                                <div class="fieldValue">{{ $talentInfo->position_applied }}</div>
                            </div>
                            <div class="col-6"><label>Work Experience</label>
                                <div class="fieldValue">{{ $talentInfo->work_experience }}</div>
                            </div>
                            <div class="col-6"><label>Current Employment Status</label>
                                <div class="fieldValue">{{ $talentInfo->curret_employment_status }}</div>
                            </div>
                            <div class="col-lg-6"><label>Notice Period</label>
                                <div class="fieldValue">{{ $talentInfo->notice_period }}</div>
                            </div>
                            <div class="col-lg-6 ">
                                <label>Current Pay Annually (INR)</label>
                                <div class="fieldValue">{{ $talentInfo->curret_ctc }}</div>
                            </div>
                            <div class="col-lg-6">
                                <label>Expected Pay Annually (INR)</label>
                                <div class="fieldValue">{{ $talentInfo->expected_ctc }}</div>
                            </div>
                            <div class="col-lg-6">
                                <label>Worked with International Clients:</label>
                                <div class="fieldValue">{{ $talentInfo->international_client }}</div>
                            </div>
                            <div class="col-lg-12">
                                <label>What is your preferred method of working?</label>
                                <div class="fieldValue d-flex flex-wrap">
                                    <div class="chip-yellow">{{ $talentInfo->work_method_1 }}</div>
                                    <div class="chip-yellow">{{ $talentInfo->work_method_2 }}</div>
                                    <div class="chip-yellow">{{ $talentInfo->work_method_3 }}</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Your preferable slot of working hours</label>
                                <div class="fieldValue d-flex flex-wrap">
                                    <div class="chip-yellow text-capitalize">{{ $talentInfo->work_hour_1 }}</div>
                                    <div class="chip-yellow text-capitalize">{{ $talentInfo->work_hour_2 }}</div>
                                    <div class="chip-yellow text-capitalize">{{ $talentInfo->work_hour_3 }}</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Interests</label>
                                <div class="fieldValue d-flex flex-wrap">
                                    @php
                                        $interest = explode(',', $talentInfo->interest);
                                    @endphp
                                    @foreach ($interest as $item)
                                        <div class="chip-gray text-capitalize">{{ $item }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Interests</label>
                                <div class="fieldValue para">
                                    <p>
                                        <em>
                                            {{ $talentInfo->introduction }}
                                        </em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Professional Experience</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <button>
                                    <a href="{{ url('/Talent/add-experience') }}" class="text-dark">ADD MORE</a>
                                </button>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">
                            Add your current and previous professional experience here. Please
                            ensure that your professional experience matches with your added years of work experience
                        </div>
                        <div class="row d-flex">
                            @if (!$talentExperience->isEmpty())
                                @foreach ($talentExperience as $experience)
                                    <div class="col-lg-6 d-flex">
                                        <div class="accordionListCard false undefined false">
                                            <div class="head" name="head">
                                                <div class="bold text-capitalize" name="title">
                                                    {{ $experience->designation }}
                                                </div>
                                                <div class="action">
                                                    <button class="icon-button round false">
                                                        <a href="{{ url('/Talent/edit-experience') . '/' . $experience->id }}"
                                                            class="text-dark">
                                                            <img alt="edit"
                                                                src="{{ asset('assets/talentconnet/profile/edit.svg') }}">
                                                        </a>
                                                    </button>
                                                    <button class="icon-button round delete">
                                                        <a href="{{ url('/Talent/delete-experience') . '/' . $experience->id }}"
                                                            class="text-dark">
                                                            <img alt="delete"
                                                                src="{{ asset('assets/talentconnet/profile/delete.svg') }}">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content" name="content">
                                                <div class="body text-capitalize">{{ $experience->company_name }}
                                                </div>
                                                <div id="jobDescription15256"
                                                    class="body jobDescription limitText mt-1">
                                                    <ul>
                                                        <li>&nbsp;{{ $experience->roles_responsibilities }}&nbsp;</li>
                                                    </ul>
                                                    <div class="readMore"></div>
                                                </div>
                                                <div class="fieldValue d-flex flex-wrap mb-0">
                                                    @php
                                                        $skills = explode(',', $experience->skills);
                                                    @endphp
                                                    @foreach ($skills as $skill)
                                                        <div class="chip-gray">{{ $skill }}</div>
                                                    @endforeach
                                                </div>
                                                <div class="gray">
                                                    @php
                                                        $startDate = date('M Y', strtotime($experience->start_date));
                                                        if ($experience->end_date != null) {
                                                            $lastDate = date('M Y', strtotime($experience->end_date));
                                                        } else {
                                                            $lastDate = 'Present';
                                                        }
                                                    @endphp
                                                    {{ $startDate . '-' . $lastDate }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Major Projects</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <button>
                                    <a href="{{ url('/Talent/add-project') }}" class="text-dark">ADD MORE</a>
                                </button>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">
                            Add atleast 3 of your best projects to showcase your strengths and impact
                        </div>
                        <div class="row d-flex">
                            @if (!$talentMajorProject->isEmpty())
                                @foreach ($talentMajorProject as $project)
                                    <div class="col-lg-6 d-flex">
                                        <div class="accordionListCard false undefined false">
                                            <div class="head" name="head">
                                                <div class="bold text-capitalize" name="title">
                                                    {{ $project->project_name }}
                                                </div>
                                                <div class="action">
                                                    <button class="icon-button round false">
                                                        <a
                                                            href="{{ url('/Talent/edit-project') . '/' . $project->id }}">
                                                            <img
                                                                src="{{ asset('assets/talentconnet/pencil-icon.png') }}">
                                                        </a>
                                                    </button>
                                                    <button class="icon-button round delete">
                                                        <a
                                                            href="{{ url('/Talent/delete-project') . '/' . $project->id }}">
                                                            <img src="{{ asset('assets/talentconnet/delete.svg') }}">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content" name="content">
                                                <div class="body text-capitalize">
                                                    {{ $project->company_name }}
                                                </div>
                                                <div id="jobDescription15256"
                                                    class="body jobDescription limitText mt-1">
                                                    <ul>
                                                        <li>&nbsp;{{ $project->description }}&nbsp;</li>
                                                    </ul>
                                                    <div class="readMore"></div>
                                                    {{-- <div class="readMore"><button>&nbsp;...&nbsp;read more</button></div> --}}
                                                </div>
                                                <div class="fieldValue d-flex flex-wrap mb-0">
                                                    @php
                                                        $skills = explode(',', $project->skills);
                                                    @endphp
                                                    @foreach ($skills as $skill)
                                                        <div class="chip-gray">{{ $skill }}</div>
                                                    @endforeach
                                                </div>
                                                @php
                                                    $startDate = date('M Y', strtotime($project->start_date));
                                                    $endDate = date('M Y', strtotime($project->end_date));
                                                @endphp
                                                <div class="gray">{{ $startDate . ' - ' . $endDate }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Core Competencies</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <button>
                                    <a class="text-dark" href="{{ url('Talent/edit-competencies') }}">EDIT</a>
                                </button>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">
                            Make your profile stand out by telling us about your skills & achievement and by sharing
                            your portfolio
                        </div>
                        <div class="row g-1">
                            <div class="col-12">
                                <label>Position You’re Open For</label>
                                @if (!$talentAchievement->isEmpty())
                                    <div class="fieldValue">{{ $talentAchievement[0]->position_open_for }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label>Applications & Tools Used</label>
                                <div class="fieldValue d-flex flex-wrap">
                                    @php
                                        if (!$talentAchievement->isEmpty()) {
                                            $tools = explode(',', $talentAchievement[0]->application_tool_used);
                                        
                                            foreach ($tools as $value) {
                                                echo '<div class="chip-gray">' . $value . '</div>';
                                            }
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Portfolio / Code Repository URL</label>
                                @if (!$talentAchievement->isEmpty())
                                    <div class="fieldValue">{{ $talentAchievement[0]->portfolio }}</div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <label>Skill</label>
                                <div class="fieldValue d-flex flex-wrap">
                                    @php
                                        if (!$talentAchievement->isEmpty()) {
                                            $skills = explode(',', $talentAchievement[0]->skills);
                                            foreach ($skills as $value) {
                                                echo '<div class="chip-yellow">' . $value . '</div>';
                                            }
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <label>Your Achievements</label>
                                <div class="fieldValue">
                                    <div class="achievements">
                                        <div class="row d-flex">
                                            @if (!$talentAchievement->isEmpty())
                                                @foreach ($talentAchievement as $achievement)
                                                    @if (!$achievement->core->isEmpty())
                                                        @foreach ($achievement->core as $item)
                                                            <div class="col-12 col-xl-12">
                                                                <div class="accordionListCard">
                                                                    <div class="content">
                                                                        <div class="body">{{ $item->achievement }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Education</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <button>
                                    <a href="{{ url('/Talent/add-education') }}">ADD MORE</a>
                                </button>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">Add your education and degrees</div>
                        <div class="row d-flex">
                            @if (!$talentEducation->isEmpty())
                                @foreach ($talentEducation as $education)
                                    <div class="col-lg-6 d-flex">
                                        <div class="accordionListCard false undefined false">
                                            <div class="head" name="head">
                                                <div class="bold" name="title">
                                                    {{ $education->university }}
                                                </div>
                                                <div class="action">
                                                    <button class="icon-button round false">
                                                        <a
                                                            href="{{ url('/Talent/edit-education') . '/' . $education->id }}">
                                                            <img
                                                                src="{{ asset('assets/talentconnet/pencil-icon.png') }}">
                                                        </a>
                                                    </button>
                                                    <button class="icon-button round delete">
                                                        <a
                                                            href="{{ url('/Talent/delete-education') . '/' . $education->id }}">
                                                            <img src="{{ asset('assets/talentconnet/delete.svg') }}">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content" name="content">
                                                <div class="body">{{ $education->degree }}</div>
                                                <div class="gray">
                                                    {{ date('M Y', strtotime($education->start_date)) . ' - ' . date('M Y', strtotime($education->end_date)) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Certification</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <button>
                                    <a href="{{ url('/Talent/add-certificate') }}">ADD MORE</a>
                                </button>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">Add atleast 3 certifications here, these help employers to
                            recognize you as a learner</div>
                        <div class="row d-flex">
                            @if (!$talentCertificate->isEmpty())
                                @foreach ($talentCertificate as $certificate)
                                    <div class="col-lg-6 d-flex">
                                        <div class="accordionListCard false undefined false">
                                            <div class="head" name="head">
                                                <div class="bold" name="title">
                                                    {{ $certificate->course_name }},
                                                    {{ $certificate->issue_organization }}
                                                </div>
                                                <div class="action">
                                                    <button class="icon-button round false">
                                                        <a
                                                            href="{{ url('/Talent/edit-certificate') . '/' . $certificate->id }}">
                                                            <img
                                                                src="{{ asset('assets/talentconnet/pencil-icon.png') }}">
                                                        </a>
                                                    </button>
                                                    <button class="icon-button round delete">
                                                        <a
                                                            href="{{ url('/Talent/delete-certificate') . '/' . $certificate->id }}">
                                                            <img src="{{ asset('assets/talentconnet/delete.svg') }}">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content" name="content">
                                                <div class="gray">
                                                    Issued: {{ date('Y/m/d', strtotime($certificate->issue_date)) }}
                                                    @if ($certificate->expire_date != null)
                                                        - Expires:
                                                        {{ date('Y/m/d', strtotime($certificate->expire_date)) }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="profile-Accordion accordionOpen">
                    <div class="accordion">
                        <div class="head">
                            <h6>Testimonials</h6>
                            <div class="progressBarDiv">
                                <div class="progressBar" style="height: 11px;">
                                    <div class="progress" style="background-color: rgb(129, 197, 87); width: 100%;">
                                    </div>
                                </div>
                                <div class="value">&nbsp;&nbsp;100%</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="other-btn">
                                <a href="{{ url('/Talent/add-testimonial') }}" class="text-dark">ADD MORE</a>
                            </div>
                            <button class="icon-button">
                                <div class="circle-plus closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                                <div class="circle-plus-two closed">
                                    <div class="circle">
                                        <div class="horizontal"></div>
                                        <div class="vertical"></div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="accordionContent accordionContentOpen" aria-expanded="true">
                        <div class="contentHeading">Show off what your past employers and colleagues have to say about
                            you to make your profile stand out</div>
                        <div class="row d-flex">
                            @if (!$talentTestimonial->isEmpty())
                                @foreach ($talentTestimonial as $testimonial)
                                    <div class="col-lg-12 d-flex">
                                        <div class="accordionListCard false undefined false">
                                            <div class="head" name="head">
                                                <div class="bold" name="title">
                                                    <div class="d-flex flex-wrap">
                                                        <p>
                                                        <ul>
                                                            <li>“ {{ $testimonial->testimonial }} ”</li>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="icon-button round false">
                                                        <a
                                                            href="{{ url('/Talent/edit-testimonial') . '/' . $testimonial->id }}">
                                                            <img
                                                                src="{{ asset('assets/talentconnet/pencil-icon.png') }}">
                                                        </a>
                                                    </button>
                                                    <button class="icon-button round delete">
                                                        <a
                                                            href="{{ url('/Talent/delete-testimonial') . '/' . $testimonial->id }}">
                                                            <img src="{{ asset('assets/talentconnet/delete.svg') }}">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="semibold">{{ $testimonial->client_name }}</div>
                                                <div class="semibold">{{ $testimonial->company_name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')
