<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class MailController extends Controller
{
  public function staffregister(){

    $name = '';
    $text = 'これからもよろしくお願いいたします。';
    $to = 'hiroki.hon@gmail.com';

    Mail::to($to)->send(new RegisterMail($name, $text));
  }
}
