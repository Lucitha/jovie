@extends('layout')
@section('content')
<section class="job-section jobs-grid-section pt-100 pb-70">
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
                                        <img src="assets/img/company-logo/2.png" alt="company logo">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="job-info">
                                    <h3>
                                        <a href="job-details.html">Budget Analysts</a>
                                    </h3>
                                    <ul>
                                        <li>Via <a href="#">Techno Inc.</a></li>
                                        <li>
                                            <i class='bx bx-location-plus'></i> Street 40/A, London
                                        </li>
                                        <li>
                                            <i class='bx bx-filter-alt'></i> Data Entry
                                        </li>
                                        <li>
                                            <i class='bx bx-briefcase'></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="job-save">
                                    <a href="#">
                                        <i class='bx bx-heart'></i>
                                    </a>
                                    <p>
                                        <i class='bx bx-stopwatch'></i> 3 Hr Ago
                                    </p>
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