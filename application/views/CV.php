<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title>cv</title>
</head>
<body>

<?php
foreach ($data as $pndf) {
    ?>

    <object data="data:application/pdf;base64,<?php echo base64_encode($pndf->cv)?>"
            type="application/pdf" style="width: 100%; height: 1150px;"></object>

<?php }?>
</body>
</html>