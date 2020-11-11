@extends('kk.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('kk.article.store')}}">

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>{{$errors->first()}}</span>
                    </div>
                @endif

                @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>{{session('success')}}</span>
                        </div>
                @endif

                <div class="card">
                    <div class="card-body">

                        @csrf
                        <nav style="margin-bottom: 1em">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">Main</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Other</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                   role="tab" aria-controls="nav-contact" aria-selected="false">Seo</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-4" for="title">Title</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="text" class="form-control" required name="title" id="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-4" for="category_id">Category</label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control" name="category_id" id="category_id">
                                            @foreach($categoryList as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="short_text">Short text</label>
                                    <div>
                                        <textarea class="textAreaEditor form-control" name="short_text"
                                                  id="short_text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="full_text">Full text</label>
                                    <div>
                                        <textarea class="textAreaEditor form-control" name="full_text"
                                                  id="full_text"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="0" id="public">
                                    <label class="form-check-label" for="public">
                                        Public
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                 aria-labelledby="nav-contact-tab">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-4" for="slug">Slug</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="text" name="slug" id="slug" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
