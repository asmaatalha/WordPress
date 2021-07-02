<?php
    /**
     * @package Helloworld
     * @version 1.0.0
     */
    /*
    Plugin Name: Hello World !
    Plugin URI: http://bertrandbourgy.com
    Description: Un super plugin pour dire bonjour.
    Author: Asmaa Talha
    Version: 1.0.0
    Author URI: https://bertrandbourgy.com
    */

    function example_form_plugin()
    {
        $content = '';

        $content .= '<form method="post" action="#">';

        $content .= '<input type="text" name="name" placeholder="Name"><br>';

        $content .= '<input type="email" name="email" placeholder="Email">';

        $content .= '<textarea name="message" placeholder="Message"></textarea>';

        $content .= '<input type="submit" name="submit" value="Submit">';
       
        $content .= '</form>';

        return $content;
    }
    add_shortcode('example_plugin', 'example_form_plugin');

    function example_form_capture()
    {
        if (isset($_POST['submit'])) {
            
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_text_field($_POST['email']);
            $message = sanitize_textarea_field($_POST['message']);

            $to = 'asmaa.talha1998@gmail.com';
            $subject = 'Test form submission';
            $mesag = ''.$name.' - '.$email.' - '.$message;

            wp_mail($to,$subject,$mesag);

        }
    }


    add_action('wp_head', 'example_form_capture');






?>