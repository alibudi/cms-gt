@extends('template.master')
@section('header-js')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        
            <div class="form-group pull-left">
                {{-- <label class="btn btn-sm btn-default"> --}}
                 
                {{-- <input type="file" name="path" style="display: none !important;" > --}}
                {{-- <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-image"><i class="fa fa-plus"></i> Upload Files</button> --}}
            {{-- </label> --}}
            
            {{-- <a href="{{ route('photo') }}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</a> --}}
        </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="row">
        <form method="POST" action="{{ route('galeri.update',$images->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control @error('alt') is-invalid @enderror" value="{{$images->alt}}" required name="alt" id="exampleInputEmail1" placeholder="Name">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file"  class="form-control" value="{{ $images->path }}" required name="path" accept="image/*" onchange="openFile(event)">
                    {{-- <img src="{{URL::to('/')}}/img/article/thumbnail/{{ $images->path }}" alt=""> --}}
                <img id='output' style="height:100px; width:100px;">
                <img src="{{URL::to('/')}}/img/article/thumbnail/{{ $images->path }}" style="height:100px; width:100px;">
                </div>
                 @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
              </div>
              <!-- /.box-body -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{-- {{ $photo->links('pagination::bootstrap-4') }} --}}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  @push('js')
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