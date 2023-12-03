<?php

namespace App\Http\Controllers;
use App\Models\Chapters;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ChapterController extends Controller
{
          /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = Chapters::orderBy('created_at')->get();

        return Inertia::render('Uploads', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Uploads.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Chapters::create($request->all());
        
        return Inertia::render('Uploads')->with('success', 'Chapters added successfully');    
    }
}
