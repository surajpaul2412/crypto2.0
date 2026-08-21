<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\TeamMember;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('frontend.about', [
            'teamMembers' => TeamMember::active()->orderBy('sort_order')->get(),
            'galleryImages' => GalleryImage::active()->orderBy('sort_order')->get(),
        ]);
    }
}
