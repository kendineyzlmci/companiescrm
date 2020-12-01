<div id="companyperson">
    <div class="card">
        <div class="card-content" id="personadd">
            <div class="row">
                <div class="col s12 m6">
                    <h6 class="mb-2 mt-2"><b>Personeller</b></h6>
                </div>
                <div class="col s12 m6 text-right">
                    <button class="btn waves-effect waves-light cyan tooltipped" data-position="bottom" data-tooltip="Personel Ekle" type="submit" name="action" id="personaddbtn">
                        <i class="material-icons">person_add</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content" id="personcancel">
            <form method="POST" action="{{ route('person.store') }}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="company_id" value="{{ $companyInfo->id }}">
                <div class="row">
                    <div class="col s12 m6">
                        <h6 class="mb-2 mt-2"><b>Personel Ekle</b></h6>
                    </div>
                    <div class="col s12 m6 text-right personcancel">
                        <button class="btn waves-effect waves-light green right tooltipped" data-position="bottom" data-tooltip="Ekle"  type="submit" name="action">
                            <i class="material-icons ">send</i>
                        </button>
                        <button class="btn waves-effect waves-light red right mr-1 tooltipped" data-position="bottom" data-tooltip="Vazgeç"  type="button" id="personcancelbtn">
                            <i class="material-icons ">cancel</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 input-field">
                        <input id="name" name="name" type="text" class=" @error('name') is-invalid @enderror" value="{{ old('name') }}"
                               data-error=".name">
                        <label for="name">{{ __('Adı') }}</label>
                        @error('name')
                        <small class="name">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col s12 m4 input-field">
                        <input id="surname" name="surname" type="text" class=" @error('surname') is-invalid @enderror" value="{{ old('surname') }}"
                               data-error=".surname">
                        <label for="surname">{{ __('Soyadı') }}</label>
                        @error('surname')
                        <small class="surname">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col s12 m4 input-field">
                        <input id="title" name="title" type="text" class=" @error('title') is-invalid @enderror" value="{{ old('title') }}"
                               data-error=".title">
                        <label for="surname">{{ __('Ünvanı') }}</label>
                        @error('title')
                        <small class="title">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col s12 m6 input-field">
                        <input id="phone" name="phone" type="text" class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                               data-error=".phone">
                        <label for="surname">{{ __('Telefon') }}</label>
                        @error('phone')
                        <small class="phone">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col s12 m6 input-field">
                        <input id="email" name="email" type="text" class=" @error('email') is-invalid @enderror" value="{{ old('email') }}"
                               data-error=".email">
                        <label for="email">{{ __('Eposta') }}</label>
                        @error('email')
                        <small class="email">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
                <table id="users-list-datatable" class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Ad Soyad</th>
                        <th class="text-center">Ünvanı</th>
                        <th class="text-center">Telefon</th>
                        <th class="text-center">Eposta</th>
                        <th class="text-center">Son Güncelleme</th>
                        <th class="text-center">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Person::where('company_id',$companyInfo->id)->orderBy('id','desc')->get() as $key => $value)
                            <tr>
                                <td class="text-center">{{ $value->FullName }}</td>
                                <td class="text-center">{{ $value->title }}</td>
                                <td class="text-center"><a href="tel:{{ $value->phone  }}" class=" tooltipped" data-position="bottom" data-tooltip="Hemen Ara">{{ $value->phone }}</a></td>
                                <td class="text-center"><a href="mailto:{{ $value->email }}" class=" tooltipped" data-position="bottom" data-tooltip="Eposta Gönder">{{ $value->email }}</a></td>
                                <td class="text-center">{{ $value->PersonUpdatedAt }}</td>
                                <td class="text-center">
                                    <a onclick="personeditfunc('{{ $value->id }}')" class="tooltipped" data-position="bottom" data-tooltip="Düzenle" id="personeditbutton{{ $value->id }}"><i class="material-icons green-text">edit</i></a>
                                    <a onclick="personcancelfunc('{{ $value->id }}')"  class="tooltipped" data-position="bottom" data-tooltip="Vazgeç" id="personcancelbutton{{ $value->id }}" style="display: none"><i class="material-icons red-text">cancel</i></a>
                                    <a href="{{ route('person.destroy',['id'=>$value->id]) }}" class="tooltipped" data-position="bottom" data-tooltip="Sil"><i class="material-icons red-text">delete</i></a>
                                </td>
                            </tr>
                            <tr id="personedit{{ $value->id }}" style="display: none;background: #f9f9f9;">
                                <td colspan="6">
                                    <form method="POST" action="{{ route('person.update',['id'=>$value->id]) }}" enctype="multipart/form-data" >
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                        <div class="row">
                                            <div class="col s12 m6">
                                                <h6 class="mb-2 mt-2"><b>Personel Düzenle</b></h6>
                                            </div>
                                            <div class="col s12 m6 text-right personcancel">
                                                <button class="btn waves-effect waves-light green right tooltipped" data-position="bottom" data-tooltip="Güncelle" type="submit" name="action">
                                                    <i class="material-icons">send</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m4 input-field">
                                                <input id="name" name="name" type="text" class=" @error('name') is-invalid @enderror" value="{{ $value->name }}"
                                                       data-error=".name">
                                                <label for="name">{{ __('Adı') }}</label>
                                                @error('name')
                                                <small class="name">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col s12 m4 input-field">
                                                <input id="surname" name="surname" type="text" class=" @error('surname') is-invalid @enderror" value="{{ $value->surname }}"
                                                       data-error=".surname">
                                                <label for="surname">{{ __('Soyadı') }}</label>
                                                @error('surname')
                                                <small class="surname">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col s12 m4 input-field">
                                                <input id="title" name="title" type="text" class=" @error('title') is-invalid @enderror" value="{{ $value->title }}"
                                                       data-error=".title">
                                                <label for="surname">{{ __('Ünvanı') }}</label>
                                                @error('title')
                                                <small class="title">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col s12 m6 input-field">
                                                <input id="phone" name="phone" type="text" class=" @error('phone') is-invalid @enderror" value="{{ $value->phone }}"
                                                       data-error=".phone">
                                                <label for="surname">{{ __('Telefon') }}</label>
                                                @error('phone')
                                                <small class="phone">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col s12 m6 input-field">
                                                <input id="email" name="email" type="text" class=" @error('email') is-invalid @enderror" value="{{ $value->email }}"
                                                       data-error=".email">
                                                <label for="email">{{ __('Eposta') }}</label>
                                                @error('email')
                                                <small class="email">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
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
