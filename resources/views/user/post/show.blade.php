@extends('user.user_main')
@section('content')
    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li><span>{{ __('Posted On') }}:</span>
                                        <a href="#">{{ $post->created_at->diffForHumans() }}</a>
                                    </li>
                                    <li><span>{{ __('Posted by') }}:</span> <a
                                            href="#">{{ $post->user->fullname }}</a></li>
                                    <li><span>{{ __('Views') }}:</span> <a href="#">{{ $post->views }}</a></li>
                                    <form>
                                        <input id="post_like" type="submit" name="like"
                                            value="{{ $like_exists == 1 ? 'Unlike' : 'Like' }}" class="btn btn-success">
                                        <span class="badge bg-primary" id="like_count">{{ $like_count }}</span>
                                    </form>
                                </ul>
                            </div>
                            <h3>{{ $post->title }}</h3>

                            <div class="article-image">
                                <img src="{{ asset($post->image) }}" alt="image">
                            </div>

                            {!! $post->description !!}


                        </div>




                        <div class="comments-area">
                            <h3 class="comments-title">{{ __('comments') }}:{{ $post->comments->count() }}</h3>

                            <ol class="comment-list">
                                @foreach ($post->comments as $comment)
                                    <li class="comment">
                                        <div class="comment-body border-none">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{ asset('/frontend/assets/img/blog-details/comment-img-3.jpg') }}"
                                                        class="avatar" alt="image">
                                                    <b class="fn">{{ $comment->fullname }}</b>
                                                    <span class="says"></span>
                                                </div>

                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                    </a>
                                                </div>
                                            </footer>

                                            <div class="comment-content">
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                <li id="append_comment">

                                </li>
                            </ol>

                            <div class="comment-respond">
                                <h3 class="comment-reply-title">{{ __('Leave a reply') }}</h3>

                                <form class="comment-form">
                                    @csrf
                                    <p class="comment-form-author">
                                        <label>{{ __('fullname') }} <span class="required">*</span></label>
                                        <input type="text" id="fullname" name="fullname" required="required">
                                        @error('fullname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="comment-form-comment">
                                        <label>{{ __('content') }}</label>
                                        <textarea name="content" id="content" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" id="post_comment" name="submit" class="submit"
                                            value="{{ __('post a comment ') }}">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget-peru-posts-thumb">
                            <h3 class="widget-title">{{ __('popular news') }}</h3>
                            <div class="post-wrap">
                                @foreach ($popular_posts as $popular_post)
                                    <article class="item">
                                        <a href="post-style-one.html" class="thumb">
                                            <img src="{{ asset($popular_post->image) }}" alt="Image">
                                        </a>
                                        <div class="info">
                                            <time
                                                datetime="2020-06-30">{{ $popular_post->created_at->diffForHumans() }}</time>
                                            <h4 class="title usmall">
                                                <a href="{{ route('user.post.show', $popular_post->slug) }}">
                                                    {{ $popular_post->title }}
                                                </a>
                                            </h4>
                                        </div>

                                        <div class="clear"></div>
                                    </article>
                                @endforeach

                            </div>
                        </section>

                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">{{ __('tags') }}</h3>
                            <div class="post-wrap">
                                <div class="tagcloud">
                                    @foreach ($post->tags as $tag)
                                        <a href="#">{{ $tag->name }}</a>
                                    @endforeach


                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- End Blog Details Area -->
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#post_comment").click(function(event) {
            event.preventDefault();
            let fullname = $("#fullname").val()
            let content = $("#content").val()
            let _token = $('meta[name="csrf-token"]').attr('content')


            $.ajax({
                url: '{{ route('user.comment.store', $post) }}',
                type: 'get',
                data: {
                    fullname: fullname,
                    content: content,
                    _token: _token
                },
                success: function(res) {
                    $('#append_comment').append(res);
                    $("#fullname").val("")
                },
                error: function(res) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.responseJSON.message,
                    })
                }

            })
        })
    </script>

    <script>
        $("#post_like").click(function(event) {
            event.preventDefault();
            let count = {{ $like_count }};
           
            $.ajax({
                url: '{{ route('user.post.like', $post->id) }}',
                type: 'get',
                success: function(res) {
                    let test = count;
                    if (res[0] !== 'error') {
                        if (res[0] == 'success_like') {
                            $('#post_like').val('Unlike')
                            count = test + 1;
                            $('#like_count').html(count)
                        } else {
                            $('#post_like').val('like')
                            count = test - 1;
                            $('#like_count').html(count)
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res[1],
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res[1],
                    })

                    }

                },
               
                    
            })
        })
    </script>
@endsection
