<?php echo $this->Flash->render() ?>
<?= $this->Form->create() ?>
<?= $this->Form->control('password'); ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>