<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{



    public function subscribe(){
        $email = 'stylishm123@gmail.com';

        event(new UserSubscribed($email));
        return back();
    }
}
