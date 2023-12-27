@extends('front.layouts.layouts')

@section('content')
<!-- banner start -->
<section class="banner">
    <div class="slick-slider">
        @foreach ($slider as $sliders)
        <div class="slider-item" style="background-image: url({{ asset($sliders->image) }});">
            <div class="container">
                <h1>{{ $sliders->title }}</h1>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- banner end -->

<!-- post section start -->
<section style="padding-top: 75px" class="post">
    <div class="container">
        <div class="row">

            <!-- blog post -->
            <div class="col-lg-8">
                <div class="post-blog">
                    <div class="row">
                        @foreach ($blogs as $blog)
                        <div class="col-lg-6 col-md-6">
                            <div class="post-item">
                                <a href="{{ route('front.single_blog', $blog->slug) }}"><img class="img-fluid w-100" src="{{ asset($blog->image_sm)}}" alt="{{$blog->image_alt ? $blog->image_alt : $blog->title}}"></a>
                                <h6><a href="{{ route('front.single_blog', $blog->slug) }}">{{$blog->title}}</a>
                                </h6>
                                <div class="item-info">
                                    <div class="tag">
                                        <a href="{{ route('front.blog', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                                    </div>
                                    <div class="calender">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{ $blog->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-regular fa-comment"></i>
                                        <span>(03)</span>
                                    </div>
                                </div>
                                <div class="description">
                                    <p>{{ $blog->description }}</p>
                                    <a href="{{ route('front.single_blog', $blog->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{ $blogs->links() }}
            </div>

            <!-- side-ber -->
            <div class="col-lg-4">
                <aside class="side-bar">

                    @include('front.section.category')

                    @include('front.section.popular_post')

                    @include('front.section.subscribe')

                    @include('front.section.most_visited')

                    @include('front.section.popular_tag')
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- post section end -->
@endsection


