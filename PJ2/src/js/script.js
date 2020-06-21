$(function () {

  // 幻灯片
  var $aSlider = $('.slider');

  $aSlider.each(function () {
    $aSlider.slider($(this));
  });

  // 返回顶部
  $('#backTop').backTop();

});

;(function ($, window, document, undefined) {

  $.fn.slider = function (obj) {
    var $oSlider = obj;
    var $slider_item = $oSlider.find('.slider-img').find('a');
    var $slider_btn = $oSlider.find('.slider-btn').find('span');
    var $slider_title = $oSlider.find('.slider-title').find('p');

    var data_title = [];
    var slider_w = $slider_item.eq(0).width();
    var slider_iNum = 0;

    $slider_item.each(function () {
      data_title.push($(this).attr('slider-title'));
    });

    for (var i = 1; i < $slider_item.length; i++) {
      $($slider_item[i]).css({left: slider_w});
    }

    $slider_btn.click(function () {
      sliderBtn($(this).index());

      sliderChange($(this).index());

      slider_iNum = $(this).index();

      $slider_title.text(data_title[$(this).index()]);
    });

    function sliderBtn(index) {
      $slider_btn.removeClass('cur');
      $slider_btn.eq(index).addClass('cur');
    };

    function sliderChange(curIndex) {
      if (curIndex === slider_iNum) {
        return;
      } else if (curIndex > slider_iNum) {
        $slider_item.eq(slider_iNum).animate({left: -slider_w});
        $slider_item.eq(curIndex).css({left: slider_w});
      } else if (curIndex < slider_iNum) {
        $slider_item.eq(slider_iNum).animate({left: slider_w});
        $slider_item.eq(curIndex).css({left: -slider_w});
      }

      $slider_item.eq(curIndex).animate({left: 0});
    };
  };

  $.fn.backTop = function () {
    var $elem = this;
    var $doc = $(document.body);
    var client_h = $(window).height();

    $elem.click(function () {
      $doc.animate({scrollTop: 0});
    });
  }

})(window.jQuery, window, document);