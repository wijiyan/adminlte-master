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
		tampilPemantau();
		tampilPemantauan();
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

	function tampilPemantau() {
		$.get('<?php echo base_url('Pemantauan/tampil_nama_pemantau'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pemantau').html(data);
			refresh();
		});
	}

	function tampilPemantauan() {
		$.get('<?php echo base_url('Pemantauan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pemantauan').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-pemantau", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPemantau", function() {
		var id_pemantau = id;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pemantauan/delete_pemantau'); ?>",
			data: "id=" +id_pemantau
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPemantau();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPemantau", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pemantauan/updatePemantau'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pemantau').modal('show');
		})
	})

	//SELESAI PANTAU
	$(document).on("click", ".selesai-pantau", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pemantauan/selesai'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#selesai-pantau').modal('show');
		})
	})

	$(document).on('submit', '#form-selesai-pantau', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pemantauan/ProsesSelesai'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPemantauan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-selesai-pantau").reset();
				$('#selesai-pantau').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//akhir
	$('#form-tambah-pemantau').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pemantauan/SimpanPemantau');?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPemantau();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pemantau").reset();
				$('#tambah-pemantau').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});


	$(document).on('submit', '#form-update-pemantau', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pemantauan/ProsesUpdatePemantau');?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPemantau();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pemantau").reset();
				$('#update-pemantau').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pemantau').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-pemantau').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Tambah Skrining
	$(document).on("click", ".update-skrining", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pemantauan/updateSkrining'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-skrining').modal('show');
		})
	})

	$(document).on('submit', '#form-update-skrining', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skrining/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPemantauan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-skrining").reset();
				$('#update-skrining').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#update-skrining').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

</script>