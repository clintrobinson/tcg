(function ($, Drupal) {

  Drupal.behaviors.STARTER = {
    attach: function(context, settings) {
      // Get your Yeti started.
    }
  };
    (function ($, Drupal, window, document, undefined) {
      var imageReplace;
      imageReplace = {
        init: function () {
          $('.footable a').each(function(index){
            var myURL = $(this).attr('href');
            //console.log(myURL);
            $(this).text('View Image').addClass('modalLink').attr('data-link',myURL).attr('href',"#").find("img").remove();
            imageReplace.update();
          });

        },
        update: function () {
          
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
        $('.slider').slick({
          autoplay: true,
          arrows: false,
          dots: true,
          fade: true
        });
        $('.saskatoonlink').on('click', function(e){
          e.preventDefault();
          $('#saskatoontab').show();
          $('#lloydtab').hide();
          $('#medhattab').hide();
        });
        $('.lloydlink').on('click', function(e){
          e.preventDefault();
          $('#saskatoontab').hide();
          $('#lloydtab').show();
          $('#medhattab').hide();
        });
        $('.medhatlink').on('click', function(e){
          e.preventDefault();
          $('#saskatoontab').hide();
          $('#lloydtab').hide();
          $('#medhattab').show();
        });

        var city;
        var container;
        var distance;

        $('.calculate-btn').on('click', function(e){
          e.preventDefault();
          city = $('#city').val();
          container = $('#container').val();
          distance = $('#kilometers').val();
          deliveryEstimate(city, container, distance);
        });

        function deliveryEstimate(a, b, c){
          console.log('here');
          if(a == 'saskatoon'){
            if(b == '20'){
              if(c <= 19){
                $('.estimated-amount').html('$150');
              }
              else if(c > 19 && c <= 199){
                $('.estimated-amount').html('$' + ((c * 2.5) + 100));
              }
              else if(c > 199){
                $('.estimated-amount').html('$' + (c * 3));
              }
            }
            else if(b == '40'){
              if(c <= 19){
                $('.estimated-amount').html('$200');
              }
              else if(c > 19 && c <= 279){
                $('.estimated-amount').html('$' + ((c * 3) + 140));
              }
              else if(c > 279){
                $('.estimated-amount').html('$' + (c * 3.5));
              }
            }
          } else if(a == 'medicine-hat'){
            if(b == '20'){
              if(c <= 19){
                $('.estimated-amount').html('$200');
              }
              else if(c > 19 && c <= 299){
                $('.estimated-amount').html('$' + ((c * 2.5) + 150));
              }
              else if(c > 299){
                $('.estimated-amount').html('$' + (c * 3));
              }
            }
            else if(b == '40'){
              if(c <= 19){
                $('.estimated-amount').html('$300');
              }
              else if(c > 19 && c <= 479){
                $('.estimated-amount').html('$' + ((c * 3) + 240));
              }
              else if(c > 479){
                $('.estimated-amount').html('$' + (c * 3.5));
              }
            }
          } else if(a == 'lloydminster'){
            if(b == '20'){
              if(c <= 19){
                $('.estimated-amount').html('$200');
              }
              else if(c > 19 && c <= 299){
                $('.estimated-amount').html('$' + ((c * 2.5) + 150));
              }
              else if(c > 299){
                $('.estimated-amount').html('$' + (c * 3));
              }
            }
            else if(b == '40'){
              if(c <= 19){
                $('.estimated-amount').html('$300');
              }
              else if(c > 19 && c <= 479){
                $('.estimated-amount').html('$' + ((c * 3) + 240));
              }
              else if(c > 479){
                $('.estimated-amount').html('$' + (c * 3.5));
              }
            }
          } else if(a == 'edmonton'){
            if(b == '20'){
              if(c <= 19){
                $('.estimated-amount').html('$200');
              }
              else if(c > 19 && c <= 299){
                $('.estimated-amount').html('$' + ((c * 2.5) + 150));
              }
              else if(c > 299){
                $('.estimated-amount').html('$' + (c * 3));
              }
            }
            else if(b == '40'){
              if(c <= 19){
                $('.estimated-amount').html('$300');
              }
              else if(c > 19 && c <= 479){
                $('.estimated-amount').html('$' + ((c * 3) + 240));
              }
              else if(c > 479){
                $('.estimated-amount').html('$' + (c * 3.5));
              }
            }
          } 
        }
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
        $('.find-us').click(function(){
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

})(jQuery, Drupal);
