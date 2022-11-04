@extends('layout')
@section('content')

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="account-information">
                    <div class="profile-thumb">
                        <img src="assets/img/account.jpg" alt="account holder image">
                        <h3>Company</h3>
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
                    <h3>Basic Information</h3>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                            <button class="nav-link" id="nav-v-tab" data-bs-toggle="tab" data-bs-target="#nav-v" type="button" role="tab" aria-controls="nav-v" aria-selected="false">Account (password</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...
                            <form class="basic-info" action="" method="">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Email</label>
                                            <input type="email" name="company_email"id="company_email" class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Phone</label>
                                            <input type="number" name="" id=""class="form-control" placeholder="Your Phone">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Licence number</label>
                                            <input type="text" class="form-control" placeholder="Licence number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" placeholder="Your Country">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="Your City">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="number" class="form-control" placeholder="City Zip">
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Region</label>
                                            <input type="text" class="form-control" placeholder="Your Region">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...
                            <h3>Address</h3>
                            <form class="-candidate-address">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Edit</button>
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
                                            <label>Company description</label>
                                            <textarea class="form-control" name="" id="" cols="60" rows="20"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Edit</button>
                                        <button type="submit" class="account-btn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-v" role="tabpanel" aria-labelledby="nav-v-tab">...
                            <h3>Social links</h3>
                            <form class="candidates-sociak">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" placeholder="www.facebook.com/user">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="number" class="form-control" placeholder="www.twitter.com/user">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            <input type="text" class="form-control" placeholder="www.Linkedin.com/user">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Web Site</label>
                                            <input type="text" class="form-control" placeholder="www.Github.com/user">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Edit</button>
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