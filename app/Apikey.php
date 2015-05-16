<?php namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Model as Eloquent;
use Carbon\Carbon;

class Apikey extends Eloquent {

    use SoftDeletes;

	protected $collection = 'apikeys';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

}
