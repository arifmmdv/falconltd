<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\App;
use App\Helpers\Translator;

class FrontEndController extends Controller
{
    protected $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function index() {
        $pages = Page::all();
        $translator = $this->translator;
        return view('templates.home',compact('pages','translator'));
    }
    public function locale($locale) {
        App::setLocale($locale);
        $pages = Page::all();
        $translator = $this->translator;
        return view('templates.home',compact('pages','translator'));
    }

}
