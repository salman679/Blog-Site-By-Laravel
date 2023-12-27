@extends('back.layouts.layouts')

@section('content')
<section class="content">
    <div class="body_scroll">    
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Slider Dashboard</h2>
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
                    <form method="POST" action=" {{ route('back.slider.store') }} " enctype="multipart/form-data">
                        <label for="title">Create Slider</label>
                        @csrf
                        <div class="form-group">                                
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Slider Title ">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <label for="image">Image upload</label>
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