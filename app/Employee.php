<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'user_id', 'pay_rate'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gig()
    {
        return $this->belongsToMany('App\Gig');
    }

}
