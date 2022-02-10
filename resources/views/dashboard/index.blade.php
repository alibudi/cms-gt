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
                                <h3>53<sup style="font-size: 20px"></sup></h3>
            
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
                                <h3>65</h3>
            
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
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                            </div>
                        </div>
                        <!-- /.nav-tabs-custom -->
                   
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
            
                        <!-- Map box -->
                        <div class="box box-solid bg-light-blue-gradient">
                            <div class="box-header">
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    {{-- <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                                        title="Date range">
                                        <i class="fa fa-calendar"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                                        <i class="fa fa-minus"></i></button> --}}
                                </div>
                                <!-- /. tools -->
                        </div>
                        <!-- /.box -->
            
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            
            </section>

    @push('js')
        <script>
            $("#menu-dashboard").addClass("active");
        </script>
    @endpush
@endsection