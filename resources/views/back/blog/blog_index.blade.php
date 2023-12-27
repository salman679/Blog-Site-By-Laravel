@extends('back.layouts.layouts')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            @if (Session::has('success'))
            <div class="alert alert-success" id="successMessage">
                <strong>Well done!</strong> {{ Session::get('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Blog Dashboard</h2>
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
                                <th scope="col">Sl</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($blogs as $blog)
                               <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 90px;" src="{{ asset($blog->image_sm) }}" alt="image">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td>
                                    @php
                                        if ($blog->status == 'Active') {
                                            $status_color = 'badge badge-info';
                                        }

                                        if ($blog->status == 'Inactive') {
                                            $status_color = 'badge badge-danger';
                                        }

                                        if ($blog->status == 'Draft') {
                                            $status_color = 'badge badge-warning';
                                        }
                                    @endphp

                                    <span class="{{ $status_color }} p-1 font-bold" > {{ $blog->status }}</span>
                                </td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                <td>{{ $blog->updated_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-area">
                                        <a href="{{ route('back.blog.edit', $blog->slug) }}" type="submit"><i class="zmdi zmdi-hc-fw"></i></a>
                                        <a href="javascript:void(0);" type="submit" class="editButton"><i class="zmdi zmdi-hc-fw"></i></a>
                                        <form class="d-none" method="POST" action="{{ route('back.blog.delete') }}">
                                            @csrf
                                        <input value="{{ $blog->id }}" name="id" type="text" >
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                   
                               @empty
                                   <tr>
                                    <td colspan="9">
                                        <span class="text-center d-block fs-30">NO DATA FOUND</span>
                                    </td>
                                   </tr>
                               @endforelse
                            </tbody>
                        </table>
                       <div class="post pt-5">
                        <div class="col-lg-8">
                            {{ $blogs->onEachSide(3)->links() }}
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <div class="post">
    <div class="col-lg-8">
        <!-- custom pagination -->
        <div class="pagination">
            <ul class="d-flex">
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div> --}}




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
