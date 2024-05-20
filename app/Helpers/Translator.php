<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Translator {
    public function translate($item,$property): string
    {
        if (App::getLocale() === 'en') {
            if (isset($item[$property.'_en']) && !empty($item[$property.'_en'])) {
                return $item[$property.'_en'];
            } else {
                return $item[$property];
            }
        } elseif (App::getLocale() === 'ru') {
            if (isset($item[$property.'_ru']) && !empty($item[$property.'_ru'])) {
                return $item[$property.'_ru'];
            } else {
                return $item[$property];
            }
        } else {
            return $item[$property];
        }
    }
}
