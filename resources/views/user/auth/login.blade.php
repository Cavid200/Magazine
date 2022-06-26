@extends('user.user_main')


@section('content')
    <div class="user-area-all-style log-in-area ptb-100">
        <div class="container">
            <div class="contact-form-action">
                <form method="post" action="{{ route('user.post_login') }}">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="{{ __('email') }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="{{ __('password') }}">
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 form-condition">
                        <div class="agree-label">
                            <input type="checkbox" id="chb1">
                            <label for="chb1">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <a class="forget" href="recover-password.html"></a>
                    </div>

                    <div class="col-12">
                        <button class="default-btn btn-two" type="submit">
                            {{ __('sign in') }}
                        </button>
                    </div>

                    <div class="col-12">
                        <p class="account-desc">
                            {{ __('Not a member?') }}
                            <a href="{{ route('user.register') }}">{{ __('sign up') }}</a>
                        </p>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
