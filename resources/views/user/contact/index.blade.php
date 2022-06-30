@extends('user.user_main')
@section('content')
    <div class="page-title-area bg-9">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ __('contact us') }}</h2>
                <ul>
                    <li>{{ __('return to home page') }}/
                        <a href="{{ route('user.index') }}">
                            {{ __('home') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @foreach ($contacts as $contact)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-envelope"></i>
                            <h3>{{ __('email us') }}:</h3>
                            <a href="/cdn-cgi/l/email-protection#20494e464f604152445549580e434f4d"><span
                                    class="__cf_email__"
                                    data-cfemail="91f8fff7fed1fdf8fffaf0bff2fefc">{{ $contact->email }}</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-phone-call"></i>
                            <h3>{{ __('call us') }}:</h3>
                            <a href="tel:+(123)1800-567-8990">Tel.{{ $contact->phone }}</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-location-plus"></i>
                            <h3>{{ __('location') }}</h3>
                            <a href="#">{{ $contact->address }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {!! $contact->map !!}
    </section>
    <section class="main-contact-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-wrap contact-pages mb-0">
                        <div class="contact-form">
                            <div class="section-title">
                                <h2>{{ __('Drop Us A Message For Any Query') }}</h2>
                            </div>
                            <form method="post" novalidate="true" action="{{ route('user.post_contact') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required=""
                                                data-error="Please enter your name" placeholder="{{ __('fullname') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" required=""
                                                data-error="Please enter your email" placeholder="{{ __('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" required=""
                                                data-error="Please enter your number" class="form-control"
                                                placeholder="{{ __('phone') }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" required=""
                                                data-error="Please enter your subject" placeholder="{{ __('subject') }}">
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" cols="30" rows="5" required=""
                                                data-error="Write your message" placeholder="{{ __('message') }}"></textarea>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-two disabled"
                                            style="pointer-events: all; cursor: pointer;">
                                            {{ __('Send Message') }}
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
