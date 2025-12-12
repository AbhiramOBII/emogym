<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'all'); // all, image, video
        
        $query = Gallery::active()->ordered();
        
        if ($type === 'image') {
            $query->images();
        } elseif ($type === 'video') {
            $query->videos();
        }
        
        $items = $query->paginate(12);
        
        return view('pages.gallery', compact('items', 'type'));
    }
}
