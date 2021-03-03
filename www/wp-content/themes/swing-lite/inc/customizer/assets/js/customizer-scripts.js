jQuery(document).ready(function($) {	

  "use strict";
	
    /**
    * home page sections reorder
    */
    
    $('#ed-sections-reorder.section-items').sortable({
       cursor: 'move',
       axis: 'y',
       update: function(event, ui) {
           var section_ids = '';
           $('#ed-sections-reorder.section-items li').css('cursor','default').each(function() {
           var section_id = jQuery(this).attr( 'data-section-name' );
           section_ids = section_ids + section_id + ',';            
           });
           $('#shortui-order-section').val(section_ids);
           $('#shortui-order-section').trigger('change');
       }
   });

    $( ".datepicker" ).datepicker();


    /**
     * Script for switch option
    */
    $('.switch_options').each(function() {
        //This object
        var obj = $(this);

        var switchPart = obj.children('.switch_part').attr('data-switch');
        var input = obj.children('input');
        var input_val = obj.children('input').val();

        obj.children('.switch_part.'+input_val).addClass('selected');
        obj.children('.switch_part').on('click', function(){
            var switchVal = $(this).attr('data-switch');
            obj.children('.switch_part').removeClass('selected');
            $(this).addClass('selected');
            $(input).val(switchVal).change();
        });

    });

    /**
     * Script for Customizer icons
    */ 
    $(document).on('click', '.ap-customize-icons li', function() {
        $(this).parents('.ap-customize-icons').find('li').removeClass();
        $(this).addClass('selected');
        var iconVal = $(this).parents('.icons-list-wrapper').find('li.selected').children('i').attr('class');
        var inpiconVal = iconVal.split(' ');
        $(this).parents( '.ap-customize-icons' ).find('.ap-icon-value').val(inpiconVal[1]);
        $(this).parents( '.ap-customize-icons' ).find('.selected-icon-preview').html('<i class="' + iconVal + '"></i>');
        $('.ap-icon-value').trigger('change');
    });

    /**
     * Multiple checkboxes
    */
    $( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on( 'change', function() {
        checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
            function() {
                return this.value;
            }
        ).get().join( ',' );

        $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
    });

    /** Preloader Selection **/
    $('.swg-preloader').on( 'click', function () {

      var preloader = $(this).attr( 'data-preloader' );

      $('.swg-preloader').removeClass('active');

      $(this).addClass('active');

      $(this).parents('.pre-icon-container').next( 'input:hidden' ).val(preloader).change();

    } );
    
/**
* scroll home page sections on clicking related customizer sections
*/
   $('body').on('click', '#sub-accordion-panel-swing-home-panel .control-subsection .accordion-section-title', function(event) {
       var section_id = $(this).parent('.control-subsection').attr('id');
       scrollToSection( section_id );
   });


    function scrollToSection( section_id ){
       var preview_section_class = "banner_class";

       var $contents = jQuery('#customize-preview iframe').contents();

       switch ( section_id ) {

           case 'accordion-section-s-search-room':
           preview_section_class = "s-search-room";
           break;

           case 'accordion-section-swing-about-section':
           preview_section_class = "about-wrapper";
           break;

           case 'accordion-section-swing-rooms-lists-section':
           preview_section_class = "rooms-lists-wrapper";
           break;

           case 'accordion-section-swing-service-section':
           preview_section_class = "service-wrapper";
           break;

           case 'accordion-section-swing-testimonial-section':
           preview_section_class = "testimonial-wrapper";
           break;

           case 'accordion-section-swing-team-section':
           preview_section_class = "team-wrapper";
           break;

           case 'accordion-section-swing-feature-section':
           preview_section_class = "feature-wrapper";
           break;

           case 'accordion-section-swing-offer-section':
           preview_section_class = "special-offer-wrapper";
           break;

           case 'accordion-section-swing-gallery-section':
           preview_section_class = "gallery-wrapper";
           break;

           case 'accordion-section-swing-video-section':
           preview_section_class = "video-wrapper";
           break;

           case 'accordion-section-swing-news-offers-section':
           preview_section_class = "news-offers-wrapper";
           break;

           case 'accordion-section-swing-partners-section':
           preview_section_class = "partners-wrapper";
           break;
            
           case 'accordion-section-swing-contact-section':
           preview_section_class = "contact-wrapper";
           break;
       }

       if( $contents.find('.'+preview_section_class).length > 0 ){
           $contents.find("html, body").animate({
           scrollTop: $contents.find( "." + preview_section_class ).offset().top - 82
           }, 500);
       }
    }
});