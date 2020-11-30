<footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container">
            <span class="right hide-on-small-only"><a href="https://codician.com/">Codician</a></span></div>
    </div>
</footer>
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins.js') }}"></script>
<script src="{{ asset('backend/js/search.js') }}"></script>
<script src="{{ asset('backend/js/custom/custom-script.js') }}"></script>
<script src="{{ asset('backend/js/scripts/customizer.js') }}"></script>
<script src="{{ asset('backend/js/kendineyazilimci.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@yield('js')
@toastr_render
