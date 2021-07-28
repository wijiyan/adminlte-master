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
		tampilSasaran();
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

	function tampilSasaran() {
		$.get('<?php echo base_url('Sasaran/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-sasaran').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-sasaran", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSasaran", function() {
		var id_sasaran = id;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sasaran/delete'); ?>",
			data: "id=" +id_sasaran
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSasaran();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSasaran", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sasaran/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sasaran').modal('show');
		})
	})


	$('#form-tambah-sasaran').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sasaran/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSasaran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sasaran").reset();
				$('#tambah-sasaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-sasaran', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sasaran/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSasaran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sasaran").reset();
				$('#update-sasaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-sasaran').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-sasaran').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})


</script>