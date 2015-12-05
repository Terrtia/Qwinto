<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Party'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parties index large-9 medium-8 columns content">
    <h3><?= __('Parties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('ID') ?></th>
                <th><?= $this->Paginator->sort('TOUR') ?></th>
                <th><?= $this->Paginator->sort('ORDRE') ?></th>
                <th><?= $this->Paginator->sort('DE_ROUGE') ?></th>
                <th><?= $this->Paginator->sort('DE_JAUNE') ?></th>
                <th><?= $this->Paginator->sort('DE_VIOLET') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parties as $party): ?>
            <tr>
                <td><?= $this->Number->format($party->ID) ?></td>
                <td><?= $this->Number->format($party->TOUR) ?></td>
                <td><?= h($party->ORDRE) ?></td>
                <td><?= $this->Number->format($party->DE_ROUGE) ?></td>
                <td><?= $this->Number->format($party->DE_JAUNE) ?></td>
                <td><?= $this->Number->format($party->DE_VIOLET) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $party->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $party->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $party->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $party->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>


