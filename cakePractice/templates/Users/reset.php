<h1>Reset Password</h1>

<div class="users form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Reset Password') ?></legend>
        <?= $this->Form->control('password', ['type' => 'password', 'label' => 'New Password']); ?>
        <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password']); ?>
    </fieldset>
    <?= $this->Form->button(__('Reset Password'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

