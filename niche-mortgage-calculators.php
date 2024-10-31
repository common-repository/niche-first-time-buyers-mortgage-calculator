<?php

/*
Plugin Name: Niche Mortgage Calculators
Description: Niche Mortgage Calculator provided via the <code>[niche-self-employed-mortgage-calculator]</code>, <code>[niche-first-time-buyers-mortgage-calculator]</code> and <code>[niche-remortgage-calculator]</code> shortcodes. This will render the full calculator.
Version: 1.0.0
Author: Niche Mortgage Info (https://nichemortgageinfo.co.uk)
*/

/**
 * Require the class.
 */
require __DIR__ . '/lib/SelfEmployedMortgageCalculator.php';
require __DIR__ . '/lib/RemortgageCalculator.php';
require __DIR__ . '/lib/FirstTimeBuyersMortgageCalculator.php';


/**
 * Instantiate a new instance of our plugin class.
 */
$SelfEmployedMortgageCalculator = new Conobe\SelfEmployedMortgageCalculator(__DIR__);
$RemortgageCalculator = new Conobe\RemortgageCalculator(__DIR__);
$FirstTimeBuyersMortgageCalculator = new Conobe\FirstTimeBuyersMortgageCalculator(__DIR__);

// init
$SelfEmployedMortgageCalculator->ignition();
$RemortgageCalculator->ignition();
$FirstTimeBuyersMortgageCalculator->ignition();

add_action('init', function () {
    add_menu_page('Shortcodes', 'Niche Mortgage', 'manage_options', 'niche-mortgage', function () {
?>
        <div style="margin: 20px; font-size: 16px;">
            Self-Employed Mortgage Calculator Shortcode:<br />
            <code style="font-size: 20px; padding: 10px; display: block; margin-top: 10px;">[niche-self-employed-mortgage-calculator]</code>
        </div>

        <div style="margin: 20px; font-size: 16px;">
            First Time Buyers Mortgage Calculator Shortcode:<br />
            <code style="font-size: 20px; padding: 10px; display: block; margin-top: 10px;">[niche-first-time-buyers-mortgage-calculator]</code>
        </div>

        <div style="margin: 20px; font-size: 16px;">
            Remortgage Calculator Shortcode:<br />
            <code style="font-size: 20px; padding: 10px; display: block; margin-top: 10px;">[niche-remortgage-calculator]</code>
        </div>
<?php
    }, '', 100);
});


// add the settings link
add_filter(
    'plugin_action_links_niche-mortgage-calculators/niche-mortgage-calculators.php',
    function ($links) {
        // Build and escape the URL.
        $url = esc_url(get_admin_url() . 'admin.php?page=niche-mortgage');

        // Create the link.
        $settings_link = "<a href='$url'>" . __('Settings') . '</a>';

        // Adds the link to the end of the array.
        array_push(
            $links,
            $settings_link
        );

        return $links;
    }
);