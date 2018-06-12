<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="container-fluid bg-b">
  <div class="row p-0">
    <div class="col-md-7 col-lg-8 col-sm-12 bg-2 p-0">
      <script type="text/javascript">
          function ImageArray(n) {
              this.length = n;
              for (var i = 1; i <= n; i++) {
                  this[i] = ' '
              }
          }
          image = new ImageArray(7);
          image[0] = 'Promos';
          image[1] = 'P_lunes';
          image[2] = 'P_martes';
          image[3] = 'P_miercoles';
          image[4] = 'P_jueves';
          image[5] = 'Promos';
          image[6] = 'Promos';
          var currentdate = new Date();
          var imagenumber = currentdate.getDay();//-1?
          document.write('<img src= "images/' + image[imagenumber] + '1.jpg" class="img-promo w-100 p1">');
          document.write('<img src= "images/' + image[imagenumber] + '2.jpg" class="img-promo w-100 p2">');
          document.write('<img src= "images/' + image[imagenumber] + '3.jpg" class="img-promo w-100 p3">');
      </script>
    </div>
    
    <div class="col-md-5 col-lg-4 col-sm-12 text-center bg-2 p-0">
      <h5 class="bg-opac fb-head">CHECA NUESTRAS OTRAS PROMOCIONES EN FACEBOOK</h5>
      <div class="fb-pg2">
        <div class="fb-page" data-href="https://www.facebook.com/delirollsushi/" data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/delirollsushi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/delirollsushi/">DeliRoll</a></blockquote></div>
      </div>
      <div class="fb-pg1 bg-white">
        <div class="fb-page" data-href="https://www.facebook.com/delirollsushi/" data-tabs="timeline" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/delirollsushi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/delirollsushi/">DeliRoll</a></blockquote></div>
      </div>
    </div>
  </div>
  
   <?php
        include_once 'lib/controller/GaleriaController.php';
        $galeriaController = new GaleriaController();
        $galeriaController->showGaleria();
   ?>
</div>
