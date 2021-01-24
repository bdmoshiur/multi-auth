@extends('backend.layouts.master')

@section('content')

<br>
<br>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                    <h3>
                        Edit Custmer Info
                        <a class="btn btn-success float-right btn-sm"  href="{{ route('customer.view') }}"><i class="fa fa-list"></i>Customer List</a>
                    </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('customer.update',$editData->id) }}" method="post" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{(!empty($editData->image)) ? $editData->image : '' }}">
                    </div>
                    <div class="form-group col-md-2">
                        <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/customer_images/'.$editData->image):url('upload/no_image.png')}}" style="width: 150px;height: 160px;border: 1px solid #000">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="submit" class="btn btn-primary" value="Submit" >
                    </div>
                   </div>
                </form>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
    $(function () {
      $('#myForm').validate({
        rules: {
          image: {
            required: true,
          },

        },
        messages: {
          image: {
            required: "Please enter the User Image",
          },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection
