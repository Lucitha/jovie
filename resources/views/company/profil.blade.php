@extends('layout')
@section('content')

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="account-information">
                    <div class="profile-thumb">
                        <img src="assets/img/account.jpg" alt="account holder image">
                        <h3>{{$info->name}}</h3>
                        <p>Web Developer</p>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 col-md-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            {{-- <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3 col-md-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <ul>
                                        <li>
                                            <button class=" active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class='bx bx-user'>Home</i></button>
                                        </li>
                                        <li>
                                            <button class=" " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class='bx bxs-file-doc'>Profile</i></button>
                                        </li>
                                        <li>
                                            <button class=" " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class='bx bx-briefcase'>Jobs</i></button>                                   
                                        </li>
                                        <li>  
                                            <button class="" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"> <i class='bx bx-envelope'>Candidacies</i></button>
                                        </li>
                                        <li>
                                            <button class="" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class='bx bx-heart'>Saved Jobs</i></button>
                                        </li>
                                    </ul>  
                                </div>
                            </div> --}}
                            <ul>
                                <li>
                                    <a href="#" class="active" >
                                        <i class='bx bx-user'></i>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#v-pills-messages" id="v-pills-messages-tab" role="tab" aria-controls="v-pills-messages"  aria-selected="false">
                                        <i class='bx bxs-file-doc'></i>
                                        My Resume
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-briefcase'></i>
                                        Jobs
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-envelope'></i>
                                        Candidacies
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-heart'></i>
                                         Jobs
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-coffee-togo'></i>
                                        Delete Account
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-log-out'></i>
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                      </div>
                </div>
            </div>

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
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" value="{{$info->name}}" id="company_name" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Email</label>
                                            <input type="email" name="company_email"id="company_email" value="{{$info->email}}" class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Phone</label>
                                            <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Your Phone">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business number</label>
                                            <input type="text" name="business_number" id="business_number" value="{{$info->business_number}}" class="form-control" placeholder="Licence number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" name="country" id="contry" value="{{$info->country}}" class="form-control" placeholder="Your Country">
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
                            <h3>Social Link</h3>
                            <form class="-candidate-address">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h3>Other information</h3>
                            <form class="cadidate-others">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Company description</label>
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
</section>
    
@endsection