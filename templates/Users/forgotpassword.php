<?php echo $this->Flash->render() ?>
<?= $this->Form->create() ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>