@extends('layout')
@section('content')
    <section class="candidate-style-two pt-100 pb-70">
        <div class="container">
            <div class="row">
                @foreach ($candidates as $candidate)
                <div class="col-lg-3 col-sm-6">
                    <div class="candidate-card">
                        <div class="candidate-img">
                            <img src="assets/img/candidate/1.jpg" alt="candidate image">
                        </div>
                        <div class="candidate-text">
                            <h3>
                                <a href="candidate-details.html">{{$candidate->users_name}}</a>
                            </h3>
                            <ul>
                                <li>
                                    {{$candidate->users_jobs}}
                                </li>
                            </ul>
                        </div>
                        <div class="candidate-social">
                            <a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
                            <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
                            <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div style="text-align: center; justify-content:center; margin:50px 0px 0px;">
                {{$candidates->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>    
@endsection