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
                        Admin List
                        <a class="btn btn-success float-right btn-sm"  href="{{ route('admin.add') }}"><i class="fa fa-plus-circle"></i>Add Admin</a>
                    </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                      @foreach ($allData as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->admintype }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a title="Edit" class="btn btn-primary btn-sm" href="{{ route('admin.edit',$data->id) }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" id="delete" class="btn btn-danger btn-sm" href="{{ route('admin.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>

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


@endsection
