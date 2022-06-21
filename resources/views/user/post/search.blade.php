@extends('user.user_main')
@section('content')
    <!-- Start Inspiration Area -->
    <section class="main-inspiration-area five pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Recent News</h2>
            </div>
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-main-blog-item mb-30">
                            <img src="{{ asset($post->image) }}" alt="Image">
                            <span class="blog-link">
                                @foreach ($post->categories as $cat)
                                    @if ($loop->first)
                                        {{ $cat->name }}
                                    @endif
                                @endforeach
                            </span>

                            <div class="main-blog-content">
                                <a href="post-style-one.html">
                                    <a href="{{ route('user.post.show', $post->slug) }}">
                                        <h3>{{ $post->title }}</h3>
                                    </a>
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
                    </div>
                @empty
                    bele netice tapilmadi
                @endforelse

            </div>
        </div>
    </section>
    <!-- End Inspiration Area -->

@endsection
