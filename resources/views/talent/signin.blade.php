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
                        <div class="card card-box-shadow card-border sign-up-card mb-3">
                            <div class="pt-4 pb-2 sign-up-card-header">
                                <h3 class="card-title sign-up-card-title">Welcome To</h3>
                                <img src="{{ asset('/assets/logo/pslogo.png') }}" alt=""
                                    class="img-logo">
                                <p class="card-text sign-up-card-text">
                                    Login to become a part of an exclusive network of top global Companies and
                                    Technical Professionals pool.
                                </p>
                            </div>
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small class="text-danger form-text">{{ session()->get('error') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="row g-3" method="POST" action="{{ url('/signin') }}">
                                @csrf
                                <div class="col-12">
                                    @if ($errors->has('username'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('username') }}
                                        </small>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="email" name="username" value="{{ old('username') }}"
                                            class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if ($errors->has('password'))
                                        <small class="text-danger form-text">
                                            {{ $errors->first('password') }}
                                        </small>
                                    @endif
                                    <div class="input-group password-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <input type="password" name="password" value=""
                                            class="form-control" placeholder="Password" required>
                                            <span class="input-group-text eye-button cursor-pointer">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn sign-up-btn w-100" type="submit">Login</button>
                                </div>
                            </form>
                            <div class="divider">
                                <div class="hr-divide"></div>
                                <p class="para-divide">Or</p>
                                <div class="hr-divide"></div>
                            </div>
                            <p class="card-text sign-up-card-text">Don’t have an account? SignUP to</p>
                            <div class="row">
                                <div class="col-lg-6 text-center">
                                    {{-- Comapny Register --}}
                                    <a class="btn btn-link" href="{{ url('/Register/HireTalent') }}">Hire Talent</a>
                                </div>
                                <div class="col-lg-6 text-center">
                                    {{-- Candidate Register --}}
                                    <a class="btn btn-link" href="{{ url('/Register/Talent') }}">Get Hired</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->


@include('talent_temp.footer')
