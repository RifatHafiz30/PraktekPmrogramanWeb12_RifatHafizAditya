<?php
//mengeksekusi file koneksi1.pdf
	include ('koneksi.php');
	//mengeksekusi library dompdf
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	//membuat konstruktor
	$dompdf = new Dompdf();
	//membaca data dari database
	$query = mysqli_query($koneksi,"SELECT * FROM peserta");
	//membuat script HTML
	$html='<html><hr><center><h3>Daftar Nama Pendaftar</h3></center><hr/><br/>';
	$html .='<table border="1" width="300%" style="table-layout: fixed">
	<tr>
		<td>Jenis Pendaftaran</td>
		<td>Tanggal FORM</td>
		<td>Jenis Pendaftaran</td>
		<td>Tanggal Masuk sekolah</td>
		<td>NIS</td>
		<td>Nomor Peserta</td>
		<td>Pernah Paud ?</td>
		<td>Pernah TK ?</td>
		<td>SKHUN</td>
		<td>Ijazah</td>
		<td>Hobi</td>
		<td>Cita-cita</td>
		<td>Nama Lengkap</td>
		<td>Jenis Kelamin</td>
		<td>NISN</td>
		<td>NIK</td>
		<td>Tempat Lahir</td>
		<td>Tanggal Lahir</td>
		<td>Agama</td>
		<td>Berkubutuhan Khusus</td>
		<td>Alamat</td>
		<td>RT</td>
		<td>RW</td>
		<td>Nama Dusun</td>
		<td>Nama Desa</td>
		<td>Kecamatan</td>
		<td>Kode Pos</td>
		<td>Tinggal</td>
		<td>Transportasi</td>
		<td>No HP</td>
		<td>No Telp</td>
		<td>Email</td>
		<td>KIP</td>
		<td>No KIP</td>
		<td>Kewarganegaraan</td>
		<td>Nama Ayah</td>
		<td>Tahun Lahir Ayah</td>
		<td>Pendidikan</td>
		<td>Kerja Ayah</td>
		<td>Gaji Ayah</td>
		<td>Berkebutuhan Khusus</td>
		<td>Nama Ibu</td>
		<td>Pendidikan</td>
		<td>Kerja Ibu</td>
		<td>Gaji Ibu</td>
		<td>Berkebuthan Khusus</td>
	</tr>';

while($row = mysqli_fetch_array($query))
{
	$html.="<tr>	
	<td>".$row['id']."</td>																									
	<td>".$row['tglform']."</td>
	<td>".$row['jenispendaftaran']."</td>
	<td>".$row['tglmasuksekolah']."</td>
	<td>".$row['nis']."</td>
	<td>".$row['nmrpeserta']."</td>
	<td>".$row['paud']."</td>
	<td>".$row['tk']."</td>
	<td>".$row['skhun']."</td>
	<td>".$row['ijazah']."</td>
	<td>".$row['hobi']."</td>
	<td>".$row['cita']."</td>
	<td>".$row['namalengkap']."</td>
	<td>".$row['jk']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tempatlahir']."</td>
	<td>".$row['tgllahir']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['bkpribadi']."</td>
	<td>".$row['alamat']."</td>
	<td>".$row['rt']."</td>
	<td>".$row['rw']."</td>
	<td>".$row['namadusun']."</td>
	<td>".$row['namadesa']."</td>
	<td>".$row['kecamatan']."</td>
	<td>". $row['kdpos']."</td>
	<td>". $row['tinggal']."</td>
	<td>". $row['transportasi']."</td>
	<td>". $row['nohp']."</td>
	<td>". $row['notelp']."</td>
	<td>". $row['email']."</td>
	<td>". $row['penkip']."</td>
	<td>". $row['nokip']."</td>
	<td>". $row['kwn']."</td>
	<td>". $row['namaayah']."</td>
	<td>". $row['thnlahirayah']."</td>	
	<td>". $row['pendikayah']."</td>
	<td>". $row['kerjaayah']."</td>
	<td>". $row['hasilayah']."</td>
	<td>". $row['bkayah']."</td>
	<td>". $row['namaibu']."</td>
	<td>". $row['thnlahiribu']."</td>
	<td>". $row['pendikibu']."</td>
	<td>". $row['kerjaibu']."</td>
	<td>". $row['hasilibu']."</td>
	<td>". $row['bkibu']."</td>	
	</tr>";
}

	$html.="</html>";
	$dompdf->loadHtml($html);
	//setting ukuran dan orientasi kertas
	$dompdf->setPaper('A0','landscape');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('laporan_siswa.pdf');
?>