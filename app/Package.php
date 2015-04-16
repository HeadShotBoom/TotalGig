<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['package_name', 'user_id', 'service_name_1', 'service_name_2', 'service_name_3', 'service_name_4', 'service_name_5', 'service_name_6', 'service_name_7', 'service_name_8', 'service_name_9', 'service_name_10', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gig()
    {
        return $this->belongsToMany('App\Gig');
    }
    Public function service()
    {
        return $this->hasMany('App\Service');
    }

}
