<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feuille'), ['action' => 'edit', $feuille->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feuille'), ['action' => 'delete', $feuille->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $feuille->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Feuilles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feuille'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feuilles view large-9 medium-8 columns content">
    <h3><?= h($feuille->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('TABLEAU') ?></th>
            <td><?= h($feuille->TABLEAU) ?></td>
        </tr>
        <tr>
            <th><?= __('ID') ?></th>
            <td><?= $this->Number->format($feuille->ID) ?></td>
        </tr>
        <tr>
            <th><?= __('NOMBRES CROIX') ?></th>
            <td><?= $this->Number->format($feuille->NOMBRES_CROIX) ?></td>
        </tr>
        <tr>
            <th><?= __('NUM PARTY') ?></th>
            <td><?= $this->Number->format($feuille->NUM_PARTY) ?></td>
        </tr>
        <tr>
            <th><?= __('USER ID') ?></th>
            <td><?= $this->Number->format($feuille->USER_ID) ?></td>
        </tr>
    </table>
</div>
