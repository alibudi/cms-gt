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
              <h3 class="box-title">Create Image</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control @error('alt') is-invalid @enderror" value="{{old('alt')}}" required name="alt" id="exampleInputEmail1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" class="form-control @error('path') is-invalid @enderror" value="{{old('path')}}" required name="path" id="exampleInputEmail1" placeholder="Slug">
                </div>
                 @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
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
@endsection