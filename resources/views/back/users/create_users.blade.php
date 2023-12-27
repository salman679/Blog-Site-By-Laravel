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
                    <h2>Create User</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="body">
                    <form method="POST" action=" {{ route('users.store') }} " enctype="multipart/form-data">
                        <label for="name">User Information</label>
                        @csrf
                        <div class="form-group">                                
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name Here">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">                                
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email Here">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">                                
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password Here">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group">                                
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Your confirm_password Here">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <label for="image">User Avater</label>
                        <div class="form-group">                                
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function (){
            $(function () {
                $('#image').dropify();     
            })
        })
    </script>
@endsection