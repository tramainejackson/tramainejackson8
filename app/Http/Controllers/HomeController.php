<?php

namespace App\Http\Controllers;

//use App\Mail\NewMessage;
use App\Models\Customers;
use App\Models\Setting;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('portfolio1', 'portfolio2', 'portfolio2_about', 'index', 'questionnaire', 'store_questionnaire', 'hbcu_college_tour', 'hbcu_college_tour_confirmation', 'hbcu_college_tour_registrations', 'contact_post', 'hbcu_college_tour_sponsors', 'hbcu_college_tour_sponsors_confirmation');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Check for auth
        // Add to counter if false
        if (!Auth::check()) {
            // Update settings site counter
            $setting = Setting::first();
            $setting->hit_count++;
            if ($setting->save()) {
            }
        }

        if ($request->hasCookie('company_recruiter')) {
            return redirect()->route('portfolio1');
        } elseif ($request->hasCookie('small_business')) {
            return redirect()->route('portfolio2');
        } else {
            return response()->view('index');
        }
    }

    /**
     * Show the HBCU College Tour Home Page.
     *
     * @return Response
     */
    public function hbcu_college_tour()
    {
        return response()->view('welcome2');
    }

    /**
     * Show the HBCU College Tour Registrations.
     *
     * @return Response
     */
    public function hbcu_college_tour_registrations()
    {
        $students = Customers::where([
            ['grade', '<>', null],
        ])->get();

        $parents = Customers::where([
            ['parent_attending', '=', 'Y'],
        ])->get();

        $registrations = $students->merge($parents);

        return response()->view('all_registrations', compact('registrations'));
    }

    /**
     * Show the HBCU College Tour Sponsor.
     *
     * @return Response
     */
    public function hbcu_college_tour_sponsors()
    {
        $registrations = Customers::all();
        return response()->view('registration_sponsors', compact('registrations'));
    }

    /**
     * Show the HBCU College Tour Sponsor.
     *
     * @return Response
     */
    public function hbcu_college_tour_sponsors_confirmation($customer_confirmation)
    {
        $sponsor = Customers::where([
            ['confirmation', '=', $customer_confirmation],
            ['is_sponsor', '=', 'Y']
        ])->first();

        return response()->view('sponsors_confirmation', compact('sponsor'));
    }

    /**
     * Get the confirmation page.
     *
     * @param $customer_confirmation
     * @return Response
     */
    public function hbcu_college_tour_confirmation($customer_confirmation)
    {
        $customer = Customers::where('confirmation', $customer_confirmation)->get();

        if ($customer->count() == 2) {
            if($customer->first()->is_sponsor == 'Y') {
                $customer->shift();
            } elseif($customer->last()->is_sponsor == 'Y') {
                $customer->pop();
            }
        }

        if ($customer->count() == 1) {
            $collective_paid_amount = 0;
            $pif = $customer->first()->paid_in_full;
//            $customer = $customer->first();
        } else {
            if ($customer == null) {
                $customer = new Customers;
                $pif = 'N';
            } else {
                $collective_paid_amount = Customers::where('confirmation', $customer_confirmation)->first()->paid_amount;
                $pif = Customers::where('confirmation', $customer_confirmation)->first()->paid_in_full;
            }
        }

        if ($pif == 'N') {
            return response()->view('registration_confirmation', compact('customer', 'collective_paid_amount', 'customer_confirmation'));
        } else {
            return response()->view('ticket_confirmation', compact('customer', 'collective_paid_amount', 'customer_confirmation'));
        }
    }

    /**
     * Store post from contact page
     *
     * @param Request $request
     * @return mixed
     */
    public function contact_post(Request $request)
    {
        if (!isset($request->confirmation_num)) {
            $this->validate($request, [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'nullable',
            ]);

            $customer = new Customers();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->grade = $request->grade;
            $customer->school = $request->school;
            $customer->confirmation = Str::random(50);

            //Just add a message to the log just in case something isn't
            //picked up when saving
            info('Someone tried saving info.' . $customer);

            if ($request->parent_first_name || $request->parent_last_name) {
                $parent = new Customers();
                $parent->parent_first_name = $request->parent_first_name;
                $parent->parent_last_name = $request->parent_last_name;
                $parent->parent_email = $request->parent_email;
                $parent->parent_phone = $request->parent_phone;
                $parent->parent_attending = $request->parent_attending;
                $parent->chaperone = $request->chaperone;
                $parent->confirmation = $customer->confirmation;

                info('Someone tried saving info.' . $parent);
            }

            if ($customer->save()) {
                if ($request->parent_first_name || $request->parent_last_name) {
                    if ($parent->save()) {
                    }
                }
                return redirect()->action([HomeController::class, 'hbcu_college_tour_confirmation'], ['confirmation' => $customer->confirmation])->with('status', 'Your registration was completed successfully.');
            } else {
                return back()->with('bad_status', 'Form not submitted. Please try again.')->withInput();
            }
        } else {
            $confirmation_num = $request->confirmation_num;

            if ($request->sponsor_company) {
                $sponsor = new Customers();
                $sponsor->parent_first_name = $request->parent_first_name;
                $sponsor->parent_last_name = $request->parent_last_name;
                $sponsor->parent_email = $request->parent_email;
                $sponsor->parent_phone = $request->parent_phone;
                $sponsor->sponsor_company = $request->sponsor_company;
                $sponsor->is_sponsor = 'Y';
                $sponsor->confirmation = $confirmation_num;

                info('Someone tried saving info.' . $sponsor);

                if ($sponsor->save()) {
                    return redirect()->action([HomeController::class, 'hbcu_college_tour_sponsor_confirmation'], ['confirmation' => $sponsor->confirmation])->with('status', 'Your registration was completed successfully.');
                } else {
                    return back()->with('bad_status', 'Form not submitted. Please try again.')->withInput();
                }
            } elseif ($request->parent_first_name || $request->parent_last_name) {
                $parent = new Customers();
                $parent->parent_first_name = $request->parent_first_name;
                $parent->parent_last_name = $request->parent_last_name;
                $parent->parent_email = $request->parent_email;
                $parent->parent_phone = $request->parent_phone;
                $parent->parent_attending = $request->parent_attending;
                $parent->chaperone = $request->chaperone;
                $parent->confirmation = $confirmation_num;

                info('Someone tried saving info.' . $parent);

                if ($parent->save()) {
                    return redirect()->action([HomeController::class, 'hbcu_college_tour_confirmation'], ['confirmation' => $parent->confirmation])->with('status', 'Your registration was completed successfully.');
                } else {
                    return back()->with('bad_status', 'Form not submitted. Please try again.')->withInput();
                }
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function home()
    {
        return response()->view('home');
    }

    /**
     * Show the applications db settings.
     *
     * @return Response
     */
    public function settings()
    {
        return response()->view('settings');
    }

    /**
     * Update applications db settings.
     *
     * @return Response
     */
    public function settings_update(Request $request)
    {
        $this->validate($request, [
            'mission' => 'nullable',
            'about_me' => 'required',
            'email' => 'required|email|max:50',
            'phone' => 'required',
        ]);

        $setting = Setting::first();
        $setting->mission = $request->mission;
        $setting->about_me = $request->about_me;
        $setting->email = $request->email;
        $setting->phone = $request->phone;

        if ($setting->save()) {
            return back()->with('status', 'Settings updated successfully');
        }
    }

    /**
     * Show recruiter portfolio page.
     *
     * @return Response
     */
    public function portfolio1(Request $request)
    {
        if (!$request->hasCookie('company_recruiter')) {
            // If cookie isn't already set
            // Set Cookie for 1 Week
            $cookie = cookie('company_recruiter', 'true', time() + (7 * 24 * 60 * 60));
            setcookie('company_recruiter', 'true', time() + (7 * 24 * 60 * 60));
        }

        $websites = Website::all();
        $now = Carbon::now();
        $dmbDevStart = Carbon::create(2018, 8, 1);
        $freelanceDevStart = Carbon::create(2013, 1);

        $dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
        $dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now) * 12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months';

        $freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

        if (!$request->hasCookie('company_recruiter')) {
            return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie($cookie)->withCookie(\Cookie::forget('small_business', '/'));
        } elseif ($request->hasCookie('small_business')) {
            return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie(\Cookie::forget('small_business', '/'));
        } else {
            return response()->view('portfolio1', compact('dmbDevTime', 'freelanceDevTime', 'websites'));
        }
    }

    /**
     * Show small business portfolio page.
     *
     * @return Response
     */
    public function portfolio2(Request $request)
    {
        if (!$request->hasCookie('small_business')) {
            // If cookie isn't already set
            // Set Cookie for 1 Week
            $cookie = cookie('small_business', 'true', time() + (7 * 24 * 60 * 60));
        }

        $websites = Website::all();
        $now = Carbon::now();
        $dmbDevStart = Carbon::create(2018, 8, 1);
        $freelanceDevStart = Carbon::create(2013, 1);

        $dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
        $dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now) * 12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months';

        $freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

        if (!$request->hasCookie('small_business')) {
            return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie($cookie)->withCookie(\Cookie::forget('company_recruiter', '/'));
        } elseif ($request->hasCookie('company_recruiter')) {
            return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'))->withCookie(\Cookie::forget('company_recruiter', '/'));
        } else {
            return response()->view('portfolio2', compact('dmbDevTime', 'freelanceDevTime', 'websites'));
        }
    }

    /**
     * Show small business portfolio page.
     *
     * @return Response
     */
    public function portfolio2_about(Request $request)
    {
        if (!$request->hasCookie('small_business')) {
            // If cookie isn't already set
            // Set Cookie for 1 Week
            $cookie = cookie('small_business', 'true', time() + (7 * 24 * 60 * 60));
            cookie('company_recruiter', '', time() - 1000);
        }

        $now = Carbon::now();
        $dmbDevStart = Carbon::create(2018, 8, 1);
        $freelanceDevStart = Carbon::create(2013, 1);

        $dmbDevTime = $dmbDevStart->diffInYears($now) > 0 ? $dmbDevStart->diffInYears($now) . ' Years' : '';
        $dmbDevTime .= $dmbDevTime != '' ? ' ' . ($dmbDevStart->diffInMonths($now) - ($dmbDevStart->diffInYears($now) * 12)) . ' Months' : $dmbDevStart->diffInMonths($now) . ' Months';

        $freelanceDevTime = $freelanceDevStart->diffInYears($now) . ' Years';

        if (!$request->hasCookie('small_business')) {
            return response()->view('about_me', compact('dmbDevTime', 'freelanceDevTime'))->withCookie($cookie);
        } else {
            return response()->view('about_me', compact('dmbDevTime', 'freelanceDevTime'));
        }
    }

    /**
     * Reset the hit counter on the website.
     *
     * @return string
     */
    public function reset_counter()
    {
        $settings = Setting::first();

        // Update settings site counter
        $settings->hit_count = 0;
        $settings->hit_count_date = Carbon::now();

        if ($settings->save()) {
            return 'Website Hit Count Reset';
        }
    }
}
