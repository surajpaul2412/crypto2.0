<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;

class CollaborationController extends Controller
{
    public function index(): View
    {
        return view('frontend.collaboration', [
            'faqs' => Faq::forPageOrdered('collaboration'),
        ]);
    }
}
