<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response;
class EmployerController extends Controller
{
 
    public function index()
    {
        $datos['employers'] = Employer::paginate(3);
        return view('employer.index',$datos);
/*         $employers = Employer::all();
        return response()->json([
            "results"=>$employers
        ],Response::HTTP_OK); */
    }
    public function create(){
        return view('employer.create');
    }
    public function store(Request $request)
    {
       //validar datos
       $request->validate([
        "name" => "required|string",
        "lastName" =>"required|string",
        "email" =>"required|string",
        "phone" => "required|string",
        "company_id" => "required"
        ]);

    $company = Company::findOrFail($request->company_id);
       // dar de alta 
    $employer = $company->employers()->create([
        'name' => $request->name,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'phone' =>$request->phone,
    ]);
/*     //devolvemos una respuesta
    return response()->json([
        "result"=>$employer
    ],Response::HTTP_OK); */
    return redirect('employer')->with('mensaje','New employer added!');

    }
    public function show($id)
    {
        $employer=Employer::findOrFail($id);
        return $employer;
    }
 /*    public function show($id)
    {
        $employer = Employer::Find($id);
        return response()->json([
            "result"=>$employer
        ],Response::HTTP_OK);
    }
 */
public function edit($id){
    $employer=Employer::findOrFail($id);
    return view('employer.edit',\compact('employer'));

}

    public function update(Request $request, $employer_id)
    {
       //validar datos
       $request->validate([
        "name" => "required|string",
        "lastName" =>"required|string",
        "email" =>"required|string",
        "phone" => "required|string",
        "company_id" => "required"
        ]);
               
        $company = Company::findOrFail($request->company_id);
 
        $employer=$company->employers()->where('id',$employer_id)->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' =>$request->phone,
        ]);
        return view('employer.edit',compact('employer'));
/*         return response()->json([
            "message"=>"Employer updated",
            "result" => $employer
        ],Response::HTTP_OK); */
        
    }

    public function destroy($id)
    {
        Employer::findOrFail($id)->delete();
        return redirect('employer')->with('mensaje','A employer deleted!');
/* 
        return response()->json([
            "message"=>"Employer deleted"
    
        ],Response::HTTP_OK); */
    }
}
