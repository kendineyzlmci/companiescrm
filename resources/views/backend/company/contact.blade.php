<div id="companycontact">
    <div class="card">
        <div class="card-content" id="personadd">
            <div class="row">
                <div class="col s12 m6">
                    <h6 class="mb-2 mt-2"><b>İletişim Bilgileri</b></h6>
                </div>
                <div class="col s12 m6 text-right">
                    <a href="{{ route('address.create',['id'=>$companyInfo->id]) }}" class="btn waves-effect waves-light cyan tooltipped" data-position="bottom" data-tooltip="Adres Ekle" type="submit" name="action">
                        <i class="material-icons">add_circle_outline</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m5">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="users-list-datatable" class="table">
                            <thead>
                            <tr>
                                <th>Adres</th>
                                <th class="text-center">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\CompanyAddress::where('company_id',$companyInfo->id)->orderBy('id','desc')->get() as $key => $value)
                                <tr>
                                    <td>{{ $value->addresses['address'] }}</td>
                                    <td class="text-center" style="display: none;" id="lat{{ $value->id }}">{{ $value->addresses['lat'] }}</td>
                                    <td class="text-center" style="display: none;" id="lon{{ $value->id }}">{{ $value->addresses['lon'] }}</td>
                                    <td class="text-center" style="display: none;" id="zoom{{ $value->id }}">{{ $value->addresses['zoom'] }}</td>
                                    <td class="text-center">
                                        <a address="{{ $value->id }}" class="konumfunc tooltipped" data-position="bottom" data-tooltip="Konuam Git" style="cursor:pointer;"><i class="material-icons green-text">person_pin_circle</i></a>
                                        <a address="{{ $value->id }}" class="showmapfunc tooltipped" data-position="bottom" data-tooltip="Yakınında Ne Var" style="cursor:pointer;"><i class="material-icons green-text">center_focus_strong</i></a>
                                        <a address="{{ $value->id }}" class="panoromafunc tooltipped" data-position="bottom" data-tooltip="Panoroma" style="cursor:pointer;"><i class="material-icons green-text">panorama_horizontal</i></a>
                                        <a href="{{ route('address.edit',['id'=>$value->id]) }}" class="tooltipped" data-position="bottom" data-tooltip="Düzenle"><i class="material-icons green-text">edit</i></a>
                                        <a href="{{ route('address.destroy',['id'=>$value->id]) }}" class="tooltipped" data-position="bottom" data-tooltip="Sil"><i class="material-icons red-text">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
                <div class="col s12 m7">
                    <div id="harita" style="width:100%; height:100%">
                        <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/" width="100%" height="324" style="border:0;">
                            <p>Tarayıcınız iframe özelliklerini desteklemiyor !</p>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
