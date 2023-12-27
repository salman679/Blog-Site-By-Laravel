@extends('front.layouts.layouts')

@section('content')
<!-- post section start -->
<section class="post">
    <div class="container">
        <div class="row blog_post">
            <h1 style="margin-top: -45px; margin-bottom: 39px" class="text-center text-capitalize py-3 bg-light">{{ $category->name }}</h1>

            <!-- blog post -->
            <div class="col-lg-8 ps-0">
                <div class="blog-items">
                    @foreach ($blogs as $blog)
                        <div class="blog-item">
                            <div class="image">
                                <a href="{{ route('front.single_blog', $blog->slug) }}"><img src="{{ asset($blog->image)}}" alt="image" class="img-fluid w-100"></a>
                            </div>
                            <div class="post-info">
                                <div class="tag"><a href="{{ route('front.blog', $category->slug) }}">{{ $category->name }}</a></div>
                                <div class="item-info">
                                    <div class="calender">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{ $blog->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-regular fa-comment"></i>
                                        <span>(03)</span>
                                    </div>
                                </div>
                            </div>
                            <h2 class="heading"><a href="{{ route('front.single_blog', $blog->slug) }}">{{ $blog->title }}</a></h2>
                            <p class="description">{{ $blog->description }}</p>
                            <div class="read-more">
                                <a href="{{ route('front.single_blog', $blog->slug) }}">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$blogs->links()}}
            </div>

            <!-- side-ber -->
            <div class="col-lg-4 pe-0">
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