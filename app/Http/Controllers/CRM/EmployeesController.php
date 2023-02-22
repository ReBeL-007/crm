<?php

namespace App\Http\Controllers\CRM;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CRM\Employee\StoreEmployeeRequest;
use App\Http\Requests\CRM\Employee\UpdateEmployeeRequest;
use App\Http\Requests\CRM\Employee\MassDestroyEmployeeRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->with('company')->simplePaginate(10);
        return view('crm.employees.index', ['datas' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id')->prepend('Select Company', '');

        return view('crm.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = [
            'firstname' =>$request->firstname,
            'lastname' =>$request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
            ];

        Employee::create($data);
        return redirect()->route('crm.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('crm.employees.show', ['data' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name','id')->prepend('Select Company', '');
        return view('crm.employees.edit', ['data' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = [
            'firstname' =>$request->firstname,
            'lastname' =>$request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
            ];

        $employee->update($data);

        return redirect()->route('crm.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
