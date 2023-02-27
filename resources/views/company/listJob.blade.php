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
                            <div class="col-lg-8">
                                <div class="job-info">
                                    <h3>
                                        <a href="/{{$job->jID}}/candidacies">{{$job->job_title}}</a>
                                    </h3>
                                    <ul>
                                        <li>Via <a href="#">{{$job->posted}}</a></li>
                                        <li>
                                            <i class='bx bx-location-plus'></i> {{$job->location}}
                                        </li>
                                        <li>
                                            <i class='bx bx-filter-alt'></i>{{$job->job_contact}}
                                        </li>
                                        <li>
                                            <i class='bx bx-briefcase'></i> {{$job->salary_range}} €
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="job-save" style="position:absolute">
                                    <a  href="/editPost/{{$job->jID}}"><span style="background-color: black; color:white; ">Edit</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{$jobs->links("pagination::bootstrap-4")}}
        </div>
    </div>
</section>
<!-- Jobs Section End -->
@endsection