<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   /*
    * Javascript functions below copied directly from https://172.16.20.239/index.php?menu=campaign_out&action=new_campaign
    * Elastix Edit Campaign
    */
            //calls the script for multiple dropdown fields   
            //http://www.maxi-pedia.com/string+contains+substring+PHP for tip
$pos = strpos($_SERVER['PATH_INFO'],'index_campaign');
$qos = strpos($_SERVER['PATH_INFO'],'newcampaign');

 if($pos == TRUE || $qos == TRUE) {
?>
<script type="text/javascript">
/* Función para recoger todas las variables del formulario y procesarlas. Sólo
   se requiere atención especial para el RTF del script, y para la lista de 
   formularios elegidos. */
/*    
function enviar_datos()
{   
	var lc = listaControlesFormularios();
	var select_form = lc[1];   //Formularios elegidos 
    var values = "";
    
    for(var i=0; i < select_form.length; i++) {
        values = values + select_form[i].value + ",";
    }
    if(values != "")
        values = values.substring(0,values.length-1);
    document.getElementById("values_form").value = values;

    updateRTEs();
    return true;
}
*/
function add_form()
{
	var lc = listaControlesFormularios();
	var select_formularios = lc[0];
	var select_formularios_elegidos = lc[1];
        var saveid = document.getElementById('saveid');
        //alert(saveid.value);
        
    for(var i=0;i<select_formularios.length;i++){
        if(select_formularios[i].selected){
            var option_tmp = document.createElement("option");

            //select_formularios_elegidos.options[i].selected = true; 
            saveid.value += select_formularios[i].value + "," ;
                    
            option_tmp.value = select_formularios[i].value;
            option_tmp.appendChild(document.createTextNode(select_formularios[i].firstChild.data));
            select_formularios_elegidos.appendChild(option_tmp);
        }
    }
    //http://stackoverflow.com/questions/15190464/how-do-i-post-all-options-in-a-select-list
    //------------------http://stackoverflow.com/questions/12411147/how-to-post-all-the-options-in-a-dropdown
    /*
    var selObj = document.getElementById('formulario');  //formularios_elegidos
    for (var i=0; i<selObj.options.length; i++) {
        selObj.options[i].selected = true;
    }
    */
    //------------------

    for(var i=select_formularios.length-1;i>=0;i--){
        if(select_formularios[i].selected){
            select_formularios.removeChild(select_formularios[i]);
        }
    }
}


function drop_form()
{
	var lc = listaControlesFormularios();
	var select_formularios = lc[0];
	var select_formularios_elegidos = lc[1];

    for(var i=0;i<select_formularios_elegidos.length;i++){
        if(select_formularios_elegidos[i].selected){
            
            saveid.value = "";
            
            var option_tmp = document.createElement("option");
            option_tmp.value = select_formularios_elegidos[i].value;
            option_tmp.appendChild(document.createTextNode(select_formularios_elegidos[i].firstChild.data));
            select_formularios.appendChild(option_tmp);
        }
    }

    for(var i=select_formularios_elegidos.length-1;i>=0;i--){
        if(select_formularios_elegidos[i].selected){
            select_formularios_elegidos.removeChild(select_formularios_elegidos[i]);
        }
    }
}

/* Esta función es necesaria para lidiar con el cambio en los nombres de los 
   controles generados por Elastix entre 1.6-12 y 1.6.2-1 */
function listaControlesFormularios()
{
	var listaControles;
	var select_formularios;
	var select_formularios_elegidos;
	
	listaControles = document.getElementsByName('formulario');
	if (listaControles.length == 0)
		listaControles = document.getElementsByName('formulario[]');
    select_formularios = listaControles[0];
    
	listaControles = document.getElementsByName('formularios_elegidos');
	if (listaControles.length == 0)
		listaControles = document.getElementsByName('formularios_elegidos[]');
    select_formularios_elegidos = listaControles[0];

	var lista = new Array();
	lista[0] = select_formularios;
	lista[1] = select_formularios_elegidos;
	return lista;
}
</script>

 <?php  } ?>