<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gigs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gig_name', 'user_id', 'client', 'service_package', 'gig_date', 'employee_1', 'employee_2', 'employee_3', 'employee_4', 'employee_5', 'employee_6', 'employee_7', 'employee_8', 'employee_9', 'employee_10', 'notes'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function package()
    {
        return $this->hasOne('App\Package');
    }

    public  function gear()
    {
        return $this->hasMany('App\Gear');
    }

}
