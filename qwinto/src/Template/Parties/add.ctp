<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parties'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parties form large-9 medium-8 columns content">
    <?= $this->Form->create($party) ?>
    <fieldset>
        <legend><?= __('Add Party') ?></legend>
        <?php
            echo $this->Form->input('TOUR');
            echo $this->Form->input('ORDRE');
            echo $this->Form->input('DE_ROUGE');
            echo $this->Form->input('DE_JAUNE');
            echo $this->Form->input('DE_VIOLET');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
