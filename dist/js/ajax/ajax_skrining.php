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
		tampilSkrining();
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

	function tampilSkrining() {
		$.get('<?php echo base_url('Skrining/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-skrining').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-skrining", function() {
		id_skrining = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSkrining", function() {
		var id = id_skrining;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Skrining/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSkrining();
			$('.msg').html(data);
			effect_msg();
		})
	})


</script>