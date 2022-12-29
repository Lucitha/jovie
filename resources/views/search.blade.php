@extends('layout')
@section('content')

<section class="job-details ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($jobs as $job)
                    <div class="account-details">  
                        <article class="popular-post">
                            <div class="info">
                                <h4>
                                    <a href="/details/{{$job->id}}">{{$job->job_title}}</a>
                                </h4>                                
                                <ul>
                                    <i class='bx bx-location-plus'></i>
                                    {{$job->location}}
                                    <i class='bx bx-briefcase' ></i>
                                    {{$job->type_title}}
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach  
            </div>

            <div class="col-lg-4">
                
                <div class="job-sidebar">
                    <div>
                        <form >
                            <h3>Categories</h3>
                            <ul>
                                @foreach ($categories as $categorie)
                                <li>
                                    <a href="/job_categories/{{$categorie->id}}">{{$categorie->category_title}}</a>
                                </li>  
                                @endforeach
                            </ul>
                        </form>
                    </div>
                    <div>
                        <form>
                            <h3 style='border: none; border-top: 1px dotted black;'>Type</h3>
                            <ul>
                                @foreach ($types as $type)
                                    <li>
                                    <a href="/job_type/{{$type->id}}">{{$type->type_title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>  
                </div>  
            </div>
        </div>
    </div>
</section>
@endsection