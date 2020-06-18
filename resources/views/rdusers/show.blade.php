@extends('master')

@section('title', 'User Detail')

@section('content')
<!-- Content Wrapper. Contains page content -->
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
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9"></div>
          <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-modal">
              Link Other Accounts
            </button>
          </div>
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label for="name">Name :</label>
                    {{ $user['name'] ? $user['name'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rd_account_no">RD account no :</label>
                    {{ $user['rd_acc_no'] ? $user['rd_acc_no'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address :</label>
                    {{ $user['address'] ? $user['address'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dop">Date of opening :</label>
                    {{ $user['dop'] ? $user['dop'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rupees">Rupees :</label>
                    {{ $user['rupees'] ? $user['rupees'] : 'NULL' }} /-
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nominee">Nominee :</label>
                    {{ $user['nominee'] ? $user['nominee'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="as_card_no">AS card no. :</label>
                    {{ $user['as_card_no'] ? $user['as_card_no'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dom_aturity">Date of maturity :</label>
                    {{ $user['dom'] ? $user['dom'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="remark_kyc">Remark KYC :</label>
                    {{ $user['remark_kyc'] ? $user['remark_kyc'] : 'NULL'}}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="pan_no">Pan no :</label>
                    {{ $user['pan_no'] ? $user['pan_no'] : 'NULL'}}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="election_card_no">Election card no :</label>
                    {{ $user['election_card_no'] ? $user['election_card_no'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="adhar_card_no">Adhar card no :</label>
                    {{ $user['adhar_card_no'] ? $user['adhar_card_no'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobile_no">Mobile no :</label>
                    {{ $user['mobile_no'] ? $user['mobile_no'] : 'NULL' }}
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dob">Date of birth :</label>
                    {{ $user['dob'] ? $user['dob'] : 'NULL' }}
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
            <div class="modal fade" id="user-modal">
              <div class="modal-dialog">
                <div class="modal-content">
              <div class="alert alert-danger" style="display:none"></div>
              <div class="modal-header">
                <h4 class="modal-title">Link accounts</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('checkUser') }}" method="POST">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Select account no.</label>
                            <select class="form-control select2" id="rd_acc_no" style="width: 100%;">
                              <option selected="selected" value="">-- Select --</option>
                                @foreach($accounts as $account)
                                  <option value="{{ $account->rd_acc_no }}">{{$account->rd_acc_no}}
                                  </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user['id'] }}">
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="show-user">Show user details</button>
              </div>
                </div>
                <!-- /.modal-content -->
              </div>
            <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="show-user-details">
              <div class="modal-dialog modal-lg" style="left:88px;">
                <div class="modal-content">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="alert alert-success" style="display:none"></div>
                  <div class="modal-header">
                    <h4 class="modal-title">User details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('linkaccount', ['user_id' => $user['id']]) }}" method="POST">
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="name">Name :</label>
                              <span id="name"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="acc_no">RD acc no :</label>
                              <span id="acc_no"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="address">Address :</label>
                              <span id="address"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="dop">Date of opening :</label>
                              <span id="dop"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="dom">Date of maturity :</label>
                              <span id="dom"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="rupees">Rupees/month :</label>
                              <span id="rupees"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="nominee">Nominee :</label>
                              <span id="nominee"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="as_card_no">AS card no :</label>
                              <span id="as_card_no"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="remark_kyc">Remark KYC :</label>
                              <span id="remark_kyc"></span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="mobile_no">Mobile no :</label>
                              <span id="mobile_no"></span>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="linkaccount">Link this account to current account</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.row -->
        

      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
@endsection