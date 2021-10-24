<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class PagesController extends Controller {
	public function show($slug) {
		$page = Page::withTranslations()->where('slug', $slug)->latest()->first();
		return view('frontend.page', ['page' => $page]);
	}
}
