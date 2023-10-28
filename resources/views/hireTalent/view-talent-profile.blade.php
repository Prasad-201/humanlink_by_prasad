@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="profile-page">
            <div class="row">
                <div class="col-sm-4">
                    <div class="left-side">
                        <div class="profile-photo">
                            <figure>
                                @if (File::exists(public_path($talentInfo->user_profile)) && $talentInfo->user_profile != null)
                                    <img alt="profile" class="blurimage" src="{{ asset($talentInfo->user_profile) }}">
                                @else
                                    <img alt="profile" class="blurimage"
                                        src="{{ asset('/assets/talentconnet/hireTalent/dashboard/full-stack.jpg') }}">
                                @endif
                            </figure>
                        </div>
                        <div class="about-wrap">
                            <div class="about-desk">
                                <p>
                                    {{ $talentInfo->introduction }}
                                </p>
                                <ul class="btn-box">
                                    <li>Total Work Experience: {{ $talentInfo->work_experience }} Years</li>
                                    <li>Availability: {{ $talentInfo->notice_period }}</li>
                                </ul>
                            </div>
                            {{-- <div class="skill-list">
                                <h4 class="left-sec-title">Domain expertise/ PROFICIENCY</h4>
                                <ul>
                                    <li>
                                        <span class="name">Big Commerce</span>
                                        <span class="years">3 Years</span>
                                    </li>
                                    <li>
                                        <span class="name">Bootstrap</span>
                                        <span class="years">5 Years</span>
                                    </li>
                                    <li>
                                        <span class="name">Bootstrap</span>
                                        <span class="years">5 Years</span>
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="feedback-quote">
                                <img alt=""
                                    src="{{ asset('/assets/talentconnet/hireTalent/profile/qoute-icon.png') }}">
                                <h4 class="left-sec-title">Testimonial</h4>
                                @if ($testimonials)
                                    @foreach ($testimonials as $test)
                                        <div class="qoute-wrap">
                                            <p>
                                                {{ $test->testimonial }}
                                            </p>
                                            @if ($test->client_name)
                                                <h6 style="text-align: right;">{{ '-' . $test->client_name }}</h6>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="feedback-qoute">
                                <h4 class="left-sec-title">Complementary Skills</h4>
                                @if (!$coreCompetencies->isEmpty())
                                    <ul class="key-quality-box">
                                        @foreach ($coreCompetencies as $coreCompetence)
                                            @php
                                                $skills = $coreCompetence->skills;
                                                $skill = explode(',', $skills);
                                                foreach ($skill as $value) {
                                                    echo '<li>' . $value . '</li>';
                                                }
                                            @endphp
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="interests">
                                <h4 class="left-sec-title">INTERESTS</h4>
                                @php
                                    $interests = explode(',', $talentInfo->interest);
                                @endphp
                                @foreach ($interests as $interest)
                                    <div class="int-box">
                                        <figure>
                                            <img src="{{ asset('/assets/talentconnet/hireTalent/profile/Movies.png') }}"
                                                alt="">
                                        </figure>
                                        <span>{{ ucwords($interest) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="right-side">
                        <div class="main-title">
                            <h1><span class="underline">{{ ucwords($talentInfo->full_name) }}</span></h1>
                            <h2>{{ ucwords($talentInfo->position_applied) }}</h2>
                            <h4 class="right-side-sec-title">PROFESSIONAL EXPERIENCE</h4>
                            @if (!$profExperience->isEmpty())
                                @foreach ($profExperience as $experience)
                                    <ul>
                                        <li>
                                            <p>
                                                <strong>{{ $experience->designation }}</strong> <br>
                                                <strong>
                                                    @php
                                                        if ($experience->end_date != null) {
                                                            $endDate = date('M Y', strtotime($experience->end_date));
                                                        } else {
                                                            $endDate = 'Present';
                                                        }
                                                    @endphp
                                                    ({{ date('M Y', strtotime($experience->start_date)) . ' to ' . $endDate }})
                                                </strong>
                                            </p>
                                            <ul>
                                                <li>{{ $experience->roles_responsibilities }}</li>
                                            </ul>
                                            @php
                                                $skills = explode(',', $experience->skills);
                                            @endphp
                                            <div class="tags">
                                                @foreach ($skills as $skill)
                                                    <span>{{ $skill }}</span>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                            <h4 class="right-side-sec-title">MAJOR PROJECTS</h4>
                            @if (!$majorProjects->isEmpty())
                                @foreach ($majorProjects as $project)
                                    <div class="row major-projects">
                                        <div class="col-sm-12 project-box">
                                            <div class="info">
                                                <h5>{{ $project->project_name }}
                                                    <small>
                                                        ({{ date('M Y', strtotime($project->start_date)) }})
                                                    </small>
                                                </h5>
                                                <ul>
                                                    <li>{{ $project->description }}</li>
                                                </ul>
                                                @php
                                                    $skills = explode(',', $project->skills);
                                                @endphp
                                                <div class="tags">
                                                    @foreach ($skills as $skill)
                                                        <span>{{ $skill }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <h4 class="right-side-sec-title">ACHIEVEMENTS</h4>
                            @if (!$coreCompetencies->isEmpty())
                                @foreach ($coreCompetencies as $item)
                                    @if (!$item->core->isEmpty())
                                        @foreach ($item->core as $value)
                                            <ul class="star-list">
                                                <li>“{{ $value->achievement }}”</li>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            <h4 class="right-side-sec-title">APPLICATIONS & TOOLS KNOWN</h4>
                            <ul class="logos">
                                <li>
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/profile/technology/Ajax.png') }}"
                                        alt="">
                                </li>
                                <li>
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/profile/technology/Apache.png') }}"
                                        alt="">
                                </li>
                                <li>
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/profile/technology/Asana.png') }}"
                                        alt="">
                                </li>
                                <li>
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/profile/technology/aws.png') }}"
                                        alt="">
                                </li>
                                <li>
                                    <img src="{{ asset('/assets/talentconnet/hireTalent/profile/technology/basecamp.png') }}"
                                        alt="">
                                </li>
                            </ul>
                            <h4 class="right-side-sec-title">EDUCATION</h4>
                            <ul>
                                @foreach ($educations as $education)
                                    <li>
                                        {{ ucwords($education->degree) }} from {{ ucfirst($education->university) }}
                                        University in {{ date('Y', strtotime($education->end_date)) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')
