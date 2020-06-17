<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\Auth;




class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $company = Company::all();
        $company = Company::paginate(10);


        // $company = Company::paginate(5);


        return view('company.index', ['company' => $company]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $validatedData = $request->validated();
       $name = $validatedData['name'];
        $email = $validatedData['email'];

         $website = $validatedData['website'];

        if($file = $request->hasFile('logo')) {
            
            $file = $request->file('logo') ;
            
            $fileName = time().'.'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $logo = $fileName ;
        }


        $data= [
            'name' => $name,
            'email' => $email,
            'logo' => $logo,
            'website' => $website

        ];


        $Company = Company::create($data);

         $request->session()->flash('status', 'Company has been created!');

        return redirect()->route('companies.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('company.edit', ['companies' => Company::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, $id)
    {
        $validatedData = $request->validated();
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $website = $validatedData['website'];

        if($file = $request->hasFile('logo')) {
            
            $file = $request->file('logo') ;
            
            $fileName = time().'.'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $logo = $fileName ;
        }


        $data= [
            'name' => $name,
            'email' => $email,
            'logo' => $logo,
            'website' => $website
        ];



        $Company = Company::findOrFail($id);
        $Company->fill($data);
        $Company->save();
        $request->session()->flash('status', 'Company has been updated!');


        return redirect()->route('companies.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        Company::destroy($id);

        $request->session()->flash('status',  'Company has been deleted!');
      return redirect()->route('companies.index');
    }
}
