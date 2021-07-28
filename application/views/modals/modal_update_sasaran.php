<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Edit Data Sasaran</h3>
<form id="form-update-sasaran" method="POST">
	<!-- <form method="POST" action="<?php echo base_url();?>Sasaran/prosesUpdate"> -->
		<input type="hidden" value="<?php echo $this->userdata->username;?>"></input>
		<input type="hidden" value="<?php echo date('Y-m-d');?>" ></input>
		<input type="hidden" name="id" value="<?php echo $dataSasaran->id;?>"></input>
		<input type="hidden" name="nik" value="<?php echo $dataSasaran->nik;?>"></input>
		<fieldset class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" name="nik_2" id="nik_2" value="<?php echo $dataSasaran->nik;?>" disabled>
		</fieldset>
		<fieldset class="form-group">
			<label for="bpjs">BPJS</label>
			<input type="text" class="form-control" name="bpjs" id="bpjs" value="<?php echo $dataSasaran->bpjs;?>"placeholder="BPJS">
		</fieldset>
		<fieldset class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $dataSasaran->nama;?>"placeholder="Nama">
		</fieldset>
		<fieldset class="form-group">
			<label for="tgl_lahir">Tanggal Lahir</label>
			<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $dataSasaran->tgl_lahir;?>">
		</fieldset>
		<fieldset class="form-group">
			<label for="umur">Umur</label>
			<input type="text" class="form-control" name="umur" id="umur" value="<?php echo $dataSasaran->umur;?>">
		</fieldset>
		<fieldset class="form-group">
			<label for="agama">Agama</label>
			<select class="form-control select2" name="agama" id="agama" required>
				<option <?php if($dataSasaran->agama == "Islam"){echo 'selected';}?>>Islam</option>
				<option <?php if($dataSasaran->agama == "Kristen"){echo 'selected';}?>>Kristen</option>
				<option <?php if($dataSasaran->agama == "Katolik"){echo 'selected';}?>>Katolik</option>
				<option <?php if($dataSasaran->agama == "Hindu"){echo 'selected';}?>>Hindu</option>
				<option <?php if($dataSasaran->agama == "Budha"){echo 'selected';}?>>Budha</option>
				<option <?php if($dataSasaran->agama == "Konghuchu"){echo 'selected';}?>>Konghuchu</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="jenkel">Jenis Kelamin</label>
			<select class="form-control select2" name="jenkel" id="jenkel" required>
				<option <?php if($dataSasaran->jenkel == "Laki-Laki"){echo 'selected';}?>>Laki-Laki</option>
				<option <?php if($dataSasaran->jenkel == "Perempuan"){echo 'selected';}?>>Perempuan</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="status_menikah">Status Menikah</label>
			<select class="form-control select2" name="status_menikah" id="status_menikah" required>
				<option <?php if($dataSasaran->status_menikah == "Belum menikah"){echo 'selected';}?>>Belum Menikah</option>
				<option <?php if($dataSasaran->status_menikah == "Menikah"){echo 'selected';}?>>Menikah</option>
				<option <?php if($dataSasaran->status_menikah == "Janda"){echo 'selected';}?>>Janda</option>
				<option <?php if($dataSasaran->status_menikah == "Duda"){echo 'selected';}?>>Duda</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="hp">No HP (WA)</label>
			<input type="text" class="form-control" name="hp" id="hp" value="<?php echo $dataSasaran->hp;?>"placeholder="HP">
		</fieldset>
		<fieldset class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" id="email" value="<?php echo $dataSasaran->email;?>"placeholder="Email">
		</fieldset>
		<fieldset class="form-group">
			<label for="alamat">Alamat</label>
			<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $dataSasaran->alamat;?>"placeholder="alamat">
		</fieldset>
		<fieldset class="form-group">
			<label for="pekerjaan">Pekerjaan</label>
			<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $dataSasaran->pekerjaan;?>"placeholder="pekerjaan">
		</fieldset>
		<fieldset class="form-group">
			<label for="instansi">Instansi</label>
			<input type="text" class="form-control" name="instansi" id="instansi" value="<?php echo $dataSasaran->instansi;?>"placeholder="Instansi">
		</fieldset>
		<fieldset class="form-group">
			<label for="nama_kk">Nama Kepala Keluarga</label>
			<input type="text" class="form-control" name="nama_kk" id="nama_kk" value="<?php echo $dataSasaran->nama_kk;?>"placeholder="Nama KK">
		</fieldset>
		<fieldset class="form-group">
			<label for="prov_domisili">Provinsi Domisili</label>
			<input type="text" class="form-control" name="prov_domisili" id="prov_domisili" value="<?php echo $dataSasaran->prov_domisili;?>" placeholder="Prov Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kota_domisili">Kota Domisili</label>
			<input type="text" class="form-control" name="kota_domisili" id="kota_domisili" value="<?php echo $dataSasaran->kota_domisili;?>"placeholder="Kota Doomisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kec_domisili">Kecamatan Domisili</label>
			<input type="text" class="form-control" name="kec_domisili" id="kec_domisili" value="<?php echo $dataSasaran->kec_domisili;?>"placeholder="Kec Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kel_domisili">Kelurahan Domisili</label>
			<input type="text" class="form-control" name="kel_domisili" id="kel_domisili" value="<?php echo $dataSasaran->kel_domisili;?>"placeholder="kel_domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="rt_domisili">RT Domisili</label>
			<input type="text" class="form-control" name="rt_domisili" id="rt_domisili" value="<?php echo $dataSasaran->rt_domisili;?>"placeholder="RT Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="rw_domisili">RW Domisili</label>
			<input type="text" class="form-control" name="rw_domisili" id="rw_domisili" value="<?php echo $dataSasaran->rw_domisili;?>"placeholder="RW Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="alamat_domisili">Alamat Domisili</label>
			<input type="text" class="form-control" name="alamat_domisili" id="alamat_domisili" value="<?php echo $dataSasaran->alamat_domisili;?>"placeholder="Alamat Domisili">
		</fieldset>
		<button type="submit" class="form-group btn mb-1 btn-primary btn-icon btn-lg btn-block">Simpan</button>
	</form>