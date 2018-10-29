<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MembershipPurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    private $amount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $amount)
    {
        $this->user = $user;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gaappnasminfosoft@gmail.com')
                    ->subject('GA-APPNA Membership Confirmation.')
                    ->view('mail.email')
                    ->with([
                        'name' => $this->user->fname . ' ' . $this->user->lname,
                        'email' =>$this->user->email,
                        'memtype' =>$this->user->memtype,
                        'date' => now('EST'),
                        'amount' => $this->amount
                   ])
                   ;
                   
    }
}
