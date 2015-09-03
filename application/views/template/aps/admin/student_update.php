<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Student Admission</li>
              </ul>
              <h4>Student Admission</h4>
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
      echo validation_errors();
      //var_dump($error);
    ?>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">
          <h5>Fields marked with <em>*</em> must be filled.</h5>

          <div class="row">
            <div class="col-md-6">
                <label class="control-label">Admission Number <em>*</em></label>
                <?php
                  $data = array(
                          'type'  => 'text',
                          'name'  => 'adm_number',
                          'value' => $result['adm_number'],
                          'class' => 'form-control ',
                          'autocomplete'=>'off',
                          'readonly' => 'readonly'
                  );
                  echo form_input($data);             
                  ?>
                  
            </div><!-- col-md-6 -->

            <div class="col-md-6">
                <label class="control-label">Admission Date <em>*</em></label>
                <?php
                  $data = array(
                          'type'  => 'text',
                          'name'  => 'timestamp',
                          'value' => $result['adm_date'],
                          'class' => 'form-control datepickeronly',                          
                          'autocomplete'=>'off',
                         'readonly' => 'readonly'
                  );

                  echo form_input($data);
                  ?>
                  <?php echo form_error('adm_date'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->

         
          
          <div class="col-md-6">
             <h5>Personal Details</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Full Name <em>*</em></label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'first_name',
                        'id'    => 'first_name',
                        'value' => $result['first_name'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly' => 'readonly'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('first_name'); ?>
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
                        'value' => $result['dob'],
                        'class' => 'form-control datepicker',
                        'autocomplete'=>'off',
                        'readonly' => 'readonly'
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
                if(set_value('gender')=='Male' || $result['gender']=='Male') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gender',
                        'id'            => 'gender',
                        'value'         => 'Male',
                        'checked'       => $checked,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Male </label>";
                
                if(set_value('gender')=='Female' || $result['gender']=='Female') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gender',
                        'id'            => 'gender',
                        'value'         => 'Female',
                        'checked'       => $checked,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Female </label>";
                ?>
                <?php echo form_error('gender'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Mother's Name</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'mother_name',
                        'value' => $result['mother_name'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly' => 'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>


            <div class="form-group text-left">
              <label class="col-md-3 control-label">Father's Name</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'father_name',
                        'value' => $result['father_name'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly' => 'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Phone Number</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'phno',
                        'id'    => 'phno',
                        'value' => $result['phno'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>
            

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Office Contact No.:</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'off_contact',
                        'value' => $result['off_contact'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>

              <div class="form-group text-left">
              <label class="col-md-3 control-label">Language Understanding</label>
              <div class="col-md-9">
                <select class="form-control" name="lang_understand" value="<?php echo $result['lang_understand'];?>">
                  <option >Select</option>
                  <option <?php echo  set_select('lang_understand', 'English'); ?> >English</option>
                  <option <?php echo  set_select('lang_understand', 'Hindi'); ?> >Hindi</option>
              </select>
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
                        'value' => $result['birth_place'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('birth_place'); ?>
              </div>
            </div>

           

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Blood Group</label>
              <div class="col-md-9">
                <select class="form-control" name="blood_group" value="<?php echo $result['blood_group'];?>">
                  <option >Select</option>
                  <option <?php echo  set_select('blood_group', 'Unknown'); ?> >Unknown</option>
                  <option <?php echo  set_select('blood_group', 'A+'); ?> >A+</option>
                  <option <?php echo  set_select('blood_group', 'A-'); ?> >A-</option>
                  <option <?php echo  set_select('blood_group', 'B+'); ?> >B+</option>
                  <option <?php echo  set_select('blood_group', 'B-'); ?> >B-</option>
                  <option <?php echo  set_select('blood_group', 'AB+'); ?> >AB+</option>
                  <option <?php echo  set_select('blood_group', 'AB-'); ?> >AB-</option>
                  <option <?php echo  set_select('blood_group', 'O+'); ?> >O+</option>
                  <option <?php echo  set_select('blood_group', 'O-'); ?> >O-</option>
              </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Hobbies</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'hobbies',
                        'value' => '',
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

           <div class="form-group text-left">
              <label class="col-md-3 control-label">Student Category</label>
              <div class="col-md-9">
                 <select class="form-control" name="student_category">
                  <option >Select</option>
                
                  <option <?php echo  set_select('student_categorystudent_category', 'Gen'); ?> >Gen</option>
                  <option <?php echo  set_select('student_category', 'Obc'); ?> >Obc</option>
                  <option <?php echo  set_select('student_category', 'Bc'); ?> >Bc</option>
                  <option <?php echo  set_select('student_category', 'Sc/St'); ?> >Sc/St</option>
                 
              </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Nationality</label>
              <div class="col-md-9">
                <select name="nationality" class="form-control">
                  <option value="" selected>Select Nationality</option>
                  <option <?php echo  set_select('nationality', 'Afghanistan (‫افغانستان‬&lrm;)'); ?> >Afghanistan (‫افغانستان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Åland Islands (Åland)'); ?> >Åland Islands (Åland)</option>
                  <option <?php echo  set_select('nationality', 'Albania (Shqipëria)'); ?> >Albania (Shqipëria)</option>
                  <option <?php echo  set_select('nationality', 'Algeria (‫الجزائر‬&lrm;)'); ?> >Algeria (‫الجزائر‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'American Samoa'); ?> >American Samoa</option>
                  <option <?php echo  set_select('nationality', 'Andorra'); ?> >Andorra</option>
                  <option <?php echo  set_select('nationality', 'Angola'); ?> >Angola</option>
                  <option <?php echo  set_select('nationality', 'Anguilla'); ?> >Anguilla</option>
                  <option <?php echo  set_select('nationality', 'Antarctica'); ?> >Antarctica</option>
                  <option <?php echo  set_select('nationality', 'Antigua and Barbuda'); ?> >Antigua and Barbuda</option>
                  <option <?php echo  set_select('nationality', 'Argentina'); ?> >Argentina</option>
                  <option <?php echo  set_select('nationality', 'Armenia (Հայաստան)'); ?> >Armenia (Հայաստան)</option>
                  <option <?php echo  set_select('nationality', 'Aruba'); ?> >Aruba</option>
                  <option <?php echo  set_select('nationality', 'Ascension Island'); ?> >Ascension Island</option>
                  <option <?php echo  set_select('nationality', 'Australia'); ?> >Australia</option>
                  <option <?php echo  set_select('nationality', 'Austria (Österreich)'); ?> >Austria (Österreich)</option>
                  <option <?php echo  set_select('nationality', 'Azerbaijan (Azərbaycan)'); ?> >Azerbaijan (Azərbaycan)</option>
                  <option <?php echo  set_select('nationality', 'Bahamas'); ?> >Bahamas</option>
                  <option <?php echo  set_select('nationality', 'Bahrain (‫البحرين‬&lrm;)'); ?> >Bahrain (‫البحرين‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Bangladesh (বাংলাদেশ)'); ?> >Bangladesh (বাংলাদেশ)</option>
                  <option <?php echo  set_select('nationality', 'Barbados'); ?> >Barbados</option>
                  <option <?php echo  set_select('nationality', 'Belarus (Беларусь)'); ?> >Belarus (Беларусь)</option>
                  <option <?php echo  set_select('nationality', 'Belgium (België)'); ?> >Belgium (België)</option>
                  <option <?php echo  set_select('nationality', 'Belize'); ?> >Belize</option>
                  <option <?php echo  set_select('nationality', 'Benin (Bénin)'); ?> >Benin (Bénin)</option>
                  <option <?php echo  set_select('nationality', 'Bermuda'); ?> >Bermuda</option>
                  <option <?php echo  set_select('nationality', 'Bhutan (འབྲུག)'); ?> >Bhutan (འབྲུག)</option>
                  <option <?php echo  set_select('nationality', 'Bolivia'); ?> >Bolivia</option>
                  <option <?php echo  set_select('nationality', 'Bosnia and Herzegovina (Босна и Херцеговина)'); ?> >Bosnia and Herzegovina (Босна и Херцеговина)</option>
                  <option <?php echo  set_select('nationality', 'Botswana'); ?> >Botswana</option>
                  <option <?php echo  set_select('nationality', 'Bouvet Island'); ?> >Bouvet Island</option>
                  <option <?php echo  set_select('nationality', 'Brazil (Brasil)'); ?> >Brazil (Brasil)</option>
                  <option <?php echo  set_select('nationality', 'British Indian Ocean Territory'); ?> >British Indian Ocean Territory</option>
                  <option <?php echo  set_select('nationality', 'British Virgin Islands'); ?> >British Virgin Islands</option>
                  <option <?php echo  set_select('nationality', 'Brunei'); ?> >Brunei</option>
                  <option <?php echo  set_select('nationality', 'Bulgaria (България)'); ?> >Bulgaria (България)</option>
                  <option <?php echo  set_select('nationality', 'Burkina Faso'); ?> >Burkina Faso</option>
                  <option <?php echo  set_select('nationality', 'Burundi (Uburundi)'); ?> >Burundi (Uburundi)</option>
                  <option <?php echo  set_select('nationality', 'Cambodia (កម្ពុជា)'); ?> >Cambodia (កម្ពុជា)</option>
                  <option <?php echo  set_select('nationality', 'Cameroon (Cameroun)'); ?> >Cameroon (Cameroun)</option>
                  <option <?php echo  set_select('nationality', 'Canada'); ?> >Canada</option>
                  <option <?php echo  set_select('nationality', 'Canary Islands (Islas Canarias)'); ?> >Canary Islands (Islas Canarias)</option>
                  <option <?php echo  set_select('nationality', 'Cape Verde (Kabu Verdi)'); ?> >Cape Verde (Kabu Verdi)</option>
                  <option <?php echo  set_select('nationality', 'Caribbean Netherlands'); ?> >Caribbean Netherlands</option>
                  <option <?php echo  set_select('nationality', 'Cayman Islands'); ?> >Cayman Islands</option>
                  <option <?php echo  set_select('nationality', 'Central African Republic (République centrafricaine)'); ?> >Central African Republic (République centrafricaine)</option>
                  <option <?php echo  set_select('nationality', 'Ceuta and Melilla (Ceuta y Melilla)'); ?> >Ceuta and Melilla (Ceuta y Melilla)</option>
                  <option <?php echo  set_select('nationality', 'Chad (Tchad)'); ?> >Chad (Tchad)</option>
                  <option <?php echo  set_select('nationality', 'Chile'); ?> >Chile</option>
                  <option <?php echo  set_select('nationality', 'China (中国)'); ?> >China (中国)</option>
                  <option <?php echo  set_select('nationality', 'Christmas Island'); ?> >Christmas Island</option>
                  <option <?php echo  set_select('nationality', 'Clipperton Island (Île Clipperton)'); ?> >Clipperton Island (Île Clipperton)</option>
                  <option <?php echo  set_select('nationality', 'Cocos Islands (Keeling Islands)'); ?> >Cocos Islands (Keeling Islands)</option>
                  <option <?php echo  set_select('nationality', 'Colombia'); ?> >Colombia</option>
                  <option <?php echo  set_select('nationality', 'Comoros (‫جزر القمر‬&lrm;)'); ?> >Comoros (‫جزر القمر‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)'); ?> >Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)</option>
                  <option <?php echo  set_select('nationality', 'Congo-Republic (Congo-Brazzaville)'); ?> >Congo-Republic (Congo-Brazzaville)</option>
                  <option <?php echo  set_select('nationality', 'Cook Islands'); ?> >Cook Islands</option>
                  <option <?php echo  set_select('nationality', 'Costa Rica'); ?> >Costa Rica</option>
                  <option <?php echo  set_select('nationality', 'Côte d’Ivoire'); ?> >Côte d’Ivoire</option>
                  <option <?php echo  set_select('nationality', 'Croatia (Hrvatska)'); ?> >Croatia (Hrvatska)</option>
                  <option <?php echo  set_select('nationality', 'Cuba'); ?> >Cuba</option>
                  <option <?php echo  set_select('nationality', 'Curaçao'); ?> >Curaçao</option>
                  <option <?php echo  set_select('nationality', 'Cyprus (Κύπρος)'); ?> >Cyprus (Κύπρος)</option>
                  <option <?php echo  set_select('nationality', 'Czech Republic (Česká republika)'); ?> >Czech Republic (Česká republika)</option>
                  <option <?php echo  set_select('nationality', 'Denmark (Danmark)'); ?> >Denmark (Danmark)</option>
                  <option <?php echo  set_select('nationality', 'Diego Garcia'); ?> >Diego Garcia</option>
                  <option <?php echo  set_select('nationality', 'Djibouti'); ?> >Djibouti</option>
                  <option <?php echo  set_select('nationality', 'Dominica'); ?> >Dominica</option>
                  <option <?php echo  set_select('nationality', 'Dominican Republic (República Dominicana)'); ?> >Dominican Republic (República Dominicana)</option>
                  <option <?php echo  set_select('nationality', 'Ecuador'); ?> >Ecuador</option>
                  <option <?php echo  set_select('nationality', 'Egypt (‫مصر‬&lrm;)'); ?> >Egypt (‫مصر‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'El Salvador'); ?> >El Salvador</option>
                  <option <?php echo  set_select('nationality', 'Equatorial Guinea (Guinea Ecuatorial)'); ?> >Equatorial Guinea (Guinea Ecuatorial)</option>
                  <option <?php echo  set_select('nationality', 'Eritrea'); ?> >Eritrea</option>
                  <option <?php echo  set_select('nationality', 'Estonia (Eesti)'); ?> >Estonia (Eesti)</option>
                  <option <?php echo  set_select('nationality', 'Ethiopia'); ?> >Ethiopia</option>
                  <option <?php echo  set_select('nationality', 'Falkland Islands (Islas Malvinas)'); ?> >Falkland Islands (Islas Malvinas)</option>
                  <option <?php echo  set_select('nationality', 'Faroe Islands (Føroyar)'); ?> >Faroe Islands (Føroyar)</option>
                  <option <?php echo  set_select('nationality', 'Fiji'); ?> >Fiji</option>
                  <option <?php echo  set_select('nationality', 'Finland (Suomi)'); ?> >Finland (Suomi)</option>
                  <option <?php echo  set_select('nationality', 'France'); ?> >France</option>
                  <option <?php echo  set_select('nationality', 'French Guiana (Guyane française)'); ?> >French Guiana (Guyane française)</option>
                  <option <?php echo  set_select('nationality', 'French Polynesia (Polynésie française)'); ?> >French Polynesia (Polynésie française)</option>
                  <option <?php echo  set_select('nationality', 'French Southern Territories (Terres australes françaises)'); ?> >French Southern Territories (Terres australes françaises)</option>
                  <option <?php echo  set_select('nationality', 'Gabon'); ?> >Gabon</option>
                  <option <?php echo  set_select('nationality', 'Gambia'); ?> >Gambia</option>
                  <option <?php echo  set_select('nationality', 'Georgia (საქართველო)'); ?> >Georgia (საქართველო)</option>
                  <option <?php echo  set_select('nationality', 'Germany (Deutschland)'); ?> >Germany (Deutschland)</option>
                  <option <?php echo  set_select('nationality', 'Ghana (Gaana)'); ?> >Ghana (Gaana)</option>
                  <option <?php echo  set_select('nationality', 'Gibraltar'); ?> >Gibraltar</option>
                  <option <?php echo  set_select('nationality', 'Greece (Ελλάδα)'); ?> >Greece (Ελλάδα)</option>
                  <option <?php echo  set_select('nationality', 'Greenland (Kalaallit Nunaat)'); ?> >Greenland (Kalaallit Nunaat)</option>
                  <option <?php echo  set_select('nationality', 'Grenada'); ?> >Grenada</option>
                  <option <?php echo  set_select('nationality', 'Guadeloupe'); ?> >Guadeloupe</option>
                  <option <?php echo  set_select('nationality', 'Guam'); ?> >Guam</option>
                  <option <?php echo  set_select('nationality', 'Guatemala'); ?> >Guatemala</option>
                  <option <?php echo  set_select('nationality', 'Guernsey'); ?> >Guernsey</option>
                  <option <?php echo  set_select('nationality', 'Guinea (Guinée)'); ?> >Guinea (Guinée)</option>
                  <option <?php echo  set_select('nationality', 'Guinea-Bissau (Guiné Bissau)'); ?> >Guinea-Bissau (Guiné Bissau)</option>
                  <option <?php echo  set_select('nationality', 'Guyana'); ?> >Guyana</option>
                  <option <?php echo  set_select('nationality', 'Haiti'); ?> >Haiti</option>
                  <option <?php echo  set_select('nationality', 'Heard Island and McDonald Islands'); ?> >Heard Island and McDonald Islands</option>
                  <option <?php echo  set_select('nationality', 'Honduras'); ?> >Honduras</option>
                  <option <?php echo  set_select('nationality', 'Hong Kong (香港)'); ?> >Hong Kong (香港)</option>
                  <option <?php echo  set_select('nationality', 'Hungary (Magyarország)'); ?> >Hungary (Magyarország)</option>
                  <option <?php echo  set_select('nationality', 'Iceland (Ísland)'); ?> >Iceland (Ísland)</option>
                  <option <?php echo  set_select('nationality', 'India (भारत)'); ?> >India (भारत)</option>
                  <option <?php echo  set_select('nationality', 'Indonesia'); ?> >Indonesia</option>
                  <option <?php echo  set_select('nationality', 'Iran (‫ایران‬&lrm;)'); ?> >Iran (‫ایران‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Iraq (‫العراق‬&lrm;)'); ?> >Iraq (‫العراق‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Ireland'); ?> >Ireland</option>
                  <option <?php echo  set_select('nationality', 'Isle of Man'); ?> >Isle of Man</option>
                  <option <?php echo  set_select('nationality', 'Israel (‫ישראל‬&lrm;)'); ?> >Israel (‫ישראל‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Italy (Italia)'); ?> >Italy (Italia)</option>
                  <option <?php echo  set_select('nationality', 'Jamaica'); ?> >Jamaica</option>
                  <option <?php echo  set_select('nationality', 'Japan (日本)'); ?> >Japan (日本)</option>
                  <option <?php echo  set_select('nationality', 'Jersey'); ?> >Jersey</option>
                  <option <?php echo  set_select('nationality', 'Jordan (‫الأردن‬&lrm;)'); ?> >Jordan (‫الأردن‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Kazakhstan (Казахстан)'); ?> >Kazakhstan (Казахстан)</option>
                  <option <?php echo  set_select('nationality', 'Kenya'); ?> >Kenya</option>
                  <option <?php echo  set_select('nationality', 'Kiribati'); ?> >Kiribati</option>
                  <option <?php echo  set_select('nationality', 'Kosovo (Косово)'); ?> >Kosovo (Косово)</option>
                  <option <?php echo  set_select('nationality', 'Kuwait (‫الكويت‬&lrm;)'); ?> >Kuwait (‫الكويت‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Kyrgyzstan'); ?> >Kyrgyzstan</option>
                  <option <?php echo  set_select('nationality', 'Laos (ສ.ປ.ປ ລາວ)'); ?> >Laos (ສ.ປ.ປ ລາວ)</option>
                  <option <?php echo  set_select('nationality', 'Latvia (Latvija)'); ?>  >Latvia (Latvija)</option>
                  <option <?php echo  set_select('nationality', 'Lebanon (‫لبنان‬&lrm;)'); ?> >Lebanon (‫لبنان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Lesotho'); ?> >Lesotho</option>
                  <option <?php echo  set_select('nationality', 'Liberia'); ?> >Liberia</option>
                  <option <?php echo  set_select('nationality', 'Libya (‫ليبيا‬&lrm;)'); ?> >Libya (‫ليبيا‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Liechtenstein'); ?> >Liechtenstein</option>
                  <option <?php echo  set_select('nationality', 'Lithuania (Lietuva)'); ?> >Lithuania (Lietuva)</option>
                  <option <?php echo  set_select('nationality', 'Luxembourg'); ?> >Luxembourg</option>
                  <option <?php echo  set_select('nationality', 'Macau (澳門)'); ?> >Macau (澳門)</option>
                  <option <?php echo  set_select('nationality', 'Macedonia (Македонија)'); ?> >Macedonia (Македонија)</option>
                  <option <?php echo  set_select('nationality', 'Madagascar (Madagasikara)'); ?> >Madagascar (Madagasikara)</option>
                  <option <?php echo  set_select('nationality', 'Malawi'); ?> >Malawi</option>
                  <option <?php echo  set_select('nationality', 'Malaysia'); ?> >Malaysia</option>
                  <option <?php echo  set_select('nationality', 'Maldives'); ?> >Maldives</option>
                  <option <?php echo  set_select('nationality', 'Mali'); ?> >Mali</option>
                  <option <?php echo  set_select('nationality', 'Malta'); ?> >Malta</option>
                  <option <?php echo  set_select('nationality', 'Marshall Islands'); ?> >Marshall Islands</option>
                  <option <?php echo  set_select('nationality', 'Martinique'); ?> >Martinique</option>
                  <option <?php echo  set_select('nationality', 'Mauritania (‫موريتانيا‬&lrm;)'); ?> >Mauritania (‫موريتانيا‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Mauritius (Moris)'); ?> >Mauritius (Moris)</option>
                  <option <?php echo  set_select('nationality', 'Mayotte'); ?> >Mayotte</option>
                  <option <?php echo  set_select('nationality', 'Mexico (México)'); ?> >Mexico (México)</option>
                  <option <?php echo  set_select('nationality', 'Micronesia'); ?> >Micronesia</option>
                  <option <?php echo  set_select('nationality', 'Moldova (Republica Moldova)'); ?> >Moldova (Republica Moldova)</option>
                  <option <?php echo  set_select('nationality', 'Monaco'); ?> >Monaco</option>
                  <option <?php echo  set_select('nationality', 'Mongolia (Монгол)'); ?> >Mongolia (Монгол)</option>
                  <option <?php echo  set_select('nationality', 'Montenegro (Crna Gora)'); ?> >Montenegro (Crna Gora)</option>
                  <option <?php echo  set_select('nationality', 'Montserrat'); ?> >Montserrat</option>
                  <option <?php echo  set_select('nationality', 'Morocco (‫المغرب‬&lrm;)'); ?> >Morocco (‫المغرب‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Mozambique (Moçambique)'); ?> >Mozambique (Moçambique)</option>
                  <option <?php echo  set_select('nationality', 'Myanmar (Burma)'); ?> >Myanmar (Burma)</option>
                  <option <?php echo  set_select('nationality', 'Nagorno-Karabakh'); ?> >Nagorno-Karabakh</option>
                  <option <?php echo  set_select('nationality', 'Namibia'); ?> >Namibia</option>
                  <option <?php echo  set_select('nationality', 'Nauru'); ?> >Nauru</option>
                  <option <?php echo  set_select('nationality', 'Nepal (नेपाल)'); ?> >Nepal (नेपाल)</option>
                  <option <?php echo  set_select('nationality', 'Netherlands (Nederland)'); ?> >Netherlands (Nederland)</option>
                  <option <?php echo  set_select('nationality', 'New Caledonia (Nouvelle-Calédonie)'); ?> >New Caledonia (Nouvelle-Calédonie)</option>
                  <option <?php echo  set_select('nationality', 'New Zealand'); ?> >New Zealand</option>
                  <option <?php echo  set_select('nationality', 'Nicaragua'); ?> >Nicaragua</option>
                  <option <?php echo  set_select('nationality', 'Niger (Nijar)'); ?> >Niger (Nijar)</option>
                  <option <?php echo  set_select('nationality', 'Nigeria'); ?> >Nigeria</option>
                  <option <?php echo  set_select('nationality', 'Niue'); ?> >Niue</option>
                  <option <?php echo  set_select('nationality', 'Norfolk Island'); ?> >Norfolk Island</option>
                  <option <?php echo  set_select('nationality', 'North Korea (조선 민주주의 인민 공화국)'); ?> >North Korea (조선 민주주의 인민 공화국)</option>
                  <option <?php echo  set_select('nationality', 'Northern Mariana Islands'); ?> >Northern Mariana Islands</option>
                  <option <?php echo  set_select('nationality', 'Norway (Norge)'); ?> >Norway (Norge)</option>
                  <option <?php echo  set_select('nationality', 'Oman (‫عُمان‬&lrm;)'); ?> >Oman (‫عُمان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Pakistan (‫پاکستان‬&lrm;)'); ?> >Pakistan (‫پاکستان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Palau'); ?> >Palau</option>
                  <option <?php echo  set_select('nationality', 'Palestine (‫فلسطين‬&lrm;)'); ?> >Palestine (‫فلسطين‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Panama (Panamá)'); ?> >Panama (Panamá)</option>
                  <option <?php echo  set_select('nationality', 'Papua New Guinea'); ?> >Papua New Guinea</option>
                  <option <?php echo  set_select('nationality', 'Paraguay'); ?> >Paraguay</option>
                  <option <?php echo  set_select('nationality', 'Peru (Perú)'); ?> >Peru (Perú)</option>
                  <option <?php echo  set_select('nationality', 'Philippines'); ?> >Philippines</option>
                  <option <?php echo  set_select('nationality', 'Pitcairn Islands'); ?> >Pitcairn Islands</option>
                  <option <?php echo  set_select('nationality', 'Poland (Polska)'); ?> >Poland (Polska)</option>
                  <option <?php echo  set_select('nationality', 'Portugal'); ?> >Portugal</option>
                  <option <?php echo  set_select('nationality', 'Puerto Rico'); ?> >Puerto Rico</option>
                  <option <?php echo  set_select('nationality', 'Qatar (‫قطر‬&lrm;)'); ?> >Qatar (‫قطر‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Réunion'); ?> >Réunion</option>
                  <option <?php echo  set_select('nationality', 'Romania (România)'); ?> >Romania (România)</option>
                  <option <?php echo  set_select('nationality', 'Russia (Россия)'); ?> >Russia (Россия)</option>
                  <option <?php echo  set_select('nationality', 'Rwanda'); ?> >Rwanda</option>
                  <option <?php echo  set_select('nationality', 'Saint Barthélemy (Saint-Barthélémy)'); ?> >Saint Barthélemy (Saint-Barthélémy)</option>
                  <option <?php echo  set_select('nationality', 'Saint Helena'); ?> >Saint Helena</option>
                  <option <?php echo  set_select('nationality', 'Saint Kitts and Nevis'); ?> >Saint Kitts and Nevis</option>
                  <option <?php echo  set_select('nationality', 'Saint Lucia'); ?> >Saint Lucia</option>
                  <option <?php echo  set_select('nationality', 'Saint Martin (Saint-Martin [partie française])'); ?> >Saint Martin (Saint-Martin [partie française])</option>
                  <option <?php echo  set_select('nationality', 'Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)'); ?> >Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option>
                  <option <?php echo  set_select('nationality', 'Saint Vincent and the Grenadines'); ?> >Saint Vincent and the Grenadines</option>
                  <option <?php echo  set_select('nationality', 'Samoa'); ?> >Samoa</option>
                  <option <?php echo  set_select('nationality', 'San Marino'); ?> >San Marino</option>
                  <option <?php echo  set_select('nationality', 'São Tomé and Príncipe (São Tomé e Príncipe)'); ?> >São Tomé and Príncipe (São Tomé e Príncipe)</option>
                  <option <?php echo  set_select('nationality', 'Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)'); ?> >Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Senegal (Sénégal)'); ?> >Senegal (Sénégal)</option>
                  <option <?php echo  set_select('nationality', 'Serbia (Србија)'); ?> >Serbia (Србија)</option>
                  <option <?php echo  set_select('nationality', 'Seychelles'); ?> >Seychelles</option>
                  <option <?php echo  set_select('nationality', 'Sierra Leone'); ?> >Sierra Leone</option>
                  <option <?php echo  set_select('nationality', 'Singapore'); ?> >Singapore</option>
                  <option <?php echo  set_select('nationality', 'Sint Maarten'); ?> >Sint Maarten</option>
                  <option <?php echo  set_select('nationality', 'Slovakia (Slovensko)'); ?> >Slovakia (Slovensko)</option>
                  <option <?php echo  set_select('nationality', 'Slovenia (Slovenija)'); ?> >Slovenia (Slovenija)</option>
                  <option <?php echo  set_select('nationality', 'Solomon Islands'); ?> >Solomon Islands</option>
                  <option <?php echo  set_select('nationality', 'Somalia (Soomaaliya)'); ?> >Somalia (Soomaaliya)</option>
                  <option <?php echo  set_select('nationality', 'South Africa'); ?> >South Africa</option>
                  <option <?php echo  set_select('nationality', 'South Georgia and the South Sandwich Islands'); ?> >South Georgia and the South Sandwich Islands</option>
                  <option <?php echo  set_select('nationality', 'South Korea (대한민국)'); ?> >South Korea (대한민국)</option>
                  <option <?php echo  set_select('nationality', 'South Sudan (‫جنوب السودان‬&lrm;)'); ?> >South Sudan (‫جنوب السودان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Spain (España)'); ?> >Spain (España)</option>
                  <option <?php echo  set_select('nationality', 'Sri Lanka (ශ්&zwj;රී ලංකාව)'); ?> >Sri Lanka (ශ්&zwj;රී ලංකාව)</option>
                  <option <?php echo  set_select('nationality', 'Sudan (‫السودان‬&lrm;)'); ?> >Sudan (‫السودان‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Suriname'); ?> >Suriname</option>
                  <option <?php echo  set_select('nationality', 'Svalbard and Jan Mayen (Svalbard og Jan Mayen)'); ?> >Svalbard and Jan Mayen (Svalbard og Jan Mayen)</option>
                  <option <?php echo  set_select('nationality', 'Swaziland'); ?> >Swaziland</option>
                  <option <?php echo  set_select('nationality', 'Sweden (Sverige)'); ?> >Sweden (Sverige)</option>
                  <option <?php echo  set_select('nationality', 'Switzerland (Schweiz)'); ?> >Switzerland (Schweiz)</option>
                  <option <?php echo  set_select('nationality', 'Syria (‫سوريا‬&lrm;)'); ?> >Syria (‫سوريا‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Taiwan (台灣)'); ?> >Taiwan (台灣)</option>
                  <option <?php echo  set_select('nationality', 'Tajikistan'); ?> >Tajikistan</option>
                  <option <?php echo  set_select('nationality', 'Tanzania'); ?> >Tanzania</option>
                  <option <?php echo  set_select('nationality', 'Thailand (ไทย)'); ?> >Thailand (ไทย)</option>
                  <option <?php echo  set_select('nationality', 'Timor-Leste'); ?> >Timor-Leste</option>
                  <option <?php echo  set_select('nationality', 'Togo'); ?> >Togo</option>
                  <option <?php echo  set_select('nationality', 'Tokelau'); ?> >Tokelau</option>
                  <option <?php echo  set_select('nationality', 'Tonga'); ?> >Tonga</option>
                  <option <?php echo  set_select('nationality', 'Transnistria'); ?> >Transnistria</option>
                  <option <?php echo  set_select('nationality', 'Trinidad and Tobago'); ?> >Trinidad and Tobago</option>
                  <option <?php echo  set_select('nationality', 'Tristan da Cunha'); ?> >Tristan da Cunha</option>
                  <option <?php echo  set_select('nationality', 'Tunisia (‫تونس‬&lrm;)'); ?> >Tunisia (‫تونس‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Turkey (Türkiye)'); ?> >Turkey (Türkiye)</option>
                  <option <?php echo  set_select('nationality', 'Turkmenistan'); ?> >Turkmenistan</option>
                  <option <?php echo  set_select('nationality', 'Turks and Caicos Islands'); ?> >Turks and Caicos Islands</option>
                  <option <?php echo  set_select('nationality', 'Tuvalu'); ?> >Tuvalu</option>
                  <option <?php echo  set_select('nationality', 'U.S. Outlying Islands'); ?> >U.S. Outlying Islands</option>
                  <option <?php echo  set_select('nationality', 'U.S. Virgin Islands'); ?> >U.S. Virgin Islands</option>
                  <option <?php echo  set_select('nationality', 'Uganda'); ?> >Uganda</option>
                  <option <?php echo  set_select('nationality', 'Ukraine (Україна)'); ?> >Ukraine (Україна)</option>
                  <option <?php echo  set_select('nationality', 'United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)'); ?> >United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'United Kingdom'); ?> >United Kingdom</option>
                  <option <?php echo  set_select('nationality', 'United States'); ?> >United States</option>
                  <option <?php echo  set_select('nationality', 'Uruguay'); ?> >Uruguay</option>
                  <option <?php echo  set_select('nationality', 'Uzbekistan (Ўзбекистон)'); ?> >Uzbekistan (Ўзбекистон)</option>
                  <option <?php echo  set_select('nationality', 'Vanuatu'); ?> >Vanuatu</option>
                  <option <?php echo  set_select('nationality', 'Vatican City (Città del Vaticano)'); ?> >Vatican City (Città del Vaticano)</option>
                  <option <?php echo  set_select('nationality', 'Venezuela'); ?> >Venezuela</option>
                  <option <?php echo  set_select('nationality', 'Vietnam (Việt Nam)'); ?> >Vietnam (Việt Nam)</option>
                  <option <?php echo  set_select('nationality', 'Wallis and Futuna'); ?> >Wallis and Futuna</option>
                  <option <?php echo  set_select('nationality', 'Western Sahara (‫الصحراء الغربية‬&lrm;)'); ?> >Western Sahara (‫الصحراء الغربية‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Yemen (‫اليمن‬&lrm;)'); ?> >Yemen (‫اليمن‬&lrm;)</option>
                  <option <?php echo  set_select('nationality', 'Zambia'); ?> >Zambia</option>
                  <option <?php echo  set_select('nationality', 'Zimbabwe'); ?> >Zimbabwe</option>
                </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Category</label>
              <div class="col-md-9">
                <?php
                 $query =$this->db->query("SELECT student_category_id,name FROM student_category "); 
                foreach ($query->result() as $row)
                {
                  $options[$row->student_category_id]=$row->name;
                }
                $student_category_id=$result['student_category_id'];
                echo form_dropdown('student_category_id', $options, $student_category_id,'class="form-control"');
                ?>
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
                        'value' => $result['biometric_id'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            

            <h5>Upload user's photo</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Upload Image</label>
              <div class="col-md-9">
              <input type="file" name="image_c" value="">
              </div>
            </div>

          </div><!-- col-md-6 -->

          <div class="col-md-6">
            <h5>Contact Details</h5>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Unit Address</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'unit_address',
                        'id'    => 'unit_address',
                        'value' => $result['unit_address'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'rows'=>'5',
                        'cols'=>'5'
                );

                echo form_textarea($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Home Address</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'home_address',
                        'id'    => 'home_address',
                        'value' => $result['home_address'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'rows'=>'5',
                        'cols'=>'5'
                );

                echo form_textarea($data);
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
                        'value' => $result['city'],
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
                        'value' => $result['state'],
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
                        'name'  => 'pin',
                        'id'    => 'pin',
                        'value' => $result['pin'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

          

            

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Salutation</label>
              <div class="col-md-9">
                <select class="form-control" name="salutation">
                  <option >Select</option>
                  <option <?php echo  set_select('salutation', 'EX NK'); ?> >EX NK</option>
                  <option <?php echo  set_select('salutation', 'sub'); ?> >Sub</option>
                  <option <?php echo  set_select('salutation', 'sub major'); ?> >Sub Major</option>
                  <option <?php echo  set_select('salutation', 'l/nk'); ?> >L/Nk</option>
                  <option <?php echo  set_select('salutation', 'capt'); ?> >Capt</option>
                  <option <?php echo  set_select('salutation', 'sep'); ?> >SEP</option>
                  <option <?php echo  set_select('salutation', 'sqn'); ?> >SQN</option>
                  <option <?php echo  set_select('salutation', 'l/hav'); ?> >L/HAV</option>
                  <option <?php echo  set_select('salutation', 'exsgt'); ?> >EX.SGT</option>
                  <option <?php echo  set_select('salutation', 'exhav'); ?> >EX-HAV</option>
                  <option <?php echo  set_select('salutation', 'ald'); ?> >ALD</option>
                  <option <?php echo  set_select('salutation', 'gnr'); ?> >GNR</option>
                  <option <?php echo  set_select('salutation', 'aao'); ?> >AAO</option>
                  <option <?php echo  set_select('salutation', 'dfr'); ?> >DFR</option>
                  <option <?php echo  set_select('salutation', 'sgt'); ?> >SGT</option>
                  <option <?php echo  set_select('salutation', 'latenk'); ?> >LATE NK</option>
                  <option <?php echo  set_select('salutation', 'lthav'); ?> >LT HAV</option>
                  <option <?php echo  set_select('salutation', 'chm'); ?> >CHM</option>
                  <option <?php echo  set_select('salutation', 'hmt'); ?> >HMT</option>
                  <option <?php echo  set_select('salutation', 'ld'); ?> >LD</option>
                  <option <?php echo  set_select('salutation', 'exsub'); ?> >EX.Sub</option>
                  <option <?php echo  set_select('salutation', 'nbris'); ?> >NB/RIS</option>
                  <option <?php echo  set_select('salutation', 'latemr'); ?> >LATE Mr.</option>
                  <option <?php echo  set_select('salutation', 'mrs'); ?> >MRS.</option>
                  <option <?php echo  set_select('salutation', 'cpl'); ?> >CPL</option>
                  <option <?php echo  set_select('salutation', 'cfn'); ?> >CFN</option>
                  <option <?php echo  set_select('salutation', 'nbsub'); ?> >NB/SUB</option>
                  <option <?php echo  set_select('salutation', 'cdfr'); ?> >C DFR</option>
                  <option <?php echo  set_select('salutation', 'nbsun'); ?> >NB/SUN</option>
                  <option <?php echo  set_select('salutation', 'smt'); ?> >SMT</option>
                  <option <?php echo  set_select('salutation', 'sh'); ?> >SH</option>
                  <option <?php echo  set_select('salutation', 'rsm'); ?> >RSM</option>
                  <option <?php echo  set_select('salutation', 'mr'); ?> >MR</option>
                  <option <?php echo  set_select('salutation', 'nbsub'); ?> >NB SUB</option>
                  <option <?php echo  set_select('salutation', 'brig'); ?> >BRIG</option>
                  <option <?php echo  set_select('salutation', 'ltsep'); ?> >LT.SEP.</option>
                  <option <?php echo  set_select('salutation', 'wgcdr'); ?> >Wg.cdr</option>
                  <option <?php echo  set_select('salutation', 'exnce'); ?> >EX NCE</option>
                  <option <?php echo  set_select('salutation', 'exchera'); ?> >EX CHERA</option>
                  <option <?php echo  set_select('salutation', 'lateexhav'); ?> >LATE EX HAV</option>
                  <option <?php echo  set_select('salutation', 'exmaj'); ?> >EX.MAJ</option>
                  <option <?php echo  set_select('salutation', 'exoffltcol'); ?> >EX.OFF.LT.COL</option>
                  <option <?php echo  set_select('salutation', 'l/nk'); ?> >L/NK</option>
                  <option <?php echo  set_select('salutation', 'exsgt'); ?> >EX-SGT</option>
                  <option <?php echo  set_select('salutation', 'jco'); ?> >JCO</option>
                  <option <?php echo  set_select('salutation', 'snaud'); ?> >SN.AUD.</option>
                  <option <?php echo  set_select('salutation', 'n/subld'); ?> >N/SUB LD</option>
                  <option <?php echo  set_select('salutation', 'exjco'); ?> >EX JCO</option>
                  <option <?php echo  set_select('salutation', 'civil'); ?> >CIVIL</option>
                  <option <?php echo  set_select('salutation', 'hav'); ?> >HAV.</option>
                  <option <?php echo  set_select('salutation', 'l/hav'); ?> >L/HAV.</option>
                  <option <?php echo  set_select('salutation', 'wgcdr'); ?> >WG CDR</option>
                  <option <?php echo  set_select('salutation', 'thm'); ?> >THM</option>
                  <option <?php echo  set_select('salutation', 'ingate'); ?> >Ingate</option>
                  <option <?php echo  set_select('salutation', 'ask'); ?> >ASK</option>
                  <option <?php echo  set_select('salutation', 'rfn'); ?> >Rfn</option>
                  <option <?php echo  set_select('salutation', 'exhav'); ?> >EX.HAV.</option>
                  <option <?php echo  set_select('salutation', 'latesub'); ?> >LATE SUB</option>
                  <option <?php echo  set_select('salutation', 'lt'); ?> >LT</option>
                  <option <?php echo  set_select('salutation', 'hav(gd)'); ?> >Hav(GD)</option>
                  <option <?php echo  set_select('salutation', 'ms'); ?> >Ms.</option>
                  <option <?php echo  set_select('salutation', 'latemrs'); ?> >Late Mrs.</option>
                  <option <?php echo  set_select('salutation', 'miss'); ?> >Miss</option>
                  <option <?php echo  set_select('salutation', 'spr'); ?> >SPR</option>
                  <option <?php echo  set_select('salutation', 'ex'); ?> >EX</option>
                  <option <?php echo  set_select('salutation', 'lnk'); ?> >LNK</option>
                  <option <?php echo  set_select('salutation', 'nbsub'); ?> >NBSUB</option>
                  <option <?php echo  set_select('salutation', 'col'); ?> >COL</option>
                  <option <?php echo  set_select('salutation', 'rhm'); ?> >RHM</option>
                  <option <?php echo  set_select('salutation', 'sow'); ?> >SOW</option>
                  <option <?php echo  set_select('salutation', 'swr'); ?> >SWR</option>
                  <option <?php echo  set_select('salutation', 'exdfr'); ?> >EXDFR</option>
                  <option <?php echo  set_select('salutation', '(late)lt'); ?> >(LATE)LT</option>
                  <option <?php echo  set_select('salutation', 'exnk'); ?> >EXNK</option>
                  <option <?php echo  set_select('salutation', 'lhav'); ?> >LHAV</option>
                  <option <?php echo  set_select('salutation', 'gdr'); ?> >GDR</option>
                  <option <?php echo  set_select('salutation', 'jitendra'); ?> >JITENDRA</option>
                  <option <?php echo  set_select('salutation', 'nb'); ?> >NB</option>
                  <option <?php echo  set_select('salutation', 'capt'); ?> >CAPT</option>
                  <option <?php echo  set_select('salutation', 'exhav'); ?> >EXHAV</option>
                  <option <?php echo  set_select('salutation', '(ex)nb'); ?> >(Ex)NB</option>
                  <option <?php echo  set_select('salutation', 'narender'); ?> >NARENDER</option>
                  <option <?php echo  set_select('salutation', 'nk/na'); ?> >NK/NA</option>          
             </select>
              </div>
            </div>

            
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Father Rank</label>
              <div class="col-md-9">
                <select class="form-control" name="father_rank">
                  <option >Select</option>
                  <option <?php echo  set_select('father_rank', 'JCO'); ?> >JCO</option>
                  <option <?php echo  set_select('father_rank', 'OR'); ?> >OR</option>
                  <option <?php echo  set_select('father_rank', 'Civilian'); ?> >Civilian</option>
                  <option <?php echo  set_select('father_rank', 'Ex-Serviceman'); ?> >Ex-Serviceman</option>
              </select>
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
                        'value' => $result['email'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <h5>Course & Batch Details</h5>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Class<em>*</em></label>
              <div class="col-md-9">

                <?php
                 $query =$this->db->query("SELECT class_id,name FROM class "); 
                foreach ($query->result() as $row)
                {
                  $options[$row->class_id]=$row->name;
                }
                $class_id=$result['class_id'];
                echo form_dropdown('class_id', $options, $class_id,'class="form-control",id="get_section_class_change"');
                ?>
              </div>
            </div> 

             <div class="form-group text-left">
              <label class="col-md-3 control-label">Section<em>*</em></label>
              <div class="col-md-9 show_sections_class_change">
                <h6>Please Select Class First.</h6>
              </div>
            </div> 

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Academic Year<em>*</em></label>
              <div class="col-md-9 show_batch_section_change">
                <h6>Please Select Section First.</h6>
                <?php echo form_error('batch_id'); ?>
              </div>
            </div>  
           <div class="form-group text-left">
              <label class="col-md-3 control-label">Stream</label>
              <div class="col-md-9">
                 <select class="form-control" name="stream">
                  <option >Select</option>
                
                  <option <?php echo  set_select('stream', 'Medical'); ?> >Medical</option>
                  <option <?php echo  set_select('stream', 'Non-Medical'); ?> >Non-Medical</option>
                  <option <?php echo  set_select('stream', 'Commerce'); ?> >Commerce</option>
                  <option <?php echo  set_select('stream', 'Humanities'); ?> >Humanities</option>
                 
              </select>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Club</label>
              <div class="col-md-9">
                <select class="form-control" name="club">
                  <option >Select</option>
                  <option <?php echo  set_select('club', 'club1'); ?> >club1</option>
                  <option <?php echo  set_select('club', 'club2'); ?> >club2</option>
                  <option <?php echo  set_select('club', 'club3'); ?> >club3</option>
              </select>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Roll No.</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'roll_no',
                        'id'    => 'roll_no',
                        'value' => $result['roll_no'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>


          </div><!-- col-md-6 -->

        </div><!-- panel-body -->

        <?php echo form_submit('student_admission', 'Update','class="btn btn-primary"');?>

    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->