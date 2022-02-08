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
                <a href="{{ route('videos.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>New Video </a>
                {{-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-image"><i class="fa fa-plus"></i> New Video</button> --}}
            {{-- </label> --}}
            
            <a href="" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
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
            {{-- @foreach ($photo as $item) --}}
                <div id="photo-2139369" class="photo-list pull-left">
                <div style="margin-left:15px;margin-bottom:15px;position:relative">
                    <div class="img-thumbnail overlay-wrapper">
                        {{-- <img src="{{URL::to('/')}}/img/article/thumbnail/{{ $item->path }}" alt="Ilustrasi orang duduk di kursi." title="Ilustrasi orang duduk di kursi." class="img-responsive" style="width:214px;height:95px"> --}}
                        <div style="margin-top:5px">
                            {{-- <small title="{{ $item->alt }}">{{ $item->alt }}</small><br> --}}
                            {{-- <strong><small title="{{ $item->alt }}">by: Rahajeng Pramesi</small></strong> --}}
                            {{-- <br><small title="Ayo Yogya">Ayo Yogya</small> --}}
                            <div class="pull-right">
                                 <form action="" method="POST"> 
                              <a class="btn btn-primary btn-xs" href=""><i class="fa fa-pencil"></i></a> 
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                          </form>
                            </div>

                           
                        </div>
                    </div>
                </div>

            </div>
            {{-- @endforeach --}}
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{-- {{ $photo->links('pagination::bootstrap-4') }} --}}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      {{-- modal --}}
      <div class="modal fade" id="modal-image">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
              <div class="modal-body">
               <form method="POST" action="" enctype="multipart/form-data">
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
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

         
    </section>
    <!-- /.content -->
    @push('js')
        <script>
        $("#path").change(function(){
            $.ajax({
                type: "POST",
                data: $('#form-image').serialize(),
                url: "{{ route('galeri.store') }}",
                success:function(data){
                    window.location.href = window.location.href;
                },

            });
        });
    </script>
    @endpush
@endsection