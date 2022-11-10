@extends('layout')
@section('content')
<section class="job-details ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-details-text">
                            <div class="job-card">
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <div class="job-info">
                                            <h3>{{$detail->job_title}}</h3>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    {{$detail->location}}
                                                </li>
                                                <li>
                                                    <i class='bx bx-filter-alt' ></i>
                                                    {{$detail->category_title}}
                                                </li>
                                                <li>
                                                    <i class='bx bx-briefcase' ></i>
                                                    {{$detail->type_title}}
                                                </li>
                                                <li>
                                                    <i class='bx bx-paper-plane' ></i>
                                                    {{-- {{$detail->}} --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-text">
                                <h3>Description</h3>
                                <p>{{$detail->job_description}}</p>

                            </div>
                            
                            <div class="details-text">
                                <h3>Requirements</h3>
                               <p>{{$detail->job_description}}</p>
                            </div>

                            <div class="theme-btn">
                                <a href="#here" class="default-btn">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="job-sidebar">
                    <h3>Posted By</h3>
                    <div class="posted-by">
                        <img src="{{asset('assets/img/client-1.png')}}" alt="client image">
                        <h4>{{$detail->name}}</h4>
                        <span>CEO of Tourt Design LTD</span>
                    </div>
                </div>

                <div class="job-sidebar">
                    <div class="details-text">
                        <h3>Job Details</h3>
                        <div class="row">
                           <table class="table m-3">
                                <tbody>
                                    <tr>
                                        <td><span>Job Type</span></td>
                                        <td>{{$detail->type_title}}</td>
                                    </tr>
                                    <tr>
                                        <td><span>Salary range</span></td>
                                        <td> {{$detail->salary_range}} €</td>
                                    </tr>
                                    <tr>
                                        <td><span>Job Catategory</span></td>
                                        <td>{{$detail->category_title}}</td>
                                    </tr>
                                    <tr>
                                        <td><span>Validity period</span></td>
                                        <td>{{$detail->start_at}} at {{$detail->end_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="job-sidebar">
                    <div class="details-text">
                        <h3>About company</h3>
                        <div class="row"> 
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><span>Company Name</span></td>
                                            <td>{{$detail->company_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Location</span></td>
                                            <td>{{$detail->location}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Phone Number</span></td>
                                            <td>{{$detail->job_contact}}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Email</span></td>
                                            <td>{{$detail->company_email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style="border-block-start-color: blue " id="here">
                <div class="job-sidebar">
                    <div class="details-text">
                        <div class="row">
                            <form class="col-lg-6 col-md-8 offset-md-2 offset-lg-3" enctype="multipart/form-data" method="Post" action="/apply/{{$detail->id}}" > 
                                @csrf
                                <div class="form-group col-md-8">
                                    <label for="">Your contact</label>
                                    <input name="phone" id="phone" class="form-control" type="tel" placeholder="000000000">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Your Resum</label>
                                    <input name="cv" id="cv" class="form-control" type="file">
                                </div>
                                <div class="account-btn">
                                    <button class="nav-link" type="submit" style="color: blueviolet">Save</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection