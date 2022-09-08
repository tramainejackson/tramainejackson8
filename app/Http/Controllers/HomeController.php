<?php

namespace App\Http\Controllers;

use App\Mail\NewMessage;
use App\Models\Setting;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth')->except('portfolio1', 'portfolio2', 'portfolio2_about', 'index', 'questionnaire', 'store_questionnaire');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request) {
		// Check for auth
		// Add to counter if false
		if(!Auth::check()) {
			// Update settings site counter
			$setting = Setting::first();
			$setting->hit_count++;
			if($setting->save()){}
		}

		if($request->hasCookie('company_recruiter')) {
			return redirect()->route('portfolio1');
		} elseif($request->hasCookie('small_business')) {
			return redirect()->route('portfolio2');
		} else {
			return response()->view('index');
		}
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function home() {
		return response()->view('home');
	}

	/**
	 * Show the applications db settings.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function settings() {
		return response()->view('settings');
	}

	/**
	 * Update applications db settings.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function settings_update(Request $request) {
		$this->validate($request, [
			'mission'   => 'nullable',
			'about_me'  => 'required',
			'email'     => 'required|email|max:50',
			'phone'     => 'required',
		]);

		$setting = Setting::first();
		$setting->mission   = $request->mission;
		$setting->about_me  = $request->about_me;
		$setting->email     = $request->email;
		$setting->phone     = $request->phone;

		if($setting->save()) {
			return back()->with('status', 'Settings updated successfully');
		}
	}

	/**
	 * Show recruiter portfolio page.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function portfolio1(Request $request) {
		if(!$request->hasCookie('company_recruiter')) {
			// If cookie isn't already set
			// Set Cookie for 1 Week
			$cookie = cookie('company_recruiter', 'true', time() + (7 * 24 * 60 * 60));
			setcookie('company_recruiter', 'true', time() + (7 * 24 * 60 * 60));
		}

		$websites = Website::all();
		$now = Carbon::now();
		$dmbDevStart = Carbon::create(2018, 8,1);
		$freelanceDevStart = Carbon::create(2013, 1);

		$dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
		$dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now)*12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months' ;

		$freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

		if(!$request->hasCookie('company_recruiter')) {
			return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie($cookie)->withCookie(\Cookie::forget('small_business', '/'));
		} elseif($request->hasCookie('small_business')) {
			return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie(\Cookie::forget('small_business', '/'));
		} else {
			return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'));
		}
	}

	/**
	 * Show small business portfolio page.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function portfolio2(Request $request) {
		if(!$request->hasCookie('small_business')) {
			// If cookie isn't already set
			// Set Cookie for 1 Week
			$cookie = cookie('small_business', 'true', time() + (7 * 24 * 60 * 60));
		}

		$websites = Website::all();
		$now = Carbon::now();
		$dmbDevStart = Carbon::create(2018, 8,1);
		$freelanceDevStart = Carbon::create(2013, 1);

		$dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
		$dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now)*12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months' ;

		$freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

		if(!$request->hasCookie('small_business')) {
			return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie($cookie)->withCookie(\Cookie::forget('company_recruiter', '/'));
		} elseif($request->hasCookie('company_recruiter')) {
			return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie(\Cookie::forget('company_recruiter', '/'));
		} else {
			return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'));
		}
	}

	/**
	 * Show small business portfolio page.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function portfolio2_about(Request $request) {
		if(!$request->hasCookie('small_business')) {
			// If cookie isn't already set
			// Set Cookie for 1 Week
			$cookie = cookie('small_business', 'true', time() + (7 * 24 * 60 * 60));
			cookie('company_recruiter', '', time()-1000);
		}

		$now = Carbon::now();
		$dmbDevStart = Carbon::create(2018, 8,1);
		$freelanceDevStart = Carbon::create(2013, 1);

		$dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
		$dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now)*12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months' ;

		$freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

		if(!$request->hasCookie('small_business')) {
			return response()->view('about_me', compact('dmbDevTime', 'freelanceDevTime'))->withCookie($cookie);
		} else {
			return response()->view('about_me', compact('dmbDevTime', 'freelanceDevTime'));
		}
	}

	/**
	 * Reset the hit counter on the website.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function reset_counter() {
		$settings = Setting::first();

		// Update settings site counter
		$settings->hit_count = 0;
		$settings->hit_count_date = Carbon::now();

		if($settings->save()){
			return 'Website Hit Count Reset';
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function questionnaire () {
        return view('questionnaire');
    }
}
