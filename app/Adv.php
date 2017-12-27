<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Adv extends Model
{
    // search related stuff
    use Notifiable;
    use Searchable;

    //table name
    protected $table = 'advs';
    // Primary key
    public $primarykey = 'id';
    // timestamps
    public $timestamps = true;

    public function user() {
      return $this->belongsTo('App\User');
    }
    public function searchableAs()
    {
        return view('advs.index');
    }

}
