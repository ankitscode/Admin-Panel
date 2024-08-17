@extends('layouts.admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('main.profile_picture') }}</h6>
                </div>
                <div class="card-body">
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-2 avater-ext"
                            src="{{ !empty(Auth::user()->profile_image) ? Auth::user()->profile_image : asset('assets/images/users/user-dummy-img.jpg') }}"
                            alt="" style="height: 10rem;width: 10rem;">
                        <div class="large text-muted mb-4">
                            <span class="badge badge-pill badge-{{ Auth::user()->is_active == 1 ? 'success' : 'danger' }}">
                                {{ Auth::user()->is_active ? __('main.active') : __('main.in_active') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('main.change_password') }}</h6>
                </div>
                <div class="card-body">
                    @include('admin.component.modal.display_alert_message')
                    <form method="POST" id="changePasswordForm" action="{{ route('admin.changePasswordStore') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-3 mb-3">
                            <div class="col-md-12">
                                <label class="small mb-1" for="old-password">{{ __('main.old_password') }}</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" style="z-index: 10"
                                        class="form-control position-relative pe-5 @error('password') is-invalid @enderror"
                                        placeholder="Old Password" id="old-password" name="old_password" required autofocus>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted "
                                        onclick=togglePasswordVisibility() style="z-index: 100" type="button"><i
                                            class="ri-eye-fill align-middle closed"
                                            id="toggle-oldpassword-btn"></i></button>
                                    @error('old-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="new-password">{{ __('main.new_password') }}</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" style="z-index: 10"
                                        class="form-control position-relative pe-5 @error('password') is-invalid @enderror"
                                        name="password" placeholder="Old Password" id="new-password" required autofocus>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted "
                                        onclick=toggleNewPasswordVisibility() style="z-index: 100" type="button"><i
                                            class="ri-eye-fill align-middle closed"
                                            id="toggle-newpassword-btn"></i></button>
                                    @error('new-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="password-confirm">{{ __('main.retype_password') }}</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" style="z-index: 10"
                                        class="form-control position-relative pe-5 @error('password') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Retype Password" id="password-confirm"
                                        required autofocus>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted "
                                        onclick=toggleRetypePasswordVisibility() style="z-index: 100" type="button"><i
                                            class="ri-eye-fill align-middle closed"
                                            id="toggle-retypenewpassword-btn"></i></button>
                                    @error('new-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">{{ __('main.save_changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function togglePasswordVisibility() {
            var oldpassword = document.getElementById('old-password');
            if (oldpassword.type === 'text') {
                oldpassword.type = 'password';
            } else {
                oldpassword.type = 'text';
            }
        }

        function toggleNewPasswordVisibility() {
            var newpassword = document.getElementById('new-password');
            if (newpassword.type === 'text') {
                newpassword.type = 'password';
            } else {
                newpassword.type = 'text';
            }
        }

        function toggleRetypePasswordVisibility() {
            var passwordconfirm = document.getElementById('password-confirm');
            if (passwordconfirm.type === 'text') {
                passwordconfirm.type = 'password';
            } else {
                passwordconfirm.type = 'text';
            }
        }
        
    </script>
@endsection
