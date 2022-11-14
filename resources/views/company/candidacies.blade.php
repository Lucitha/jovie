@extends('layout')
@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

                <div class="blog-widget">
                  @foreach ($candidacies as $candidacie)
                      <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post1.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <time datetime="2020-04-08">May 8, 2020</time>
                            <h4>
                                <a href="blog-details.html" onclick="detail()">{{$candidacie->username}} {{$candidacie->name}}</a>
                            </h4>                                
                        </div>
                    </article>
                  @endforeach
                </div>
   
            </div>
            <?php if($infos!=''){ ?>
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

                        <h3 class="post-title">azerty</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{asset('assets/img/blog/blog-details2.jpg')}}" class="details-inner-img" alt="blog details image">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/img/blog/blog-details3.jpg')}}" class="details-inner-img" alt="blog details image">
                            </div>
                        </div>

                    </div>
                </div>
            <?php }?>     
        </div>
    </div>
</section>
<script>

    function details() {
        
        $.ajax({
        type: "get",
        url: "url",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
    }
</script>
@endsection