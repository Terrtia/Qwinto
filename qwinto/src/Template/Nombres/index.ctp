<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nombre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nombres index large-9 medium-8 columns content">
    <h3><?= __('Nombres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('FEUILLE_ID') ?></th>
                <th><?= $this->Paginator->sort('LIGNE') ?></th>
                <th><?= $this->Paginator->sort('COLONNE') ?></th>
                <th><?= $this->Paginator->sort('VAL') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nombres as $nombre): ?>
            <tr>
                <td><?= $this->Number->format($nombre->FEUILLE_ID) ?></td>
                <td><?= $this->Number->format($nombre->LIGNE) ?></td>
                <td><?= $this->Number->format($nombre->COLONNE) ?></td>
                <td><?= $this->Number->format($nombre->VAL) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nombre->FEUILLE_ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nombre->FEUILLE_ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nombre->FEUILLE_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $nombre->FEUILLE_ID)]) ?>
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
