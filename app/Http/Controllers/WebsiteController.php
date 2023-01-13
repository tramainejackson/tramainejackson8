<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Mail\PaymentReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class WebsiteController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$websites = Website::all();

		return view('websites.index', compact('websites'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$websites = Website::all();

		return view('websites.create', compact('websites'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$website = new Website();

		$dateFormat = new Carbon($request->renew_date);
		$website->name = $request->name;
		$website->link = $request->link;
		$website->owner = $request->owner;
		$website->owner_email = $request->owner_email;
		$website->renew_date = $dateFormat->toDateString();

		if($website->save()) {
            //Create a questionnaire for
            //the website owner to fill out
            if($website->questionnaire()->create([
                'id'                => uniqid(),
                'owner'             => $website->owner,
                'owner_email'       => $website->owner_email,
                'company_name'      => $website->name,
                'projected_domain'  => $website->link,
            ])) {
                return redirect()->action('WebsiteController@edit', ['website' => $website->id])->with('status', 'New Website Added Successfully');
            }
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Website  $website
	 * @return \Illuminate\Http\Response
	 */
	public function show(Website $website)
	{
//	    dd($website);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Website  $website
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Website $website)
	{
		$websites = Website::all();

		return view('websites.edit', compact('website', 'websites'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Website  $website
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Website $website) {

		$this->validate($request, [
			'title'             => 'nullable|max:100',
			'name'              => 'nullable|max:100',
			'link'              => 'nullable|max:50',
			'owner'             => 'nullable',
			'description'       => 'nullable',
			'owner_email'       => 'nullable|email',
			'renew_date'        => 'nullable|date',
			'last_paid_date'    => 'nullable|date',
			'logo'              => 'nullable|file',
			'amount_due'        => 'nullable|numeric',
		]);

		$dateFormat1                = new Carbon($request->renew_date);
		$dateFormat2                = new Carbon($request->last_paid_date);
		$website->title             = $request->title;
		$website->name              = $request->name;
		$website->link              = $request->link;
		$website->owner             = $request->owner;
		$website->owner_email       = $request->owner_email;
		$website->description       = $request->description;
		$website->amount_due        = $request->amount_due;
		$website->renew_date        = $dateFormat1->toDateString();
		$website->last_paid_date    = $dateFormat2->toDateString();
		$website->active            = $request->active;

		if($request->hasFile('avatar')) {

			$newImage = $request->file('avatar');

			// Check to see if upload is an image
			if($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {

				// Check to see if images is too large
				if($newImage->getError() == 1) {
					$fileName = $request->file('media')[0]->getClientOriginalName();
					$error .= "<li class='errorItem'>The file " . $fileName . " is too large and could not be uploaded</li>";
				} elseif($newImage->getError() == 0) {
					// Check to see if images is about 25MB
					// If it is then resize it
					if($newImage->getSize() < 25000000) {
						$image = Image::make($newImage->getRealPath())->orientate();
//					    $path = $newImage->store('public/images');
						$image_ext = substr($image->mime(), '6');

						// Create a smaller version of the image
						// and save to large image folder
						$image->resize(300, null, function ($constraint) {
							$constraint->aspectRatio();
						});

						if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($website->name)) . '_sm.' . $image_ext))) {
							$website->logo = str_ireplace(' ', '_', strtolower($website->name) . '_sm.' . $image_ext);
						}

					} else {
						// Resize the image before storing. Will need to hash the filename first
						$path = $newImage->store('public/images');
						$image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						});
						$image->save(storage_path('app/'. $path));

						// Save Image
						if($addImage->save()) {

						}
					}
				} else {
					$error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
				}
			} else {
				// Upload is not an image.
				// Redirect with error
				$error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
			}
		}

		if($website->save()) {
			return redirect()->back()->with('status', 'Website Info Updated Successfully');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Website  $website
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Website $website)
	{
		$website->active = 'N';

		if($website->save()) {
			if($website->delete()) {
				return redirect()->action('WebsiteController@index')->with('status', $website->name . ' removed successfully');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Website  $website
	 * @return \Illuminate\Http\Response
	 */
	public function payment_reminder(Website $website) {
		// Send Email to Admin and Recipient
		\Mail::to($website->owner_email)->send(new PaymentReminder($website));

		return redirect()->back()->with('status', 'Email Sent Successfully');
	}
}
