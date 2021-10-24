<?php

if (!function_exists('getCartTotal')) {
    function getCartTotal()
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            return Cart::session($userId)->getTotal();



        } else {
            return 0;
        }
    }
}

if (!function_exists('getCartQuantity')) {
    function getCartQuantity()
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            return Cart::session($userId)->getContent()->count();
        } else {
            return 0;
        }
    }
}
