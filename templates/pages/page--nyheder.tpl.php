<?php

/**
 * @file
 * Nebula's theme implementation to staff page.
 *
 * Removed title and tabs from the page.
 */
?>
<div id="page" class="<?php print $classes?>">
  <header>
    <div class="header--inner">
      <div class="logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="Andromeda logo" title="Andromeda logo" />
        </a>
      </div>

      <div class="menu-wrapper">
        <?php print render($page['header']); ?>
      </div>
    </div>
  </header>

  <?php if ($page['featured']): ?>
    <div id="featured">
      <?php print render($page['featured']); ?>
    </div>
  <?php endif; ?>

  <div class="content-wrapper">
    <div class="content-inner">

      <?php if ($messages): ?>
        <div id="messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>

      <div class="primary-content">
        <a id="primary-content"></a>
        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>
      </div>

      <?php if ($page['secondary_content']): ?>
        <aside class="secondary-content">
          <?php print render($page['secondary_content']); ?>
        </aside>
      <?php endif; ?>

      <?php if ($page['tertiary_content']): ?>
        <aside class="tertiary-content">
          <?php print render($page['tertiary_content']); ?>
        </aside>
      <?php endif; ?>

    </div> <!-- inner -->
  </div> <!-- content -->

  <footer>
    <div class="footer--outer">
      <div class="footer--inner">
        <?php print render($page['footer']); ?>
      </div>
    </div>
  </footer>
</div>
