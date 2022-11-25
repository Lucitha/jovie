@extends('layout')
@section('content')

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            @foreach ($candidacies as $candidacie)
                <div class="account-details">  
                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post1.jpg')}}" alt="blog image">
                        </a>

                        <div class="info">
                            <label for="">{{$candidacie->job_title}}</label>
                            <h4>
                                <a href="/details/{{$candidacie->jID}}">{{$candidacie->job_title}}</a>
                            </h4>                                
                        </div>
                    </article>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
    
@endsection