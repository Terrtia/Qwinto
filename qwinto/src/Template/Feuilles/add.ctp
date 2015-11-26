<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Feuilles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="feuilles form large-9 medium-8 columns content">
    <?= $this->Form->create($feuille) ?>
    <fieldset>
        <legend><?= __('Add Feuille') ?></legend>
        <?php
            echo $this->Form->input('NOMBRES_ID');
            echo $this->Form->input('NOMBRES_CROIX');
            echo $this->Form->input('AJOUTER');
            echo $this->Form->input('ORDRE');
            echo $this->Form->input('NUM_PARTY');
            echo $this->Form->input('ID_USER');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
