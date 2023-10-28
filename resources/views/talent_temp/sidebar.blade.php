@if (Session()->get(HLINKROLE) == CANDIDATE)
    <aside id="sidebar" class="sidebar bg-dark menuSidebar">
        <button class="btn btn-close-sidebar"><i class="bi bi-x-lg"></i></button>
        <ul class="sidebar-nav" id="sidebar-nav">
            <a href="" class="nav-link-image">
                <img src="{{ asset('/assets/logo/pslogo.png') }}" alt="Logo Image" class="img-thumbail nav-image">
            </a>
            @php
                $talentID = getUserId();
                $talentInfo = DB::table('talent')
                    ->where('id', $talentID)
                    ->first();
            @endphp
            <div class="userBox">
                <figure>
                    @if (File::exists(public_path($talentInfo->user_profile)) && $talentInfo->user_profile != null)
                        <img src="{{ asset($talentInfo->user_profile) }}" alt="Profile">
                    @else
                        <img src="{{ asset('/assets/talentconnet/hireTalent/dashboard/profile.png') }}" alt="Profile">
                    @endif
                </figure>
                <div class="u-name">{{ $talentInfo->full_name }}</div>
                <a class="u-email">{{ $talentInfo->email_address }}</a>
            </div>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Talent/Dashboard') ? '' : 'collapsed' }}"
                    href="{{ url('/Talent/Dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Talent/open-position') ? '' : 'collapsed' }}"
                    href="{{ url('/Talent/open-position') }}">
                    <i class="bi bi-grid"></i>
                    <span>Open Position</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-files"></i>
                    <span>Assessment</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ url('Talent/assessments') }}"
                            class="{{ Request::is('Talent/assessments') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Assessment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('Talent/view-assessment-marks') }}"
                            class="{{ Request::is('Talent/view-assessment-marks') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View Assessment Marks</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('Talent/video-module') ? 'active' : '' }}"
                            href="{{ url('Talent/video-module') }}">
                            <i class="bi bi-circle"></i>
                            <span>Video Module</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Talent/profile') ? '' : 'collapsed' }}"
                    href="{{ url('/Talent/profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Talent/feedback') ? '' : 'collapsed' }}"
                    href="{{ url('/Talent/feedback') }}">
                    <i class="bi bi-file-earmark-word"></i>
                    <span>Feedback</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('Talent/point-of-contact') ? '' : 'collapsed' }}"
                    href="{{ url('/Talent/point-of-contact') }}">
                    <i class="bi bi-file-person"></i>
                    <span>Your Point of Contact</span>
                </a>
            </li>
        </ul>
    </aside>
@endif

