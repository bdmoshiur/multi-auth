@extends('backend.layouts.master')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                        Edit User
                        <a class="btn btn-success float-right btn-sm"  href="{{ route('admin.view') }}"><i class="fa fa-list"></i>User List</a>
                    </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.update',$data->id) }}" method="post" id="myForm">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="admintype">User Role</label>
                        <select name="admintype" id="admintype" class="form-control">
                            <option value="">Select Role</option>
                            <option value="Super Admin"{{($data->admintype =='Super Admin') ? 'selected' : '' }}>Super Admin</option>
                            <option value="Admin"{{($data->admintype =='Admin') ? 'selected' : '' }}>Admin</option>
                            <option value="Manager"{{($data->admintype =='Manager') ? 'selected' : '' }}>Manager</option>
                         </select>
                          <font style="color:red">{{ ($errors->has('admintype')) ? ($errors->first('admintype')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{isset($data)? $data->name : '' }}">
                        <font style="color:red">{{ ($errors->has('name')) ? ($errors->first('name')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{isset($data)? $data->email : '' }}">
                         <font style="color:red">{{ ($errors->has('email')) ? ($errors->first('email')):'' }}</font>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="submit" class="btn btn-primary" value="Update" >
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
      name: {
        required: true,
      },
      admintype: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6
      },
       password2: {
        required: true,
        equalTo: '#password'
      },

    },
    messages: {
      name: {
        required: "Please enter the User Name",
      },
      admintype: {
        required: "Please select a User Role",
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
       password2: {
        required: "Please enter confirm password",
        equalTo: "Confirm password dose not match"
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
