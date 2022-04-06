<?php

function set_image($path) {
    //$path = base_url('assets/kartu/front-side.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Kartu <?= $row['nama_lengkap']; ?></title>
	<style>
		@page {
			size: 975px 561px;
			padding: 0px;
			margin: 0px;
		}

		body {
			padding: 0px;
			margin: 0px;
		}

		table,
		tr,
		td {
			padding: 0px;
			margin: 0px;
		}

		table {
			width: 100%;
		}


		td {
			font-size: 30px;
		}

		.barcode {
			position: absolute;
			bottom: 160px;
			right: 195px;
		}

		table,
		table tr,
		table td {
			border: 1px solid transparent;
			table-layout: fixed;
		}

	</style>
</head>

<body>
	<!-- front-side -->
	<div class="w-100" class="img" >
		<table classs='border'>
			<tr>
	
				<td style="vertical-align: top">
					<table style="margin-top: 100px">
						<tr>
							
                        <td style="text-align: center"><img src="<?= set_image(base_url('uploads/'.$row['photo'])); ?>" height="120px"></td>
						</tr>
						<tr>
							<td style="white-space: nowrap; text-align: center"><?= $row['nama_lengkap']; ?></td>
							<td width="3%"></td>
						</tr>
						
						<tr>
							<td colspan="2" style="padding-top: 26px"></td>
						</tr>
						<tr>
							<td style=" text-align: center">
								<?php

                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img width="200px" src="data:image/png;base64,' . base64_encode($generator->getBarcode($row['kode'], $generator::TYPE_CODE_128)) . '">';
                                
                                ?>

							</td>
							<td></td>
						</tr>
                        <tr>
							<td style="white-space: nowrap;++ font-size: 28px;  text-align: center"><?= $row['kode']; ?></td>
						</tr>
						<tr>
							<td colspan="2" style="padding-top: 46px"></td>
						</tr>
	
					</table>
				</td>
			</tr>
		</table>
		<!-- <table style="padding-top: 20%">
            <tr>
                <td width="14%"></td>
                <td width="20%"><img src="{{public_path('images/anggota/thumbnails/saya.png')}}" width="100%"></td>
                <td width="27%"></td>
                <td style="padding-top:10px; white-space: nowrap">{{$anggota->nama}}</td> 
                <td width="5%"></td>   
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="padding-top:14px; white-space: nowrap; font-size: 28px">{{$anggota->no_anggota}}</td>
                <td></td>    
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="padding-top:12px">{{$anggota->alamat ?? 'dummy'}}</td>
                <td></td>
            </tr>
        </table> -->
	</div>

	<!-- back-side -->
	<!-- <div class="w-100" style="background: url('<?= set_image(base_url('assets/foto_profil/latar-kartu.jpg')); ?>'); page-break-before: always">
   
    </div> -->
</body>

</html>
