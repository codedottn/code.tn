<?php
/**
 * Active callback functions.
 *
 * @package Kids Education Bell
 */

function kids_education_bell_header_background_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_header_background_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_ads_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_ads_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_adssec_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_adssec_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_pricing_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_pricing_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_about_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( kids_education_bell_about_active( $control ) && ( 'about_custom' == $content_type ) );
} 

function kids_education_bell_about_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( kids_education_bell_about_active( $control ) && ( 'about_page' == $content_type ) );
}

function kids_education_bell_about_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( kids_education_bell_about_active( $control ) && ( 'about_post' == $content_type ) );
}

function kids_education_bell_about_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( kids_education_bell_about_active( $control ) && ( 'about_category' == $content_type ) );
}


//========================Slider Section=====================//

function kids_education_bell_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured-slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( kids_education_bell_slider_active( $control ) && ( 'sr_page' == $content_type ) );
}

function kids_education_bell_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( kids_education_bell_slider_active( $control ) && ( 'sr_post' == $content_type ) );
}

function kids_education_bell_slider_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return  kids_education_bell_slider_seperator( $control ) && ( in_array( $content_type, array( 'sr_page', 'sr_post', 'sr_custom' ) ) ) ;
}

function kids_education_bell_slider_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( kids_education_bell_slider_active( $control ) && ( 'sr_custom' == $content_type ) );
}

function kids_education_bell_slider_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( kids_education_bell_slider_active( $control ) && ( 'sr_category' == $content_type ) );
}



//========================Services Section=====================//

function kids_education_bell_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( kids_education_bell_services_active( $control ) && ( 'services_page' == $content_type ) );
}

function kids_education_bell_services_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( kids_education_bell_services_active( $control ) && ( 'services_post' == $content_type ) );
}

function kids_education_bell_services_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( kids_education_bell_services_active( $control ) && ( 'services_category' == $content_type ) );
}
//===================End Services Section==============//


//========================Information Section=====================//

function kids_education_bell_information_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_information_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_information_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( kids_education_bell_information_active( $control ) && ( 'information_custom' == $content_type ) );
} 

function kids_education_bell_information_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( kids_education_bell_information_active( $control ) && ( 'information_page' == $content_type ) );
}

function kids_education_bell_information_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( kids_education_bell_information_active( $control ) && ( 'information_post' == $content_type ) );
}


//========================detail Section=====================//

function kids_education_bell_details_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_details_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_details_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( kids_education_bell_details_active( $control ) && ( 'details_custom' == $content_type ) );
} 

function kids_education_bell_details_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( kids_education_bell_details_active( $control ) && ( 'details_page' == $content_type ) );
}

function kids_education_bell_details_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( kids_education_bell_details_active( $control ) && ( 'details_post' == $content_type ) );
}


//========================Recent Section=====================//

function kids_education_bell_recent_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_recent_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_recent_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( kids_education_bell_recent_active( $control ) && ( 'recent_page' == $content_type ) );
}

function kids_education_bell_recent_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( kids_education_bell_recent_active( $control ) && ( 'recent_post' == $content_type ) );
}

function kids_education_bell_recent_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( kids_education_bell_recent_active( $control ) && ( 'recent_category' == $content_type ) );
}

//========================Trending Section=====================//
function kids_education_bell_trending_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_trending_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_trending_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( kids_education_bell_trending_active( $control ) && ( 'trending_custom' == $content_type ) );
} 

function kids_education_bell_trending_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( kids_education_bell_trending_active( $control ) && ( 'trending_page' == $content_type ) );
}

function kids_education_bell_trending_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( kids_education_bell_trending_active( $control ) && ( 'trending_post' == $content_type ) );
}

function kids_education_bell_trending_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( kids_education_bell_trending_active( $control ) && ( 'trending_category' == $content_type ) );
}
//===================End Trending Section==============//

