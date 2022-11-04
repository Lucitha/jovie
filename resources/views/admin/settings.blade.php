@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Job</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                </div>   
            </div>
        </div>

        <div class="col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h3>Categories </h3>
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
                                            <td>{{$categorie->category_title}}</td>
                                            <td>{{$categorie->category_description}}</td>
                                            <td>
                                                <a href="/admin/deleteC/{{$categorie->id}}" onclick=" return confirm('Voulez vous vraiment le supprimer ?');">delete</a>
                                                <a href="#">edit</a>
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
                                                    <td>{{$type->type_title}}</td>
                                                    <td>{{$type->type_description}}</td>
                                                    <td>
                                                        <a href="/admin/deleteT/{{$type->id}}" onclick=" return confirm('Voulez vous vraiment le supprimer ?');">delete</a>
                                                        <a href="/admin/ediType/{{$type->id}}">Edit</a>
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
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...
                    
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div> 
            
        </div>
    </div>
</div>

@endsection