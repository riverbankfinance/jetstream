<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Operator;

class LeadsController extends Controller
{
    private $validations;

    public function __construct()
    {
        $this->validations= [
            'fullName' => 'required',
            'email' => 'sometimes|email|nullable',
            'phone' => 'nullable',
            'status' => 'required|integer',
            'goal' => '',
            'message' => '',
            'loan_type' => '',
            'user_id' => '',
            'birthday' => '',
            'fullNameCoborrower' => '',
            'emailCoborrower' => 'sometimes|email|nullable',
            'birthdayCoborrower' => '',
            'phoneCoborrower' => '',
            'address' => '',
            'city' => '',
            'state' => '',
            'zip' => 'sometimes|numeric|nullable',
            'url' => 'sometimes|url|nullable',
            'ip' => 'sometimes|ip|nullable',
            'agent' => '',
            'referringUrl' => '',
            'noText' => 'boolean|nullable',
            'rating' => 'sometimes|numeric|nullable',
            'floifyLoan' => 'sometimes|numeric|nullable',
            'credit' => '',
            'closed' => '',
        ];
    }

    public function list()
    {
        $userId=Auth::user()->id;
        $leads = Lead::query()
            ->where('user_id', $userId)
            ->orderByDesc('id')
            ->get();

        // $leads = DB::table('leads')->get();

        return Inertia::render('Leads/List', [
            'leads' => $leads
        ]);
    }

    public function search(Request $request)
    {
        $userId=Auth::user()->id;
        $leads = Lead::query()
            ->where('fullName', 'like', '%' . $request->str . '%')
            ->orWhere('email', 'like', '%'.$request->str.'%')
            ->orWhere('phone', 'like', '%'.$request->str.'%')
            ->orderByDesc('id')
            ->get();
      //  $leads = $leads->paginate(1);
        // $leads = $leads->appends($request->all());

        // $leads = DB::table('leads')->get();
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
            'user_id' => Auth::user()->id,
            'fullName' => $postData['fullName'],
            'email' => $postData['email'],
            'loan_type' => $postData['loan_type'],
            'message' => $postData['message'],
            'birthday' => $postData['birthday'],
            'phone' => $postData['phone'],
            'goal' => $postData['goal'],
            'status' => $postData['status'],
            'birthday' => $postData['birthday'],
            'fullNameCoborrower' => $postData['fullNameCoborrower'],
            'emailCoborrower' => $postData['emailCoborrower'],
            'birthdayCoborrower' => $postData['birthdayCoborrower'],
            'phoneCoborrower' => $postData['phoneCoborrower'],
            'address' => $postData['address'],
            'city' => $postData['city'],
            'state' => $postData['state'],
            'zip' => $postData['zip'],
            'url' => $postData['url'],
            'ip' => $postData['ip'],
            'agent' => $postData['agent'],
            'referringUrl' => $postData['referringUrl'],
            'noText' => $postData['noText'],
            'rating' => $postData['rating'],
            'noText' => $postData['noText'],
            'floifyLoan' => $postData['floifyLoan'],
            'credit' => $postData['credit'],
            'closed' => $postData['closed'],
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

        Lead::where('id', $postData['id'])->update($postData);

        $request->session()->flash('flash.banner', 'Lead Updated!');
        $request->session()->flash('flash.bannerStyle', 'success');
        return redirect()->back();
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        request()->session()->flash('flash.banner', 'Lead Successfully Deleted!');
        request()->session()->flash('flash.bannerStyle', 'success');
        return redirect()->back();
    }

}
