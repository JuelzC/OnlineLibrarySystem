<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function index()
    {
        $pendingAdmins = User::where('role_id', 2)
            ->where('account_approval', false)
            ->get();

        return view('admin.approvals', compact('pendingAdmins'));
    }

    public function approve($id)
    {
        $admin = User::findOrFail($id);

        $admin->account_approval = true;
        $admin->save();

        return redirect()
            ->back()
            ->with('success', 'Admin approved successfully.');
    }

    public function reject($id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();

        return redirect()
            ->back()
            ->with('success', 'Admin rejected successfully.');
    }
}
