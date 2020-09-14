<footer class="footer">
  <div class="container-fluid">
    <nav id="footer-left" class="float-left">
      <ul class="footer-link-list">
        <li>
          <a class="footer-link footer-link-black" href="{{ route('welcome') }}">
              <i class="fas fa-home"></i>&nbsp;
              Página Inicial
          </a>
        </li>
        <li>
          <a class="footer-link footer-link-black" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>&nbsp;
              Sistema
          </a>
        </li>
      </ul>
    </nav>
    <div id="footer-right" class="copyright float-right">
      &copy;
      <script>
          document.write(new Date().getFullYear())
      </script>, Male Version Store. Feito por
      <a class="playtech-ref-link footer-link footer-link-black" href="https://playtechsolutions.com.br/" target="_blank">Playtech Solutions</a>
    </div>
  </div>
</footer>

@push('js')
<script>
    if(window.innerWidth < 1023){
        document.getElementById('footer-left').classList.remove('float-left');
        document.getElementById('footer-right').classList.remove('float-right');
    }
</script>
@endpush
@push('windowOnResize')
    if(window.innerWidth < 1023){
        document.getElementById('footer-left').classList.remove('float-left');
        document.getElementById('footer-right').classList.remove('float-right');
    } else{
        document.getElementById('footer-left').classList.add('float-left');
        document.getElementById('footer-right').classList.add('float-right');
    }
@endpush