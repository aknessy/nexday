<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance
     * 
     * @var App\Models\User
     */
    protected $user;

    /**
     * The Generated Password
     * 
     * @var string 
     */
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        /**
         * Current user instance
         */
        $this->user = $user;

        /**
         * Login password
         */
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account-created')
            ->tag('accountCreated')
            ->with([
                'accountPassword' => $this->password,
                'email' => $this->user->email,
                'verifyToken' => $this->user->email_verify_token
            ]);
    }
}
