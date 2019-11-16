<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shopname, $text)
    {
      $this->title = sprintf('%s店登録のお知らせ', $shopname);
      $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.addstaffs')
                    ->text('emails.addstaffs_plain')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                      ]);
    }
}