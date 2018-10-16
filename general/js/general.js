/**
 * @file
 * JavaScript for general.
 */

(function ($) {

  // Re-enable form elements that are disabled for non-ajax situations.
  Drupal.behaviors.general = {
    attach: function () {
      // If ajax is enabled, we want to hide items that are marked as hidden in
      // our example.
       jQuery("#header").css('background-color','#CCC')
    }
  };

})(jQuery);