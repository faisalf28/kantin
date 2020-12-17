<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> 	

<div class="container">
	<table style="border-color: #450b0e" border="2" class="table table-bordered">	
		<tr>		
			<td colspan="11" >
				<div style="font-size: 30px; margin-left: 34%">Tabel Data Transaksi</div><br>
				<?php if(!empty(session()->getFlashdata('success'))){ ?>
        
					<div class="alert alert-success">
						<?php echo session()->getFlashdata('success');?>
					</div>
						
					<?php } ?>
					<?php if(!empty(session()->getFlashdata('info'))){ ?>

					<div class="alert alert-info">
						<?php echo session()->getFlashdata('info');?>
					</div>
					<?php } ?>
					<?php if(!empty(session()->getFlashdata('warning'))){ ?>

					<div class="alert alert-warning">
						<?php echo session()->getFlashdata('warning');?>
					</div>
						
					<?php } ?>				
				
			</td>
		</tr>
		<tr class="thead-dark">
			<th>No</th>
            <th>Id Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Tanggal Transaksi</th>
            <th>Metode Pemesanan</th>
            <th>Status</th>
            
			<th>Konfirmasi</th>			
		</tr>

		<?php if (empty($transaksi))  {?>
			<tr>
				<td colspan="5">
					<div class="alert alert-danger" role="alert" align="center">
						Data Tidak Ada
					</div>
				</td>
			</tr>
		<?php } ?>
		<?php 			
		foreach($transaksi as $u => $data){ ?>		
			<tr>
				<td><?php echo $u+1;?></td>
                <td><?php echo $data['id_transaksi'] ?></td>
                <td><?php echo $data['nama_pembeli'] ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
				<td><?php echo $data['tgl_transaksi'] ?></td>						
                <td><?php echo $data['metode_pemesanan'] ?></td>
                <td><?php echo $data['status'] ?></td>
				<td>
				<div class="btn-group" >				
				<a  href="<?php echo base_url('penjual/update/'.$data['id_transaksi']); ?>" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengkonfirmasi data  <?php echo $data['id_transaksi']; ?> ini?')"><i class="fa fa-check"></i></a>                    
					</div>

					
					
				</td>
			</tr>
			
		<?php } ?>
		
	</table>
	