@extends('template.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/select2/dist/css/select2.min.css') }}">
@endsection
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
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{old('title')}}" required  placeholder="Enter Title . . .">
                  @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
            </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control  @error('content') is-invalid @enderror"  value="{{old('content')}}"  id="editor" placeholder="Enter the Content" name="content"></textarea>
                   @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
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
                <textarea name="description" class="form-control   @error('description') is-invalid @enderror"  value="{{old('description')}}"  cols="5" rows="5"></textarea>    
                  @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
            </div>
              <!-- /.form-group -->
                 <div class="form-group">
                    <label for="tag">Tags</label>
                         <select class="tags form-control  select2" multiple="multiple" name="tags[]"></select>
                    {{-- <select name="tags[]" id="tag" class="livesearch  form-control select2 @error('tags') is-invalid @enderror" required multiple> --}}
                        {{-- @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach --}}
                    </select>
                    @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
                </div>
              <!-- /.form-group -->
               <div class="form-group">
                    <label for="tag">Author</label>
                    <select name="author[]" id="author" class="form-control select2 @error('author') is-invalid @enderror" required multiple>
                        @foreach ($author as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>
                    @enderror
                </div>
             
              <!-- /.form-group -->
                 {{-- <button type="submit"  class="btn btn-primary">Submit</button> --}}
                 <input type="submit" class="btn btn-primary" name="publish" value="Publish ">
                <input type="submit" class="btn btn-success" name="save" value="Save">
            </div>
            <!-- /.col -->
        
            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
             
      <!-- /.row -->
    </section>

            <!-- /.content -->
     
     @push('js')
            {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        @include('template.ckeditor') --}}
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <!-- Select2 -->
<script src="{{ asset('admin/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
    CKEDITOR.replace('editor', options);
    </script>

        <script>
               $("#menu-editor").addClass("active");
               $("#menu-create-article").addClass("active");
        </script>
  <script type="text/javascript">
    $('.tags').select2({
      // theme: 'bootstrap4',
        placeholder: 'Select Tags',
        ajax: {
            url: '{{ route('post.autocomplete') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
     @endpush
@endsection