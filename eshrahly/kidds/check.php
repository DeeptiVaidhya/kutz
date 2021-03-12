<style>
.billing_det_form{
    box-shadow: 0px 3px 6px #ccc;
    border: 0px;
}

.form-control {
    border-color: #e4e4e4;
    font-weight: 600;
}
    </style>
    
    <?php 
  
    if(!empty($this->session->userdata('currency'))){
      $currency_session = $this->session->userdata('currency');
      $currency = $currency_session;
    } 
    else { 
       $currency = '₹';
    }
    $admin_url = $this->config->item('admin_url'); ?>

<!--<div class="item active inner_pages">-->
<!--     <img src="<?= base_url() ?>assets/img/cart.jpg" alt=" ">                      -->
<!--     <div class="theme-container container">-->
<!--        <div class="caption-text">-->
<!--    <div class="cart_banner">-->
<!--      <div class="inner_bg">-->
<!--      <h3>Order Preview</h3>-->
<!--      </div>-->
<!--    </div>-->
          
<!--        </div>-->
<!--     </div>-->
<!--  </div>-->

<div class="checkout checkout_inner_page">
<div class="container">
   <div class="row">
       
      <div class="col-md-6">
         <!-- Order items -->
         <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>                  
                  <th>Product</th>
                  <th>Name</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-right">Subtotal</th>
               </tr>
            </thead>
            <tbody>
               <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
               <tr>
                  <td>
                     <img class="card-img rounded-0" src="<?= $admin_url ?><?=  $item['image']; ?>"  alt="">
                      
                     </div>
                  </td>
                  <td><?php echo $item["name"]; ?></td>
                  <td class="text-center"><?= $currency ?> <?php echo $item["price"]; ?></td>
                  <td class="text-center"><?php echo $item["qty"]; ?></td>
                  <td class="text-right"><?= $currency  ?> <?php echo $item["subtotal"]; ?></td>
               </tr>
               <?php } }else{ ?>
               <tr>
                  <td colspan="5">
                     <p>No items in your cart...</p>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="3"></td>
                  <?php if($this->cart->total_items() > 0){ ?>
                  <td class="text-right">
                     <strong>Total <?php echo $this->cart->total()?> <?= $currency ?></strong>
                  </td>
                  <?php } ?>
               </tr>
            </tfoot>
         </table>
         </div>

         <!-- Shipping address -->
         <form class="form-horizontal" action="<?= base_url('login')?>" method="post">
            <div class="footBtn checkout_page">
               <a href="<?php echo base_url('cart/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
               <!--<button type="submit" name="placeOrder" value="submit" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>-->
            
           
            </div>
         </form>
      </div>
      <div class="col-md-6">
         <div class="billing_det_form">
            <form action="<?= base_url() ?>payment/Detail/Payment" method="post">
               <div class="row">
                 <div class="col-sm-6">
                     <!--   first row   -->
                     <div class="row">
                        <div class="col-sm-12">
                           <label>First Name *</label>
                           <input type="text" name="first_name" class="form-control" value="<?php echo $this->session->userdata('firstname'); ?>" >
                           <?php if(form_error('first_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('first_name') ?></div>
                           <?php } ?>
                        </div>
                        <div class="col-sm-12">
                           <label>Last Name *</label>
                           <input type="text" name="last_name" class="form-control" value="<?php echo $this->session->userdata('lastname'); ?>" >
                           <?php if(form_error('last_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('last_name') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   second row   -->
                     <!--<div class="row">-->
                     <!--   <div class="col-sm-12">-->
                     <!--      <label>COMPANY NAME (OPTIONAL)</label>-->
                     <!--      <input type="text" name="company_name" class="form-control">-->
                     <!--      <?php if(form_error('company_name')){ ?>-->
                     <!--      <div class="alert alert-danger"><?= form_error('company_name') ?></div>-->
                     <!--      <?php } ?>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <!--   third row   -->


                       <div class="row">
                        <div class="col-sm-12">
                           <div class="state_country">
                              <label>COUNTY *</label><br>
                              <select class="form-control" name="country" >
                                <option value="Afganistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bonaire">Bonaire</option>
                                 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Canary Islands">Canary Islands</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Channel Islands">Channel Islands</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos Island">Cocos Island</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote DIvoire">Cote DIvoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curaco">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor">East Timor</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Guiana">French Guiana</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="French Southern Ter">French Southern Ter</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Great Britain">Great Britain</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Hawaii">Hawaii</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="India">India</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea North">Korea North</option>
                                 <option value="Korea Sout">Korea South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Midway Islands">Midway Islands</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nambia">Nambia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherland Antilles">Netherland Antilles</option>
                                 <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                 <option value="Nevis">Nevis</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau Island">Palau Island</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Phillipines">Philippines</option>
                                 <option value="Pitcairn Island">Pitcairn Island</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of Montenegro">Republic of Montenegro</option>
                                 <option value="Republic of Serbia">Republic of Serbia</option>
                                 <option value="Reunion">Reunion</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="St Barthelemy">St Barthelemy</option>
                                 <option value="St Eustatius">St Eustatius</option>
                                 <option value="St Helena">St Helena</option>
                                 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                 <option value="St Lucia">St Lucia</option>
                                 <option value="St Maarten">St Maarten</option>
                                 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                 <option value="Saipan">Saipan</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="Samoa American">Samoa American</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Swaziland">Swaziland</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Tahiti">Tahiti</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Erimates">United Arab Emirates</option>
                                 <option value="United States of America">United States of America</option>
                                 <option value="Uraguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City State">Vatican City State</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                 <option value="Wake Island">Wake Island</option>
                                 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zaire">Zaire</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                            </div>
                           <?php if(form_error('state_country')){ ?>
                           <div class="alert alert-danger"><?= form_error('state_country') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   fourth row   -->
                     <div class="row">
                        <div class="col-sm-12">
                           <label>Shipping ADDRESS *</label>
                           <input type="text" name="street1" class="form-control"><br>
                           <?php if(form_error('street1')){ ?>
                           <div class="alert alert-danger"><?= form_error('street1') ?></div>
                           <?php  } ?>
                           <input type="text" name="street2" class="form-control street_input_tow" >
                           <?php if(form_error('street2')){ ?>
                           <div class="alert alert-danger"><?= form_error('street2') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <!--   fifth row   -->
                     <!--   sixth row   -->
                  </div>
                  <div class="col-sm-6">
                     <div class="row">
                        <div class="col-sm-12">
                           <label>POSTCODE / ZIP *</label>
                            <input type="text" name="zip_code" class="form-control" onkeyup="GetDetails()" id="txtPostalCode">
                           <?php if(form_error('zip_code')){ ?>
                           <div class="alert alert-danger"><?= form_error('zip_code') ?></div>
                           <?php  } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>PHONE *</label><br>
                           <input type="text" name="phone" class="form-control" value="<?php echo $this->session->userdata('phone'); ?>" readonly>
                           <?php if(form_error('phone')){ ?>
                           <div class="alert alert-danger"><?= form_error('phone') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="state_country">
                              <label>STATE *</label><br>

                               <select class="form-control txtState" name="state_country " id="txtState">
                            <?php  $state = $this->db->query('SELECT * FROM com_states')->result_array();

                            foreach ($state as $st) {?>
                              <option value="<?php echo $st['name']?>"><?php echo $st['name']?></option>
                                
                            <?php  } ?>

                               </select>

                                   <select class="form-control txtState" name="state_country " id="txtState">
                                     <?php  $state = $this->db->query('SELECT * FROM com_countries')->result_array();

                                     foreach ($state as $st) {?>
                                       <option value="<?php echo $st['name']?>"><?php echo $st['name']?></option>
                                         
                                     <?php  } ?>

                               </select>


                               <input type="text" id="txtCountry" class="form-control" name="state_country"/>
                            </div>
                           <?php if(form_error('state_country')){ ?>
                           <div class="alert alert-danger"><?= form_error('state_country') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>EMAIL ADDRESS *</label>
                           <input type="email" name="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                           <?php if(form_error('email')){ ?>
                           <div class="alert alert-danger"><?= form_error('email') ?></div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <label>TOWN / CITY *</label>
                           <input type="text" name="city_name" class="form-control" id="txtState">
                           <?php if(form_error('city_name')){ ?>
                           <div class="alert alert-danger"><?= form_error('city_name') ?></div>
                           <?php  } ?>
                        </div>
                     </div>
                  </div>                   
                  <br>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                      <div class="payment_btn">
                        <button class="btn btn-primary" type="submit">Payment</button>
                      </div>
                  </div>
               </div>
          </form>
           
         </div>
      </div>
   </div>
</div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT127pXDxsaFzKaG7zNFK8NXQGesUobJA"></script>
<script type="text/javascript">
    function GetDetails() {
      //alert('465441')
        var geocoder = new google.maps.Geocoder();
        var postalCode = document.getElementById("txtPostalCode").value;
        geocoder.geocode({ 'address': postalCode }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var address = results[0].formatted_address;
                var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                document.getElementById('txtCountry').value = country;
                document.getElementById('txtState').value = state;
                document.getElementById('txtCity').value = city;
            }
        });
    };
</script>
