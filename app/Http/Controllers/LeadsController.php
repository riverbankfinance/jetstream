<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use PHPUnit\Framework\Constraint\Operator;

class LeadsController extends Controller
{
    private $validations;

    public function __construct()
    {
        $this->validations= [
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'goal' => '',
            'message' => '',
            'loan_type' => '',
        ];
    }

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
        $postData = $this->validate($request, $this->validations);

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

    public function view(Lead $lead){

        return Inertia::render('Leads/LeadView', [
            'leadProp' => $lead
        ]);
    }

    public function update(Request $request){
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';

        $postData = $this->validate($request, $rules);

        $lead = Lead::where('id', $postData['id'])->update($postData);


        //$request->session()->flash('alert-success', 'User was successful added!');
        //return redirect()->route('lead.view', ['lead' => $postData['id']]);
        //return redirect()->back()->with('success_message', 'Yay it worked');
        return redirect()->back()->with('success', 'Lead Updated!');
    }
}
