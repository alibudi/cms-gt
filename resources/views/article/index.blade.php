@extends('template.master')
@section('content')
      <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="{{ route('article.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> New Article</a></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Rubrik</th>
                  <th>Author</th>
                  <th>Editor</th>
                  <th>Date Created</th>
                  {{-- <th>Publish Date</th> --}}
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($article as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                          <form action="{{ route('article.destroy',$item->id) }}" method="POST"> 
                              <a class="btn btn-primary btn-xs" href="{{ route('article.edit',$item->id) }}"><i class="fa fa-pencil"></i></a> 
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    @include('sweetalert::alert')
    @push('js')
        <script>
               $("#menu-editor").addClass("active");
               $("#menu-article").addClass("active");
        </script>
    @endpush
@endsection