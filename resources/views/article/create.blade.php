@extends('template.master')
@section('header-js')
     <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
@endsection
@section('content')
            <!-- Main content -->

    <section class="content">
      <div class="box box-default" data-select2-id="16">
        <div class="box-header with-border">
          <h3 class="box-title">Create Article</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        
 
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              <form action="{{ route('article.store') }}" method="POST">
        @csrf
            <div class="col-md-8">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title . . .">
            </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" id="editor" placeholder="Enter the Content" name="content"></textarea>
            </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Rubrik</label>
               <select name="id_channel" id="" class="form-control">
                      <option value="">--Pilih Rubrik--</option>
                      @foreach ($categories as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
            </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" cols="20" rows="10"></textarea>    
            </div>
              <!-- /.form-group -->
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tags[]" id="tag" class="form-control select2 @error('tags') is-invalid @enderror" required multiple>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
                </div>
              <!-- /.form-group -->
               <div class="form-group">
                <label>Author</label>
                <input type="text" name="id_author" class="form-control">
                <input type="hidden" name="status" value="1">
            </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <button type="submit" value="submit" class="btn_save btn btn-sm btn-default"><i class="fa fa-save"></i> Save</button>
            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box box-default">
                <div class="box-body">
                    {{-- <button type="button" class="btn_publish btn btn-sm btn-success" data-idle="<i class='fa fa-send'></i> Publish"><i class="fa fa-send"></i>
                        Publish</button> --}}
                    <button type="submit" class="btn_save btn btn-sm btn-default"><i class="fa fa-save"></i> Save</button>
                    <div class="pull-right">
                        <button type="button" class="btn_close btn btn-sm btn-danger"><i class="fa fa-close"></i> Close</button>
                    </div>
                </div>
            </div>
      </div>
             
      <!-- /.row -->
    </section>

            <!-- /.content -->
     
     @push('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        @include('template.ckeditor')
        <script>
               $("#menu-editor").addClass("active");
               $("#menu-article").addClass("active");
        </script>

     @endpush
@endsection