<li class="comment">
    <div class="comment-body border-none">
        <footer class="comment-meta">
            <div class="comment-author vcard">
                <img src="{{asset('frontend/assets/img/blog-details/comment-img-3.jpg')}}" class="avatar"
                    alt="image">
                <b class="fn">{{ $comment->fullname }} </b>
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