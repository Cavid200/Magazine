<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ asset('backend') }}/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('backend') }}/assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ asset('backend') }}/assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                src="{{ asset('backend') }}/assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="home"></i><span class="lan-3">Dashboard
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="index.html">Default</a></li>
                            <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.role.index') }}">
                            <i data-feather="user-plus"> </i>
                            <span>{{ __('roles') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.user.index') }}">
                            <i data-feather="users"> </i>
                            <span>{{ __('users') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.banner.index') }}">
                            <i data-feather="bookmark"> </i>
                            <span>{{ __('banners') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav"
                            href="{{ route('admin.important_link.index') }}">
                            <i data-feather="link"> </i>
                            <span>{{ __('important links') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.category.index') }}">
                            <i data-feather="star"> </i>
                            <span>{{ __('categories') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav"
                            href="{{ route('admin.social_media.index') }}">
                            <i data-feather="facebook"> </i>
                            <span>{{ __('social media') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.contact.edit',1) }}">
                            <i data-feather="phone"> </i>
                            <span>{{ __('contacts') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.main_image.edit', 1) }}">
                            <i data-feather="image"> </i>
                            <span>{{ __('main image') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.setting.edit',1) }}">
                            <i data-feather="settings"> </i>
                            <span>{{ __('settings') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.tag.index') }}">
                            <i data-feather="tag"> </i>
                            <span>{{ __('tags') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.post.index') }}">
                            <i data-feather="sliders"> </i>
                            <span>{{ __('posts') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.contact_us.index') }}">
                            <i data-feather="mail"> </i>
                            <span>{{ __('contact us') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.comment.index') }}">
                            <i data-feather="mail"> </i>
                            <span>{{ __('comments') }}</span>
                        </a>
                    </li>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
