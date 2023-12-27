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
                    <h2>Slider Edit</h2>
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
                    <form method="POST" action=" {{ route('back.slider.update', $Slider->id)}} " enctype="multipart/form-data">
                        <label for="name">Slider Edit</label>
                        @csrf
                        <div class="form-group">                                
                            <input value="{{ $Slider->title }}" type="text" name="title" id="name" class="form-control" placeholder="Edit your category">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>

                        <label for="image">Image upload</label>
                        <div class="form-group">                                
                            <input data-default-file="{{ asset($Slider->image) }}" type="file" name="image" id="image" class="form-control">
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
$(document).ready(function(){

    $('#image').dropify();

    $('.editButton').on('click', function (e){
        e.preventDefault()
        
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        customClass:{
            popup: 'custom-modal'
        }
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",            
          });
          let myForm = $(this).next();

          myForm.submit();

        } else {
          swal("Your imaginary file is safe!");
        }
    });
    })

    let intervalId = setInterval(function() {
        // let successMessage = document.getElementById('successMessage');
        // if (successMessage) {
        //     successMessage.style.display = 'none';
        //     clearInterval(intervalId); // Stop the interval once the message is hidden
        // }
        $('#successMessage').fadeOut();
        clearInterval(intervalId);

    }, 3000);

})
</script>
@endsection