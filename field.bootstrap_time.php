<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams Video URL Field Type
 *
 * @package		PyroStreams
 * @author		Jose Luis Fonseca
 * @team                WeDreamPro
 * @copyright           Copyright (c) 2014, WeDreamPro
 */
class Field_bootstrap_time {
    
    public $field_type_slug = 'bootstrap_time';
    public $db_col_type = 'time';
    public $version = '1.0.0';
    public $custom_parameters = array('format');
    public $author = array('name' => 'Jose Fonseca', 'url' => 'http://josefonseca.me');
    public $defaultFormat = 'g:i A';
    
    // ----------------------------------------------------------------------

    /**
     * Event
     *
     * Load assets
     *
     * @access public
     * @param $field object
     * @return void
     */
    public function event() {
        $this->CI->type->add_js('bootstrap_time', 'bootstrap.min.js');
        $this->CI->type->add_css('bootstrap_time', 'bootstrap.css');
        $this->CI->type->add_js('bootstrap_time', 'bootstrap-timepicker.min.js');
        $this->CI->type->add_css('bootstrap_time', 'bootstrap-timepicker.min.css');
    }
    
    /**
     * Output form input
     *
     * @access	public
     * @param   $params	array
     * @return	string
     */
    public function form_output($params) {
        $value = $params['value'];
        $date = new DateTime($value);
        //var_dump($value);die;
        return $this->CI->type->load_view('bootstrap_time', 'input', array(
                    'value' => $date->format('h:i A'),
                    'nameform' => $params['form_slug']
                ));
    }
    /**
     * Pre save
     * @param type $input
     * @param type $field
     * @param type $stream
     * @param type $row_id
     * @param type $form_data
     * @return type
     */
    public function pre_save($input, $field, $stream, $row_id, $form_data){
        $date = new DateTime($input);
        return $date->format('H:i:s');
        
    }
    /**
     * Pre output
     * @param type $input
     * @param type $data
     * @return type
     */
    public function pre_output($input, $data){
        $date = new DateTime($input);
        return $date->format(($data['format']) ? $data['format'] : $this->defaultFormat);
    }
    
    // ----------------------------------------------------------------------

    /**
     * Custom parameters
     * @author Jose Fonseca <jose@ditecnologia.com>
     */
    public function param_format($value = null) {
        return array(
            'input' => form_input('format', $value),
            'instructions' => $this->CI->lang->line('streams.format_time.instructions')
        );
    }
    
}