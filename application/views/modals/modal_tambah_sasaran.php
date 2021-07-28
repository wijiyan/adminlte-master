<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Tambah Pelaporan</h3>
<form id="form-tambah-pelaporan" method="POST">
	<!-- <form method="POST" action="<?php echo base_url();?>Pelaporan/SimpanDariSasaran"> -->
		<input type="hidden" name="nik" value="<?php echo $this->userdata->username;?>">
		<!-- <form method="POST" action="<?php echo base_url();?>Pelaporan/Simpan"> -->
			<?php if($this->userdata->level == 'admin'){?>
				<fieldset class="form-group">
					<label for="tgl_pelaporan">Tanggal Pelaporan</label>
					<input type="date"  class="form-control"  name="tgl_pelaporan" value="<?php echo date('Y-m-d');?>" required></input>
				</fieldset>
				<fieldset class="form-group">
					<label for="nik">NIK</label>
					<input type="text" class="form-control" name="nik" id="nik" onchange="get_isi(this.value)" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="bpjs">BPJS</label>
					<input type="text" class="form-control" name="bpjs" id="bpjs" placeholder="BPJS">
				</fieldset>
				<fieldset class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
					<input type="hidden" name="password" value="123456">
				</fieldset>
				<fieldset class="form-group">
					<label for="tgl_lahir">Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="umur">Umur</label>
					<input type="hidden" name="umur" id="umur">
					<input type="text" class="form-control" name="umur2" id="umur2" disabled>
				</fieldset>
				<fieldset class="form-group">
					<label for="agama">Agama</label>
					<select class="form-control select2" name="agama" id="agama" required>
						<option>Islam</option>
						<option>Kristen</option>
						<option>Katolik</option>
						<option>Hindu</option>
						<option>Budha</option>
						<option>Konghuchu</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="jenkel">Jenis Kelamin</label>
					<select class="form-control select2" name="jenkel" id="jenkel" required>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="status_menikah">Status Menikah</label>
					<select class="form-control select2" name="status_menikah" id="status_menikah" required>
						<option>Belum Menikah</option>
						<option>Menikah</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="hp">No HP (WA)</label>
					<input type="text" class="form-control" name="hp" id="hp"placeholder="HP" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email">
				</fieldset>
				<fieldset class="form-group">
					<label for="nama_kk">Nama Kepala Keluarga</label>
					<input type="text" class="form-control" name="nama_kk" id="nama_kk" placeholder="Nama Kepala Keluarga">
				</fieldset>
				<fieldset class="form-group">
					<label for="pekerjaan">Pekerjaan</label>
					<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="PEKERJAAN">
				</fieldset>
				<fieldset class="form-group">
					<label for="instansi">Instansi</label>
					<input type="text" class="form-control" name="instansi" id="instansi" placeholder="Instansi">
				</fieldset>
				<fieldset class="form-group">
					<label for="alamat">ALAMAT LENGKAP SESUAI KTP</label>
					<input type="text" class="form-control" name="alamat" id="alamat" placeholder="ALAMAT" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="prop">Provinsi Domisili</label>
					<select class="form-control select2" name="prov_domisili" id="prop" onchange="ajaxkota(this.value)">
						<option>--Pilih Provinsi--</option>
						<?php 
						//foreach($provinsi as $data){
						//	echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
						//}
						?>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="kota">Kota Domisili</label>
					<select class="form-control select2" name="kota_domisili" id="kota" placeholder="Pilih Kota" onchange="ajaxkec(this.value)" required>
						<option>Pilih Kota/Kab</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="kec">Kecamatan Domisili</label>
					<select class="form-control select2" name="kec_domisili" id="kec" onchange="ajaxkel(this.value)" required>
						<option>Pilih Kecamatan</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="kel">Kelurahan Domisili</label>
					<select class="form-control select2" name="kel_domisili" id="kel" required>
						<option>Pilih Kelurahan</option>
					</select>
				</fieldset>
				<fieldset class="form-group position-relative">
					<label for="rt">RT Domisili</label>
					<input type="text" class="form-control" name="rt_domisili" id="rt_domisili" placeholder="RT" required>
				</fieldset>
				<fieldset class="form-group position-relative">
					<label for="rw">RW Domisili</label>
					<input type="text" class="form-control" name="rw_domisili" id="rw_domisili" placeholder="RW" required>
				</fieldset>
				<fieldset class="form-group position-relative">
					<label for="alamat">Alamat Domisili</label>
					<input type="text" class="form-control" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat" required>
				</fieldset>
			<?php } if($this->userdata->level == 'sasaran'){?>
				<fieldset class="form-group">
					<label for="tgl_pelaporan">Tanggal Pelaporan</label>
					<input type="date"  class="form-control"  name="tgl_pelaporan" value="<?php echo date('Y-m-d');?>" ></input>
				</fieldset>
			<?php } ?>

			<!-- SKRINING -->
			<fieldset class="form-group">
				<label for="jenis_kasus">Kriteria Kasus</label>
				<select class="form-control select2" name="jenis_kasus" id="jenis_kasus" required>
					<option>Suspek</option>
					<option>Skrining</option>
					<option>Antigen+</option>
					<option>PCR Positif</option>
					<option>Kontak Erat Pasien Positif</option>
				</select>
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="pemeriksaan_tambahan">Pemeriksaan Tambahan</label>
				<input type="text" class="form-control" name="pemeriksaan_tambahan" id="pemeriksaan_tambahan" placeholder="Pemeriksaan Tambahan">
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="kasus_primer">Kasus Primer</label>
				<input type="text" class="form-control" name="kasus_primer" id="kasus_primer" placeholder="Kasus Primer">
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="tgl_rapid">Tanggal Rapid</label>
				<input type="date" class="form-control" name="tgl_rapid" id="tgl_rapid" placeholder="Tanggal Rapid">
			</fieldset>
			<fieldset class="form-group">
				<label for="hasil_rapid">Hasil Rapid</label>
				<select class="form-control select2" name="hasil_rapid" id="hasil_rapid">
					<option></option>
					<option>POSITIF</option>
					<option>NEGATIF</option>
				</select>
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="lab_pemeriksa_rapid">Lab Pemeriksa Rapid</label>
				<input type="text" class="form-control" name="lab_pemeriksa_rapid" id="lab_pemeriksa_rapid" placeholder="Lab Pemeriksa Rapid">
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="tgl_swab">Tanggal Swab</label>
				<input type="date" class="form-control" name="tgl_swab" id="tgl_swab" placeholder="Tanggal Swab">
			</fieldset>
			<fieldset class="form-group">
				<label for="hasil_swab">Hasil Swab</label>
				<select class="form-control select2" name="hasil_swab" id="hasil_swab">
					<option></option>
					<option>POSITIF</option>
					<option>NEGATIF</option>
				</select>
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="lab_pemeriksa_swab">Lab Pemeriksa Swab</label>
				<input type="text" class="form-control" name="lab_pemeriksa_swab" id="lab_pemeriksa_swab" placeholder="Lab Pemeriksa Lab">
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="tgl_keluar_hasil">Tanggal Keluar Hasil Swab</label>
				<input type="date" class="form-control" name="tgl_keluar_hasil" id="tgl_keluar_hasil" placeholder="Tanggal Keluar Hasil Swab">
			</fieldset>
			<fieldset class="form-group position-relative">
				<label for="tgl_mulai_gejala">Tanggal Mulai Gejala</label>
				<input type="date" class="form-control" name="tgl_mulai_gejala" id="tgl_mulai_gejala" placeholder="Tanggal Mulai Bergejala">
			</fieldset>
			<table>
				<p>GEJALA</p>
				<tbody>
					<tr>
						<td class="col-md-4">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala1" value="Demam,">
									Demam/R. Demam
								</label>
							</fieldset>
						</td>
						<td class="col-md-3">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala2" value="Batuk,">
									Batuk
								</label>
							</fieldset>

						</td>
						<td class="col-md-3">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala3" value="Pilek,">
									Pilek
								</label>
							</fieldset>

						</td>
					</tr>
					<tr>
						<td  class="col-md-2">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala4" value="Sakit Kepala,">
									Sakit Kepala
								</label>
							</fieldset>

						</td>
						<td  class="col-md-2">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala5" value="Sesak Nafas,">
									Sesak Nafas
								</label>
							</fieldset>
						</td>
						<td  class="col-md-2">
							<fieldset>
								<label>
									<input type="checkbox" name="gejala6" value="Mual,">
									Mual
								</label>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td  class="col-md-2">		
							<fieldset>
								<label>
									<input type="checkbox" name="gejala7" value="Muntah,">
									Muntah
								</label>
							</fieldset>
						</td>
						<td  class="col-md-2">		
							<fieldset>
								<label>
									<input type="checkbox" name="gejala8" value="Diare,">
									Diare
								</label>
							</fieldset>
						</td>
						<td  class="col-md-2">		
							<fieldset>
								<label>
									<input type="checkbox" name="gejala9" value="Tidak Bergejala,">
									Tidak Bergejala
								</label>
							</fieldset>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			<fieldset class="form-group position-relative">
				<label for="gejala_lainya">Gejala Lainya</label>
				<input type="text" class="form-control" name="gejala_lainya" id="gejala_lainya" placeholder="Gejala Lainya">
			</fieldset>

			<table>
				<p>Komorbid</p>	
				<tr>
					<td class="col-md-4">			
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid1" value="Hamil,">
								Hamil
							</label>
						</fieldset>
					</td>
					<td  class="col-md-3">			
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid2" value="DM,">
								DM
							</label>
						</fieldset>
					</td>
					<td  class="col-md-3">			
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid3" value="Hipertensi,">
								Hipertensi
							</label>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td class="col-md-2">						
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid4" value="PPOK,">
								PPOK
							</label>
						</fieldset>
					</td>
					<td class="col-md-2">					
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid5" value="Ginjal,">
								Ginjal
							</label>
						</fieldset>
					</td>
					<td class="col-md-2">			
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid6" value="Muntah,">
								Muntah
							</label>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td class="col-md-2">			
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid7" value="Asma,">
								Asma
							</label>
						</fieldset>
					</td>
					<td class="col-md-2">					
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid8" value="Jantung,">
								Jantung
							</label>
						</fieldset>
					</td>
					<td class="col-md-2">					
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid9" value="TB,">
								TB
							</label>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td class="col-md-2">		
						<fieldset>
							<label>
								<input type="checkbox" name="komorbid10" value="">
								Tidak Ada
							</label>
						</fieldset>
					</td>
					<td class="col-md-2"></td>
					<td class="col-md-2"></td>
				</tr>
			</table>
			<br>
			<fieldset class="form-group position-relative">
				<label for="komorbid_lainya">Komorbid Lainya</label>
				<input type="text" class="form-control" name="komorbid_lainya" id="komorbid_lainya" placeholder="Komorbid Lainya">
			</fieldset>
			<fieldset class="form-group">
				<label for="status_pasien">Status Pasien</label>
				<select class="form-control select2" name="status_pasien" id="status_pasien" required="">
					<option>Isolasi Mandiri Dirumah</option>
					<option>Isolasi di Fasilitas Isolasi Terkendali</option>
					<option>Rawat</option>
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="status_pasien">Keterangan</label>
				<textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
			</fieldset>

			<button type="submit" class="btn btn-success btn-block">Simpan</button>
		</form>


