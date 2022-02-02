@extends('template.master')
@section('content')
      <!-- Content Header (Page header) -->
    
    <!-- Main content -->
      <section class="content container-fluid">
        <div class="box box-default">
    <div class="box-header with-border">
        <a data-module="hops-id_gallery_photo/add" href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Gallery</a>
        <div class="pull-right">
            <div class="has-feedback">
                <input id="input_search" type="text" class="form-control input-sm" placeholder="Search..." data-url="" data-query-string="" value="">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </div>
    </div>
    <div class="box-header with-border">
        <a href="{{ route('galeri.index') }}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
        <div class="pull-right">
                    </div>
    </div>
    <div class="box-body no-padding">
        <div class="row">
                    </div>
    </div>
    <div class="box-footer">
        <label>Data is not found</label>
        <div class="pull-right">
                    </div>
    </div>
</div>
    </section>
    <!-- /.content -->
    @include('sweetalert::alert')
    @push('js')
        <script>
               $("#menu-image").addClass("active");
        </script>
    @endpush
@endsection