<?php
use Cake\View\HelperRegistry;
$this->loadHelper('Form', [
    'errorClass' => 'form-control is-invalid',
    'templates'  => 'ControlPanel.app_form'
]);
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title"><?= __d('control_panel', 'Create person') ?></h5>
</div>

<?php
echo $this->Form->create($person, [
    'autocomplete' => 'off',
    'id' => 'form-person-add'
]);
?>
<div class="modal-body">
    <div class="alert alert-danger fade in" style="display: none;">
        <button class="close" data-dismiss="alert">
            ×
        </button>
        <i class="fa-fw fa fa-times"></i>
        <strong><?= __('Error!') ?></strong> <span id="error-message"></span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            echo $this->Form->control('last_name', [
                'placeholder' => __d('control_panel', 'Last name')
            ]);
            echo $this->Form->control('first_name', [
                'placeholder' => __d('control_panel', 'First name')
            ]);
            echo $this->Form->control('middle_name', [
                'placeholder' => __d('control_panel', 'Middle name')
            ]);
            echo $this->Form->control('cell_number', [
                'placeholder' => __d('control_panel', 'Cell number')
            ]);
            ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?= $this->Form->submit() ?>
</div>
<?= $this->Form->end() ?>

<script>
$(document).ready(function() {
    var form = $('#form-person-add');
    form.on('click', 'input[type=submit]', function(event) {
        event.preventDefault();

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            cache: false,
            data: form.serialize(),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
                if (undefined === response.result) {
                    $('.modal-content').html('');
                    $('.modal-content').html(response.content);

                    $('.modal-content div.alert').css('display', 'block');
                    $('.modal-content .alert span#error-message').html(response._message[0]['message']);
                } else {
                    $('.modal-content').html('');
                    $('#person-id').trigger('added', response.result);
                }

            },
            error: function(error) {
                alert(error);
            }
        });
    });
});

</script>
