<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "klien":
        include "pages/klien/klien.php";
        break;
    case "klientambah":
        include "pages/klien/klientambah.php";
        break;
    case "klienhapus":
        include "pages/klien/klienhapus.php";
        break;
    case "klienubah":
        include "pages/klien/klienubah.php";
        break;
    default:
        include "pages/404.php";
}
