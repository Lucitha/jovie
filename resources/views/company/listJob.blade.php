@extends('layout')
@section('content')
<section class="job-section jobs-grid-section pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>All job you posted</h2>
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
                                        <img src="{{asset('assets/img/company-logo/2.png')}}" alt="company logo">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="job-info">
                                    <h3>
                                        <a href="/{{$job->jID}}/candidacies">{{$job->job_title}}</a>
                                    </h3>
                                    <ul>
                                        <li>Via <a href="#">{{$job->job_title}}</a></li>
                                        <li>
                                            <i class='bx bx-location-plus'></i> {{$job->job_title}}
                                        </li>
                                        <li>
                                            <i class='bx bx-filter-alt'></i>{{$job->job_title}}
                                        </li>
                                        <li>
                                            <i class='bx bx-briefcase'></i> {{$job->job_title}}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="job-save">
                                    <span>{{$job->type_title}}</span>
                                    <p>
                                        <i class='bx bx-stopwatch'></i>
                                    </p>
                                    <a href="/editPost/{{$job->jID}}">Edit</a>
                                    <a href="/postDelete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Jobs Section End -->
@endsection