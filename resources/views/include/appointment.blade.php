<div class="col-lg-6 col-md-6" id="appointmentForm" style="display: block">
					<div class="well-block">
                        <div class="well-title">
                            <h2>Book an Appointment</h2>
                        </div>
                        <form action="{{ route('appointment')}}" method="POST" enctype='multipart/form-data'>
    						@csrf
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="date">Preferred Date</label>
                                        <input id="date" name="PreferredDate" type="date" placeholder="Preferred Date" class="form-control input-md">
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
                                        <label class="control-label" for="appointmentfor">Department</label>
                                        <select id="appointmentfor" name="appointmentfor" class="form-control">
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