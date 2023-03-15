<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $messagesAll = Message::all();
        $messages = Message::paginate(5);
        $today = Carbon::now();


        return view('messages', compact('admin', 'messages', 'messagesAll', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Send email from message left on about us page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $this->validate($request, [
            'message_email' => array(
                'required',
                'max:100',
                'regex:/\.com|\.co|\.net$/',
            ),
            'message_name' => 'required|max:50',
            'message_subject' => 'required|max:100',
            'message_body' => 'required|max:500',
        ]);

        $message = new Message();
        $message->email = $request->message_email;
        $message->name = $request->message_name;
        $message->subject = $request->message_subject;
        $message->message = $request->message_body;

        if ($message->funkyCheck() === false) {
            $email_check = Message::where('email', $message->email)->get();
            if ($email_check->isEmpty()) {
                if ($message->save()) {
                    // Send Email to Admin and Recipient
                    //\Mail::to($request->message_email)->send(new NewMessage($request->message_subject, $request->message_name, $request->message_email, $request->message_body));

                    return redirect()->back()->with('status', "Message Sent Successfully");
                }
            }
        } else {
            return redirect()->back()->with('status', "Message Sent Successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        if ($message->delete()) {
            return redirect()->action('MessageController@index')->with('status', 'Message Deleted Successfully!');
        }
    }
}
