<div id="companyinfo">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m12">
                    <h6 class="mb-2 mt-2"><i class="material-icons">info</i> Şirket Bilgileri</h6>
                </div>
                <div class="col s12 m6">
                    <table class="striped">
                        <tbody>
                            <tr>
                                <td><b>Şirket Adı</b></td>
                                <td class="users-view-username">: {{ $companyInfo->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Web Site Adresi</b></td>
                                <td class="users-view-username">: <a href="{{ route('company.website',['id'=>$companyInfo->id]) }}" target="_blank">{{ $companyInfo->website }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Ekleme Tarihi</b></td>
                                <td class="users-view-username">: {{ $companyInfo->CompanyCreatedAt }}</td>
                            </tr>
                            <tr>
                                <td><b>Son Güncelleme Tarihi</b></td>
                                <td class="users-view-username">: {{ $companyInfo->CompanyUpdatedAt }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col s12 m6">
                    <img src="{{ $companyInfo->image }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
