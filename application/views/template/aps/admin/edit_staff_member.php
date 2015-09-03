<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Staff Member</li>
              </ul>
              <h4>Add Staff Member</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <div class="col-md-12">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'fee_form');
      echo form_open_multipart('', $attributes);
      //var_dump($error);
    ?>

        <div class="panel-body">
          <h5>Fields marked with <em>*</em> must be filled.</h5>
               
          <div class="col-md-6">
             <h5>Personal Details</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Emp. Code <em>*</em></label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'emp_code',
                        'id'    => 'emp_code',
                        'value' => $query['emp_code'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('emp_code'); ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Name <em>*</em></label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'first_name',
                        'id'    => 'first_name',
                        'value' => $query['firstname'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('first_name'); ?>
              </div>
            </div>

           <div class="form-group text-left">
              <label class="col-md-3 control-label">Mother Name</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'mothername',
                        'id'    => 'mothername',
                        'value' => $query['mothername'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Father Name</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'fathername',
                        'id'    => 'fathername',
                        'value' => $query['fathername'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Date of Birth</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'dob',
                        'id'    => 'dob',
                        'value' => $query['dob'],
                        'class' => 'form-control datepicker',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('dob'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Gender <em>*</em></label>
              <div class="col-md-9">
                <?php

                if(set_value('gender')=='male' || $query['gender']=='male') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gender',
                        'id'            => 'gender',
                        'value'         => 'male',
                        'checked'       => $checked,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Male </label>";
                
                if(set_value('gender')=='female' || $query['gender']=='female') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gender',
                        'id'            => 'gender',
                        'value'         => 'female',
                        'checked'       => $checked,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Female </label>";
                ?>
                <?php echo form_error('gender'); ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Birth Place</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'birth_place',
                        'id'    => 'birth_place',
                        'value' => $query['birth_place'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('birth_place'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Mother Tounge</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'm_tounge',
                        'id'    => 'm_tounge',
                        'value' => $query['m_tounge'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('mother_tongue'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Blood Group</label>
              <div class="col-md-9">
                <select class="form-control" name="blood_group">
                  <option >Select</option>
                  <option <?php if($query['b_group']=='Unknown'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'Unknown'); ?> >Unknown</option>
                  <option <?php if($query['b_group']=='A+'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'A+'); ?> >A+</option>
                  <option <?php if($query['b_group']=='A-'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'A-'); ?> >A-</option>
                  <option <?php if($query['b_group']=='B+'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'B+'); ?> >B+</option>
                  <option <?php if($query['b_group']=='B-'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'B-'); ?> >B-</option>
                  <option <?php if($query['b_group']=='AB+'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'AB+'); ?> >AB+</option>
                  <option <?php if($query['b_group']=='AB-'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'AB-'); ?> >AB-</option>
                  <option <?php if($query['b_group']=='O+'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'O+'); ?> >O+</option>
                  <option <?php if($query['b_group']=='O-'){ echo "selected"; } ?> <?php echo  set_select('blood_group', 'O-'); ?> >O-</option>
              </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Religion</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'religion',
                        'id'    => 'religion',
                        'value' => $query['religion'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('religion'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Nationality</label>
              <div class="col-md-9">
                <select name="nationality" class="form-control">
                  <option value="" selected>Select Nationality</option>
                  <option <?php if($query['nationality']=='Afghanistan (‫افغانستان‬&lrm;)'){ echo "selected";}?><?php echo  set_select('nationality', 'Afghanistan (‫افغانستان‬&lrm;)'); ?> >Afghanistan (‫افغانستان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Åland Islands (Åland)') { echo "selected";}?>    <?php echo  set_select('nationality', 'Åland Islands (Åland)'); ?> >Åland Islands (Åland)</option>
                  <option <?php if($query['nationality']=='Albania (Shqipëria)') { echo "selected";}?>      <?php echo  set_select('nationality', 'Albania (Shqipëria)'); ?> >Albania (Shqipëria)</option>
                  <option <?php if($query['nationality']=='Algeria (‫الجزائر‬&lrm;)') { echo "selected";}?>     <?php echo  set_select('nationality', 'Algeria (‫الجزائر‬&lrm;)'); ?> >Algeria (‫الجزائر‬&lrm;)</option>
                  <option <?php if($query['nationality']=='American Samoa') { echo "selected";}?>           <?php echo  set_select('nationality', 'American Samoa'); ?> >American Samoa</option>
                  <option <?php if($query['nationality']=='Andorra') { echo "selected";}?>  <?php echo  set_select('nationality', 'Andorra'); ?> >Andorra</option>
                  <option <?php if($query['nationality']=='Angola') { echo "selected";}?>  <?php echo  set_select('nationality', 'Angola'); ?> >Angola</option>
                  <option <?php if($query['nationality']=='Anguilla') { echo "selected";}?>  <?php echo  set_select('nationality', 'Anguilla'); ?> >Anguilla</option>
                  <option <?php if($query['nationality']=='Antarctica') { echo "selected";}?> <?php echo  set_select('nationality', 'Antarctica'); ?> >Antarctica</option>
                  <option <?php if($query['nationality']=='Antigua and Barbuda') {echo "selected";}?><?php echo  set_select('nationality', 'Antigua and Barbuda'); ?> >Antigua and Barbuda</option>
                  <option <?php if($query['nationality']=='Argentina') { echo "selected";}?><?php echo  set_select('nationality', 'Argentina'); ?> >Argentina</option>
                  <option <?php if($query['nationality']=='Armenia (Հայաստան)') { echo "selected";}?><?php echo  set_select('nationality', 'Armenia (Հայաստան)'); ?> >Armenia (Հայաստան)</option>
                  <option <?php if($query['nationality']=='Aruba') { echo "selected";}?><?php echo  set_select('nationality', 'Aruba'); ?> >Aruba</option>
                  <option <?php if($query['nationality']=='Ascension Island') { echo "selected";}?><?php echo  set_select('nationality', 'Ascension Island'); ?> >Ascension Island</option>
                  <option <?php if($query['nationality']=='Australia') { echo "selected";}?><?php echo  set_select('nationality', 'Australia'); ?> >Australia</option>
                  <option <?php if($query['nationality']=='Austria (Österreich)') { echo "selected";}?><?php echo  set_select('nationality', 'Austria (Österreich)'); ?> >Austria (Österreich)</option>
                  <option <?php if($query['nationality']=='Azerbaijan (Azərbaycan)') { echo "selected";}?><?php echo  set_select('nationality', 'Azerbaijan (Azərbaycan)'); ?> >Azerbaijan (Azərbaycan)</option>
                  <option <?php if($query['nationality']=='Bahamas') { echo "selected";}?><?php echo  set_select('nationality', 'Bahamas'); ?> >Bahamas</option>
                  <option <?php if($query['nationality']=='Bahrain (‫البحرين‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Bahrain (‫البحرين‬&lrm;)'); ?> >Bahrain (‫البحرين‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Bangladesh (বাংলাদেশ)') { echo "selected";}?><?php echo  set_select('nationality', 'Bangladesh (বাংলাদেশ)'); ?> >Bangladesh (বাংলাদেশ)</option>
                  <option <?php if($query['nationality']=='Barbados') { echo "selected";}?><?php echo  set_select('nationality', 'Barbados'); ?> >Barbados</option>
                  <option <?php if($query['nationality']=='Belarus (Беларусь)') { echo "selected";}?><?php echo  set_select('nationality', 'Belarus (Беларусь)'); ?> >Belarus (Беларусь)</option>
                  <option <?php if($query['nationality']=='Belgium (België)') { echo "selected";}?><?php echo  set_select('nationality', 'Belgium (België)'); ?> >Belgium (België)</option>
                  <option <?php if($query['nationality']=='Belize') { echo "selected";}?><?php echo  set_select('nationality', 'Belize'); ?> >Belize</option>
                  <option <?php if($query['nationality']=='Benin (Bénin)') { echo "selected";}?><?php echo  set_select('nationality', 'Benin (Bénin)'); ?> >Benin (Bénin)</option>
                  <option <?php if($query['nationality']=='Bermuda') { echo "selected";}?><?php echo  set_select('nationality', 'Bermuda'); ?> >Bermuda</option>
                  <option <?php if($query['nationality']=='Bhutan (འབྲུག)') { echo "selected";}?><?php echo  set_select('nationality', 'Bhutan (འབྲུག)'); ?> >Bhutan (འབྲུག)</option>
                  <option <?php if($query['nationality']=='Bolivia') { echo "selected";}?><?php echo  set_select('nationality', 'Bolivia'); ?> >Bolivia</option>
                  <option <?php if($query['nationality']=='Bosnia and Herzegovina (Босна и Херцеговина)') { echo "selected";}?><?php echo  set_select('nationality', 'Bosnia and Herzegovina (Босна и Херцеговина)'); ?> >Bosnia and Herzegovina (Босна и Херцеговина)</option>
                  <option <?php if($query['nationality']=='Botswana') { echo "selected";}?><?php echo  set_select('nationality', 'Botswana'); ?> >Botswana</option>
                  <option <?php if($query['nationality']=='Bouvet Island') { echo "selected";}?><?php echo  set_select('nationality', 'Bouvet Island'); ?> >Bouvet Island</option>
                  <option <?php if($query['nationality']=='Brazil (Brasil)') { echo "selected";}?><?php echo  set_select('nationality', 'Brazil (Brasil)'); ?> >Brazil (Brasil)</option>
                  <option <?php if($query['nationality']=='British Indian Ocean Territory') { echo "selected";}?><?php echo  set_select('nationality', 'British Indian Ocean Territory'); ?> >British Indian Ocean Territory</option>
                  <option <?php if($query['nationality']=='British Virgin Islands') { echo "selected";}?><?php echo  set_select('nationality', 'British Virgin Islands'); ?> >British Virgin Islands</option>
                  <option <?php if($query['nationality']=='Brunei') { echo "selected";}?><?php echo  set_select('nationality', 'Brunei'); ?> >Brunei</option>
                  <option <?php if($query['nationality']=='Bulgaria (България)') { echo "selected";}?><?php echo  set_select('nationality', 'Bulgaria (България)'); ?> >Bulgaria (България)</option>
                  <option <?php if($query['nationality']=='Burkina Faso') { echo "selected";}?><?php echo  set_select('nationality', 'Burkina Faso'); ?> >Burkina Faso</option>
                  <option <?php if($query['nationality']=='Burundi (Uburundi)') { echo "selected";}?><?php echo  set_select('nationality', 'Burundi (Uburundi)'); ?> >Burundi (Uburundi)</option>
                  <option <?php if($query['nationality']=='Cambodia (កម្ពុជា)') { echo "selected";}?><?php echo  set_select('nationality', 'Cambodia (កម្ពុជា)'); ?> >Cambodia (កម្ពុជា)</option>
                  <option <?php if($query['nationality']=='Cameroon (Cameroun)') { echo "selected";}?><?php echo  set_select('nationality', 'Cameroon (Cameroun)'); ?> >Cameroon (Cameroun)</option>
                  <option <?php if($query['nationality']=='Canada') { echo "selected";}?><?php echo  set_select('nationality', 'Canada'); ?> >Canada</option>
                  <option <?php if($query['nationality']=='Canary Islands (Islas Canarias)') { echo "selected";}?><?php echo  set_select('nationality', 'Canary Islands (Islas Canarias)'); ?> >Canary Islands (Islas Canarias)</option>
                  <option <?php if($query['nationality']=='Cape Verde (Kabu Verdi)') { echo "selected";}?><?php echo  set_select('nationality', 'Cape Verde (Kabu Verdi)'); ?> >Cape Verde (Kabu Verdi)</option>
                  <option <?php if($query['nationality']=='Caribbean Netherlands') { echo "selected";}?><?php echo  set_select('nationality', 'Caribbean Netherlands'); ?> >Caribbean Netherlands</option>
                  <option <?php if($query['nationality']=='Cayman Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Cayman Islands'); ?> >Cayman Islands</option>
                  <option <?php if($query['nationality']=='Central African Republic (République centrafricaine)') { echo "selected";}?><?php echo  set_select('nationality', 'Central African Republic (République centrafricaine)'); ?> >Central African Republic (République centrafricaine)</option>
                  <option <?php if($query['nationality']=='Ceuta and Melilla (Ceuta y Melilla)') { echo "selected";}?><?php echo  set_select('nationality', 'Ceuta and Melilla (Ceuta y Melilla)'); ?> >Ceuta and Melilla (Ceuta y Melilla)</option>
                  <option <?php if($query['nationality']=='Chad (Tchad)') { echo "selected";}?><?php echo  set_select('nationality', 'Chad (Tchad)'); ?> >Chad (Tchad)</option>
                  <option <?php if($query['nationality']=='Chile') { echo "selected";}?><?php echo  set_select('nationality', 'Chile'); ?> >Chile</option>
                  <option <?php if($query['nationality']=='China (中国)') { echo "selected";}?><?php echo  set_select('nationality', 'China (中国)'); ?> >China (中国)</option>
                  <option <?php if($query['nationality']=='Christmas Island') { echo "selected";}?><?php echo  set_select('nationality', 'Christmas Island'); ?> >Christmas Island</option>
                  <option <?php if($query['nationality']=='Clipperton Island (Île Clipperton)') { echo "selected";}?><?php echo  set_select('nationality', 'Clipperton Island (Île Clipperton)'); ?> >Clipperton Island (Île Clipperton)</option>
                  <option <?php if($query['nationality']=='Cocos Islands (Keeling Islands)') { echo "selected";}?><?php echo  set_select('nationality', 'Cocos Islands (Keeling Islands)'); ?> >Cocos Islands (Keeling Islands)</option>
                  <option <?php if($query['nationality']=='Colombia') { echo "selected";}?><?php echo  set_select('nationality', 'Colombia'); ?> >Colombia</option>
                  <option <?php if($query['nationality']=='Comoros (‫جزر القمر‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Comoros (‫جزر القمر‬&lrm;)'); ?> >Comoros (‫جزر القمر‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)') { echo "selected";}?><?php echo  set_select('nationality', 'Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)'); ?> >Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)</option>
                  <option <?php if($query['nationality']=='Congo-Republic (Congo-Brazzaville)') { echo "selected";}?><?php echo  set_select('nationality', 'Congo-Republic (Congo-Brazzaville)'); ?> >Congo-Republic (Congo-Brazzaville)</option>
                  <option <?php if($query['nationality']=='Cook Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Cook Islands'); ?> >Cook Islands</option>
                  <option <?php if($query['nationality']=='Costa Rica') { echo "selected";}?><?php echo  set_select('nationality', 'Costa Rica'); ?> >Costa Rica</option>
                  <option <?php if($query['nationality']=='Côte d’Ivoire') { echo "selected";}?><?php echo  set_select('nationality', 'Côte d’Ivoire'); ?> >Côte d’Ivoire</option>
                  <option <?php if($query['nationality']=='Croatia (Hrvatska)') { echo "selected";}?><?php echo  set_select('nationality', 'Croatia (Hrvatska)'); ?> >Croatia (Hrvatska)</option>
                  <option <?php if($query['nationality']=='Cuba') { echo "selected";}?><?php echo  set_select('nationality', 'Cuba'); ?> >Cuba</option>
                  <option <?php if($query['nationality']=='Curaçao') { echo "selected";}?><?php echo  set_select('nationality', 'Curaçao'); ?> >Curaçao</option>
                  <option <?php if($query['nationality']=='Cyprus (Κύπρος)') { echo "selected";}?><?php echo  set_select('nationality', 'Cyprus (Κύπρος)'); ?> >Cyprus (Κύπρος)</option>
                  <option <?php if($query['nationality']=='Czech Republic (Česká republika)') { echo "selected";}?><?php echo  set_select('nationality', 'Czech Republic (Česká republika)'); ?> >Czech Republic (Česká republika)</option>
                  <option <?php if($query['nationality']=='Denmark (Danmark)') { echo "selected";}?><?php echo  set_select('nationality', 'Denmark (Danmark)'); ?> >Denmark (Danmark)</option>
                  <option <?php if($query['nationality']=='Diego Garcia') { echo "selected";}?><?php echo  set_select('nationality', 'Diego Garcia'); ?> >Diego Garcia</option>
                  <option <?php if($query['nationality']=='Djibouti') { echo "selected";}?><?php echo  set_select('nationality', 'Djibouti'); ?> >Djibouti</option>
                  <option <?php if($query['nationality']=='Dominica') { echo "selected";}?><?php echo  set_select('nationality', 'Dominica'); ?> >Dominica</option>
                  <option <?php if($query['nationality']=='Dominican Republic (República Dominicana)') { echo "selected";}?><?php echo  set_select('nationality', 'Dominican Republic (República Dominicana)'); ?> >Dominican Republic (República Dominicana)</option>
                  <option <?php if($query['nationality']=='Ecuador') { echo "selected";}?><?php echo  set_select('nationality', 'Ecuador'); ?> >Ecuador</option>
                  <option <?php if($query['nationality']=='Egypt (‫مصر‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Egypt (‫مصر‬&lrm;)'); ?> >Egypt (‫مصر‬&lrm;)</option>
                  <option <?php if($query['nationality']=='El Salvador') { echo "selected";}?><?php echo  set_select('nationality', 'El Salvador'); ?> >El Salvador</option>
                  <option <?php if($query['nationality']=='Equatorial Guinea (Guinea Ecuatorial)') { echo "selected";}?><?php echo  set_select('nationality', 'Equatorial Guinea (Guinea Ecuatorial)'); ?> >Equatorial Guinea (Guinea Ecuatorial)</option>
                  <option <?php if($query['nationality']=='Eritrea') { echo "selected";}?><?php echo  set_select('nationality', 'Eritrea'); ?> >Eritrea</option>
                  <option <?php if($query['nationality']=='Estonia (Eesti)') { echo "selected";}?><?php echo  set_select('nationality', 'Estonia (Eesti)'); ?> >Estonia (Eesti)</option>
                  <option <?php if($query['nationality']=='Ethiopia') { echo "selected";}?><?php echo  set_select('nationality', 'Ethiopia'); ?> >Ethiopia</option>
                  <option <?php if($query['nationality']=='Falkland Islands (Islas Malvinas)') { echo "selected";}?><?php echo  set_select('nationality', 'Falkland Islands (Islas Malvinas)'); ?> >Falkland Islands (Islas Malvinas)</option>
                  <option <?php if($query['nationality']=='Faroe Islands (Føroyar)') { echo "selected";}?><?php echo  set_select('nationality', 'Faroe Islands (Føroyar)'); ?> >Faroe Islands (Føroyar)</option>
                  <option <?php if($query['nationality']=='Fiji') { echo "selected";}?><?php echo  set_select('nationality', 'Fiji'); ?> >Fiji</option>
                  <option <?php if($query['nationality']=='Finland (Suomi)') { echo "selected";}?><?php echo  set_select('nationality', 'Finland (Suomi)'); ?> >Finland (Suomi)</option>
                  <option <?php if($query['nationality']=='France') { echo "selected";}?><?php echo  set_select('nationality', 'France'); ?> >France</option>
                  <option <?php if($query['nationality']=='French Guiana (Guyane française)') { echo "selected";}?><?php echo  set_select('nationality', 'French Guiana (Guyane française)'); ?> >French Guiana (Guyane française)</option>
                  <option <?php if($query['nationality']=='French Polynesia (Polynésie française)') { echo "selected";}?><?php echo  set_select('nationality', 'French Polynesia (Polynésie française)'); ?> >French Polynesia (Polynésie française)</option>
                  <option <?php if($query['nationality']=='French Southern Territories (Terres australes françaises)') { echo "selected";}?><?php echo  set_select('nationality', 'French Southern Territories (Terres australes françaises)'); ?> >French Southern Territories (Terres australes françaises)</option>
                  <option <?php if($query['nationality']=='Gabon') { echo "selected";}?><?php echo  set_select('nationality', 'Gabon'); ?> >Gabon</option>
                  <option <?php if($query['nationality']=='Gambia') { echo "selected";}?><?php echo  set_select('nationality', 'Gambia'); ?> >Gambia</option>
                  <option <?php if($query['nationality']=='Georgia (საქართველო)') { echo "selected";}?><?php echo  set_select('nationality', 'Georgia (საქართველო)'); ?> >Georgia (საქართველო)</option>
                  <option <?php if($query['nationality']=='Germany (Deutschland)') { echo "selected";}?><?php echo  set_select('nationality', 'Germany (Deutschland)'); ?> >Germany (Deutschland)</option>
                  <option <?php if($query['nationality']=='Ghana (Gaana)') { echo "selected";}?><?php echo  set_select('nationality', 'Ghana (Gaana)'); ?> >Ghana (Gaana)</option>
                  <option <?php if($query['nationality']=='Gibraltar') { echo "selected";}?><?php echo  set_select('nationality', 'Gibraltar'); ?> >Gibraltar</option>
                  <option <?php if($query['nationality']=='Greece (Ελλάδα)') { echo "selected";}?><?php echo  set_select('nationality', 'Greece (Ελλάδα)'); ?> >Greece (Ελλάδα)</option>
                  <option <?php if($query['nationality']=='Greenland (Kalaallit Nunaat)') { echo "selected";}?><?php echo  set_select('nationality', 'Greenland (Kalaallit Nunaat)'); ?> >Greenland (Kalaallit Nunaat)</option>
                  <option <?php if($query['nationality']=='Grenada') { echo "selected";}?><?php echo  set_select('nationality', 'Grenada'); ?> >Grenada</option>
                  <option <?php if($query['nationality']=='Guadeloupe') { echo "selected";}?><?php echo  set_select('nationality', 'Guadeloupe'); ?> >Guadeloupe</option>
                  <option <?php if($query['nationality']=='Guam') { echo "selected";}?><?php echo  set_select('nationality', 'Guam'); ?> >Guam</option>
                  <option <?php if($query['nationality']=='Guatemala') { echo "selected";}?><?php echo  set_select('nationality', 'Guatemala'); ?> >Guatemala</option>
                  <option <?php if($query['nationality']=='Guernsey') { echo "selected";}?><?php echo  set_select('nationality', 'Guernsey'); ?> >Guernsey</option>
                  <option <?php if($query['nationality']=='Guinea (Guinée)') { echo "selected";}?><?php echo  set_select('nationality', 'Guinea (Guinée)'); ?> >Guinea (Guinée)</option>
                  <option <?php if($query['nationality']=='Guinea-Bissau (Guiné Bissau)') { echo "selected";}?><?php echo  set_select('nationality', 'Guinea-Bissau (Guiné Bissau)'); ?> >Guinea-Bissau (Guiné Bissau)</option>
                  <option <?php if($query['nationality']=='Guyana') { echo "selected";}?><?php echo  set_select('nationality', 'Guyana'); ?> >Guyana</option>
                  <option <?php if($query['nationality']=='Haiti') { echo "selected";}?><?php echo  set_select('nationality', 'Haiti'); ?> >Haiti</option>
                  <option <?php if($query['nationality']=='Heard Island and McDonald Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Heard Island and McDonald Islands'); ?> >Heard Island and McDonald Islands</option>
                  <option <?php if($query['nationality']=='Honduras') { echo "selected";}?><?php echo  set_select('nationality', 'Honduras'); ?> >Honduras</option>
                  <option <?php if($query['nationality']=='Hong Kong (香港)') { echo "selected";}?><?php echo  set_select('nationality', 'Hong Kong (香港)'); ?> >Hong Kong (香港)</option>
                  <option <?php if($query['nationality']=='Hungary (Magyarország)') { echo "selected";}?><?php echo  set_select('nationality', 'Hungary (Magyarország)'); ?> >Hungary (Magyarország)</option>
                  <option <?php if($query['nationality']=='Iceland (Ísland)') { echo "selected";}?><?php echo  set_select('nationality', 'Iceland (Ísland)'); ?> >Iceland (Ísland)</option>
                  <option <?php if($query['nationality']=='India (भारत)') { echo "selected";}?><?php echo  set_select('nationality', 'India (भारत)'); ?> >India (भारत)</option>
                  <option <?php if($query['nationality']=='Indonesia') { echo "selected";}?><?php echo  set_select('nationality', 'Indonesia'); ?> >Indonesia</option>
                  <option <?php if($query['nationality']=='Iran (‫ایران‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Iran (‫ایران‬&lrm;)'); ?> >Iran (‫ایران‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Iraq (‫العراق‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Iraq (‫العراق‬&lrm;)'); ?> >Iraq (‫العراق‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Ireland') { echo "selected";}?><?php echo  set_select('nationality', 'Ireland'); ?> >Ireland</option>
                  <option <?php if($query['nationality']=='Isle of Man') { echo "selected";}?><?php echo  set_select('nationality', 'Isle of Man'); ?> >Isle of Man</option>
                  <option <?php if($query['nationality']=='Israel (‫ישראל‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Israel (‫ישראל‬&lrm;)'); ?> >Israel (‫ישראל‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Italy (Italia)') { echo "selected";}?><?php echo  set_select('nationality', 'Italy (Italia)'); ?> >Italy (Italia)</option>
                  <option <?php if($query['nationality']=='Jamaica') { echo "selected";}?><?php echo  set_select('nationality', 'Jamaica'); ?> >Jamaica</option>
                  <option <?php if($query['nationality']=='Japan (日本)') { echo "selected";}?><?php echo  set_select('nationality', 'Japan (日本)'); ?> >Japan (日本)</option>
                  <option <?php if($query['nationality']=='Jersey') { echo "selected";}?><?php echo  set_select('nationality', 'Jersey'); ?> >Jersey</option>
                  <option <?php if($query['nationality']=='Jordan (‫الأردن‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Jordan (‫الأردن‬&lrm;)'); ?> >Jordan (‫الأردن‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Kazakhstan (Казахстан)') { echo "selected";}?><?php echo  set_select('nationality', 'Kazakhstan (Казахстан)'); ?> >Kazakhstan (Казахстан)</option>
                  <option <?php if($query['nationality']=='Kenya') { echo "selected";}?><?php echo  set_select('nationality', 'Kenya'); ?> >Kenya</option>
                  <option <?php if($query['nationality']=='Kiribati') { echo "selected";}?><?php echo  set_select('nationality', 'Kiribati'); ?> >Kiribati</option>
                  <option <?php if($query['nationality']=='Kosovo (Косово)') { echo "selected";}?><?php echo  set_select('nationality', 'Kosovo (Косово)'); ?> >Kosovo (Косово)</option>
                  <option <?php if($query['nationality']=='Kuwait (‫الكويت‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Kuwait (‫الكويت‬&lrm;)'); ?> >Kuwait (‫الكويت‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Kyrgyzstan') { echo "selected";}?><?php echo  set_select('nationality', 'Kyrgyzstan'); ?> >Kyrgyzstan</option>
                  <option <?php if($query['nationality']=='Laos (ສ.ປ.ປ ລາວ)') { echo "selected";}?><?php echo  set_select('nationality', 'Laos (ສ.ປ.ປ ລາວ)'); ?> >Laos (ສ.ປ.ປ ລາວ)</option>
                  <option <?php if($query['nationality']=='Latvia (Latvija)') { echo "selected";}?><?php echo  set_select('nationality', 'Latvia (Latvija)'); ?>  >Latvia (Latvija)</option>
                  <option <?php if($query['nationality']=='Lebanon (‫لبنان‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Lebanon (‫لبنان‬&lrm;)'); ?> >Lebanon (‫لبنان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Lesotho') { echo "selected";}?><?php echo  set_select('nationality', 'Lesotho'); ?> >Lesotho</option>
                  <option <?php if($query['nationality']=='Liberia') { echo "selected";}?><?php echo  set_select('nationality', 'Liberia'); ?> >Liberia</option>
                  <option <?php if($query['nationality']=='Libya (‫ليبيا‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Libya (‫ليبيا‬&lrm;)'); ?> >Libya (‫ليبيا‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Liechtenstein') { echo "selected";}?><?php echo  set_select('nationality', 'Liechtenstein'); ?> >Liechtenstein</option>
                  <option <?php if($query['nationality']=='Lithuania (Lietuva)') { echo "selected";}?><?php echo  set_select('nationality', 'Lithuania (Lietuva)'); ?> >Lithuania (Lietuva)</option>
                  <option <?php if($query['nationality']=='Luxembourg') { echo "selected";}?><?php echo  set_select('nationality', 'Luxembourg'); ?> >Luxembourg</option>
                  <option <?php if($query['nationality']=='Macau (澳門)') { echo "selected";}?><?php echo  set_select('nationality', 'Macau (澳門)'); ?> >Macau (澳門)</option>
                  <option <?php if($query['nationality']=='Macedonia (Македонија)') { echo "selected";}?><?php echo  set_select('nationality', 'Macedonia (Македонија)'); ?> >Macedonia (Македонија)</option>
                  <option <?php if($query['nationality']=='Madagascar (Madagasikara)') { echo "selected";}?><?php echo  set_select('nationality', 'Madagascar (Madagasikara)'); ?> >Madagascar (Madagasikara)</option>
                  <option <?php if($query['nationality']=='Malawi') { echo "selected";}?><?php echo  set_select('nationality', 'Malawi'); ?> >Malawi</option>
                  <option <?php if($query['nationality']=='Malaysia') { echo "selected";}?><?php echo  set_select('nationality', 'Malaysia'); ?> >Malaysia</option>
                  <option <?php if($query['nationality']=='Maldives') { echo "selected";}?><?php echo  set_select('nationality', 'Maldives'); ?> >Maldives</option>
                  <option <?php if($query['nationality']=='Mali') { echo "selected";}?><?php echo  set_select('nationality', 'Mali'); ?> >Mali</option>
                  <option <?php if($query['nationality']=='Malta') { echo "selected";}?><?php echo  set_select('nationality', 'Malta'); ?> >Malta</option>
                  <option <?php if($query['nationality']=='Marshall Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Marshall Islands'); ?> >Marshall Islands</option>
                  <option <?php if($query['nationality']=='Martinique') { echo "selected";}?><?php echo  set_select('nationality', 'Martinique'); ?> >Martinique</option>
                  <option <?php if($query['nationality']=='Mauritania (‫موريتانيا‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Mauritania (‫موريتانيا‬&lrm;)'); ?> >Mauritania (‫موريتانيا‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Mauritius (Moris)') { echo "selected";}?><?php echo  set_select('nationality', 'Mauritius (Moris)'); ?> >Mauritius (Moris)</option>
                  <option <?php if($query['nationality']=='Mayotte') { echo "selected";}?><?php echo  set_select('nationality', 'Mayotte'); ?> >Mayotte</option>
                  <option <?php if($query['nationality']=='Mexico (México)') { echo "selected";}?><?php echo  set_select('nationality', 'Mexico (México)'); ?> >Mexico (México)</option>
                  <option <?php if($query['nationality']=='Micronesia') { echo "selected";}?><?php echo  set_select('nationality', 'Micronesia'); ?> >Micronesia</option>
                  <option <?php if($query['nationality']=='Moldova (Republica Moldova)') { echo "selected";}?><?php echo  set_select('nationality', 'Moldova (Republica Moldova)'); ?> >Moldova (Republica Moldova)</option>
                  <option <?php if($query['nationality']=='Monaco') { echo "selected";}?><?php echo  set_select('nationality', 'Monaco'); ?> >Monaco</option>
                  <option <?php if($query['nationality']=='Mongolia (Монгол)') { echo "selected";}?><?php echo  set_select('nationality', 'Mongolia (Монгол)'); ?> >Mongolia (Монгол)</option>
                  <option <?php if($query['nationality']=='Montenegro (Crna Gora)') { echo "selected";}?><?php echo  set_select('nationality', 'Montenegro (Crna Gora)'); ?> >Montenegro (Crna Gora)</option>
                  <option <?php if($query['nationality']=='Montserrat') { echo "selected";}?><?php echo  set_select('nationality', 'Montserrat'); ?> >Montserrat</option>
                  <option <?php if($query['nationality']=='Morocco (‫المغرب‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Morocco (‫المغرب‬&lrm;)'); ?> >Morocco (‫المغرب‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Mozambique (Moçambique)') { echo "selected";}?><?php echo  set_select('nationality', 'Mozambique (Moçambique)'); ?> >Mozambique (Moçambique)</option>
                  <option <?php if($query['nationality']=='Myanmar (Burma)') { echo "selected";}?><?php echo  set_select('nationality', 'Myanmar (Burma)'); ?> >Myanmar (Burma)</option>
                  <option <?php if($query['nationality']=='Nagorno-Karabakh') { echo "selected";}?><?php echo  set_select('nationality', 'Nagorno-Karabakh'); ?> >Nagorno-Karabakh</option>
                  <option <?php if($query['nationality']=='Namibia') { echo "selected";}?><?php echo  set_select('nationality', 'Namibia'); ?> >Namibia</option>
                  <option <?php if($query['nationality']=='Nauru') { echo "selected";}?><?php echo  set_select('nationality', 'Nauru'); ?> >Nauru</option>
                  <option <?php if($query['nationality']=='Nepal (नेपाल)') { echo "selected";}?><?php echo  set_select('nationality', 'Nepal (नेपाल)'); ?> >Nepal (नेपाल)</option>
                  <option <?php if($query['nationality']=='Netherlands (Nederland)') { echo "selected";}?><?php echo  set_select('nationality', 'Netherlands (Nederland)'); ?> >Netherlands (Nederland)</option>
                  <option <?php if($query['nationality']=='New Caledonia (Nouvelle-Calédonie)') { echo "selected";}?><?php echo  set_select('nationality', 'New Caledonia (Nouvelle-Calédonie)'); ?> >New Caledonia (Nouvelle-Calédonie)</option>
                  <option <?php if($query['nationality']=='New Zealand') { echo "selected";}?><?php echo  set_select('nationality', 'New Zealand'); ?> >New Zealand</option>
                  <option <?php if($query['nationality']=='Nicaragua') { echo "selected";}?><?php echo  set_select('nationality', 'Nicaragua'); ?> >Nicaragua</option>
                  <option <?php if($query['nationality']=='Niger (Nijar)') { echo "selected";}?><?php echo  set_select('nationality', 'Niger (Nijar)'); ?> >Niger (Nijar)</option>
                  <option <?php if($query['nationality']=='Nigeria') { echo "selected";}?><?php echo  set_select('nationality', 'Nigeria'); ?> >Nigeria</option>
                  <option <?php if($query['nationality']=='Niue') { echo "selected";}?><?php echo  set_select('nationality', 'Niue'); ?> >Niue</option>
                  <option <?php if($query['nationality']=='Norfolk Island') { echo "selected";}?><?php echo  set_select('nationality', 'Norfolk Island'); ?> >Norfolk Island</option>
                  <option <?php if($query['nationality']=='North Korea (조선 민주주의 인민 공화국)') { echo "selected";}?><?php echo  set_select('nationality', 'North Korea (조선 민주주의 인민 공화국)'); ?> >North Korea (조선 민주주의 인민 공화국)</option>
                  <option <?php if($query['nationality']=='Northern Mariana Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Northern Mariana Islands'); ?> >Northern Mariana Islands</option>
                  <option <?php if($query['nationality']=='Norway (Norge)') { echo "selected";}?><?php echo  set_select('nationality', 'Norway (Norge)'); ?> >Norway (Norge)</option>
                  <option <?php if($query['nationality']=='Oman (‫عُمان‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Oman (‫عُمان‬&lrm;)'); ?> >Oman (‫عُمان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Pakistan (‫پاکستان‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Pakistan (‫پاکستان‬&lrm;)'); ?> >Pakistan (‫پاکستان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Palau') { echo "selected";}?><?php echo  set_select('nationality', 'Palau'); ?> >Palau</option>
                  <option <?php if($query['nationality']=='Palestine (‫فلسطين‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Palestine (‫فلسطين‬&lrm;)'); ?> >Palestine (‫فلسطين‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Panama (Panamá)') { echo "selected";}?><?php echo  set_select('nationality', 'Panama (Panamá)'); ?> >Panama (Panamá)</option>
                  <option <?php if($query['nationality']=='Papua New Guinea') { echo "selected";}?><?php echo  set_select('nationality', 'Papua New Guinea'); ?> >Papua New Guinea</option>
                  <option <?php if($query['nationality']=='Paraguay') { echo "selected";}?><?php echo  set_select('nationality', 'Paraguay'); ?> >Paraguay</option>
                  <option <?php if($query['nationality']=='Peru (Perú)') { echo "selected";}?><?php echo  set_select('nationality', 'Peru (Perú)'); ?> >Peru (Perú)</option>
                  <option <?php if($query['nationality']=='Philippines') { echo "selected";}?><?php echo  set_select('nationality', 'Philippines'); ?> >Philippines</option>
                  <option <?php if($query['nationality']=='Pitcairn Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Pitcairn Islands'); ?> >Pitcairn Islands</option>
                  <option <?php if($query['nationality']=='Poland (Polska)') { echo "selected";}?><?php echo  set_select('nationality', 'Poland (Polska)'); ?> >Poland (Polska)</option>
                  <option <?php if($query['nationality']=='Portugal') { echo "selected";}?><?php echo  set_select('nationality', 'Portugal'); ?> >Portugal</option>
                  <option <?php if($query['nationality']=='Puerto Rico') { echo "selected";}?><?php echo  set_select('nationality', 'Puerto Rico'); ?> >Puerto Rico</option>
                  <option <?php if($query['nationality']=='Qatar (‫قطر‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Qatar (‫قطر‬&lrm;)'); ?> >Qatar (‫قطر‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Réunion') { echo "selected";}?><?php echo  set_select('nationality', 'Réunion'); ?> >Réunion</option>
                  <option <?php if($query['nationality']=='Romania (România)') { echo "selected";}?><?php echo  set_select('nationality', 'Romania (România)'); ?> >Romania (România)</option>
                  <option <?php if($query['nationality']=='Russia (Россия)') { echo "selected";}?><?php echo  set_select('nationality', 'Russia (Россия)'); ?> >Russia (Россия)</option>
                  <option <?php if($query['nationality']=='Rwanda') { echo "selected";}?><?php echo  set_select('nationality', 'Rwanda'); ?> >Rwanda</option>
                  <option <?php if($query['nationality']=='Saint Barthélemy (Saint-Barthélémy)') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Barthélemy (Saint-Barthélémy)'); ?> >Saint Barthélemy (Saint-Barthélémy)</option>
                  <option <?php if($query['nationality']=='Saint Helena') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Helena'); ?> >Saint Helena</option>
                  <option <?php if($query['nationality']=='Saint Kitts and Nevis') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Kitts and Nevis'); ?> >Saint Kitts and Nevis</option>
                  <option <?php if($query['nationality']=='Saint Lucia') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Lucia'); ?> >Saint Lucia</option>
                  <option <?php if($query['nationality']=='Saint Martin (Saint-Martin [partie française])') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Martin (Saint-Martin [partie française])'); ?> >Saint Martin (Saint-Martin [partie française])</option>
                  <option <?php if($query['nationality']=='Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)'); ?> >Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option>
                  <option <?php if($query['nationality']=='Saint Vincent and the Grenadines') { echo "selected";}?><?php echo  set_select('nationality', 'Saint Vincent and the Grenadines'); ?> >Saint Vincent and the Grenadines</option>
                  <option <?php if($query['nationality']=='Samoa') { echo "selected";}?><?php echo  set_select('nationality', 'Samoa'); ?> >Samoa</option>
                  <option <?php if($query['nationality']=='San Marino') { echo "selected";}?><?php echo  set_select('nationality', 'San Marino'); ?> >San Marino</option>
                  <option <?php if($query['nationality']=='São Tomé and Príncipe (São Tomé e Príncipe)') { echo "selected";}?><?php echo  set_select('nationality', 'São Tomé and Príncipe (São Tomé e Príncipe)'); ?> >São Tomé and Príncipe (São Tomé e Príncipe)</option>
                  <option <?php if($query['nationality']=='Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)'); ?> >Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Senegal (Sénégal)') { echo "selected";}?><?php echo  set_select('nationality', 'Senegal (Sénégal)'); ?> >Senegal (Sénégal)</option>
                  <option <?php if($query['nationality']=='Serbia (Србија)') { echo "selected";}?><?php echo  set_select('nationality', 'Serbia (Србија)'); ?> >Serbia (Србија)</option>
                  <option <?php if($query['nationality']=='Seychelles') { echo "selected";}?><?php echo  set_select('nationality', 'Seychelles'); ?> >Seychelles</option>
                  <option <?php if($query['nationality']=='Sierra Leone') { echo "selected";}?><?php echo  set_select('nationality', 'Sierra Leone'); ?> >Sierra Leone</option>
                  <option <?php if($query['nationality']=='Singapore') { echo "selected";}?><?php echo  set_select('nationality', 'Singapore'); ?> >Singapore</option>
                  <option <?php if($query['nationality']=='Sint Maarten') { echo "selected";}?><?php echo  set_select('nationality', 'Sint Maarten'); ?> >Sint Maarten</option>
                  <option <?php if($query['nationality']=='Slovakia (Slovensko)') { echo "selected";}?><?php echo  set_select('nationality', 'Slovakia (Slovensko)'); ?> >Slovakia (Slovensko)</option>
                  <option <?php if($query['nationality']=='Slovenia (Slovenija)') { echo "selected";}?><?php echo  set_select('nationality', 'Slovenia (Slovenija)'); ?> >Slovenia (Slovenija)</option>
                  <option <?php if($query['nationality']=='Solomon Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Solomon Islands'); ?> >Solomon Islands</option>
                  <option <?php if($query['nationality']=='Somalia (Soomaaliya)') { echo "selected";}?><?php echo  set_select('nationality', 'Somalia (Soomaaliya)'); ?> >Somalia (Soomaaliya)</option>
                  <option <?php if($query['nationality']=='South Africa') { echo "selected";}?><?php echo  set_select('nationality', 'South Africa'); ?> >South Africa</option>
                  <option <?php if($query['nationality']=='South Georgia and the South Sandwich Islands') { echo "selected";}?><?php echo  set_select('nationality', 'South Georgia and the South Sandwich Islands'); ?> >South Georgia and the South Sandwich Islands</option>
                  <option <?php if($query['nationality']=='South Korea (대한민국)') { echo "selected";}?><?php echo  set_select('nationality', 'South Korea (대한민국)'); ?> >South Korea (대한민국)</option>
                  <option <?php if($query['nationality']=='South Sudan (‫جنوب السودان‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'South Sudan (‫جنوب السودان‬&lrm;)'); ?> >South Sudan (‫جنوب السودان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Spain (España)') { echo "selected";}?><?php echo  set_select('nationality', 'Spain (España)'); ?> >Spain (España)</option>
                  <option <?php if($query['nationality']=='Sri Lanka (ශ්&zwj;රී ලංකාව)') { echo "selected";}?><?php echo  set_select('nationality', 'Sri Lanka (ශ්&zwj;රී ලංකාව)'); ?> >Sri Lanka (ශ්&zwj;රී ලංකාව)</option>
                  <option <?php if($query['nationality']=='Sudan (‫السودان‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Sudan (‫السودان‬&lrm;)'); ?> >Sudan (‫السودان‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Suriname') { echo "selected";}?><?php echo  set_select('nationality', 'Suriname'); ?> >Suriname</option>
                  <option <?php if($query['nationality']=='Svalbard and Jan Mayen (Svalbard og Jan Mayen)') { echo "selected";}?><?php echo  set_select('nationality', 'Svalbard and Jan Mayen (Svalbard og Jan Mayen)'); ?> >Svalbard and Jan Mayen (Svalbard og Jan Mayen)</option>
                  <option <?php if($query['nationality']=='Swaziland') { echo "selected";}?><?php echo  set_select('nationality', 'Swaziland'); ?> >Swaziland</option>
                  <option <?php if($query['nationality']=='Sweden (Sverige)') { echo "selected";}?><?php echo  set_select('nationality', 'Sweden (Sverige)'); ?> >Sweden (Sverige)</option>
                  <option <?php if($query['nationality']=='Switzerland (Schweiz)') { echo "selected";}?><?php echo  set_select('nationality', 'Switzerland (Schweiz)'); ?> >Switzerland (Schweiz)</option>
                  <option <?php if($query['nationality']=='Syria (‫سوريا‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Syria (‫سوريا‬&lrm;)'); ?> >Syria (‫سوريا‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Taiwan (台灣)') { echo "selected";}?><?php echo  set_select('nationality', 'Taiwan (台灣)'); ?> >Taiwan (台灣)</option>
                  <option <?php if($query['nationality']=='Tajikistan') { echo "selected";}?><?php echo  set_select('nationality', 'Tajikistan'); ?> >Tajikistan</option>
                  <option <?php if($query['nationality']=='Tanzania') { echo "selected";}?><?php echo  set_select('nationality', 'Tanzania'); ?> >Tanzania</option>
                  <option <?php if($query['nationality']=='Thailand (ไทย)') { echo "selected";}?><?php echo  set_select('nationality', 'Thailand (ไทย)'); ?> >Thailand (ไทย)</option>
                  <option <?php if($query['nationality']=='Timor-Leste') { echo "selected";}?><?php echo  set_select('nationality', 'Timor-Leste'); ?> >Timor-Leste</option>
                  <option <?php if($query['nationality']=='Togo') { echo "selected";}?><?php echo  set_select('nationality', 'Togo'); ?> >Togo</option>
                  <option <?php if($query['nationality']=='Tokelau') { echo "selected";}?><?php echo  set_select('nationality', 'Tokelau'); ?> >Tokelau</option>
                  <option <?php if($query['nationality']=='Tonga') { echo "selected";}?><?php echo  set_select('nationality', 'Tonga'); ?> >Tonga</option>
                  <option <?php if($query['nationality']=='Transnistria') { echo "selected";}?><?php echo  set_select('nationality', 'Transnistria'); ?> >Transnistria</option>
                  <option <?php if($query['nationality']=='Trinidad and Tobago') { echo "selected";}?><?php echo  set_select('nationality', 'Trinidad and Tobago'); ?> >Trinidad and Tobago</option>
                  <option <?php if($query['nationality']=='Tristan da Cunha') { echo "selected";}?><?php echo  set_select('nationality', 'Tristan da Cunha'); ?> >Tristan da Cunha</option>
                  <option <?php if($query['nationality']=='Tunisia (‫تونس‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Tunisia (‫تونس‬&lrm;)'); ?> >Tunisia (‫تونس‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Turkey (Türkiye)') { echo "selected";}?><?php echo  set_select('nationality', 'Turkey (Türkiye)'); ?> >Turkey (Türkiye)</option>
                  <option <?php if($query['nationality']=='Turkmenistan') { echo "selected";}?><?php echo  set_select('nationality', 'Turkmenistan'); ?> >Turkmenistan</option>
                  <option <?php if($query['nationality']=='Turks and Caicos Islands') { echo "selected";}?><?php echo  set_select('nationality', 'Turks and Caicos Islands'); ?> >Turks and Caicos Islands</option>
                  <option <?php if($query['nationality']=='Tuvalu') { echo "selected";}?><?php echo  set_select('nationality', 'Tuvalu'); ?> >Tuvalu</option>
                  <option <?php if($query['nationality']=='U.S. Outlying Islands') { echo "selected";}?><?php echo  set_select('nationality', 'U.S. Outlying Islands'); ?> >U.S. Outlying Islands</option>
                  <option <?php if($query['nationality']=='U.S. Virgin Islands') { echo "selected";}?><?php echo  set_select('nationality', 'U.S. Virgin Islands'); ?> >U.S. Virgin Islands</option>
                  <option <?php if($query['nationality']=='Uganda') { echo "selected";}?><?php echo  set_select('nationality', 'Uganda'); ?> >Uganda</option>
                  <option <?php if($query['nationality']=='Ukraine (Україна)') { echo "selected";}?><?php echo  set_select('nationality', 'Ukraine (Україна)'); ?> >Ukraine (Україна)</option>
                  <option <?php if($query['nationality']=='United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)'); ?> >United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)</option>
                  <option <?php if($query['nationality']=='United Kingdom') { echo "selected";}?><?php echo  set_select('nationality', 'United Kingdom'); ?> >United Kingdom</option>
                  <option <?php if($query['nationality']=='United States') { echo "selected";}?><?php echo  set_select('nationality', 'United States'); ?> >United States</option>
                  <option <?php if($query['nationality']=='Uruguay') { echo "selected";}?><?php echo  set_select('nationality', 'Uruguay'); ?> >Uruguay</option>
                  <option <?php if($query['nationality']=='Uzbekistan (Ўзбекистон)') { echo "selected";}?><?php echo  set_select('nationality', 'Uzbekistan (Ўзбекистон)'); ?> >Uzbekistan (Ўзбекистон)</option>
                  <option <?php if($query['nationality']=='Vanuatu') { echo "selected";}?><?php echo  set_select('nationality', 'Vanuatu'); ?> >Vanuatu</option>
                  <option <?php if($query['nationality']=='Vatican City (Città del Vaticano)') { echo "selected";}?><?php echo  set_select('nationality', 'Vatican City (Città del Vaticano)'); ?> >Vatican City (Città del Vaticano)</option>
                  <option <?php if($query['nationality']=='Venezuela') { echo "selected";}?><?php echo  set_select('nationality', 'Venezuela'); ?> >Venezuela</option>
                  <option <?php if($query['nationality']=='Vietnam (Việt Nam)') { echo "selected";}?><?php echo  set_select('nationality', 'Vietnam (Việt Nam)'); ?> >Vietnam (Việt Nam)</option>
                  <option <?php if($query['nationality']=='Wallis and Futuna') { echo "selected";}?><?php echo  set_select('nationality', 'Wallis and Futuna'); ?> >Wallis and Futuna</option>
                  <option <?php if($query['nationality']=='Western Sahara (‫الصحراء الغربية‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Western Sahara (‫الصحراء الغربية‬&lrm;)'); ?> >Western Sahara (‫الصحراء الغربية‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Yemen (‫اليمن‬&lrm;)') { echo "selected";}?><?php echo  set_select('nationality', 'Yemen (‫اليمن‬&lrm;)'); ?> >Yemen (‫اليمن‬&lrm;)</option>
                  <option <?php if($query['nationality']=='Zambia') { echo "selected";}?><?php echo  set_select('nationality', 'Zambia'); ?> >Zambia</option>
                  <option <?php if($query['nationality']=='Zimbabwe') { echo "selected";}?><?php echo  set_select('nationality', 'Zimbabwe'); ?> >Zimbabwe</option>
                </select>
              </div>
            </div>

          <div class="form-group text-left">
              <label class="col-md-3 control-label">Category</label>
              <div class="col-md-9">

                <?php
                $options= array(''=>"Select Staff Category");
                foreach ($query2 as $row)
                {
                  $options[$row->staff_category_id]=$row->name;
                }
                echo form_dropdown('staff_category_id', $options,$query['staff_category_id'],'class="form-control"');
                ?>
                <?php echo form_error('staff_category_id'); ?>
                
              </div>
            </div>
            <h5>Settings</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Biometric ID</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'biometric_id',
                        'id'    => 'biometric_id',
                        'value' => $query['biometric_id'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Basic Pay</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'basic_pay',
                        'id'    => 'basic_pay',
                        'value' => $query['basic_pay'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <h5>Upload Staff Member's photo</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Upload Image</label>
              <div class="col-md-9">
                <?php /*
                $data = array(
                        'type'  => 'file',
                        'name'  => 'image_c',
                        'class' => 'form-control',
                        'autocomplete'=>'off'
                );

                echo form_input($data);*/
                ?>
                <input type="file" name="image_c" value="<?php echo set_value('image_c'); ?>">
              </div>
            </div>

          </div><!-- col-md-6 -->

          <div class="col-md-6">
            <h5>Contact Details</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Address Line1</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'address_1',
                        'id'    => 'address_1',
                        'value' => $query['address_1'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Address Line2</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'address_2',
                        'id'    => 'address_2',
                        'value' => $query['address_2'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">City</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'city',
                        'id'    => 'city',
                        'value' => $query['city'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">State</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'state',
                        'id'    => 'state',
                        'value' => $query['state'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Pin Code</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'pincode',
                        'id'    => 'pincode',
                        'value' => $query['pincode'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Country</label>
              <div class="col-md-9">
                <select name="country" class="form-control">
                  <option value="" selected>Select Country</option>
                  <option <?php if($query['country']=='Afghanistan (‫افغانستان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Afghanistan (‫افغانستان‬&lrm;)'); ?> >Afghanistan (‫افغانستان‬&lrm;)</option>
                  <option <?php if($query['country']=='Åland Islands (Åland)') { echo "selected";}?><?php echo  set_select('country', 'Åland Islands (Åland)'); ?> >Åland Islands (Åland)</option>
                  <option <?php if($query['country']=='Albania (Shqipëria)') { echo "selected";}?><?php echo  set_select('country', 'Albania (Shqipëria)'); ?> >Albania (Shqipëria)</option>
                  <option <?php if($query['country']=='Algeria (‫الجزائر‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Algeria (‫الجزائر‬&lrm;)'); ?> >Algeria (‫الجزائر‬&lrm;)</option>
                  <option <?php if($query['country']=='American Samoa') { echo "selected";}?><?php echo  set_select('country', 'American Samoa'); ?> >American Samoa</option>
                  <option <?php if($query['country']=='Andorra') { echo "selected";}?><?php echo  set_select('country', 'Andorra'); ?> >Andorra</option>
                  <option <?php if($query['country']=='Angola') { echo "selected";}?><?php echo  set_select('country', 'Angola'); ?> >Angola</option>
                  <option <?php if($query['country']=='Anguilla') { echo "selected";}?><?php echo  set_select('country', 'Anguilla'); ?> >Anguilla</option>
                  <option <?php if($query['country']=='Antarctica') { echo "selected";}?><?php echo  set_select('country', 'Antarctica'); ?> >Antarctica</option>
                  <option <?php if($query['country']=='Antigua and Barbuda') { echo "selected";}?><?php echo  set_select('country', 'Antigua and Barbuda'); ?> >Antigua and Barbuda</option>
                  <option <?php if($query['country']=='Argentina') { echo "selected";}?><?php echo  set_select('country', 'Argentina'); ?> >Argentina</option>
                  <option <?php if($query['country']=='Armenia (Հայաստան)') { echo "selected";}?><?php echo  set_select('country', 'Armenia (Հայաստան)'); ?> >Armenia (Հայաստան)</option>
                  <option <?php if($query['country']=='Aruba') { echo "selected";}?><?php echo  set_select('country', 'Aruba'); ?> >Aruba</option>
                  <option <?php if($query['country']=='Ascension Island') { echo "selected";}?><?php echo  set_select('country', 'Ascension Island'); ?> >Ascension Island</option>
                  <option <?php if($query['country']=='Australia') { echo "selected";}?><?php echo  set_select('country', 'Australia'); ?> >Australia</option>
                  <option <?php if($query['country']=='Austria (Österreich)') { echo "selected";}?><?php echo  set_select('country', 'Austria (Österreich)'); ?> >Austria (Österreich)</option>
                  <option <?php if($query['country']=='Azerbaijan (Azərbaycan)') { echo "selected";}?><?php echo  set_select('country', 'Azerbaijan (Azərbaycan)'); ?> >Azerbaijan (Azərbaycan)</option>
                  <option <?php if($query['country']=='Bahamas') { echo "selected";}?><?php echo  set_select('country', 'Bahamas'); ?> >Bahamas</option>
                  <option <?php if($query['country']=='Bahrain (‫البحرين‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Bahrain (‫البحرين‬&lrm;)'); ?> >Bahrain (‫البحرين‬&lrm;)</option>
                  <option <?php if($query['country']=='Bangladesh (বাংলাদেশ)') { echo "selected";}?><?php echo  set_select('country', 'Bangladesh (বাংলাদেশ)'); ?> >Bangladesh (বাংলাদেশ)</option>
                  <option <?php if($query['country']=='Barbados') { echo "selected";}?><?php echo  set_select('country', 'Barbados'); ?> >Barbados</option>
                  <option <?php if($query['country']=='Belarus (Беларусь)') { echo "selected";}?><?php echo  set_select('country', 'Belarus (Беларусь)'); ?> >Belarus (Беларусь)</option>
                  <option <?php if($query['country']=='Belgium (België)') { echo "selected";}?><?php echo  set_select('country', 'Belgium (België)'); ?> >Belgium (België)</option>
                  <option <?php if($query['country']=='Belize') { echo "selected";}?><?php echo  set_select('country', 'Belize'); ?> >Belize</option>
                  <option <?php if($query['country']=='Benin (Bénin)') { echo "selected";}?><?php echo  set_select('country', 'Benin (Bénin)'); ?> >Benin (Bénin)</option>
                  <option <?php if($query['country']=='Bermuda') { echo "selected";}?><?php echo  set_select('country', 'Bermuda'); ?> >Bermuda</option>
                  <option <?php if($query['country']=='Bhutan (འབྲུག)') { echo "selected";}?><?php echo  set_select('country', 'Bhutan (འབྲུག)'); ?> >Bhutan (འབྲུག)</option>
                  <option <?php if($query['country']=='Bolivia') { echo "selected";}?><?php echo  set_select('country', 'Bolivia'); ?> >Bolivia</option>
                  <option <?php if($query['country']=='Bosnia and Herzegovina (Босна и Херцеговина)') { echo "selected";}?><?php echo  set_select('country', 'Bosnia and Herzegovina (Босна и Херцеговина)'); ?> >Bosnia and Herzegovina (Босна и Херцеговина)</option>
                  <option <?php if($query['country']=='Botswana') { echo "selected";}?><?php echo  set_select('country', 'Botswana'); ?> >Botswana</option>
                  <option <?php if($query['country']=='Bouvet Island') { echo "selected";}?><?php echo  set_select('country', 'Bouvet Island'); ?> >Bouvet Island</option>
                  <option <?php if($query['country']=='Brazil (Brasil)') { echo "selected";}?><?php echo  set_select('country', 'Brazil (Brasil)'); ?> >Brazil (Brasil)</option>
                  <option <?php if($query['country']=='British Indian Ocean Territory') { echo "selected";}?><?php echo  set_select('country', 'British Indian Ocean Territory'); ?> >British Indian Ocean Territory</option>
                  <option <?php if($query['country']=='British Virgin Islands') { echo "selected";}?><?php echo  set_select('country', 'British Virgin Islands'); ?> >British Virgin Islands</option>
                  <option <?php if($query['country']=='Brunei') { echo "selected";}?><?php echo  set_select('country', 'Brunei'); ?> >Brunei</option>
                  <option <?php if($query['country']=='Bulgaria (България)') { echo "selected";}?><?php echo  set_select('country', 'Bulgaria (България)'); ?> >Bulgaria (България)</option>
                  <option <?php if($query['country']=='Burkina Faso') { echo "selected";}?><?php echo  set_select('country', 'Burkina Faso'); ?> >Burkina Faso</option>
                  <option <?php if($query['country']=='Burundi (Uburundi)') { echo "selected";}?><?php echo  set_select('country', 'Burundi (Uburundi)'); ?> >Burundi (Uburundi)</option>
                  <option <?php if($query['country']=='Cambodia (កម្ពុជា)') { echo "selected";}?><?php echo  set_select('country', 'Cambodia (កម្ពុជា)'); ?> >Cambodia (កម្ពុជា)</option>
                  <option <?php if($query['country']=='Cameroon (Cameroun)') { echo "selected";}?><?php echo  set_select('country', 'Cameroon (Cameroun)'); ?> >Cameroon (Cameroun)</option>
                  <option <?php if($query['country']=='Canada') { echo "selected";}?><?php echo  set_select('country', 'Canada'); ?> >Canada</option>
                  <option <?php if($query['country']=='Canary Islands (Islas Canarias)') { echo "selected";}?><?php echo  set_select('country', 'Canary Islands (Islas Canarias)'); ?> >Canary Islands (Islas Canarias)</option>
                  <option <?php if($query['country']=='Cape Verde (Kabu Verdi)') { echo "selected";}?><?php echo  set_select('country', 'Cape Verde (Kabu Verdi)'); ?> >Cape Verde (Kabu Verdi)</option>
                  <option <?php if($query['country']=='Caribbean Netherlands') { echo "selected";}?><?php echo  set_select('country', 'Caribbean Netherlands'); ?> >Caribbean Netherlands</option>
                  <option <?php if($query['country']=='Cayman Islands') { echo "selected";}?><?php echo  set_select('country', 'Cayman Islands'); ?> >Cayman Islands</option>
                  <option <?php if($query['country']=='Central African Republic (République centrafricaine)') { echo "selected";}?><?php echo  set_select('country', 'Central African Republic (République centrafricaine)'); ?> >Central African Republic (République centrafricaine)</option>
                  <option <?php if($query['country']=='Ceuta and Melilla (Ceuta y Melilla)') { echo "selected";}?><?php echo  set_select('country', 'Ceuta and Melilla (Ceuta y Melilla)'); ?> >Ceuta and Melilla (Ceuta y Melilla)</option>
                  <option <?php if($query['country']=='Chad (Tchad)') { echo "selected";}?><?php echo  set_select('country', 'Chad (Tchad)'); ?> >Chad (Tchad)</option>
                  <option <?php if($query['country']=='Chile') { echo "selected";}?><?php echo  set_select('country', 'Chile'); ?> >Chile</option>
                  <option <?php if($query['country']=='China (中国)') { echo "selected";}?><?php echo  set_select('country', 'China (中国)'); ?> >China (中国)</option>
                  <option <?php if($query['country']=='Christmas Island') { echo "selected";}?><?php echo  set_select('country', 'Christmas Island'); ?> >Christmas Island</option>
                  <option <?php if($query['country']=='Clipperton Island (Île Clipperton)') { echo "selected";}?><?php echo  set_select('country', 'Clipperton Island (Île Clipperton)'); ?> >Clipperton Island (Île Clipperton)</option>
                  <option <?php if($query['country']=='Cocos Islands (Keeling Islands)') { echo "selected";}?><?php echo  set_select('country', 'Cocos Islands (Keeling Islands)'); ?> >Cocos Islands (Keeling Islands)</option>
                  <option <?php if($query['country']=='Colombia') { echo "selected";}?><?php echo  set_select('country', 'Colombia'); ?> >Colombia</option>
                  <option <?php if($query['country']=='Comoros (‫جزر القمر‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Comoros (‫جزر القمر‬&lrm;)'); ?> >Comoros (‫جزر القمر‬&lrm;)</option>
                  <option <?php if($query['country']=='Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)') { echo "selected";}?><?php echo  set_select('country', 'Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)'); ?> >Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)</option>
                  <option <?php if($query['country']=='Congo-Republic (Congo-Brazzaville)') { echo "selected";}?><?php echo  set_select('country', 'Congo-Republic (Congo-Brazzaville)'); ?> >Congo-Republic (Congo-Brazzaville)</option>
                  <option <?php if($query['country']=='Cook Islands') { echo "selected";}?><?php echo  set_select('country', 'Cook Islands'); ?> >Cook Islands</option>
                  <option <?php if($query['country']=='Costa Rica') { echo "selected";}?><?php echo  set_select('country', 'Costa Rica'); ?> >Costa Rica</option>
                  <option <?php if($query['country']=='Côte d’Ivoire') { echo "selected";}?><?php echo  set_select('country', 'Côte d’Ivoire'); ?> >Côte d’Ivoire</option>
                  <option <?php if($query['country']=='Croatia (Hrvatska)') { echo "selected";}?><?php echo  set_select('country', 'Croatia (Hrvatska)'); ?> >Croatia (Hrvatska)</option>
                  <option <?php if($query['country']=='Cuba') { echo "selected";}?><?php echo  set_select('country', 'Cuba'); ?> >Cuba</option>
                  <option <?php if($query['country']=='Curaçao') { echo "selected";}?><?php echo  set_select('country', 'Curaçao'); ?> >Curaçao</option>
                  <option <?php if($query['country']=='Cyprus (Κύπρος)') { echo "selected";}?><?php echo  set_select('country', 'Cyprus (Κύπρος)'); ?> >Cyprus (Κύπρος)</option>
                  <option <?php if($query['country']=='Czech Republic (Česká republika)') { echo "selected";}?><?php echo  set_select('country', 'Czech Republic (Česká republika)'); ?> >Czech Republic (Česká republika)</option>
                  <option <?php if($query['country']=='Denmark (Danmark)') { echo "selected";}?><?php echo  set_select('country', 'Denmark (Danmark)'); ?> >Denmark (Danmark)</option>
                  <option <?php if($query['country']=='Diego Garcia') { echo "selected";}?><?php echo  set_select('country', 'Diego Garcia'); ?> >Diego Garcia</option>
                  <option <?php if($query['country']=='Djibouti') { echo "selected";}?><?php echo  set_select('country', 'Djibouti'); ?> >Djibouti</option>
                  <option <?php if($query['country']=='Dominica') { echo "selected";}?><?php echo  set_select('country', 'Dominica'); ?> >Dominica</option>
                  <option <?php if($query['country']=='Dominican Republic (República Dominicana)') { echo "selected";}?><?php echo  set_select('country', 'Dominican Republic (República Dominicana)'); ?> >Dominican Republic (República Dominicana)</option>
                  <option <?php if($query['country']=='Ecuador') { echo "selected";}?><?php echo  set_select('country', 'Ecuador'); ?> >Ecuador</option>
                  <option <?php if($query['country']=='Egypt (‫مصر‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Egypt (‫مصر‬&lrm;)'); ?> >Egypt (‫مصر‬&lrm;)</option>
                  <option <?php if($query['country']=='El Salvador') { echo "selected";}?><?php echo  set_select('country', 'El Salvador'); ?> >El Salvador</option>
                  <option <?php if($query['country']=='Equatorial Guinea (Guinea Ecuatorial)') { echo "selected";}?><?php echo  set_select('country', 'Equatorial Guinea (Guinea Ecuatorial)'); ?> >Equatorial Guinea (Guinea Ecuatorial)</option>
                  <option <?php if($query['country']=='Eritrea') { echo "selected";}?><?php echo  set_select('country', 'Eritrea'); ?> >Eritrea</option>
                  <option <?php if($query['country']=='Estonia (Eesti)') { echo "selected";}?><?php echo  set_select('country', 'Estonia (Eesti)'); ?> >Estonia (Eesti)</option>
                  <option <?php if($query['country']=='Ethiopia') { echo "selected";}?><?php echo  set_select('country', 'Ethiopia'); ?> >Ethiopia</option>
                  <option <?php if($query['country']=='Falkland Islands (Islas Malvinas)') { echo "selected";}?><?php echo  set_select('country', 'Falkland Islands (Islas Malvinas)'); ?> >Falkland Islands (Islas Malvinas)</option>
                  <option <?php if($query['country']=='Faroe Islands (Føroyar)') { echo "selected";}?><?php echo  set_select('country', 'Faroe Islands (Føroyar)'); ?> >Faroe Islands (Føroyar)</option>
                  <option <?php if($query['country']=='Fiji') { echo "selected";}?><?php echo  set_select('country', 'Fiji'); ?> >Fiji</option>
                  <option <?php if($query['country']=='Finland (Suomi)') { echo "selected";}?><?php echo  set_select('country', 'Finland (Suomi)'); ?> >Finland (Suomi)</option>
                  <option <?php if($query['country']=='France') { echo "selected";}?><?php echo  set_select('country', 'France'); ?> >France</option>
                  <option <?php if($query['country']=='French Guiana (Guyane française)') { echo "selected";}?><?php echo  set_select('country', 'French Guiana (Guyane française)'); ?> >French Guiana (Guyane française)</option>
                  <option <?php if($query['country']=='French Polynesia (Polynésie française)') { echo "selected";}?><?php echo  set_select('country', 'French Polynesia (Polynésie française)'); ?> >French Polynesia (Polynésie française)</option>
                  <option <?php if($query['country']=='French Southern Territories (Terres australes françaises)') { echo "selected";}?><?php echo  set_select('country', 'French Southern Territories (Terres australes françaises)'); ?> >French Southern Territories (Terres australes françaises)</option>
                  <option <?php if($query['country']=='Gabon') { echo "selected";}?><?php echo  set_select('country', 'Gabon'); ?> >Gabon</option>
                  <option <?php if($query['country']=='Gambia') { echo "selected";}?><?php echo  set_select('country', 'Gambia'); ?> >Gambia</option>
                  <option <?php if($query['country']=='Georgia (საქართველო)') { echo "selected";}?><?php echo  set_select('country', 'Georgia (საქართველო)'); ?> >Georgia (საქართველო)</option>
                  <option <?php if($query['country']=='Germany (Deutschland)') { echo "selected";}?><?php echo  set_select('country', 'Germany (Deutschland)'); ?> >Germany (Deutschland)</option>
                  <option <?php if($query['country']=='Ghana (Gaana)') { echo "selected";}?><?php echo  set_select('country', 'Ghana (Gaana)'); ?> >Ghana (Gaana)</option>
                  <option <?php if($query['country']=='Gibraltar') { echo "selected";}?><?php echo  set_select('country', 'Gibraltar'); ?> >Gibraltar</option>
                  <option <?php if($query['country']=='Greece (Ελλάδα)') { echo "selected";}?><?php echo  set_select('country', 'Greece (Ελλάδα)'); ?> >Greece (Ελλάδα)</option>
                  <option <?php if($query['country']=='Greenland (Kalaallit Nunaat)') { echo "selected";}?><?php echo  set_select('country', 'Greenland (Kalaallit Nunaat)'); ?> >Greenland (Kalaallit Nunaat)</option>
                  <option <?php if($query['country']=='Grenada') { echo "selected";}?><?php echo  set_select('country', 'Grenada'); ?> >Grenada</option>
                  <option <?php if($query['country']=='Guadeloupe') { echo "selected";}?><?php echo  set_select('country', 'Guadeloupe'); ?> >Guadeloupe</option>
                  <option <?php if($query['country']=='Guam') { echo "selected";}?><?php echo  set_select('country', 'Guam'); ?> >Guam</option>
                  <option <?php if($query['country']=='Guatemala') { echo "selected";}?><?php echo  set_select('country', 'Guatemala'); ?> >Guatemala</option>
                  <option <?php if($query['country']=='Guernsey') { echo "selected";}?><?php echo  set_select('country', 'Guernsey'); ?> >Guernsey</option>
                  <option <?php if($query['country']=='Guinea (Guinée)') { echo "selected";}?><?php echo  set_select('country', 'Guinea (Guinée)'); ?> >Guinea (Guinée)</option>
                  <option <?php if($query['country']=='Guinea-Bissau (Guiné Bissau)') { echo "selected";}?><?php echo  set_select('country', 'Guinea-Bissau (Guiné Bissau)'); ?> >Guinea-Bissau (Guiné Bissau)</option>
                  <option <?php if($query['country']=='Guyana') { echo "selected";}?><?php echo  set_select('country', 'Guyana'); ?> >Guyana</option>
                  <option <?php if($query['country']=='Haiti') { echo "selected";}?><?php echo  set_select('country', 'Haiti'); ?> >Haiti</option>
                  <option <?php if($query['country']=='Heard Island and McDonald Islands') { echo "selected";}?><?php echo  set_select('country', 'Heard Island and McDonald Islands'); ?> >Heard Island and McDonald Islands</option>
                  <option <?php if($query['country']=='Honduras') { echo "selected";}?><?php echo  set_select('country', 'Honduras'); ?> >Honduras</option>
                  <option <?php if($query['country']=='Hong Kong (香港)') { echo "selected";}?><?php echo  set_select('country', 'Hong Kong (香港)'); ?> >Hong Kong (香港)</option>
                  <option <?php if($query['country']=='Hungary (Magyarország)') { echo "selected";}?><?php echo  set_select('country', 'Hungary (Magyarország)'); ?> >Hungary (Magyarország)</option>
                  <option <?php if($query['country']=='Iceland (Ísland)') { echo "selected";}?><?php echo  set_select('country', 'Iceland (Ísland)'); ?> >Iceland (Ísland)</option>
                  <option <?php if($query['country']=='India (भारत)') { echo "selected";}?><?php echo  set_select('country', 'India (भारत)'); ?> >India (भारत)</option>
                  <option <?php if($query['country']=='Indonesia') { echo "selected";}?><?php echo  set_select('country', 'Indonesia'); ?> >Indonesia</option>
                  <option <?php if($query['country']=='Iran (‫ایران‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Iran (‫ایران‬&lrm;)'); ?> >Iran (‫ایران‬&lrm;)</option>
                  <option <?php if($query['country']=='Iraq (‫العراق‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Iraq (‫العراق‬&lrm;)'); ?> >Iraq (‫العراق‬&lrm;)</option>
                  <option <?php if($query['country']=='Ireland') { echo "selected";}?><?php echo  set_select('country', 'Ireland'); ?> >Ireland</option>
                  <option <?php if($query['country']=='Isle of Man') { echo "selected";}?><?php echo  set_select('country', 'Isle of Man'); ?> >Isle of Man</option>
                  <option <?php if($query['country']=='Israel (‫ישראל‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Israel (‫ישראל‬&lrm;)'); ?> >Israel (‫ישראל‬&lrm;)</option>
                  <option <?php if($query['country']=='Italy (Italia)') { echo "selected";}?><?php echo  set_select('country', 'Italy (Italia)'); ?> >Italy (Italia)</option>
                  <option <?php if($query['country']=='Jamaica') { echo "selected";}?><?php echo  set_select('country', 'Jamaica'); ?> >Jamaica</option>
                  <option <?php if($query['country']=='Japan (日本)') { echo "selected";}?><?php echo  set_select('country', 'Japan (日本)'); ?> >Japan (日本)</option>
                  <option <?php if($query['country']=='Jersey') { echo "selected";}?><?php echo  set_select('country', 'Jersey'); ?> >Jersey</option>
                  <option <?php if($query['country']=='Jordan (‫الأردن‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Jordan (‫الأردن‬&lrm;)'); ?> >Jordan (‫الأردن‬&lrm;)</option>
                  <option <?php if($query['country']=='Kazakhstan (Казахстан)') { echo "selected";}?><?php echo  set_select('country', 'Kazakhstan (Казахстан)'); ?> >Kazakhstan (Казахстан)</option>
                  <option <?php if($query['country']=='Kenya') { echo "selected";}?><?php echo  set_select('country', 'Kenya'); ?> >Kenya</option>
                  <option <?php if($query['country']=='Kiribati') { echo "selected";}?><?php echo  set_select('country', 'Kiribati'); ?> >Kiribati</option>
                  <option <?php if($query['country']=='Kosovo (Косово)') { echo "selected";}?><?php echo  set_select('country', 'Kosovo (Косово)'); ?> >Kosovo (Косово)</option>
                  <option <?php if($query['country']=='Kuwait (‫الكويت‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Kuwait (‫الكويت‬&lrm;)'); ?> >Kuwait (‫الكويت‬&lrm;)</option>
                  <option <?php if($query['country']=='Kyrgyzstan') { echo "selected";}?><?php echo  set_select('country', 'Kyrgyzstan'); ?> >Kyrgyzstan</option>
                  <option <?php if($query['country']=='Laos (ສ.ປ.ປ ລາວ)') { echo "selected";}?><?php echo  set_select('country', 'Laos (ສ.ປ.ປ ລາວ)'); ?> >Laos (ສ.ປ.ປ ລາວ)</option>
                  <option <?php if($query['country']=='Latvia (Latvija)') { echo "selected";}?><?php echo  set_select('country', 'Latvia (Latvija)'); ?>  >Latvia (Latvija)</option>
                  <option <?php if($query['country']=='Lebanon (‫لبنان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Lebanon (‫لبنان‬&lrm;)'); ?> >Lebanon (‫لبنان‬&lrm;)</option>
                  <option <?php if($query['country']=='Lesotho') { echo "selected";}?><?php echo  set_select('country', 'Lesotho'); ?> >Lesotho</option>
                  <option <?php if($query['country']=='Liberia') { echo "selected";}?><?php echo  set_select('country', 'Liberia'); ?> >Liberia</option>
                  <option <?php if($query['country']=='Libya (‫ليبيا‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Libya (‫ليبيا‬&lrm;)'); ?> >Libya (‫ليبيا‬&lrm;)</option>
                  <option <?php if($query['country']=='Liechtenstein') { echo "selected";}?><?php echo  set_select('country', 'Liechtenstein'); ?> >Liechtenstein</option>
                  <option <?php if($query['country']=='Lithuania (Lietuva)') { echo "selected";}?><?php echo  set_select('country', 'Lithuania (Lietuva)'); ?> >Lithuania (Lietuva)</option>
                  <option <?php if($query['country']=='Luxembourg') { echo "selected";}?><?php echo  set_select('country', 'Luxembourg'); ?> >Luxembourg</option>
                  <option <?php if($query['country']=='Macau (澳門)') { echo "selected";}?><?php echo  set_select('country', 'Macau (澳門)'); ?> >Macau (澳門)</option>
                  <option <?php if($query['country']=='Macedonia (Македонија)') { echo "selected";}?><?php echo  set_select('country', 'Macedonia (Македонија)'); ?> >Macedonia (Македонија)</option>
                  <option <?php if($query['country']=='Madagascar (Madagasikara)') { echo "selected";}?><?php echo  set_select('country', 'Madagascar (Madagasikara)'); ?> >Madagascar (Madagasikara)</option>
                  <option <?php if($query['country']=='Malawi') { echo "selected";}?><?php echo  set_select('country', 'Malawi'); ?> >Malawi</option>
                  <option <?php if($query['country']=='Malaysia') { echo "selected";}?><?php echo  set_select('country', 'Malaysia'); ?> >Malaysia</option>
                  <option <?php if($query['country']=='Maldives') { echo "selected";}?><?php echo  set_select('country', 'Maldives'); ?> >Maldives</option>
                  <option <?php if($query['country']=='Mali') { echo "selected";}?><?php echo  set_select('country', 'Mali'); ?> >Mali</option>
                  <option <?php if($query['country']=='Malta') { echo "selected";}?><?php echo  set_select('country', 'Malta'); ?> >Malta</option>
                  <option <?php if($query['country']=='Marshall Islands') { echo "selected";}?><?php echo  set_select('country', 'Marshall Islands'); ?> >Marshall Islands</option>
                  <option <?php if($query['country']=='Martinique') { echo "selected";}?><?php echo  set_select('country', 'Martinique'); ?> >Martinique</option>
                  <option <?php if($query['country']=='Mauritania (‫موريتانيا‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Mauritania (‫موريتانيا‬&lrm;)'); ?> >Mauritania (‫موريتانيا‬&lrm;)</option>
                  <option <?php if($query['country']=='Mauritius (Moris)') { echo "selected";}?><?php echo  set_select('country', 'Mauritius (Moris)'); ?> >Mauritius (Moris)</option>
                  <option <?php if($query['country']=='Mayotte') { echo "selected";}?><?php echo  set_select('country', 'Mayotte'); ?> >Mayotte</option>
                  <option <?php if($query['country']=='Mexico (México)') { echo "selected";}?><?php echo  set_select('country', 'Mexico (México)'); ?> >Mexico (México)</option>
                  <option <?php if($query['country']=='Micronesia') { echo "selected";}?><?php echo  set_select('country', 'Micronesia'); ?> >Micronesia</option>
                  <option <?php if($query['country']=='Moldova (Republica Moldova)') { echo "selected";}?><?php echo  set_select('country', 'Moldova (Republica Moldova)'); ?> >Moldova (Republica Moldova)</option>
                  <option <?php if($query['country']=='Monaco') { echo "selected";}?><?php echo  set_select('country', 'Monaco'); ?> >Monaco</option>
                  <option <?php if($query['country']=='Mongolia (Монгол)') { echo "selected";}?><?php echo  set_select('country', 'Mongolia (Монгол)'); ?> >Mongolia (Монгол)</option>
                  <option <?php if($query['country']=='Montenegro (Crna Gora)') { echo "selected";}?><?php echo  set_select('country', 'Montenegro (Crna Gora)'); ?> >Montenegro (Crna Gora)</option>
                  <option <?php if($query['country']=='Montserrat') { echo "selected";}?><?php echo  set_select('country', 'Montserrat'); ?> >Montserrat</option>
                  <option <?php if($query['country']=='Morocco (‫المغرب‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Morocco (‫المغرب‬&lrm;)'); ?> >Morocco (‫المغرب‬&lrm;)</option>
                  <option <?php if($query['country']=='Mozambique (Moçambique)') { echo "selected";}?><?php echo  set_select('country', 'Mozambique (Moçambique)'); ?> >Mozambique (Moçambique)</option>
                  <option <?php if($query['country']=='Myanmar (Burma)') { echo "selected";}?><?php echo  set_select('country', 'Myanmar (Burma)'); ?> >Myanmar (Burma)</option>
                  <option <?php if($query['country']=='Nagorno-Karabakh') { echo "selected";}?><?php echo  set_select('country', 'Nagorno-Karabakh'); ?> >Nagorno-Karabakh</option>
                  <option <?php if($query['country']=='Namibia') { echo "selected";}?><?php echo  set_select('country', 'Namibia'); ?> >Namibia</option>
                  <option <?php if($query['country']=='Nauru') { echo "selected";}?><?php echo  set_select('country', 'Nauru'); ?> >Nauru</option>
                  <option <?php if($query['country']=='Nepal (नेपाल)') { echo "selected";}?><?php echo  set_select('country', 'Nepal (नेपाल)'); ?> >Nepal (नेपाल)</option>
                  <option <?php if($query['country']=='Netherlands (Nederland)') { echo "selected";}?><?php echo  set_select('country', 'Netherlands (Nederland)'); ?> >Netherlands (Nederland)</option>
                  <option <?php if($query['country']=='New Caledonia (Nouvelle-Calédonie)') { echo "selected";}?><?php echo  set_select('country', 'New Caledonia (Nouvelle-Calédonie)'); ?> >New Caledonia (Nouvelle-Calédonie)</option>
                  <option <?php if($query['country']=='New Zealand') { echo "selected";}?><?php echo  set_select('country', 'New Zealand'); ?> >New Zealand</option>
                  <option <?php if($query['country']=='Nicaragua') { echo "selected";}?><?php echo  set_select('country', 'Nicaragua'); ?> >Nicaragua</option>
                  <option <?php if($query['country']=='Niger (Nijar)') { echo "selected";}?><?php echo  set_select('country', 'Niger (Nijar)'); ?> >Niger (Nijar)</option>
                  <option <?php if($query['country']=='Nigeria') { echo "selected";}?><?php echo  set_select('country', 'Nigeria'); ?> >Nigeria</option>
                  <option <?php if($query['country']=='Niue') { echo "selected";}?><?php echo  set_select('country', 'Niue'); ?> >Niue</option>
                  <option <?php if($query['country']=='Norfolk Island') { echo "selected";}?><?php echo  set_select('country', 'Norfolk Island'); ?> >Norfolk Island</option>
                  <option <?php if($query['country']=='North Korea (조선 민주주의 인민 공화국)') { echo "selected";}?><?php echo  set_select('country', 'North Korea (조선 민주주의 인민 공화국)'); ?> >North Korea (조선 민주주의 인민 공화국)</option>
                  <option <?php if($query['country']=='Northern Mariana Islands') { echo "selected";}?><?php echo  set_select('country', 'Northern Mariana Islands'); ?> >Northern Mariana Islands</option>
                  <option <?php if($query['country']=='Norway (Norge)') { echo "selected";}?><?php echo  set_select('country', 'Norway (Norge)'); ?> >Norway (Norge)</option>
                  <option <?php if($query['country']=='Oman (‫عُمان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Oman (‫عُمان‬&lrm;)'); ?> >Oman (‫عُمان‬&lrm;)</option>
                  <option <?php if($query['country']=='Pakistan (‫پاکستان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Pakistan (‫پاکستان‬&lrm;)'); ?> >Pakistan (‫پاکستان‬&lrm;)</option>
                  <option <?php if($query['country']=='Palau') { echo "selected";}?><?php echo  set_select('country', 'Palau'); ?> >Palau</option>
                  <option <?php if($query['country']=='Palestine (‫فلسطين‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Palestine (‫فلسطين‬&lrm;)'); ?> >Palestine (‫فلسطين‬&lrm;)</option>
                  <option <?php if($query['country']=='Panama (Panamá)') { echo "selected";}?><?php echo  set_select('country', 'Panama (Panamá)'); ?> >Panama (Panamá)</option>
                  <option <?php if($query['country']=='Papua New Guinea') { echo "selected";}?><?php echo  set_select('country', 'Papua New Guinea'); ?> >Papua New Guinea</option>
                  <option <?php if($query['country']=='Paraguay') { echo "selected";}?><?php echo  set_select('country', 'Paraguay'); ?> >Paraguay</option>
                  <option <?php if($query['country']=='Peru (Perú)') { echo "selected";}?><?php echo  set_select('country', 'Peru (Perú)'); ?> >Peru (Perú)</option>
                  <option <?php if($query['country']=='Philippines') { echo "selected";}?><?php echo  set_select('country', 'Philippines'); ?> >Philippines</option>
                  <option <?php if($query['country']=='Pitcairn Islands') { echo "selected";}?><?php echo  set_select('country', 'Pitcairn Islands'); ?> >Pitcairn Islands</option>
                  <option <?php if($query['country']=='Poland (Polska)') { echo "selected";}?><?php echo  set_select('country', 'Poland (Polska)'); ?> >Poland (Polska)</option>
                  <option <?php if($query['country']=='Portugal') { echo "selected";}?><?php echo  set_select('country', 'Portugal'); ?> >Portugal</option>
                  <option <?php if($query['country']=='Puerto Rico') { echo "selected";}?><?php echo  set_select('country', 'Puerto Rico'); ?> >Puerto Rico</option>
                  <option <?php if($query['country']=='Qatar (‫قطر‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Qatar (‫قطر‬&lrm;)'); ?> >Qatar (‫قطر‬&lrm;)</option>
                  <option <?php if($query['country']=='Réunion') { echo "selected";}?><?php echo  set_select('country', 'Réunion'); ?> >Réunion</option>
                  <option <?php if($query['country']=='Romania (România)') { echo "selected";}?><?php echo  set_select('country', 'Romania (România)'); ?> >Romania (România)</option>
                  <option <?php if($query['country']=='Russia (Россия)') { echo "selected";}?><?php echo  set_select('country', 'Russia (Россия)'); ?> >Russia (Россия)</option>
                  <option <?php if($query['country']=='Rwanda') { echo "selected";}?><?php echo  set_select('country', 'Rwanda'); ?> >Rwanda</option>
                  <option <?php if($query['country']=='Saint Barthélemy (Saint-Barthélémy)') { echo "selected";}?><?php echo  set_select('country', 'Saint Barthélemy (Saint-Barthélémy)'); ?> >Saint Barthélemy (Saint-Barthélémy)</option>
                  <option <?php if($query['country']=='Saint Helena') { echo "selected";}?><?php echo  set_select('country', 'Saint Helena'); ?> >Saint Helena</option>
                  <option <?php if($query['country']=='Saint Kitts and Nevis') { echo "selected";}?><?php echo  set_select('country', 'Saint Kitts and Nevis'); ?> >Saint Kitts and Nevis</option>
                  <option <?php if($query['country']=='Saint Lucia') { echo "selected";}?><?php echo  set_select('country', 'Saint Lucia'); ?> >Saint Lucia</option>
                  <option <?php if($query['country']=='Saint Martin (Saint-Martin [partie française])') { echo "selected";}?><?php echo  set_select('country', 'Saint Martin (Saint-Martin [partie française])'); ?> >Saint Martin (Saint-Martin [partie française])</option>
                  <option <?php if($query['country']=='Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)') { echo "selected";}?><?php echo  set_select('country', 'Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)'); ?> >Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option>
                  <option <?php if($query['country']=='Saint Vincent and the Grenadines') { echo "selected";}?><?php echo  set_select('country', 'Saint Vincent and the Grenadines'); ?> >Saint Vincent and the Grenadines</option>
                  <option <?php if($query['country']=='Samoa') { echo "selected";}?><?php echo  set_select('country', 'Samoa'); ?> >Samoa</option>
                  <option <?php if($query['country']=='San Marino') { echo "selected";}?><?php echo  set_select('country', 'San Marino'); ?> >San Marino</option>
                  <option <?php if($query['country']=='São Tomé and Príncipe (São Tomé e Príncipe)') { echo "selected";}?><?php echo  set_select('country', 'São Tomé and Príncipe (São Tomé e Príncipe)'); ?> >São Tomé and Príncipe (São Tomé e Príncipe)</option>
                  <option <?php if($query['country']=='Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)'); ?> >Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)</option>
                  <option <?php if($query['country']=='Senegal (Sénégal)') { echo "selected";}?><?php echo  set_select('country', 'Senegal (Sénégal)'); ?> >Senegal (Sénégal)</option>
                  <option <?php if($query['country']=='Serbia (Србија)') { echo "selected";}?><?php echo  set_select('country', 'Serbia (Србија)'); ?> >Serbia (Србија)</option>
                  <option <?php if($query['country']=='Seychelles') { echo "selected";}?><?php echo  set_select('country', 'Seychelles'); ?> >Seychelles</option>
                  <option <?php if($query['country']=='Sierra Leone') { echo "selected";}?><?php echo  set_select('country', 'Sierra Leone'); ?> >Sierra Leone</option>
                  <option <?php if($query['country']=='Singapore') { echo "selected";}?><?php echo  set_select('country', 'Singapore'); ?> >Singapore</option>
                  <option <?php if($query['country']=='Sint Maarten') { echo "selected";}?><?php echo  set_select('country', 'Sint Maarten'); ?> >Sint Maarten</option>
                  <option <?php if($query['country']=='Slovakia (Slovensko)') { echo "selected";}?><?php echo  set_select('country', 'Slovakia (Slovensko)'); ?> >Slovakia (Slovensko)</option>
                  <option <?php if($query['country']=='Slovenia (Slovenija)') { echo "selected";}?><?php echo  set_select('country', 'Slovenia (Slovenija)'); ?> >Slovenia (Slovenija)</option>
                  <option <?php if($query['country']=='Solomon Islands') { echo "selected";}?><?php echo  set_select('country', 'Solomon Islands'); ?> >Solomon Islands</option>
                  <option <?php if($query['country']=='Somalia (Soomaaliya)') { echo "selected";}?><?php echo  set_select('country', 'Somalia (Soomaaliya)'); ?> >Somalia (Soomaaliya)</option>
                  <option <?php if($query['country']=='South Africa') { echo "selected";}?><?php echo  set_select('country', 'South Africa'); ?> >South Africa</option>
                  <option <?php if($query['country']=='South Georgia and the South Sandwich Islands') { echo "selected";}?><?php echo  set_select('country', 'South Georgia and the South Sandwich Islands'); ?> >South Georgia and the South Sandwich Islands</option>
                  <option <?php if($query['country']=='South Korea (대한민국)') { echo "selected";}?><?php echo  set_select('country', 'South Korea (대한민국)'); ?> >South Korea (대한민국)</option>
                  <option <?php if($query['country']=='South Sudan (‫جنوب السودان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'South Sudan (‫جنوب السودان‬&lrm;)'); ?> >South Sudan (‫جنوب السودان‬&lrm;)</option>
                  <option <?php if($query['country']=='Spain (España)') { echo "selected";}?><?php echo  set_select('country', 'Spain (España)'); ?> >Spain (España)</option>
                  <option <?php if($query['country']=='Sri Lanka (ශ්&zwj;රී ලංකාව)') { echo "selected";}?><?php echo  set_select('country', 'Sri Lanka (ශ්&zwj;රී ලංකාව)'); ?> >Sri Lanka (ශ්&zwj;රී ලංකාව)</option>
                  <option <?php if($query['country']=='Sudan (‫السودان‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Sudan (‫السودان‬&lrm;)'); ?> >Sudan (‫السودان‬&lrm;)</option>
                  <option <?php if($query['country']=='Suriname') { echo "selected";}?><?php echo  set_select('country', 'Suriname'); ?> >Suriname</option>
                  <option <?php if($query['country']=='Svalbard and Jan Mayen (Svalbard og Jan Mayen)') { echo "selected";}?><?php echo  set_select('country', 'Svalbard and Jan Mayen (Svalbard og Jan Mayen)'); ?> >Svalbard and Jan Mayen (Svalbard og Jan Mayen)</option>
                  <option <?php if($query['country']=='Swaziland') { echo "selected";}?><?php echo  set_select('country', 'Swaziland'); ?> >Swaziland</option>
                  <option <?php if($query['country']=='Sweden (Sverige)') { echo "selected";}?><?php echo  set_select('country', 'Sweden (Sverige)'); ?> >Sweden (Sverige)</option>
                  <option <?php if($query['country']=='Switzerland (Schweiz)') { echo "selected";}?><?php echo  set_select('country', 'Switzerland (Schweiz)'); ?> >Switzerland (Schweiz)</option>
                  <option <?php if($query['country']=='Syria (‫سوريا‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Syria (‫سوريا‬&lrm;)'); ?> >Syria (‫سوريا‬&lrm;)</option>
                  <option <?php if($query['country']=='Taiwan (台灣)') { echo "selected";}?><?php echo  set_select('country', 'Taiwan (台灣)'); ?> >Taiwan (台灣)</option>
                  <option <?php if($query['country']=='Tajikistan') { echo "selected";}?><?php echo  set_select('country', 'Tajikistan'); ?> >Tajikistan</option>
                  <option <?php if($query['country']=='Tanzania') { echo "selected";}?><?php echo  set_select('country', 'Tanzania'); ?> >Tanzania</option>
                  <option <?php if($query['country']=='Thailand (ไทย)') { echo "selected";}?><?php echo  set_select('country', 'Thailand (ไทย)'); ?> >Thailand (ไทย)</option>
                  <option <?php if($query['country']=='Timor-Leste') { echo "selected";}?><?php echo  set_select('country', 'Timor-Leste'); ?> >Timor-Leste</option>
                  <option <?php if($query['country']=='Togo') { echo "selected";}?><?php echo  set_select('country', 'Togo'); ?> >Togo</option>
                  <option <?php if($query['country']=='Tokelau') { echo "selected";}?><?php echo  set_select('country', 'Tokelau'); ?> >Tokelau</option>
                  <option <?php if($query['country']=='Tonga') { echo "selected";}?><?php echo  set_select('country', 'Tonga'); ?> >Tonga</option>
                  <option <?php if($query['country']=='Transnistria') { echo "selected";}?><?php echo  set_select('country', 'Transnistria'); ?> >Transnistria</option>
                  <option <?php if($query['country']=='Trinidad and Tobago') { echo "selected";}?><?php echo  set_select('country', 'Trinidad and Tobago'); ?> >Trinidad and Tobago</option>
                  <option <?php if($query['country']=='Tristan da Cunha') { echo "selected";}?><?php echo  set_select('country', 'Tristan da Cunha'); ?> >Tristan da Cunha</option>
                  <option <?php if($query['country']=='Tunisia (‫تونس‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Tunisia (‫تونس‬&lrm;)'); ?> >Tunisia (‫تونس‬&lrm;)</option>
                  <option <?php if($query['country']=='Turkey (Türkiye)') { echo "selected";}?><?php echo  set_select('country', 'Turkey (Türkiye)'); ?> >Turkey (Türkiye)</option>
                  <option <?php if($query['country']=='Turkmenistan') { echo "selected";}?><?php echo  set_select('country', 'Turkmenistan'); ?> >Turkmenistan</option>
                  <option <?php if($query['country']=='Turks and Caicos Islands') { echo "selected";}?><?php echo  set_select('country', 'Turks and Caicos Islands'); ?> >Turks and Caicos Islands</option>
                  <option <?php if($query['country']=='Tuvalu') { echo "selected";}?><?php echo  set_select('country', 'Tuvalu'); ?> >Tuvalu</option>
                  <option <?php if($query['country']=='U.S. Outlying Islands') { echo "selected";}?><?php echo  set_select('country', 'U.S. Outlying Islands'); ?> >U.S. Outlying Islands</option>
                  <option <?php if($query['country']=='U.S. Virgin Islands') { echo "selected";}?><?php echo  set_select('country', 'U.S. Virgin Islands'); ?> >U.S. Virgin Islands</option>
                  <option <?php if($query['country']=='Uganda') { echo "selected";}?><?php echo  set_select('country', 'Uganda'); ?> >Uganda</option>
                  <option <?php if($query['country']=='Ukraine (Україна)') { echo "selected";}?><?php echo  set_select('country', 'Ukraine (Україна)'); ?> >Ukraine (Україна)</option>
                  <option <?php if($query['country']=='United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)'); ?> >United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)</option>
                  <option <?php if($query['country']=='United Kingdom') { echo "selected";}?><?php echo  set_select('country', 'United Kingdom'); ?> >United Kingdom</option>
                  <option <?php if($query['country']=='United States') { echo "selected";}?><?php echo  set_select('country', 'United States'); ?> >United States</option>
                  <option <?php if($query['country']=='Uruguay') { echo "selected";}?><?php echo  set_select('country', 'Uruguay'); ?> >Uruguay</option>
                  <option <?php if($query['country']=='Uzbekistan (Ўзбекистон)') { echo "selected";}?><?php echo  set_select('country', 'Uzbekistan (Ўзбекистон)'); ?> >Uzbekistan (Ўзбекистон)</option>
                  <option <?php if($query['country']=='Vanuatu') { echo "selected";}?><?php echo  set_select('country', 'Vanuatu'); ?> >Vanuatu</option>
                  <option <?php if($query['country']=='Vatican City (Città del Vaticano)') { echo "selected";}?><?php echo  set_select('country', 'Vatican City (Città del Vaticano)'); ?> >Vatican City (Città del Vaticano)</option>
                  <option <?php if($query['country']=='Venezuela') { echo "selected";}?><?php echo  set_select('country', 'Venezuela'); ?> >Venezuela</option>
                  <option <?php if($query['country']=='Vietnam (Việt Nam)') { echo "selected";}?><?php echo  set_select('country', 'Vietnam (Việt Nam)'); ?> >Vietnam (Việt Nam)</option>
                  <option <?php if($query['country']=='Wallis and Futuna') { echo "selected";}?><?php echo  set_select('country', 'Wallis and Futuna'); ?> >Wallis and Futuna</option>
                  <option <?php if($query['country']=='Western Sahara (‫الصحراء الغربية‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Western Sahara (‫الصحراء الغربية‬&lrm;)'); ?> >Western Sahara (‫الصحراء الغربية‬&lrm;)</option>
                  <option <?php if($query['country']=='Yemen (‫اليمن‬&lrm;)') { echo "selected";}?><?php echo  set_select('country', 'Yemen (‫اليمن‬&lrm;)'); ?> >Yemen (‫اليمن‬&lrm;)</option>
                  <option <?php if($query['country']=='Zambia') { echo "selected";}?><?php echo  set_select('country', 'Zambia'); ?> >Zambia</option>
                  <option <?php if($query['country']=='Zimbabwe') { echo "selected";}?><?php echo  set_select('country', 'Zimbabwe'); ?> >Zimbabwe</option>
                </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Phone Number</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'phone_number',
                        'id'    => 'phone_number',
                        'value' => $query['phone_number'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Mobile</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'mobile',
                        'id'    => 'mobile',
                        'value' => $query['mobile'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Email</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'email',
                        'name'  => 'email',
                        'id'    => 'email',
                        'value' => $query['email'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">PAN No.</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'pan',
                        'id'    => 'pan',
                        'value' => $query['pan'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Bank Name</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'bank',
                        'id'    => 'bank',
                        'value' => $query['bank'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Branch Address</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'branch_name',
                        'name'  => 'branch_name',
                        'id'    => 'branch_name',
                        'value' => $query['branch_name'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Account Number</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'accno',
                        'name'  => 'accno',
                        'id'    => 'accno',
                        'value' => $query['accno'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>



          </div><!-- col-md-6 -->

        </div><!-- panel-body -->

        <?php echo form_submit('staff_member', 'Update','class="btn btn-primary"');?>

    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->