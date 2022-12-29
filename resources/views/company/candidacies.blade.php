@extends('layout')
@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="height: 200px;overflow-y:auto; font-size:14px">
                <div class="blog-widget">
                  @foreach ($candidacies as $candidacie)
                    <article class="popular-post">
                        <a href="blog-details.html" class="blog-thumb">
                            <img src="{{asset('assets/img/blog/popular-post1.jpg')}}" alt="blog image" >
                        </a>
                        <div class="info">
                            <h1>{{$apply_date}}</h1>
                            <h4>
                                <a href="javascript:void(0);" onclick="details({{$candidacie->cID}})">{{$candidacie->username}} {{$candidacie->name}}</a>
                            </h4>                                
                        </div>
                    </article>
                  @endforeach
                </div>
                          
            </div>
               <div class="col-lg-9">
                    <div class="blog-dedails-text">
                        <div class="blog-meta">
                           <iframe id="cv" src="" style="width: 100%; height:800px;border: 0.1rem solid transparent;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    function details(id) {
        // console.log(id);
        $.ajax({
        type: "post",
        url: "/resum/"+id,
        data: {id:id,_token:"{{csrf_token()}}"},
        success: function (response) {
          console.log(response);
          document.getElementById("cv").src = response  
        },
        error: function(error){
            console.log(error)
        }
    });
    }
</script>
@endsection