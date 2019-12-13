<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\Shops;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    protected $username;
    protected $footer;

    public function __construct($shopname, $text){
    
    $this->username;
    $this->title = sprintf('%s店登録のお知らせ', $shopname);
    $this->text = $text;
    $this->footer = 'このメールは自動返信のメールです。 
        心当たりのない場合は店舗までお問い合わせください。
        トレーニングジム https://mybooking.jp/';
    }

    public function build()
    {
        $shopId = Shops::$shopId;
        $shopname = Shops::$shopArray[$shopId];
 
        return $this->view('emails.addstaffs')
                    ->text('emails.addstaffs_plain')
                    ->subject($this->title)
                    ->with([
                        'username' => $this->username,
                        'text' => $this->text,
                        'shopname' =>$shopname,
                      ]);
 
    }
}   