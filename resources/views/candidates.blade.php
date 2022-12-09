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
                                <a href="candidate-details.html">{{$candidate->name}}</a>
                            </h3>
                            <ul>
                                <li>
                                    {{$candidate->username}}
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
            
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class='bx bx-chevrons-left bx-fade-left'></i>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class='bx bx-chevrons-right bx-fade-right'></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>    
@endsection