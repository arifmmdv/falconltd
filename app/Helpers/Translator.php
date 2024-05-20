<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Translator {
    public function translate($item,$property): string
    {
        if (App::getLocale() === 'tr') {
            if (isset($item[$property.'_tr']) && !empty($item[$property.'_tr'])) {
                return $item[$property.'_tr'];
            } else {
                return $item[$property];
            }
        } else {
            return $item[$property];
        }
    }
}
