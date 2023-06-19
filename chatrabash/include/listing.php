<?php
if (isset($_SESSION['USER_ID'])) {
?>
<link rel="stylesheet" href="../assets/css/aos.min.css">
<link rel="stylesheet" href="../assets/css/animate.min.css">
    <section class="py-5">
        <div class="container">
            <div class="card border-0" style="box-shadow: 20px 4px 20px 4px rgba(255,210,0,0.17);">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Add New property</p>
                </div>
                <div class="card-body">
                    <form action="include/listing_insert.php" method="post" enctype="multipart/form-data" id="demo"> <!--onsubmit="return confirm('Are you sure you want to submit this form? No edit option');" -->
                        <div class="mb-3">
                            <label class="form-label" for="address"><strong>Property Name</strong><br>
                            </label>
                        <input class="form-control" type="text" id="address" placeholder="Mention house name" name="propertyName"required="true">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address"><strong>Property Monthly Rate</strong><br>
                            </label>
                        <input class="form-control" type="text" id="rent" placeholder="Monthly Rent" name="rent"required="true">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Property Type</strong><br></label><select name="propertyType" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Single Bed" selected="">Single Bed</option>
                                            <option value="Single Bedroom">Double Bed</option>
                                            <option value="Single Bedroom">Triple Bed</option>
                                            <option value="Flat">Flat </option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Gender</strong><br></label><select name="gender" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Male" selected="">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="country"><strong>Proximity to school</strong><br></label><select name="proximity" class="form-select">
                                        <optgroup label="Close to University ">
                                            <option value="Fairly Close to" selected="">Fairly Close to</option>
                                            <option value="About 2km walk">About 2km walk</option>
                                            <option value="More than 2km">More than 2km</option>
                                            <option value="Far from university">Far from university</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>University Name</strong><br></label><select name="uniName" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Green University of Bangladesh">Green University of Bangladesh</option>
                                            <option value="North South University" selected="">North South University</option>
                                            <option value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                            <option value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                            <option value="University of Asia Pacific">University of Asia Pacific</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="country"><strong>Choose Location</strong><br></label><select name="uniLocation" class="form-select">
                                        <optgroup label="Area ">
                                            <option value="Mirpur" selected="">Mirpur</option>
                                            <option value="Bashundhara">Bashundhara</option>
                                            <option value="Farmgate">Farmgate</option>
                                            <option value="Mohammadpur">Mohammadpur</option>
                                            <option value="Begum Rokeya Sarani">Begum Rokeya Sarani</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                        </div>
                        <div class="row">
                            <strong>Map Info</strong>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Latitude</strong><br></label><input class="form-control" type="text" id="latitude" placeholder="" name="latitude"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Longitude</strong><br></label><input class="form-control" type="text" id="longitude" placeholder="" name="longitude"></div>
                            </div>
                        </div>

                        <div class="mb-3"><label class="form-label" for="address"><strong>Full Address (road- house number- near by&nbsp;area)</strong><br></label>
                        <input class="form-control" type="textarea"required="true" id="address-1" placeholder="Road number: 11, house: 34/B Mirpur-10 Near by: Shaali Market" name="address"></div>
                        <div style="margin-top: 20px;"><label class="form-label" for="tra"><strong>Description</strong><br></label><textarea name="description" class="form-control form-control" id="tra" rows="8"></textarea></div>
                        <div style="margin-top: 20px;"><label class="form-label" for="tra"><strong>Gallery</strong><br></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px;margin-bottom: 5px;"><label class="form-label" for="tra">Photos<br></label>
                            <input class="form-control" type="file" multiple accept="image/*" name="images[]" required="true"></div>
                        </div>
                        <div style="margin-top: 20px;"><label class="form-label"><strong>Available Services Or Amenities</strong><br></label></div>
                        <section>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-14" value="water"><label class="form-check-label" for="formCheck-14"><span style="color: rgb(0, 0, 0);">Water</span><br></label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-15" value="electricity"><label class="form-check-label" for="formCheck-15">Electricity</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-13" value="maintenace"><label class="form-check-label" for="formCheck-13">Maintenace</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-4" value="security services"><label class="form-check-label" for="formCheck-4">Security Services</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-5" value="wifi"><label class="form-check-label" for="formCheck-5">WiFi</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-6" value="furniture"><label class="form-check-label" for="formCheck-6">Furniture</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-1" value="ac installed"><label class="form-check-label" for="formCheck-1">AC Installed</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-2" value="foods"><label class="form-check-label" for="formCheck-2">Foods</label></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="form-check"><input class="form-check-input" name="facilities[]" type="checkbox" id="formCheck-3" value="garbage"><label class="form-check-label" for="formCheck-3">Garbage</label></div>
                            </div>
                        </section>
                        <div style="margin-top: 20px;"><label class="form-label" for="tra"><strong>Rules</strong><br></label><textarea class="form-control form-control" name="rules" id="tra-1" rows="4" placeholder="If any?"></textarea></div>
                        <strong style="font-size:30px;">payment Section</strong><br />
                        <div class="mb-3"><label class="form-label" for="address"><strong>Phone number</strong><br></label><input class="form-control" type="text" id="address" placeholder="+880XXXXXXXXXX" name="phoneNumber" required="true"></div>




                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="city"><strong>Payment Method</strong><br></label><select name="paymentMethod" class="form-select">
                                        <optgroup label="Select Property">
                                            <option value="Bkash" selected="">Bkash</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Nagad">Nagad </option>
                                            <option value="Upay">Upay </option>
                                        </optgroup>
                                    </select></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Transaction ID</strong><br></label><input class="form-control" type="text" id="address" placeholder="#xxxxxxxxxxxx" name="transactionId"></div>
                            </div>

                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Time</strong><br></label><input class="form-control" type="text" id="address" placeholder="12:00 AM/PM, Date/Month/Year" name="time"></div>
                            </div>
                        </div>

                        <div class="mb-3" style="margin-top: 20px;">
                        <input class="btn btn-secondary" type="submit" name="submit" value="submit Request">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container shadow-lg">
            <?php
            } else {
                echo "<div class='shadow-lg' style='background-color: #6c757d;'>
                            <span class=' fs-1 shadow-lg d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center' data-aos='fade-down' style='height: 150px;min-height: 150px;border-bottom: 4px solid #f6c23e ;'>
                            <em class='pulse animated infinite' style='text-shadow: 5px 7px 8px rgb(238,236,228);'> <strong style='color: white'>Login or Singup for Listing</strong><br></em></span> 
                            <p style='margin-top: 20%'>
                            
                            </p>
                      </div>";
            }
            ?>
        </div>
    </section>
<script src="../assets/js/aos.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1."></script>
<script src="../assets/js/jquery.min.js"></script>