//========================Hero Section=====================//
function kids_education_bell_hero_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_hero_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_hero_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_custom' == $content_type ) );
} 

function kids_education_bell_hero_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_page' == $content_type ) );
}

function kids_education_bell_hero_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_post' == $content_type ) );
}

function kids_education_bell_hero_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_category' == $content_type ) );
} 

function kids_education_bell_hero_right_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_right_page' == $content_type ) );
}

function kids_education_bell_hero_right_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_right_post' == $content_type ) );
}

function kids_education_bell_hero_right_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( kids_education_bell_hero_active( $control ) && ( 'hero_right_category' == $content_type ) );
}
//===================End Hero Section==============//

//========================Headlines Section=====================//
function kids_education_bell_headlines_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_headlines_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_headlines_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( kids_education_bell_headlines_active( $control ) && ( 'headlines_page' == $content_type ) );
}

function kids_education_bell_headlines_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( kids_education_bell_headlines_active( $control ) && ( 'headlines_post' == $content_type ) );
}

function kids_education_bell_headlines_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( kids_education_bell_headlines_active( $control ) && ( 'headlines_category' == $content_type ) );
}
//===================End Headlines Section==============//
//========================NewsFeatured Section=====================//

function kids_education_bell_newsfeatured_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_newsfeatured_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_newsfeatured_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( kids_education_bell_newsfeatured_active( $control ) && ( 'newsfeatured_page' == $content_type ) );
}

function kids_education_bell_newsfeatured_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( kids_education_bell_newsfeatured_active( $control ) && ( 'newsfeatured_post' == $content_type ) );
}

function kids_education_bell_newsfeatured_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( kids_education_bell_newsfeatured_active( $control ) && ( 'newsfeatured_category' == $content_type ) );
}

//========================CategryNews Section=====================//
function kids_education_bell_categorynews_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_categorynews_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Project Section=====================//

function kids_education_bell_popular_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_popular_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_popular_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( kids_education_bell_popular_active( $control ) && ( 'popular_page' == $content_type ) );
}

function kids_education_bell_popular_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( kids_education_bell_popular_active( $control ) && ( 'popular_post' == $content_type ) );
}

function kids_education_bell_popular_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( kids_education_bell_popular_active( $control ) && ( 'popular_category' == $content_type ) );
}

function kids_education_bell_popular_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( kids_education_bell_popular_active( $control ) && ( 'popular_custom' == $content_type ) );
}

function kids_education_bell_popular_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return  kids_education_bell_popular_seperator( $control ) && ( in_array( $content_type, array( 'popular_page', 'popular_post', 'popular_custom' ) ) ) ;
}

//========================Cta Section=====================//

function kids_education_bell_cta_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_cta_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_cta_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( kids_education_bell_cta_active( $control ) && ( 'cta_custom' == $content_type ) );
} 

function kids_education_bell_cta_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( kids_education_bell_cta_active( $control ) && ( 'cta_page' == $content_type ) );
}

function kids_education_bell_cta_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( kids_education_bell_cta_active( $control ) && ( 'cta_post' == $content_type ) );
}


//========================Team Section=====================//

function kids_education_bell_team_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_team_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_team_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( kids_education_bell_team_active( $control ) && ( 'team_custom' == $content_type ) );
} 

function kids_education_bell_team_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( kids_education_bell_team_active( $control ) && ( 'team_page' == $content_type ) );
}

function kids_education_bell_team_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( kids_education_bell_team_active( $control ) && ( 'team_post' == $content_type ) );
}

function kids_education_bell_team_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( kids_education_bell_team_active( $control ) && ( 'team_category' == $content_type ) );
}

//========================Project Section=====================//

function kids_education_bell_project_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_project_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_project_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[project_content_type]' )->value();
    return ( kids_education_bell_project_active( $control ) && ( 'project_page' == $content_type ) );
}

