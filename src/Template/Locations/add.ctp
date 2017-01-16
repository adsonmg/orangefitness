<?php
    // View code - src/Template/Articles/json/index.ctp
    foreach ($locations as $location) {
        unset($location->generated_html);
    }
?>
<?= json_encode($locations) ?>