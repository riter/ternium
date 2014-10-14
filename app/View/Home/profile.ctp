<div class="content profile">
    <div class="loraxian"></div>
    <h1>My profile</h1>
    <?php
   
    //'onSubmit'=>'return validar(this)',
        echo $this->Form->create('User', array(
            'id' => 'User',
            'enctype' => 'multipart/form-data',
            'autocomplete' => 'off',
            
            'inputDefaults' => array(
                'label' => false,
                'div' => false,
                
            )
        ));
        
         $photo= $user['User']['photo'];
         if($photo == "")
             $photo= "avatar.png";
        ?>
    
    <div id="error" class="error" style="display:none;"></div>
    <label for="photo">Photo</label>
    <div class="photo">
        <figure>
            <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/<?PHP echo $photo; ?>" id="target" height="63" width="63" alt="">
        </figure>
        <!-- <input type="file" id="imgInp"> -->
        <?php echo $this->Form->input('photo', array('id'=>'photo','type' => 'file')); ?>
    </div>
    <ul>
        <li><label for="email">Email</label>            <?php echo $this->Form->input('email', array('id'=>'email','type'=>'text', 'value'=>$user['User']['email'],'class' => 'required email' )); ?>
            <label class="error" for="email" generated="true" style="display: none" id="error" ></label>
        
        </li>
        <?php $options = array (
                              '' => 'Please Select...',
                            'AF' => 'Afghanistan',
                            'AL' => 'Albania',
                            'DZ' => 'Algeria',
                            'AS' => 'American Samoa',
                            'AD' => 'Andorra',
                            'AO' => 'Angola',
                            'AI' => 'Anguilla',
                            'AQ' => 'Antarctica',
                            'AG' => 'Antigua and Barbuda',
                            'AR' => 'Argentina',
                            'AM' => 'Armenia',
                            'AW' => 'Aruba',
                            'AU' => 'Australia',
                            'AT' => 'Austria',
                            'AZ' => 'Azerbaijan',
                            'BS' => 'Bahamas',
                            'BH' => 'Bahrain',
                            'BD' => 'Bangladesh',
                            'BB' => 'Barbados',
                            'BY' => 'Belarus',
                            'BE' => 'Belgium',
                            'BZ' => 'Belize',
                            'BJ' => 'Benin',
                            'BM' => 'Bermuda',
                            'BT' => 'Bhutan',
                            'BO' => 'Bolivia',
                            'BA' => 'Bosnia and Herzegovina',
                            'BW' => 'Botswana',
                            'BV' => 'Bouvet Island',
                            'BR' => 'Brazil',
                            'BQ' => 'British Antarctic Territory',
                            'IO' => 'British Indian Ocean Territory',
                            'VG' => 'British Virgin Islands',
                            'BN' => 'Brunei',
                            'BG' => 'Bulgaria',
                            'BF' => 'Burkina Faso',
                            'BI' => 'Burundi',
                            'KH' => 'Cambodia',
                            'CM' => 'Cameroon',
                            'CA' => 'Canada',
                            'CT' => 'Canton and Enderbury Islands',
                            'CV' => 'Cape Verde',
                            'KY' => 'Cayman Islands',
                            'CF' => 'Central African Republic',
                            'TD' => 'Chad',
                            'CL' => 'Chile',
                            'CN' => 'China',
                            'CX' => 'Christmas Island',
                            'CC' => 'Cocos [Keeling] Islands',
                            'CO' => 'Colombia',
                            'KM' => 'Comoros',
                            'CG' => 'Congo - Brazzaville',
                            'CD' => 'Congo - Kinshasa',
                            'CK' => 'Cook Islands',
                            'CR' => 'Costa Rica',
                            'HR' => 'Croatia',
                            'CU' => 'Cuba',
                            'CY' => 'Cyprus',
                            'CZ' => 'Czech Republic',
                            'CI' => 'Côte d’Ivoire',
                            'DK' => 'Denmark',
                            'DJ' => 'Djibouti',
                            'DM' => 'Dominica',
                            'DO' => 'Dominican Republic',
                            'NQ' => 'Dronning Maud Land',
                            'DD' => 'East Germany',
                            'EC' => 'Ecuador',
                            'EG' => 'Egypt',
                            'SV' => 'El Salvador',
                            'GQ' => 'Equatorial Guinea',
                            'ER' => 'Eritrea',
                            'EE' => 'Estonia',
                            'ET' => 'Ethiopia',
                            'FK' => 'Falkland Islands',
                            'FO' => 'Faroe Islands',
                            'FJ' => 'Fiji',
                            'FI' => 'Finland',
                            'FR' => 'France',
                            'GF' => 'French Guiana',
                            'PF' => 'French Polynesia',
                            'TF' => 'French Southern Territories',
                            'FQ' => 'French Southern and Antarctic Territories',
                            'GA' => 'Gabon',
                            'GM' => 'Gambia',
                            'GE' => 'Georgia',
                            'DE' => 'Germany',
                            'GH' => 'Ghana',
                            'GI' => 'Gibraltar',
                            'GR' => 'Greece',
                            'GL' => 'Greenland',
                            'GD' => 'Grenada',
                            'GP' => 'Guadeloupe',
                            'GU' => 'Guam',
                            'GT' => 'Guatemala',
                            'GG' => 'Guernsey',
                            'GN' => 'Guinea',
                            'GW' => 'Guinea-Bissau',
                            'GY' => 'Guyana',
                            'HT' => 'Haiti',
                            'HM' => 'Heard Island and McDonald Islands',
                            'HN' => 'Honduras',
                            'HK' => 'Hong Kong SAR China',
                            'HU' => 'Hungary',
                            'IS' => 'Iceland',
                            'IN' => 'India',
                            'ID' => 'Indonesia',
                            'IR' => 'Iran',
                            'IQ' => 'Iraq',
                            'IE' => 'Ireland',
                            'IM' => 'Isle of Man',
                            'IL' => 'Israel',
                            'IT' => 'Italy',
                            'JM' => 'Jamaica',
                            'JP' => 'Japan',
                            'JE' => 'Jersey',
                            'JT' => 'Johnston Island',
                            'JO' => 'Jordan',
                            'KZ' => 'Kazakhstan',
                            'KE' => 'Kenya',
                            'KI' => 'Kiribati',
                            'KW' => 'Kuwait',
                            'KG' => 'Kyrgyzstan',
                            'LA' => 'Laos',
                            'LV' => 'Latvia',
                            'LB' => 'Lebanon',
                            'LS' => 'Lesotho',
                            'LR' => 'Liberia',
                            'LY' => 'Libya',
                            'LI' => 'Liechtenstein',
                            'LT' => 'Lithuania',
                            'LU' => 'Luxembourg',
                            'MO' => 'Macau SAR China',
                            'MK' => 'Macedonia',
                            'MG' => 'Madagascar',
                            'MW' => 'Malawi',
                            'MY' => 'Malaysia',
                            'MV' => 'Maldives',
                            'ML' => 'Mali',
                            'MT' => 'Malta',
                            'MH' => 'Marshall Islands',
                            'MQ' => 'Martinique',
                            'MR' => 'Mauritania',
                            'MU' => 'Mauritius',
                            'YT' => 'Mayotte',
                            'FX' => 'Metropolitan France',
                            'MX' => 'Mexico',
                            'FM' => 'Micronesia',
                            'MI' => 'Midway Islands',
                            'MD' => 'Moldova',
                            'MC' => 'Monaco',
                            'MN' => 'Mongolia',
                            'ME' => 'Montenegro',
                            'MS' => 'Montserrat',
                            'MA' => 'Morocco',
                            'MZ' => 'Mozambique',
                            'MM' => 'Myanmar [Burma]',
                            'NA' => 'Namibia',
                            'NR' => 'Nauru',
                            'NP' => 'Nepal',
                            'NL' => 'Netherlands',
                            'AN' => 'Netherlands Antilles',
                            'NT' => 'Neutral Zone',
                            'NC' => 'New Caledonia',
                            'NZ' => 'New Zealand',
                            'NI' => 'Nicaragua',
                            'NE' => 'Niger',
                            'NG' => 'Nigeria',
                            'NU' => 'Niue',
                            'NF' => 'Norfolk Island',
                            'KP' => 'North Korea',
                            'VD' => 'North Vietnam',
                            'MP' => 'Northern Mariana Islands',
                            'NO' => 'Norway',
                            'OM' => 'Oman',
                            'PC' => 'Pacific Islands Trust Territory',
                            'PK' => 'Pakistan',
                            'PW' => 'Palau',
                            'PS' => 'Palestinian Territories',
                            'PA' => 'Panama',
                            'PZ' => 'Panama Canal Zone',
                            'PG' => 'Papua New Guinea',
                            'PY' => 'Paraguay',
                            'YD' => 'People\'s Democratic Republic of Yemen',
                            'PE' => 'Peru',
                            'PH' => 'Philippines',
                            'PN' => 'Pitcairn Islands',
                            'PL' => 'Poland',
                            'PT' => 'Portugal',
                            'PR' => 'Puerto Rico',
                            'QA' => 'Qatar',
                            'RO' => 'Romania',
                            'RU' => 'Russia',
                            'RW' => 'Rwanda',
                            'RE' => 'Réunion',
                            'BL' => 'Saint Barthélemy',
                            'SH' => 'Saint Helena',
                            'KN' => 'Saint Kitts and Nevis',
                            'LC' => 'Saint Lucia',
                            'MF' => 'Saint Martin',
                            'PM' => 'Saint Pierre and Miquelon',
                            'VC' => 'Saint Vincent and the Grenadines',
                            'WS' => 'Samoa',
                            'SM' => 'San Marino',
                            'SA' => 'Saudi Arabia',
                            'SN' => 'Senegal',
                            'RS' => 'Serbia',
                            'CS' => 'Serbia and Montenegro',
                            'SC' => 'Seychelles',
                            'SL' => 'Sierra Leone',
                            'SG' => 'Singapore',
                            'SK' => 'Slovakia',
                            'SI' => 'Slovenia',
                            'SB' => 'Solomon Islands',
                            'SO' => 'Somalia',
                            'ZA' => 'South Africa',
                            'GS' => 'South Georgia and the South Sandwich Islands',
                            'KR' => 'South Korea',
                            'ES' => 'Spain',
                            'LK' => 'Sri Lanka',
                            'SD' => 'Sudan',
                            'SR' => 'Suriname',
                            'SJ' => 'Svalbard and Jan Mayen',
                            'SZ' => 'Swaziland',
                            'SE' => 'Sweden',
                            'CH' => 'Switzerland',
                            'SY' => 'Syria',
                            'ST' => 'São Tomé and Príncipe',
                            'TW' => 'Taiwan',
                            'TJ' => 'Tajikistan',
                            'TZ' => 'Tanzania',
                            'TH' => 'Thailand',
                            'TL' => 'Timor-Leste',
                            'TG' => 'Togo',
                            'TK' => 'Tokelau',
                            'TO' => 'Tonga',
                            'TT' => 'Trinidad and Tobago',
                            'TN' => 'Tunisia',
                            'TR' => 'Turkey',
                            'TM' => 'Turkmenistan',
                            'TC' => 'Turks and Caicos Islands',
                            'TV' => 'Tuvalu',
                            'UM' => 'U.S. Minor Outlying Islands',
                            'PU' => 'U.S. Miscellaneous Pacific Islands',
                            'VI' => 'U.S. Virgin Islands',
                            'UG' => 'Uganda',
                            'UA' => 'Ukraine',
                            'SU' => 'Union of Soviet Socialist Republics',
                            'AE' => 'United Arab Emirates',
                            'GB' => 'United Kingdom',
                            'US' => 'United States',
                            'ZZ' => 'Unknown or Invalid Region',
                            'UY' => 'Uruguay',
                            'UZ' => 'Uzbekistan',
                            'VU' => 'Vanuatu',
                            'VA' => 'Vatican City',
                            'VE' => 'Venezuela',
                            'VN' => 'Vietnam',
                            'WK' => 'Wake Island',
                            'WF' => 'Wallis and Futuna',
                            'EH' => 'Western Sahara',
                            'YE' => 'Yemen',
                            'ZM' => 'Zambia',
                            'ZW' => 'Zimbabwe',
                            'AX' => 'Åland Islands',
                        );                        
                        ?>
        <li><label for="first_name">First Name</label>  <?php echo $this->Form->input('firstname', array('id'=>'firstname','value'=> $user['User']['firstname'],'class' => 'required' )); ?></li>
        <li><label for="last_name">Last Name</label>    <?php echo $this->Form->input('lastname', array('id'=>'lastname', 'value'=> $user['User']['lastname'],'class' => 'required' )); ?></li>
        <li><label for="phone">Phone</label>            <?php echo $this->Form->input('phone', array('id'=>'phone', 'type'=>'text', 'value'=> $user['User']['phone']  )); ?></li>
        <li><label for="address">Address</label>        <?php echo $this->Form->input('adress', array('id'=>'adress', 'value'=> $user['User']['adress']  )); ?></li>
        <li><label for="city">City</label>              <?php echo $this->Form->input('city', array('id'=>'city', 'value'=> $user['User']['city'] )); ?></li>
        <li><label for="Country">Country</label>        <?php echo $this->Form->input('country', array('type'=>'select','label' => false,'options' => $options, 'selected' => $user['User']['country'] )); ?> </li>
    </ul>
    <ul>
        <li><label for="password">New Password</label><?php echo $this->Form->input('password', array('id' => 'password' )); ?><span>Type your new password here</span></li>
        <li><label for="">&nbsp;</label><input type="password" id="confirm_password" name="confirm_password" /><span>Re-type your new password here</span></li>
        
    </ul>
    <ul>
        <li><label for="password">Notes</label><?php echo $this->Form->textarea('notes', array('id' => 'notes', 'rows' => '4', 'cols' => 'auto','value' => $user['User']['notes'],'style'=>'width: 298px; height: 95px;')); ?> </li>
    </ul>
    <ul>
        <li>
             <?php
        echo $this->Form->end(array(
            'label' => __('Update Profile'),
           
           
            ));
        ?>
        </li>
    </ul>
    <script language="javascript"> 
