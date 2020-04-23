<div class="container-fluid">
<form id="form_upload" target="popup" method="POST">

		<div class="row">
			<div class="col-sm-3">
				<label>Sede (*)</label>
				<select id="cit" class="form-control" required name="sxUsrCitl">
					<option value="">Seleccione Sede...</option>
					<?php foreach($sede as $sd){?>
						<option value="<?php echo $sd->idbranch?>"><?php echo $sd->nombre?></option>
					<?php }?>
				</select>
			</div>
			<div class="col-sm-3">
				<label>Fecha Inicio</label>
				<input id="uda" name="params[rdav]" autocomplete="off" required class="form-control" placeholder="20200319">
			</div>
			<div class="col-sm-3">
				<label>Fecha Fin</label>
				<input id="udabis" name="params[rdab]" autocomplete="off" required class="form-control" placeholder="20400319">
			</div>
			<div class="col-sm-3">
				<label>&nbsp;</label><br>
				<button class="btn btn-outline-info btn-sm" style="width: 100%" type="submit"><i class="fas fa-retweet"></i>&nbsp;Solicitar Json</button>
			</div>
		</div>

	<input name="sxAppKey" hidden value="105051584627769544">
	<input name="sxUsrFir" hidden value="322">

	<input name="pgm" hidden value="ru09">
	<input name="appWin" hidden value="zYENG84xL2ZbMoQ0">

	<input name="params[ftyp]" hidden value="">
	<input name="params[rtiv]" hidden value="0000">
	<input name="params[rtib]" hidden value="2359">
	<input name="preventStopProgress" hidden value="true">
	<input name="params[cit]" id="uci" hidden value="42188">
	<input name="sxtnr" hidden value="1584627787321">
</form>
<form enctype="multipart/form-data" onsubmit="return checkSubmit();" action="<?php echo base_url("Devolucion/Read_json")?>" method="POST">
	<div class="row">
		<input hidden name="branch" id="branch">
		<div class="col-sm-12">
			<label>Carga de Json</label>
			<input class="form-control" type="file" id="file_json" name="file_json" placeholder="Carge el Json...">
		</div>
	</div>
</form>
</div>
<script>
    $("#file_json").fileinput({
        language: "es",
        theme: "fas",
        showUpload: true,
        dropZoneEnabled: false,
        maxFileCount: 1,
        mainClass: "input-group-sm",
        allowedFileExtensions: ["json"],

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

    var start = new Lightpick({
        field: document.getElementById('uda'),

        format: "YYYYMMDD",
		dropdowns:{
            years: {
                min: 2010,
                max: 2090
            },
            months: true,
		}
    });

    var end = new Lightpick({

        field: document.getElementById('udabis'),
        format: "YYYYMMDD",
        dropdowns:{
            years: {
                min: 2010,
                max: 2090
            },
            months: true,
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
        document.getElementById("btn_send").value = "Resibiendo";
        document.getElementById("btn_send").disabled = true;
        return true;
    }

    $('#cit').change(function(){
        var cit = $("#cit").val();
        $("#uci").val(cit);
        $("#uci").html(cit);

        $("#branch").val(cit);
        $("#branch").html(cit);

        $('#form_upload').attr('action', 'https://office.sixt.com/php/rentalutilitiesoffice/ru09.search?uci='+cit);
    });

    $(document).on('click', '#btn_send', function (e) {
        setTimeout(function() {
            document.getElementById("btn_send").disabled = true;
        },2000);
    });
</script>
