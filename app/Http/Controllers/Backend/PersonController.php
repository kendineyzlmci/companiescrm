<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $redirectUrl = 'company/show/' . $request->get('company_id') . '#companyperson';

        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'company_id' => 'required'
        ]);

        $person = new Person();
        $person->name = $request->get('name');
        $person->surname = $request->get('surname');
        $person->title = $request->get('title');
        $person->phone = $request->get('phone');
        $person->email = $request->get('email');
        $person->company_id = $request->get('company_id');
        $person->save();

        if($person){
            toastr()->success("Personel eklendi.");
            return redirect($redirectUrl);
        }

        toastr()->error('Personel eklenirken bir sorun oluştu!');
        return redirect($redirectUrl);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id): bool
    {
        $redirectUrl = 'company/show/' . $request->get('company_id') . '#companyperson';

        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'company_id' => 'required'
        ]);

        $person = Person::findOrFail($id);
        $person->name = $request->get('name');
        $person->surname = $request->get('surname');
        $person->title = $request->get('title');
        $person->phone = $request->get('phone');
        $person->email = $request->get('email');
        $person->company_id = $request->get('company_id');
        $person->save();

        if($person){
            toastr()->success("Personel güncellendi.");
            return redirect($redirectUrl);
        }

        toastr()->error('Personel güncellenirken bir sorun oluştu!');
        return redirect($redirectUrl);
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id): bool
    {
        $personInfo = Person::where('id', $id)->first();
        $destroy = Person::destroy($id);

        if($destroy){
            toastr()->success('Silme İşlemi Başarıyla Gerçekleşti!');
            return redirect('company/show/' . $personInfo->company_id . '#companyperson');
        }

        toastr()->error('Silme İşlemi Yapılırken Bir Sorun Oluştu!');
        return redirect('company/show/' . $personInfo->company_id . '#companyperson');
    }
}
