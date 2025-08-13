<?php

namespace App\Helpers;

class Toast
{
    /**
     * Create a new class instance.
     */
    public static function show()
    {
        session()->flash('toast');
    }
}
