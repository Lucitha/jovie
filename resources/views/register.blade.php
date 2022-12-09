@extends('layout')
@section('content')
    <div class="signup-section ptb-100">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3" >
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Candidate</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Company</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="signup-form" id='Candidats' action="/save_candidate" method="POST" >
                            @csrf
                            <div class="form-group" id="desactive">
                                <label>Enter Name</label>
                                <input type="text" class="form-control" id='nameCandidate' name='nameCandidate' placeholder="Enter Name" required>
                            </div>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="email" class="form-control" id='emailCandidate' name='emailCandidate' placeholder="Enter Your Email" required>
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" id='passwordCandidate' name='passwordCandidate' class="form-control" placeholder="Enter Your Password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id='passwordConfirm' name='passwordConfirm' class="form-control" placeholder="Enter Your Password" required>
                            </div>

                            <div class="signup-btn text-center">
                                <button id="save_candidate" name="save_candidate" type="submit">Sign Up</button>
                            </div>

                            {{-- <div class="other-signup text-center">
                                <span>Or sign up with</span>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-google'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-linkedin'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}

                            <div class="create-btn text-center">
                                <p>
                                    Have an Account?
                                    <a href="/connexion">
                                        Sign In
                                        <i class='bx bx-chevrons-right bx-fade-right'></i>
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <form class="signup-form" id='Company' action="/save_company" method="POST">
                            @csrf             
                            <div class="form-group" >
                                <label>Company Name</label>
                                <input type="text" id='nameCompany' name='nameCompany' class="form-control" placeholder="Enter Your Company Name" required>
                            </div>
    
                            <div class="form-group">
                                <label>Business Reference </label>
                                <input type="text" id='business_number' name='business_number' class="form-control" placeholder="Enter Your Business Number" required>
                            </div>
                            <div class="form-group">
                                <label>Company Email</label>
                                <input type="email" id='emailCompany' name='emailCompany' class="form-control" placeholder="Enter Your Email" required>
                            </div>
    
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" id='passwordCompany' name='passwordCompany' class="form-control" placeholder="Enter Your Password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" placeholder="Enter Your Password" required>
                            </div>
    
                            <div class="signup-btn text-center">
                                <button id="save_company" name="save_company" type="submit">Sign Up</button>
                            </div>
    
                            {{-- <div class="other-signup text-center">
                                <span>Or sign up with</span>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-google'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bxl-linkedin'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
    
                            <div class="create-btn text-center">
                                <p>
                                    Have an Account?
                                    <a href="/connexion">
                                        Sign In
                                        <i class='bx bx-chevrons-right bx-fade-right'></i>
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
        </div> 
    </div> 
    
@endsection