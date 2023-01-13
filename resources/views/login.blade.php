@extends('layout')
@section('content')
    <div class="signup-section ptb-100">
        <div class="container">
            <div class="row">
                {{-- <div class="row justify-content-center"> --}}
                    <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3" style="margin-bottom:-20px;">
                        @include('flashMessage')
                    </div>
                {{-- </div> --}}
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    <form class="signup-form" method="POST" action="/login">
                        @csrf
                       
                        <div class="form-group">
                            
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
                        </div>

                        <div class="form-group">
                            <label>Enter Password</label>
                            
                            <div class="input-group">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password" style="border-radius:0px; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                <div class="input-group-append">
                                    <button class="input-group-text" id="my-addon" type="button" onclick="myPassword()" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px; background-color:#fd1616; border-block: none;">
                                        <i id="icon"  style='color:white' class='far fa-eye-slash'></i></button>
                                </div>
                            </div>
                            {{-- <i class="far fa-eye" onclick="myPassword()"></i> --}}
                        </div>
                        {{-- <div class="input-group"> --}}
                            {{-- <div class="input-group-text">
                              <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div> --}}
                            {{-- <input type="text" class="form-control" aria-label="Text input with checkbox"> --}}
                            {{-- </div> --}}

                        <div class="signup-btn text-center">
                            <button type="submit">Sign In</button>
                        </div>
                        <div class="create-btn text-center">
                            <p>
                                Have an Account?
                                <a href="/register">
                                    Create an Account
                                    <i class='bx bx-chevrons-right bx-fade-right'></i>
                                </a>
                            </p>
                        </div>
                        <div class="create-btn text-center">
                            <p>
                                Password Forget?
                                <a href="/reset">
                                    Reset Your Password
                                    <i class='bx bx-chevrons-right bx-fade-right'></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div> 
            </div> 
        </div> 
    </div> 

@endsection
<script>
    function myPassword() {
  var showPassword = document.getElementById("password");
  var iconPassword = document.getElementById("icon");
//   console.log(iconPassword.class); 
  if (showPassword.type === "password" ) {
    showPassword.type = "text";
    $('#icon').attr('class','far fa-eye');
  } else {
    showPassword.type = "password";
    $('#icon').attr('class','far fa-eye-slash');
  }
}

</script>