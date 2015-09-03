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
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

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
                        'value' => set_value('emp_code'),
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
                        'value' => set_value('first_name'),
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
                        'value' => set_value('mothername'),
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
                        'value' => set_value('fathername'),
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
                        'value' => set_value('dob'),
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
                if(set_value('gender')=='male') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gender',
                        'id'            => 'gender',
                        'value'         => 'male',
                        'checked'       => $checked,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Male </label>";
                
                if(set_value('gender')=='female') { $checked=TRUE;  } else { $checked=false; }
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
                        'value' => set_value('birth_place'),
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
                        'name'  => 'mother_tongue',
                        'id'    => 'mother_tongue',
                        'value' => set_value('mother_tongue'),
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
              <label class="col-md-3 control-label">Religion</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'religion',
                        'id'    => 'religion',
                        'value' => set_value('religion'),
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
                $options= array(''=>"Select Staff Category");
                foreach ($query as $row)
                {
                  $options[$row->staff_category_id]=$row->name;
                }
                echo form_dropdown('staff_category_id', $options, set_value('staff_category_id'),'class="form-control"');
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
                        'value' => set_value('biometric_id'),
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
                        'value' => set_value('basic_pay'),
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
                        'name'  => 'address_line1',
                        'id'    => 'address_line1',
                        'value' => set_value('address_line1'),
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
                        'name'  => 'address_line2',
                        'id'    => 'address_line2',
                        'value' => set_value('address_line2'),
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
                        'value' => set_value('city'),
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
                        'value' => set_value('state'),
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
                        'value' => set_value('pin'),
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
                  <option <?php echo  set_select('country', 'Afghanistan (‫افغانستان‬&lrm;)'); ?> >Afghanistan (‫افغانستان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Åland Islands (Åland)'); ?> >Åland Islands (Åland)</option>
                  <option <?php echo  set_select('country', 'Albania (Shqipëria)'); ?> >Albania (Shqipëria)</option>
                  <option <?php echo  set_select('country', 'Algeria (‫الجزائر‬&lrm;)'); ?> >Algeria (‫الجزائر‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'American Samoa'); ?> >American Samoa</option>
                  <option <?php echo  set_select('country', 'Andorra'); ?> >Andorra</option>
                  <option <?php echo  set_select('country', 'Angola'); ?> >Angola</option>
                  <option <?php echo  set_select('country', 'Anguilla'); ?> >Anguilla</option>
                  <option <?php echo  set_select('country', 'Antarctica'); ?> >Antarctica</option>
                  <option <?php echo  set_select('country', 'Antigua and Barbuda'); ?> >Antigua and Barbuda</option>
                  <option <?php echo  set_select('country', 'Argentina'); ?> >Argentina</option>
                  <option <?php echo  set_select('country', 'Armenia (Հայաստան)'); ?> >Armenia (Հայաստան)</option>
                  <option <?php echo  set_select('country', 'Aruba'); ?> >Aruba</option>
                  <option <?php echo  set_select('country', 'Ascension Island'); ?> >Ascension Island</option>
                  <option <?php echo  set_select('country', 'Australia'); ?> >Australia</option>
                  <option <?php echo  set_select('country', 'Austria (Österreich)'); ?> >Austria (Österreich)</option>
                  <option <?php echo  set_select('country', 'Azerbaijan (Azərbaycan)'); ?> >Azerbaijan (Azərbaycan)</option>
                  <option <?php echo  set_select('country', 'Bahamas'); ?> >Bahamas</option>
                  <option <?php echo  set_select('country', 'Bahrain (‫البحرين‬&lrm;)'); ?> >Bahrain (‫البحرين‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Bangladesh (বাংলাদেশ)'); ?> >Bangladesh (বাংলাদেশ)</option>
                  <option <?php echo  set_select('country', 'Barbados'); ?> >Barbados</option>
                  <option <?php echo  set_select('country', 'Belarus (Беларусь)'); ?> >Belarus (Беларусь)</option>
                  <option <?php echo  set_select('country', 'Belgium (België)'); ?> >Belgium (België)</option>
                  <option <?php echo  set_select('country', 'Belize'); ?> >Belize</option>
                  <option <?php echo  set_select('country', 'Benin (Bénin)'); ?> >Benin (Bénin)</option>
                  <option <?php echo  set_select('country', 'Bermuda'); ?> >Bermuda</option>
                  <option <?php echo  set_select('country', 'Bhutan (འབྲུག)'); ?> >Bhutan (འབྲུག)</option>
                  <option <?php echo  set_select('country', 'Bolivia'); ?> >Bolivia</option>
                  <option <?php echo  set_select('country', 'Bosnia and Herzegovina (Босна и Херцеговина)'); ?> >Bosnia and Herzegovina (Босна и Херцеговина)</option>
                  <option <?php echo  set_select('country', 'Botswana'); ?> >Botswana</option>
                  <option <?php echo  set_select('country', 'Bouvet Island'); ?> >Bouvet Island</option>
                  <option <?php echo  set_select('country', 'Brazil (Brasil)'); ?> >Brazil (Brasil)</option>
                  <option <?php echo  set_select('country', 'British Indian Ocean Territory'); ?> >British Indian Ocean Territory</option>
                  <option <?php echo  set_select('country', 'British Virgin Islands'); ?> >British Virgin Islands</option>
                  <option <?php echo  set_select('country', 'Brunei'); ?> >Brunei</option>
                  <option <?php echo  set_select('country', 'Bulgaria (България)'); ?> >Bulgaria (България)</option>
                  <option <?php echo  set_select('country', 'Burkina Faso'); ?> >Burkina Faso</option>
                  <option <?php echo  set_select('country', 'Burundi (Uburundi)'); ?> >Burundi (Uburundi)</option>
                  <option <?php echo  set_select('country', 'Cambodia (កម្ពុជា)'); ?> >Cambodia (កម្ពុជា)</option>
                  <option <?php echo  set_select('country', 'Cameroon (Cameroun)'); ?> >Cameroon (Cameroun)</option>
                  <option <?php echo  set_select('country', 'Canada'); ?> >Canada</option>
                  <option <?php echo  set_select('country', 'Canary Islands (Islas Canarias)'); ?> >Canary Islands (Islas Canarias)</option>
                  <option <?php echo  set_select('country', 'Cape Verde (Kabu Verdi)'); ?> >Cape Verde (Kabu Verdi)</option>
                  <option <?php echo  set_select('country', 'Caribbean Netherlands'); ?> >Caribbean Netherlands</option>
                  <option <?php echo  set_select('country', 'Cayman Islands'); ?> >Cayman Islands</option>
                  <option <?php echo  set_select('country', 'Central African Republic (République centrafricaine)'); ?> >Central African Republic (République centrafricaine)</option>
                  <option <?php echo  set_select('country', 'Ceuta and Melilla (Ceuta y Melilla)'); ?> >Ceuta and Melilla (Ceuta y Melilla)</option>
                  <option <?php echo  set_select('country', 'Chad (Tchad)'); ?> >Chad (Tchad)</option>
                  <option <?php echo  set_select('country', 'Chile'); ?> >Chile</option>
                  <option <?php echo  set_select('country', 'China (中国)'); ?> >China (中国)</option>
                  <option <?php echo  set_select('country', 'Christmas Island'); ?> >Christmas Island</option>
                  <option <?php echo  set_select('country', 'Clipperton Island (Île Clipperton)'); ?> >Clipperton Island (Île Clipperton)</option>
                  <option <?php echo  set_select('country', 'Cocos Islands (Keeling Islands)'); ?> >Cocos Islands (Keeling Islands)</option>
                  <option <?php echo  set_select('country', 'Colombia'); ?> >Colombia</option>
                  <option <?php echo  set_select('country', 'Comoros (‫جزر القمر‬&lrm;)'); ?> >Comoros (‫جزر القمر‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)'); ?> >Congo-DRC (Jamhuri ya Kidemokrasia ya Kongo)</option>
                  <option <?php echo  set_select('country', 'Congo-Republic (Congo-Brazzaville)'); ?> >Congo-Republic (Congo-Brazzaville)</option>
                  <option <?php echo  set_select('country', 'Cook Islands'); ?> >Cook Islands</option>
                  <option <?php echo  set_select('country', 'Costa Rica'); ?> >Costa Rica</option>
                  <option <?php echo  set_select('country', 'Côte d’Ivoire'); ?> >Côte d’Ivoire</option>
                  <option <?php echo  set_select('country', 'Croatia (Hrvatska)'); ?> >Croatia (Hrvatska)</option>
                  <option <?php echo  set_select('country', 'Cuba'); ?> >Cuba</option>
                  <option <?php echo  set_select('country', 'Curaçao'); ?> >Curaçao</option>
                  <option <?php echo  set_select('country', 'Cyprus (Κύπρος)'); ?> >Cyprus (Κύπρος)</option>
                  <option <?php echo  set_select('country', 'Czech Republic (Česká republika)'); ?> >Czech Republic (Česká republika)</option>
                  <option <?php echo  set_select('country', 'Denmark (Danmark)'); ?> >Denmark (Danmark)</option>
                  <option <?php echo  set_select('country', 'Diego Garcia'); ?> >Diego Garcia</option>
                  <option <?php echo  set_select('country', 'Djibouti'); ?> >Djibouti</option>
                  <option <?php echo  set_select('country', 'Dominica'); ?> >Dominica</option>
                  <option <?php echo  set_select('country', 'Dominican Republic (República Dominicana)'); ?> >Dominican Republic (República Dominicana)</option>
                  <option <?php echo  set_select('country', 'Ecuador'); ?> >Ecuador</option>
                  <option <?php echo  set_select('country', 'Egypt (‫مصر‬&lrm;)'); ?> >Egypt (‫مصر‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'El Salvador'); ?> >El Salvador</option>
                  <option <?php echo  set_select('country', 'Equatorial Guinea (Guinea Ecuatorial)'); ?> >Equatorial Guinea (Guinea Ecuatorial)</option>
                  <option <?php echo  set_select('country', 'Eritrea'); ?> >Eritrea</option>
                  <option <?php echo  set_select('country', 'Estonia (Eesti)'); ?> >Estonia (Eesti)</option>
                  <option <?php echo  set_select('country', 'Ethiopia'); ?> >Ethiopia</option>
                  <option <?php echo  set_select('country', 'Falkland Islands (Islas Malvinas)'); ?> >Falkland Islands (Islas Malvinas)</option>
                  <option <?php echo  set_select('country', 'Faroe Islands (Føroyar)'); ?> >Faroe Islands (Føroyar)</option>
                  <option <?php echo  set_select('country', 'Fiji'); ?> >Fiji</option>
                  <option <?php echo  set_select('country', 'Finland (Suomi)'); ?> >Finland (Suomi)</option>
                  <option <?php echo  set_select('country', 'France'); ?> >France</option>
                  <option <?php echo  set_select('country', 'French Guiana (Guyane française)'); ?> >French Guiana (Guyane française)</option>
                  <option <?php echo  set_select('country', 'French Polynesia (Polynésie française)'); ?> >French Polynesia (Polynésie française)</option>
                  <option <?php echo  set_select('country', 'French Southern Territories (Terres australes françaises)'); ?> >French Southern Territories (Terres australes françaises)</option>
                  <option <?php echo  set_select('country', 'Gabon'); ?> >Gabon</option>
                  <option <?php echo  set_select('country', 'Gambia'); ?> >Gambia</option>
                  <option <?php echo  set_select('country', 'Georgia (საქართველო)'); ?> >Georgia (საქართველო)</option>
                  <option <?php echo  set_select('country', 'Germany (Deutschland)'); ?> >Germany (Deutschland)</option>
                  <option <?php echo  set_select('country', 'Ghana (Gaana)'); ?> >Ghana (Gaana)</option>
                  <option <?php echo  set_select('country', 'Gibraltar'); ?> >Gibraltar</option>
                  <option <?php echo  set_select('country', 'Greece (Ελλάδα)'); ?> >Greece (Ελλάδα)</option>
                  <option <?php echo  set_select('country', 'Greenland (Kalaallit Nunaat)'); ?> >Greenland (Kalaallit Nunaat)</option>
                  <option <?php echo  set_select('country', 'Grenada'); ?> >Grenada</option>
                  <option <?php echo  set_select('country', 'Guadeloupe'); ?> >Guadeloupe</option>
                  <option <?php echo  set_select('country', 'Guam'); ?> >Guam</option>
                  <option <?php echo  set_select('country', 'Guatemala'); ?> >Guatemala</option>
                  <option <?php echo  set_select('country', 'Guernsey'); ?> >Guernsey</option>
                  <option <?php echo  set_select('country', 'Guinea (Guinée)'); ?> >Guinea (Guinée)</option>
                  <option <?php echo  set_select('country', 'Guinea-Bissau (Guiné Bissau)'); ?> >Guinea-Bissau (Guiné Bissau)</option>
                  <option <?php echo  set_select('country', 'Guyana'); ?> >Guyana</option>
                  <option <?php echo  set_select('country', 'Haiti'); ?> >Haiti</option>
                  <option <?php echo  set_select('country', 'Heard Island and McDonald Islands'); ?> >Heard Island and McDonald Islands</option>
                  <option <?php echo  set_select('country', 'Honduras'); ?> >Honduras</option>
                  <option <?php echo  set_select('country', 'Hong Kong (香港)'); ?> >Hong Kong (香港)</option>
                  <option <?php echo  set_select('country', 'Hungary (Magyarország)'); ?> >Hungary (Magyarország)</option>
                  <option <?php echo  set_select('country', 'Iceland (Ísland)'); ?> >Iceland (Ísland)</option>
                  <option <?php echo  set_select('country', 'India (भारत)'); ?> >India (भारत)</option>
                  <option <?php echo  set_select('country', 'Indonesia'); ?> >Indonesia</option>
                  <option <?php echo  set_select('country', 'Iran (‫ایران‬&lrm;)'); ?> >Iran (‫ایران‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Iraq (‫العراق‬&lrm;)'); ?> >Iraq (‫العراق‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Ireland'); ?> >Ireland</option>
                  <option <?php echo  set_select('country', 'Isle of Man'); ?> >Isle of Man</option>
                  <option <?php echo  set_select('country', 'Israel (‫ישראל‬&lrm;)'); ?> >Israel (‫ישראל‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Italy (Italia)'); ?> >Italy (Italia)</option>
                  <option <?php echo  set_select('country', 'Jamaica'); ?> >Jamaica</option>
                  <option <?php echo  set_select('country', 'Japan (日本)'); ?> >Japan (日本)</option>
                  <option <?php echo  set_select('country', 'Jersey'); ?> >Jersey</option>
                  <option <?php echo  set_select('country', 'Jordan (‫الأردن‬&lrm;)'); ?> >Jordan (‫الأردن‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Kazakhstan (Казахстан)'); ?> >Kazakhstan (Казахстан)</option>
                  <option <?php echo  set_select('country', 'Kenya'); ?> >Kenya</option>
                  <option <?php echo  set_select('country', 'Kiribati'); ?> >Kiribati</option>
                  <option <?php echo  set_select('country', 'Kosovo (Косово)'); ?> >Kosovo (Косово)</option>
                  <option <?php echo  set_select('country', 'Kuwait (‫الكويت‬&lrm;)'); ?> >Kuwait (‫الكويت‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Kyrgyzstan'); ?> >Kyrgyzstan</option>
                  <option <?php echo  set_select('country', 'Laos (ສ.ປ.ປ ລາວ)'); ?> >Laos (ສ.ປ.ປ ລາວ)</option>
                  <option <?php echo  set_select('country', 'Latvia (Latvija)'); ?>  >Latvia (Latvija)</option>
                  <option <?php echo  set_select('country', 'Lebanon (‫لبنان‬&lrm;)'); ?> >Lebanon (‫لبنان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Lesotho'); ?> >Lesotho</option>
                  <option <?php echo  set_select('country', 'Liberia'); ?> >Liberia</option>
                  <option <?php echo  set_select('country', 'Libya (‫ليبيا‬&lrm;)'); ?> >Libya (‫ليبيا‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Liechtenstein'); ?> >Liechtenstein</option>
                  <option <?php echo  set_select('country', 'Lithuania (Lietuva)'); ?> >Lithuania (Lietuva)</option>
                  <option <?php echo  set_select('country', 'Luxembourg'); ?> >Luxembourg</option>
                  <option <?php echo  set_select('country', 'Macau (澳門)'); ?> >Macau (澳門)</option>
                  <option <?php echo  set_select('country', 'Macedonia (Македонија)'); ?> >Macedonia (Македонија)</option>
                  <option <?php echo  set_select('country', 'Madagascar (Madagasikara)'); ?> >Madagascar (Madagasikara)</option>
                  <option <?php echo  set_select('country', 'Malawi'); ?> >Malawi</option>
                  <option <?php echo  set_select('country', 'Malaysia'); ?> >Malaysia</option>
                  <option <?php echo  set_select('country', 'Maldives'); ?> >Maldives</option>
                  <option <?php echo  set_select('country', 'Mali'); ?> >Mali</option>
                  <option <?php echo  set_select('country', 'Malta'); ?> >Malta</option>
                  <option <?php echo  set_select('country', 'Marshall Islands'); ?> >Marshall Islands</option>
                  <option <?php echo  set_select('country', 'Martinique'); ?> >Martinique</option>
                  <option <?php echo  set_select('country', 'Mauritania (‫موريتانيا‬&lrm;)'); ?> >Mauritania (‫موريتانيا‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Mauritius (Moris)'); ?> >Mauritius (Moris)</option>
                  <option <?php echo  set_select('country', 'Mayotte'); ?> >Mayotte</option>
                  <option <?php echo  set_select('country', 'Mexico (México)'); ?> >Mexico (México)</option>
                  <option <?php echo  set_select('country', 'Micronesia'); ?> >Micronesia</option>
                  <option <?php echo  set_select('country', 'Moldova (Republica Moldova)'); ?> >Moldova (Republica Moldova)</option>
                  <option <?php echo  set_select('country', 'Monaco'); ?> >Monaco</option>
                  <option <?php echo  set_select('country', 'Mongolia (Монгол)'); ?> >Mongolia (Монгол)</option>
                  <option <?php echo  set_select('country', 'Montenegro (Crna Gora)'); ?> >Montenegro (Crna Gora)</option>
                  <option <?php echo  set_select('country', 'Montserrat'); ?> >Montserrat</option>
                  <option <?php echo  set_select('country', 'Morocco (‫المغرب‬&lrm;)'); ?> >Morocco (‫المغرب‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Mozambique (Moçambique)'); ?> >Mozambique (Moçambique)</option>
                  <option <?php echo  set_select('country', 'Myanmar (Burma)'); ?> >Myanmar (Burma)</option>
                  <option <?php echo  set_select('country', 'Nagorno-Karabakh'); ?> >Nagorno-Karabakh</option>
                  <option <?php echo  set_select('country', 'Namibia'); ?> >Namibia</option>
                  <option <?php echo  set_select('country', 'Nauru'); ?> >Nauru</option>
                  <option <?php echo  set_select('country', 'Nepal (नेपाल)'); ?> >Nepal (नेपाल)</option>
                  <option <?php echo  set_select('country', 'Netherlands (Nederland)'); ?> >Netherlands (Nederland)</option>
                  <option <?php echo  set_select('country', 'New Caledonia (Nouvelle-Calédonie)'); ?> >New Caledonia (Nouvelle-Calédonie)</option>
                  <option <?php echo  set_select('country', 'New Zealand'); ?> >New Zealand</option>
                  <option <?php echo  set_select('country', 'Nicaragua'); ?> >Nicaragua</option>
                  <option <?php echo  set_select('country', 'Niger (Nijar)'); ?> >Niger (Nijar)</option>
                  <option <?php echo  set_select('country', 'Nigeria'); ?> >Nigeria</option>
                  <option <?php echo  set_select('country', 'Niue'); ?> >Niue</option>
                  <option <?php echo  set_select('country', 'Norfolk Island'); ?> >Norfolk Island</option>
                  <option <?php echo  set_select('country', 'North Korea (조선 민주주의 인민 공화국)'); ?> >North Korea (조선 민주주의 인민 공화국)</option>
                  <option <?php echo  set_select('country', 'Northern Mariana Islands'); ?> >Northern Mariana Islands</option>
                  <option <?php echo  set_select('country', 'Norway (Norge)'); ?> >Norway (Norge)</option>
                  <option <?php echo  set_select('country', 'Oman (‫عُمان‬&lrm;)'); ?> >Oman (‫عُمان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Pakistan (‫پاکستان‬&lrm;)'); ?> >Pakistan (‫پاکستان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Palau'); ?> >Palau</option>
                  <option <?php echo  set_select('country', 'Palestine (‫فلسطين‬&lrm;)'); ?> >Palestine (‫فلسطين‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Panama (Panamá)'); ?> >Panama (Panamá)</option>
                  <option <?php echo  set_select('country', 'Papua New Guinea'); ?> >Papua New Guinea</option>
                  <option <?php echo  set_select('country', 'Paraguay'); ?> >Paraguay</option>
                  <option <?php echo  set_select('country', 'Peru (Perú)'); ?> >Peru (Perú)</option>
                  <option <?php echo  set_select('country', 'Philippines'); ?> >Philippines</option>
                  <option <?php echo  set_select('country', 'Pitcairn Islands'); ?> >Pitcairn Islands</option>
                  <option <?php echo  set_select('country', 'Poland (Polska)'); ?> >Poland (Polska)</option>
                  <option <?php echo  set_select('country', 'Portugal'); ?> >Portugal</option>
                  <option <?php echo  set_select('country', 'Puerto Rico'); ?> >Puerto Rico</option>
                  <option <?php echo  set_select('country', 'Qatar (‫قطر‬&lrm;)'); ?> >Qatar (‫قطر‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Réunion'); ?> >Réunion</option>
                  <option <?php echo  set_select('country', 'Romania (România)'); ?> >Romania (România)</option>
                  <option <?php echo  set_select('country', 'Russia (Россия)'); ?> >Russia (Россия)</option>
                  <option <?php echo  set_select('country', 'Rwanda'); ?> >Rwanda</option>
                  <option <?php echo  set_select('country', 'Saint Barthélemy (Saint-Barthélémy)'); ?> >Saint Barthélemy (Saint-Barthélémy)</option>
                  <option <?php echo  set_select('country', 'Saint Helena'); ?> >Saint Helena</option>
                  <option <?php echo  set_select('country', 'Saint Kitts and Nevis'); ?> >Saint Kitts and Nevis</option>
                  <option <?php echo  set_select('country', 'Saint Lucia'); ?> >Saint Lucia</option>
                  <option <?php echo  set_select('country', 'Saint Martin (Saint-Martin [partie française])'); ?> >Saint Martin (Saint-Martin [partie française])</option>
                  <option <?php echo  set_select('country', 'Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)'); ?> >Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option>
                  <option <?php echo  set_select('country', 'Saint Vincent and the Grenadines'); ?> >Saint Vincent and the Grenadines</option>
                  <option <?php echo  set_select('country', 'Samoa'); ?> >Samoa</option>
                  <option <?php echo  set_select('country', 'San Marino'); ?> >San Marino</option>
                  <option <?php echo  set_select('country', 'São Tomé and Príncipe (São Tomé e Príncipe)'); ?> >São Tomé and Príncipe (São Tomé e Príncipe)</option>
                  <option <?php echo  set_select('country', 'Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)'); ?> >Saudi Arabia (‫المملكة العربية السعودية‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Senegal (Sénégal)'); ?> >Senegal (Sénégal)</option>
                  <option <?php echo  set_select('country', 'Serbia (Србија)'); ?> >Serbia (Србија)</option>
                  <option <?php echo  set_select('country', 'Seychelles'); ?> >Seychelles</option>
                  <option <?php echo  set_select('country', 'Sierra Leone'); ?> >Sierra Leone</option>
                  <option <?php echo  set_select('country', 'Singapore'); ?> >Singapore</option>
                  <option <?php echo  set_select('country', 'Sint Maarten'); ?> >Sint Maarten</option>
                  <option <?php echo  set_select('country', 'Slovakia (Slovensko)'); ?> >Slovakia (Slovensko)</option>
                  <option <?php echo  set_select('country', 'Slovenia (Slovenija)'); ?> >Slovenia (Slovenija)</option>
                  <option <?php echo  set_select('country', 'Solomon Islands'); ?> >Solomon Islands</option>
                  <option <?php echo  set_select('country', 'Somalia (Soomaaliya)'); ?> >Somalia (Soomaaliya)</option>
                  <option <?php echo  set_select('country', 'South Africa'); ?> >South Africa</option>
                  <option <?php echo  set_select('country', 'South Georgia and the South Sandwich Islands'); ?> >South Georgia and the South Sandwich Islands</option>
                  <option <?php echo  set_select('country', 'South Korea (대한민국)'); ?> >South Korea (대한민국)</option>
                  <option <?php echo  set_select('country', 'South Sudan (‫جنوب السودان‬&lrm;)'); ?> >South Sudan (‫جنوب السودان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Spain (España)'); ?> >Spain (España)</option>
                  <option <?php echo  set_select('country', 'Sri Lanka (ශ්&zwj;රී ලංකාව)'); ?> >Sri Lanka (ශ්&zwj;රී ලංකාව)</option>
                  <option <?php echo  set_select('country', 'Sudan (‫السودان‬&lrm;)'); ?> >Sudan (‫السودان‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Suriname'); ?> >Suriname</option>
                  <option <?php echo  set_select('country', 'Svalbard and Jan Mayen (Svalbard og Jan Mayen)'); ?> >Svalbard and Jan Mayen (Svalbard og Jan Mayen)</option>
                  <option <?php echo  set_select('country', 'Swaziland'); ?> >Swaziland</option>
                  <option <?php echo  set_select('country', 'Sweden (Sverige)'); ?> >Sweden (Sverige)</option>
                  <option <?php echo  set_select('country', 'Switzerland (Schweiz)'); ?> >Switzerland (Schweiz)</option>
                  <option <?php echo  set_select('country', 'Syria (‫سوريا‬&lrm;)'); ?> >Syria (‫سوريا‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Taiwan (台灣)'); ?> >Taiwan (台灣)</option>
                  <option <?php echo  set_select('country', 'Tajikistan'); ?> >Tajikistan</option>
                  <option <?php echo  set_select('country', 'Tanzania'); ?> >Tanzania</option>
                  <option <?php echo  set_select('country', 'Thailand (ไทย)'); ?> >Thailand (ไทย)</option>
                  <option <?php echo  set_select('country', 'Timor-Leste'); ?> >Timor-Leste</option>
                  <option <?php echo  set_select('country', 'Togo'); ?> >Togo</option>
                  <option <?php echo  set_select('country', 'Tokelau'); ?> >Tokelau</option>
                  <option <?php echo  set_select('country', 'Tonga'); ?> >Tonga</option>
                  <option <?php echo  set_select('country', 'Transnistria'); ?> >Transnistria</option>
                  <option <?php echo  set_select('country', 'Trinidad and Tobago'); ?> >Trinidad and Tobago</option>
                  <option <?php echo  set_select('country', 'Tristan da Cunha'); ?> >Tristan da Cunha</option>
                  <option <?php echo  set_select('country', 'Tunisia (‫تونس‬&lrm;)'); ?> >Tunisia (‫تونس‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Turkey (Türkiye)'); ?> >Turkey (Türkiye)</option>
                  <option <?php echo  set_select('country', 'Turkmenistan'); ?> >Turkmenistan</option>
                  <option <?php echo  set_select('country', 'Turks and Caicos Islands'); ?> >Turks and Caicos Islands</option>
                  <option <?php echo  set_select('country', 'Tuvalu'); ?> >Tuvalu</option>
                  <option <?php echo  set_select('country', 'U.S. Outlying Islands'); ?> >U.S. Outlying Islands</option>
                  <option <?php echo  set_select('country', 'U.S. Virgin Islands'); ?> >U.S. Virgin Islands</option>
                  <option <?php echo  set_select('country', 'Uganda'); ?> >Uganda</option>
                  <option <?php echo  set_select('country', 'Ukraine (Україна)'); ?> >Ukraine (Україна)</option>
                  <option <?php echo  set_select('country', 'United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)'); ?> >United Arab Emirates (‫الإمارات العربية المتحدة‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'United Kingdom'); ?> >United Kingdom</option>
                  <option <?php echo  set_select('country', 'United States'); ?> >United States</option>
                  <option <?php echo  set_select('country', 'Uruguay'); ?> >Uruguay</option>
                  <option <?php echo  set_select('country', 'Uzbekistan (Ўзбекистон)'); ?> >Uzbekistan (Ўзбекистон)</option>
                  <option <?php echo  set_select('country', 'Vanuatu'); ?> >Vanuatu</option>
                  <option <?php echo  set_select('country', 'Vatican City (Città del Vaticano)'); ?> >Vatican City (Città del Vaticano)</option>
                  <option <?php echo  set_select('country', 'Venezuela'); ?> >Venezuela</option>
                  <option <?php echo  set_select('country', 'Vietnam (Việt Nam)'); ?> >Vietnam (Việt Nam)</option>
                  <option <?php echo  set_select('country', 'Wallis and Futuna'); ?> >Wallis and Futuna</option>
                  <option <?php echo  set_select('country', 'Western Sahara (‫الصحراء الغربية‬&lrm;)'); ?> >Western Sahara (‫الصحراء الغربية‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Yemen (‫اليمن‬&lrm;)'); ?> >Yemen (‫اليمن‬&lrm;)</option>
                  <option <?php echo  set_select('country', 'Zambia'); ?> >Zambia</option>
                  <option <?php echo  set_select('country', 'Zimbabwe'); ?> >Zimbabwe</option>
                </select>
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
                        'value' => set_value('phno'),
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
                        'value' => set_value('mobile'),
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
                        'value' => set_value('email'),
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
                        'value' => set_value('pan'),
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
                        'value' => set_value('bank'),
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
                        'type'  => 'bank_branch',
                        'name'  => 'bank_branch',
                        'id'    => 'bank_branch',
                        'value' => set_value('bank_branch'),
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
                        'value' => set_value('accno'),
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );
                echo form_input($data);
                ?>
              </div>
            </div>



          </div><!-- col-md-6 -->

        </div><!-- panel-body -->

        <?php echo form_submit('student_admission', 'Submit','class="btn btn-primary"');?>

    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->