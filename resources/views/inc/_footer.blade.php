<footer class="page-footer font-small pt-1">
  <div class="container-fluid text-center text-md-left">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-sm-6 mt-md-0 mt-4">
        <!-- Content -->
        <h5 class="text-uppercase">Footer Content</h5>
        <p>Here you can use rows and columns here to organize your footer content.</p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-1">
      <div class="col-sm-2 mb-md-0 mb-2">
        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Number of Cats .....</a>
          </li>
        </ul>
      </div>
          <!-- Grid column -->
      <div class="col-sm-2 mb-md-0 mb-2">
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Number of dogs....</a>
          </li>
        </ul>
      </div>
        @if(Request::is('/'))
          <!-- <div class="row"> -->
      <div id="animation2" class="page-footer text-center">
        <div class="row">
          <img id="cat-left-to-right" src="{{ asset('assets/images/cat_prints.gif') }}" alt="silhouette of cat walking across page from left to right, leaving pawprints" style="height:80px;">
        </div>
          <div id="adoptLogo" class="col-sm-3 mt-md-0 images align-right">
            <div  class="images align-middle">
                  <div class = "row">
                    <img src="{{ asset('assets/images/adopt.png') }}" alt="adopt, don't shop logo" style="height:140px;">
                  </div>
            </div>
        </div>
        @endif
      <div>
        <div class="footer-copyright text-center py-3">2018 Beth Salvatore</div>
      </div>
    </div>
  </div>
</footer>
