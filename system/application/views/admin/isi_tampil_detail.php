<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table width="100%">
<tr><td width="100">Anda Login sebagai <b><?php echo $nama;?></b>, dengan username <b><?php echo $nim; ?></b></td></tr>
</table><br />

<table cellpadding="3">
<?php
$no=1;
foreach($detail->result_array() as $item2){
}
echo"<tr><td>Nama Dosen</td><td>:<td>".$item2['dosen']."</td></tr>";
echo"<tr><td>Nama Mata Kuliah</td><td>:</td><td>".$item2['namamk']."</td></tr>";
echo"<tr><td>Kode Mata Kuliah</td><td>:</td><td>".$item2['kodemk']."</td></tr>";
echo"<tr><td>Jumlah Audience</td><td>:</td><td>".$jumlah=$item2['A']+$item2['B']+$item2['C']+$item2['D']." orang</td></tr>";
?>
</table><br>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="50">No. Soal</td>
<td width="50">A</td><td width="50">B</td><td width="50">C</td>
<td width="50">D</td>
<td width="150">Total Point</td>
</tr>
<?php
$no=1;
$total=0;
foreach($detail->result_array() as $item){
if($item['idsoal']==1)
{
$nilaiA=$item['A']*1;
$nilaiB=$item['B']*4;
$hasil=$nilaiA+$nilaiB;
}
else
{
$nilaiA=$item['A']*1;
$nilaiB=$item['B']*2;
$nilaiC=$item['C']*3;
$nilaiD=$item['D']*4;
$hasil=$nilaiA+$nilaiB+$nilaiC+$nilaiD;
}
$total+=$hasil;
echo"<tr align='center' valign='bottom'><td>".$item['idsoal']."</td><td>".$item['A']."</td>
<td>".$item['B']."</td>
<td>".$item['C']."</td>
<td>".$item['D']."</td>
<td>".$hasil."</td>
</tr>";
$no++;
}
echo"<tr align='center' valign='bottom'><td colspan='4'>Total Keseluruhan</td><td>:</td><td>".$total."</td></tr>";
?>
<tr><td colspan="5" class="menu-button" align="center"><a href="<?php echo base_url()?>
index.php/admin/ubahexcell/<?php echo $item['kodemk']; ?>/<?php echo $item['dosen']; ?>"><b>Convert ke format Excell</b></a></td>
<td class="menu-button" align="center">
<a href="<?php echo base_url()?>
index.php/admin/tampilkomentar/<?php echo $item['kodemk']; ?>/<?php echo $item['dosen']; ?>"><b>Lihat Komentar</b></a>
</td>
</tr>
</table>
<br><br>
<?php
$no=1;
$tinggi=0.4;
foreach($detail->result_array() as $item){
$prosentaseA = sprintf("%2.1f",(($item['A']/$jumlah)*100));
$gbr_voteA   = $prosentaseA * $tinggi;
$prosentaseB = sprintf("%2.1f",(($item['B']/$jumlah)*100));
$gbr_voteB   = $prosentaseB * $tinggi;
$prosentaseC = sprintf("%2.1f",(($item['C']/$jumlah)*100));
$gbr_voteC   = $prosentaseC * $tinggi;
$prosentaseD = sprintf("%2.1f",(($item['D']/$jumlah)*100));
$gbr_voteD   = $prosentaseD * $tinggi;

echo'<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5" width="660">
<tr bgcolor="#FFCC33" align="center"><td width="50">No. Soal</td>
<td width="150">A</td><td width="150">B</td><td width="150">C</td>
<td width="150">D</td>
</tr>';

echo"<tr align='center' valign='bottom'><td rowspan=2 valign='top'>".$item['idsoal']."</td><td>
<img src='".base_url()."system/application/views/admin/image/bar.jpg' height='".$gbr_voteA."' width='35' border='0'></td>
<td>
<img src='".base_url()."system/application/views/admin/image/bar.jpg' height='".$gbr_voteB."' width='35' border='0'></td>
<td>
<img src='".base_url()."system/application/views/admin/image/bar.jpg' height='".$gbr_voteC."' width='35 border='0'></td>
<td>
<img src='".base_url()."system/application/views/admin/image/bar.jpg' height='".$gbr_voteD."' width='35 border='0'></td>
</tr>";

echo"<tr align='center' valign='top' height=5>
<td><b>".$item['A']."</b> point</td>
<td><b>".$item['B']."</b> point</td>
<td><b>".$item['C']."</b> point</td>
<td><b>".$item['D']."</b> point</td>
</tr>";
echo'</table><br><br>';
$no++;
}
?>

</div>