<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RdUser extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
    	'id', 'rd_acc_no', 'name', 'address', 'dop', 'rupees', 'nominee', 'as_card_no', 'dom', 'remark_kyc', 'pan_no', 'election_card_no', 'adhar_card_no', 'mobile_no', 'dob'
    ];
}
