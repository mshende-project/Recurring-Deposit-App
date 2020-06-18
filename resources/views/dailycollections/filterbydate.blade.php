@extends('master')

@section('title', 'Daily collection')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add daily collection</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
              @elseif(session()->has('error'))
                  <div class="alert alert-danger">
                      {{ session()->get('error') }}
                  </div>
              @endif
              <div class="card-header">
                <h3 class="card-title float-left">Filter users</h3>
              </div>
              
            </div>

          </div>
          <div class="col-md-4">
            <div class="input-daterange">
              <label for="start_date">Select start date</label>
              <input type="text" class="form-control float-right" id="start_date" name="start_date" placeholder="Select start date" value="" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-daterange">
              <label for="end_date">Select end date</label>
              <input type="text" class="form-control float-right" id="end_date" name="end_date" placeholder="Select end date" value="" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4" style="padding-top: 3%;">
              <button type="button" name="filter" id="date_of_opening" class="btn btn-sm btn-outline-success">Date of opening</button>
              <button type="button" name="pendingusers" id="date_of_maturity" class="btn btn-sm btn-outline-primary">Date of maturity</button>
          </div>

          <div class="col-12" style="margin-top: 3%;" id="dopsection">

            <table id="dop" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Date of opening</th>
              </tr>
              </thead>
              <tbody>              
               
              </tbody>
            </table>
          </div>

          <div class="col-12" style="margin-top: 3%;" id="domsection">

            <table id="dom" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Date of maturity</th>
              </tr>
              </thead>
              <tbody>              
               
              </tbody>
            </table>
          </div>          

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
