<?php defined('SYSPATH') or die('No direct script access.');

/* catch all routes for xgffmpeg */
Route::set('xgffmpeg', 'xgffmpeg(.*)')
    ->defaults(array(
        'controller' => 'xgffmpeg',
        'action'     => 'index'
    ));
