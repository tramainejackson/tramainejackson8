<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	/**
	 * Create full name accessor
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return mixed
	 */
	public function full_name()	{
		return $this->first_name . " " . $this->last_name;
	}

	/**
	 * Get the consult request record associated with the user.
	 */
	public function consultContact()	{
		return $this->hasOne('App\ConsultContact');
	}

	/**
	 * Get the consult request record associated with the user.
	 */
	public function consultResponse()	{
		return $this->hasOne('App\ConsultResponse');
	}

	/**
	 * Scope a query to only include most recent consult request
	 * that hasn't been responded to yet.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeLeastRecent($query)	{
		return $query->where('responded', '=', 'N')
			->orderBy('created_at', 'asc')
			->get();
	}
}
