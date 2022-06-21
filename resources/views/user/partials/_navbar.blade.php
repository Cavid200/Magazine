<div class="navbar-area navbar-area-two five">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="/" class="logo">
            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('frontend/assets/img/black-logo.png') }}" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">{{ __('home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.category.index') }}"
                                class="nav-link">{{ __('categories') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.contact') }}" class="nav-link">{{ __('contact') }}</a>
                        </li>
                    </ul>

                    <!-- Start Other Option -->
                    <div class="others-option">
                        <div class="follow">
                            <span>{{ __('languages') }}</span>
                            <i class="bx bx-chevron-down"></i>

                            <ul>
                                @foreach ($languages as $language)
                                    <li>
                                        <a href="{{ route('locale', $language->code) }}">
                                            {{ $language->code }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @auth
                            {{ auth()->user()->fullname }} <a href="{{ route('user.sign_out') }}">Sign out</a>
                        @endauth
                        @guest
                            <a href="{{ route('user.register') }}">Sign up</a> / <a
                                href="{{ route('user.login') }}">Sign in</a>
                        @endguest



                        <div class="option-item">
                            <i class="search-btn bx bx-search"></i>
                            <i class="close-btn bx bx-x"></i>

                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="Search" type="text">

                                        <button class="search-button" type="submit"><i
                                                class="bx bx-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Other Option -->
                </div>
            </div>
        </nav>
    </div>
</div>
