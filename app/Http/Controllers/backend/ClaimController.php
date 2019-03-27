<?php

namespace App\Http\Controllers\backend;

use App\Models\Claim;
use App\Models\MedicalService;
use App\Models\Patient;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.claims.index', ['claims' => Claim::where('hp_id', auth()->guard('admin')->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $services = MedicalService::all();
        return view('backend.claims.form', compact('patients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = Patient::find($request->patient_id);
        $service = MedicalService::find($request->service_id);
        $inputs = $request->only(['patient_id', 'service_id']);
        $inputs['hp_id'] = auth()->guard('admin')->user()->id;
        $inputs['company_id'] = $patient->company->id;
        $inputs['cost'] = $service->cost;

        $claim = Claim::create($inputs);
        if ($claim) {
            return redirect()->route('claims.index')->with('msg', trans('common.saved'));
        }
        return back()->with('msg', trans('common.error'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Claim::whereId($id)->delete();
        return back();
    }

    public function claimsForMoney()
    {

        $claims = Claim::where('company_id', auth()->guard('admin')->user()->id)->get();
        return view('backend.claims.money_claims', ['claims' => $claims]);
    }

    public function confirmPayment($id)
    {
        $claim = Claim::find($id);
        return view('backend.claims.confirm_payment', ['claim' => $claim]);
    }

    public function saveTransaction(Request $request)
    {
        $claim = Claim::find($request->claim_id);
        $claim->status = 'transferred';
        $claim->save();

        $patient = Patient::find($claim->patient->id);
        $patient->credit = $patient->credit - $claim->cost;
        $patient->save();

        $transaction = new Transaction;
        $transaction->patient_id = $patient->id;
        $transaction->service_id = $claim->service_id;
        $transaction->claim_id = $claim->id;
        $transaction->company_id = $claim->company_id;
        $transaction->cost = $claim->cost;
        $transaction->payment_status = 'done';
        $transaction->save();

        return redirect()->route('admin.claims.money')->with('msg', trans('common.saved'));
    }
}
