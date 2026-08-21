<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use Illuminate\View\View;

class SuccessStoryController extends Controller
{
    public function index(): View
    {
        $stories = SuccessStory::active()->orderBy('sort_order')->get();

        return view('frontend.success-stories', [
            'stories' => $stories,
            'storiesJson' => $stories->map(fn (SuccessStory $story) => $story->toStoryArray())->values(),
        ]);
    }
}
