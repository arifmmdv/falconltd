<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $page = Page::find(1);
        $translator = $this->translator;
        return view('templates.home',compact('page','translator'));
    }
    public function locale($locale) {
        App::setLocale($locale);
        $page = Page::find(1);
        $translator = $this->translator;
        return view('templates.home',compact('page','translator'));
    }
    public function page($locale,$slug) {
        App::setLocale($locale);
        $page = Page::where('parent_id',null)->where('slug',$slug)->firstOrFail();
        if (isset($page->template)) {
            $template_name = $page->template->name;
        } else {
            $template_name = 'content';
        }
        $translator = $this->translator;
        return view("templates.{$template_name }",compact('page','translator'));
    }

    public function child($locale, $parent, $slug) {
        App::setLocale($locale);
        $page = Page::where('parent_id','!=',0)->where('slug',$slug)->firstOrFail();
        if (isset($page->template)) {
            $template_name = $page->template->name;
        } else {
            $template_name = 'content';
        }
        $translator = $this->translator;
        return view("templates.{$template_name}",compact('page','translator'));
    }

    public function product($locale, $slug) {
        App::setLocale($locale);
        $page = Page::where('parent_id',null)->where('slug','mehsullar')->firstOrFail();
        $product = Product::where('is_visible',1)->where('slug',$slug)->firstOrFail();
        $translator = $this->translator;
        return view("templates.product",compact('page','product','translator'));
    }

    public function blog($locale, $slug) {
        App::setLocale($locale);
        $page = Page::find(7);
        $blog = Page::where(['is_visible' => 1,'slug' => $slug, 'parent_id' => 7])->firstOrFail();
        $translator = $this->translator;
        return view("templates.blog_details",compact('page','blog','translator'));
    }
}