function kids_education_bell_project_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[project_content_type]' )->value();
    return ( kids_education_bell_project_active( $control ) && ( 'project_post' == $content_type ) );
}

function kids_education_bell_project_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[project_content_type]' )->value();
    return ( kids_education_bell_project_active( $control ) && ( 'project_category' == $content_type ) );
}

//========================Event Section=====================//

function kids_education_bell_event_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_event_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
// Completed Event

function kids_education_bell_event_completed_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_event_completed_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_event_completed_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_content_type]' )->value();
    return ( kids_education_bell_event_completed_active( $control ) && ( 'event_page' == $content_type ) );
}

function kids_education_bell_event_completed_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_content_type]' )->value();
    return ( kids_education_bell_event_completed_active( $control ) && ( 'event_post' == $content_type ) );
}

function kids_education_bell_event_completed_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_content_type]' )->value();
    return ( kids_education_bell_event_completed_active( $control ) && ( 'event_category' == $content_type ) );
}

// Upcoming Event

function kids_education_bell_event_upcoming_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_event_upcoming_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_event_upcoming_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_upcoming_content_type]' )->value();
    return ( kids_education_bell_event_upcoming_active( $control ) && ( 'event_upcoming_page' == $content_type ) );
}

function kids_education_bell_event_upcoming_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_upcoming_content_type]' )->value();
    return ( kids_education_bell_event_upcoming_active( $control ) && ( 'event_upcoming_post' == $content_type ) );
}

function kids_education_bell_event_upcoming_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[event_upcoming_content_type]' )->value();
    return ( kids_education_bell_event_upcoming_active( $control ) && ( 'event_upcoming_category' == $content_type ) );
}

//========================Features Section=====================//

function kids_education_bell_features_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_features_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_features_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( kids_education_bell_features_active( $control ) && ( 'features_custom' == $content_type ) );
} 

function kids_education_bell_features_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( kids_education_bell_features_active( $control ) && ( 'features_page' == $content_type ) );
}

function kids_education_bell_features_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( kids_education_bell_features_active( $control ) && ( 'features_post' == $content_type ) );
}

function kids_education_bell_features_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( kids_education_bell_features_active( $control ) && ( 'features_category' == $content_type ) );
}

//========================Conatct Section=====================//

function kids_education_bell_contact_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_contact_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Testimonial Section=====================//

function kids_education_bell_testimonial_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_testimonial_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_testimonial_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( kids_education_bell_testimonial_active( $control ) && ( 'testimonial_custom' == $content_type ) );
} 

function kids_education_bell_testimonial_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( kids_education_bell_testimonial_active( $control ) && ( 'testimonial_page' == $content_type ) );
}

function kids_education_bell_testimonial_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( kids_education_bell_testimonial_active( $control ) && ( 'testimonial_post' == $content_type ) );
}

function kids_education_bell_testimonial_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( kids_education_bell_testimonial_active( $control ) && ( 'testimonial_category' == $content_type ) );
}

//========================Counter Section=====================//
function kids_education_bell_counter_section( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_counter_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Instagram Section=====================//

function kids_education_bell_instagram_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_instagram_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Porfolio Section=====================//

function kids_education_bell_portfolio_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_portfolio_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}




//========================Must Read Section=====================//


function kids_education_bell_mustread_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_mustread_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_mustread_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( kids_education_bell_mustread_active( $control ) && ( 'mustread_page' == $content_type ) );
}

function kids_education_bell_mustread_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( kids_education_bell_mustread_active( $control ) && ( 'mustread_post' == $content_type ) );
}

function kids_education_bell_mustread_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( kids_education_bell_mustread_active( $control ) && ( 'mustread_category' == $content_type ) );
}

//========================GalleryView Section=====================//


function kids_education_bell_galleryview_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_galleryview_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_galleryview_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( kids_education_bell_galleryview_active( $control ) && ( 'galleryview_page' == $content_type ) );
}

