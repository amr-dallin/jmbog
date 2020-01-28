<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert bg--primary">
    <div class="alert__body">
        <span><?php echo $message; ?></span>
    </div>
    <div class="alert__close">×</div>
</div>