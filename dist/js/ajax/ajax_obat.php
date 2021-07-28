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
		tampilObat();
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

	function tampilObat() {
		<?php 
		if($this->userdata->level == 'admin'){ ?>
			$.get('<?php echo base_url('Obat/tampil'); ?>', function(data) {
			<?php } else if($this->userdata->level == 'pemantau'){ ?>
				$.get('<?php echo base_url('Obat/tampil_per_pemantau'); ?>', function(data) {
				<?php } ?>
				MyTable.fnDestroy();
				$('#data-obat').html(data);
				refresh();
			});
			}

			var id_obat;
			$(document).on("click", ".konfirmasiHapus-obat", function() {
				id_obat = $(this).attr("data-id");
			})
			$(document).on("click", ".hapus-dataObat", function() {
				var id = id_obat;

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Obat/delete'); ?>",
					data: "id=" +id_obat
				})
				.done(function(data) {
					$('#konfirmasiHapus').modal('hide');
					tampilObat();
					$('.msg').html(data);
					effect_msg();
				})
			})

			$(document).on("click", ".update-dataObat", function() {
				var id = $(this).attr("data-id");

				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Obat/update'); ?>",
					data: "id=" +id
				})
				.done(function(data) {
					$('#tempat-modal').html(data);
					$('#update-obat').modal('show');
				})
			})

			$('#form-tambah-obat').submit(function(e) {
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Obat/Simpan'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilObat();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-tambah-obat").reset();
						$('#tambah-obat').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$(document).on('submit', '#form-update-obat', function(e){
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: '<?php echo base_url('Obat/prosesUpdate'); ?>',
					data: data
				})
				.done(function(data) {
					var out = jQuery.parseJSON(data);

					tampilObat();
					if (out.status == 'form') {
						$('.form-msg').html(out.msg);
						effect_msg_form();
					} else {
						document.getElementById("form-update-obat").reset();
						$('#update-obat').modal('hide');
						$('.msg').html(out.msg);
						effect_msg();
					}
				})

				e.preventDefault();
			});

			$('#tambah-obat').on('hidden.bs.modal', function () {
				$('.form-msg').html('');
			})

			$('#update-obat').on('hidden.bs.modal', function () {
				$('.form-msg').html('');
			})

		</script>