<?php



?>

<!doctype html>
<html lang="en">

<?php require_once __DIR__ . '/src/views/components/meta/Head.php' ?>

<body>


  <div class="wrapper">

    <?php require_once __DIR__ . '/src/views/components/layout/Header.php' ?>


    <main class="main py-3">

      <div class="container">
        <div class="row">
          <?php require_once __DIR__ . '/src/views/components/layout/Content.php' ?>



          <?php require_once __DIR__ . '/src/views/components/layout/Sidebar.php' ?>

        </div>
      </div>

    </main>


    <?php require_once __DIR__ . '/src/views/components/layout/Footer.php' ?>

  </div>






</body>

</html>