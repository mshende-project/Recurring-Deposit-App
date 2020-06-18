<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/plugins/fontawesome-free/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    @yield('stylesheets')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('partials.sidebar')
        @yield('content')
    </div>

    <script src="{{ asset('/bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>
    <script>
      $(function () {
        $('.select2').select2();
        $('#nameselect').addClass('invisible');
        $('#pendingsection').hide();
        $('#domsection').hide();
        $('#users').DataTable();
        $('#accountholders').DataTable({
          "paging": false,
          "ordering": false,
          "searching": false,
          "info": false,
        });

        $('#dop, #dob, #dom, #start_date, #end_date').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          format: 'yyyy-mm-dd',
        });

        $('#dop').change(function() {

          var current_date = new Date($('#dop').val());
          var do_maturity = new Date(current_date.getFullYear()+5, current_date.getMonth(),current_date.getDate());
          var d = do_maturity.toISOString().slice(0, 10).split('-');   
          var date = d[1] +'/'+ d[2] +'/'+ d[0]; // 10/30/2010
          $('#dom').val(date);
        
        });

        $('#pan_card').change(function() {
          if($(this).is(':checked')) {
            $('.pan_card input[type=text]').removeClass('invisible');
          }else {
            $('.pan_card input[type=text').val('');
            $('.pan_card input[type=text]').addClass('invisible');
          }
        });

        $('#election_card').change(function() {
          if($(this).is(':checked')) {
            $('.election_card input[type=text]').removeClass('invisible');
          }else {
            $('.election_card input[type=text').val('');
            $('.election_card input[type=text]').addClass('invisible');
          }
        });

        $('#adhar_card').change(function() {
          if($(this).is(':checked')) {
            $('.adhar_card input[type=text]').removeClass('invisible');
          }else {
            $('.adhar_card input[type=text').val('');
            $('.adhar_card input[type=text]').addClass('invisible');
          }
        });

        $('#link_account').change(function() {
          if($(this).is(':checked')) {
            $('#nameselect').removeClass('invisible');
          }else {
            $('#nameselect').addClass('invisible');
          }
        });

        $('.delete-user').click('submit', function(e) {
          var userID = $(this).attr('data-userid');
          $('#user_id').val(userID);
          $('#destroy-modal').modal('show');
        });

        $('#date_of_opening').click(function() {
          $('#dopsection').show();
          $('#domsection').hide();

          var sdate = $('#start_date').val();
          var start_date = sdate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
          var edate = $('#end_date').val();
          var end_date = edate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

          if ($.fn.DataTable.isDataTable('#dop')) {
              $('#dop').dataTable().fnClearTable();
              $('#dop').dataTable().fnDestroy();
          }

          if(start_date != '' && end_date != '') {
            dop_data(start_date, end_date);
          }else{
            alert("Both dates are required");
          }

        });

        $('#date_of_maturity').click(function() {
          $('#dopsection').hide();
          $('#domsection').show();

          var sdate = $('#start_date').val();
          var start_date = sdate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
          var edate = $('#end_date').val();
          var end_date = edate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

          if ($.fn.DataTable.isDataTable('#dom')) {
              $('#dom').dataTable().fnClearTable();
              $('#dom').dataTable().fnDestroy();
          }

          if(start_date != '' && end_date != '') {
            dom_data(start_date, end_date);
          }else{
            alert("Both dates are required");
          }

        });

        $('#filter').click(function() {

          $('#pendingsection').hide();
          $('#completesection').show();

          var sdate = $('#start_date').val();
          var start_date = sdate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
          var edate = $('#end_date').val();
          var end_date = edate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

          if ($.fn.DataTable.isDataTable('#collection')) {
              $('#collection').dataTable().fnClearTable();
              $('#collection').dataTable().fnDestroy();
          }

          if(start_date != '' && end_date != '') {
            load_data(start_date, end_date);
          }else{
            alert("Both dates are required");
          }

        });

        $('#pendingusers').click(function() {
          $('#completesection').hide();
          $('#pendingsection').show();

          var sdate = $('#start_date').val();
          var start_date = sdate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
          var edate = $('#end_date').val();
          var end_date = edate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

          if ($.fn.DataTable.isDataTable('#pending_users')) {
              $('#pending_users').dataTable().fnClearTable();
              $('#pending_users').dataTable().fnDestroy();
          }

          if(start_date != '' && end_date != '') {
            pending_data(start_date, end_date);
          }else{
            alert("Both dates are required");
          }
        });

        function dop_data(start_date = '', end_date = '') {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#dop').DataTable({
              processing: false,
              serverSide: true,
              ajax: {
                  url: "{{ route('dailycollections.dopData') }}",
                  data: {
                      start_date: start_date,
                      end_date: end_date

                  },
                  method: 'POST'
              },
              columns: [
                {data: 'name', name: 'name'},
                {data: 'dop', name: 'dop',
                  "render": function (dop) {
                        var date = new Date(dop);
                        var month = date.getMonth() + 1;
                        return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                    }
                }
              ],
          });
        }

        function dom_data(start_date = '', end_date = '') {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#dom').DataTable({
              processing: false,
              serverSide: true,
              ajax: {
                  url: "{{ route('dailycollections.domData') }}",
                  data: {
                      start_date: start_date,
                      end_date: end_date

                  },
                  method: 'POST'
              },
              columns: [
                {data: 'name', name: 'name'},
                {data: 'dom', name: 'dom',
                  "render": function (dom) {
                        var date = new Date(dom);
                        var month = date.getMonth() + 1;
                        return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                    }
                }
              ],
          });
        }

        function load_data(start_date ='', end_date='') {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#collection').DataTable({
              processing: true,
              serverSide: false,
              ajax: {
                  url: "{{ route('dailycollections.collected') }}",
                  data: {
                      start_date: start_date,
                      end_date: end_date

                  },
                  method: 'POST'
              },
              columns: [
                {data: 'name', name: 'name'},
                {data: 'rupees', name: 'rupees'},
                {data: 'date', name: 'date',
                  "render": function (data) {
                        var date = new Date(data);
                        var month = date.getMonth() + 1;
                        return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                    }
                }
              ],
              dom: 'lBfrtip',
              buttons: [{
                  extend: 'excel',
                  text: 'Export to Excel <i class="fas fa-download"></i>',
                  "className": 'btn btn-primary btn-xs',
                  filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'Monthly_Collection' + n;
                  }
              }],
              "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
              "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
     
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
     
                // Total over all pages
                total = api
                    .column( 1 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Total over this page
                pageTotal = api
                    .column( 1, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Update footer
                $( api.column( 1 ).footer() ).html(
                    'Total - ' + pageTotal + '/-'
                );
              }
          });
        }

        function pending_data(start_date ='', end_date='') {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#pending_users').DataTable({
              processing: true,
              serverSide: false,
              ajax: {
                  url: "{{ route('dailycollections.pending') }}",
                  data: {
                      start_date: start_date,
                      end_date: end_date

                  },
                  method: 'POST'
              },
              columns: [
                {data: 'name', name: 'name'},
              ],
              dom: 'lBfrtip',
              buttons: [{
                  extend: 'excel',
                  text: 'Export to Excel <i class="fas fa-download"></i>',
                  "className": 'btn btn-primary btn-xs',
                  filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'Monthly_Pending_Users_' + n;
                  }
              }],
              "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          });
        }

        $('#show-user').click('submit', function(e) {
          e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          jQuery.ajax({
                  url: "{{ url('/checkUser') }}",
                  method: 'post',
                  data: {
                     user_id: jQuery('#user_id').val(),
                     rd_acc_no: jQuery('#rd_acc_no').val(),
                  },
                  success: function(result){
                    if(result.errors)
                    {
                      jQuery('.alert-danger').show();
                      jQuery('.alert-danger').html(result.errors);
                    } else {
                      jQuery('.alert-danger').hide();
                      var data = result.success;

                      $('#user-modal').modal('hide');
                      $('#show-user-details').modal('show');
                      
                      $('#name').html(data.name);
                      $('#acc_no').html(data.rd_acc_no);
                      $('#nominee').html(data.nominee);

                      if(data.remark_kyc) {
                        $('#remark_kyc').html(data.remark_kyc);  
                      }else {
                        $('#remark_kyc').html("NULL");
                      }

                      if(data.mobile_no) {
                        $('#mobile_no').html(data.mobile_no);
                      }else {
                        $('#mobile_no').html("NULL");
                      }
                      
                      $('#address').html(data.address);
                      $('#dop').html(data.dop);
                      $('#dom').html(data.dom);
                      $('#as_card_no').html(data.as_card_no);
                      $('#rupees').html(data.rupees);
                    }
                  }
            });
        });

        $('#linkaccount').click('submit', function(e) {
          
          e.preventDefault();
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          jQuery.ajax({
                url: "{{ url('/linkaccount') }}",
                method: 'post',
                data: {
                  rd_acc_no: $('#rd_acc_no').val(),
                  user_id: $('#user_id').val(),
                },
                success: function(result) {
                  console.log(result);
                    if(result.errors)
                    {
                      jQuery('.alert-danger').show();
                      jQuery('.alert-danger').html(result.errors);
                    } else {
                      jQuery('.alert-success').show();
                      jQuery('.alert-success').html(result.success);
                    }
                }
          });
        });

      });
    </script>
    @yield('scripts')
</body>

</html>