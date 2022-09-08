<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Website extends Model
{

	use Notifiable;
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

    /**
     * Get the questionnaire associated wth the website
     */
    public function questionnaire() {
        return $this->hasOne('App\Models\Questionnaire');
    }

	/**
	 * Get the website cover photo
	 */
	public function getNameAttribute($value) {
		return $value;
	}

	/**
	 * Get the website last paid date
	 */
	public function getLastPaidDateAttribute($value) {
		$value = new Carbon($value);

		return $value;
	}

	/**
	 * Get the website domain renew date
	 */
	public function getRenewDateAttribute($value) {
		$value = new Carbon($value);

		return $value;
	}

	/**
	 * Get the website cover photo
	 */
	public function getLogoAttribute($value) {

		if($value != null) {
			// Check if file exist
			$img_file = Storage::disk('public')->exists('images/' . $value);

			if ($img_file) {
				$value = $value;
			} else {
				$value = 'default.png';
			}
		} else {
			$value = 'default.png';
		}

		return $value;
	}

	/**
	 * Check for active clients
	 */
	public function scopeActiveWebsites($query) {
		return $query->where('active', '=', 'Y')
			->get();
	}
}
