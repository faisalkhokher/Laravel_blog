@extends('layouts.frontend')

@section('content')


{{-- Header --}}
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
          <h1 class="stunning-header-title">{{ $posts -> title }}</h1>
    </div>
</div>


<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $posts -> featured }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $user -> name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                {{ $posts -> created_at -> toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                              {{ $posts -> category -> name }}
                            </span>

                        </div>

                        <div class="post__content-info">

                          {!! $posts -> content !!}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                  @foreach ($posts -> tags as $tag)
                                  <a href="#" class="w-tags-item">{{ $tag -> tag }}</a>
                                  @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
{{-- 
                    <div class="socials">

                        <a href="#" class="social__item">
                            <img src="{{ asset ("app/svg/circle-facebook.svg") }}" alt="facebook">
                        </a>

                        <a href="#" class="social__item">
                            <img src="{{ asset ("app/svg/twitter.svg") }}" alt="twitter">
                        </a>

                        <a href="#" class="social__item">
                            <img src="{{ asset ("app/svg/google.svg") }}" alt="google">
                        </a>

                        <a href="#" class="social__item">
                            <img src="{{ asset ("app/svg/youtube.svg") }}" alt="youtube">
                        </a>

                    </div> --}}

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset ($posts -> user -> profile -> avatar) }}" alt="Author"  height="50px" width="90px">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $posts -> user ->  name }}</h5>
                       
                        </div>
                        <p class="text">
                            {{ $posts -> user -> profile -> about }}
                        </p>
                        <div class="socials">

                            <a href="{{ $posts -> user -> profile -> facebook }}" class="social__item">
                                <img src="{{ asset ('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                           
                            <a href="{{ $posts -> user -> profile -> youtube }}" class="social__item">
                                <img src="{{asset ("app/svg/youtube.svg") }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

               {{-- Pre --}}
            @if ($pre)
            <a href="{{ route('post.single' , ['slug' => $pre -> slug]) }}" class="btn-next-wrap">
                <div class="btn-content">
                    <div class="btn-content-title">Next Post</div>
                    <p class="btn-content-subtitle">{{ $pre -> title }}</p>
                </div>
                <svg class="btn-next">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </a>    
            @endif

     {{-- Next --}}
            @if ($next)
            <a href="{{ route ('post.single' , ['slug' => $next -> slug]) }}" class="btn-prev-wrap">
             <svg class="btn-prev">
                 <use xlink:href="#arrow-left"></use>
             </svg>
             <div class="btn-content">
                 <div class="btn-content-title">Previous Post</div>
                 <p class="btn-content-subtitle">{{ $next -> title }}</p>
             </div>
         </a>
                
            @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div>

               @include('includes.disqus')


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach ($tags as $tag)
                            <a href="" class="w-tags-item">{{ $tag -> tag }}</a>
                            @endforeach
                       
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@endsection