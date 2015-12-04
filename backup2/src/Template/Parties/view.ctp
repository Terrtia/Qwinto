<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Party'), ['action' => 'edit', $party->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Party'), ['action' => 'delete', $party->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $party->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Parties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Party'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parties view large-9 medium-8 columns content">
    <h3><?= h($party->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ORDRE') ?></th>
            <td><?= h($party->ORDRE) ?></td>
        </tr>
        <tr>
            <th><?= __('ID') ?></th>
            <td><?= $this->Number->format($party->ID) ?></td>
        </tr>
        <tr>
            <th><?= __('TOUR') ?></th>
            <td><?= $this->Number->format($party->TOUR) ?></td>
        </tr>
    </table>
</div>
