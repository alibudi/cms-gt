@extends('template.master')
@section('content')
      <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="{{ route('role.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> New Article</a></h3>

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
                  <th>Name</th>
                  <th>Slug</th>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($categori as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td></td>
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
               $("#menu-categori").addClass("active");
        </script>
    @endpush
@endsection