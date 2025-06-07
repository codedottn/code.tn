
( function( $, api ) {
    /* === Repeater Text Control === */
    api.controlConstructor['kids-education-bell-repeater-text'] = api.Control.extend({

        ready: function() {

            'use strict';

            var control = this;

            control.initCustomControl();
        },

        initCustomControl: function() {

            'use strict';

            var control = this;

            control.populate(control);

            control.container.on( 'click', '.btn-add-field', control, function(event) {
                control.add(event);
            } );
            control.container.on( 'change', '.repeater-text-single-field', control, function() {
                control.updateValue();
            } );
            control.container.on( 'click', '.btn-remove-field', control, function(event) {
                control.remove(event);
                control.updateValue();
            } );
        },

        populate: function() {

            'use strict';

            var wrapper = this.selector;
            var multi_saved_value = jQuery(wrapper).find( '.repeater-text-value' ).val();
            if ( multi_saved_value.length > 0 ) {
                var multi_saved_values = multi_saved_value.split( '|' );
                jQuery(wrapper).find( '.repeater-text-fields' ).empty();
                jQuery.each(multi_saved_values, function( i, value ) {
                    jQuery(wrapper).find( '.repeater-text-fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
                });
            }
        },

        add: function(event) {
            'use strict';

            event.preventDefault();
            jQuery(event.target).parent('.repeater-text-input').find('.repeater-text-fields').append( '<div class="set"><input type="text" value="" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
        },

        remove: function(event) {
            'use strict';

            event.preventDefault();
            jQuery(event.target).parent().parent().remove();
        },

        updateValue: function() {
            'use strict';

            var values = '';
            var wrapper = this.selector;
            jQuery(wrapper).find( '.repeater-text-fields .repeater-text-single-field' ).each(function() {
                values += jQuery(this).val() + '|';
            });

            jQuery(wrapper).find( '.repeater-text-value' ).val( values.slice( 0, -1 ) ).change();
        }

    });

        // upsell 
    api.sectionConstructor['kids-education-bell-upsell'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

    wp.customize.bind('ready', function() {

         // Sortable sections
        jQuery( 'ul.kids-education-bell-sortable-list' ).sortable({
            handle: '.kids-education-bell-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.kids-education-bell-sortable-input').trigger( 'change' );
            }
        });

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.kids-education-bell-drag-handle', function() {
            jQuery( 'ul.kids-education-bell-sortable-list' ).sortable({
                handle: '.kids-education-bell-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.kids-education-bell-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.kids-education-bell-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.kids-education-bell-sortable-list' ).find( 'input.kids-education-bell-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.kids-education-bell-sortable-list' ).find( 'input.kids-education-bell-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.kids-education-bell-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

    });
    
} )( jQuery, wp.customize );
/**
* Custom Js for image select in customizer
*
* @package kuza
*/
 jQuery(document).ready(function($) {
    // $('#kids-education-bell-img-container li label img').click(function(){       
    //     $('#kids-education-bell-img-container li').each(function(){
    //         $(this).find('img').removeClass ('kids-education-bell-radio-img-selected') ;
    //     });
    //     $(this).addClass ('kids-education-bell-radio-img-selected') ;
    // }); 

    //Switch Control
    $('body').on('click', '.onoffswitch', function(){
        var $this = $(this);
        if($this.hasClass('switch-on')){
            $(this).removeClass('switch-on');
            $this.next('input').val( false ).trigger('change')
        }else{
            $(this).addClass('switch-on');
            $this.next('input').val( true ).trigger('change')
        }
    });

    $( document ).on( 'click', '.customize_multi_add_field', kids_education_bell_customize_multi_add_field )
        .on( 'change', '.customize_multi_single_field', kids_education_bell_customize_multi_single_field )
        .on( 'click', '.customize_multi_remove_field', kids_education_bell_customize_multi_remove_field )

    /********* Multi Input Custom control ***********/
    $( '.customize_multi_input' ).each(function() {
        var $this = $( this );
        var multi_saved_value = $this.find( '.customize_multi_value_field' ).val();
        if (multi_saved_value.length > 0) {
            var multi_saved_values = multi_saved_value.split( "|" );
            $this.find( '.customize_multi_fields' ).empty();
            var $control = $this.parents( '.customize_multi_input' );
            $.each(multi_saved_values, function( index, value ) {
                $this.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            });
        }
    });
    $('#customize-control-theme_options-layout_options_blog #kids-education-bell-img-container li label img').click(function(){      
        $('#customize-control-theme_options-layout_options_blog #kids-education-bell-img-container li').each(function(){
            $(this).find('img').removeClass ('kids-education-bell-radio-img-selected') ;
        });
        $(this).addClass ('kids-education-bell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_archive #kids-education-bell-img-container li label img').click(function(){       
        $('#customize-control-theme_options-layout_options_archive #kids-education-bell-img-container li').each(function(){
            $(this).find('img').removeClass ('kids-education-bell-radio-img-selected') ;
        });
        $(this).addClass ('kids-education-bell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_page #kids-education-bell-img-container li label img').click(function(){      
        $('#customize-control-theme_options-layout_options_page #kids-education-bell-img-container li').each(function(){
            $(this).find('img').removeClass ('kids-education-bell-radio-img-selected') ;
        });
        $(this).addClass ('kids-education-bell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_single #kids-education-bell-img-container li label img').click(function(){        
        $('#customize-control-theme_options-layout_options_single #kids-education-bell-img-container li').each(function(){
            $(this).find('img').removeClass ('kids-education-bell-radio-img-selected') ;
        });
        $(this).addClass ('kids-education-bell-radio-img-selected') ;
    });    

    function kids_education_bell_customize_multi_add_field(e) {
        var $this = $( e.currentTarget );
        e.preventDefault();
            var $control = $this.parents( '.customize_multi_input' );
            $control.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            kids_education_bell_customize_multi_write( $control );
    }

    function kids_education_bell_customize_multi_single_field() {
        var $control = $( this ).parents( '.customize_multi_input' );
        kids_education_bell_customize_multi_write( $control );
    }

    function kids_education_bell_customize_multi_remove_field(e) {
        e.preventDefault();
        var $this = $( this );
        var $control = $this.parents( '.customize_multi_input' );
        $this.parent().remove();
        kids_education_bell_customize_multi_write( $control );
    }

    function kids_education_bell_customize_multi_write( $element) {
        var customize_multi_val = '';
        $element.find( '.customize_multi_fields .customize_multi_single_field' ).each(function() {
            customize_multi_val += $( this ).val() + '|';
        });
        $element.find( '.customize_multi_value_field' ).val( customize_multi_val.slice( 0, -1 ) ).change();
    }       
});                   

