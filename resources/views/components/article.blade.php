<article class="border-2 p-4 rounded-3 shadow mb-5">
    @if(!$simple)
        <figure class="overlay overlay-1 hover-scale rounded mb-6"><a href="#"> {{$article['cover_photo']}}</a>
            <figcaption>
                <h5 class="from-top mb-0">Read More</h5>
            </figcaption>
        </figure>
    @endif
    <div class="post-header">
        <h2 class="post-title h3 mb-3"><a class="link-dark" href="/post/{{$article['id']}}">{{ $article['title'] }}</a></h2>
    </div>
    @if($simple && $subtext)
        <div class="post-content">
            @php
                $notags = strip_tags($article['html_content']);
                $subtext = substr($notags, 0, 400);
            @endphp
            <p>{{ $subtext }}...</p>
        </div>
    @endif
    <!-- /.post-header -->
    <div class="post-footer">
        <ul class="post-meta">
            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($article['created_at'])->format('d/m/Y') }}</span></li>
{{--            <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i>Coding</a></li>--}}
        </ul>
        <!-- /.post-meta -->
    </div>
    <!-- /.post-footer -->
</article>