function kids_education_bell_galleryview_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( kids_education_bell_galleryview_active( $control ) && ( 'galleryview_post' == $content_type ) );
}

function kids_education_bell_galleryview_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( kids_education_bell_galleryview_active( $control ) && ( 'galleryview_category' == $content_type ) );
}

//========================Gallery Section=====================//


function kids_education_bell_gallerypost_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_gallerypost_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Nature Gallery Section=====================//


function kids_education_bell_naturegallery_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_naturegallery_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_naturegallery_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturegallery_content_type]' )->value();
    return ( kids_education_bell_naturegallery_active( $control ) && ( 'naturegallery_page' == $content_type ) );
}

function kids_education_bell_naturegallery_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturegallery_content_type]' )->value();
    return ( kids_education_bell_naturegallery_active( $control ) && ( 'naturegallery_post' == $content_type ) );
}

function kids_education_bell_naturegallery_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturegallery_content_type]' )->value();
    return ( kids_education_bell_naturegallery_active( $control ) && ( 'naturegallery_category' == $content_type ) );
}

//========================Right Slide Section=====================//


function kids_education_bell_rightslide_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_rightslide_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_rightslide_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[rightslide_content_type]' )->value();
    return ( kids_education_bell_rightslide_active( $control ) && ( 'rightslide_page' == $content_type ) );
}

function kids_education_bell_rightslide_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[rightslide_content_type]' )->value();
    return ( kids_education_bell_rightslide_active( $control ) && ( 'rightslide_post' == $content_type ) );
}

function kids_education_bell_rightslide_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[rightslide_content_type]' )->value();
    return ( kids_education_bell_rightslide_active( $control ) && ( 'rightslide_category' == $content_type ) );
}

//========================Nature Featured Section=====================//


function kids_education_bell_naturefeatured_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_naturefeatured_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_naturefeatured_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturefeatured_content_type]' )->value();
    return ( kids_education_bell_naturefeatured_active( $control ) && ( 'naturefeatured_page' == $content_type ) );
}

function kids_education_bell_naturefeatured_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturefeatured_content_type]' )->value();
    return ( kids_education_bell_naturefeatured_active( $control ) && ( 'naturefeatured_post' == $content_type ) );
}

function kids_education_bell_naturefeatured_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[naturefeatured_content_type]' )->value();
    return ( kids_education_bell_naturefeatured_active( $control ) && ( 'naturefeatured_category' == $content_type ) );
}

//========================Travel Section=====================//


function kids_education_bell_admissionprocess_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_admissionprocess_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_admissionprocess_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[admissionprocess_content_type]' )->value();
    return ( kids_education_bell_admissionprocess_active( $control ) && ( 'admissionprocess_page' == $content_type ) );
}

function kids_education_bell_admissionprocess_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[admissionprocess_content_type]' )->value();
    return ( kids_education_bell_admissionprocess_active( $control ) && ( 'admissionprocess_post' == $content_type ) );
}

function kids_education_bell_admissionprocess_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[admissionprocess_content_type]' )->value();
    return ( kids_education_bell_admissionprocess_active( $control ) && ( 'admissionprocess_category' == $content_type ) );
}


//========================Blog Section=====================//

function kids_education_bell_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_blog_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( kids_education_bell_blog_active( $control ) && ( 'blog_page' == $content_type ) );
}

function kids_education_bell_blog_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( kids_education_bell_blog_active( $control ) && ( 'blog_post' == $content_type ) );
}

function kids_education_bell_blog_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( kids_education_bell_blog_active( $control ) && ( 'blog_category' == $content_type ) );
}

//========================Message Section=====================//

function kids_education_bell_message_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_message_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_message_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( kids_education_bell_message_active( $control ) && ( 'message_custom' == $content_type ) );
} 

function kids_education_bell_message_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( kids_education_bell_message_active( $control ) && ( 'message_page' == $content_type ) );
}

