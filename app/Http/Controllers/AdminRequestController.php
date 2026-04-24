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

    // Approve a request
    public function approve($id)
    {
        $mangaRequest = MangaRequest::findOrFail($id);

        $mangaRequest->status = 'approved';
        $mangaRequest->save();

        return redirect('/admin/requests')
            ->with('success', 'Manga request approved successfully.');
    }

    // Reject a request
    public function reject($id)
    {
        $mangaRequest = MangaRequest::findOrFail($id);

        $mangaRequest->status = 'rejected';
        $mangaRequest->save();

        return redirect('/admin/requests')
            ->with('success', 'Manga request rejected successfully.');
    }
}