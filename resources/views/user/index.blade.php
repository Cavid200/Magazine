@extends('user.user_main')
@section('content')
    <!-- Start Banner Area Five -->

    <section class="banner-area banner-area-five" style="background-image: url({{ asset($main_image->image) }})">
        <div class="container">
            <div class="banner-text">
                <h1>{{ $main_image->title }}</h1>
                <ul>
                    <li>
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="bx bxl-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Banner Area Five-->
    <!-- Start Main Blog Area -->
    <section class="main-blog-area-two five pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($posts->skip(3)->take(1) as $post)
                        <div class="single-main-blog-item-two bg-1 mb-30" style="background-image: url({{ $post->image }})">
                            <span class="blog-link">
                                @foreach ($post->categories as $category)
                                    {{ $category->name }} {{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </span>
                            <div class="main-blog-content">
                                <a href="{{ route('user.post.show',$post->slug) }}">
                                    <h3>{{ $post->title }}</h3>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="admin">
                                            <i class="bx bx-user"></i>
                                            {{ $post->user->fullname }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="bx bx-calendar"></i> {{ $post->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($posts->skip(4)->take(4) as $post)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-main-blog-item-two middle mb-30">
                                    <img src="{{ asset($post->image) }}" alt="Image">
                                    <span class="blog-link">
                                        {{ $post->categories[0]->name }}
                                    </span>

                                    <div class="main-blog-content">
                                        <a href="{{ route('user.post.show',$post->slug) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>

                                        <ul>
                                            <li>
                                                <a href="#" class="admin">
                                                    <i class="bx bx-user"></i>
                                                    {{ $post->user->fullname }}
                                                </a>
                                            </li>
                                            <li>
                                                <i class="bx bx-calendar"></i>{{ $post->created_at->diffForHumans() }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Blog Area -->

    <!-- Start Latest Project Area -->
    <section class="latest-project-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Popular News</h2>
            </div>
            <div class="row">
                @foreach ($popular_posts as $popular_post )
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured">
                        <a href="post-style-one.html">
                            <img src="{{ asset($popular_post->image) }}" alt="Image">
                        </a>

                        <div class="featured-content">
                            <ul>
                                <li>
                                    <a href="#" class="admin">
                                        <i class="bx bx-user"></i>
                                        {{ $popular_post->user->fullname }}
                                    </a>
                                </li>
                                <li>
                                    <i class="bx bx-calendar"></i> {{ $popular_post->created_at->diffForHumans() }}
                                </li>
                            </ul>

                            <a href="{{ route('user.post.show',$popular_post->slug) }}">
                                <h3>{{ $popular_post->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </section>
    <!-- End Latest Project Area -->

    <!-- Start Inspiration Area -->
    <section class="main-inspiration-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Recent News</h2>
            </div>
            <div class="row">
                @foreach ( $recent_posts as $recent_post )
                    <div class="col-lg-4 col-md-6">
                    <div class="single-main-blog-item mb-30">
                        <img src="{{ asset($recent_post->image) }}" alt="Image">
                        <span class="blog-link">
                            {{ $recent_post->categories[0]->name }}
                        </span>

                        <div class="main-blog-content">
                            <a href="{{ route('user.post.show',$recent_post->slug) }}">
                                <h3>{{ $recent_post->title }}</h3>
                            </a>

                            <ul>
                                <li>
                                    <a href="#" class="admin">
                                        <i class="bx bx-user"></i>
                                        {{ $recent_post->user->fullname }}
                                    </a>
                                </li>
                                <li>
                                    <i class="bx bx-calendar"></i>{{ $recent_post->created_at->diffForHumans() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                @endforeach
               
            </div>
        </div>
    </section>
    <!-- End Inspiration Area -->

  

    <!-- Start Economics News Area -->
    <section class="economics-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Editor Choice</h2>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @foreach ($editor_posts->take(1) as $editor_post )
                    <div class="single-featured">
                        <a href="post-style-one.html">
                            <img src="{{ asset($editor_post->image) }}" alt="Image">
                        </a>

                        <div class="featured-content">
                            <a href="{{ route('user.post.show',$editor_post->slug) }}">
                                <h3>{{ $editor_post->title }}</h3>
                            </a>

                            <p>{{ $editor_post->short_description }}</p>

                            <ul class="mb-0">
                                <li>
                                    <a href="#" class="admin">
                                        <i class="bx bx-user"></i>
                                        {{ $editor_post->user->fullname }}
                                    </a>
                                </li>
                                <li>
                                    <i class="bx bx-calendar"></i> {{ $editor_post->created_at->diffForHumans() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                   
                </div>

                <div class="col-lg-4">
                    <div class="right-blog-article-wrap-three">
                        @foreach ( $editor_posts->skip(1)->take(3) as $editor_post)
                        <div class="right-blog-editor media align-items-center">
                            <a href="{{ route('user.post.show',$editor_post->slug) }}">
                                <img src="{{ asset($editor_post->image) }}" alt="Image">
                            </a>

                            <div class="right-blog-content">
                                <a href="{{ route('user.post.show',$editor_post->slug) }}">
                                    <h3>{{$editor_post->title }}</h3>
                                </a>

                                <span>
                                    <i class="bx bx-calendar"></i>
                                    {{ $editor_post->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div> 
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Economics News Area -->

    <!-- Start Latest Article Area -->
    <section class="latest-article-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>{{  $random_category->name }}</h2>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @foreach ( $random_posts as $random_post )
                    <div class="single-featured article">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <a href="post-style-one.html">
                                    <img src="{{ asset($random_post->image) }}"
                                        alt="Image">
                                </a>
                            </div>

                            <div class="col-lg-7 col-md-6">
                                <div class="featured-content">
                                    <span>
                                        {{  $random_category->name }}
                                    </span>
                                    <a href="{{ route('user.post.show',$random_post->slug) }}">
                                        <h3>{{ $random_post->title }}</h3>
                                    </a>

                                    <p>{{ $random_post->short_description }}</p>

                                    <ul>
                                        <li>
                                            <a href="#" class="admin">
                                                <i class="bx bx-user"></i>
                                                {{ $random_post->user->fullname }}
                                            </a>
                                        </li>
                                        <li>
                                            <i class="bx bx-calendar"></i> {{ $random_post->created_at->diffForHumans() }}
                                        </li>
                                    </ul>

                                    <a href="{{ route('user.post.show',$random_post->slug) }}" class="read-more">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>

                <div class="col-lg-4">
                    <div class="adds-area">
                        @foreach ( $banners as $banner )
                        <div class="adds-item mb-30">
                            <a href="#">
                                <img src="{{ asset($banner->image) }}" alt="Image">
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest Article Area -->
@endsection
