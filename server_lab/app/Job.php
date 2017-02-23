<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name','body','salary','user_id','company_id','location_id','category_id','adver_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function company(){
        return $this->belongsTo('App\Company');

    }

    public function category(){
        return $this->belongsTo('App\category');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function advertype(){
        return $this->belongsTo('App\AdverType');
    }

}
