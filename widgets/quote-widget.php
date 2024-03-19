<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Quote Widget.
 *
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Quote_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve quote widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'quote';
    }

    /**
     * Get widget title.
     *
     * Retrieve quote widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Quote of the Day', 'elementor-quote-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve quote widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-blockquote';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the quote widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the quote widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['quote'];
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Register quote widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-quote-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add control for background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'elementor-quote-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .quote-box' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Add control for text color
        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'elementor-quote-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .quote-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render quote widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $text_color = $settings['text_color'];
        $background_color = $settings['background_color'];

        // Array of predefined quotes
        $quotes = array(
            "\"It takes courage to grow up and become who you really are.\" — E.E. Cummings",
            "\"Your self-worth is determined by you. You don't have to depend on someone telling you who you are.\" — Beyoncé",
            "\"Nothing is impossible. The word itself says 'I'm possible!'\" — Audrey Hepburn",
            "\"Keep your face always toward the sunshine, and shadows will fall behind you.\" — Walt Whitman",
            "\"You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose. You're on your own. And you know what you know. And you are the guy who'll decide where to go.\" — Dr. Seuss"
        );

        // Select a random quote
        $random_index = array_rand($quotes);
        $random_quote = $quotes[$random_index];
        ?>

        <div class="quote-box">
            <p class="quote-text"><?php echo $random_quote; ?></p>
        </div>

        <style>
            /* Styles for the quote box */
            .quote-box {
                background-color: <?php echo $background_color; ?>;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            /* Styles for the quote text */
            .quote-text {
                color: <?php echo $text_color; ?>;
                margin: 0;
                font-size: 18px;
                font-style: italic;
                line-height: 1.4;
            }

            /* Responsive styles for smaller screens */
            @media screen and (max-width: 768px) {
                .quote-box {
                    padding: 15px;
                }
            }
        </style>

        <?php

    }

}