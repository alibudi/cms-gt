@extends('template.master')
@section('content')
      <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $draft }}</h3>
            
                                <p>Draft</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clone"></i>
                            </div>
                          </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>0<sup style="font-size: 20px"></sup></h3>
            
                                <p>Schedule</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $publish }}</h3>
            
                                <p>Published</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>0</h3>
            
                                <p>Trash</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-trash"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
       
            
            </section>

    @push('js')
        <script>
            $("#menu-dashboard").addClass("active");
        </script>
    @endpush
@endsection