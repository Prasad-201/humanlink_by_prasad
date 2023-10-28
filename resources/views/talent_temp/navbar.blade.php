<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
        @if (Session()->get(HLINKROLE) == CANDIDATE)
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                    <?php
                        $talentID = getUserId();
                        $noticeSql = DB::select('select "shortlist_candidates.*", COUNT("shortlist_candidates.candidate_id") as `Notice_Count` from `shortlist_candidates` where `shortlist_candidates`.`candidate_id` = '. $talentID );
                    ?>
                    <span class="badge bg-primary badge-number">{{ $noticeSql[0]->Notice_Count }}</span>'
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="">
                    <li class="dropdown-header">
                      You have {{ $noticeSql[0]->Notice_Count }} new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
            </li>
        @endif
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/talentconnet/setting-icon.png') }}" alt="Profile"
                        class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    @if (Session()->get(HLINKROLE) == CANDIDATE)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/Talent/get-help') }}">
                                <i class="bi bi-person"></i><span>Get Help</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/sign-out') }}">
                                <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
                            </a>
                        </li>
                    @endif
                    @if (Session()->get(HLINKROLE) == EMPLOYER)
                        <a class="dropdown-item" href="{{ url('/HireTalent/manage-account') }}">
                            <span>Manage Account</span>
                        </a>
                        <a class="dropdown-item" href="{{ url('/HireTalent/update-password') }}">
                            <span>Update Password</span>
                        </a>
                        <a class="dropdown-item" href="{{ url('/HireTalent/get-help') }}">
                            <span>Get Help</span>
                        </a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/sign-out') }}">
                                <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
                            </a>
                        </li>
                    @endif
                    @if (Session()->get(HLINKROLE) == SUPERADMIN)
                        <a class="dropdown-item" href="{{ url('/SuperAdmin/update-password') }}">
                            <span>Update Password</span>
                        </a>
                        <a class="dropdown-item" href="{{ url('/SuperAdmin/get-help') }}">
                            <span>Get Help</span>
                        </a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/sign-out') }}">
                                <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </nav>
</header>
