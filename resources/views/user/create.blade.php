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
            <form role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                </div>
                  <div class="form-group">
                        <label>Pilih Role</label>
                          <select name="group_id" class="form-control">
                            <option value="">--Pilih Role--</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                      </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="password"  id="password_confirmation" name="password_confirmation" required autocomplete="current-password" class="form-control" placeholder="Password">
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