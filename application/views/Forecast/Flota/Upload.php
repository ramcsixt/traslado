<form enctype="multipart/form-data" onsubmit="return checkSubmit();" action="<?php echo base_url("Flota/Read_csv")?>" method="POST">
	<div class="row">
		<div class="col-sm-12">
			<label>Carga de CSV</label>
			<input  class="file" id="file_csv" type="file" name="file_csv" placeholder="Carge el CSV...">
		</div>
	</div>
</form>
<script>
    $("#file_csv").fileinput({
        language: "es",
        theme: "fas",
        showUpload: true,
        dropZoneEnabled: false,
        maxFileCount: 1,
        mainClass: "input-group-sm",
        allowedFileExtensions: ["csv",],

// set to empty, null or false to disable preview for all types
        previewFileIconSettings: {
            'docx': '<i class="fas fa-file-word text-primary"></i>',
            'xlsx': '<i class="fas fa-file-excel text-success"></i>',
            'pptx': '<i class="fas fa-file-powerpoint text-danger"></i>',
            'jpg': '<i class="fas fa-file-image text-warning"></i>',
            'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
            'zip': '<i class="fas fa-file-archive text-muted"></i>',
        }
    });
    var statSend = false;
    function checkSubmit() {
        if (!statSend) {
            statSend = true;
            return true;
        } else {

            return false;
        }
    }

    function checkSubmit() {
        $("#preloader").modal("show");
        $("#modal_upload").modal("hide");
        document.getElementById("btn_send").value = "Recibiendo";
        document.getElementById("btn_send").disabled = true;
        return true;
    }
</script>
