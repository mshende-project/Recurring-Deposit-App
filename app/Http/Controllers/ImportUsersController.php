<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Validator;
use Redirect;
use App\Imports\UsersImport;
use Exception;

class ImportUsersController extends Controller
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

    /*
        * Show the form to import the data from excel file
    */
    public function index() {

    	return view('import.create');
    
    }

    /* 
       * Validate submitted file
       * Import data into database
    */ 
    public function import(Request $request) {
        
    	$validator = Validator::make($request->all(), [
    		'file' => 'required'
    	]);

    	if($validator->fails()) {

    		return Redirect::back()
    		->withInput()
    		->withErrors($validator);
    	
    	} else {

            try {

                Excel::import(new UsersImport, $request->file('file'));
                return back()->with('message', 'Users Imported Successfully!!');
            
            } catch(Exception $e) {

                return back()->with('error', 'Error Found!! Please check your file or you are trying to import duplicate data');
            }
        }

    }
}
