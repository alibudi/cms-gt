@extends('template.master')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Tag</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('users.update',$users->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $users->name }}" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="email" value="{{ $users->email }}" placeholder="Email">
                </div>
                  <div class="form-group">
                        <label>Pilih Role</label>
                          <select name="group_id" class="form-control">
                            <option value="" disabled selected>--Pilih Role--</option>
                            @foreach ($roles as $item)
                            <option {{ $item->id == $users->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                      </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
     
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @push('js')
        <script>
               $("#menu-users").addClass("active");
        </script>
    @endpush
@endsection