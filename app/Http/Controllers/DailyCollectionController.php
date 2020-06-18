<?php

namespace App\Http\Controllers;

use App\RdUser;
use Illuminate\Http\Request;
use App\DailyCollection;
use App\AccountLink;
use Redirect;
use DB;
use Response;
use Datatables;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\UsersExportView;

class DailyCollectionController extends Controller
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
     * Add the daily collections and show the record.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AccountLink::select('user_id', 'name')
                         ->groupBy('user_id')
                         ->withTrashed(false)
                         ->get();

        $dailyusers = DB::table('daily_collections')
                ->join('account_links', 'daily_collections.user_id', '=', 'account_links.user_id')
                ->groupBy('account_links.user_id')
                ->select('daily_collections.id','daily_collections.rupees','account_links.name')
                ->where('daily_collections.date', date('Y-m-d'))
                ->get();

        $total = DailyCollection::where('date', '=', date('Y-m-d'))->sum('rupees');
        
        return view('dailycollections.index')->with(compact('users', 'dailyusers', 'total'));
    }

    /**
     * Store the user's amount and collection date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dailyc = new DailyCollection();
        $dailyc->user_id = $request->user_id;
        $dailyc->rupees = $request->rupees;
        $dailyc->date = $request->date;

        if($dailyc->save()) {
            return Redirect::back()->with('success', 'Successfully added!!');
        } else {
            return Redirect::bak()->with('error', 'Some error occurred');
        } 
    }
    /*
    * Show the filter page
    */
    public function filterByStatus() {

        return view('dailycollections.filterbystatus');
    }

    /*
    * Filter user's collection by start and end date
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function collected(Request $request) {
        if($request->ajax()) {
            if(!empty($request->start_date) && !empty($request->end_date)) {

                $data = DB::table('daily_collections')
                            ->join('account_links', 'daily_collections.user_id', '=', 'account_links.user_id')
                            ->groupBy('account_links.user_id')
                            ->select('daily_collections.rupees','daily_collections.date','account_links.name')
                            ->whereBetween('daily_collections.date', array($request->start_date, $request->end_date))
                            ->get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    /*
    * Filter pending user's 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function pending(Request $request) {
        if($request->ajax()) {
            if(!empty($request->start_date) && !empty($request->end_date)) {

                 $data = DB::select('select l.user_id, l.name from account_links l left join daily_collections t on l.user_id = t.user_id group by l.user_id ORDER BY `user_id` ASC');
            }

            return datatables()->of($data)->make(true);
        }
    }

    /*
    * Show filter page of DOP(date of opening) and DOM(date of maturity)
    * @return \Illuminate\Http\Response
    */
    public function filterByDate() {
        return view('dailycollections.filterbydate');
    }

    /*
    * Filter user's by Date of Opening
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function dopData(Request $request) {
        if($request->ajax()) {
            if(!empty(($request->start_date) && !empty(($request->end_date)))) {
                    $data = AccountLink::select('name', 'dop')
                                         ->whereBetween('dop', array($request->start_date, $request->end_date))
                                         ->get();
            }
            return datatables()->of($data)->make(true);

        }
    }

    /*
    * Filter user's by Date of Maturity
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function domData(Request $request) {
        if($request->ajax()) {
            if(!empty(($request->start_date) && !empty(($request->end_date)))) {
                    $data = AccountLink::select('name', 'dom')
                                         ->whereBetween('dom', array($request->start_date, $request->end_date))
                                         ->get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RdUser  $rdUser
     * @return \Illuminate\Http\Response
     */
    public function show(RdUser $rdUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RdUser  $rdUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RdUser $rdUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RdUser  $rdUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RdUser $rdUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RdUser  $rdUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RdUser $rdUser)
    {
        //
    }
}
