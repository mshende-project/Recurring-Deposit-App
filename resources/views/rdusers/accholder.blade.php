@extends('master')

@section('title', 'Account Holder Details')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>User Details</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Account Holders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Account No.</th>
                  <th>Name</th>
                  <th>Rupees</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>      
                  @foreach ($accholder as $value)
                  <tr>
                    <td>{{ $value->rd_acc_no }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->rupees }}</td>
                    <td><a href="{{ route('showaccounts', $value->id) }}"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-eye"></i></button></a></td>
                  </tr>
                  @endforeach                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection