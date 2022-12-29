@extends('layout')
@section('content')
<section class="company-section company-style-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Top Companies</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
        </div>

        <div class="row">
            @foreach ($companies as $company)
                <div class="col-lg-3 col-sm-6">
                    <div class="company-card">
                        <div class="company-logo">
                            <a href="job-list.html">
                                <img src="assets/img/top-company/1.png" alt="company logo">
                            </a>
                        </div>
                        <div class="company-text">
                            <h3>{{$company->name}}</h3>
                            <p>
                                <i class='bx bx-location-plus'></i>
                                {{$company->country}}
                            </p>
                            <a href="/company/{{$company->id}}" class="company-btn">
                                Voir les offres
                            </a>
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