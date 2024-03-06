<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderByRaw("FIELD(status, 'new', 'seen', 'client')")->get();
    
        return view('admin.leads.index', compact('leads'));
    }
        

    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            // Boshqa maydonlar validatsiyasi
            'status' => 'required|in:new,seen,client'
        ]);
    
        $lead->update($validatedData);
        $lead->refresh(); // Modelni qayta yuklash

        Log::info('Updated lead status:', ['status' => $lead->status]);
    
        return redirect()->route('leads.index')->with('success', 'Lead successfully updated.');
    }
    

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('leads.index')
                         ->with('success', 'Lead deleted successfully.');
    }
}

