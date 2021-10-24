<footer class="app-footer">
    <div class="site-footer-right">
        {!! __('voyager::theme.footer_copyright') !!} <a href="mailto:alaamjaddou@gmail.com">Alaa M. Jaddou</a>
        @php $version = Voyager::getVersion(); @endphp
        @if (!empty($version))
            - {{ $version }}
        @endif
    </div>
</footer>
