<br><br><br><br>
<div id="maincontent" class="ui main container">
	<div class="ui form">
		<h1 class="ui header">Penjualan di Bulan ini <?= $tanggal; ?></h1>
		<form action="" method="post">
			<div class="inline fields ">
				<div class="field">
					<!-- <label>Start date</label> -->
					<div class="ui calendar" id="rangestart">
						<div class="ui input left icon">
							<i class="calendar icon"></i>
							<input type="text" name="start" placeholder="Start">
						</div>
					</div>
				</div>
				<div class="field">
					<!-- <label>End date</label> -->
					<div class="ui calendar" id="rangeend">
						<div class="ui input left icon">
							<i class="calendar icon"></i>
							<input type="text" name="end" placeholder="End">
						</div>
					</div>
				</div>
				<div class="field">
					<!-- <label>Cari</label> -->
					<div class="ui">
						<button formaction="<?= base_url('admin/cari') ?>" class="ui green small button" type="submit"><i class="icon find"></i>Cari</button>
					</div>
				</div>
				<div class="field">
					<!-- <label>Cari</label> -->
					<div class="ui">
						<button formaction="<?= base_url('admin/cetak') ?>" class="ui green small button" type="submit"><i class="icon print"></i>Cetak</button>
					</div>
				</div>
				<!-- om -->
			</div>
		</form>
	</div>
	<div class="ui grid">
		<div class="twelve wide column">
			<table class="ui celled striped table">
				<thead>
					<tr>
						<th colspan="4">
							Penjualan hari ini
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($penjualan as $row) : ?>
						<tr>
							<td class="collapsing">
								<i class="file outline icon"></i><?= $row['id_nota'] ?>
							</td>
							<td><?= $row['nm_menu'] ?></td>
							<td class="right aligned collapsing"><?= $row['tgl_nota_cukur'] ?></td>
							<td class="right aligned collapsing"><?= $row['nama'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="four wide column">
			<table class="ui very basic collapsing celled table">
				<thead>
					<tr>
						<th>Barberman</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($total_menu as $total) : ?>
						<tr>
							<td>
								<h4 class="ui image header">
									<img src="<?= base_url("gambar/capster.png") ?>" class="ui mini rounded image">
									<div class="content">
										<?= $total['nama'] ?>
										<div class="sub header">
											Barberman
										</div>
									</div>
								</h4>
							</td>
							<td>
								<?= $total['Total'] ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<!-- <h2 class="ui header">
				<img src="<?= base_url("gambar/patrick.png") ?>" class="ui circular image">
				<?= $keranjangcukur['koko'] ?>
				<a class="ui label">
					11
				</a>
			</h2>
			<h2 class="ui header">
				<img src="<?= base_url("gambar/patrick.png") ?>" class="ui circular image">
				<?= $keranjangcukur['koko'] ?>
				<a class="ui label">
					11
				</a>
			</h2> -->
		</div>

	</div>

</div>