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
                        Customer List
                        <a class="btn btn-success float-right btn-sm"  href="{{ route('admin.home') }}"><i class="fa fa-user"></i> Back</a>
                        <button type="button" class="btn btn-primary btn-sm" id="allRecordDelete">Delete Selected</button>
                    </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>SL.</th>
                    <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>

                      @foreach ($allData as $key => $data)
                    <tr id="sid{{ $data->id }}">
                      <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $data->id }}"> </td>
                        <td>{{ $key+1 }}</td>
                        <td>
                          <img src="{{ (!empty($data->image)) ? url('upload/customer_images/'.$data->image):url('upload/no_image.png')}}" width="120px" height="130xp">
                        </td>
                        <td>
                          <a title="Delete" id="delete" class="btn btn-danger btn-sm" href="{{ route('customer.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
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

  <script>
    $(function(e){
        $("#checkAll").click(function () {
        $('.checkBoxClass').prop('checked',$(this).prop('checked'));
      });

      $('#allRecordDelete').click(function(e){
        e.preventDefault();
        var allids.push($(this).val());
      });

      $.ajax({
        url:'{{ route('admin.customer.delete') }}',
        type:'DELETE',
        data: {
          ids:allids,
          _token:$("input[name=_token]").val();
        },
        success:function(response){
          $.each(allids,function(key,value){
            $('#sid'+val).remove();
          });
        },
      });

    });
  </script>


@endsection
