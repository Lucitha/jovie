@extends('layout')
@section('content')

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="account-details">  
                    @foreach ($candidacies as $candidacie)
                    <article class="popular-post">
                        <div class="info">
                            <h4>
                                <a href="/details/{{$candidacie->jID}}">{{$candidacie->job_title}}</a>
                            </h4>                                
                            <ul>
                                <i class='bx bx-location-plus'></i>
                                {{$candidacie->location}}
                                <i class='bx bx-briefcase' ></i>
                                {{$candidacie->type_title}}
                            </ul>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection