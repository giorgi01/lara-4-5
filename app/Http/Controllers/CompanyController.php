<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index(){
        $companies = Company::all();
        return view('all-company')->with('companies', $companies);
    }

    public function addCompany(Request $request){
        Company::create([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country
        ]);
        return redirect()->route('companies.all');
    }

    public function editCompany(Request $request, $id)
    {
        $company = Company::where('id', $id)->first();

        $employees = Company::join('employees', 'companies.id', '=', 'employees.company_id')
            ->where('employees.company_id', '=', $id)
            ->select(
                'employees.*',
                'employees.name as name',
                'employees.lastname as lastname',
                'employees.personal_id as personal_id',
            )->get();

        $data = [
            'company' => $company,
            'employees' => $employees
        ];

        return view('edit-company')->with($data);
    }

    public function updateCompany(Request $request, $id)
    {
        $company = Company::where('id', $id)->first();
        $company->name = $request->name;
        $company->code = $request->code;
        $company->address = $request->address;
        $company->city = $request->city;
        $company->country = $request->country;

        $company->save();

        return redirect()->route('companies.all');
    }

    public function deleteCompany(Request $request)
    {
        Company::where('id', $request->company_id)->delete();

        return redirect()->route('companies.all');
    }
}
