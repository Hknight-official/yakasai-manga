<?php
include("./system/init.php");
echo json_encode([1]);
?>
<img src="/core/img.php?key=<?=hash("sha256", "844256".$key_general_img);?>&id=1" />