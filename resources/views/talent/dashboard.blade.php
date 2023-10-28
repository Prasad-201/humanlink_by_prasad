@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container pos-relative" style="position: relative;">
        <div class="average-rating-survey">
            <div class="rating-survey-icon">
                <img src="{{ asset('/assets/talentconnet/happiness-icon.svg') }}" alt="">
            </div>
            <div class="rating-survey-number">9.6<span>/10</span></div>
            <div class="rating-survey-info">Average Rating of Happiness Survey</div>
        </div>
        <div class="talent-page-heading">
            <h2 class="h2 main-heading">
                Welcome <span class="text-capitalize">{{ $talentInfo->full_name }}</span>!
            </h2>
        </div>
        <div class="welcome-at-talent-uplers">
            <div class="welcome-at-talent-uplers-img">
                <img src="{{ asset('assets/talentconnet/medal-icon.svg') }}" alt="">
            </div>
            <div class="welcome-at-talent-uplers-info">
                <p>
                    Static - The Learning Forum is the largest platform for vetted Indian Talents. Being part of this platform
                    helps you connect with the top talents globally and allows you to find and get
                    interviewed with the best global companies across the globe.
                </p>
            </div>
        </div>
        <div class="gray-box-wrap simple-box-wrap">
            <div class="gray-box-wrap-head">
                <h2>static - All you have to do is 4 simple steps</h2>
            </div>
            <div class="gray-box-wrap-body">
                <ul class="simple-step">
                    <li>
                        <a class="simple-steps-Item false" title="Complete your Tech Assessments"
                            href="{{ url('/Talent/assessments') }}">
                            <span class="simple-steps-no">
                                <img src="{{ asset('assets/talentconnet/Dashboard/setp-completed-icon.svg') }}"
                                    alt="setp-completed"> 01
                            </span>
                            <span class="simple-steps-icon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/tech-assessments-icon.png') }}"
                                    alt="tech-assessments-icon">
                            </span>
                            Take your Assessments
                            <span class="take-assessment-link">
                                Take Assessment
                                <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                    alt="external-link-icon">
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="simple-steps-Item false" title="Complete your Language assessment">
                            <span class="simple-steps-no">
                                <img src="{{ asset('assets/talentconnet/Dashboard/setp-completed-icon.svg') }}"
                                    alt="setp-completed"> 02
                            </span>
                            <span class="simple-steps-icon">
                                <img src="{{ url('assets/talentconnet/Dashboard/language-assessment-icon.png') }}"
                                    alt="language-assessment-icon">
                            </span> Complete your Profiles
                        </div>
                    </li>
                    <li>
                        <div class="simple-steps-Item false"
                            title="Get your profile noticeable to the global companies.">
                            <span class="simple-steps-no">
                                <img src="{{ url('assets/talentconnet/Dashboard/setp-completed-icon.svg') }}"
                                    alt="setp-completed">
                                03</span>
                            <span class="simple-steps-icon">
                                <img src="{{ url('assets/talentconnet/Dashboard/global-companies-icon.png') }}"
                                    alt="global-companies-icon">
                            </span>We make your profile noticeable to the global
                            companies.
                        </div>
                    </li>
                    <li>
                        <div class="simple-steps-Item false"
                            title="Get your pool boarding signed with our platform.">
                            <span class="simple-steps-no">
                                <img src="{{ url('assets/talentconnet/Dashboard/setp-completed-icon.svg') }}"
                                    alt="setp-completed">04
                            </span>
                            <span class="simple-steps-icon">
                                <img src="{{ url('assets/talentconnet/Dashboard/pool-icon.png') }}" alt="pool-icon">
                            </span>On Selection complete onboarding.
                        </div>
                    </li>
                </ul>
                <h3>
                    Yaay! Your profile will be ready to matched to a long term global opportunities that best suits your
                    profile.
                </h3>
            </div>
        </div>
        <div class="gray-box-wrap simple-box-wrap">
            <div class="gray-box-wrap-head">
                <h2>Static - Our Talent Stories</h2>
            </div>
            <div class="gray-box-wrap-body">
                <div class="talentsStoriesCarousel">
                    <div class="talents-stories-box">
                        <h3>How Harmandeep earns as per global standards while working remotely</h3>
                        <div class="talents-stories-video">
                            <a href="#" data-toggle="modal" data-target="#talentStoryModal">
                                <img src="{{ asset('assets/talentconnet/Dashboard/stories/story-4.jpg') }}"
                                    alt="talent-stories">
                            </a>
                        </div>
                        <div class="our-talent-view-profile">
                            <a title="View Profile" class="ytStoryBtn"
                                data-youtube-link="https://www.youtube.com/embed/JWnu8xbTMbI">
                                View Profile
                                <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                    alt="external-link-icon">
                            </a>
                        </div>
                    </div>
                    <div class="talents-stories-box">
                        <h3>Mayank shares his experience with Hiring Process</h3>
                        <div class="talents-stories-video">
                            <a href="#" data-toggle="modal" data-target="#talentStoryModal">
                                <img src="{{ asset('assets/talentconnet/Dashboard/stories/story-1.jpg') }}"
                                    alt="talent-stories">
                            </a>
                        </div>
                        <div class="our-talent-view-profile">
                            <a title="View Profile" class="ytStoryBtn"
                                data-youtube-link="https://www.youtube.com/embed/JWnu8xbTMbI">View
                                Profile
                                <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                    alt="external-link-icon">
                            </a>
                        </div>
                    </div>
                    <div class="talents-stories-box">
                        <h3>How Nabil's go-getter approach helped him become a part of our Forum</h3>
                        <div class="talents-stories-video">
                            <a href="#" data-toggle="modal" data-target="#talentStoryModal">
                                <img src="{{ asset('assets/talentconnet/Dashboard/stories/story-2.jpg') }}"
                                    alt="talent-stories">
                            </a>
                        </div>
                        <div class="our-talent-view-profile">
                            <a title="View Profile" data-bs-toggle="modal" data-bs-target="#exampleModal">View
                                Profile
                                <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                    alt="external-link-icon">
                            </a>
                        </div>
                    </div>
                </div>
                <h3>
                    Yaay! Your profile will be ready to matched to a long term global opportunities that best suits your
                    profile.
                </h3>
            </div>
        </div>
        <div class="gray-box-wrap total-contractual-wrap">
            <div class="gray-box-wrap-head">
                <h2>Static - Opportunities Fulfilled</h2>
            </div>
            <div class="gray-box-wrap-body">
                <ul>
                    <li>
                        <div class="total-contractual-box">
                            <div class="totalContractualIcon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/contractual-icon.svg') }}"
                                    alt="contractual-icon">
                            </div>
                            <div class="totalContractualInfo">
                                <h4>450+</h4>
                                <p>Full time Contractual Opportunities Fulfilled</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="total-contractual-box">
                            <div class="totalContractualIcon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/placements-icon.svg') }}"
                                    alt="contractual-icon">
                            </div>
                            <div class="totalContractualInfo">
                                <h4>50+</h4>
                                <p>Direct placements conducted</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="total-contractual-box">
                            <div class="totalContractualIcon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/matchmaked-icon.svg') }}"
                                    alt="contractual-icon">
                            </div>
                            <div class="totalContractualInfo">
                                <h4>800+</h4>
                                <p>Talents match against opportunities</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="our-clients-and-survey">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="gray-box-wrap">
                        <div class="gray-box-wrap-head">
                            <h2>static - Hear it from our Clients</h2>
                        </div>
                        <div class="gray-box-wrap-body">
                            <div class="what-says-our-client">
                                <div class="our-clients-box">
                                    <div class="ourClientsLogo">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/scaleforce-logo.png') }}"
                                            alt="tanium-logo">
                                    </div>
                                    <div class="feedback-rating-star">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                    </div>
                                    <div class="ourClientsSays">
                                        <p>
                                        <p>
                                            "HumanLink helped accelerate the entire process thanks to their
                                            great pool of high-quality talents. We could start quickly
                                            and it was cost-effective too! What more could we ask for!"
                                        </p>
                                        </p>
                                    </div>
                                    <div class="our-client-watch-video">
                                        <a href="javascript:void(0);" title="Watch Video" class="ytStoryBtn"
                                            data-youtube-link="https://www.youtube.com/embed/JWnu8xbTMbI">Watch
                                            Video
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9.5" cy="9.5" r="9.5" fill="#232323">
                                                </circle>
                                                <path d="M7.6001 5.06641L12.6668 9.49974L7.6001 13.9331V5.06641Z"
                                                    fill="#FFDA30"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="our-clients-box">
                                    <div class="ourClientsLogo">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/directive-logo.svg') }}"
                                            alt="tanium-logo">
                                    </div>
                                    <div class="feedback-rating-star">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                    </div>
                                    <div class="ourClientsSays">
                                        <p>
                                        <p>
                                            "It's been a fantastic experience working with the team at
                                            HUmanLink. The account manager was friendly, easy to work and
                                            had great communication skills. He came up with some great
                                            ideas too for the paid campaigns! They were technically
                                            sound and proactive with the tasks."
                                        </p>
                                        </p>
                                    </div>
                                    <div class="our-client-watch-video">
                                        <a href="javascript:void(0);" title="Watch Video" class="ytStoryBtn"
                                            data-youtube-link="https://www.youtube.com/embed/JWnu8xbTMbI">Watch Video
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9.5" cy="9.5" r="9.5" fill="#232323">
                                                </circle>
                                                <path d="M7.6001 5.06641L12.6668 9.49974L7.6001 13.9331V5.06641Z"
                                                    fill="#FFDA30"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="our-clients-box">
                                    <div class="ourClientsLogo">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/tanium-logo.svg') }}"
                                            alt="tanium-logo">
                                    </div>
                                    <div class="feedback-rating-star">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                        <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                            alt="start-icon">
                                    </div>
                                    <div class="ourClientsSays">
                                        <p>
                                        <p>
                                            "The experience so far has been fantastic as the assigned
                                            Project Manager is available for regular catch-ups, is quick
                                            to
                                            understand requirements, and coordinates with other team
                                            members
                                            for smooth execution."
                                        </p>
                                        </p>
                                    </div>
                                    <div class="our-client-watch-video">
                                        <a href="javascript:void(0);" title="Watch Video"class="ytStoryBtn"
                                            data-youtube-link="https://www.youtube.com/embed/JWnu8xbTMbI">
                                            Watch Video
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9.5" cy="9.5" r="9.5" fill="#232323">
                                                </circle>
                                                <path d="M7.6001 5.06641L12.6668 9.49974L7.6001 13.9331V5.06641Z"
                                                    fill="#FFDA30"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" style="display:none">
                    <div class="gray-box-wrap ourSurveyWrap">
                        <div class="gray-box-wrap-head">
                            <h2>Static - Our Happiness Survey</h2>
                        </div>
                        <div class="gray-box-wrap-body">
                            <div class="ourSurveyBox">
                                <div class="ourSurveyBoxHead">9.6<small>/10</small>
                                    <img src="{{ asset('assets/talentconnet/Dashboard/happiness-icon.svg') }}"
                                        alt="happiness-icon">
                                </div>
                                <div class="ourSurveyBoxBody">
                                    <p>Top benefits our talents see with us while working with clients</p>
                                    <ul>
                                        <li>
                                            <div class="ourSurveyProTitle">Work life balance</div>
                                            <div class="surveyProgressBar">
                                                <div class="surveyProgressBarInner"><span
                                                        style="background: rgb(76, 99, 210); width: 73%;"></span></div>
                                                <div class="surveyProgress">73%</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ourSurveyProTitle">Appreciate the payouts</div>
                                            <div class="surveyProgressBar">
                                                <div class="surveyProgressBarInner"><span
                                                        style="background: rgb(64, 218, 117); width: 71%;"></span>
                                                </div>
                                                <div class="surveyProgress">71%</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ourSurveyProTitle">Projects &amp; exposure</div>
                                            <div class="surveyProgressBar">
                                                <div class="surveyProgressBarInner"><span
                                                        style="background: rgb(194, 143, 239); width: 71%;"></span>
                                                </div>
                                                <div class="surveyProgress">71%</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ourSurveyProTitle">Support from talent success coach (TSC)
                                            </div>
                                            <div class="surveyProgressBar">
                                                <div class="surveyProgressBarInner">
                                                    <span style="background: rgb(254, 164, 81); width: 70%;"></span>
                                                </div>
                                                <div class="surveyProgress">70%</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-box-wrap">
            <div class="gray-box-wrap-head">
                <h2>Static - Hear it from our Talents!</h2>
            </div>
            <div class="gray-box-wrap-body">
                <div class="our-talent-section">
                    <div class="our-talent-box">
                        <div class="our-talent-box-head">
                            <div class="our-Talent-Img">
                                <img src="{{ asset('assets/talentconnet/Dashboard/apoorv-jha.jpg') }}"
                                    alt="profile-picture">
                            </div>
                            <div class="our-talent-info">
                                <div class="ourTalentComIcon">
                                    <img src="{{ asset('assets/talentconnet/Dashboard/google-icon.png') }}"
                                        alt="google-icon">
                                </div>
                                <h3>Apoorv Jha</h3>
                                <p>Amazon Business</p>
                            </div>
                        </div>
                        <div class="our-talent-box-body">
                            <div class="feedback-rating-star">
                                <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon">
                                <img src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon">
                            </div>
                            <div class="ourTalentSays">
                                <p>"Wonderful work culture, extremely helpful and supportive management. I've been
                                    working here for 6 months now, and they've went by like a breeze. The induction
                                    process was smooth. The client on-boarding was perfect. There's a healthy work-life
                                    balance. The pay is up to industry's standards if not higher. All in all, one of the
                                    best companies to work in." </p>
                            </div>
                            <div class="ourTalentViewProfile">
                                <a href="{{ url('/Talent/common-talent') }}" title="View Profile" target="_blank">
                                    View Profile
                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                        alt="external-link-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="our-talent-box">
                        <div class="our-talent-box-head">
                            <div class="our-Talent-Img">
                                <img src="{{ asset('assets/talentconnet/Dashboard/abhiraj-das-ghosh.jpg') }}"
                                    alt="profile-picture">
                            </div>
                            <div class="our-talent-info">
                                <h3>Abhiraj Das Ghosh</h3>
                                <p>Point Dot Media</p>
                            </div>
                        </div>
                        <div class="our-talent-box-body">
                            <div class="feedback-rating-star"><img
                                    src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon"><img
                                    src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon"><img
                                    src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon"><img
                                    src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon"><img
                                    src="{{ asset('assets/talentconnet/Dashboard/talent-start-icon.svg') }}"
                                    alt="start-icon"></div>
                            <div class="ourTalentSays">
                                <p>"HumanLink review process is one of the most well thought out ones I've come across. The
                                    review is scientific and technical, and tests out the skills throughout. The job
                                    process is straightforward, before every interview the team and talent coaches will
                                    help you prepare for: the same. Got placed through them and I'm satisfied!" </p>
                            </div>
                            <div class="ourTalentViewProfile">
                                <a href="{{ url('/Talent/common-talent') }}" title="View Profile" target="_blank">
                                    View Profile
                                    <img src="{{ asset('assets/talentconnet/hireTalent/dashboard/full-s-icon.png') }}"
                                        alt="external-link-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-box-wrap">
            <div class="gray-box-wrap-head">
                <h2>Static - We are trusted by leading brands from around the world</h2>
            </div>
            <div class="gray-box-wrap-body">
                <div class="trusted-leading-brand">
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/rc-logo-21671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/amazon-business-logo-61671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/oracle-logo%20(1)-01671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/airtasker-logo%20(2)-11671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/21st-century-fox-31671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/national-geographic-logo%20(1)-41671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/rc-logo-21671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/amazon-business-logo-61671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/oracle-logo%20(1)-01671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/airtasker-logo%20(2)-11671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/21st-century-fox-31671428003.svg"
                            alt="brand logo">
                    </div>
                    <div class="trustedLogo">
                        <img src="https://ats.uplers.com/talents-home/leading-brand/national-geographic-logo%20(1)-41671428003.svg"
                            alt="brand logo">
                    </div>
                </div>
            </div>
        </div>
        <div class="gray-box-wrap" style="display:none">
            <div class="gray-box-wrap-head">
                <h2>Static - Your Point of Contact</h2>
            </div>
            <div class="gray-box-wrap-body">
                <div class="your-point-contact-box">
                    <div class="your-point-contact-head">
                        <div class="your-point-contact-profile"><img
                                src="https://ats.uplers.com/images/profile_pic/Sagarika Jha-1657005866.jpg"
                                alt="profile_pic-poc"></div>
                        <div class="your-point-contact-info">
                            <h3>Sagarika Jha</h3>
                            <p>Customer Experience Executive</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <h4>Email</h4>
                            <p><a href="mailto:sagarika.j@uplers.in"
                                    title="sagarika.j@uplers.in">sagarika.j@uplers.in</a></p>
                        </li>
                        <li>
                            <h4>Skype ID</h4>
                            <p>live:.cid.9025f4ae8af259e5</p>
                        </li>
                        <li>
                            <h4>Phone</h4>
                            <p>9316228201</p>
                        </li>
                        <li>
                            <h4>Linkedin</h4>
                            <p><a class="inLink" href="http://linkedin.com/in/sagarika-jha-a5640120b"
                                    title="http://linkedin.com/in/sagarika-jha-a5640120b">http://linkedin.com/in/sagarika-jha-a5640120b</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="youtubeStoryModal" tabindex="-1" aria-labelledby="youtubeStoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="ytVideoFrame">
                    <iframe width="560" height="315" src="" title="YouTube video player"
                        frameborder="0" class="youtubeStoryVideo"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.ytStoryBtn', function() {
            ytStoryLink = $(this).attr('data-youtube-link');
            $('.youtubeStoryVideo').attr('src', ytStoryLink);
            $('#youtubeStoryModal').modal('show');
        });

        $(document).on('click', '#youtubeStoryModal .btn-close', function() {
            $('.youtubeStoryVideo').attr('src', '');
        });
    });
</script>

@include('talent_temp.footer')