//Función que verifica campos del formulario vacíos
function validar(f) {
if (f.email.value=="") {
    alert("Por favor escriba su Nombre completo");
    f.email.focus();
    return false;
    }else{
       if(f.email.value != ""){
           //alert("Por favor esc");
           //if(f.email.value )
           f.email.focus();
           //f.email.className = 'error';
           f.email.style.border = "medium solid red";
           return false;
       } 
    }
    

}
</script> 
 

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->webroot; ?>js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
<script src="<?php echo $this->webroot; ?>js/main.js"></script>
<script src="<?php echo $this->webroot; ?>js/jquery.validate.js"></script>
<script src="<?php echo $this->webroot; ?>js/jquery.validate-min.js"></script>
<script>
    $('.table .col:nth-child(2n)').addClass('odd');
</script>

<style type="text/css">
    .error{
     color: #FFF;
     background-color: #C83139;
    }
</style>

<script>  
  $(document).ready(function() {
        $("#User").validate({
            rules: {
                firstname: {
                    required : true,                
                    minlength: 5
                },
                lastname: {
                    required : true,                
                    minlength: 5
                },
                phone: {
                    required : true, 
                    number:true
                },
                adress: {
                    required : true                           
                },
                city: {
                    required : true                                    
                },
                email: {
                    required : true,                
                    email: true
                },
                username: {
                    required : true,                
                    minlength: 5
                },          
                password: {
                    required : true,
                    minlength: 6
                },
                confirm_password: {
                    minlength: 6,
                    equalTo: "#password"
                },
                photo: {
                    accept: "jpg|gif|png"
                }

            },
            invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                 if (errors) {
                    var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("#error").html(message).show();
                } else {
                    $("#error").hide();
                }
            
            }
            
        });
    });
    
    
   /*
       $(document).ready(function(){  
        $("#User").submit(function () {  
            if($("#email").val().length < 4) {  
                $("#email").style.border = "medium solid red";
                alert("El nombre debe tener más de 3 caracteres");  
                return false;  
            }  
            if($("#apellidos").val().length < 4) {  
                alert("Los apellidos deben tener más de 3 caracteres");  
                return false;  
            }  
            if($("#telefono").val().length < 4 || isNaN($("#telefono").val())) {  
                alert("El teléfono debe tener más de 3 caracteres y solo números");  
                return false;  
            }  
            if($("#email").val().length < 1) {  
                alert("La dirección e-mail es obligatoria");  
                return false;  
            }  
            if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {  
                alert("La dirección parece incorrecta");  
                return false;  
            }  
            if($("#localidad").val().length < 1) {  
                alert("La localidad es obligatoria");  
                return false;  
            }  
            if($("#provincia option:selected").val() == "") {  
                alert("La provincia es obligatoria");  
                return false;  
            }  
            if($("#localidad").val().length < 1) {  
                alert("La localidad es obligatoria");  
                return false;  
            }  
            if($("#boletin").is(':checked')) { } else {  
                alert("Indique si desea apuntarse al boletín de noticias");  
                return false;  
            }  
            if($("#visitas").is(':checked')) { } else {  
                alert("Indique cada cuanto nos visitas");  
                return false;  
            }  
            return false;  
        });  
    }); 
    */
</script>

