<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ContactUsMessage;
use Auth;

class AdminMenuComposer
{
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $sno = 0;
        $mno = 0;
        $mno = ContactUsMessage::where('seen','0')->count();
        // if (Auth::user()->roles()->where('title', '=', 'Service Support Messages')->exists())
        //     $sno = ServiceSupportMessage::where('seen','0')->count();
        $view->with('mno',$mno);
    }
}