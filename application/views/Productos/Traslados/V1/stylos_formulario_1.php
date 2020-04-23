<style>
#map {
	height: 350px;
	width: 100%;
}

.form-control {
	display: block;
	width: 100%;
	height: calc(2.5em + .75rem + 2px);
	padding: .375rem .75rem;
	font-size: 16px;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	/* background-color: #f1f1f1; */
	background-clip: padding-box;
	border-bottom: 1px solid #ced4da;
	border-top: 0px solid #ced4da;
	border-right: 0px;
	border-left: 0px;
	border-bottom: 0px;
	border-radius: 0px;
	transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

a[href^="http://maps.google.com/maps"],
a[href^="https://maps.google.com/maps"],
a[href^="https://www.google.com/maps"] {
	display: none !important;
}

.gm-bundled-control .gmnoprint {
	display: block;
}

.gmnoprint:not(.gm-bundled-control) {
	display: none;
}

.pac-container:after {
	content: none !important;
}

::-webkit-input-placeholder {
	font-size: 16px;
}

.form-control:focus {
	color: #495057;
	background-color: #fff;

	outline: 0;

	box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0);
}
.input-group-text {
	display: -ms-flexbox;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	padding: .375rem .75rem;
	margin-bottom: 0;
	font-size: 1rem;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	text-align: center;
	white-space: nowrap;
	background-color: #f1f1f1;
	border: 0px solid #ced4da;
	border-radius: .25rem;
}

.btn-warning {
	color: #212529;
	background-color: #f58634;
	border-color: #f58634;
}

.card {
	position: relative;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-direction: column;
	flex-direction: column;
	min-width: 0;
	word-wrap: break-word;
	background-color: #fff;
	background-clip: border-box;
	border: 1px solid rgba(0, 0, 0, 0.125);
	border-radius: 0.25rem;

}

.centrado {
	width: 630px;
	position: absolute;
	height: 760px;
	top: 50%;
	margin-top: -380px;
	left: 50%;
	margin-left: -315px;
}

.input-group {
	position: relative;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	-ms-flex-align: stretch;
	align-items: stretch;
	width: 100%;
	border: 1px solid #b1b1b1;
}

.pac-container {
	background-color: #fff;
	position: absolute !important;
	z-index: 99999;
	border-radius: 2px;
	border-top: 1px solid #d9d9d9;
	font-family: Arial, sans-serif;
	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	overflow: hidden;
}

.datepickers-container {
	z-index: 99999;
}

.btn-geo:focus, .btn.focus {
	outline: 0;
	background: #ffffff;
	box-shadow: none;
	color: red;
}

.bootstrap-tagsinput .tag {
	margin-right: 2px;
	color: white;
	background: #3b78ad;
	font-size: 12px;
	border-radius: 5px;
}

.bootstrap-tagsinput {
	background-color: #fff;
	border: 1px solid #ccc;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	display: inline-block;
	padding: 4px 6px;
	color: #555;
	vertical-align: middle;
	border-radius: 4px;
	max-width: 100%;
	line-height: 50px;
	cursor: text;
	width: 100%;
}

.bootstrap-tagsinput {
	background-color: #fff;
	border: 1px solid #ccc;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	display: inline-block;
	padding: 4px 6px;
	color: #555;
	vertical-align: middle;
	border-radius: 4px;
	max-width: 100%;
	line-height: 22px;
	cursor: text;
	width: 100%;
}

.datepicker-inline .datepicker {
	border-color: #d7d7d7;
	margin: 0px auto;
	box-shadow: none;
	position: static;
	left: auto;
	right: auto;
	opacity: 1;
	-webkit-transform: none;
	transform: none;
}
.sw-theme-circles > ul.step-anchor > li.active > a {
	border-color: #f58634;
	color: #1f1f1f;
	background: #f58634;
}
.sw-theme-circles > ul.step-anchor > li.active > a > small {
	color: #f58634;
}
.sw-theme-circles > ul.step-anchor > li.done > a {
	border-color: #f5f5f5;
	color: #bbb;
	background: #f5f5f5;
}
.sw-theme-circles > ul.step-anchor > li.done > a > small {
	color: #cccccc;
}
.btn-outline-secondary {
	color: #f58634;
	border-color: #f58634;
}
.btn-outline-secondary:hover {
	color: #f58634;
	background-color: #ffffff;
	border-color: #f58634;
}
.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active, .show > .btn-outline-secondary.dropdown-toggle {
	color: #fff;
	background-color: #f58634;
	border-color: #f58634;
}
.btn-outline-secondary:focus, .btn-outline-secondary.focus {
	box-shadow: 0 0 0 0.2rem rgb(255, 208, 173);
}
.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
	color: #6c757d;
	background-color: transparent;
	border-color: #6c757d;
}
.sw-theme-circles > ul.step-anchor > li {
	border: none;
	margin-left: auto;
	z-index: 98;
}
.btn-circle {
	display: inline-block;
	font-weight: 400;
	color: white;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-color: #f58634;
	border: 1px solid transparent;
	padding: 2px 18px;
	font-size: 12px;
	line-height: 1.5;
	border-radius: 15.25rem;
	transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
