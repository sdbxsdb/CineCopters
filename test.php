<?php include("phpIncludes/homeMeta.php") ?>
<?php include("phpIncludes/header.php") ?>
<?php include("phpIncludes/nav.php") ?>

    <div id="test"></div>

    <script src="./node_modules/vidbg.js/dist/vidbg.js"></script>

    <script>
      var bgVif = new vidbg("#test", {
        mp4: "/CineCopters - 2018 Recap NO SOUND.mp4",
      });
    </script>


<?php include("phpIncludes/footer.php") ?>