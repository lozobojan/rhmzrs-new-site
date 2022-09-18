<article>
    @if(!$simple)
        <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#"> <img src="./assets/img/photos/b4.jpg"
                                                                                     alt=""/></a>
            <figcaption>
                <h5 class="from-top mb-0">Read More</h5>
            </figcaption>
        </figure>
    @endif
    <div class="post-header">
        <h2 class="post-title h3 mb-3"><a class="link-dark" href="./blog-post.html">{{ $article['title'] }}</a></h2>
    </div>
    @if($simple)
        <div class="post-content">
            <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis tempus vestibulum cras imperdiet
                nun eu dolor. Aenean lacinia bibendum nulla sed.</p>
        </div>
    @endif
    <!-- /.post-header -->
    <div class="post-footer">
        <ul class="post-meta">
            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>14 Apr 2022</span></li>
{{--            <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i>Coding</a></li>--}}
        </ul>
        <!-- /.post-meta -->
    </div>
    <!-- /.post-footer -->
</article>
