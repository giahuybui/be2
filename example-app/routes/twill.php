<?php

use A17\Twill\Facades\TwillRoutes;

// Register Twill routes here eg.
// TwillRoutes::module('posts');

TwillRoutes::module('pages');
TwillRoutes::module('phone');
TwillRoutes::module('pCs');
TwillRoutes::module('menuLinks');

Route::group(['prefix' => 'work'], function () {
    Route::group(['prefix' => 'projects'], function () {
        TwillRoutes::module('projectCustomers');
    });
    TwillRoutes::module('projects');
    TwillRoutes::module('clients');
    TwillRoutes::module('industries');
    TwillRoutes::module('studios');
});
TwillRoutes::module('projects');