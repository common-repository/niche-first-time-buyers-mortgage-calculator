<?php

namespace Conobe;

/**
 * Niche Remortgage Calculator Class
 *
 * @author Benjamin Hall <ben@conobe.co.uk>
 */
class RemortgageCalculator
{

    /**
     * Stores the clean display name of the plugin.
     *
     * @param string $plugin_name
     */
    protected $plugin_name = 'Niche Remortgage Calculator';

    /**
     * Stores the class name.
     *
     * @var string
     */
    protected $class_name = 'RemortgageCalculator';

    /**
     * The RemortgageCalculator plugin constructor.
     *
     * @param string $path The plugin path.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Registers the calls that should hook into the init hook.
     *
     * @return void
     */
    public function ignition()
    {
        /**
         * Calls the initial plugin setup.
         */
        add_action(
            'init',
            function () {
                /**
                 * Exposes the 'niche-remortgage-calculator' shortcode.
                 */
                add_shortcode('niche-remortgage-calculator', array($this, 'shortcode'));
            }
        );

        /**
         * Pins an admin menu.
         */
        add_action(
            'admin_menu',
            function () {
                add_submenu_page(
                    'niche-mortgage', // where the menu should hook
                    'Remortgage', // name
                    'Remortgage', // name
                    'manage_options', // perms
                    'rmc-options', // the $_GET url slug
                    array($this, 'controlPanel') // the callback
                );
            }
        );

        /**
         * Queue the colour picker styles.
         */
        add_action(
            'admin_enqueue_scripts',
            function () {
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('my-script-handle', plugins_url('my-script.js', __FILE__), array('wp-color-picker'), false, true);
            }
        );
    }

    /**
     * Output the control panel used providing management settings
     *
     * @return void
     */
    public function controlPanel()
    {
        $options = [
            'rmc_colour_3' => 'Background Colour #1',
            'rmc_colour_1' => 'Background Colour #2',
            'rmc_colour_2' => 'Background Colour #3',
            'rmc_colour_5' => 'Text Color #1',
            'rmc_colour_4' => 'Text Color #2'
        ];

        if (isset($_POST['submit']) && check_admin_referer('update_rmc_settings')) {
            foreach ($options as $key => $name) {
                if (isset($_POST[$key])) {
                    $colour = sanitize_title($_POST[$key]);
                    if (substr($colour, 0, 1) != '#') {
                        $colour = '#' . $colour;
                    }
                    update_option($key, $colour);
                }
            }
        }
        
        ?><style>.input {padding: 20px 10px 15px 10px;width: 200px;} td {background: #fff;border: 1px solid #ccc;padding: 20px;vertical-align: top;text-align: center;}</style><?php

        echo '<div class="wrap">';
        echo '<h1 class="wp-heading-inline">' . $this->plugin_name . '</h1>';
        echo '<form id="' . $this->class_name . '-form" method="POST" enctype="multipart/form-data">';

        wp_nonce_field('update_rmc_settings');

        echo '<table style="margin-top: 20px;">';
        foreach ($options as $key => $name) {
            $value = get_option($key);
            echo '<tr>';
            echo '<td><label for="' . esc_attr($key) . '">' . esc_attr($name) . '</label></td>';
            echo '<td class="input"><input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" class="color"/></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<div style="padding: 20px 0;">';
        echo '<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  />';
        echo '</div>';
        echo '</form>';
        echo '</div>';

        echo '<script>jQuery(document).ready(function($){$(\'.color\').wpColorPicker({palettes:false});});</script>';
    }

    /**
     * Get Placeholder Value
     *
     * @param string $name The name of the placeholder input.
     *
     * @return string
     */
    public function getPlaceholder($name)
    {
        $data = [
            'currency' => '£',
            'property_value' => '',
            'outstanding_amount' => '',
            'monthly_repayment' => '',
            'mortgage_terms' => 25,
            'interest_rate' => 1.15
        ];

        return isset($data[$name]) ? $data[$name] : 'NOT SET';
    }

    /**
     * Returns the shortcode output.
     *
     * @return string $output
     */
    public function shortcode()
    {
        // render
        ob_start();

        // get the calc
        require $this->path . '/template/remortgage-calculator.php';

        // get the HTML as a var
        $content = ob_get_contents();

        // cleanup
        ob_end_clean();

        // return the string to the content
        return $content;
    }

    /**
     * Print the inline styles for the calculator.
     *
     * @return void
     */
    public function printInlineStyles()
    {
        require $this->path . '/template/remortgage-style.css';

        $colour_1 = get_option('rmc_colour_1');
        if (!$colour_1) {
            $colour_1 = '#16163d';
        }

        $colour_2 = get_option('rmc_colour_2');
        if (!$colour_2) {
            $colour_2 = '#98c93e';
        }  

        $colour_3 = get_option('rmc_colour_3');
        if (!$colour_3) {
            $colour_3 = '#eeeeee';
        }

        $colour_4 = get_option('rmc_colour_4');
        if (!$colour_4) {
            $colour_4 = '#ffffff';
        }

        $colour_5 = get_option('rmc_colour_5');
        if (!$colour_5) {
            $colour_5 = '#16163d';
        }

        echo '.rmc_tabs div {color:' . esc_html($colour_5) . '!important;}';
        echo '.rmc_label {color:' . esc_html($colour_5) . '!important;}';
        echo '.rmc_tabs div.active, .rmc_panel {background:' . esc_html($colour_3) . ';}';
        echo '.rmc_ltv {background:' . esc_html($colour_2) . ';}';
        echo '.rmc-currency input:focus {background:' . esc_html($colour_4) . ';}';
        echo '.rmc_value {color:' . esc_html($colour_2) . ';}';
        echo '.rmc_results {background:' . esc_html($colour_1) . ';color:' . esc_html($colour_4) . ';}';
        echo '.rmc-currency span {color:' . esc_html($colour_4) . '!important;}';
        echo '.rmc-currency {background:' . esc_html($colour_1) . '!important;border: 2px solid ' . esc_html($colour_1) . ';}';
    }

    /**
     * Print the inline scripts for the calculator.
     *
     * @return void
     */
    public function printInlineScript()
    {
        require $this->path . '/template/remortgage-calculator.js';
    }
}
