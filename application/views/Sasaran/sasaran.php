<div class="msg" style="display:none;">
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section class="content">
	<div class="row">
		<div class="col-xs-12">

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Table With Full Features</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-striped" id="list-data">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>HP</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="data-sasaran"></tbody>
						<tfoot>
							<tr>
							<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>HP</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>

<?php echo $modal_tambah_sasaran; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSasaran', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

