<?php

$tid=$_GET['tid'];
    $zip = new ZipArchive;
    $download = 'download.zip';
    $zip->open($download, ZipArchive::CREATE);
    foreach (glob("repo/tid*") as $file) { /* Add appropriate path to read content of zip */
        $zip->addFile($file);
    }
    $zip->close();
    header('Content-Type: application/zip');
    header("Content-Disposition: attachment; filename = $download");
    header('Content-Length: ' . filesize($download));
    header("Location: $download");
 ?>