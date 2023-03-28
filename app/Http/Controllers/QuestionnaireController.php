<?php

namespace App\Http\Controllers;

use App\Mail\QuestionnaireCompletion;
use App\Models\Website;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class QuestionnaireController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'web_post', 'index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();

        if (request('questionnaire_id') !== null) {
            $questionnaire = Questionnaire::find(request('questionnaire_id'));

            if ($questionnaire !== null) {
                return redirect()->action([QuestionnaireController::class, 'show'], ['questionnaires' => $questionnaires, 'questionnaire' => $questionnaire]);
            } else {
                return back()->with('error', 'That is not a valid id for a questionnaire');
            }

        } else {
            return response()->view('questionnaires.index', compact('questionnaires'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionnaire = new Questionnaire();

        $questionnaire->owner = $request->owner;
        $questionnaire->owner_email = $request->owner_email;
        $questionnaire->company_name = $request->company_name;
        $questionnaire->projected_domain = $request->domain_name;
        $questionnaire->modal_domain = $request->model_domain_name;
        $questionnaire->instagram = $request->instagram;
        $questionnaire->facebook = $request->facebook;
        $questionnaire->twitter = $request->twitter;

        if ($questionnaire->save()) {
            return redirect()->action([QuestionnaireController::class, 'index'])->with('status', 'New Questionnaire Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        return response()->view('questionnaires.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        return response()->view('questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {

        $this->validate($request, [
            'owner' => 'required',
            'owner_email' => 'required|email',
            'company_name' => 'nullable|max:100',
            'domain_name' => 'required|max:100',
            'model_domain_name' => 'nullable|max:100',
            'instagram' => 'nullable|max:50',
            'facebook' => 'nullable|max:50',
            'twitter' => 'nullable|max:50',
            'collect_payments' => 'required',
            'merchant_account' => 'nullable',
            'collection_types' => 'nullable',
            'completion_date' => 'nullable|date',
            'logo' => 'nullable|file',
            'description' => 'nullable',
        ]);

        $error = '';
        $dateFormat1 = new Carbon($request->completion_date);
        $questionnaire->owner = $request->owner;
        $questionnaire->owner_email = $request->owner_email;
        $questionnaire->company_name = $request->company_name;
        $questionnaire->projected_domain = $request->domain_name;
        $questionnaire->modal_domain = $request->model_domain_name;
        $questionnaire->description = $request->description;
        $questionnaire->instagram = $request->instagram;
        $questionnaire->facebook = $request->facebook;
        $questionnaire->twitter = $request->twitter;
        $questionnaire->collect_payments = $request->collect_payments;
        $questionnaire->merchant_account = $request->merchant_account;
        $questionnaire->collection_types = $request->collection_types;
        $questionnaire->total_cost = $request->total_cost;
        $questionnaire->completed = 'Y';
        $questionnaire->projected_due_date = $dateFormat1->toDateString();

        if ($request->hasFile('logo')) {

            $newImage = $request->file('logo');

            // Check to see if upload is an image
            if ($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {
                $fileName = $request->file('logo')[0]->getClientOriginalName();

                // Check to see if images is too large
                if ($newImage->getError() == 1) {
                    $error .= "<li class='errorItem'>The file " . $fileName . " is too large and could not be uploaded</li>";
                } elseif ($newImage->getError() == 0) {
                    // Check to see if images is about 25MB
                    // If it is then resize it
                    if ($newImage->getClientSize() < 25000000) {
                        $image = Image::make($newImage->getRealPath())->orientate();
//					    $path = $newImage->store('public/images');
                        $image_ext = substr($image->mime(), '6');

                        // Create a smaller version of the image
                        // and save to large image folder
                        $image->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        if ($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($questionnaire->owner)) . '_sm.' . $image_ext))) {
                            $questionnaire->logo = str_ireplace(' ', '_', strtolower($questionnaire->owner) . '_sm.' . $image_ext);
                        }

                    } else {
                        // Resize the image before storing. Will need to hash the filename first
                        $path = $newImage->store('public/images');
                        $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

                        //Save Image
                        $image->save(storage_path('app/' . $path));
                    }
                } else {
                    $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
                }
            } else {
                $fileName = $request->file('logo')[0]->getClientOriginalName();

                // Upload is not an image.
                // Redirect with error
                $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
            }
        }

        if ($questionnaire->save()) {
            \Mail::to('jackson.tramaine3@gmail.com')->send(new QuestionnaireCompletion($questionnaire));

            return redirect()->action([HomeController::class, 'portfolio2'])->with('status', 'Questionnaire Information Sent Successfully');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function web_post(Request $request, Questionnaire $questionnaire)
    {

        $this->validate($request, [
            'owner' => 'required',
            'owner_email' => 'required|email',
            'company_name' => 'nullable|max:100',
            'domain_name' => 'required|max:100',
            'model_domain_name' => 'nullable|max:100',
            'mission' => 'nullable',
            'description' => 'nullable',
            'website_design' => 'nullable',
            'contact' => 'nullable',
            'tabs' => 'nullable',
            'instagram' => 'nullable|max:50',
            'facebook' => 'nullable|max:50',
            'twitter' => 'nullable|max:50',
            'collect_payments' => 'required',
            'merchant_account' => 'nullable',
            'collection_types' => 'nullable',
            'completion_date' => 'nullable|date',
            'logo' => 'nullable|file',
        ]);

        $error = '';
        $questionnaire->total_cost = 500.00;
        $questionnaire->owner = $request->owner;
        $questionnaire->owner_email = $request->owner_email;
        $questionnaire->company_name = $request->company_name;
        $questionnaire->projected_domain = $request->domain_name;
        $questionnaire->modal_domain = $request->model_domain_name;
        $questionnaire->description = $request->description;
        $questionnaire->mission = $request->mission;
        $questionnaire->website_design = $request->website_design;
        $questionnaire->contact = $request->contact;
        $questionnaire->tabs = isset($request->collection_types) ?? implode(';', $request->tabs);
        $questionnaire->instagram = $request->instagram;
        $questionnaire->facebook = $request->facebook;
        $questionnaire->twitter = $request->twitter;
        $questionnaire->collect_payments = $request->collect_payments;
        $questionnaire->merchant_account = $request->merchant_account;
        $questionnaire->collection_types = isset($request->collection_types) && $request->collection_types != null ? implode(',', $request->collection_types) : null;
        $questionnaire->completed = 'Y';
        $dateFormat1 = new Carbon($request->completion_date);
        $questionnaire->projected_due_date = $dateFormat1->toDateString();

        if ($questionnaire->collect_payments == 'Y') {
            $questionnaire->total_cost += 250.00;

            if ($questionnaire->merchant_account == 'Y') {
                $questionnaire->total_cost += 100.00;
            }
        }

        if ($request->hasFile('logo')) {

            $newImage = $request->file('logo');

            // Check to see if upload is an image
            if ($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {
                $fileName = $request->file('logo')[0]->getClientOriginalName();

                // Check to see if images is too large
                if ($newImage->getError() == 1) {
                    $error .= "<li class='errorItem'>The file " . $fileName . " is too large and could not be uploaded</li>";
                } elseif ($newImage->getError() == 0) {
                    // Check to see if images is about 25MB
                    // If it is then resize it
                    if ($newImage->getClientSize() < 25000000) {
                        $image = Image::make($newImage->getRealPath())->orientate();
//					    $path = $newImage->store('public/images');
                        $image_ext = substr($image->mime(), '6');

                        // Create a smaller version of the image
                        // and save to large image folder
                        $image->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        if ($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($questionnaire->owner)) . '_sm.' . $image_ext))) {
                            $questionnaire->logo = str_ireplace(' ', '_', strtolower($questionnaire->owner) . '_sm.' . $image_ext);
                        }

                    } else {
                        // Resize the image before storing. Will need to hash the filename first
                        $path = $newImage->store('public/images');
                        $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

                        //Save Image
                        $image->save(storage_path('app/' . $path));
                    }
                } else {
                    $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
                }
            } else {
                $fileName = $request->file('logo')[0]->getClientOriginalName();

                // Upload is not an image.
                // Redirect with error
                $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
            }
        }

        if ($questionnaire->save()) {

            $questionnaire->website->description = $questionnaire->description;
            $questionnaire->website->amount_due = $questionnaire->total_cost;

            if ($questionnaire->website->save()) {
//                \Mail::to('jackson.tramaine3@gmail.com')->send(new QuestionnaireCompletion($questionnaire));

                return redirect()->action([HomeController::class, 'portfolio2'])->with('status', 'Questionnaire Information Sent Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Questionnaire $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->active = 'N';

        if ($questionnaire->save()) {
            if ($questionnaire->delete()) {
                return redirect()->action([WebsiteController::class, 'index'])->with('status', $questionnaire->name . ' removed successfully');
            }
        }
    }
}
