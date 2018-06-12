

<?php
    include_once 'lib/controller/MenuController.php';

    $menuController = new MenuController();
    $menuController->showMenuCategorias();
    ?>
<div class="container-fluid menu bg-white">
<?php
    $menuController->showSubMenuCategorias();
    ?>

</div>

<script>
window.onscroll = function() {myFunction()};
var sidenav = document.getElementById("sidenav");
var sticky = sidenav.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    sidenav.classList.add("sticky")
  } else {
    sidenav.classList.remove("sticky");
  }
}
</script>
