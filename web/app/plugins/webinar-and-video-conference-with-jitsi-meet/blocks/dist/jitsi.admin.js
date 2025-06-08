jQuery(document).ready(function(){
    jQuery('.jisti-admin-tab-links > a').each(function(){
        jQuery(this).on('click', function(e){
            e.preventDefault();
            jQuery('.jisti-admin-tab-links > a').removeClass('active-jitsi-tab-link');
            jQuery(this).addClass('active-jitsi-tab-link');
            jQuery('.jitsi-tab').removeClass('active-jitsi-tab');
            jQuery(jQuery(this).attr('href')).addClass('active-jitsi-tab');
        });
    });

    jQuery('.jitsi-tab-link').on('click', function(e) {
        if(jQuery(this).is('a[href^="#"]')){
            e.preventDefault();
            jQuery('.jitsi-tab-link').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.jitsi-setting-tabs-wrapper').removeClass('active');
            jQuery(`#jitsi-setting-tab-${jQuery(this).attr('href').substring(1)}`).addClass('active');
            window.location.hash = jQuery(this).attr('href');
        }
    });

    if(window.location.search.split('page=')[1] == 'jitsi-pro-settings'){
        if(locationhash = window.location.hash){
            jQuery('.jitsi-tab-link').removeClass('active');
            jQuery(`.jitsi-tab-link[href=${locationhash}]`).addClass('active');
            jQuery('.jitsi-setting-tabs-wrapper').removeClass('active');
            jQuery(`#jitsi-setting-tab-${locationhash.substring(1)}`).addClass('active');
        } else {
            jQuery('.jitsi-tab-link').removeClass('active');
            jQuery(`.jitsi-tab-link[href=#apis]`).addClass('active');
            jQuery('.jitsi-setting-tabs-wrapper').removeClass('active');
            jQuery(`#jitsi-setting-tab-apis`).addClass('active');
        }
    }

    document.querySelectorAll('.jitsi-field-switch input').forEach(function(element){
		element.addEventListener('change', function(e) {
			if(e.currentTarget.checked){
				element.closest(".jitsi-field-switch").classList.add('active');
			} else {
				element.closest(".jitsi-field-switch").classList.remove('active');
			}
		});
	});

    jQuery('.jitsi-click-copy').on('click', function(){
        var $temp = jQuery("<input>");
        jQuery("body").append($temp);
        $temp.val(jQuery(this).text()).select();
        document.execCommand("copy");
        $temp.remove();
        venillaSnackbar('Shortcode copied to clipboard');
    });
    
    //show pro offer popup
    jQuery('.jitsi-setting-tabs-wrapper .disabled').on('click', function (e) {
        e.preventDefault();
        WPPOOL.Popup("webinar_and_video_conference_with_jitsi_meet").show();
    })

    function venillaSnackbar(msg) {
        if(!jQuery('#floating-snackbar').length){
            jQuery('body').append('<div id="floating-snackbar" class="floating-snackbar"></div>');
        }
        jQuery("#floating-snackbar").text(msg).addClass('show'); 
        setTimeout(function(){ jQuery("#floating-snackbar").removeClass('show') }, 3000);
    }

     // initHeadway function
    headway_init();
    
});


function headway_init(){
    // initHeadway       
    const url = '//cdn.headwayapp.co/widget.js'
    const headway = document.createElement('script')
    headway.type = 'text/javascript'
    headway.async = true
    headway.src = url
    document.getElementsByTagName('head')[0].appendChild( headway );
    // const s = document.getElementsByTagName('script')[0]
    // s.parentNode.insertBefore(headway, s)


    // onload 
    headway.onload = () => {
        Headway.init({
        selector: ".jitsi-admin-wrap .title",
        account: 'xD9jj7',
        });
    }
}

// @see https://docs.headwayapp.co/widget for more configuration options.
// var HW_config = {
//     selector: ".jitsi-admin-wrap .title", 
//     account:  "xD9jj7"
// }

