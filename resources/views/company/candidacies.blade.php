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
                            <time>{{$apply_date}}</time>
                            <h4>
                                <a onclick="details({{$candidacie->id}})">{{$candidacie->username}} {{$candidacie->name}}</a>
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
                           <iframe></iframe>
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