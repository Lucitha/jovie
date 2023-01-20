@extends('layout')
@section('content')
    <section class="job-section jobs-grid-section pt-100 pb-70">:
        <div class="container">
            <div class="section-title text-center">
                <h2>Jobs You May Be Interested In</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
            </div>

            <div class="row">
                
                @foreach ($jobs as $job)
                    <div class="col-md-6">
                        <div class="job-card">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="thumb-img">
                                        <a href="job-details.html">
                                            <img src="{{asset('assets/img/company-logo/1.png')}}" alt="company logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="job-info">
                                        <h3>
                                            <a href="/details/{{$job->id}}">{{$job->jobs_name}}</a>
                                        </h3>
                                        <ul>
                                            <li>Via <a href="/company/{{$job->posted_by}}">{{$job->users_name}}</a></li>
                                            <li>
                                                <i class='bx bx-location-plus'></i> {{$job->jobs_location}}
                                            </li>
                                            <li>
                                                <i class='bx bx-filter-alt'></i> {{$job->categories_name}}
                                            </li>
                                            <li>
                                                <i class='bx bx-briefcase'></i> {{$job->jobs_salary}} €
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="job-save">
                                        <span>{{$job->types_name}}</span>
                                        <p>
                                            <i class='bx bx-stopwatch'></i> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>       
            <div  style="justify-content: center">
                {{$jobs->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>
@endsection