;(function ($) {
    $(document).ready(function () {

        /**--------------Review Notice----------------**/
        //handle review notice remind_later
        $('.jitsi-meet-wp-review-notice .remind_later').on('click', function () {
            $('.notice-overlay-wrap').css('display', 'flex');
        });

        //close the review notice
        $('.jitsi-meet-wp-review-notice .close-notice').on('click', function () {
            $(this).parents('.notice-overlay-wrap').css('display', 'none');
        });


        $('.jitsi-meet-wp-review-notice .notice-overlay-actions a, .jitsi-meet-wp-review-notice .notice-actions a.hide_notice, .jitsi-meet-wp-review-notice .notice-dismiss').on('click', function (e) {
  
            $(this).parents('.jitsi-meet-wp-review-notice').slideUp();

            let value = $(this).data('value');
           
            if (!value) {
                value = 7;
            }

            let $post_data = {'action': 'jitsi_meet_wp_review_notice', 'data': value,'nonce': jitsiMeet.nonce, };

            $.ajax({
                url: jitsiMeet.url,
                type: "POST",
                data: $post_data,
                success: function(res){
                    
                }
            });

            // wp.ajax.send('jitsi_meet_wp_review_notice', {
            //     data: {
            //         value,
            //         nonce: jitsiMeet.nonce,
            //     },
            //     success: () => {
                    
            //     },
            //     error: (error) => console.log(error),
            // });

        });


        /*-- Affiliate Notice --*/
        //close the affiliate notice
        $('.jitsi-meet-wp-affiliate-notice .close-notice').on('click', function () {
            $(this).parents('.notice-overlay-wrap').css('display', 'none');
        });

        $('.jitsi-meet-wp-affiliate-notice .dashicons-dismiss').on('click', function (e) {
            console.log('a')
            e.preventDefault();
            $('.jitsi-meet-wp-affiliate-notice .notice-overlay-wrap').css('display', 'flex');
        });

        $(`.jitsi-meet-wp-affiliate-notice .notice-overlay-actions a, .jitsi-meet-wp-affiliate-notice .notice-actions a.hide_notice`).on('click', function () {

            $(this).parents('.jitsi-meet-wp-affiliate-notice').slideUp();

            let value = $(this).data('value');

            if (!value) {
                value = 7;
            }

            let $post_data = {'action': 'jitsi_meet_wp_affiliate_notice', 'data': value,'nonce': jitsiMeet.nonce, };

            $.ajax({
                url: jitsiMeet.url,
                type: "POST",
                data: $post_data,
                success: function(res){
                    
                }
            });
          

            // wp.ajax.send('jitsi_meet_wp_affiliate_notice', {
            //     data: {
            //         value,
            //         nonce: jitsiMeet.nonce,
            //     },
            //     success: () => {},
            //     error: (error) => console.log(error),
            // });

        });

    //   $(".jitsi-admin-field-radio").parents('tr').css({"background-color": "yellow", "padding-top": "300px"});

    });
})(jQuery);


(function ($) {
    $(document).ready(function(){
       
        function jitsi_manage_depend(el){
            let sourcedata = el.data('depend');
            let hide = false;
            $.each(sourcedata, function(index, data){
                if($(`[name=${data.field}]:checked`).val() != data.value){
                    hide = true;
                }
            });
            if(hide){
                el.closest('tr').css('display', 'none');
            } else {
                el.closest('tr').css('display', 'table-row');
            }
        }

        $('.jitsi-admin-field[data-depend]').each(function(){
            jitsi_manage_depend($(this));
        });

        $('body').on('change', '.jitsi-admin-field', function(){
            $('.jitsi-admin-field[data-depend]').each(function(){
                jitsi_manage_depend($(this));
            });
        });
       
    });
}(jQuery));


jQuery(document).ready(function($) {
    // Target all cards with data-card attribute
    $("[data-card]").each(function(index) {
        var card = $(this);
        // Mouse Enter: Add hover effects to the specific card
        card.on("mouseenter", function() {
            var icon = '<span class="dashicons dashicons-lock"></span>';
            var button = card.find(".install");

            button.text("Get Ultimate");
            button.addClass("upgrade");
            button.prepend(icon);

            // Bind click event for upgrade within this card only
            button.off('click').on('click', function (e) {
                e.preventDefault();
                WPPOOL.Popup("webinar_and_video_conference_with_jitsi_meet").show();
            });
        });

        // Mouse Leave: Reset button text and style for the specific card
        card.on("mouseleave", function() {
            var button = card.find(".install");

            button.removeClass("upgrade");
            if (index === 1) { // Check if it's the second card (index starts from 0)
                button.html("Activate"); 
            } else {
                button.html("Activate"); // Reset text and remove icon
            }
        });
    });
});
