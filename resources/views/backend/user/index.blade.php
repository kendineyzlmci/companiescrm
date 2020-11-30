@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Kullanıcılar</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ route('users.add') }}" class="ml-3 btn-floating waves-effect waves-light cyan tooltipped right" data-position="bottom" data-tooltip="Kullanıcı Ekle"><i class="material-icons left">add</i></a>
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
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Eposta</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\User::all() as $key => $value)
                                    <tr>
                                        <td><img src="{{ $value->image }}" class="avatar-status avatar-online"></td>
                                        <td>
                                            <a href="{{ route('users.detail',['id'=>$value['id']]) }}">
                                                {{ $value['fullName'] }}
                                            </a>
                                        </td>
                                        <td><a href="tel:{{ $value->phone  }}">{{ $value->phone  }}</a></td>
                                        <td><a href="mailto:{{ $value->email  }}">{{ $value->email  }}</a></td>
                                        <td>
                                            <span class="chip {{$value->userStatus['color']}} lighten-5"><span class="{{$value->userStatus['color']}}-text">{{$value->userStatus['is_active']}}</span></span>

                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit',['id'=>$value['id']]) }}" class="green-text tooltipped" data-position="bottom" data-tooltip="Düzenle">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('users.detail',['id'=>$value['id']]) }}" class="blue-text tooltipped" data-position="bottom" data-tooltip="Görüntüle">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                            <a href="{{ route('users.delete',['id'=>$value['id']]) }}" class="red-text tooltipped" data-position="bottom" data-tooltip="Sil">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </section>
@endsection
