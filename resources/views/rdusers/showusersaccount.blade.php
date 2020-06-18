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
            <div class="card-body row">
              <div class="form-group col-md-6">
                    <label for="name">Name :</label>
                    {{ $existinguser->name }}
                  </div>
              
              <div class="form-group col-md-6">
                    <label for="address">Address :</label>
                    {{ $existinguser->address }}
                  </div>
              </div>
            </div>
              <table id="accountholders" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>RD Account No.</th>
                  <th>Denomination Rupees</th>
                  <th>Date of opening</th>
                  <th>Date of maturity</th>
                  <th>Remarks</th>
                </tr>
                </thead>
                <tbody>              
                  @foreach ($accounts as $value)
                  <tr>
                    <td>{{ $value->rd_acc_no }}</td>
                    <td>{{ $value->rupees }}</td>
                    <td>{{ $value->dop }}</td>
                    <td>{{ $value->dom }}</td>
                    <td>{{ $value->remark_kyc ? $value->remark_kyc : 'NULL' }}</td>
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