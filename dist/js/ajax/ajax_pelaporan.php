<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": true
	});

	window.onload = function() {
		$('#tgl_lahir').on('change', function() {
			var dob = new Date(this.value);
			var today = new Date();
			var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
			$('#umur').val(age);
			$('#umur2').val(age+ ' tahun');
		});

		<?php if($this->userdata->level == 'admin'){?>
			document.getElementById("kota").disabled ='true';
			document.getElementById("kec").disabled ='true';
			document.getElementById("kel").disabled ='true';
			document.getElementById("rt_domisili").disabled ='true';
			document.getElementById("rw_domisili").disabled ='true';
			document.getElementById("alamat_domisili").disabled ='true';
        //document.getElementById("tgl_vaksin").disabled ='true';
    <?php } ?>
    tampilPelaporan();
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


	//SELEKSI TAMPILAN
	function tampilPelaporan() {
		<?php if($page === 'Pelaporan'){?>
			$.get('<?php echo base_url('Pelaporan/tampil'); ?>', function(data) {
			<?php } else if($page === 'Belum_tl'){?>
				$.get('<?php echo base_url('Pelaporan/tampil_belum_tl'); ?>', function(data) {
				<?php } else if($page === 'Belum_jadwal_swab'){?>
					$.get('<?php echo base_url('Pelaporan/tampil_belum_jadwal_swab'); ?>', function(data) {
					<?php } else if($page === 'Belum_keluar_hasil'){?>
						$.get('<?php echo base_url('Pelaporan/tampil_belum_keluar_hasil'); ?>', function(data) {
						<?php } else if($page === 'Positif'){?>
							$.get('<?php echo base_url('Pelaporan/tampil_positif'); ?>', function(data) {
							<?php } else if($page === 'Positif_komorbid'){?>
								$.get('<?php echo base_url('Pelaporan/tampil_positif_komorbid'); ?>', function(data) {
								<?php } else if($page === 'Positif_14_hari'){?>
									$.get('<?php echo base_url('Pelaporan/tampil_positif_14_hari'); ?>', function(data) {
									<?php } else if($page === 'Selesai_pantau'){?>
										$.get('<?php echo base_url('Pelaporan/tampil_selesai_pantau'); ?>', function(data) {
										<?php } else if($page === 'Luar_wilayah'){?>
											$.get('<?php echo base_url('Pelaporan/tampil_luar_wilayah'); ?>', function(data) {
											<?php } else if($page === 'Swab_hari_ini'){?>
												$.get('<?php echo base_url('Pelaporan/tampil_swab_hari_ini'); ?>', function(data) {
												<?php } else if($page === 'Cpb'){?>
													$.get('<?php echo base_url('Pelaporan/tampil_cpb'); ?>', function(data) {
													<?php } else if($page === 'Cpt'){?>
														$.get('<?php echo base_url('Pelaporan/tampil_cpt'); ?>', function(data) {
														<?php } else if($page === 'Rws'){?>
															$.get('<?php echo base_url('Pelaporan/tampil_rws'); ?>', function(data) {
															<?php } ?>
															MyTable.fnDestroy();
															$('#data-pelaporan').html(data);
															refresh();
														});
														}

	//AKHIR SELEKSI TAMPILAN



	var id;
	$(document).on("click", ".konfirmasiHapus-pelaporan", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPelaporan", function() {
		var id_pelaporan = id;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelaporan/delete'); ?>",
			data: "id=" +id_pelaporan
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPelaporan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-pelaporan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			<?php if($this->userdata->level == 'admin'){ ?>
				url: '<?php echo base_url('Pelaporan/Simpan'); ?>',
			<?php } else if($this->userdata->level == 'sasaran') { ?>
				url: '<?php echo base_url('Pelaporan/SimpanDariSasaran'); ?>',
			<?php } ?>
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelaporan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pelaporan").reset();
				$('#tambah-pelaporan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//pelaporan
	$(document).on("click", ".update-dataPelaporan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelaporan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pelaporan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-pelaporan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelaporan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelaporan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pelaporan").reset();
				$('#update-pelaporan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//jadwal
	$(document).on("click", ".update-dataJadwal", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelaporan/updateJadwal'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jadwal').modal('show');
		})
	})

	$(document).on('submit', '#form-update-jadwal', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelaporan/prosesUpdateJadwal'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelaporan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jadwal").reset();
				$('#update-jadwal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//hasil
	$(document).on("click", ".update-dataHasil", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelaporan/updateHasil'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-hasil').modal('show');
		})
	})

	$(document).on('submit', '#form-update-hasil', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelaporan/prosesUpdateHasil'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelaporan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-hasil").reset();
				$('#update-hasil').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//pemantau
	$(document).on("click", ".update-dataPemantau", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelaporan/updatePemantau'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pemantau').modal('show');
		})
	})

	$(document).on('submit', '#form-update-pemantau', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelaporan/prosesUpdatePemantau'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelaporan();
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

	$('#tambah-pelaporan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-pelaporan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-jadwal').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})
	$('#update-hasil').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-pemantau').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})



	function cek(){
		$("#collapseOne").show();
		$("#collapseTwo").show();
        //alert('test');
    }

    var ajaxku=buatajax();
    function ajaxkota(id){
    	var url="<?php echo base_url();?>daerah/getKab/"+id+"/"+Math.random();
    	ajaxku.onreadystatechange=stateChanged;
    	ajaxku.open("GET",url,true);
    	ajaxku.send(null);
    	document.getElementById("kec").disabled ='false';
    }

    function ajaxkec(id){
    	var url="<?php echo base_url();?>daerah/getKec/"+id+"/"+Math.random();
    	ajaxku.onreadystatechange=stateChangedKec;
    	ajaxku.open("GET",url,true);
    	ajaxku.send(null);
    	document.getElementById("kel").disabled ='false';
    }

    function ajaxkel(id){
    	var url="<?php echo base_url();?>daerah/getKel/"+id+"/"+Math.random();
    	ajaxku.onreadystatechange=stateChangedKel;
    	ajaxku.open("GET",url,true);
    	ajaxku.send(null);

    }

    function ajaxtgl(){
    	var tgl=$("#jadwal_swab").val();
    	var url="<?php echo base_url();?>/Pelaporan/getsesi/"+tgl+"/"+Math.random(); 
    	ajaxku.onreadystatechange=stateChangedTglSwab;
    	ajaxku.open("GET",url,true);
    	ajaxku.send(null);
    }

    function buatajax(){
    	if (window.XMLHttpRequest){
    		return new XMLHttpRequest();
    	}
    	if (window.ActiveXObject){
    		return new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	return null;
    }
    
    function stateChanged(){
    	var data;
    	if (ajaxku.readyState==4){
    		data=ajaxku.responseText;
    		if(data.length>=0){
    			document.getElementById("kota").innerHTML = data
    		}else{
    			document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    		}
    		document.getElementById("kota").disabled = false;
    	}
    }

    function stateChangedKec(){
    	var data;
    	if (ajaxku.readyState==4){
    		data=ajaxku.responseText;
    		if(data.length>=0){
    			document.getElementById("kec").innerHTML = data
    		}else{
    			document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    		}
    		document.getElementById("kec").disabled = false;
    	}
    }

    function stateChangedKel(){
    	var data;
    	if (ajaxku.readyState==4){
    		data=ajaxku.responseText;
    		if(data.length>=0){
    			document.getElementById("kel").innerHTML = data
    		}else{
    			document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    		}
    		document.getElementById("kel").disabled = false;
    		document.getElementById("rt_domisili").disabled = false;
    		document.getElementById("rw_domisili").disabled = false;
    		document.getElementById("alamat_domisili").disabled = false;
    	}
    }

    function get_isi(nik){
    	$.ajax({
    		url: '<?php base_url() ?>Pelaporan/getNik?nik=' + nik,
    		type: "GET",
    		cache: false,
    		success:function(data)
    		{
    			var data = $.parseJSON(data);
    			if(data['status']){
    				$('#nama').val(data.results.nama);
    				$('#bpjs').val(data.results.bpjs);
    				$('#tgl_lahir').val(data.results.tgl_lahir);
    				$('#umur').val(data.results.umur);
    				$('#umur2').val(data.results.umur);
    				$('#agama').val(data.results.agama);
    				$('#status_menikah').val(data.results.status_menikah);
    				$('#jenkel').val(data.results.jenkel);
    				$('#hp').val(data.results.hp);
    				$('#email').val(data.results.email);
    				$('#ibu_kandung').val(data.results.ibu_kandung);
    				$('#pekerjaan').val(data.results.pekerjaan);
    				$('#alamat').val(data.results.alamat);
    				$('#instansi').val(data.results.instansi);
    				// $('#prop').val('data.results.kab_domisili');
    				// document.getElementById("kota").disabled = false;
    				// $('#kota').val(data.results.kab_domisili);
    				// document.getElementById("kec").disabled = false;
    				// $('#kec').val(data.results.kec_domisili);
    				// document.getElementById("kel").disabled = false;
    				// $('#kel').val(data.results.kel_domisili);
    				document.getElementById("rt_domisili").disabled = false;
    				$('#rt_domisili').val(data.results.rt_domisili);
    				document.getElementById("rw_domisili").disabled = false;
    				$('#rw_domisili').val(data.results.rw_domisili);
    				document.getElementById("alamat_domisili").disabled = false;
    				$('#alamat_domisili').val(data.results.alamat_domisili);
    			}else{
    				$('#nama').val('');
    			}
    		}
    	});
    }

    function stateChangedTglSwab(){
    	var data;
    	if (ajaxku.readyState==4){
    		data=ajaxku.responseText;
    		if(data.length>=0){
    			//document.getElementById("sisa").innerHTML = data
    			//document.getElementById("sisa2").value = data;
    			if (data=='LIBUR'){
    				$('#sisa').html('<div style="color:red";>'+data+'</div>');
    			}else{
    				$('#sisa').html('<div style="color:green";>SISA '+data+'</div>');
    			}
    		}else{
    			document.getElementById("sisa").value = "0";
    		}
    	}

    }

</script>