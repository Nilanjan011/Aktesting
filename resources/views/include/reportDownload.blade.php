<div class="modal fade" id="modalReportDownloadForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="{{ route('Download.Report')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <!-- Form start -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="name">Apointment Id</label>
                                <input id="ApointmentId" name="ApointmentId" type="text" placeholder="Apointment Id" class="form-control input-md">
                                <span id="error_report"></span>
                            </div>
                        </div>
                        <!-- Text input-->
                        
                        

                        <!-- Button -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <button id="btn-down" name="singlebutton" style="background: #12557f;" class="new-btn-d br-2">Download Report</button>
                            </div>
                        </div>
                    </div>
                </form>
        <!-- form end -->
        </div>
        </div>
    </div>
</div>
