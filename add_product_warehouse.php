<?php
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$product_code = $_REQUEST["product_code"];
$quantity = $_REQUEST["quantity"];
echo ("id is $id\n");
echo ("name is $name\n");
echo ("product code is $product_code\n");
echo ("quantity is $quantity");
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('C:\Users\vitd0145\Downloads\sqlite\sqlite\db\retail_shop.db');
      }
   }

   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO Item (ID,name,product_code,quantity)
      VALUES ('$id','$name','$product_code','$quantity');
EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>
