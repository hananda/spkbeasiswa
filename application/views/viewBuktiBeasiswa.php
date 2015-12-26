<!DOCTYPE html>
<html>
<head>
	<title>Bukti terima beasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bukti.css">
</head>
<body>
	<div id="header">
		<font style="font-weight:bold;">SURAT - PERNYATAAN</font>
		<hr>
		<font>No. <?php echo $datamhs->no_surat_pengesahan; ?></font>
	</div>
	<div id="ttd">
		<font>Yang bertanda tangan di bawah ini :</font>
		<table>
			<tr>
				<td class="field">Nama</td>
				<td>:</td>
				<td>Prof. Dr. E. Titiek Winanti, M.S.</td>
			</tr>
			<tr>
				<td class="field">NIP.</td>
				<td>:</td>
				<td>195205011974122002</td>
			</tr>
			<tr>
				<td class="field">Pangkat / Golongan</td>
				<td>:</td>
				<td>Pembina Utama Madya / IV.d</td>
			</tr>
			<tr>
				<td class="field">Jabatan</td>
				<td>:</td>
				<td>Guru Besar.</td>
			</tr>
		</table>
		<font>Menerangkan dengan sesungguhnya bahwa :</font>
		<table>
			<tr>
				<td class="field">Nama</td>
				<td>:</td>
				<td><?php echo $datamhs->nama_mahasiswa; ?></td>
			</tr>
			<tr>
				<td class="field">NIM.</td>
				<td>:</td>
				<td><?php echo $datamhs->nim_mahasiswa; ?></td>
			</tr>
			<tr>
				<td class="field">Prodi / Jurusan</td>
				<td>:</td>
				<td><?php echo $datamhs->nama_prodi; ?>/<?php echo $datamhs->nama_jurusan; ?></td>
			</tr>
			<tr>
				<td class="field">Telepon / HP</td>
				<td>:</td>
				<td><?php echo $datamhs->telpon_mahasiswa; ?></td>
			</tr>
		</table>
	</div>
	<div id="isicontent">
		<font>Adalah benar-benar mahasiswa Fakultas Teknik Universitas Negeri Surabaya dan pada saat ini :</font>
		<ol>
			<li>Tidak sedang menerima Beasiswa dari pihak lain dan tidak dalam ikatan dinas.</li>
			<li>Berkelakuan baik dan mempunyai dedikasi yang tinggi terhadap Jurusan / Fakultas.</li>
			<li>Tidak Pernah melanggar Kode Etik Akademik Perguruan Tinggi.</li>
			<li>Mahasiswa aktif Fakultas Teknik pada semester genap tahun akademik 2014 - 2015.</li>
			<li>Tidak sedang atau cuti kuliah.</li>
		</ol>
		<font>Dengan pertimbangan di atas kami <span style="font-weight:bold">merekomendasikan</span> untuk mendapatkan
		beasiswa dari <span style="font-weight:bold">Bantuan Pendidikan Peningkatan Prestasi Akademik
		(BBP-PPA) th. 2015</span>.</font>
		<br>
		<br>
		<font>
			Demikian, surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
		</font>
	</div>

	<div id="tempatttd">
		<table>
			<tr>
				<td>Dibuat di</td>
				<td>:</td>
				<td>Surabaya</td>
			</tr>
			<tr>
				<td>Pada tanggal
				<td>:</td>
				<td><?php echo date('d F Y',strtotime($datamhs->tgl_pengesahan_beasiswa)); ?></td>
			</tr>
			<tr><td colspan="3"><hr></td></tr>
			<tr><td colspan="3">a.n. Dekan.</td></tr>
			<tr><td colspan="3">Pembantu Dekan III</td></tr>
			<tr><td colspan="3" id="tandatangan"></td></tr>
			<tr><td colspan="3">Prof. Dr. E. Titiek Winanti, M.S.</td></tr>
			<tr><td colspan="3">195205011974122002</td></tr>
		</table>
	</div>
</body>
</html>