@if (Session()->get(HLINKROLE) == EMPLOYER)
    <aside id="sidebar" class="sidebar bg-dark menuSidebar hire-talent-sidebar">
        <button class="btn btn-close-sidebar"><i class="bi bi-x-lg"></i></button>
        <ul class="sidebar-nav" id="sidebar-nav">
            <a href="" class="nav-link-image">
                <img src="{{ asset('/assets/logo/pslogo.png') }}" alt="Logo Image" class="img-thumbail nav-image">
            </a>
            <div class="userBox userBox-no-hover">
                <figure>
                    @php
                        $HiretalentId = getUserId();
                        $HiretalentInfo = \App\Models\HireTalent::where('id', $HiretalentId)->first();
                    @endphp
                    @if (File::exists(public_path($HiretalentInfo->hiretalent_profile)) && $HiretalentInfo->hiretalent_profile != null)
                        <img src="{{ asset($HiretalentInfo->hiretalent_profile) }}" alt="Profile">
                    @else
                        <img src="{{ asset('/assets/talentconnet/client-default-image.png') }}" alt="Profile">
                    @endif
                </figure>
                <div class="u-name">{{ $HiretalentInfo->full_name }}</div>
                <a class="u-email">{{ Session()->get(HLINKMAILID) }}</a>
            </div>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('HireTalent') ? '' : 'collapsed' }}"
                    href="{{ url('/HireTalent') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-gem"></i>
                    <span>Hire Position</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ url('HireTalent/open-position') }}"
                            class="{{ Request::is('HireTalent/open-position') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Open Position</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('HireTalent/talent-pool') }}"
                            class="{{ Request::is('HireTalent/talent-pool') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Talent Pool</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('HireTalent/shortlist-talent') }}"
                            class="{{ Request::is('HireTalent/shortlist-talent') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Shortlisted Talents</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('HireTalent/interview') }}"
                            class="{{ Request::is('HireTalent/interview') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Interview</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('HireTalent/feedback') }}"
                            class="{{ Request::is('HireTalent/feedback') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('HireTalent/onboard') }}"
                            class="{{ Request::is('HireTalent/onboard') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Onboard</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('HireTalent/my-team') ? '' : 'collapsed' }}"
                    href="{{ url('/HireTalent/my-team') }}">
                    <i class="bi bi-people"></i><span>My Team</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('HireTalent/ticket') ? '' : 'collapsed' }}"
                    href="{{ url('/HireTalent/ticket') }}">
                    <i class="bi bi-file-earmark-word"></i><span>Ticket</span>
                </a>
            </li>
        </ul>
    </aside>
@endif

@if (Session()->get(HLINKROLE) == SUPERADMIN)
    <aside id="sidebar" class="sidebar bg-dark menuSidebar hire-talent-sidebar">
        <button class="btn btn-close-sidebar"><i class="bi bi-x-lg"></i></button>
        <ul class="sidebar-nav" id="sidebar-nav">
            <a href="" class="nav-link-image">
                <img src="{{ asset('/assets/logo/pslogo.png') }}" alt="Logo Image" class="img-thumbail nav-image">
            </a>
            <div class="userBox userBox-no-hover">
                <figure>
                    @php
                        $HiretalentId = getUserId();
                        $HiretalentInfo = \App\Models\SuperAdminModel::where('id', $HiretalentId)->first();
                    @endphp
                    @if (File::exists(public_path($HiretalentInfo->profile_image)) && $HiretalentInfo->profile_image != null)
                        <img src="{{ asset($HiretalentInfo->profile_image) }}" alt="Profile">
                    @else
                        <img src="{{ asset('/assets/talentconnet/client-default-image.png') }}" alt="Profile">
                    @endif
                </figure>
                <div class="u-name">{{ $HiretalentInfo->full_name }}</div>
                <a class="u-email">{{ Session()->get(HLINKMAILID) }}</a>
            </div>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('SuperAdmin') ? '' : 'collapsed' }}"
                    href="{{ url('/SuperAdmin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-people-fill"></i>
                    <span>Admin</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="admin-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ url('SuperAdmin/admins') }}"
                            class="{{ Request::is('SuperAdmin/admins') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Admins</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('SuperAdmin/hiring-request') }}"
                            class="{{ Request::is('SuperAdmin/hiring-request') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>All Hiring Requests</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-journal-text"></i>
                    <span>Assessment</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ url('SuperAdmin/assessment') }}"
                            class="{{ Request::is('SuperAdmin/assessment') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Assessment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('SuperAdmin/view-assessment-marks') }}"
                            class="{{ Request::is('SuperAdmin/view-assessment-marks') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View Assessment Marks</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('SuperAdmin/video-module') ? '' : 'collapsed' }}"
                    href="{{ url('SuperAdmin/video-module') }}">
                    <i class="bi bi-camera-video"></i>
                    <span>Video Module</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('SuperAdmin/ticket') ? '' : 'collapsed' }}"
                    href="{{ url('/SuperAdmin/ticket') }}">
                    <i class="bi bi-file-earmark-word"></i><span>Ticket</span>
                </a>
            </li>
        </ul>
    </aside>
@endif
