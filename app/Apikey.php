<?php namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Apikey extends Eloquent {

	protected $collection = 'apikeys';
    protected $guarded = [];
}
