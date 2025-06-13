<?php

namespace App\Mail;

use App\Models\Customers;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registration_Admin extends Mailable
{
    use Queueable, SerializesModels;

	/**
	* The variable instances
	*
	* @var Customers $customers
	*/
	public $customers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('HBCU College Tour 2026 Preregistration')->view('emails.new_message');
    }
}
