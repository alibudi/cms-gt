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
        <div class="box-header">
            <label for="">Headline</label>
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
        <form id="form_data" method="post">
        <div class="row">            
                        
                <div class="col-md-3">                    
                    <div class="form-group thumbnail" style="min-height: 180px;overflow: hidden;">
                        <label>Headline 1</label>    
                                                
                        <img id="imgheadline1" src="https://assets.promediateknologi.com/crop/0x0:0x0/220x140/photo/2022/02/13/4070221226.jpeg" class="img-responsive" width="100%" title="Kekey anak Wenny Ariani dapat Rp350 juta dari YouTuber ini, usai Rezky Aditya terbukti bukan ayah ka" style="height:140px !important">
                        <input id="hdheadline1" type="hidden" name="hdHeadline[]" value="2668025">    
                        <input id="txtheadline1" type="text" class="form-control" name="title[]" title="Kekey anak Wenny Ariani dapat Rp350 juta dari YouTuber ini, usai Rezky Aditya terbukti bukan ayah ka" value="Kekey anak Wenny Ariani dapat Rp350 juta dari YouTuber ini, usai Rezky Aditya terbukti bukan ayah ka" readonly="">
                        <div style="position:absolute;top:30px;right:20px">                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-choice btn-dialog btn-flat btn-sm" data-title="Select Headline" data-url="https://editor.promediateknologi.com/hops-id/index/2?popup=1&amp;module=headline&amp;no=1"><i class="fa fa-external-link"></i> Choice</button>
                                <button type="button" onclick="return delete_headline(this)" class="btn btn-danger btn-flat btn-sm" data-no="1"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="col-md-3">                    
                    <div class="form-group thumbnail" style="min-height: 180px;overflow: hidden;">
                        <label>Headline 2</label>    
                                                
                        <img id="imgheadline2" src="https://assets.promediateknologi.com/crop/0x0:0x0/220x140/photo/2022/01/10/1404192203.jpg" class="img-responsive" width="100%" title="Babe Haikal nyebong, Gus Nur: Jadi ingat Ahok dulu, dendam setengah mati ke Jenderal Dudung" style="height:140px !important">
                        <input id="hdheadline2" type="hidden" name="hdHeadline[]" value="2668761">    
                        <input id="txtheadline2" type="text" class="form-control" name="title[]" title="Babe Haikal nyebong, Gus Nur: Jadi ingat Ahok dulu, dendam setengah mati ke Jenderal Dudung" value="Babe Haikal nyebong, Gus Nur: Jadi ingat Ahok dulu, dendam setengah mati ke Jenderal Dudung" readonly="">
                        <div style="position:absolute;top:30px;right:20px">                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-choice btn-dialog btn-flat btn-sm" data-title="Select Headline" data-url="https://editor.promediateknologi.com/hops-id/index/2?popup=1&amp;module=headline&amp;no=2"><i class="fa fa-external-link"></i> Choice</button>
                                <button type="button" onclick="return delete_headline(this)" class="btn btn-danger btn-flat btn-sm" data-no="2"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="col-md-3">                    
                    <div class="form-group thumbnail" style="min-height: 180px;overflow: hidden;">
                        <label>Headline 3</label>    
                                                
                        <img id="imgheadline3" src="https://assets.promediateknologi.com/crop/0x0:0x0/220x140/photo/2022/02/13/86443715.jpeg" class="img-responsive" width="100%" title="Dihamili Anji tanpa menikah, gini cara Sheila Marcia jelaskan ke anak tentang masa lalunya" style="height:140px !important">
                        <input id="hdheadline3" type="hidden" name="hdHeadline[]" value="2668321">    
                        <input id="txtheadline3" type="text" class="form-control" name="title[]" title="Dihamili Anji tanpa menikah, gini cara Sheila Marcia jelaskan ke anak tentang masa lalunya" value="Dihamili Anji tanpa menikah, gini cara Sheila Marcia jelaskan ke anak tentang masa lalunya" readonly="">
                        <div style="position:absolute;top:30px;right:20px">                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-choice btn-dialog btn-flat btn-sm" data-title="Select Headline" data-url="https://editor.promediateknologi.com/hops-id/index/2?popup=1&amp;module=headline&amp;no=3"><i class="fa fa-external-link"></i> Choice</button>
                                <button type="button" onclick="return delete_headline(this)" class="btn btn-danger btn-flat btn-sm" data-no="3"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="col-md-3">                    
                    <div class="form-group thumbnail" style="min-height: 180px;overflow: hidden;">
                        <label>Headline 4</label>    
                                                
                        <img id="imgheadline4" src="https://assets.promediateknologi.com/crop/82x0:754x394/220x140/photo/2022/02/13/978760030.png" class="img-responsive" width="100%" title="Jenderal Dudung temui Habib Luthfi dan Hendropriyono bicara intoleransi, soal laporan Tuhan bukan or" style="height:140px !important">
                        <input id="hdheadline4" type="hidden" name="hdHeadline[]" value="2670093">    
                        <input id="txtheadline4" type="text" class="form-control" name="title[]" title="Jenderal Dudung temui Habib Luthfi dan Hendropriyono bicara intoleransi, soal laporan Tuhan bukan or" value="Jenderal Dudung temui Habib Luthfi dan Hendropriyono bicara intoleransi, soal laporan Tuhan bukan or" readonly="">
                        <div style="position:absolute;top:30px;right:20px">                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-choice btn-dialog btn-flat btn-sm" data-title="Select Headline" data-url="https://editor.promediateknologi.com/hops-id/index/2?popup=1&amp;module=headline&amp;no=4"><i class="fa fa-external-link"></i> Choice</button>
                                <button type="button" onclick="return delete_headline(this)" class="btn btn-danger btn-flat btn-sm" data-no="4"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
        </form>
    </div>
        <!-- /.box-body -->
        {{-- <div class="box-footer">
          {{ $photo->links('pagination::bootstrap-4') }}
        </div> --}}
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
               <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
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
  
@endsection