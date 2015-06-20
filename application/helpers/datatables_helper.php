<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */
    //-------------------------------------------------------------------------------------------
    //All codes for PEST or PHP Rest goes here
    require_once APPPATH."phprest/Pest.php";
    //-------------------------------------------------------------------------------------------

function old_get_buttons($id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'subscriber/edit/'.$id.'"><img src="'.  base_url().'assets/images/edit.png"/></a>';
    $html .='<a href="'.  base_url().'subscriber/delete/'.$id.'"><img src="'.  base_url().'assets/images/delete.png"/></a>';
    $html.='</span>';
    
    return $html;
}
    //-------------------------------------------------------------------------------------------
    //usage ->add_column('Actions', get_buttons('$1'),'id')
function get_buttons($id)
{
    $ci= & get_instance();
    $html ='<a class="btn btn-info" href="'.  site_url().'/create/index/'.$id.'"><i class="icon-edit icon-white"></i>Edit</a> ';
    $html .='<a onclick="return confirm(\'Delete this record?\');" class="btn btn-danger" href="'.  site_url().'/create/delete_agent/'.$id.'"><i class="icon-trash icon-white"></i>Delete</a>';
    return $html;
}
    //-------------------------------------------------------------------------------------------
function break_buttons($id)
{
    $ci= & get_instance();
    $html ='<a class="btn btn-info" href="'.  site_url().'/create/index_break/'.$id.'"><i class="icon-edit icon-white"></i>Edit</a> ';
    $html .='<a onclick="return confirm(\'Delete this record?\');" class="btn btn-danger" href="'.  site_url().'/create/delete_break/'.$id.'"><i class="icon-trash icon-white"></i>Delete</a>';
    return $html;
}
    //-------------------------------------------------------------------------------------------
function qmp_rating_category_buttons($id)
{
    $ci= & get_instance();
    $html ='<a href="'.  site_url().'/create/edit_surveyform/'.$id.'"><i class="icon-pencil"></i></a> ';
    $html .='<a onclick="return confirm(\'Delete this record?\');" href="'.  site_url().'/create/delete_surveyform/'.$id.'" role="button" data-toggle="modal"><i class="icon-remove"></i></a>';	
    return $html;
}
    //-------------------------------------------------------------------------------------------
function qmp_setting_buttons($id)
{
    //$html ='<a class="btn btn-info" href="'.  site_url().'/create/index_qmp_setting/'.$id.'"><i class="icon-edit icon-white"></i>Edit</a> ';
    //$html .='<a onclick="return confirm(\'Delete this record?\');" class="btn btn-danger" href="'.  site_url().'/create/delete_form/'.$id.'"><i class="icon-trash icon-white"></i>Delete</a>';

    $ci= & get_instance(); //#myModal
    $html ='<a href="'.  site_url().'/create/index_setting/'.$id.'"><i class="icon-pencil"></i></a> ';
    $html .='<a onclick="return confirm(\'Delete this record?\');" href="'.  site_url().'/create/delete_setting/'.$id.'" role="button" data-toggle="modal"><i class="icon-remove"></i></a>';	
    return $html;
}
    //-------------------------------------------------------------------------------------------
function campaign_buttons($id)
{
    $ci= & get_instance();
    $html ='<a class="btn btn-info" href="'.  site_url().'/create/index_campaign/'.$id.'"><i class="icon-edit icon-white"></i>Edit</a> ';
    $html .='<a onclick="return confirm(\'Delete this record?\');" class="btn btn-danger" href="'.  site_url().'/create/delete_campaign/'.$id.'"><i class="icon-trash icon-white"></i>Delete</a>';
    return $html;
}
    //-------------------------------------------------------------------------------------------

/* from the bootstrap template, view/edit/delete buttons should look like below
    <td class="center">
            <a class="btn btn-success" href="#">
                    <i class="icon-zoom-in icon-white"></i>  
                    View                                            
            </a>
            <a class="btn btn-info" href="#">
                    <i class="icon-edit icon-white"></i>  
                    Edit                                            
            </a>
            <a class="btn btn-danger" href="#">
                    <i class="icon-trash icon-white"></i> 
                    Delete
            </a>
    </td>
 */