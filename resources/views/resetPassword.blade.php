@extends('layout')
@section('content')
    <div class="reset-password ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    <form class="reset-form">
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email" required>
                            <small>We will sent a notification to your email.</small>
                        </div>
                        <div class="reset-btn text-center">
                            <button type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>  
@endsection