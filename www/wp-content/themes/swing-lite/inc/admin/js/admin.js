/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($) { 

    "use strict";
 
    jQuery(document).on('click', '.ed-font-group li', function(){
       $('.ed-font-group li').removeClass();
       $(this).addClass('selected');
       var aa = $(this).parents('#ed-font-awesome-list').find('.ed-font-group li.selected').children('i').attr('class');
       $(this).parents('#ed-font-awesome-list').siblings('p').find('.hidden-icon-input').val(aa);
       $(this).parents('#ed-font-awesome-list').siblings('p').find('.icon-receiver').html('<i class="'+aa+'"></i>');
       $(this).parents('#ed-font-awesome-list').siblings('p').find('.hidden-icon-input').trigger('change');;
       return false;
  });

  // end date must be greater than start date
  $("#special_offer_start_date").datepicker({
      minDate: 0,
      maxDate: "+60D",
      numberOfMonths: 2,
      onSelect: function(selected) {
       $("#special_offer_end_date").datepicker("option","minDate", selected)
      }
  });
    
    $("#special_offer_end_date").datepicker({ 
        minDate: 0,
        maxDate:"+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#special_offer_start_date").datepicker("option","maxDate", selected)
        }
    });  
    
    $(document).on('click', '.ap-font-group li', function() { 
        $(this).parents('.ap-font-group').find('li').removeClass('selected');
        $(this).addClass('selected');
        var iconVal = $(this).parents('.icons-list-wrapper').find('li.selected').children('i').attr('class');
        var inpiconVal = iconVal.split(' ');
        $(this).parents('#ap-font-awesome-list').siblings( '.icon-preview' ).find('.hidden-icon-input').val(iconVal);
        $(this).parents('#ap-font-awesome-list').siblings( '.icon-preview' ).find('.icon-receiver').html('<i class="' + iconVal + '"></i>');
        $('.ap-icon-value').trigger('change');
    });

    $('#remove-widget-swing_lite_activities_simple-c81-rtp_simple_image').on( 'click', function() {
       if ($("upload-button-wdgt").val() == "Remove") {
          $(this).val("Upload");
       }
       else {
          $(this).val("Remove");
       }
    });

    /** Page Layout Selection **/
    $('.page-meta-layouts span').on( 'click', function () {
        var layout = $(this).attr('data-layout');
        $(this).parents('.page-meta-layouts').find('input:hidden').val(layout);
        $(this).parents('.page-meta-layouts').find('span').removeClass('active');
        $(this).addClass('active');
    });
  
});