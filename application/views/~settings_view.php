			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Forms</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Form Elements</h2>
						<div class="box-icon">
							<!--a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a-->
						</div>
					</div>
					<div class="box-content">

                                          <?php //echo validation_errors(); ?> 
                                            
						<form class="form-horizontal" method="POST" action="<?php echo $_SESSION['host_']?>index.php/create/edit_settings/">
                                                <input type="hidden" name="id" value="<?php echo $entry->setting_id; ?>"/>                                                    
						  <fieldset>
							<legend>Form</legend>

							<div class="control-group">
							  <label class="control-label" for="isvisible">Is this row visible</label>
							  <div class="controls">
								  <select id="isvisible" name="isvisible">
									<option value="0" <?php echo set_select('isvisible', '0', TRUE); ?> >0</option>
									<option value="1" <?php echo set_select('isvisible', '1'); ?> >1</option>
								  </select>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="name">Setting Name *</label>
							  <div class="controls">
								<!--input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12"-->
								  <input class="input-xlarge focused" id="setting_name" name="setting_name" type="text" value="<?php echo $entry->setting_name; ?>" > <?php echo form_error('setting_name'); ?>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="setting_value">Setting Value *</label>
							  <div class="controls">
								<!--textarea class="cleditor" id="textarea2" name="descripcion" rows="3"--><?php //echo $entry->descripcion; ?><!--/textarea--> <?php //echo form_error('descripcion'); ?>
								  <input class="input-xlarge focused" id="setting_value" name="setting_value" type="text" value="<?php echo $entry->setting_value; ?>" > <?php echo form_error('setting_value'); ?>
							  </div>
							</div>
							
                                                        
                                                        <?php
                                                        /*
							<div class="control-group">
							  <label class="control-label" for="retypepassword">Retype password *</label>
							  <div class="controls">
								<!--textarea class="cleditor" id="textarea2" rows="3"></textarea-->
								  <input class="input-xlarge focused" id="retypepassword" type="password" >
							  </div>
							</div>
                                                         * 
                                                         */?>

                                                        <?php
                                                        /*
							<div class="control-group">
							  <label class="control-label" for="retypeeccp_password">Retype ECCP password</label>
							  <div class="controls">
								  <input class="input-xlarge focused" id="retypeeccp_password" type="password" >
							  </div>
							</div>
                                                         * 
                                                         */?>
                                                        
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="button"  onclick="window.location='<?php echo site_url();?>/crmcontroller/show_form';" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

                        <?php
                        /* ----------- Guide for more form elements
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Focused input</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Uneditable input</label>
								<div class="controls">
								  <span class="input-xlarge uneditable-input">Some value here</span>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="disabledInput">Disabled input</label>
								<div class="controls">
								  <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here…" disabled="">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" id="optionsCheckbox2" value="option1" disabled="">
									This is a disabled checkbox
								  </label>
								</div>
							  </div>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">Input with warning</label>
								<div class="controls">
								  <input type="text" id="inputWarning">
								  <span class="help-inline">Something may have gone wrong</span>
								</div>
							  </div>
							  <div class="control-group error">
								<label class="control-label" for="inputError">Input with error</label>
								<div class="controls">
								  <input type="text" id="inputError">
								  <span class="help-inline">Please correct the error</span>
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">Input with success</label>
								<div class="controls">
								  <input type="text" id="inputSuccess">
								  <span class="help-inline">Woohoo!</span>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError3">Plain Select</label>
								<div class="controls">
								  <select id="selectError3">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Modern Select</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError1">Multiple Select / Tags</label>
								<div class="controls">
								  <select id="selectError1" multiple data-rel="chosen">
									<option>Option 1</option>
									<option selected>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError2">Group Select</label>
								<div class="controls">
									<select data-placeholder="Your Favorite Football Team" id="selectError2" data-rel="chosen">
										<option value=""></option>
										<optgroup label="NFC EAST">
										  <option>Dallas Cowboys</option>
										  <option>New York Giants</option>
										  <option>Philadelphia Eagles</option>
										  <option>Washington Redskins</option>
										</optgroup>
										<optgroup label="NFC NORTH">
										  <option>Chicago Bears</option>
										  <option>Detroit Lions</option>
										  <option>Green Bay Packers</option>
										  <option>Minnesota Vikings</option>
										</optgroup>
										<optgroup label="NFC SOUTH">
										  <option>Atlanta Falcons</option>
										  <option>Carolina Panthers</option>
										  <option>New Orleans Saints</option>
										  <option>Tampa Bay Buccaneers</option>
										</optgroup>
										<optgroup label="NFC WEST">
										  <option>Arizona Cardinals</option>
										  <option>St. Louis Rams</option>
										  <option>San Francisco 49ers</option>
										  <option>Seattle Seahawks</option>
										</optgroup>
										<optgroup label="AFC EAST">
										  <option>Buffalo Bills</option>
										  <option>Miami Dolphins</option>
										  <option>New England Patriots</option>
										  <option>New York Jets</option>
										</optgroup>
										<optgroup label="AFC NORTH">
										  <option>Baltimore Ravens</option>
										  <option>Cincinnati Bengals</option>
										  <option>Cleveland Browns</option>
										  <option>Pittsburgh Steelers</option>
										</optgroup>
										<optgroup label="AFC SOUTH">
										  <option>Houston Texans</option>
										  <option>Indianapolis Colts</option>
										  <option>Jacksonville Jaguars</option>
										  <option>Tennessee Titans</option>
										</optgroup>
										<optgroup label="AFC WEST">
										  <option>Denver Broncos</option>
										  <option>Kansas City Chiefs</option>
										  <option>Oakland Raiders</option>
										  <option>San Diego Chargers</option>
										</optgroup>
								  </select>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
                        ---------------- */
                        ?>
                        <?php
                        /* ----------- Guide for more form elements
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="prependedInput">Prepended text</label>
								<div class="controls">
								  <div class="input-prepend">
									<span class="add-on">@</span><input id="prependedInput" size="16" type="text">
								  </div>
								  <p class="help-block">Here's some help text</p>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="appendedInput">Appended text</label>
								<div class="controls">
								  <div class="input-append">
									<input id="appendedInput" size="16" type="text"><span class="add-on">.00</span>
								  </div>
								  <span class="help-inline">Here's more help text</span>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="appendedPrependedInput">Append and prepend</label>
								<div class="controls">
								  <div class="input-prepend input-append">
									<span class="add-on">$</span><input id="appendedPrependedInput" size="16" type="text"><span class="add-on">.00</span>
								  </div>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="appendedInputButton">Append with button</label>
								<div class="controls">
								  <div class="input-append">
									<input id="appendedInputButton" size="16" type="text"><button class="btn" type="button">Go!</button>
								  </div>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="appendedInputButtons">Two-button append</label>
								<div class="controls">
								  <div class="input-append">
									<input id="appendedInputButtons" size="16" type="text"><button class="btn" type="button">Search</button><button class="btn" type="button">Options</button>
								  </div>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Checkboxes</label>
								<div class="controls">
								  <label class="checkbox inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
								  </label>
								  <label class="checkbox inline">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
								  </label>
								  <label class="checkbox inline">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
								  </label>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">File Upload</label>
								<div class="controls">
								  <input type="file">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Radio buttons</label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
									Option one is this and that—be sure to include why it's great
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									Option two can be something else and selecting it will deselect option one
								  </label>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						</form>
					</div>
				</div><!--/span-->

			</div><!--/row-->
                        ---------- 
					<!-- content ends -->
                         *                          */ 
    
