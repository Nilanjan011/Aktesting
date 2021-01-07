<div class="modal fade" id="HomeCollectionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Home Collection</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="POST" action="{{ route('HomeAppointmentt') }}">
                    @csrf
                    <div class="row"> 
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
                                <label for="sel_test">Test</label>
                                <select id='sel_test' name='sel_test'class="form-control">
                                    <option value='0'>-- Select Test --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="date">Preferred Date</label>
                                <input id="date" name="PreferredDate" type="date" placeholder="Preferred Date" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="myfile">Upload Prescription</label>
                                <input type="file" class="form-control input-md" placeholder="Upload picture of your prescripiton here" id="Prescription" name="Prescription">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea id="description" class="form-control input-md" placeholder="Describe your reasoning for the appointment" name="description" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="singlebutton" style="background: #12557f;" class="new-btn-d br-2">Make An Home Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>