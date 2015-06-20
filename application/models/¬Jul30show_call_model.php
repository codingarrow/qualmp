<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show_call_model extends CI_Model {

  /*
    var $name   = '';
    var $description = '';
    var $status = '';
    //var $tipo = '';
  $qmp_viewandrateuser = 'qmp_csvviewandrateuser';
    
  */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    //-------------------------------------------------------------------------------------------
	  function show_call_list($show) {
	  $campid = $this->input->get_post('campaigns', TRUE);
	  $queryresults = '';
		    switch ($show) 
			           {
			             case "campaigns":
						     //$queryresults='campaigns';
						    $que = $this->db->query("select distinct ccu.contact_center_id,ccu.process_id,campaign_context_id,cc.name as campaigname
													from campaign_context_user ccu
												      JOIN campaign_context cc 
													  ON  ccu.campaign_context_id::text= cc.id::text
													  and user_id in ('".$this->session->userdata('user_id')."')
													limit 100");
								if ($que->num_rows() > 0)
								{
								$queryresults = "<select class='form-control' multiple=multiple size=3  name='campaign[]' id='campaign'>";
								   //foreach ($que->result_array() as $row)
								   foreach ($que->result() as $row)
								   {
								     //$queryresults = $queryresults . '<option value="'.$row[2] . '">'."$row[3]" . '</option>';
								     $queryresults = $queryresults . '<option value="'.$row->campaign_context_id . '">'."".$row->campaigname."" . '</option>';
								   }
								$queryresults = $queryresults . "</select>";
								}
						 break;

			             case "disp":
						    $que = $this->db->query("SELECT DISTINCT dc.disposition_code_name 
													from disposition_code dc, disposition_plan_definition 
													dpd where dc.id=dpd.disposition_code_id 
													and dpd.disposition_plan_id in (select disposition_plan_id from campaign_disposition_plan) order by dc.disposition_code_name
													");
								if ($que->num_rows() > 0)
								{
								$queryresults = "<select class='form-control' multiple=multiple size=3  name='disps[]' id='disps'>";
								   foreach ($que->result_array() as $row)
								   {
								     $queryresults = $queryresults . '<option value="'.$row['disposition_code_name'] . '">'."".$row['disposition_code_name']."" . '</option>';
								   }
								$queryresults = $queryresults . "</select>";
								}
						 break;

			             case "sdisp":
								$queryresults = "<select class='form-control' multiple=multiple  size=4 name='sdisps[]' id='sdisps'>
								                   <option value=\"ATTEMPT_FAILED\">ATTEMPT_FAILED</option>
												   <option value=\"BUSY\">BUSY</option>
												   <option value=\"CALL_DROP\">CALL_DROP</option>
												   <option value=\"CALL_HANGUP\">CALL_HANGUP</option>
												   <option value=\"CONNECTED\">CONNECTED</option>
												   <option value=\"FAILED\">FAILED</option>
												   <option value=\"NO_ANSWER\">NO_ANSWER</option>
												   <option value=\"NOT_TRIED\">NOT_TRIED</option>
												   <option value=\"NUMBER_FAILURE\">NUMBER_FAILURE</option>
												   <option value=\"PROVIDER_FAILURE\">PROVIDER_FAILURE</option>
												   <option value=\"PROVIDER_TEMP_FAILURE\">PROVIDER_TEMP_FAILURE</option>
                                                 </select>";
						 break;

			             case "queues":
						    //$campid=17;
						    $que = $this->db->query("SELECT id as agent_queue_id, name as agent_queue_name from agent_queue where campaign_context_id in ($campid) order by name");
							//echo "SELECT id as agent_queue_id, name as agent_queue_name from agent_queue where campaign_context_id in ($campid) order by name";
								if ($que->num_rows() > 0)
								{
								$queryresults = "<select class='form-control' multiple=multiple size=3  name='queuesArray[]' id='queuesArray'>";
								   foreach ($que->result_array() as $row)
								   {
								     $queryresults = $queryresults . '<option value="'.$row['agent_queue_id'] . '">'."".$row['agent_queue_name']."" . '</option>';
								   }
								$queryresults = $queryresults . "</select>";
								}
						 break;


			             case "agents":
						 //$campid=17;
						    $que = $this->db->query("SELECT user_id from campaign_context_user where campaign_context_id in ($campid)");
								if ($que->num_rows() > 0)
								{
								$queryresults = "<select class='form-control' multiple=multiple size=3  name='agentss[]' id='agentss'>";
								   foreach ($que->result_array() as $row)
								   {
								     $queryresults = $queryresults . '<option value="'.$row['user_id'] . '">'."".$row['user_id']."" . '</option>';
								   }
								$queryresults = $queryresults . "</select>";
								}
						 break;						 

			             case "timewindow":
							   /*
								 name1 = array() ;
								 name1[0]="Start" ;
								 name1[1]="End" ;
								 setTemplate('time');		 
							   */
							    $myDate = date('m-d-Y');
								$queryresults = "<table> 
													<tr><td>Start Date 
															<input class='form-control' name='Start'  onfocus='showCalendarControl(this);' type='text' value='".$myDate."' >
														</td>
														<td>Start Hours 
															<select class='form-control m-bot15' name=h_Start>
															   <option>0</option>
															   <option>1</option>
															   <option>2</option>
															   <option>3</option>
															   <option>4</option>
															   <option>5</option>
															   <option>6</option>
															   <option>7</option>
															   <option>8</option>
															   <option>9</option>
															   <option>10</option>
															   <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option></select></td> 
													   <td>Start Minutes 
															  <select class='form-control m-bot15' name=m_Start><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option></select>
													   </td></tr> 
													   <tr>
													   <td>End Date <input class='form-control' name='End'  onfocus='showCalendarControl(this);' type='text' value='".$myDate."' >  </td>
													   <td>End Hours <select class='form-control m-bot15' name=h_End><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option selected>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option></select></td> 
													   <td>End Minutes <select class='form-control m-bot15' name=m_End><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option>
															   <option selected>56</option><option>56</option><option>57</option><option>58</option><option>59</option>
															</select>
														</td></tr>
												</table>";
						 break;

			             case "inbox":
								if  (isset($_REQUEST["id"]))
								{
									$fname= $_REQUEST["id"] ;
									if ($fname == 'calltime' || $fname == 'calltime1')
									{
									  /*
										echo '
										<input name='. "'$fname'". '     id='. "'$fname'". '   type=text onBlur="
										if(! IsNumeric(document.getElementById(' ."'$fname'".').value))
										{
										alert("'."Only Integer Value Allowed".'") ;
										document.getElementById(' ."'$fname'".').value = '."''".';
									}


									">

									' ;
									  */

										$queryresults = "<input class='form-control' name='$fname' id=$fname class='form-control' type=text>" ;
									
									}else
									{
										$queryresults = "<input class='form-control' name='$fname' id=$fname class='form-control' type=text>" ;
									}
								} else
								{
									$queryresults = "<input class='form-control' name='temp' class='form-control' type=text>" ;

								}

						 
						 break;						 
			             case "ryan":
						     $queryresults='<h1>ryan</h1>';
						 break;
						 }
      //return $queryresults;
	  echo $queryresults;
	  }
	
	
    //-------------------------------------------------------------------------------------------
	
    //-------------------------------------------------------------------------------------------FOR TESTING PURPOSES DON'T REMOVE
	  function updateinsideDIVexample() {
		$data = array(
					   'rateduser' => 'ryan',
					   'form_id' => 'd622-5299867c-CARLO_CARLO-10691'
					);
        //"d622-5299867c-vcall-10691"
		$this->db->where('rated_by', $this->session->userdata('user_id'));
		$this->db->update('qmp_rating', $data); 
	    return $this->db->affected_rows() > 0; 
	  }
    //-------------------------------------------------------------------------------------------
	  function updatesurveyquestions() {
	    /*
		   this will delete any entries on qmp_rating and reload array/batch of questions and campaign
		   http://ellislab.com/codeigniter/user-guide/libraries/input.html
		   http://stackoverflow.com/questions/9050936/does-isset-work-with-get
		*/
		//$questions = $this->input->get_post('surveyquestions', TRUE);
		//echo 'hello' . $questions;
		//if isset($this->input->get_post('surveyquestions', TRUE))
		
		if($this->input->get_post('surveyquestions', TRUE)) 
		{
		//echo('happened');
		  $squestions    =   explode(',',$this->input->get_post('surveyquestions', TRUE));

		    //cleanup
			$data = array(
						   'rateduser' => 'RYAN',
					       'campaignid' => 17
						);
		    //$this->db->where_in('categoryid', trim($this->input->get_post('surveyquestions', TRUE), "'"));

			//!!$where_in = trim($this->input->get_post('surveyquestions', TRUE));
			//!!$where_in = preg_replace("/'/", "", $this->input->get_post('surveyquestions', TRUE));
			
			$where_in = explode(",", $this->input->get_post('surveyquestions', TRUE));
			//$where_in = array_map('intval', $this->input->get_post('surveyquestions', TRUE));
            
		    $this->db->where_in('categoryid', $where_in);
			$this->db->where('rated_by', $this->session->userdata('user_id'));
			$this->db->delete('qmp_rating', $data); 
		    //update
			foreach ($squestions as $questions)
			{
					$survey_questions = array(
					'ratingselectionid' => 1,
					'categoryid' => $questions,
					'campaignid' => 17,
					'rated_by' => $this->session->userdata('user_id'),
					'rateduser' => 'RYAN',
					'form_id' => 'RYAN',
					'topic_id' => '1'
					);		
			$this->db->insert('qmp_rating', $survey_questions);
			}		
		}
			
	  }
    //-------------------------------------------------------------------------------------------
	  function get_call_list(  ) {
		//$this->db->from('qmp_csvviewandrateuser');
		$this->db->from($this->config->item('qmp_table'));
		$this->db->order_by('call_originate_time','desc');

		$calls = $this->db->get()->result_array();

		if( is_array($calls) && count($calls) > 0 ) {
		  return $calls;
		}
		
		return false;
	  }
    //-------------------------------------------------------------------------------------------
	function record_count()
	{
		return $this->db->count_all($qmp_viewandrateuser);
	}
    //-------------------------------------------------------------------------------------------
	function ew_GetArrPost($Arr,$quote) {
		//$Name = str_replace(EW_DB_QUOTE_END, EW_DB_QUOTE_END . EW_DB_QUOTE_END, $Name);
		//return EW_DB_QUOTE_START . $Name . EW_DB_QUOTE_END;
        if  (isset($Arr))
		{
		$campaignvals = "";
		$campaign = $Arr;
		//print_r ($campaign);
		  $counter = count($campaign);
				for ($j=0; $j < $counter; $j++) //loop thru
				{
				    if($quote=="q") {
					                  //$machineId = ew_QuotedValue($campaign[$j],EW_DATATYPE_STRING);
					                  $machineId = "'" . $campaign[$j] ."'"; 
									}
									else
									{
					                  $machineId = $campaign[$j]; 
									}
					$campaignvals .= $machineId.",";
	                //echo $machineId."</br>";
				}
		//chop the trailing comma
        if (isset($campaignvals) && strlen($campaignvals)>1) { $campaignvals = chop($campaignvals,','); }				
		return $campaignvals;
		//echo ew_Splice($campaign, 0);
		}
	}
    //-------------------------------------------------------------------------------------------NEW Jul 30
        function qmp_getcountofquestions($call_id,$getselection)
	{
	  return $this->db->query("SELECT count(count_) as count_ from (
	    select count(ratingselectionid) as count_ from qmp_postrating QMP
	    group by QMP.call_id,rateduser,ratingselectionid,categoryid,topic_id
		     HAVING QMP.call_id in (".$this->ew_QuotedValue($call_id,"str").")
		       and rateduser in ('".$this->session->userdata('user_id')."')
		       and ratingselectionid in (".$getselection.")
		       and topic_id > 0
		   ) X
	")->row()->count_;
	
	}    
    //-------------------------------------------------------------------------------------------
    function ew_QuotedValue($Value, $FldType) {
	    global $conn;
	    if (is_null($Value)) return "NULL";
	    //if isset($Value)
	    //{
	    switch ($FldType) {
	    case "str":
		    return "'" . trim($Value) . "'";
	    /*
	    case EW_DATATYPE_MEMO:
	    case EW_DATATYPE_TIME:
		    if (EW_REMOVE_XSS) {
			    return "'" . ew_AdjustSql(ew_RemoveXSS($Value)) . "'";
		    } else {
			    return "'" . ew_AdjustSql($Value) . "'";
		    }
	    case EW_DATATYPE_XML:
		    return "'" . ew_AdjustSql($Value) . "'";
	    case EW_DATATYPE_BLOB:
		    return "'" . $conn->BlobEncode($Value) . "'";
	    case EW_DATATYPE_DATE:
		    return "'" . ew_AdjustSql($Value) . "'";
	    case EW_DATATYPE_GUID:
		    return "'" . $Value . "'";
	    case EW_DATATYPE_BOOLEAN:
		    return "'" . $Value . "'"; // 'Y'|'N' or 'y'|'n' or '1'|'0' or 't'|'f'
	    */
	    default:
		    return trim($Value);
	    //}
	    }
    }    
    //-------------------------------------------------------------------------------------------
    
	function qmp_searchbuildwhere()
	{
         //$campid = $this->input->get_post('campaigns', TRUE);
	 //if there are no parameters passed, do not return any rows
	$morewhere = "";
	      if  (isset($_REQUEST["campaign"]))
		      {
			//echo "campaigns:".ew_GetArrPost($_REQUEST["campaign"],"")."<br>";
			$morewhere = " AND campaign_id IN (".$this->ew_GetArrPost($_REQUEST["campaign"],""). ")";
		      }
	      if  (isset($_REQUEST["disps"]))
		      {
			//echo "user dispositions:".ew_GetArrPost($_REQUEST["disps"],"q")."<br>";
			$morewhere .= " AND disposition_code IN (".$this->ew_GetArrPost($_REQUEST["disps"],"q"). ")";
		      }
	      if  (isset($_REQUEST["sdisps"]))
		      {
			//echo "system dispositions:".ew_GetArrPost($_REQUEST["sdisps"],"q")."<br>";
			$morewhere .= " AND system_disposition IN (".$this->ew_GetArrPost($_REQUEST["sdisps"],"q"). ")"; 
		      }
	      if  (isset($_REQUEST["queuesArray"]))
		      {
			//echo "queues:".ew_GetArrPost($_REQUEST["queuesArray"],"q")."<br>";
		      }
	      if  (isset($_REQUEST["agentss"]))
		      {
			//echo "agents:".ew_GetArrPost($_REQUEST["agentss"],"q")."<br>";
			$morewhere .= " AND user_id IN (".$this->ew_GetArrPost($_REQUEST["agentss"],"q"). ")"; 
		      }
		      /*
		       Start  h_Start  m_Start 
		       End    h_End    m_End
		      */
		      //---------------------------------------------------------------------------------------------
	      if  (isset($_REQUEST["phone"]))
		      {
			//echo "phone:".ew_GetArrPost($_REQUEST["phone"],"q")."<br>";
			$morewhere .= " AND phone IN (".$this->ew_QuotedValue($_REQUEST["phone"],"str"). ")"; 
		      }
	      if  (isset($_REQUEST["vlogfname"]))
		      {
			//echo "filename:".ew_GetArrPost($_REQUEST["vlogfname"],"q")."<br>";
			$morewhere .= " AND recording_file_url IN (".$this->ew_QuotedValue($_REQUEST["vlogfname"],"str"). ")"; 
		      }
	      if  (isset($_REQUEST["callid"]))
		      {
			//echo "callid:".ew_GetArrPost($_REQUEST["callid"],"q")."<br>";
			$morewhere .= " AND call_id similar to '%".$this->ew_QuotedValue($_REQUEST["callid"],"")."%'"; 
		      }
	      if  (isset($_REQUEST["calltime"]))
		      {
			//echo "call>:".ew_GetArrPost($_REQUEST["calltime"],"q")."<br>";
			$morewhere .= " AND (EXTRACT(SECOND FROM call_originate_time)<".$this->ew_QuotedValue($_REQUEST["calltime"],"").")";
		      }
	      if  (isset($_REQUEST["calltime1"]))
		      {
			//echo "call<:".ew_GetArrPost($_REQUEST["calltime1"],"q")."<br>";
			$morewhere .= " AND (EXTRACT(SECOND FROM call_originate_time)>".$this->ew_QuotedValue($_REQUEST["calltime1"],"").")";
		      }
                //keep where
		if($morewhere)
		{
			$this->session->set_userdata('morewhere', $morewhere);
			return $morewhere;
		}
		elseif($this->session->userdata('morewhere'))
		{
			$morewhere = $this->session->userdata('morewhere');
			return $morewhere;
		}
		else
		{
			$morewhere ="";
			return $morewhere;
		}
		      
	//return  $morewhere;
	}
	
    //-------------------------------------------------------------------------------------------
        function limit_assigned_user()
	{//echo base_url();exit;
		$hlduserlevel = $this->session->userdata('userlevel'); //CurrentUserLevel();
		$url = $this->config->item('qmp_url')."/index.php/crmcontroller/show_surveyform " ;//"qmp_settingslist.php";
		//$url = site_url()+"/index.php/crmcontroller/show_surveyform " ;//"qmp_settingslist.php";
		$hldcampaignids = "";
		$hldcampaignidsquery = "";
		/*
		$campaignsforthisuser = ew_Execute("select campaign_id,name from qmp_loginuser where user_id in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").")");
			foreach ($campaignsforthisuser as $keyR => $valR) 
			  {
			    $hldcampaignids .= $valR[0].",";
			  }
		*/
		$campaignsforthisuser = $this->db->query("select campaign_id,name from qmp_loginuser where user_id in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").")");
			    if ($campaignsforthisuser->num_rows() > 0)
			    {
			    //!!$queryresults = "<select class='form-control' multiple=multiple size=3  name='agentss[]' id='agentss'>";
			       foreach ($campaignsforthisuser->result_array() as $row)
			       {
				 //!!$queryresults = $queryresults . '<option value="'.$row['user_id'] . '">'."".$row['user_id']."" . '</option>';
				 $hldcampaignids .= $row['campaign_id'].",";
			       }
			    //!!$queryresults = $queryresults . "</select>";
			    }
			  
	    if (isset($hldcampaignids) && strlen($hldcampaignids)>1) { $hldcampaignids = chop($hldcampaignids,','); 
		     $hldcampaignidsquery = " OR user_id in (select user_id from qmp_loginuser where (campaign_id in (".$hldcampaignids."))
                                       and (user_id not in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").")))
                                    " ;}
            //--------------------------------------------------------------------------
	    //echo 'here '.$hlduserlevel;
	    //echo 'here '.$this->session->set_userdata('user_id');
            //--------------------------------------------------------------------------
	    
						switch ($hlduserlevel) {
							//case -1:
							case -1:
								//echo "Admin query";
								$hldDetailFilter = "";

									if ($url <> "") {
										if (!EW_DEBUG_ENABLED && ob_get_length())
											ob_end_clean();
										header("Location: " . $url);
									}
									exit();
								
								break;
							case 3:
								//echo "Admin query";
								$hldDetailFilter = "";

									if ($url <> "") {
										if (!EW_DEBUG_ENABLED && ob_get_length())
											ob_end_clean();
										header("Location: " . $url);
									}
									exit();
								
								break;
							case 2:
								//echo "Supervisor query";
								/* guide
								$hldDetailFilter = "user_id in ('SankashSupervisor') OR user_id in (select user_id from qmp_loginuser where (campaign_id in (11))
													and (user_id not in ('SankashSupervisor'))
													)";
								*/
								
								$hldDetailFilter = "user_id in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").") ".$hldcampaignidsquery;
								
								break;
							default:
								//all Prof-Agents will only see their records
								//echo "Agent query";
								//!!$hldDetailFilter = "";
								$hldDetailFilter = "user_id in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").") ";
						}
	    //--------------------------------------------------------------------------
			return $hldDetailFilter;
	}
    //-------------------------------------------------------------------------------------------
    
	//function search_record_count($searchterm)
	//
	function search_record_count()
	{
	  //echo 'HELLO'.$this->session->set_userdata('user_id');
        //change this to the real table once debugging's ok
        $qmp_viewandrateuser = $this->config->item('qmp_table');
	  
	  $buildwhere = " WHERE (1=0) ";
	  //$buildwhere = $this->qmp_searchbuildwhere();
	  $lenwhere = strlen($this->qmp_searchbuildwhere());
	  if ($lenwhere>2) { $buildwhere = " WHERE (1=1) " . $this->qmp_searchbuildwhere();}
		//$sql = "SELECT COUNT(*) As cnt FROM ".$qmp_viewandrateuser." WHERE Continent LIKE '%" . $searchterm . "%'";
		$sql = "SELECT COUNT(*) As cnt FROM ".$qmp_viewandrateuser. $buildwhere . " AND " . $this->limit_assigned_user() . "
				  and calldate is not null
				  AND length(calldate::text) > 4
		";
		$q = $this->db->query($sql);
		$row = $q->row(); 
		return $row->cnt;
	}    
    //-------------------------------------------------------------------------------------------
	//function search($searchterm,$limit)
	//
	function search($limit)
	{
        //change this to the real table once debugging's ok
        $qmp_viewandrateuser = $this->config->item('qmp_table');
	  
	       /*
		$sql = "SELECT * FROM ".$qmp_viewandrateuser." 
				WHERE Continent LIKE '%" . $searchterm . "%' LIMIT " .$limit . ",20";
	       */
	  $buildwhere = " WHERE (1=0) ";
	  //if strlen(this->qmp_searchbuildwhere())>2 { $buildwhere = this->qmp_searchbuildwhere();}
	  $lenwhere = strlen($this->qmp_searchbuildwhere());
	  if ($lenwhere>2) { $buildwhere = " WHERE (1=1) " . $this->qmp_searchbuildwhere();}
	       
		$sql = "SELECT * FROM ".$qmp_viewandrateuser."  " . $buildwhere .  " AND
				 " . $this->limit_assigned_user() . "
				  and calldate is not null
				  AND length(calldate::text) > 4
				  order by call_originate_time DESC				 
				 LIMIT 20 OFFSET
				 ".$limit;

				 //" . $buildwhere . " LIMIT 20 OFFSET ".$limit;
				 //" . $buildwhere . " LIMIT " .$limit . ",20";
                //limit 10 offset 5 
		//!!echo $sql;		
		$q = $this->db->query($sql);
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		else
		{
			return 0;
		}
	}

    //-------------------------------------------------------------------------------------------

    //-------------------------------------------------------------------------------------------
	function searchterm_handler($searchterm)
	{
	  
		if($searchterm)
		{
			$this->session->set_userdata('searchterm', $searchterm);
			return $searchterm;
		}
		elseif($this->session->userdata('searchterm'))
		{
			$searchterm = $this->session->userdata('searchterm');
			return $searchterm;
		}
		else
		{
			$searchterm ="";
			return $searchterm;
		}
	}
    //-------------------------------------------------------------------------------------------
    
	  //function get_posts_for_user( $user_id, $num_posts = 10 ) {
	  function get_surveyquestions(  ) {

	  /*
		$this->db->from('post');
		$this->db->where( array('userId'=>$user_id) );
		$this->db->limit( $num_posts );
		$this->db->order_by('createdDate','desc');
	  */
		$this->db->from('qmp_rating_topic');
        $this->db->where('isvisible', '1'); 

		$topics = $this->db->get()->result_array();

		if( is_array($topics) && count($topics) > 0 ) {
		  return $topics;
		}

		return false;
	  }
    //-------------------------------------------------------------------------------------------
	  function get_surveysubquestions(  $topic_id ) {
		$this->db->from('qmp_rating_category');
		$this->db->where('topic_id', $topic_id);
        $this->db->where('isvisible', '1'); 

		$questions = $this->db->get()->result_array();

		if( is_array($questions) && count($questions) > 0 ) {
		  return $questions;
		}

		return false;
	  }
	  
    //-------------------------------------------------------------------------------------------
    
    function get_all_entries()
    {
       
        $query = $this->db->get('crm_script');
        return $query->result();
    }

    function insert_entry($data)
    {
        $this->name   = $data['name']; // please read the below note
        $this->description = $data['description'];
        //get back on this http://stackoverflow.com/questions/6723941/codeigniter-inserts-empty-value-default-value-of-table-field-in-mysql-is-ignore have DEFAULT in MySQL
        $this->status = 'A'; //$this->status = $data['status'];
        //$this->tipo = 'B'; //$this->tipo = $data['tipo'];
        //$this->date    = time();

        $this->db->insert('crm_script', $this);
    }

    function update_entry($data)
    {
        $this->name   = $data['name']; // please read the below note
        $this->description = $data['description'];
        //get back on this http://stackoverflow.com/questions/6723941/codeigniter-inserts-empty-value-default-value-of-table-field-in-mysql-is-ignore have DEFAULT in MySQL
        $this->status = 'A'; //$this->status = $data['status'];
        //$this->tipo = 'B'; //$this->tipo = $data['tipo'];
        //$this->date    = time();
        $this->db->update('crm_script', $this, array('id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('crm_script', array('id' => $id));
    }

    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get('crm_script', 1);
        return $query->result();
    }



}