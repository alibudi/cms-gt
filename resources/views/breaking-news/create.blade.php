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
              <h3 class="box-title">Create Breaking News</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('news.store') }}">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="exampleInputEmail1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">url</label>
                  <input type="text" class="form-control" name="url" value="{{ old('url') }}" id="exampleInputEmail1" placeholder="Slug">
                </div>
               
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