<?php

/**
* set ative menu item
* using Route::currentRouteNamed class method
*/
function set_active_route($path, $active = 'is-active') {

    return call_user_func_array('Route::currentRouteNamed', (array)$path) ? $active : '';

}
