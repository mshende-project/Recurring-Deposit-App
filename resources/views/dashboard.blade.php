@extends('master')

@section('title', 'Dashboard')

@section('content')

<!-- Site wrapper -->
<!-- <div class="wrapper"> -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $count }}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-fw fa-users fa-xs"></i>
              </div>
              <a href="{{ route('rdusers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $acc_holder_count }}<sup style="font-size: 20px"></sup></h3>

                <p>Account Holder Details</p>
              </div>
              <div class="icon">
                <i class="fa fa-fw fa-file fa-xs"></i>
              </div>
              <a href="{{ route('accholder') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="invisible">244<sup style="font-size: 20px"></sup></h3>

                <p>Daily Collections</p>
              </div>
              <div class="icon">
                <i class="fa fa-fw fa-plus-circle fa-xs"></i>
              </div>
              <a href="{{ route('dailycollection.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="invisible">244<sup style="font-size: 20px"></sup></h3>

                <p>Filter By Date</p>
              </div>
              <div class="icon">
                <i class="fa fa-fw fa-filter fa-xs"></i>
              </div>
              <a href="{{ route('dailycollections.date') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- </div> -->
<!-- ./wrapper -->

@endsection