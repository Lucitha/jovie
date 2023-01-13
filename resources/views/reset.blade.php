@extends('layout')
@section('content')
    <div class="reset-password ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    <form class="reset-form" method="POST" action="/newPassword">
                        @csrf
                        <p >Thank you Mr/Miss {{$user->name}} to create a new password</p>
                        <div class="form-group">
                            <label for="password">New password</label>
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter Your Email" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirm">Confirm password</label>
                            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Enter Your Email" required>
                            <input type="hidden"  value="{{$id}}" class="form-control" name="token" id="token" placeholder="Enter Your Email" required>
                    
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