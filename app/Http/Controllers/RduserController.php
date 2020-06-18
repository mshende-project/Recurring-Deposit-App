<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RdUser;
use Validator;
use App\AccountLink;
use Exception;
use Redirect;
use Illuminate\Support\Facades\DB;

class RduserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a list of users.
    * @return \Illuminate\Http\Response
    */
    public function index() {
        $users = RdUser::select('id', 'rd_acc_no', 'name', 'rupees')
                         ->withTrashed(false)
                         ->get();
        return view('rdusers.index')->with('users', $users);
    }

    /**
    * Show the dashboard
    * @return \Illuminate\Http\Response
    */
    public function dashboard() {

        $count = RdUser::count();
        $acc_holder_count = AccountLink::count();

        return view('dashboard')->with(compact('count', 'acc_holder_count'));
    
    }

    /**
    * Show the form for creating a new users.
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $users = AccountLink::select('id', 'name','user_id')
                         ->groupBy('user_id')
                         ->withTrashed(false)
                         ->get()
                         ->toArray();
                         
        return view('rdusers.create')->with('users', $users);
    }

    /**
    * Validate and Store a newly created users in database.
    * @param \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'rd_acc_no' => 'required|max:10',
            'as_card_no' => 'required',
            'dop' => 'required',
            'dom' => 'required',
            'rupees' => 'required',
            'remark_kyc' => 'required',
            'pan_card' => $request->has('pan_card_check') ? 'required' : '',
            'adhar_card' => $request->has('adhar_card_check') ? 'required' : '',
            'election_card' => $request->has('election_card_check') ? 'required' : '',
            'user_id' => $request->has('link_account_check') ? 'required' : '',
        ], 
        [
            'name.required' => 'Name is required',
            'address.required' => 'Address is required',
            'rd_acc_no.required' => 'RD account no is required',
            'as_card_no.required' => 'AS card no is required',
            'dop.required' => 'Date of opening is required',
            'dom.required' => 'Date of maturity is required',
            'rupees.required' => 'Rupees is required',
            'remark_kyc.required' => 'Remark KYC is required', 
            'pan_card.required' => 'Pan card no is required',
            'adhar_card.required' => 'Adahr card no is required',
            'election_card.required' => 'Election card no is required',
            'user_id.required' => 'Please select user to link the account',
        ]);

        if($request->has('link_account_check')) {
            $linkaccount = new AccountLink();
            $linkaccount->user_id = $request->user_id;
            $linkaccount->rd_acc_no = $request->rd_acc_no;
            $linkaccount->name = $request->name; 
            $linkaccount->address = $request->address;
            $linkaccount->rupees = $request->rupees;
            $linkaccount->dop = \Carbon\Carbon::parse($request->dop)->format('Y-m-d');
            $linkaccount->dom = \Carbon\Carbon::parse($request->dom)->format('Y-m-d');
            $linkaccount->as_card_no = $request->as_card_no;
            $linkaccount->remark_kyc = $request->remark_kyc;
            $linkaccount->pan_no = $request->pan_no;
            $linkaccount->election_card_no = $request->election_card_no ? $request->election_card : NULL;
            $linkaccount->adhar_card_no = $request->adhar_card_no ? $request->adhar_card_no : NULL;
            $linkaccount->mobile_no = $request->mobile_no ? $request->mobile_no : NULL;
            $linkaccount->dob = \Carbon\Carbon::parse($request->dob)->format('Y-m-d');
            $linkaccount->save();
        }

        $user = new RdUser();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->rd_acc_no = $request->rd_acc_no;
        $user->as_card_no = $request->as_card_no;
        $user->dop = \Carbon\Carbon::parse($request->dop)->format('Y-m-d');
        $user->dom = \Carbon\Carbon::parse($request->dom)->format('Y-m-d');
        $user->rupees = $request->rupees;
        $user->remark_kyc = $request->remark_kyc;
        $user->nominee = $request->nominee;
        $user->pan_no = $request->pan_card ? $request->pan_card : NULL;
        $user->adhar_card_no = $request->adhar_card;
        $user->election_card_no = $request->election_card;
        $user->mobile_no = $request->mobile_no;
        $user->dob = \Carbon\Carbon::parse($request->dob)->format('Y-m-d');
        
        if($user->save()) {
            return Redirect::back()->with('success', 'User created successfully!!');
        } else {
            return Redirect::bak()->with('error', 'Some error occurred');
        }
    }

    /**
    * Check the user details by account no.
    * @param \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function checkUser(Request $request) {

        $validator = Validator::make($request->all(), [
            'rd_acc_no' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        } else {
            $data = RdUser::where('rd_acc_no', $request->rd_acc_no)->first(); 
            return response()->json(['success' => $data]);   
        }
    }

    /*
    * Get user id & account_no
    * Check if user is already exist then link by user's account no.
    * Or else create a new user
    * @param \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function linkAccount(Request $request) {

        $user = RdUser::where('id', $request->user_id)->first();
        $account = RdUser::where('rd_acc_no', $request->rd_acc_no)->first();

        if($user) {
            $adduser = AccountLink::firstOrCreate([
                'user_id' => $request->user_id,
                'rd_acc_no' => $user->rd_acc_no,
                'name' => $user->name, 
                'address' => $user->address,
                'rupees' => $user->rupees,
                'dop' => $user->dop,
                'dom' => $user->dom,
                'as_card_no' => $user->as_card_no,
                'remark_kyc' => $user->remark_kyc,
                'pan_no' => $user->pan_no,
                'election_card_no' => $user->election_card_no,
                'adhar_card_no' => $user->adhar_card_no,
                'mobile_no' => $user->mobile_no,
                'dob' => $user->dob,
            ]);
        }

        if($account) {
            $linkaccount = new AccountLink();
            $linkaccount->user_id = $request->user_id;
            $linkaccount->rd_acc_no = $request->rd_acc_no;
            $linkaccount->name = $account->name; 
            $linkaccount->address = $account->address;
            $linkaccount->rupees = $account->rupees;
            $linkaccount->dop = $account->dop;
            $linkaccount->dom = $account->dom;
            $linkaccount->as_card_no = $account->as_card_no;
            $linkaccount->remark_kyc = $account->remark_kyc;
            $linkaccount->pan_no = $account->pan_no;
            $linkaccount->election_card_no = $account->election_card_no;
            $linkaccount->adhar_card_no = $account->adhar_card_no;
            $linkaccount->mobile_no = $account->mobile_no;
            $linkaccount->dob = $account->dob;
        }

        try {
            if($linkaccount->save()) {
                return response()->json(['success' => "Account linked successfully!!"]);
            } else {
                return response()->json(['errors' => 'Some error occurred. Unable to link account.']);
            }    
        } catch(Exception $e) {
            return response()->json(['errors' => "The account is alreay linked to this user."]);
        }
        
    }

    /*
    * Show list of all account holders 
    * @return \Illuminate\Http\Response
    */
    public function accHolders() {

        $accholder = AccountLink::select('id', 'user_id', 'rd_acc_no', 'name', 'rupees')
                                  ->groupBy('user_id')
                                  ->get();

        return view('rdusers.accholder')->with('accholder', $accholder);
    }

    /*
    * Show all accounts of a user
    * @param int $user_id
    * @return \Illuminate\Http\Response
    */
    public function showAccounts($user_id) {
        
        $existinguser = AccountLink::select('name', 'address')
                              ->where('user_id', $user_id)
                              ->first();
        $accounts = AccountLink::where('user_id', $user_id)->get();

        return view('rdusers.showusersaccount')->with(compact('existinguser', 'accounts'));
    }

    /**
     * Show the list of user's which are imported from the excel file
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounts = RdUser::select('rd_acc_no')->get();
        $user = RdUser::findOrFail($id)->toArray();
        return view('rdusers.show')->with(compact('user', 'accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified user from database.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = RdUser::find($request->user_id);
        $acclinks = AccountLink::where('user_id', $request->user_id)->first();
        
        if($user->delete() && $acclinks->delete()) {
            return Redirect::back()->with(['success' => "User deleted successfully!!"]);
        } else {
            return Redirect::back()->with(['errors' => 'Some error occurred. Unable to delete user.']);
        }   
    }
}
