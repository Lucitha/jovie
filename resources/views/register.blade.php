@extends('layout')
@section('content')
    <div class="signup-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3" >
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link {{ ( session()->get('currentTab') == '' ) ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Candidate</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link {{ ( session()->get('currentTab') == 'company' ) ? 'active' : '' }}" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Company</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ ( session()->get('currentTab') == '' ) ? 'show active' : '' }}" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="signup-form" id='Candidats' action="/save_candidate" method="POST" >
                            @csrf
                            <div class="form-group" id="desactive">
                                <label>Enter Name</label>
                                <input type="text" class="form-control @error('nameCandidate') is-invalid @enderror" id='nameCandidate' name='nameCandidate' placeholder="Enter Name" value="{{ old('nameCandidate')}}" required>
                                @error('nameCandidate')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nameCandidate') }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="email" class="form-control @error('emailCandidate') is-invalid @enderror" id='emailCandidate' name='emailCandidate' placeholder="Enter Your Email" value="{{ old('emailCandidate')}}" required>
                                @error('emailCandidate')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('emailCandidate') }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <div class="input-group">
                                    <input type="password" id='passwordCandidate' name='passwordCandidate' class="form-control @error('passwordCandidate') is-invalid @enderror" style="border-radius:0px; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                    <div class="input-group-append">
                                        <button class="input-group-text" id="my-addon" type="button" onclick="candidatePassword()" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; background-color:#fd1616; border-block: none;">
                                            <i id="icon"  style='color:white' class='far fa-eye-slash'></i></button>
                                    </div>
                                </div>
                                {{-- <input type="password" id='passwordCandidate' name='passwordCandidate' class="form-control @error('passwordCandidate') is-invalid @enderror" placeholder="Enter Your Password" required> --}}
                                @error('passwordCandidate')
                                <div class="invalid-feedback">
                                    {{ $errors->first('passwordCandidate') }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                {{-- <div class="input-group">
                                    <input type="password" id='passwordConfirm' name='passwordConfirm' class="form-control" placeholder="Enter Your Password" required class="form-control @error('passwordCandidate') is-invalid @enderror" style="border-radius:0px; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                    <div class="input-group-append">
                                        <button class="input-group-text" id="my-addon" type="button" onclick="companyPassword()" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; background-color:#fd1616; border-block: none;">
                                            <i id="picon"  style='color:white' class='far fa-eye-slash'></i></button>
                                    </div>
                                </div> --}}
                                <input type="password" id='passwordConfirm' name='passwordConfirm' class="form-control" placeholder="Enter Your Password" required>
                            </div>

                            <div class="signup-btn text-center">
                                <button id="save_candidate" name="save_candidate" type="submit">Sign Up</button>
                            </div>

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
                    <div class="tab-pane fade  {{ ( session()->get('currentTab') == 'company' ) ? 'show active' : '' }}" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <form class="signup-form" id='Company' action="/save_company" method="POST">
                            @csrf             
                            <div class="form-group" >
                                <label>Company Name</label>
                                <input type="text" id='nameCompany' name='nameCompany' class="form-control @error('nameCompany') is-invalid @enderror" placeholder="Enter Your Company Name" value="{{ old('nameCompany')}}" required>
                                @error('nameCompany')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nameCompany') }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Business Reference </label>
                                <input type="text" id='business_number' name='business_number' class="form-control @error('business_number') is-invalid @enderror" placeholder="Enter Your Business Number" value="{{ old('business_number')}}" required>
                                @error('business_number')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('business_number') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company Email</label>
                                <input type="email" id='emailCompany' name='emailCompany' class="form-control @error('emailCompany') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('emailCompany')}}" required>
                                @error('emailCompany')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('emailCompany') }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Enter Password</label>
                                <div class="input-group">
                                    <input type="password" id='passwordCompany' name='passwordCompany' class="form-control @error('passwordCompany') is-invalid @enderror" style="border-radius:0px; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                    <div class="input-group-append">
                                        <button class="input-group-text" id="my-addon" type="button" onclick="companyPassword()" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; background-color:#fd1616; border-block: none;">
                                            <i id="picon"  style='color:white' class='far fa-eye-slash'></i></button>
                                    </div>
                                </div>
                                {{-- <input type="password" id='passwordCompany' name='passwordCompany' class="form-control @error('passwordCompany') is-invalid @enderror" placeholder="Enter Your Password" required> --}}
                                @error('passwordCompany')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('passwordCompany') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="pConfirm" name="pConfirm" class="form-control" placeholder="Enter Your Password" required>
                            </div>      
    
                            <div class="signup-btn text-center">
                                <button id="save_company" name="save_company" type="submit">Sign Up</button>
                            </div>
    
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
<script>
    function candidatePassword() {
  var showCandidate = document.getElementById("passwordCandidate");
  var verifCandidate = document.getElementById("passwordConfirm");
//   console.log(iconPassword.class); 
  if (showCandidate.type === "password") {
    showCandidate.type = "text";
    verifCandidate.type = "text";
    $('#icon').attr('class','far fa-eye');
  } else {
    showCandidate.type = "password";
    verifCandidate.type = "password";
    $('#icon').attr('class','far fa-eye-slash');
  }
}
    function companyPassword() {
  var showCompany = document.getElementById("passwordCompany");
  var verifCompany = document.getElementById("pConfirm");

//   console.log(iconPassword.class); 
  if (showCompany.type === "password" ) {
    showCompany.type = "text";
    verifCompany.type = "text";

    $('#picon').attr('class','far fa-eye');
  } else {
    showCompany.type = "password";
    verifCompany.type = "password";
    $('#picon').attr('class','far fa-eye-slash');
  }
}

</script>