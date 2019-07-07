<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => array('index')]);
    }

    public function index($id, Company $company)
    {
    	return view('company.index', compact('company'));
    }

    public function create()
    {
    	return view('company.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' =>'required',
            'description' => 'required|min:20',
            'slogan' => 'required|min:20',
            'website' => 'required',
            'phone' => 'required|min:10|numeric',
        ]);

    	$user_id = auth()->user()->id;
    	Company::where('user_id', $user_id)->update([
    		'address' => request('address'),
    		'description' => request('description'),
    		'website' => request('website'),
    		'phone' => request('phone'),
    		'slogan' => request('slogan'),
    	]);
    	return redirect()->back()->with('message', 'Company Information Successfully Updated!');
    }

    public function coverphoto(Request $request)
    {

        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

    	$user_id = auth()->user()->id;
    	if($request->hasFile('cover_photo'))
    	{
    		$file = $request->file('cover_photo');
    		$ext = $file->getClientOriginalExtension();
    		$filename = time().'.'.$ext;
    		$file->move('uploads/coverphoto/', $filename);
    		Company::where('user_id', $user_id)->update([
    			'cover_photo' => $filename,
    		]);

    		return redirect()->back()->with('message', 'Company Cover Photo Successfully Updated!');
    	}
    }

    public function companylogo(Request $request)
    {

        $this->validate($request, [
            'logo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

    	$user_id = auth()->user()->id;
    	if($request->hasFile('logo'))
    	{
    		$file = $request->file('logo');
    		$ext = $file->getClientOriginalExtension();
    		$filename = time().'.'.$ext;
    		$file->move('uploads/logo/', $filename);
    		Company::where('user_id', $user_id)->update([
    			'logo' => $filename,
    		]);

    		return redirect()->back()->with('message', 'Company Logo Successfully Updated!');
    	}
    }

}
