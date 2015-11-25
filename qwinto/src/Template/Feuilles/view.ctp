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
            <th><?= __('ID') ?></th>
            <td><?= $this->Number->format($feuille->ID) ?></td>
        </tr>
        <tr>
            <th><?= __('NOMBRES ID') ?></th>
            <td><?= $this->Number->format($feuille->NOMBRES_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('NOMBRES CROIX') ?></th>
            <td><?= $this->Number->format($feuille->NOMBRES_CROIX) ?></td>
        </tr>
        <tr>
            <th><?= __('ORDRE') ?></th>
            <td><?= $this->Number->format($feuille->ORDRE) ?></td>
        </tr>
        <tr>
            <th><?= __('AJOUTER') ?></th>
            <td><?= $feuille->AJOUTER ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
