<?php

$header="MIME-Version: 1.0\r\n";
$header.='Form:"Laura Massaro"<support@lyline.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfert-Encoding: 8bit';

$message='
<html>
    <body>
        <div align="center">
        J\'ai envoyé un mail avec PHP !
        <br/>
        <img src="https://image.shutterstock.com/image-photo/white-transparent-leaf-on-mirror-260nw-1029171697.jpg"
        </div>
    </body>
</html>
';

mail("lauramassaro.ks@gmail.com", "Salut test", $message, $header);

?>