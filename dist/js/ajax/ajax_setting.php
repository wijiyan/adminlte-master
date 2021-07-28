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
		tampilSesi();
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

	function tampilSesi() {
		$.get('<?php echo base_url('Setting/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-sesi').html(data);
			refresh();
		});
	}

	var id_sesi;
	$(document).on("click", ".konfirmasiHapus-sesi", function() {
		id_sesi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSesi", function() {
		var id = id_sesi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Setting/delete'); ?>",
			data: "id_sesi=" +id_sesi
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSesi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSesi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Setting/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sesi').modal('show');
		})
	})

	$('#form-tambah-sesi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Setting/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSesi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sesi").reset();
				$('#tambah-sesi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-sesi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Setting/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSesi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sesi").reset();
				$('#update-sesi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-sesi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-sesi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

</script>