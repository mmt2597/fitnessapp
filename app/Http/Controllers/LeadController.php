<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lead;
use Carbon\Carbon;


class LeadController extends Controller
{
    private $validations;

    /**
     * LeadController constructor.
     */
    public function __construct()
    {
        $this->validations = [
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'phone' => 'required',
            'interested_package' => 'sometimes'
        ];
    }

    public function list()
    {
        $leads = Lead::query()
                    ->where('branch_id', 1)
                    ->orderByDesc('id')
                    ->get();

        $data = [
            'leads' => $leads,
        ];

        return Inertia::render('Leads/Index', $data);
    }

    public function create()
    {
    	return Inertia::render('Leads/LeadAdd');
    }

    public function store(Request $request)
    {
    	$postData = $this->validate($request, $this->validations);

    	$package = '';
    	if($request->has('interested_package')) {
    		$package = $request->input('interested_package');
    	}

        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;

    	Lead::create([
			'name' => $request->name,
			'email' => $request->email,
			'dob' => $request->dob,
			'phone' => $request->phone,
			'interested_package' => $package,
			'branch_id' => 1,
			'age' => $age,
			'added_by' => auth()->user()->id,
    	]);

    	return redirect()->route('lead.list');
    }

    public function update(Request $request)
    {
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';

        $postData = $this->validate($request, $rules);
        $postData['age'] = Carbon::parse($postData['dob'])->age;
        $lead = Lead::where('id', $postData['id'])->update($postData);

        return redirect()->route('lead.view', ['lead' => $postData['id']]);
    }

    public function view(Lead $lead)
    {
        return Inertia::render('Leads/LeadView', ['lead-prop' => $lead]);
    }
}
