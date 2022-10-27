<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
  
    public function index()
    {
        //57:20
        
        //$companies = Company::all();
        $datos['companies'] = Company::paginate(3);
        return view('company.index',$datos);
       // return response()->json([
       //"results"=>$companies
        //],Response::HTTP_OK);
    }
    public function create(){
        return view('company.create');
    }
  public function store(Request $request)
    {
        //validar datos
        $request->validate([
            "name" => "required",
            "email" =>"required",
            "logo" =>"required",
            "website" =>""
        ]);
        if($request->hasFile('logo')){
            $logo=$request->file('logo')->store('uploads','public');
        }
        // dar de alta 
        $company=Company::create([
             "name"=> $request->name,
             "email"=>$request->email,
             "logo"=>$logo,
             "website"=>$request->website
        ]);
    //devolvemos una respuesta
        //return response()->json([
        //   "result"=>$company
        //],Response::HTTP_OK);
        return redirect('company')->with('mensaje','New company added!');
    }

    public function show($id)
    {
        $company=Company::findOrFail($id);
        return $company;
    }
    public function edit($id){
        $company=Company::findOrFail($id);
        return view('company.edit',\compact('company'));

    }

    public function update(Request $request, $id)
    {
        //tenemos que validar los datos
        $request->validate([
            "name" => "required",
            "email" =>"required",
            "logo" =>"required",
            "website" =>""
        ]);
        if($request->hasFile('logo')){
            $company=Company::findOrFail($id);
            Storage::delete(['public/'.'$company->logo']);
            $logo=$request->file('logo')->store('uploads','public');
        }
        

        //actualizamos la base de datos
        $company = Company::find($id);
        $company->name=$request->name;
        $company->email=$request->email;
        $company->logo=$logo;
        $company->website=$request->website;
        $company->save();
        //devolvemos
        return view('company.edit',compact('company'));
       // return response()->json([
       //     "result" => $company
       // ],Response::HTTP_OK);
    }

    public function destroy($id)
    {
        //
        $company=Company::findOrFail($id);
        Storage::delete('public/'.$company->logo);
        Company::findOrFail($id)->delete();
        
        return redirect('company')->with('mensaje','A company deleted!');
        //return response()->json([
        //    "result" => "company eliminated"
        //],Response::HTTP_OK);       
    }
}
