<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['package_id', 'service_qty', 'service_name', 'service_price', 'description'];

    Public function package()
    {
        return $this->belongsTo('App\Package');
    }

}