function kids_education_bell_message_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( kids_education_bell_message_active( $control ) && ( 'message_post' == $content_type ) );
}

//========================Video Section=====================//

function kids_education_bell_video_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_video_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_sensational_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_sensational_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_sensational_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( kids_education_bell_sensational_active( $control ) && ( 'sensational_page' == $content_type ) );
}

function kids_education_bell_sensational_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( kids_education_bell_sensational_active( $control ) && ( 'sensational_post' == $content_type ) );
}

function kids_education_bell_sensational_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( kids_education_bell_sensational_active( $control ) && ( 'sensational_category' == $content_type ) );
}


//========================Tips Section=====================//

function kids_education_bell_tips_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_tips_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_tips_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( kids_education_bell_tips_active( $control ) && ( 'tips_page' == $content_type ) );
}

function kids_education_bell_tips_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( kids_education_bell_tips_active( $control ) && ( 'tips_post' == $content_type ) );
}

function kids_education_bell_tips_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( kids_education_bell_tips_active( $control ) && ( 'tips_category' == $content_type ) );
}

//========================Client Section=====================//

function kids_education_bell_client_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_client_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Appointment Section=====================//

function kids_education_bell_appointment_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_appointment_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Time Table Section=====================//

function kids_education_bell_timetable_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_timetable_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_timetable_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[timetable_content_type]' )->value();
    return ( kids_education_bell_timetable_active( $control ) && ( 'timetable_custom' == $content_type ) );
} 

function kids_education_bell_timetable_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[timetable_content_type]' )->value();
    return ( kids_education_bell_timetable_active( $control ) && ( 'timetable_page' == $content_type ) );
}

function kids_education_bell_timetable_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[timetable_content_type]' )->value();
    return ( kids_education_bell_timetable_active( $control ) && ( 'timetable_post' == $content_type ) );
}

function kids_education_bell_timetable_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[timetable_content_type]' )->value();
    return ( kids_education_bell_timetable_active( $control ) && ( 'timetable_category' == $content_type ) );
}

//========================Fitness Category Section=====================//

function kids_education_bell_fitnesscat_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_fitnesscat_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function kids_education_bell_fitnesscat_product_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[fitnesscat_content_type]' )->value();
    return ( kids_education_bell_fitnesscat_active( $control ) && ( 'product-category' == $content_type ) );
}

function kids_education_bell_fitnesscat_post_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[fitnesscat_content_type]' )->value();
    return ( kids_education_bell_fitnesscat_active( $control ) && ( 'post-category' == $content_type ) );
}


//========================Shop Product Category Section=====================//

function kids_education_bell_shopproduct_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_shopproduct_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_shopproduct_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return ( kids_education_bell_shopproduct_active( $control ) && ( 'shopproduct_page' == $content_type ) );
}

function kids_education_bell_shopproduct_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return ( kids_education_bell_shopproduct_active( $control ) && ( 'shopproduct_post' == $content_type ) );
}

function kids_education_bell_shopproduct_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return ( kids_education_bell_shopproduct_active( $control ) && ( 'shopproduct_category' == $content_type ) );
}

function kids_education_bell_shopproduct_product( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return ( kids_education_bell_shopproduct_active( $control ) && ( 'product' == $content_type ) );
}

function kids_education_bell_shopproduct_product_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return ( kids_education_bell_shopproduct_active( $control ) && ( 'product-category' == $content_type ) );
}

function kids_education_bell_shopproduct_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[shopproduct_content_type]' )->value();
    return  kids_education_bell_shopproduct_seperator( $control ) && ( in_array( $content_type, array( 'shopproduct_page', 'shopproduct_post', 'shopproduct_custom' ) ) ) ;
}

//========================Featured Section=====================//

function kids_education_bell_featured_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function kids_education_bell_featured_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( kids_education_bell_featured_active( $control ) && ( 'featured_page' == $content_type ) );
}

