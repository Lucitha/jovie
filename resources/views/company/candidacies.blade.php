@extends('layout')
@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

                <div class="blog-widget">
                  

                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post1.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <time datetime="2020-04-08">May 8, 2020</time>
                            <h4>
                                <a href="blog-details.html">Looking for Highly Motivated Product to Build</a>
                            </h4>                                
                        </div>
                    </article>

                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post2.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <time datetime="2020-04-08">May 5, 2020</time>
                            <h4>
                                <a href="blog-details.html">
                                    How to Indroduce in Yourself in Job Interview?
                                </a>
                            </h4>                                
                        </div>
                    </article>

                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post3.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <time datetime="2020-04-08">April 20, 2020</time>
                            <h4>
                                <a href="blog-details.html">
                                    Economy Growth is Being Increased by IT Sectors
                                </a>
                            </h4>                                
                        </div>
                    </article>

                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post4.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <time datetime="2020-04-08">April 28, 2020</time>
                            <h4>
                                <a href="blog-details.html">
                                    10 Things You Should Know Before Apply
                                </a>
                            </h4>                                
                        </div>
                    </article>
                </div>
   
            </div>

            <div class="col-lg-8">
                <div class="blog-dedails-text">
                    <div class="blog-details-img">
                        <img src="{{asset('assets/img/blog/blog-details.jpg')}}" alt="blog details image">
                    </div>

                    <div class="blog-meta">
                        <ul>
                            <li>
                                <i class='bx bxs-user'></i>
                                Admin
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i>
                                7 Feb, 2020
                            </li>
                        </ul>
                    </div>

                    <h3 class="post-title">Tips for Making Your Resume Stand Out</h3>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{asset('assets/img/blog/blog-details2.jpg')}}" class="details-inner-img" alt="blog details image">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{asset('assets/img/blog/blog-details3.jpg')}}" class="details-inner-img" alt="blog details image">
                        </div>
                    </div>

                   <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

                   <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>

                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>

                   <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
         
                </div>
            </div>
        </div>
    </div>
</section>
@endsection