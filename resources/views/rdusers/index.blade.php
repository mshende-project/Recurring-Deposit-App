@extends('master')

@section('title', 'All Users')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
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
              <h3 class="card-title">User Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Account No.</th>
                  <th>Name</th>
                  <th>Rupees</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>              
                  @foreach ($users as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->rd_acc_no }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->rupees }}</td>
                    <td>
                      <a href="{{ route('rdusers.show', $value->id) }}"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-eye"></i></button></a>
                      <a href="#" id="">
                        <button type="button" class="btn btn-xs btn-danger delete-user" data-toggle="modal" data-target="#destroy-modal" data-userid="{{ $value->id }}"><i class="fa fa-fw fa-trash"></i></button>
                      </a>
                    </td>
                  </tr>
                  @endforeach                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="modal modal-danger fade" id="destroy-modal">
          <div class="modal-dialog">
            <div class="modal-content">
          <div class="alert alert-danger" style="display:none"></div>
          <div class="modal-header">
            <h4 class="modal-title">Delete Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('rdusers.destroy', 'delete') }}" method="POST">
            <div class="modal-body">
                {{method_field('delete')}}
                {{ csrf_field() }}
                  <div class="card-body">
                    <p class="text-center">
                      Are you sure you want to delete this user?
                    </p>
                    <input type="hidden" name="user_id" id="user_id">
                  </div>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger" id="delete-user">Yes, Delete</button>
            </div>
          </form>
            <!-- /.modal-content -->
          </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- </div> -->
<!-- ./wrapper -->
@endsection