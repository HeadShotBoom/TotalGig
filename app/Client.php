<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'user_id', 'address', 'phone'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gig()
    {
        return $this->hasMany('App\Gig');
    }

}
