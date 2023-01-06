@extends('layout')
@section('content')

<section class="job-details ptb-100">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-9">
            </div> --}}
            <div class="col-lg-9" id="result">
                
                @foreach ($jobs as $job)
                    <div class="account-details">  
                        <article class="popular-post">
                            <div class="info">
                                <h4>
                                    <a href="/details/{{$job->id}}">{{$job->job_title}}</a>
                                </h4>                                
                                <ul>
                                    <i class='bx bx-location-plus'></i>
                                    {{$job->location}}
                                    <i class='bx bx-briefcase' ></i>
                                    {{$job->type_title}}
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach  
                {{-- <div style="display: flex"></div> --}}
                <div style="align-content: center; margin:50px 0px 0px;">

                    <nav aria-label="Page navigation example">
                        {{-- <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"></a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                {{ $jobs->links() }}
                            </li>
                        </ul> --}}
                        {{$jobs->links("pagination::bootstrap-4")}}
                    </nav>  
                </div>
                
            </div>

            <div class="col-lg-3">
                
                <div class="job-sidebar">
                    <div>
                        <form id="recherche" name="recherche">
                            @csrf
                            <div style="margin-bottom: 1rem"> 
                                
                                <h3 style='border: 1px dotted black; text-align:center;padding:0.3rem; margin'>Job</h3>
                                <input class="form-control" type="text" id="job_title" name="job_title" placeholder="Search" >
                                   
                            </div>
                            
                            <div style="margin-bottom: 0.6rem">
                                <ul>
                                    <h3 style='border: 1px dotted black; text-align:center;padding:0.3rem'>Category</h3>
                                    @foreach ($categories as $categorie)
                                    <input type="radio" id="category" name="category" value="{{$categorie->id}}">&nbsp;{{$categorie->category_title}}<br>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div style="margin-bottom: 0.6rem">
                                <ul>
                                    <h3 style='border: 1px dotted black; text-align:center;padding:0.3rem'>Type</h3>
                                    @foreach ($types as $type)
                                    <input id="type" name="type" type="radio" value="{{$type->id}}">&nbsp;{{$type->type_title}}<br>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="signup-btn text-center">
                                <button class="btn btn-block" style="background-color: #fd1616;color:white;font-size:16px;text-align:center; border-radius:5px; margin-top:0.8rem; padding:0.2rem" id="search" name="search" type="button" onclick="research()">Search</button>
                            </div>
                        </form>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    function research() {
        var form =$('#recherche')[0]
        var formData= new FormData(form);

        $.ajax({
            type: "post",
            url: "/searching",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                var element = JSON.parse(response);
                // $('#result').JSON parse(response);
                $("#result").html(element);
                console.log(response);
            }
        });
    }
</script>