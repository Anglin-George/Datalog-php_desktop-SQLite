<?php
/*Common DB connection code*/
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('avvc.db');
      }
   }
?>