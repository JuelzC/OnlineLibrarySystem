<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MangaRequest;

class AdminRequestController extends Controller
{
    
    public function index()
    {
        $requests = MangaRequest::orderBy('request_id', 'DESC')->get();

        return view('admin-requests', compact('requests'));
    }

    
    public function approve($id)
    {
        $mangaRequest = MangaRequest::findOrFail($id);

        $mangaRequest->status = 'approved';
        $mangaRequest->save();

        return redirect('/admin/requests')
            ->with('success', 'Manga request approved successfully.');
    }

    
    public function reject($id)
    {
        $mangaRequest = MangaRequest::findOrFail($id);

        $mangaRequest->delete();

        return redirect('/admin/requests')
            ->with('success', 'Manga request rejected and removed successfully.');
    }
}