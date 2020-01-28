<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert bg--success">
    <div class="alert__body">
        <span style="color: #4ebf56;"><?php echo $message; ?></span>
    </div>
    <div class="alert__close">×</div>
</div>
