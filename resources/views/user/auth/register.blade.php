@extends('user.user_main')

@section('content')
    <div class="user-area-all-style sign-up-area ptb-100">
        <div class="container">
            <div class="contact-form-action">
                <form method="post" action="{{ route('user.post_register') }}">
                    @csrf
                    <div class="row">


                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="firstname" placeholder="{{ __('firstname') }}" required>
                                @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 ">
                            <div class="form-group">
                                <input class="form-control" type="text" name="lastname" placeholder="{{ __('lastname') }}">
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="{{ __('email') }}">
                                @if ($message = session('error'))
                                    <span class="text-danger">{{ $message }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="{{ __('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 ">
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation"
                                    placeholder="{{ __('confirm password') }}">
                                @error('password_conformation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-12">
                            <button class="default-btn btn-two" type="submit">
                                {{ __('sign up') }}
                            </button>
                        </div>

                        <div class="col-12">
                            <p class="account-desc">
                                {{ __('Already have an account?') }}
                                <a href="{{ route('user.login') }}">{{ __('sign in') }}</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
