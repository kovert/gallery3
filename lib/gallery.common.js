(function ($) {
  $.fn.gallery_show_message = function(message) {
    return this.each(function(i){
      $(this).effect("highlight", {"color": "white"}, 3000);
      $(this).animate({opacity: 1.0}, 6000);
    });
  };

  // Vertically align a block element's content
  $.fn.gallery_valign = function(container) {
    return this.each(function(i){
      if (container == null) {
        container = 'div';
      }
      $(this).html("<" + container + ">" + $(this).html() + "</" + container + ">");
      var el = $(this).children(container + ":first");
      var elh = $(el).height();
      var ph = $(this).height();
      var nh = (ph - elh) / 2;
      $(el).css('margin-top', nh);
    });
  };

  // Get the viewport size
  $.gallery_get_viewport_size = function() {
    return {
      width : function() {
        return $(window).width();
      },
      height : function() {
        return $(window).height();
      }
    };
  };

  /**
   * Toggle the processing indicator, both large and small
   * @param elementID Target ID, including #, to apply .gLoadingSize
   */
  $.fn.gallery_show_loading = function() {
    return this.each(function(i){
      var size;
      switch ($(this).attr("id")) {
      case "#gDialog":
        case "#gPanel":
          size = "Large";
        break;
      default:
        size = "Small";
        break;
      }
      $(this).toggleClass("gLoading" + size);
    });
  };
})(jQuery);
