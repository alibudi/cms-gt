@include('template.head')
     
     <!-- Main Header -->
      @include('template.header')
        <!-- Left side column. contains the logo and sidebar -->
      @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
      @include('template.footer')



