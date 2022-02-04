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
              <h3 class="box-title">Create Topic</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('topic.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Name">
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  {{-- <input type="text" class="form-control" name="description" id="exampleInputEmail1" placeholder="Description"> --}}
                <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" name="image" id="exampleInputEmail1" accept="image/*" onchange="openFile(event)" placeholder="Roles">
                  <img id='output' style="height:100px; width:100px;">
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
               $("#menu-tag").addClass("active");
        </script>

  <script>
          var openFile = function(file) {
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
      </script>
  @endpush
@endsection