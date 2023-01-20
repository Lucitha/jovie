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
                            <h3>{{$company->users_name}}</h3>
                            <p>
                                <i class='bx bx-location-plus'></i>
                                {{$company->users_address}}
                            </p>
                            <a href="/company/{{$company->id}}" class="company-btn">
                                Voir les offres
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
        
        <div style="text-align: center; justify-content:center; margin:50px 0px 0px;">
            {{$companies->links("pagination::bootstrap-4")}}
        </div>
    </div>
</section>
    
@endsection