@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Şirketler</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ route('company.create') }}" class="ml-3 btn-floating waves-effect waves-light cyan tooltipped right" data-position="bottom" data-tooltip="Görev Ekle"><i class="material-icons left">add</i></a>
    </div>
@endsection
@section('content')
    <section class="users-list-wrapper section">
        <div class="users-list-table">
            <div class="card">
                <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="users-list-datatable" class="table">
                            <thead>
                            <tr>
                                <th>Şirket Adı</th>
                                <th class="text-center">Web Sitesi</th>
                                <th class="text-center">Ekleme</th>
                                <th class="text-center">Güncelleme</th>
                                <th class="text-center">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company as $key => $value)
                                <tr>
                                    <td>
                                        <a href="{{ route('company.show',['id'=>$value->id]) }}">
                                            {{ $value->name }}
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{ $value->website }}" target="_blank">{{ $value->website }}</a></td>
                                    <td class="text-center">{{ $value->CompanyCreatedAtDate }}</td>
                                    <td class="text-center">{{ $value->CompanyUpdatedAtDate }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('company.edit',['id'=>$value->id]) }}" class="green-text tooltipped" data-position="bottom" data-tooltip="Düzenle">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="{{ route('company.show',['id'=>$value->id]) }}" class="blue-text tooltipped" data-position="bottom" data-tooltip="Görüntüle">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                        <a href="{{ route('company.destroy',['id'=>$value->id]) }}" class="red-text tooltipped" data-position="bottom" data-tooltip="Sil">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8">{{ $company->links() }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </section>
@endsection
