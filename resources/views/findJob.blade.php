@extends('layout')
@section('content')
<div class="find-section ptb-100">
            <div class="container">
                <form class="find-form mt-0">
                    <div class="row">
                        @csrf
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Job Title or Keyword">
                                <i class="bx bx-search-alt"></i>
                            </div>
                        </div>
    
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                <i class="bx bx-location-plus"></i>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <select class="category" id="category" name="category">
                                <option data-display="Category">Category</option>
                                <option value="1">Web Development</option>
                                <option value="2">Graphics Design</option>
                                <option value="4">Data Entry</option>
                                <option value="5">Visual Editor</option>
                                <option value="6">Office Assistant</option>
                            </select>
                        </div>
    
                        <div class="col-lg-3">
                            <button type="submit" class="find-btn">
                                Find A Job
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                                        <img src="{{asset('assets/img/company-logo/1.png')}}" alt="company logo">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="job-info">
                                    <h3>
                                        <a href="/details/{{$job->id}}">{{$job->job_title}}</a>
                                    </h3>
                                    <ul>
                                        <li>Via <a href="/company/{{$job->posted_by}}">{{$job->name}}</a></li>
                                        <li>
                                            <i class='bx bx-location-plus'></i> {{$job->location}}
                                        </li>
                                        <li>
                                            <i class='bx bx-filter-alt'></i> {{$job->category_title}}
                                        </li>
                                        <li>
                                            <i class='bx bx-briefcase'></i> {{$job->salary_range}} €
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach   
            </div>
        </div>
    </section>
@endsection