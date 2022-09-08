<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Questionnaire extends Model
{
    use Notifiable;
    use SoftDeletes;

    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','owner','owner_email','company_name','projected_domain','description'];

    /**
     * Get the website that owns the questionnaire
     */
    public function website() {
        return $this->belongsTo('App\Models\Website');
    }
}
