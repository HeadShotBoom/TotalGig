<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gear extends Model {

    /**
 * The database table used by the model.
 *
 * @var string
 */
    protected $table = 'gears';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gear_name', 'gig-category', 'user_id', 'gear_description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gig()
    {
        return $this->belongsToMany('App\Gig');
    }

}
