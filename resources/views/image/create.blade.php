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
            
             <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-image"><i class="fa fa-plus"></i> Add Foto</button>
 {{-- modal --}}
      <div class="modal fade" id="modal-image">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
            <iframe id="general-modal-iframe" scrolling="no" frameborder="0" width="100%" height="1000" src="{{ route('photo-frame') }}"></iframe>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
     
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection