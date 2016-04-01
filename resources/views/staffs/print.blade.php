<!-- ############################################################# -->
	<!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add New Staff</h4>
                </div>
                <div class="modal-body">
                    <form role="form" class="form_add">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_NAME" placeholder="Fullname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_DEPT" placeholder="Department" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_YONG" placeholder="Yong">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_MOBILE" placeholder="Mobile" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_COM_PHONE" placeholder="Company phone number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ST_EMAIL" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            	<div class="col-xs-3">
									<img src="../img/please_wait.png"  id="PHOTO_IMG" data-id="PHOTO_IMG" style="width: 100px;">
                            	</div>
                            	<div class="col-xs-9">
                            		<input id="upload" type="file" value="upload"/>
									<input type="hidden" id="PHOTO" data-id="PHOTO" />
									<input type="hidden" id="FILE_PATH" data-id="FILE_PATH" />
                            	</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="bt_add">Add</button>
                </div>
            </div>
        </div>
    </div>
<!-- ############################################################# -->
