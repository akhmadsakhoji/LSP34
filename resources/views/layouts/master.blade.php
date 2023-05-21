<!DOCTYPE html>
<html>
@include('layouts.partials._header')

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layouts.partials._navbar')
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        @include('layouts.partials._sidebar')
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Blank page
                    <small>it all starts here</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials._footer')

        <!-- Control Sidebar -->
        @include('layouts.partials._asidecontrol')
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @include('layouts.partials._script')
</body>

</html>
