<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ url('/') }}"><img class="hide-on-med-and-down" src="{{ asset('backend/images/logo/materialize-logo-color.png') }}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('backend/images/logo/materialize-logo.png') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">Codician</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold">
            <a class="waves-effect waves-cyan" href="{{ url('/') }}">
                <i class="material-icons">dashboard</i><span class="menu-title" data-i18n="">Anasayfa</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan" href="{{ route('company.list') }}">
                <i class="material-icons">business</i><span class="menu-title" data-i18n="">Şirketler</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan" href="{{ route('users.list') }}">
                <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="">Kullanıcılar</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="material-icons">lock_outline</i><span class="menu-title" data-i18n="">Çıkış Yap</span>
            </a>
        </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
