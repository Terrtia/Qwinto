<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nombre'), ['action' => 'edit', $nombre->NOMBRES_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nombre'), ['action' => 'delete', $nombre->NOMBRES_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $nombre->NOMBRES_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Nombres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nombre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nombres view large-9 medium-8 columns content">
    <h3><?= h($nombre->NOMBRES_ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('NOMBRES ID') ?></th>
            <td><?= $this->Number->format($nombre->NOMBRES_ID) ?></td>
        </tr>
        <tr>
            <th><?= __('LIGNE') ?></th>
            <td><?= $this->Number->format($nombre->LIGNE) ?></td>
        </tr>
        <tr>
            <th><?= __('COLONE') ?></th>
            <td><?= $this->Number->format($nombre->COLONE) ?></td>
        </tr>
        <tr>
            <th><?= __('VAL') ?></th>
            <td><?= $this->Number->format($nombre->VAL) ?></td>
        </tr>
    </table>
</div>
