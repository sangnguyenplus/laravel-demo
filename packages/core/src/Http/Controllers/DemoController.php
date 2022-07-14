<?php

namespace Org\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Core;

class DemoController extends Controller
{
    public function demo()
    {
        event(new \Org\Core\Events\DemoEvent());

        return Core::inspire();
    }

    public function demo2()
    {
        return view('org/core::demo2');
    }

    public function demo3()
    {
        return view('org/core::demo3');
    }
}
