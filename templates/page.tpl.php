<!--.page -->
<div role="document" class="page">
  <div class="l-tertiary hide-for-small">
    <div class="row">
      <div class="large-12 columns">
        <p class="business-list"><a href="/salespricing">Saskatoon, SK</a> | <a href="/medicinehatsalespricing">Medicine Hat, AB</a> | <a href="/lloydminstersalespricing">Lloydminster, SK</a> | <a href="/reginasalespricing">Regina, SK</a> | <a href="/calgarysalespricing">Calgary, AB</a> | <a href="/edmontonsalespricing">Edmonton, AB</a> | <a href="/swiftcurrentsalespricing">Swift Current, SK</a></p>
        <ul>
          <li><a class="find-us" href="">Find Us</a></li>
          <li><a class="contact-us" href="/contact-us">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--.l-header region -->
  <header role="banner" class="l-banner">

    <?php if ($top_bar): ?>
      <!--.top-bar -->
      <?php if ($top_bar_classes): ?>
      <div class="<?php print $top_bar_classes; ?>">
      <?php endif; ?>
        <nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
          <ul class="title-area">
            <li class="name"><h1><?php print $linked_site_name; ?></h1></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
          </ul>
          <section class="top-bar-section">
            <?php if ($top_bar_main_menu) :?>
              <?php print $top_bar_main_menu; ?>
            <?php endif; ?>
            <?php if ($top_bar_secondary_menu) :?>
              <?php print $top_bar_secondary_menu; ?>
            <?php endif; ?>
          </section>
        </nav>
      <?php if ($top_bar_classes): ?>
      </div>
      <?php endif; ?>
      <!--/.top-bar -->
    <?php endif; ?>

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>

    <section class=" <?php print $alt_header_classes; ?> l-header group">
      <div class="nav-toggle hide-for-medium-up"><span></span></div>
      <div class="row">
        <div class="large-3 medium-3 small-12 columns">
          <?php if ($linked_logo): print $linked_logo; endif; ?>
        </div>
        <div class="large-9 medium-9 small-12 nav-wrap columns">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name" class="element-invisible">
                <strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </strong>
              </div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>


            <?php if ($alt_main_menu): ?>
              <nav class="l-nav" id="main-menu" class="navigation" role="navigation">
                <?php print ($alt_main_menu); ?>

              </nav> <!-- /#main-menu -->

            <?php endif; ?>

        </div>
      </div>


    </section>
    <section class=" <?php print $alt_header_classes; ?> l-header-animated animated-header group">
      <div class="row">
        <div class="large-2 medium-2 small-12 columns">
          <?php if ($linked_logo): print $linked_logo; endif; ?>
        </div>
        <div class="large-10 medium-10 small-12 nav-wrap columns">

          <div class="row collapse">
            <div class="large-12 columns">
            <?php if ($alt_main_menu): ?>
              <nav class="l-nav-alt" id="main-menu" class="navigation" role="navigation">
                <?php print ($alt_main_menu); ?>
              </nav> <!-- /#main-menu -->
            <?php endif; ?>
          </div>
          </div>
        </div>
      </div>
    </section>

    <?php if ($alt_secondary_menu): ?>
      <nav id="secondary-menu" class="navigation" role="navigation">
        <?php print $alt_secondary_menu; ?>
      </nav> <!-- /#secondary-menu -->
    <?php endif; ?>
    <?php endif; ?>
    <!-- End title, slogan and menu -->

    <?php if (!empty($page['featured'])): ?>
      <!--/.featured -->
      <section class="l-featured ">
        <div class="overlay"></div>
        <div class="row">
          <div class="large-12 columns">
            <?php print render($page['featured']); ?>
          </div>
        </div>
      </section>
      <!--/.l-featured -->
    <?php endif; ?>
    <div class="slider">
      <div class="slide1"></div>
      <div class="slide2"></div>
      <div class="slide3"></div>
    </div>
  </header>
  <!--/.l-header -->





  <?php if (!empty($page['help'])): ?>
    <!--/.l-help -->
    <section class="l-help row">
      <div class="large-12 columns">
        <?php print render($page['help']); ?>
      </div>
    </section>
    <!--/.l-help -->
  <?php endif; ?>

  <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
    <!--.triptych-->
    <section class="l-callout">
      <div class="row">
        <div class="callout-first large-4 medium-4 small-12 columns">
          <?php print render($page['triptych_first']); ?>
        </div>
        <div class="callout-middle large-4 medium-4 small-12 columns">
          <?php print render($page['triptych_middle']); ?>
        </div>
        <div class="callout-last large-4 medium-4 small-12 columns">
          <?php print render($page['triptych_last']); ?>
        </div>
      </div>
    </section>
    <!--/.triptych -->
  <?php endif; ?>
  <main role="main" class=" l-main">
    <?php if ($messages && !$zurb_foundation_messages_modal): ?>
      <!--/.l-messages -->
      <section class="l-messages row">
        <div class="large-12 columns">
          <?php if ($messages): print $messages; endif; ?>
        </div>
      </section>
      <!--/.l-messages -->
    <?php endif; ?>
    <div class="row">
      <div class="<?php print $main_grid; ?> main columns">
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlight panel callout">
            <?php print render($page['highlighted']); ?>
          </div>
        <?php endif; ?>



        <?php if ($title && !$is_front): ?>
          <?php print render($title_prefix); ?>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>
        <?php endif; ?>

        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
          <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
        <?php endif; ?>

        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>
      </div>
      <!--/.main region -->

      <?php if (!empty($page['sidebar_first'])): ?>
        <aside role="complementary" class="<?php print $sidebar_first_grid; ?> sidebar-first columns sidebar">
          <?php print render($page['sidebar_first']); ?>
        </aside>
      <?php endif; ?>

      <?php if (!empty($page['sidebar_second'])): ?>
        <aside role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif; ?>
    </div>
  </main>
  <!--/.main-->



  <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
    <!--.footer-columns -->
    <section class="row l-footer-columns">
      <?php if (!empty($page['footer_firstcolumn'])): ?>
        <div class="footer-first large-3 columns">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_secondcolumn'])): ?>
        <div class="footer-second large-3 columns">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_thirdcolumn'])): ?>
        <div class="footer-third large-3 columns">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_fourthcolumn'])): ?>
        <div class="footer-fourth large-3 columns">
          <?php print render($page['footer_fourthcolumn']); ?>
        </div>
      <?php endif; ?>
    </section>
    <!--/.footer-columns-->
  <?php endif; ?>

  <!--.l-footer-->
  <footer class="l-footer" role="contentinfo">
    <div class="row">
    <?php if (!empty($page['footer'])): ?>
      <div class="footer large-12 columns">
        <?php print render($page['footer']); ?>
      </div>
    <?php endif; ?>

    <?php if ($site_name) :?>
      <div class="copyright large-12 columns">
        &copy; <?php print date('Y') . ' ' . check_plain($site_name) . ' ' . t('All rights reserved.'); ?>
      </div>
    <?php endif; ?>
    </div>
  </footer>
  <!--/.footer-->

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>

</div>
<!--/.page -->
