<?php

namespace App\Exports;

use App\DailyCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExportView implements FromView
{
	public $view;
	public $data;

	public function __construct($view, $data = "")
	{
	    $this->view = $view;
	    $this->data = $data;
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	return view($this->view,
	        $this->data
	    );
    }
}
