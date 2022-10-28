@extends('layout')
@section('content')
<div class="job-post ptb-100">
    <div class="container">
        <form class="job-post-from" method="POST" action="/save_job">
            @csrf
            <h2>Fill Up Your Job information</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" id="exampleInput1" placeholder="Job Title or Keyword" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Category</label>
                        <select class="category" name="category" id="category">
                            <option data-display="Category"></option>
                            <option value="1">Web Development</option>
                            <option value="2">Graphics Design</option>
                            <option value="4">Data Entry</option>
                            <option value="5">Visual Editor</option>
                            <option value="6">Office Assistant</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company Email</label>
                        <input type="email" class="form-control" name="" id="" placeholder="e.g. hello@company.com" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="e.g. London" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="" id="" placeholder="e.g. London" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Type</label>
                        <select class="category" name="type_id" id="type_id">
                            <option data-display="Job Type">Job Type</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                            <option value="3">Seasonal</option>
                            <option value="4"> Temporary</option>
                            <option value="5">Freelancer</option>
                            <option value="6">Volunteer</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary min(Optional)</label>
                        <input type="number" name="salary_min" id="salary_min"class="form-control"  placeholder="e.g. $20,000">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Salary max(Optional)</label>
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Required conditions</label>
                        <textarea class="form-control description-area" name="conditions" id="conditions" rows="6" placeholder="Required conditions" required></textarea>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" name="saveJob" id="saveJob" class="post-btn">
                        Post A Job
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection