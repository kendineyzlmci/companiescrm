<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\CompanyAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyAdressController extends Controller
{

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $id)
    {
        $companyCtrl = Company::where('id', $id)->count();

        if ($companyCtrl != 0) {
            $companyInfo = Company::where('id',$id)->first();
            return view('backend.company.add_contact',['companyInfo'=>$companyInfo]);
        }

        abort(404);
    }


    /**
     * @param Request $request
     * @param int $id
     */
    public function store(Request $request, int $id)
    {
        $input =$request->except('_token');

        $arr_tojson = json_encode($input);

        $companyaddress = new CompanyAddress();
        $companyaddress->company_id = $id;
        $companyaddress->addresses = $arr_tojson;
        $companyaddress->save();

        if($companyaddress){
            toastr()->success("Adres bilgisi eklendi.");
            return redirect('company/show/' . $id . '#companycontact');
        }

        toastr()->error('Adres bilgisi eklenirken bir sorun oluştu!');
        return redirect('company/show/' . $id . '#companycontact');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $companyAddressCtrl = CompanyAddress::where('id', $id)->count();

        if ($companyAddressCtrl != 0) {
            $companyAddressInfo = CompanyAddress::with('company')->where('id',$id)->first();
            return view('backend.company.edit_contact',['companyAddressInfo'=>$companyAddressInfo]);
        }

        abort(404);
    }


    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id): bool
    {
        $addressInfo = CompanyAddress::where('id', $id)->first();

        $input =$request->except('_token');

        $arr_tojson = json_encode($input);

        $companyaddress = CompanyAddress::findOrFail($id);
        $companyaddress->addresses = $arr_tojson;
        $companyaddress->save();

        if($companyaddress){
            toastr()->success("Adres bilgisi güncellendi.");
            return redirect('company/show/' . $addressInfo->company_id . '#companycontact');
        }

        toastr()->error('Adres bilgisi güncellenirken bir sorun oluştu!');
        return redirect('company/show/' . $addressInfo->company_id . '#companycontact');
    }

    /**
     * @param int $id
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id): bool
    {
        $addressInfo = CompanyAddress::where('id', $id)->first();
        $destroy = CompanyAddress::destroy($id);

        if($destroy){
            toastr()->success('Silme İşlemi Başarıyla Gerçekleşti!');
            return redirect('company/show/' . $addressInfo->id . '#companycontact');
        }

        toastr()->error('Silme İşlemi Yapılırken Bir Sorun Oluştu!');

        return redirect('company/show/' . $addressInfo->$id . '#companycontact');
    }
}
