<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Feuille'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feuilles index large-9 medium-8 columns content">
    <h3><?= __('Feuilles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('ID') ?></th>
                <th><?= $this->Paginator->sort('NOMBRES_ID') ?></th>
                <th><?= $this->Paginator->sort('NOMBRES_CROIX') ?></th>
                <th><?= $this->Paginator->sort('AJOUTER') ?></th>
                <th><?= $this->Paginator->sort('ORDRE') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feuilles as $feuille): ?>
            <tr>
                <td><?= $this->Number->format($feuille->ID) ?></td>
                <td><?= $this->Number->format($feuille->NOMBRES_ID) ?></td>
                <td><?= $this->Number->format($feuille->NOMBRES_CROIX) ?></td>
                <td><?= h($feuille->AJOUTER) ?></td>
                <td><?= $this->Number->format($feuille->ORDRE) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $feuille->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feuille->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feuille->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $feuille->ID)]) ?>
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
