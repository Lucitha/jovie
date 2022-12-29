@extends('layout')
@section('content')
<section class="job-details ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
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

                            @php
                                $date=strtotime(date('Y-m-d H:i:s'));
                                $start=strtotime($detail->start_at);
                                $end=strtotime($detail->end_at);
                                if($date >= $start && $date <= $end){
                                    echo'
                                    <div class="theme-btn">
                                        <a href="#here" class="default-btn">
                                            Apply Now
                                        </a>
                                    </div>';
                                }
                            @endphp 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
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
                           <table class="table m-3">
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
       
            <div class="col-lg-6" style="border-block-start-color: blue " id="here">
                <div class="job-sidebar">
                    <div class="details-text" >
                        <div class="row">
                            <form class="col-lg-6 col-md-6 offset-md-2 offset-lg-3" enctype="multipart/form-data" method="Post" action="/apply/{{$detail->id}}" > 
                                @csrf

                                @php
                                $date=strtotime(date('Y-m-d H:i:s'));
                                $start=strtotime($detail->start_at);
                                $end=strtotime($detail->end_at);
                                if($date>= $start && $date <= $end ){
                                    if(session()->get('id') && session()->get('tag')==0){
                                        if(!is_null($candidacy)){
                                              echo'
                                            <div class="form-group col-md-12">
                                                <label for="">Your contact</label>
                                                <input name="phone" id="phone" class="form-control" type="tel" placeholder="000000000">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Your Resume</label>
                                                <input name="cv" id="cv" class="form-control" type="file">
                                            </div>
                                        
                                            <button type="submit" class="post-btn" style="background-color: #010c29; border-solid:2px;border-radius:6px;color:white; padding:0.3rem" >
                                               Save 
                                            </button>';
                                        }else{
                                            echo'<div class="form-group col-md-12">
                                                <label>Vous avez déjà postulé à cette offre</label>
                                            </div> ';
                                        }
                                          
                                    } else{
                                        echo'<div class="form-group col-md-12">
                                                <label>Veuillez vous connecter pour postuler à cette offre</label>
                                            </div> ';
                                    }
                                    
                                }else{

                                    echo'<div class="form-group col-md-8">
                                            <label>Cette offre est expirée</label> 
                                        </div> ';
                                }
                            @endphp
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection