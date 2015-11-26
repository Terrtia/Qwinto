<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nombre->NOMBRES_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nombre->NOMBRES_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nombres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nombres form large-9 medium-8 columns content">
    <?= $this->Form->create($nombre) ?>
    <fieldset>
        <legend><?= __('Edit Nombre') ?></legend>
        <?php
            echo $this->Form->input('LIGNE');
            echo $this->Form->input('COLONE');
            echo $this->Form->input('VAL');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
