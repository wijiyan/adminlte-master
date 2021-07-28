<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	window.onload = function() {
		tampilAdmin();
		tampilWilayah();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilAdmin() {
		$.get('<?php echo base_url('Admin/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-admin').html(data);
			refresh();
		});
	}

	var id_admin;
	$(document).on("click", ".konfirmasiHapus-admin", function() {
		id_admin = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataAdmin", function() {
		var id = id_admin;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Admin/delete'); ?>",
			data: "id_admin=" +id_admin
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilAdmin();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataAdmin", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Admin/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-admin').modal('show');
		})
	})

	$('#form-tambah-admin').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Admin/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAdmin();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-admin").reset();
				$('#tambah-admin').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-admin', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Admin/prosesUpdateAdmin'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAdmin();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-admin").reset();
				$('#update-admin').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-admin').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-admin').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//wilayah
	var id_wilayah;
	$(document).on("click", ".konfirmasiHapus-wilayah", function() {
		id_wilayah = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataWilayah", function() {
		var id = id_wilayah;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Admin/deleteWilayah'); ?>",
			data: "id_wilayah=" +id_wilayah
		})
		.done(function(data) {
			$('#konfirmasiHapusWilayah').modal('hide');
			tampilWilayah();
			$('.msg').html(data);
			effect_msg();
		})
	})

	function tampilWilayah() {
		$.get('<?php echo base_url('Admin/tampilWilayah'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-wilayah').html(data);
			refresh();
		});
	}

	$('#form-tambah-wilayah').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Admin/simpanWilayah'); ?>',
			data: data
		})
		.done(function(data) {
			tampilWilayah();
		})
		e.preventDefault();
	});

</script>