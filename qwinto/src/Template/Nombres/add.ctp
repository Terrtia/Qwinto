<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nombres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nombres form large-9 medium-8 columns content">
    <?= $this->Form->create($nombre) ?>
    <fieldset>
        <legend><?= __('Add Nombre') ?></legend>
        <?php
            echo $this->Form->input('FEUILLE_ID');
            echo $this->Form->input('COLONNE');
            echo $this->Form->input('LIGNE');
            echo $this->Form->input('VAL');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
