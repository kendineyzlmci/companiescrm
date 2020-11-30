@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Kullanıcı Profili</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ route('users.list') }}" class="ml-3 btn-floating waves-effect waves-light amber darken-4 tooltipped right" data-position="bottom" data-tooltip="Geri"><i class="material-icons left">arrow_back</i></a>
        <a href="{{ route('users.edit',['id'=>$userInfo->id]) }}" class="ml-3 btn-floating waves-effect waves-light cyan tooltipped right" data-position="bottom" data-tooltip="Düzenle"><i class="material-icons left">edit</i></a>
    </div>
@endsection
@section('content')
    <div class="section users-view">
        <!-- users view media object start -->
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m7">
                    <div class="display-flex media">
                        <a href="#" class="avatar">
                            <img src="{{ $userInfo->image }}" alt="users view avatar" class="z-depth-4 circle"
                                 height="64" width="64">
                        </a>
                        <div class="media-body">
                            <h6 class="media-heading">
                                <span class="users-view-name">{{ $userInfo->fullName }} </span>
                            </h6>
                            <span class="users-view-id">
                                Yazılım Uzmanı
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-1">
                    <a href="tel:{{ $userInfo->phone }}" class="btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange tooltipped right" data-position="bottom" data-tooltip="Ara"><i class="material-icons left">phone</i></a>
                    <a href="mailto:{{ $userInfo->email }}" class="btn-floating waves-effect waves-light gradient-45deg-green-teal tooltipped right" data-position="bottom" data-tooltip="Eposta"><i class="material-icons left">message</i></a>
                </div>
            </div>
        </div>
        <!-- users view media object ends -->
        <!-- users view card data start -->
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m12">
                        <h6 class="mb-2 mt-2"><i class="material-icons">info</i> Kullanıcı Detayları</h6>
                    </div>
                    <div class="col s12 m6">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Ad:</td>
                                <td class="users-view-username">{{ $userInfo->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Soyad:</td>
                                <td class="users-view-name">{{ $userInfo->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Telefon:</td>
                                <td class="users-view-email">{{ $userInfo->phone }}</td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td class="users-view-email">{{ $userInfo->email }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 m6">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Oluşturma:</td>
                                <td>{{ $userInfo->UserCreatedAt }}</td>
                            </tr>
                            <tr>
                                <td>Güncelleme:</td>
                                <td class="users-view-latest-activity">{{ $userInfo->UserUpdatedAt }}</td>
                            </tr>
                            <tr>
                                <td>Durum:</td>
                                <td><span class=" users-view-status chip {{ $userInfo->userStatus['color'] }} lighten-5 {{ $userInfo->userStatus['color'] }}-text">{{ $userInfo->userStatus['is_active'] }}</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- users view card data ends -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/pages/page-users.css') }}">
@endsection
@section('js')
    <script src="{{ asset('backend/js/scripts/page-users.js') }}"></script>
@endsection
