@extends('back.layouts.layouts')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            @if (Session::has('success'))
            <div style="transition: all .5s;" class="alert alert-success" id="successMessage">
                <strong>Well done!</strong> {{ Session::get('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Category Dashboard</h2>
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
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($categories as $category)
                               <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                {{-- format('d M Y | h:ia') --}}
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-area">
                                        <a href="{{ route('back.category.edit', $category->slug) }}" type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Edit</a>
                                        <a href="javascript:void(0);" type="submit" class="btn btn-raised btn-danger btn-round waves-effect editButton">Delete</a>
                                        <form class="d-none" method="POST" action="{{ route('back.category.delete') }}">
                                            @csrf
                                        <input value="{{ $category->slug }}" name="slug" type="text" >
                                        </form>
                                    </div>
                                </td>
                                </tr>
                               @empty
                                   <tr>
                                    <td colspan="5">
                                        <span class="d-block text-center">NO DATA FOUND</span>
                                    </td>
                                   </tr>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
$(document).ready(function(){

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

    }, 5000);

})
</script>
@endsection