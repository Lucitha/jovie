@extends('layout')
@section('content')
<div class="job-post ptb-100">
    <div class="container">
        <form class="job-post-from" method="POST" action="/updateJob/{{$edit->id}}">
            @csrf
            <h2>Fill Up Your Job information</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title" id="title" value="{{$edit->job_title}}" class="form-control" placeholder="Job Title or Keyword" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Job Category</label>
                        <select class="category" name="category_id" id="category_id">
                        <option data-display="Category">Category</option>
                        @foreach ($categories as $categorie)
                            <option <?= $edit->category_id ==$categorie->id ? 'selected':'' ?> value="{{$categorie->id}}">{{$categorie->category_title}}</option>
                        @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Job Type</label>
                        <select class="category" name="type_id" id="type_id">
                            <option data-display="Job Type">Job Type</option>
                            @foreach ($types as $type)
                              <option <?= $edit->type_id ==$type->id ? 'selected':'' ?> value="{{$type->id}}">{{$type->type_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" value='{{$edit->company_name}}' name="company_name" id="company_name" placeholder="e.g. London" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Contact</label>
                        <input type="tel" class="form-control" value='{{$edit->job_contact}}' name="contact" id="contact" placeholder="+000 0000000000" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" value='{{$edit->location}}' name="location" id="location" placeholder="e.g. London" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Contact</label>
                        <input type="email" class="form-control" name="company_email" id="company_email" value='{{$edit->company_email}}' placeholder="e.g. hello@company.com" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary min €(Optional)</label>
                        <input type="number" name="salary_min" value="{{$money[0]}}" id="salary_min"class="form-control"  placeholder="e.g. $20,000">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary max €(Optional)</label>
                        <input type="number" class="form-control" name="salary_max" value="{{$money[1]}}" id="salary_max" placeholder="e.g. $20,000">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start</label>
                        <input type="datetime-local" class="form-control" value="{{$edit->start_at}}" name="start_at" id="start_at">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Finish</label>
                        <input type="datetime-local" value="{{$edit->end_at}}" class="form-control" name="end_at" id="end_at">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Job Description</label>
                        <textarea class="form-control description-area" name="description" id="description" rows="6" placeholder="Job Description" required>{{$edit->job_description}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Required conditions</label>
                        <textarea class="form-control description-area" name="conditions" id="conditions" rows="6" placeholder="Required conditions" required>{{$edit->job_conditions}}</textarea>
                    </div>
                </div>
                @php
                $date=strtotime(date('Y-m-d H:i:s'));
                $start=strtotime($edit->start_at);
                $end=strtotime($edit->end_at);
                if($date =>$start && $date <= $end){
                    echo 'En cours de publication';

                }else {
                    echo  '<div class="col-md-12 text-center">
                                <button type="submit" name="updateJob" id="updateJob" class="post-btn">
                                    Post A Job
                                </button>
                            </div>';
                }
                    
                @endphp

                
            </div>
        </form>
    </div>
</div>
@endsection