function kids_education_bell_featured_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( kids_education_bell_featured_active( $control ) && ( 'featured_post' == $content_type ) );
}

function kids_education_bell_featured_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( kids_education_bell_featured_active( $control ) && ( 'featured_category' == $content_type ) );
}

function topbar_contact_info_option( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[topbar_layout_option]' )->value();
    return ( ( 'contact-info-option' == $content_type ) );
}
function topbar_current_date_option( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[topbar_layout_option]' )->value();
    return ( ( 'current-date-option' == $content_type ) );
}
function kids_education_bell_header_three( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[header_layout_options]' )->value();
    return ( ( 'header-three' == $content_type ) );
}
function kids_education_bell_header_five( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[header_layout_options]' )->value();
    return ( ( 'header-five' == $content_type ) );
}
function kids_education_bell_medical_layout( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return ( ( 'home-medical' == $content_type ) );
}
function kids_education_bell_education_layout( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return ( ( 'home-education' == $content_type ) );
}

function kids_education_bell_header_background_image( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[header_layout_options]' )->value();
    return in_array($home_layout,array('header-two','header-three'));
}
function kids_education_bell_headlines_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-normal-magazine'));
}

function kids_education_bell_categorynews_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-normal-magazine'));
}

function kids_education_bell_portfolio_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_instagram_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog','home-classic-blog','home-minimal-blog','home-nature'));
}
 
function kids_education_bell_popular_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog'));
}

function kids_education_bell_hero_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}

function kids_education_bell_recent_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}

function kids_education_bell_slider_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog','home-classic-blog','home-normal-magazine','home-business', 'home-corporate','home-nature', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_services_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_information_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_team_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_testimonial_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_pricing_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_cta_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_client_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business', 'home-corporate', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_appointment_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-medical','home-education','home-fitness'));
}

function kids_education_bell_galleryview_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-magazine','home-magazine','home-normal-blog','home-minimal-blog','home-classic-blog'));
}

function kids_education_bell_newsfeatured_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-normal-magazine','home-classic-blog'));
}

function kids_education_bell_mustread_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-normal-magazine','home-normal-blog', 'home-business', 'home-corporate', 'home-medical','home-education','home-fitness','home-minimal-blog','home-classic-blog'));
}
function kids_education_bell_project_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-education','home-fitness'));
}

function kids_education_bell_admissionprocess_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-education','home-blog','home-normal-magazine','home-normal-blog'));
}

function kids_education_bell_trending_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-nature','home-normal-magazine'));
}

function kids_education_bell_message_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-normal-blog','home-business', 'home-corporate', 'home-medical','home-education','home-fitness','home-minimal-blog','home-classic-blog')); 
}
function kids_education_bell_timetable_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-medical','home-education','home-fitness')); 
}
function kids_education_bell_topbar_current_date_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-normal-magazine','home-magazine', 'home-medical','home-education','home-fitness'));
}

function kids_education_bell_topbar_contact_info_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog', 'home-business', 'home-corporate'));
}
function kids_education_bell_home_magazine_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}
function kids_education_bell_naturegallery_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-nature'));
}
function kids_education_bell_rightslide_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-nature'));
}
function kids_education_bell_naturefeatured_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-nature'));
}
function kids_education_bell_gallerypost_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-education','home-classic-blog'));
}
function kids_education_bell_event_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-education','home-fitness'));
}
function kids_education_bell_counter_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-education','home-fitness'));
}
function kids_education_bell_fitnesscat_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-fitness','home-minimal-blog','home-classic-blog'));
}
function kids_education_bell_shopproduct_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-fitness','home-education'));
}

function kids_education_bell_blog_four_design_enable( $control ) {
    $blog_layout = $control->manager->get_setting( 'theme_options[blog_layout_content_type]' )->value();
    return in_array($blog_layout,array('blog-four'));
}

/**
 * Active Callback for top bar section
 */
function kids_education_bell_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function kids_education_bell_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

