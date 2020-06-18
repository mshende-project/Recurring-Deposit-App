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
                <h3 class="card-title float-left">Add daily collections</h3>
                <span class="float-right">
                  Date - {{ Carbon\Carbon::now()->format('d-m-Y') }}
                </span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('dailycollection.store') }}" id="daily-collection">
                @csrf
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label>Select User</label>
                    <select class="form-control select2" name="user_id" style="width: 100%;">
                      <option selected="selected" value="">-- Select --</option>
                        @foreach($users as $user)
                          <option value="{{ $user->user_id }}">{{$user->name}}
                          </option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Rupees/month</label>
                    <input type="text" class="form-control" id="rupees" name="rupees" placeholder="Enter rupees" value="{{ old('rupees') }}">
                    @if ($errors->has('rupees'))
                        <span class="text-danger">{{ $errors->first('rupees') }}</span>
                    @endif
                  </div>

                  <input type="hidden" name="date" value="{{ Carbon\Carbon::now() }}" id="date">
                
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.row -->
          
          <div class="col-12" style="margin-top: 3%;">

            <table id="users" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Rupees</th>
              </tr>
              </thead>
              <tbody>              
                @foreach($dailyusers as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->rupees }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td id="total" colspan="3" style="text-align: center;"></td>
                </tr>
              </tfoot>
            </table>
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection