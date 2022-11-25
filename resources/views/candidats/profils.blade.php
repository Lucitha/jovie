@extends('layout')
@section('content')

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            {{-- @extends('candidats/candidats_menu') --}}

            <div class="col-md-8">
                <div class="account-details">

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                            <button class="nav-link" id="nav-v-tab" data-bs-toggle="tab" data-bs-target="#nav-v" type="button" role="tab" aria-controls="nav-v" aria-selected="false">Account (password</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <br/>
                                <h3>Basic Information</h3>
                                <form class="basic-info" action="/save_profil" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{$info->name}}" id="name" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username" value="{{$info->username}}" class="form-control" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" id="email" value="{{$info->email}}" class="form-control" placeholder="Your Username">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="number" name="phone_number" id="phone_number" value="" class="form-control" placeholder="Your Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" id="contry" value="{{$info->contry}}" class="form-control" placeholder="Your Country">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" id="city" value="{{$info->city}}" class="form-control" placeholder="Your City">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Post Office Box</label>
                                                <input type="text" name="post_office_box" id="post_office_box" value="{{$info->post_office_box}}" class="form-control" placeholder="Your Post office Box Here">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Region</label>
                                                <input type="text" name="region" id="region" value="{{$info->region}}"class="form-control" placeholder="Your Region">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="account-btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <br/>
                                <h3>Social link</h3>
                                <form class="-candidate-address" action="/socialLink" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Web site</label>
                                                <input type="text" class="form-control" placeholder="Your Country">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Your Linkedin account">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Your Twitter account">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="Your Linkedin account">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Github</label>
                                                <input type="text" id="github" name="github" class="form-control" placeholder="Your Github account">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other</label>
                                                <input type="text" id="other" name="other" class="form-control" placeholder="Describe yourself">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="account-btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...
                                <h3>Other information</h3>
                                <form class="cadidate-others">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Describe Yourself</label>
                                                <textarea class="form-control" name="" id="" cols="60" rows="20"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="account-btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-v" role="tabpanel" aria-labelledby="nav-v-tab">
                                <br/>
                                <h3>Change your password</h3>
                                <form class="candidates-sociak" action="/update_password" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Old password</label>
                                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Your old password here">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Confirm new password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your new password">
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="account-btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection