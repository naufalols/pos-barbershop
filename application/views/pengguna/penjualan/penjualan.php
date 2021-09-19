<div class="ui container">
	<div class="ui secondary pointing menu">
		<a class="item" href="<?= base_url("pengguna") ?>">
			Menu
		</a>
		<a class="active item" href="<?= base_url("pengguna/penjualan") ?>">
			Penjualan
		</a>
		<div class="right menu">
			<a class="ui item dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
				<?= $pengguna['nama']; ?> Logout
			</a>
		</div>
	</div>
	<div class="ui grid">
		<div class="twelve wide column">
			<table class="ui celled striped table">
				<thead>
					<tr>
						<th colspan="4">
							Penjualan hari ini <?= $waktu; ?>
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

		</div>

	</div>




</div>