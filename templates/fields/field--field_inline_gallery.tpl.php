<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 */
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php foreach ($items as $delta => $item): ?>
    <div class="field-item image--title">
      <?php print render($item); ?>
      <p class="title"><?php print $item['#item']['title']; ?></p>
    </div>
  <?php endforeach; ?>
</div>
