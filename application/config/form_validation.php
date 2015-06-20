<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| FORM VALIDATION SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings for form validation.
| http://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
 * PLEASE BE CAREFUL WHEN EDITING THIS CONFIG FILE MISSING PARENTHESES OR ANY COMMON MISTAKES MIGHT
 * TURN THE WHOLE APPLICATION INTO A WHITE PHP ERROR / WHICH IS VERY DIFFICULT TO TRACE!!!
*/

$config = array(
                 'create/input_agent' => array(
                                    array(
                                            'field' => 'number',
                                            'label' => 'Number',
                                            'rules' => 'trim|required|min_length[2]|max_length[12]|is_unique[agent.number]|numeric'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[200]|strip_tags|pg_escape_string|xss_clean'
                                            //'rules' => 'trim|required|min_length[2]|max_length[200]|is_unique[agent.name]|xss_clean'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'trim|required|alpha_numeric'
                                         ),
                                    array(
                                            'field' => 'eccp_password',
                                            'label' => 'Eccp password',
                                            'rules' => 'trim|required|alpha_numeric'
                                         )
                                    ),
                 'create/edit_settings' => array(
                                  /*
                                    array(
                                            'field' => 'number',
                                            'label' => 'Number',
                                            'rules' => 'trim|required|min_length[2]|max_length[12]|is_unique[agent.number]|numeric'
                                         ),
                                   * 
                                   */
                                    array(
                                            'field' => 'setting_name',
                                            'label' => 'Setting Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[250]|strip_tags|pg_escape_string|xss_clean'
                                            //'rules' => 'trim|required|min_length[2]|max_length[200]|is_unique[agent.name]|xss_clean'
                                         ),
                                    array(
                                            'field' => 'setting_value',
                                            'label' => 'Setting Value',
                                            'rules' => 'trim|required|min_length[2]|max_length[250]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/edit_questions' => array(
                                  /*
                                    array(
                                            'field' => 'number',
                                            'label' => 'Number',
                                            'rules' => 'trim|required|min_length[2]|max_length[12]|is_unique[agent.number]|numeric'
                                         ),
                                   * 
                                   */
                                    array(
                                            'field' => 'category',
                                            'label' => 'Category',
                                            'rules' => 'trim|required|min_length[2]|max_length[250]|strip_tags|pg_escape_string|xss_clean'
                                            //'rules' => 'trim|required|min_length[2]|max_length[200]|is_unique[agent.name]|xss_clean'
                                         ),
                                    array(
                                            'field' => 'topic_id',
                                            'label' => 'Topic',
                                            'rules' => 'trim|required|strip_tags|pg_escape_string|xss_clean|numeric'
                                         )
                                    ),
                 'create/edit_topics' => array(
                                  /*
                                    array(
                                            'field' => 'number',
                                            'label' => 'Number',
                                            'rules' => 'trim|required|min_length[2]|max_length[12]|is_unique[agent.number]|numeric'
                                         ),
                                   * 
                                   */
                                    array(
                                            'field' => 'ratingtopic',
                                            'label' => 'Topic',
                                            'rules' => 'trim|required|min_length[2]|max_length[250]|strip_tags|pg_escape_string|xss_clean'
                                            //'rules' => 'trim|required|min_length[2]|max_length[200]|is_unique[agent.name]|xss_clean'
                                         )
                                    ),
                 'create/input_setting' => array(
                                    array(
                                            'field' => 'setting_name',
                                            'label' => 'Setting Name',
                                            'rules' => 'trim|required|is_unique[qmp_settings.setting_name]|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'setting_value',
                                            'label' => 'Setting Value',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_question' => array(
                                    array(
                                            'field' => 'category',
                                            'label' => 'Question',
                                            'rules' => 'trim|required|is_unique[qmp_rating_category.category]|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_topic' => array(
                                    array(
                                            'field' => 'ratingtopic',
                                            'label' => 'Topic',
                                            'rules' => 'trim|required|is_unique[qmp_rating_topic.ratingtopic]|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_break' => array(
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|is_unique[break.name]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/edit_break' => array(
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_script' => array(
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|is_unique[break.name]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/edit_script' => array(
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|alpha_numeric|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_form' => array(
                                    array(
                                            'field' => 'descripcion',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|is_unique[break.name]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/edit_form' => array(
                                    array(
                                            'field' => 'descripcion',
                                            'label' => 'Description',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )
                                    ),
                 'create/input_campaign' => array(
                                    //suggested by http://stackoverflow.com/questions/14359158/codeigniter-date-format-form-validation 17 Jun 2014
                                    array(
                                            'field' => 'datetime_init',
                                            'label' => 'Start Date',
                                            'rules' => 'trim|required|min_length[2]|max_length[10]|regex_match[/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'datetime_end',
                                            'label' => 'End Date',
                                            'rules' => 'trim|required|min_length[2]|max_length[10]|regex_match[/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[60]|is_unique[campaign.name]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'trunk',
                                            'label' => 'Trunk',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'max_canales',
                                            'label' => 'Max. used channels',
                                            'rules' => 'trim|required|min_length[0]|max_length[10]|numeric|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'context',
                                            'label' => 'Context',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'retries',
                                            'label' => 'Retries',
                                            'rules' => 'trim|required|min_length[0]|max_length[10]|numeric|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'script',
                                            'label' => 'Script',
                                            'rules' => 'trim|min_length[0]|max_length[4048]|strip_tags|pg_escape_string|xss_clean'
                                         )/*,
                                    array(
                                            'field' => 'encoding',
                                            'label' => 'Encoding',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )*/
                                    ),
                 'create/edit_campaign' => array(
                                    array(
                                            'field' => 'datetime_init',
                                            'label' => 'Start Date',
                                            'rules' => 'trim|required|min_length[2]|max_length[10]|regex_match[/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'datetime_end',
                                            'label' => 'End Date',
                                            'rules' => 'trim|required|min_length[2]|max_length[10]|regex_match[/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'trim|required|min_length[2]|max_length[60]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'trunk',
                                            'label' => 'Trunk',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'max_canales',
                                            'label' => 'Max. used channels',
                                            'rules' => 'trim|required|min_length[0]|max_length[10]|numeric|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'context',
                                            'label' => 'Context',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'retries',
                                            'label' => 'Retries',
                                            'rules' => 'trim|required|min_length[0]|max_length[10]|numeric|strip_tags|pg_escape_string|xss_clean'
                                         ),
                                    array(
                                            'field' => 'script',
                                            'label' => 'Script',
                                            'rules' => 'trim|min_length[0]|max_length[4048]|strip_tags|pg_escape_string|xss_clean'
                                         )/*,
                                    array(
                                            'field' => 'encoding',
                                            'label' => 'Encoding',
                                            'rules' => 'trim|required|min_length[2]|max_length[248]|strip_tags|pg_escape_string|xss_clean'
                                         )*/
                                    )
    /*
                                    ),
    
                 'email' => array(
                                    array(
                                            'field' => 'emailaddress',
                                            'label' => 'EmailAddress',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'required|alpha'
                                         ),
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'MessageBody',
                                            'rules' => 'required'
                                         )
                                    )                          
     * 
     */
               );
/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */