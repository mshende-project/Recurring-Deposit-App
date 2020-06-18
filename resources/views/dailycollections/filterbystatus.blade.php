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
            <!-- <h1>Add User</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Filter users</li>
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
              <!-- /.card-header -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.row -->
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
              <button type="button" name="filter" id="filter" class="btn btn-sm btn-outline-success">Collected</button>
              <button type="button" name="pendingusers" id="pendingusers" class="btn btn-sm btn-outline-primary">Collection Pending</button>
              <!-- <button type="button" name="refresh" id="refresh" class="btn btn-sm btn-outline-danger">Refresh</button> -->
          </div>

          <div class="col-12" style="margin-top: 2%;" id="completesection">

            <table id="collection" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Rupees</th>
                <th>Date</th>
              </tr>
              </thead>
              <tbody>              
                <tr>
                  <td colspan="3" align="center">
                    No data available
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td id="total" colspan="3" style="text-align: center;"></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="col-12" id="pendingsection" style="margin-top: 2%;">
            <table id="pending_users" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
              </tr>
              </thead>
              <tbody>              
                <td colspan="3" align="center">
                  No data available
                </td>
              </tbody>
            </table>
          </div>

      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
@endsection