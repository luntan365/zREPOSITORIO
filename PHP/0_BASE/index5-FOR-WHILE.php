<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>


    <?php

      $a = 0;
      while ($a < 10) {
        echo $a;
        $a++;
      }

      echo "<br>";

      $o = 0;
      do {
        echo $o;
        $o++;
      } while ($o < 10);

      echo "<br>";

      for ($i=0; $i < 10; $i++) {
        echo $i;
      }

     ?>

  </body>
</html>
