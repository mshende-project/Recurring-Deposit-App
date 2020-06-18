@extends('master')

@section('title', 'Add User')

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
              <li class="breadcrumb-item active">Add User</li>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('rdusers.store') }}" id="add-user">
                @csrf
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Enter address">{{ old('address') }}</textarea>
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rd_acc_no">RD account no</label>
                    <input type="number" class="form-control" id="rd_acc_no" name="rd_acc_no" placeholder="Enter RD account no." value="{{ old('rd_acc_no') }}">
                    @if ($errors->has('rd_acc_no'))
                        <span class="text-danger">{{ $errors->first('rd_acc_no') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="as_card_no">AS card no</label>
                    <input type="text" class="form-control" id="as_card_no" name="as_card_no" placeholder="Enter AS card no" value="{{ old('as_card_no') }}">
                    @if ($errors->has('as_card_no'))
                        <span class="text-danger">{{ $errors->first('as_card_no') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dop">Date of opening</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="dop" name="dop" placeholder="Select date of opening" value="{{ old('dop') }}">
                        @if ($errors->has('dop'))
                            <span class="text-danger">{{ $errors->first('dop') }}</span>
                        @endif
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dom">Date of maturity</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="dom" name="dom" placeholder="Select date of maturity" value="{{ old('dom') }}">
                        @if ($errors->has('dom'))
                            <span class="text-danger">{{ $errors->first('dom') }}</span>
                        @endif
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rupees">Rupees/Month</label>
                    <input type="text" class="form-control" id="rupees" name="rupees" placeholder="Enter amount in rupees" value="{{ old('rupees') }}">
                    @if ($errors->has('rupees'))
                        <span class="text-danger">{{ $errors->first('rupees') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobile_no">Mobile number</label>
                    <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter mobile no" value="{{ old('mobile_no') }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dob">Date of birth</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="dob" name="dob" placeholder="Select date of birth" value="{{ old('dob') }}">
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nominee">Nominee</label>
                    <input type="text" class="form-control" id="nominee" name="nominee" placeholder="Enter nominee name" value="{{ old('nominee') }}">
                  </div>
                  <hr class="col-md-11" style="border-top: 1px solid black !important;">

                  <div class="form-group col-md-6">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="remark_kyc">Remark KYC</label>
                        <input type="text" class="form-control" id="remark_kyc" name="remark_kyc" placeholder="Enter remark KYC" value="{{ old('remark_kyc') }}">
                        @if ($errors->has('remark_kyc'))
                            <span class="text-danger">{{ $errors->first('remark_kyc') }}</span>
                        @endif
                      </div>
                      <div class="form-group col-md-12">
                        <label>Account Link</label>

                        <div class="custom-control custom-checkbox row">
                          <div class="col-md-12">
                            <input type="checkbox" class="custom-control-input" name="link_account_check" id="link_account">
                            <label class="custom-control-label" for="link_account">Link this to existing account</label>
                            <div id="nameselect">
                            <select class="form-control select2" name="user_id" style="width: 100%;">
                              <option selected="selected" value="">-- Select --</option>
                                @foreach($users as $user)
                                  <option value="{{$user['user_id']}}">{{$user['name']}}
                                  </option>
                                @endforeach
                            </select>
                          </div>
                            @if ($errors->has('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <label>Select card</label><br>

                      <div class="custom-control custom-checkbox row">
                          <div class="col-md-6 pan_card">
                            <input type="checkbox" class="custom-control-input" name="pan_card_check" id="pan_card">
                            <label class="custom-control-label" for="pan_card">Pan card</label>
                            <input type="text" name="pan_card" class="form-control invisible" placeholder="Enter pan card no" value="{{ old('pan_card') }}">
                            @if ($errors->has('pan_card'))
                                <span class="text-danger">{{ $errors->first('pan_card') }}</span>
                            @endif
                          </div>
                      </div>
                      
                      <div class="custom-control custom-checkbox row">
                        <div class="col-md-6 election_card">
                          <input type="checkbox" class="custom-control-input" id="election_card" name="election_card_check">
                          <label class="custom-control-label" for="election_card">Election card</label>
                          <input type="text" name="election_card" class="form-control invisible" placeholder="Enter election card no" value="{{ old('election_card') }}">
                          @if ($errors->has('election_card'))
                              <span class="text-danger">{{ $errors->first('election_card') }}</span>
                          @endif
                        </div>
                      </div>
                      
                      <div class="custom-control custom-checkbox row">
                        <div class="col-md-6 adhar_card">
                          <input type="checkbox" class="custom-control-input" id="adhar_card" name="adhar_card_check">
                          <label class="custom-control-label" for="adhar_card">Adhar card</label>
                          <input type="text" name="adhar_card" class="form-control invisible" placeholder="Enter adhar card no" value="{{ old('adhar_card') }}">
                          @if ($errors->has('adhar_card'))
                              <span class="text-danger">{{ $errors->first('adhar_card') }}</span>
                          @endif
                        </div>
                      </div>

                    </div>
                  </div>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection