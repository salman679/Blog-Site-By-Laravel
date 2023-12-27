@extends('back.layouts.layouts')

@section('content')
<section class="content">
    <div class="body_scroll">    
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Well done!</strong> {{ Session::get('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Create Category</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form method="POST" action=" {{ route('back.category.store') }} ">
                @csrf
                <div class="card">
                    <div class="body">
                        <label for="name">Create categories</label>
                        <div class="form-group">                                
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter categorie">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <h3>SEO (Optional)</h3>
                        <label for="name">Title</label>
                        <div class="form-group">                                
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title Here">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <label for="name">Description</label>
                        <div class="form-group">                                
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Description Here"></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <label for="name">Keyword</label>
                        <div class="form-group">                                
                            <textarea type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword Here"></textarea>
                            <span class="text-danger">{{ $errors->first('keyword') }}</span>
                        </div>
                        <label for="name">Head_Script</label>
                        <div class="form-group">                                
                            <textarea type="text" name="head_script" id="head_script" class="form-control" placeholder="Head_Script Here"></textarea>
                            <span class="text-danger">{{ $errors->first('head_script') }}</span>
                        </div>
                        <label for="name">Body_Script</label>
                        <div class="form-group">                                
                            <textarea type="text" name="body_script" id="body_script" class="form-control" placeholder="Body_Script Here"></textarea>
                            <span class="text-danger">{{ $errors->first('body_script') }}</span>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection