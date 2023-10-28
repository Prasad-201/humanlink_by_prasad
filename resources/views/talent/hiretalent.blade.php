@include('talent_temp.header')

<main>
    <div class="container-fluid">
        <section class="section sign-up-page min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="signup-left-side-image">
                            <img src="{{ asset('/assets/talentconnet/login-bg.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-box-shadow register-card card-border sign-up-card mb-3">
                            <div class="pt-4 pb-2 sign-up-card-header">
                                <h4 class="card-title sign-up-card-second-title">
                                    Create your account with Uplers Talent Solutions to find your next qualified
                                    professional
                                </h4>
                            </div>
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small class="text-danger form-text">{{ session()->get('error') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="row g-3" method="POST" action="{{ url('/Register/HireTalent') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" name="full_name" class="form-control"
                                                value="{{ old('full_name') }}" required>
                                        </div>
                                        @if ($errors->has('full_name'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('full_name') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Company Name</label>
                                            <input type="text" name="company_name" class="form-control"
                                                value="{{ old('company_name') }}" required>
                                        </div>
                                        @if ($errors->has('company_name'))
                                            <small class="text-danger form-text">
                                                {{ $errors->first('company_name') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email_address" class="form-control"
                                            value="{{ old('email_address') }}" required>
                                    </div>
                                    @if ($errors->has('email_address'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('email_address') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group password-group">
                                                <label for="">Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="bi bi-lock"></i>
                                                    </span>
                                                    <input type="password" name="password" class="form-control"
                                                        length="10" value="{{ old('password') }}" required>
                                                    <span class="input-group-text eye-button cursor-pointer">
                                                        <i class="bi bi-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('password') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Mobile Number</label>
                                                <input type="number" name="mobile_number" class="form-control"
                                                    value="{{ old('mobile_number') }}" required>
                                            </div>
                                            @if ($errors->has('mobile_number'))
                                                <small class="text-danger form-text">
                                                    {{ $errors->first('mobile_number') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn sign-up-btn w-100" type="submit">Create Account</button>
                                </div>
                            </form>
                            <div class="divider">
                                <div class="hr-divide"></div>
                                <p class="para-divide">Or</p>
                                <div class="hr-divide"></div>
                            </div>
                            <p class="card-text sign-up-card-text text-center">I have an account?
                                <a class="login-link" href="{{ url('/') }}">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->



@include('talent_temp.footer')
