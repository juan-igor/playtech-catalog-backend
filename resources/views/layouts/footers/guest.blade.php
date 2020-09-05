<footer class="footer">
    <div class="container">
        <nav id="footer-left" class="float-left">
            <ul class="footer-link-list">
                <li>
                    <a class="footer-link" href="https://www.instagram.com/male_version_store_oficial/" target="_blank">
                        <i class="fab fa-instagram"></i>&nbsp;
                        Instagram
                    </a>
                </li>
                <li>
                    <a class="footer-link" href="https://facebook.com/male.version.store" target="_blank">
                        <i class="fab fa-facebook"></i>&nbsp;
                        Facebook
                    </a>
                </li>
                <li>
                    <a class="footer-link" href="https://wa.me/5585999185618" target="_blank">&nbsp;
                        <i class="fab fa-whatsapp"></i>
                        Whatsapp 1
                    </a>
                </li>
                <li>
                    <a class="footer-link" href="https://wa.me/5585999187190" target="_blank">&nbsp;
                        <i class="fab fa-whatsapp"></i>
                        Whatsapp 2
                    </a>
                </li>
            </ul>
        </nav>
        <div id="footer-right" class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, Male Version Store. Feito por
            <a class="playtech-ref-link footer-link" href="https://playtechsolutions.com.br/" target="_blank">Playtech Solutions</a>
        </div>
    </div>
</footer>

@push('js')
<script>
    if(window.innerWidth < 1200){
        document.getElementById('footer-left').classList.remove('float-left');
        document.getElementById('footer-right').classList.remove('float-right');
    }
</script>
@endpush
@push('windowOnResize')
    if(window.innerWidth < 1200){
        document.getElementById('footer-left').classList.remove('float-left');
        document.getElementById('footer-right').classList.remove('float-right');
    } else{
        document.getElementById('footer-left').classList.add('float-left');
        document.getElementById('footer-right').classList.add('float-right');
    }
@endpush
