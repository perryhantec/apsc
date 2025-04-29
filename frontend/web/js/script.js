function disableSubmitButtons() {
    $('body').on('beforeValidate', 'form.disable-submit-buttons', function (e) {
      $(':input[type="submit"], :button[type="submit"]', this).attr('disabled', 'disabled');
/*
      $(':input[type="submit"][data-disabled-text], :button[type="submit"][data-disabled-text]', this).each(function (i) {
        var $this = $(this)
        if ($this.prop('tagName') === 'input') {
          $this.data('enabled-text', $this.val());
          $this.val($this.data('disabled-text'));
        } else {
          $this.data('enabled-text', $this.html());
          $this.html($this.data('disabled-text'));
        }
      });
*/
    }).on('afterValidate', 'form.disable-submit-buttons', function (e) {
      if ($(this).find('.has-error').length > 0) {
        $(':input[type="submit"], :button[type="submit"]', this).removeAttr('disabled');
/*
        $(':input[type="submit"][data-disabled-text], :button[type="submit"][data-disabled-text]', this).each(function (i) {
          var $this = $(this)
          if ($this.prop('tagName') === 'input') {
            $this.val($this.data('enabled-text'));
          } else {
            $this.html($this.data('enabled-text'));
          }
        });
*/
      }
    });
}
jQuery(document).ready(function () {
    $('.index-box-control-left, .index-box-control-right').click(function() {
        var $this = $(this);
        if ($this.hasClass('disabled'))
            return;
            
        var container =  $this.parents('.index-box-container');
        var maxNum = container.find('.index-box-product').length;
        var productWidth = container.find('.index-box-product:first-child').outerWidth();
        var productsContainer = container.find('.index-box-products');
        var num = productsContainer.scrollLeft() / productWidth;
        if ($this.hasClass('index-box-control-left'))
            num--;
        else
            num++;
        if (num < 0)
            num = 0;
        else if (num > maxNum)
            return;
        productsContainer.animate({scrollLeft: num*productWidth}, 400, 'swing', function() {
            if ($(this).scrollLeft() == 0) {
                container.find('.index-box-control-left').addClass('disabled');
            } else {
                container.find('.index-box-control-left').removeClass('disabled');
            }
            if ($(this).scrollLeft() + $(this).innerWidth() >= $(this)[0].scrollWidth) {
                container.find('.index-box-control-right').addClass('disabled');
            } else {
                container.find('.index-box-control-right').removeClass('disabled');
            }
        });
    });
    $('.index-box-products').each(function() {
        var container = $(this).parents('.index-box-container');
        if ($(this).scrollLeft() == 0) {
            container.find('.index-box-control-left').addClass('disabled');
        } else {
            container.find('.index-box-control-left').removeClass('disabled');
        }
        if ($(this).scrollLeft() + $(this).innerWidth() >= $(this)[0].scrollWidth) {
            container.find('.index-box-control-right').addClass('disabled');
        } else {
            container.find('.index-box-control-right').removeClass('disabled');
        }
    });
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 130) {
            $('#fix-back-to-top').fadeIn();
            $('.header-nav-fixed').slideDown('fast');
        } else {
            $('#fix-back-to-top').fadeOut();
            $('.header-nav-fixed').slideUp('fast');
        }
    }).scroll();
    $(window).resize(function() {
/*
        if ($(window).width() >= 768) {
            $(".banner-item img, .banner-item-vjs").height($(window).height());
        } else {
            $(".banner-item img, .banner-item-vjs").height('auto');
        }
*/
        if (typeof AOS == 'object')
            AOS.init();
    }).resize();
    // scroll body to 0px on click
    $('#fix-back-to-top').click(function () {
        $('#fix-back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
