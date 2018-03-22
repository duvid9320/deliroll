<div class="container-fluid ">
    <div class="row">
        <div class="pdng-5 col-xs-12 col-md-6 text-center ">
            <script type="text/javascript">
                function ImageArray(n) {
                    this.length = n;
                    for (var i = 1; i <= n; i++) {
                        this[i] = ' '
                    }
                }
                image = new ImageArray(7);
                image[0] = 'Promo.jpg';
                image[1] = 'lunes.png';
                image[2] = 'Martes.png';
                image[3] = 'Miercoles.png';
                image[4] = 'Jueves.png';
                image[5] = 'Promo.jpg';
                image[6] = 'Promo.jpg';
                var currentdate = new Date();
                var imagenumber = currentdate.getDay();//-1? 
                document.write('<img src= "images/' + image[imagenumber] + '" class="img-thumbnail img-responsive">');
            </script>
        </div>
        <div class="col-md-6 col-xs-12">
            <aside class="hidden-xs ">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </aside>
            <article>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </article>
            <aside class="hidden-xs ">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </aside>
            <article>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </article>
        </div>
    </div>
</div>
