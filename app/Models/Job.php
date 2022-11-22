<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {

    use HasFactory;

    protected $guarded = ['id', 'code', 'strtd'];

    public function cat() {
        return $this->belongsTo('App\Models\Cat');
    }
    public function promotions() {
       return $this->hasMany('App\Models\Promotion');
    }

    public function mores() {
        return $this->hasMany('App\Models\More');
    }

    public function offers() {
       return $this->hasMany('App\Models\Offer');
    }

    public function rates() {
        return $this->hasMany('App\Models\Rate');
    }

    public function tags() {
        return $this->hasMany('App\Models\Tag');
    }

    public function querytics() {
        return $this->hasMany('App\Models\Querytic');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
