<?php

namespace Org\Core\Listeners;

use Core;

class DemoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        info(sprintf('"%s" => From %s.', Core::inspire(), get_class($this)));
    }
}
