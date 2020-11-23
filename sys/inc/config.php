<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'name'              => 'LBP',
    'version'           => '2.1',
    'author'            => 'pixelcave',
    'robots'            => 'noindex, nofollow',
    'title'             => 'SuperCryptoFinance',
    'description'       => 'SuperCryptoFinance is a succesfull security financial crypto 2019',
    // true                         enable page preloader
    // false                        disable page preloader
    'page_preloader'    => false,
    //predator
    // 'navbar-default'             for a light header
    // 'navbar-inverse'             for a dark header
    'header_navbar'     => 'navbar-inverse',
    // ''                           empty for a static header/main sidebar
    // 'navbar-fixed-top'           for a top fixed header/sidebars
    // 'navbar-fixed-bottom'        for a bottom fixed header/sidebars
    'header'            => 'navbar-fixed-top',
    // ''                           empty for the default full width layout
    // 'fixed-width'                for a fixed width layout (can only be used with a static header/main sidebar)
    'layout'            => '',
    // 'sidebar-visible-lg-mini'    main sidebar condensed - Mini Navigation (> 991px)
    // 'sidebar-visible-lg-full'    main sidebar full - Full Navigation (> 991px)
    // 'sidebar-alt-visible-lg'     alternative sidebar visible by default (> 991px) (You can add it along with another class - leaving a space between)
    // 'sidebar-light'              for a light main sidebar (You can add it along with another class - leaving a space between)
    'sidebar'           => 'sidebar-visible-lg-full',
    // ''                           Disable cookies (best for setting an active color theme from the next variable)
    // 'enable-cookies'             Enables cookies for remembering active color theme when changed from the sidebar links (the next color theme variable will be ignored)
    'cookies'           => '',
    // '', 'classy', 'social', 'flat', 'amethyst', 'creme', 'passion'
    'theme'             => 'passion',
    // Used as the text for the header link - You can set a value in each page if you like to enable it in the header
    'header_link'       => '',
    // The name of the files in the inc/ folder to be included in page_head.php - Can be changed per page if you
    // would like to have a different file included (eg a different alternative sidebar)
    'inc_sidebar'       => 'page_sidebar',
    'inc_sidebar_alt'   => 'page_sidebar_alt',
    'inc_header'        => 'page_header',
    // The following variable is used for setting the active link in the sidebar menu
    'active_page'       => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'Dashboard',
        'url'   => 'index.php',
        'icon'  => 'gi gi-compass'
    ),
    array(
        'url'   => 'separator',
    ),
	//start profile
    array(
        'name'  => 'Profile',
        'icon'  => 'gi gi-user',
        'sub'   => array(
            array(
                'name'  => 'Update Profile',
                'url'   => 'page_update_profile.php',
            ),
            array(
                'name'  => 'Change Password',
                'url'   => 'page_change_password.php',
            )
        )
    ),
	//end profile,
    array(
        'name'  => 'Wallet',
        'icon'  => 'fa fa-google-wallet',
        'sub'   => array(
			array(
                'name'  => 'Bitcoin Deposit',
                'url'   => 'page_deposit_request_btc.php',
            ),
			array(
                'name'  => 'Deposit',
                'url'   => 'page_deposit_request.php',
            ),
            array(
                'name'  => 'Invest',
                'url'   => 'page_invest.php',
            ),
			/*
            array(
                'name'  => 'Transfer',
                'sub'   => array(
                    array(
                        'name'  => 'Transfer Request',
                        'url'   => 'page_transfer_request.php'
                    ),
                    array(
                        'name'  => 'Transfer History',
                        'url'   => 'page_transfer_history.php'
                    )
                )
            ),
			*/
			array(
                'name'  => 'Withdraw',
                'url'   => 'page_withdraw_request.php',
            )
        )
    ),
	array(
        'name'  => 'Affiliate',
        'icon'  => 'gi gi-group',
        'sub'   => array(
            array(
                'name'  => 'New Register',
                'url'   => 'page_new_register.php',
            ),
            array(
                'name'  => 'Downline',
                'url'   => 'page_downline.php',
            )
        )
    ),
	array(
        'name'  => 'Portfolio',
        'url'   => 'page_portfolio.php',
        'icon'  => 'fa fa-btc'
    ),
    /*
	array(
        'name'  => 'Report',
        'icon'  => 'fa fa-bar-chart-o',
        'sub'   => array(
            array(
                'name'  => 'Report',
                'url'   => 'page_report.php',
            ),
            array(
                'name'  => 'Calendar',
                'url'   => 'page_calendar.php',
            )
        )
    ), */
	
	
    array(
        'url'   => 'separator',
    ),
    /*
	array(
        'name'  => 'Economic News',
        'url'   => 'page_economic_news.php',
        'icon'  => 'fa fa-newspaper-o'
    ),*/
	array(
        'name'  => 'Contact Us',
        'url'   => 'page_contact_us.php',
        'icon'  => 'fa fa-phone-square'
    ),
	array(
        'name'  => 'Logout',
        'url'   => 'logout.php',
        'icon'  => 'gi gi-log_out'
    )
);