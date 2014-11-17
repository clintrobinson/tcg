<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!DOCTYPE html>
<!-- Sorry no IE7 support! -->
<!-- @see http://foundation.zurb.com/docs/index.html#basicHTMLMarkup -->

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  
  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <div id="myModal" class="reveal-modal tiny" data-reveal>
  </div>
  <div id="salesPic" class="reveal-modal small" data-reveal>
    <img src="">
    <a class="close-reveal-modal">&#215;</a>
  </div>
  <?php print $scripts; ?>
  <?php print _zurb_foundation_add_reveals(); ?>
  <script>
    (function ($, Drupal, window, document, undefined) {
      var imageReplace;
      imageReplace = {
        init: function () {
          console.log('initialized');
          $('.footable a').each(function(index){
            var myURL = $(this).attr('href');
            //console.log(myURL);
            $(this).text('View Image').addClass('modalLink').attr('data-link',myURL).attr('href',"#").find("img").remove();
            imageReplace.update();
          });

        },
        update: function () {
          console.log('update');

          $('body').on('click', '.footable a', function(){
            var modalURL = $(this).attr('data-link');
            //console.log(i + " clicked");
            $('#salesPic img').attr("src",modalURL);
            $('#salesPic').foundation('reveal', 'open');
            return false;
          });
        }
      };
      $( document ).ready(imageReplace.init);

      $(document).foundation({
        reveal: {
          animation: 'fade'
        }
      });
      
      $( document ).ready(function() {
        $('.l-nav ul li a').last().addClass('button').addClass('nav-CTA');
        $('.l-nav-alt ul li a').last().addClass('button').addClass('nav-CTA');
        $('.nav-CTA').attr('data-reveal-id', 'myModal');
        $('.nav-CTA').attr('data-reveal-ajax', true);
        $('.nav-toggle').click(function () {
          $(this).toggleClass('active');
          $('.links').slideToggle();
          return false;
        });
        
        // media query change
        var WidthChange = function (mq) {
          if (mq.matches) {
            $('.links').css('display', 'block');
            $('.animated-header').css( "display", "inline-block" );
          }
          else {
            $('.links').css('display', 'none');
            $('.animated-header').css( "display", "none" );
          }
        }
        // media query event handler
        if (matchMedia) {
          var mq = window.matchMedia('(min-width: 640px)');
          mq.addListener(WidthChange);
          new WidthChange(mq);
        }
        $('.find-us, .contact-us').click(function(){
          $('html, body').animate({
              scrollTop: $('.l-footer').offset().top
          }, 500);
          return false;
        });
        if ($('.calculator').length){
          var total = 0;
            function displayRate (miles){


                if($('select.rate option:selected').val() == 20){
                    if (miles > 0 && miles <= 5) {
                      total = 125;
                    }
                    if (miles >= 6 && miles <= 11) {
                      total = 175;
                    }


                    if (miles > 11) {
                      total = (miles * 4.5) + 125;
                    }
                }
                if($('select.rate option:selected').val() == 40){
                    if (miles > 0 && miles <= 5) {
                      total = 150;
                    }
                    if (miles >= 6 && miles <= 10) {
                      total = 225;
                    }
                    if (miles >= 11 && miles <= 20) {
                      total = 250;
                    }
                    if (miles > 20) {
                      total = (miles * 5) + 150;
                    }
                }
                $('#total').html('Estimated Cost $'+total.toFixed(2));
            }
            /*
            if (x >= 0.001 && x <= 0.009) {
              // something
            }
            */
            $('.mileage').change(function() {
              displayRate(jQuery('.mileage').val());
            });
            $('.rate').change(function() {
              displayRate(jQuery('.mileage').val());
            });
        }

        
      });
    })(jQuery, Drupal, this, this.document);
  </script>
</body>
</html>
