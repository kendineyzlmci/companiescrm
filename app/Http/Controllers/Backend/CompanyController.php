<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\CompanyAddress;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $company = \App\Company::paginate(10);
        return view('backend.company.index',['company'=>$company]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.company.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'website' => 'required|string|min:2|max:255'
        ]);

        $company = new Company();
        $company->name = $request->get('name');
        $company->website = $request->get('website');
        $company->html = html_copier($request->get('website'));
        $company->image = screen_shot($request->get('website'));
        $company->save();

        if($company){
            toastr()->success("Şirket eklendi.");
            return redirect()->route('company.show',['id'=>$company->id]);
        }

        toastr()->error('Şirket eklenirken bir sorun oluştu!');
        return back();
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $companyCtrl = Company::where('id', $id)->count();
        if ($companyCtrl != 0) {
            $companyInfo = Company::where('id',$id)->first();
            return view('backend.company.show',['companyInfo'=>$companyInfo]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $companyCtrl = Company::where('id', $id)->count();

        if ($companyCtrl != 0) {
            $companyInfo = Company::where('id',$id)->first();
            return view('backend.company.edit',['companyInfo'=>$companyInfo]);
        }

        abort(404);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'website' => 'required|string|min:2|max:255'
        ]);

        $company = Company::findOrFail($id);

        $company->name = $request->get('name');
        $company->website = $request->get('website');
        $company->html = html_copier($request->get('website'));
        $company->image = screen_shot($request->get('website'));

        $company->save();

        if($company) {
            toastr()->success("Şirket başarıyla güncellendi.");;
            return redirect()->route('company.show',['id'=>$company->id]);
        }

        toastr()->error('Şirket bilgileri güncellenirken bir sorun oluştu!');
        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function website(int $id)
    {
        $companyCtrl = Company::where('id', $id)->count();

        if ($companyCtrl != 0) {
            $companyInfo = Company::where('id',$id)->first();
            return view('backend.company.website',['companyInfo'=>$companyInfo]);
        }

        abort(404);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $destroy = Company::destroy($id);

        if($destroy){
            toastr()->success('Silme İşlemi Başarıyla Gerçekleşti!');
            return redirect('company/list');
        }

        toastr()->error('Silme İşlemi Yapılırken Bir Sorun Oluştu!');
        return redirect('company/list');
    }
}
