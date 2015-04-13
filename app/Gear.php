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
    protected $fillable = ['item_name', 'category', 'user_id', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Gig()
    {
        return $this->belongsToMany('App\Gig');
    }

}
