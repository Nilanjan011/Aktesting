<div class="col-lg-6 col-md-6" id="homeCollectionForm" style="display: none">
					<div class="well-block">
                        <div class="well-title">
                            <h2>Book an Home Collection</h2>
                        </div>
                        <form action="{{ route('homeCollection')}}" method="POST" enctype='multipart/form-data'>
    						@csrf
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input id="h_name" name="name" type="text" placeholder="Name" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input id="h_email" name="email" type="text" placeholder="E-Mail" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="date">Preferred Date</label>
                                        <input id="h_date" name="PreferredDate" type="date" placeholder="Preferred Date" class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Select Basic -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="time">Gender</label>
                                        <select id="time" name="Gender" class="form-control">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                            <option value="o">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="sel_depart">Department</label>
                                        <select id='sel_depart' name="sel_depart" class="form-control">
                                            <option value="Choose Department">Choose Department</option>
											<option value="Gynacology">Gynacology</option>
											<option value="Dermatologist">Dermatologist</option>
											<option value="Orthology">Orthology</option>
											<option value="Anesthesiology">Anesthesiology</option>
											<option value="Ayurvedic">Ayurvedic</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="sel_test">Test</label>
                                        <select id='sel_test' name='sel_test'class="form-control">
                                            <option value='0'>-- Select Test --</option>
                                        </select>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="dob">DOB</label>
                                        <input id="dob" name="dob" type="date" placeholder="Date of Birth" class="form-control input-md">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
										<label for="myfile">Upload Prescription</label>
										<input type="file" class="form-control input-md" placeholder="Upload picture of your prescripiton here" id="Prescription" name="Prescription">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
										<label for="myfile">Contact No</label>
										<input type="number" class="form-control input-md" placeholder="Enter your phone number" id="Contact" name="Contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
										<label for="myfile">Pin No</label>
										<input type="number" class="form-control input-md" placeholder="Enter your Pin number" id="pin" name="pin">
                                        <span id="error_pin"></span>
                                    </div>
                                </div>

								<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="address">Address</label>
										<textarea id="address" class="form-control input-md" placeholder="Enter your Address" name="address" rows="3" cols="50"></textarea>
                                    </div>
                                </div>
                                
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="description">Description</label>
										<textarea id="description" class="form-control input-md" placeholder="Describe your reasoning for the appointment" name="description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="new-btn-d br-2">Make An Appointment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
				</div>