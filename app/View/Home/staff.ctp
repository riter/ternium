<div class="content staff">
    <div class="loraxian"></div>
    <h1>Staff Directory</h1>

    <h2>Search</h2>
    <p>Fill in first name, last name or country to search the staff directory</p>
    <?php
           echo $this->Form->create('search', array(
            'id' => 'search',
            'enctype' => 'multipart/form-data',
            'autocomplete' => 'off',
            'onSubmit'=>'return validar(this)',
            'inputDefaults' => array(
                'label' => false,
                'div' => false,
            )
        ));
        ?>
        <ul>
            <li><label for="firstname">First Name</label> <?php echo $this->Form->input('firstname', array('id'=>'firstname' )); ?> </li>
            <li><label for="lastname">Last Name</label> <?php echo $this->Form->input('lastname', array('id'=>'lastname' )); ?></li>
            <li>               
                <label for="country">Country</label>                
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
                        echo $this->Form->input('country', array('type'=>'select','label' => false,'class'=>'basic','options' => $options )); ?>
            </li>
            <select id="print" name="print" style="visibility: hidden;">
                  <option value="1">Option 1</option> 
            </select>
            <li>
                <?php 
 echo '<br><br>';
                ?>
                <?php echo $this->Form->end(array('label' => __('Search'),'style'=>'float: left; display: block;')); ?>  
            </li>      
        </ul>
        
    <!--
    <form action="">
        <ul>
            <li><label for="firstname">First Name</label><input id="firstname" name="firstname" type="text"></li>
            <li><label for="lastname">Last Name</label><input id="lastname" name="lastname" type="text"></li>
            <li>
                <label for="country">Country</label>
                <select name="country" id="country" class="basic">
                    <option value="0">Please select...</option>
                    <option value="1">Option 1</option>
                </select>
            </li>
            <li><label for="">&nbsp;</label><input type="submit" value="Search"></li>
        </ul>
    </form> 
    -->
    <div class="responsive-table">
        <div class="table">
            <div class="head col">
                <div class="row">First Name</div>
                <div class="row">Last Name</div>
                <div class="row">Phone</div>
                <div class="row">Email</div>
                <div class="row">Country</div>
            </div>
            
            <?php 
            
            if(isset($search))
            for ($i=0; $i < count($search); $i++): ?>
            <div class="col">
                <div class="row" style="cursor: pointer;" ><a onclick="show('<?php echo $i; ?>')"><?php echo $search[$i]['User']['firstname']; ?></a></div>
                <div class="row"style="cursor: pointer;" ><a onclick="show('<?php echo $i; ?>')"><?php echo $search[$i]['User']['lastname']; ?></a></div>
                <div class="row"><?php echo $search[$i]['User']['phone']; ?></div>
                <div class="row" style="text-align: center;cursor: pointer;" ><a onclick="show('<?php echo $i; ?>')"><?php echo $search[$i]['User']['email']; ?></a></div>
                <div class="row" style="text-align: center;" ><?php 
                if($search[$i]['User']['country'] !='')
                    echo $options[$search[$i]['User']['country']];
                ?></div>
            </div>
            <div class="newcontent" id="<?php echo $i;?>" style="display:none;">
			 <?php //print_r($search[$i]);?>
                
                <div class="photo">
                    <figure>
                        <label for="photo">Photo</label>
                        <?php if ($search[$i]['User']['photo'] != ""): ?>                   
                            <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/<?php echo $search[$i]['User']['photo']; ?>" height="65">
                        <?php
                            else:
                        ?>
                            <img src="<?php echo $this->webroot; ?>app/webroot/uploads/photo/avatar.png" height="65">
                        <?php
                            endif;
                        ?>
                    </figure>                                        
                </div>
                <div class="newlabel">
                   <samp>Email</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['email']; ?></samp>
                </div>
                <div class="newlabel">
                   <samp>First Name</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['firstname']; ?></samp>
                </div>
                <div class="newlabel">
                   <samp>Last Name</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['lastname']; ?></samp>
                </div>
                <div class="newlabel">
                   <samp>Phone</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['phone']; ?></samp>
                </div>
		<div class="newlabel">
                   <samp>Adress</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['adress']; ?></samp>
                </div>
                <div class="newlabel">
                   <samp>City</samp> 
                </div>
                <div class="newdata">
                    <samp><?php echo $search[$i]['User']['city']; ?></samp>
                </div>
                <div class="newlabel">
                   <samp>Country</samp> 
                </div>
                <div class="newdata">
                    <samp><?php if($search[$i]['User']['country'] !=''):
                        echo $options[$search[$i]['User']['country']];
                    else:
                        echo '<br>';
                    endif;
                        ?></samp>
                   
                </div>                              
                <div class="newlabel">
                   <samp>Created</samp> 
                </div>
                <div class="newdata">
                    <samp><?php 
                    $f= strtotime($search[$i]['User']['created']); echo date('Y/m/d',$f); ?></samp>
                </div>
                
                <div class="newlabel">
                   <samp>Notes</samp> 
                </div>
                <div class="newdata">
                    <samp><?php 
                    if($search[$i]['User']['notes'] != "")
                       echo $search[$i]['User']['notes'];
                   else
                       echo '<br>';
                    ?></samp>
                </div>               
            </div>
            <?php endfor;
                
            ?>
            
            <!--
            <div class="col">
                <div class="row">Joe</div>
                <div class="row">Smith</div>
                <div class="row">905-555-5555</div>
                <div class="row">joe@gmail.com</div>
                <div class="row">Canada</div>
            </div>
            -->
            
        </div>
    </div>
    <?php echo '<h2>'.$this->Paginator->numbers().'</h2>'; 
    ?>
</div>
<!-- ----------------------------------------------------------------------------------- -->
<script type="text/javascript">
function show(bloq) {
  /*obj = document.getElementById(bloq);
  //obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
        */
  //$('#'+ bloq).slideDown('slow')
   if ( $( "#"+bloq ).is( ":hidden" ) ) {
        $( "#"+bloq ).slideDown( "slow" );
    } else {
        $( "#"+bloq ).hide();
    }
}
</script>
<!-- ----------------------------------------------------------------------------------- -->
<aside>
    <h2>What's New</h2>
    <?php foreach ($ultimo as $ul): ?>
        <article>          
            <?php
            $time = strtotime($ul['News']['created']);
            $newformat = date('F j, Y', $time);                  
            ?>
            <a href='./news/<?php echo base64_encode($ul['News']['id']); ?> ' style="text-decoration: none;" ><h3><?php echo $newformat; ?> </h3></a>
            
            <p><?php echo substr($ul['News']['description'], 0, 54) . '...'; ?></p>
                <?php
                if ($ul['News']['files'] != "" && $ul['News']['views']== 1):
                    ?>
                    <a href="<?php echo $this->webroot; ?>uploads/news/<?php echo $ul['News']['files']; ?>" target="_blank">DOWNLOAD NOW</a>
                    <?php
                endif;
                ?>
        </article>
    <?php endforeach; ?>
</aside>
<script src="<?php echo $this->webroot; ?>js/vendor/jquery.fs.selecter.js"></script>
<script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
<script src="<?php echo $this->webroot; ?>js/main.js"></script>
<script>
   /* $('.table .col:nth-child(2n)').addClass('odd');
    $('.basic').selecter();
    */
 
</script>
