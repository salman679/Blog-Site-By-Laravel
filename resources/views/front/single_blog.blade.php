@extends('front.layouts.layouts') @section('content')
<!-- post section start -->
<section class="post">
    <div class="container">
        <div class="row singel">
            <!-- blog post -->
            <div class="col-lg-8">
                <div class="singel-blog">
                    <div class="blog-post">
                        <h2 class="title">{{ $blog->title }}</h2>
                        <div class="blog-info">
                            <div class="item-info me-3">
                                <div class="tag">
                                    <a class="ms-0" style="background-color: #f70d28; color: #fff;" href="{{ route('front.blog', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                                </div>
                                <div class="calender">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>{{ $blog->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="comment">
                                    <i class="fa-regular fa-comment"></i>
                                    <span>(03)</span>
                                </div>
                            </div>
                            <div class="tag">
                                <i class="fa-solid fa-user-pen"></i>
                                <a href="#">Salman Izhar</a>
                            </div>
                        </div>
                        <div class="image">
                            <img class="img-fluid w-100" src="{{ asset($blog->image_sm)}}" alt="{{$blog->image_alt ? $blog->image_alt : $blog->title}}" />
                        </div>
                        <div class="blog-description">
                            <p>{{$blog->description}}</p>
                        </div>
                        <div class="details">
                            {!! $blog->details !!}
                        </div>
                    </div>

                    <!-- author section -->
                    <div class="author">
                        <div class="author-content">
                            <div class="imge">
                                <img src="{{ asset('front/image/user-03.jpg')}}" class="w-100" alt="image" />
                            </div>
                            <div class="information d-flex flex-column justify-content-between">
                                <span class="name">Salman Izhar</span>
                                <p class="identity">
                                    Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiu smod tempor ut laboredolore magna aliqua. Ut enim ad minim doing veniam, quis nostrud exerci tation ullamco laboris nisi.
                                </p>
                                <div class="social-link">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- prev-next section -->
                    <div class="prev-next d-flex align-items-center justify-content-between">
                        @if ($prev_post)
                        <div class="prev">
                            <a href="#"><span>PREVIOUS POST</span></a>
                            <h4><a href="{{route('front.single_blog', $prev_post->slug)}}">{{$prev_post->title}}</a></h4>
                        </div>
                        @endif @if ($next_post)
                        <div class="next text-lg-end">
                            <a href="#"><span>NEXT POST</span></a>
                            <h4><a href="{{route('front.single_blog', $next_post->slug)}}">{{$next_post->title}}</a></h4>
                        </div>
                        @endif
                    </div>

                    <!-- also like section -->
                    <div class="also-like">
                        <div class="title">
                            <h4>YOU MAY ALSO LIKE</h4>
                        </div>
                        <div class="also-content d-flex">
                            @foreach ($related_blogs as $related_blog)
                            <div class="content">
                                <div class="image">
                                    <a href="{{route('front.single_blog', $related_blog->slug)}}">
                                        <img class="img-fluid w-100" src="{{ asset($related_blog->image_sm)}}" alt="{{$related_blog->image_alt ? $related_blog->image_alt : $related_blog->title}}" />
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="calender">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{$related_blog->created_at->format('d M Y')}}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-regular fa-comment"></i>
                                        <span>(03)</span>
                                    </div>
                                </div>
                                <div class="heading">
                                    <h5><a href="{{route('front.single_blog', $related_blog->slug)}}">{{$related_blog->title}}</a></h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- RECENT COMMENTS section -->
                    @if ($comments->count() > 0)
                    <div class="comment-area">
                        <div class="title">
                            <h4>RECENT COMMENTS</h4>
                        </div>
                        <ul class="content-comment ps-0">
                            @foreach ($comments as $comment)
                            <li class="user-comment d-flex flex-wrap">
                                <div class="image">
                                    <img class="w-100 img-fluid" style="border-radius: 50%" src="{{ Avatar::create($comment->email)->toGravatar() }}" alt="{{$comment->name}}" />
                                </div>
                                <div class="content">
                                    <div class="name d-flex">
                                        <h6 class="mb-0">{{$comment->name}}</h6>
                                        <span>{{$comment->created_at->format('F d, Y')}} at {{$comment->created_at->format('h:i A')}}</span>
                                    </div>
                                    <p class="mb-0">{{$comment->comment}}</p>
                                    <a data-id="{{$comment->id}}" href="#form-item" class="reply"><i class="fa-solid fa-reply-all"></i>Reply</a>
                                </div>
                                @foreach ($comment->replies as $reply)
                                <ul class="reply-area ps-0">
                                    <li class="reply-comment d-flex">
                                        <div class="image">
                                            <img class="w-100 img-fluid" style="border-radius: 50%" src="{{ Avatar::create($reply->email)->toGravatar()}}" alt="{{$reply->name}}" />
                                        </div>
                                        <div class="content">
                                            <div class="name">
                                                <h6>{{ $reply->name }}</h6>
                                                <span>{{$reply->created_at->format('F d, Y')}} at {{$reply->created_at->format('h:i A')}}</span>
                                            </div>
                                            <p class="mb-0">{{$reply->comment}}</p>
                                            <a data-id="{{$comment->id}}" href="#form-item" class="reply"><i class="fa-solid fa-reply-all"></i>Reply</a>
                                        </div>
                                    </li>  
                                </ul>
                                @endforeach
                            </li>
                                
                            @endforeach
                        </ul>
                    </div> 
                    @endif

                    <!-- comment area section -->
                    <div class="form-item" id="form-item">
                        <h3>RECENT COMMENTS</h3>
                        <div class="form-info">
                            <form method="POST" action="{{ route('front.comment') }}">
                                @csrf
                                <input type="hidden" name="blog_id" placeholder="Name" value="{{$blog->id}}"/>
                                <input type="hidden" name="parent_id" placeholder="Name" value="0"/>
                                
                                <input value="{{Session::has('name') ? Session::get('name') : old('name')}}" class="half form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Name" />
                                <input value="{{Session::has('email') ? Session::get('email') : old('email')}}" class="half form-control {{$errors->has('email') ? 'is-invalid' : ''}}" type="email" name="email" placeholder="Email" />
                                <textarea name="comment" class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" placeholder="Comment"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- side-ber -->
            <div class="col-lg-4">
                <aside class="side-bar">
                    @include('front.section.category') 
                    @include('front.section.popular_post') 
                    @include('front.section.subscribe') 
                    @include('front.section.most_visited') 
                    {{-- @include('front.section.popular_tag') --}} 
                    
                    @if ($tags->count() > 0)
                    <div class="side-bar-content">
                        <h3 class="side-bar-heading">Popular Tags</h3>
                        <div class="side-bar-popular-tags">
                            <ul class="d-flex ps-0">
                                @foreach ($tags as $popular_tag)
                                <li><a href="#">{{$popular_tag->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </aside>
            </div>

            <div class="alert-box">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Please check the form again.
                    <button type="button" class="btn-close"></button>
                </div>                    
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Welcome!</strong> {{Session::get('success')}}.
                        <button type="button" class="btn-close"></button>
                    </div>
                    {{-- <script>

                        let successTarget = '.comment-area'
                        scrollToComment(successTarget)
                    </script> --}}
                @endif
            </div>

        </div>
    </div>
</section>
<!-- post section end -->
@endsection

@section('custom_css')
    <style>
    .alert-box{
        position: fixed;
        width: 420px;
        top: 118px;
        right: 73px;
        z-index: 9999;
    }

    .reply{
    color: #444;
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    }

    .user-comment{
        margin-bottom: 25px;
    }

    .reply-area{
        margin-top: 20px !important;
    }
    </style>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function(){
            $('input, textarea').on('keyup', function (){
                $(this).removeClass('is-invalid')
            })

            let error = "{{ $errors }}";

            if(error !== '[]'){
                let comment_form = $('.form-info')
                scrollToComment(comment_form)
            }

            $('.reply').on('click', function (){
                let dataId = $(this).attr('data-id')
                $('[name="parent_id"]').val(dataId)
                console.log(dataId);
            })

            function scrollToComment(a){
                $("html", "body").animate({
                    scrollTop: $(a).offset().top
                },1000)
            }

            $('.btn-close').on('click', function (){
                $('.alert-box').fadeOut()
            })
        })
    </script>
@endsection
