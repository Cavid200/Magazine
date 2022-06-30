
    <!-- Start Footer Area -->
    <footer class="footer-area-four ptb-100">
        <div class="container">
            <div class="footer-wrap">
                <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Image">

                <ul class="social">
                    @foreach ($socials as $social )
                    <li>
                        <a href="#" target="_blank">
                            <i class="{{ $social->icon }}"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <ul class="important-links">
                    <li>
                        <a href="/" class="nav-link">{{ __('home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('user.category.index') }}"
                        class="nav-link">{{ __('categories') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('user.contact') }}" class="nav-link">{{ __('contact') }}</a>
                    </li>
                    
                </ul>
                <p>{{ $settings->footer }}</p>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->