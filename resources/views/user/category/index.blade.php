@extends('user.user_main')
@section('content')
    <!-- Start Inspiration Area -->
    <section class="main-inspiration-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Recent News</h2>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-main-blog-item mb-30">
                            <a href="{{ route('user.category.show', $category->slug) }}">
                                <img src="{{ asset($category->image) }}"  alt="Image">
                            </a>
                            <span class="blog-link">
                                <a href="{{ route('user.category.show', $category->slug) }}">
                                    {{ $category->name }}
                            </span>
                            <div class="main-blog-content">
                                <a href="{{ route('user.category.show', $category->slug) }}"> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Inspiration Area -->
@endsection
