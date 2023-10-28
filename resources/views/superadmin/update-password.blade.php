@include('talent_temp.header')
@include('talent_temp.navbar')
@include('talent_temp.sidebar')

<main id="main" class="main">
    <div class="container">
        <div class="containSection manage-account-page">
            <div class="heading mb-0">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Changed Password</h2>
                    </div>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="contain-section" style="padding: 0">
                <form action="{{ url('/SuperAdmin/update-password') }}" method="post" autocomplete="off">
                    <div class="common-form">
                        <div class="personal-details-section">
                            <div class="boxStyle-one">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrap">
                                            <label class="input-title">Email Address</label>
                                            <div class="edit-box">
                                                <input type="text" class="form-control" placeholder="Email Address"
                                                    name="email_address" disabled
                                                    value="{{ Session()->get(HLINKMAILID) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Old Password
                                                @if ($errors->has('old_password'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('old_password') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <div class="input-group password-group">
                                                    <input type="password" name="old_password"
                                                        value="{{ old('old_password') }}" class="form-control"
                                                        placeholder="Old Password" required>
                                                    <span class="input-group-text eye-button cursor-pointer">
                                                        <i class="bi bi-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                New Password
                                                @if ($errors->has('new_password'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('new_password') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <div class="input-group password-group">
                                                    <input type="password" name="new_password"
                                                        value="{{ old('new_password') }}" class="form-control"
                                                        placeholder="New Password" required>
                                                    <span class="input-group-text eye-button cursor-pointer">
                                                        <i class="bi bi-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrap">
                                            <label class="input-title">
                                                Confirm Password
                                                @if ($errors->has('confirm_password'))
                                                    <small class="form-text text-danger">
                                                        {{ $errors->first('confirm_password') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="edit-box">
                                                <div class="input-group password-group">
                                                    <input type="password" name="confirm_password"
                                                        value="{{ old('confirm_password') }}" class="form-control"
                                                        placeholder="Confirm Password" required>
                                                    <span class="input-group-text eye-button cursor-pointer">
                                                        <i class="bi bi-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="submit-btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('talent_temp.footer')
