<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galeria Dinámica Nivo Slider Por PHP - Bakia</title>
</head>
<body>
<?php
    $directory="img";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
        if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){
            echo '<img src="'.$directory."/".$archivo.'">'."\n";
        }
    }
    $dirint->close();
?>
</body>
</html>