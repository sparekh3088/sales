<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $ci;
    private $title_for_layout = NULL;
    // The title separator, ' | ' by default 
    private $title_separator = ' | ';
    private $includes = array();
    public function __construct() {
        $this->ci = & get_instance();
    }

    public function set_title($title) {
        $this->title_for_layout = $title;
    }

    function load($tpl_view, $body_view = null, $data = null) {
        if (!is_null($body_view)) {
            if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')) {
                $body_view_path = $tpl_view . '/' . $body_view . '.php';
            } else if (file_exists(APPPATH . 'views/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
                $body_view_path = $body_view . '.php';
            } else {
                show_error('Unable to load the requested file: ' . $tpl_name . '/' . $view_name . '.php');
            }

            $body = $this->ci->load->view($body_view_path, $data, TRUE);

            if (is_null($data)) {
                $data = array('body' => $body);
            } else if (is_array($data)) {
                $data['body'] = $body;
            } else if (is_object($data)) {
                $data->body = $body;
            }
        }

        $this->ci->load->view('template/' . $tpl_view, $data);
    }

    public function add_include($path, $prepend_base_url = TRUE) {
        if ($prepend_base_url) {
            $this->CI->load->helper('url'); // Load this just to be sure 
            $this->file_includes[] = base_url() . $path;
        } else {
            $this->file_includes[] = $path;
        }

        return $this; // This allows chain-methods 
    }

    public function print_includes() {
        // Initialize a string that will hold all includes 
        $final_includes = '';

        foreach ($this->includes as $include) {
            // Check if it's a JS or a CSS file 
            if (preg_match('/js$/', $include)) {
                // It's a JS file 
                $final_includes .= '<script type="text/javascript" src="' . $include . '"></script>';
            } elseif (preg_match('/css$/', $include)) {
                // It's a CSS file 
                $final_includes .= '<link href="' . $include . '" rel="stylesheet" type="text/css" />';
            }

            return $final_includes;
        }
    }

}

?>