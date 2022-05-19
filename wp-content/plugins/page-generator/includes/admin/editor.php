<?php
/**
 * Editor class
 * 
 * @package Page_Generator_Pro
 * @author  Tim Carr
 * @version 1.0.0
 */
class Page_Generator_Pro_Editor {

    /**
     * Holds the base object.
     *
     * @since 1.2.1
     *
     * @var     object
     */
    public $base;

    /**
     * Holds the screen and section the user is viewing
     *
     * @since   2.6.2
     *
     * @var     array
     */
    public $screen = array(
        'screen'    => false,
        'section'   => false,
    );

    /**
     * Constructor
     * 
     * @since   1.0.0
     *
     * @param   object $base    Base Plugin Class
     */
    public function __construct( $base ) {

        // Store base class
        $this->base = $base;

        // Add filters to register TinyMCE Plugins
        // Low priority ensures this works with Frontend Page Builders
        add_filter( 'mce_external_plugins', array( $this, 'register_tinymce_plugins' ), 99999 );

    }

    /**
     * Register JS plugins for the TinyMCE Editor
     *
     * @since   1.0.0
     *
     * @param   array   $plugins    JS Plugins
     * @return  array 		        JS Plugins
     */
    public function register_tinymce_plugins( $plugins ) {

        // Determine the screen that we're on
        $this->screen = $this->base->get_class( 'screen' )->get_current_screen();

        // Bail if we're not registering TinyMCE Plugins
        if ( ! $this->should_register_tinymce_plugins() ) {
            return $plugins;
        }

        // Determine whether to load minified versions of JS
        $minified = $this->base->dashboard->should_load_minified_js();

        // Depending on the screen we're on, define the shortcodes to register as TinyMCE Plugins
        switch ( $this->screen['screen'] ) {
            case 'content_groups':
                // Get Plugins that aren't shortcodes, registering their JS scripts
                foreach ( $this->get_tinymce_plugins( $minified ) as $plugin_name => $plugin_attributes ) {
                    $plugins[ $plugin_name ] = $plugin_attributes['js'];
                }
                break;
        }

        /**
         * Defines the TinyMCE Plugins to register
         *
         * @since   1.0.0
         *
         * @param   array   $plugins    TinyMCE Plugins
         */
	    $plugins = apply_filters( 'page_generator_pro_editor_register_tinymce_plugins', $plugins );

        // Return filtered results
        return $plugins;

    }

    /**
     * Returns an array of TinyMCE Plugins that aren't shortcodes/blocks,
     * such as Autocomplete and Generate Spintax from Selected Text
     *
     * @since   2.8.9
     *
     * @param   bool    $minified           Whether to load minified versions
     * @return  array                       TinyMCE Plugins
     */
    private function get_tinymce_plugins( $minified = true ) {

        // Define Plugins
        $plugins = array(
            'page_generator_pro_autocomplete_keywords' => array(
                'js'        => $this->base->plugin->url . '_modules/dashboard/js/' . ( $minified ? 'min/' : '' ) . 'autocomplete-tinymce' . ( $minified ? '-min' : '' ) . '.js',
                'has_button'=> false,
            ),
        );

        /**
         * Returns an array of TinyMCE Plugins that aren't shortcodes/blocks,
         * such as Autocomplete and Generate Spintax from Selected Text
         *
         * @since   2.8.9
         *
         * @param  array   $plugins     TinyMCE Plugins
         */
        $plugins = apply_filters( 'page_generator_pro_editor_get_tinymce_plugins', $plugins );

        // Return
        return $plugins;

    }

    /**
     * Determines whether TinyMCE Plugins should be registered, by checking if the
     * user is editing a Content Group in the WordPress Admin or a Frontend Page Builder
     *
     * @since   2.5.7
     *
     * @return  mixed    false | array of Plugins
     */
    private function should_register_tinymce_plugins() {

        // Set a flag to denote whether we should register TinyMCE Plugins
        $should_register_tinymce_plugins = false;

        // Depending on the screen we're on, define the Plugins that we should register
        if ( $this->screen['screen'] == 'content_groups' && $this->screen['section'] == 'edit' ) {
            // Register all Shortcodes
            $should_register_tinymce_plugins = true;
        }

        /**
         * Set a flag to denote whether we should register TinyMCE Plugins
         *
         * @since   2.2.4
         *
         * @param   bool   $should_register_tinymce_plugins    Should Register TinyMCE Plugins
         */
        $should_register_tinymce_plugins = apply_filters( 'page_generator_pro_editor_should_register_tinymce_plugins', $should_register_tinymce_plugins );

        // Return
        return $should_register_tinymce_plugins;

    }

    /**
     * Returns the singleton instance of the class.
     *
     * @since       1.1.6
     * @deprecated  1.9.8
     *
     * @return      object Class.
     */
    public static function get_instance() {

        // Define class name
        $name = 'editor';

        // Warn the developer that they shouldn't use this function.
        _deprecated_function( __FUNCTION__, '1.9.8', 'Page_Generator_Pro()->get_class( \'' . $name . '\' )' );

        // Return the class
        return Page_Generator_Pro()->get_class( $name );

    }

}