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
                        Add Admin
                        <a class="btn btn-success float-right btn-sm"  href="{{ route('admin.view') }}"><i class="fa fa-list"></i>Admin List</a>
                    </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.store') }}" method="post" id="myForm">
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="admintype">Admin Type</label>
                        <select name="admintype" id="admintype" class="form-control">
                            <option value="">Select Role</option>
                            <option value="super admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                         </select>
                          <font style="color:red">{{ ($errors->has('admintype')) ? ($errors->first('admintype')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        <font style="color:red">{{ ($errors->has('name')) ? ($errors->first('name')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" >
                         <font style="color:red">{{ ($errors->has('email')) ? ($errors->first('email')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                         <font style="color:red">{{ ($errors->has('password')) ? ($errors->first('password')):'' }}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="password2">
                         <font style="color:red">{{ ($errors->has('password2')) ? ($errors->first('password2')):'' }}</font>
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
