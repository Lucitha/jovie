@extends('layout')
@section('content')
<div class="job-post ptb-100">
    <div class="container">
        <form class="job-post-from" method="POST" action="/save_job">
            @csrf
            <h2>Fill Up Your Job information</h2>
            <div class="row">
                
                <div class="col-md-12 text-left m-5">
                    <label for="url">Faire postuler ailleurs</label>
                    <input  type="checkbox" name="url" id="url" onclick="required()">
                    {{-- <a  href="javascript:void" title="Diriger les utilisateurs directement sur le site renseigné pour postuler " onclick="required()">Url redirecting</a> --}}
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title" id="title" class="form-control"  placeholder="Job Title or Keyword" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jobs apply url</label>
                        <input type="text" name="jobs_apply_url" id="jobs_apply_url" class="form-control" placeholder="Job Title or Keyword" >
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Job Category</label>
                        <select class="category" name="category_id" id="category_id">
                        <option data-display="Category">Category</option>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->categories_name}}</option>
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
                              <option value="{{$type->id}}">{{$type->types_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" value="{{$company->users_name}}" name="company_name" id="company_name" placeholder="e.g. London" required>
                    </div>
                </div>
  
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone Contact</label>
                        <input type="tel" class="form-control" name="contact" id="contact" value="{{$company->users_phone}}" placeholder="+000 0000000000" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Benin / Cotonou Rue Morue 32" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Contact</label>
                        <input type="email" class="form-control" value="{{$company->users_email}}"  name="company_email" id="company_email" placeholder="e.g. hello@company.com" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary min €(Optional)</label>
                        <input type="number" name="salary_min" id="salary_min"class="form-control"  placeholder="e.g. $20,000">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary max €(Optional)</label>
                        <input type="number" class="form-control" name="salary_max" id="salary_max" placeholder="e.g. $20,000">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start</label>
                        <input type="datetime-local" class="form-control" name="start_at" id="start_at">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Finish</label>
                        <input type="datetime-local" class="form-control" name="end_at" id="end_at">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Job Description</label>
                        <textarea class="form-control description-area" name="description" id="description" rows="6" placeholder="Job Description" required></textarea>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Required conditions</label>
                        <textarea class="form-control description-area" name="conditions" id="conditions" rows="6" placeholder="Required conditions" required></textarea>
                    </div>
                </div>

                <div class="col-md-12  mt-5 text-center">
                    <button type="submit" name="saveJob" id="saveJob" class="post-btn" >
                        Post A Job
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function required(){

        var url=document.getElementById("url");
        // url.addEventListener('change', e => {
        //     if(e.target.checked === true) {
        //         console.log("Checkbox is checked - boolean value: ", e.target.checked)}
        //     });
        if(url.checked){
            console.log('yes');
            // document.getElementById("company_name").readOnly=true;
            // document.getElementById("jobs_apply_url").required=true;
            // document.getElementById("description").required=false;
            // document.getElementById("conditions").required=false;
            // document.getElementById("company_email").readOnly=true;
            // document.getElementById("salary_min").required=false;
            // document.getElementById("salary_max").required=false;
        }
       
    }
</script>
@endsection
