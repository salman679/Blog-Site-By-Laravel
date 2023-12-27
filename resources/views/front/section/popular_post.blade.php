     <!-- popular post section -->
     <div class="side-bar-content">
        <h3 class="side-bar-heading">Popular Post</h3>
        <div class="side-bar-post">
            @foreach ($popular_posts as $popular_post)
            <div class="post-item d-flex align-items-center">
                <div class="image">
                    <a href="{{ route('front.single_blog', $popular_post->slug) }}"><img src="{{ asset($popular_post->image_sm)}}" alt="{{ $popular_post->image_alt ? $popular_post->image_alt : $popular_post->title }}" class="img-fluid w-100"></a>
                </div>
                <div class="content d-flex flex-column justify-content-center">
                    <span class="tag"><a href="{{ route('front.blog', $popular_post->category->slug) }}">{{$popular_post->category->name}}</a></span>
                    <h4 class="content-heading mb-0"><a href="{{ route('front.single_blog', $popular_post->slug) }}">{{ $popular_post->title }}</a></h4>
                    <div class="calender">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>{{ $popular_post->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>