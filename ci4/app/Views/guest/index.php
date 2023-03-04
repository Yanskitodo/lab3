<h2><?= esc($title) ?></h2>

<?php if (! empty($guest) && is_array($guest)): ?>

    <?php foreach ($guest as $guest_item): ?>

        <div class="main">
        <h3><?= esc($guest_item['name']) ?></h3>
         <p><?= esc($guest_item['email']) ?>
         <p><?= esc($guest_item['comment']) ?>
        </div>
    <?php endforeach ?>

<?php else: ?>
    <h3>No guest</h3>
    <p>Unable to find any guest for you.</p>

<?php endif ?>