<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'date', 'total', 'paid', 'name', 'client'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
