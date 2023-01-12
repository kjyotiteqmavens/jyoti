<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ["enctype" => "multipart/form-data", "id" => "form"]) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                echo $this->Form->control('fname', ['required' => false]);
                echo $this->Form->control('lname', ['required' => false]);
                echo $this->Form->control('phone', ['required' => false]);
                echo $this->Form->control('email', ['required' => false]);
                echo $this->Form->control('password', ['required' => false]);
                echo $this->Form->control('confirmpassword', ['required' => false]);
                echo '<label>Gender</label>';
                echo $this->Form->radio(
                    'gender',
                    [
                        ['value' => 'male', 'text' => 'male'],
                        ['value' => 'female', 'text' => 'female'],
                        ['value' => 'other', 'text' => 'other'],
                    ],
                    ['required' => false]
                );

                echo $this->Form->control('image_file', ['type' => 'file']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery') ?>
<?= $this->Html->script('validate') ?>
<?= $this->Html->script('form') ?>