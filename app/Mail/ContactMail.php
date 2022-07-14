<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  protected $contact;

  public function __construct($contact)
  {
    $this->contact = $contact;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    // dd($this);
    return $this
      ->from('hello@example.com')
      ->subject('問い合わせ')
      ->view('mail')
      ->with(['contact' => $this->contact]);
  }
}
