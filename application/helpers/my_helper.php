<?php
	// MSG
function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
	if ($content != '') {


		return  '<p class="box-msg">
		<div class="info-box alert-' .$type .'">
		<div class="info-box-icon">
		<i class="fa ' .$icon .'"></i>
		</div>
		<div class="info-box-content" style="font-size:' .$size .'">
		' .$content
		.'</div>
		</div>
		</p>';

	}
}

function show_succ_msg($content='', $size='14px') {
	if ($content != '') {
		return   '<script>
		Swal.fire({
			title: "'.$content.'",
			type: "success",
			confirmButtonClass: "btn btn-primary",
			buttonsStyling: false,
		});</script>';
	}
}

function show_err_msg($content='', $size='14px') {
	if ($content != '') {
		return "<script>
		Swal.fire({
			type: 'error',
			title: '".$content."',
			confirmButtonClass: 'btn btn-primary',
			buttonsStyling: false,
		});</script>";
	}
}

function show_err_val($content='', $size='14px') {
	if ($content != '') {
		return '<div class="alert alert-danger" role="alert">
		<h4 class="alert-heading"><i class="feather icon-alert-triangle"> Kesalahan</i></h4>
		<p class="mb-0">'.$content.'</p>
		</div>';
	}
}

	// MODAL
function show_my_modal($content='', $id='', $data='', $size='centered') {
	$_ci = &get_instance();

	if ($content != '') {
		$view_content = $_ci->load->view($content, $data, TRUE);

		return '<div class="modal fade" id="' .$id .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-' .$size .'" modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">   
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		' .$view_content.'
		</div>
		</div>
		</div>
		</div>
		</div>';
	}
}


function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
	$_ci = &get_instance();

	if ($id != '') {
		echo   '<div class="modal fade text-left" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header bg-danger white">
		<h5 class="modal-title" id="myModalLabel120">' .$title .'</h5>
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">

		<div class="row">
		<div class="col-md-6">
		<button class="btn btn-primary form-control ' .$class .'"> <i class="feather icon-check"></i> ' .$yes .'</button>
		</div>

		<div class="col-md-6">
		<button class="btn btn-danger form-control" data-dismiss="modal"> <i class="feather icon-x"></i> ' .$no .'</button>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>';
	}
}
?>