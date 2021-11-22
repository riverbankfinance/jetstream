<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use PHPUnit\Framework\Constraint\Operator;

class LeadsController extends Controller
{
    public function list()
    {
        $userId=Auth::user()->id;
        $leads = Lead::query()
            ->where('user_id', $userId)
            ->orderByDesc('id')
            ->get();

        return Inertia::render('Leads/List', [
            'leads' => $leads
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'goal' => '',
            'message' => '',
            'loan_type' => '',
        ]);

        Lead::create([
            'fullName' => $postData['fullName'],
            'email' => $postData['email'],
            'loan_type' => $postData['loan_type'],
            'message' => $postData['message'],
            'phone' => $postData['phone'],
            'goal' => $postData['goal'],
            'user_id' => Auth::user()->id,
        ]);

        Return redirect()->route('leads.list');
    }
}
