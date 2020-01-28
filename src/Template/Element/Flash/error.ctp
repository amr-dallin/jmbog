<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert bg--error">
    <div class="alert__body">
        <span style="color: #e23636;"><?php echo $message; ?></span>
    </div>
    <div class="alert__close">×</div>
</div>
