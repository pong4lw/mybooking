<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Models\Shops;

class MailController extends Controller
{
  static public function staffregister(){
    $email = $_REQUEST['email'];
    $name = '';
    $text = '登録しました。';
    $to = 'hiroki.hon@gmail.com';

    Mail::to($to)->send(new RegisterMail($name, $text));
  }

  static public function userregister($name,$email,$password){
  	$shopName = Shops::$shopArray[Shops::$shopId];
    $text = $name .'様 \n\r '.$shopName.'店に登録しました。\r\n パスワード'.$password;
    $to = $email;
    Mail::to($to)->send(new RegisterMail($name, $text));
  }

  static public function scheduleMail($user,$schedule){
    $shopName = Shops::$shopArray[Shops::$shopId];
    $text = $user->name ?? ''.'様 \n\r '.$shopName.'店の予約ありがとうございます。\r\n日時\r\n ';
    $to = $user['email'];
    Mail::to($to)->send(new RegisterMail($user->name, $text));
  }

  static public function staffmessage(){
    $name = '';
    $text = '登録しました。';
    $to = 'hiroki.hon@gmail.com';

    Mail::to($to)->send(new RegisterMail($name, $text));
  }

  static public function usermessage(){
    $text = $_REQUEST['text'];
    $to = $_REQUEST['email'];

    $name = '';

    Mail::to($to)->send(new RegisterMail($name, $text));
  }


}
