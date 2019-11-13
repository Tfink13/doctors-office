<?php
if (isset($_SESSION["id"]))  {
    header("index.php");
    echo "working";
}
?>