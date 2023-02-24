@extends('layout')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                   
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Job Category</button>
                          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Job Type</button>
                          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent"> 
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h3>Category</h3>
                            <div class="col-lg-6 col-md-8 mt-3 offset-md-2 offset-lg-3">
                                <form class="backend" method="POST" action="/save_categorie">
                                    @csrf
                                    <div class="form-group">
                                        <label>Job Category</label>
                                        <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Enter a new categorie" required>
                                        <label>Job Category</label>
                                        <textarea class="form-control" id="category_description" name="category_description"></textarea>
                                    </div>
                                    <div class="reset-btn text-center">
                                        <button type="submit">Save</button>
                                    </div>
                                </form>
                            </div>  
                            <div class="form-group">
                                <table class="table m-4">
                                    <thead>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php if($categories){?>
                                        @foreach ($categories as $categorie)
                                            <tr>
                                            <td>{{$categorie->categories_name}}</td>
                                            <td>{{$categorie->categories_description}}</td>
                                            <td>
                                                <a class="account-btn"  style="color: red" href="/admin/deleteC/{{$categorie->id}}" onclick=" return confirm('Voulez vous vraiment le supprimer ?');">Delete</a>
                                                <a class="account-btn" href="/admin/editC/{{$categorie->id}}">Edit</a>
                                            </td>
                                        </tr> 
                                        @endforeach
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h3>Types</h3>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-lg-6 col-md-8 mt-3 offset-md-2 offset-lg-3">
                                    <form class="backend"method="POST" action="/save_type">
                                        @csrf
                                        <div class="form-group">
                                            <label>Job Type</label>
                                            <input type="text" class="form-control" id="type_title" name="type_title" placeholder="Enter new type" required>
                                            <label>Job Type</label>
                                            <textarea class="form-control" id="type_description" name="type_description"></textarea>
                                        </div>
                                        <div class="reset-btn text-center">
                                            <button type="submit">Save</button>
                                        </div>
                                        
                                    </form>
                                </div>  
                                <div class="form-group">
                                    <table class="table m-4">
                                        <thead>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php if($types){?>
                                                @foreach ($types as $type)
                                                <tr>
                                                    <td>{{$type->types_name}}</td>
                                                    <td>{{$type->types_description}}</td>
                                                    <td>
                                                        <a  style="color: red" href="/admin/deleteT/{{$type->id}}" onclick=" return confirm('Voulez vous vraiment le supprimer ?');">Delete</a>
                                                        <a  href="/admin/ediT/{{$type->id}}">Edit</a>
                                                    </td>
                                                </tr> 
                                                @endforeach
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                      </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                      </div>

                </div>
                
            </div> 
            
        </div>
    </div>
</div>

@endsection