@extends('back.layouts.layouts')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success"><strong>Well done!</strong> {{ Session::get('success') }}</div>
            @endif
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Edit Deshboard</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form method="POST" action=" {{ route('back.blog.update', $blogs->slug) }} " enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="body">
                        <label for="name">Title</label>
                        <div class="form-group">
                            <input value="{{ $blogs->title }}" type="text" name="title" id="title" class="form-control Select2" placeholder="Title Here" />
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>

                        <label for="name">Description</label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Description Here">{{ $blogs->description }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>

                        <label for="name">Select Category</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control show-tick ms select2" data-placeholder="--Please Select Category--">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                <option {{ $blogs->category_id == $category->id | old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>

                        <label for="name">Tags</label>
                        <div class="form-group">
                            <div class="border py-1" style="border-radius: 5px;">
                                <input value="{{ old('tags') ? old('tags') : $tag_names }}" type="text" name="tags" class="form-control" data-role="tagsinput" placeholder="Tags Here" />
                            </div>
                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                        </div>

                        <label for="image">Image</label>
                        <div class="form-group">
                            <input data-default-file="{{ asset($blogs->image_sm) }}" type="file" name="image" id="image" class="form-control" />
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>

                        <label for="name">Image_alt (Optional)</label>
                        <div class="form-group">
                            <input value="{{ $blogs->image_alt }}" type="text" name="image_alt" id="image_alt" class="form-control Select2" placeholder="Image_alt Here" />
                            <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                        </div>

                        <label for="details">Details</label>
                        <div class="form-group">
                            <textarea type="text" name="details" id="details" class="form-control summernote" placeholder="Details Here">{{ $blogs->details }}</textarea>
                            <span class="text-danger">{{ $errors->first('details') }}</span>
                        </div>

                        <label for="name">Select Status</label>
                        <div class="form-group">
                            <select name="status" class="form-control show-tick">
                                @foreach (STATUS_MSG as $status_msg)
                                <option value="{{ $status_msg }}">{{ $status_msg }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>

                        <div class="mt-3 panel-group" id="collapse_one" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne_1">
                                    <h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#collapse_one" href="#seo_collapse_one" aria-expanded="true" aria-controls="seo_collapse_one">SEO Inputs (Optional) </a></h3>
                                </div>
                                <div id="seo_collapse_one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                    <label class="mt-3" for="name">keyword</label>
                                    <div class="form-group">
                                        <textarea type="text" name="keyword" id="keyword" class="form-control" placeholder="keyword Here">{{ $blogs->keyword }}</textarea>
                                        <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                    </div>
                                    <label for="name">Head script</label>
                                    <div class="form-group">
                                        <textarea type="text" name="head_script" id="head_script" class="form-control" placeholder="Head script Here">{{ $blogs->head_script }}</textarea>
                                        <span class="text-danger">{{ $errors->first('head_script') }}</span>
                                    </div>
                                    <label for="name">Body Script</label>
                                    <div class="form-group">
                                        <textarea type="text" name="body_script" id="body_script" class="form-control" placeholder="Body Script Here">{{ $blogs->body_script }}</textarea>
                                        <span class="text-danger">{{ $errors->first('body_script') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 panel-group" id="collapse_two" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne_1">
                                    <h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#collapse_two" href="#custom_collapse" aria-expanded="true" aria-controls="custom_collapse">Custom Code (Optional) </a></h3>
                                </div>
                                <div id="custom_collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                    <label class="mt-3" for="name">Custom html</label>
                                    <div class="form-group">
                                        <textarea type="text" name="custom_html" id="custom_html" class="form-control" placeholder="Custom html Here">{{ $blogs->custom_html }}</textarea>
                                        <span class="text-danger">{{ $errors->first('custom_html') }}</span>
                                    </div>
                                    <label for="name">Custom css</label>
                                    <div class="form-group">
                                        <textarea type="text" name="custom_css" id="custom_css" class="form-control" placeholder="Custom css Here">{{ $blogs->custom_css }}</textarea>
                                        <span class="text-danger">{{ $errors->first('custom_css') }}</span>
                                    </div>
                                    <label for="name">Custom js</label>
                                    <div class="form-group">
                                        <textarea type="text" name="custom_js" id="custom_js" class="form-control" placeholder="Custom js Here">{{ $blogs->custom_js }}</textarea>
                                        <span class="text-danger">{{ $errors->first('custom_js') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-3 btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function (){
            
            // dropify
            $('#image').dropify();     
            
            // select2
            $('.select2').select2();
        })
    </script>
@endsection