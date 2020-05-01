<?php
/**
 * Add Events Here
 *
 * Each Event request must have a corresponding Event Command Class
 *
 */

return [
    'identifyYourself' => '\App\Http\Events\Identity',
    'createBooking' => '\App\Http\Events\CreateBooking',
    'searchHotel' => '\App\Http\Events\SearchHotel'
];
