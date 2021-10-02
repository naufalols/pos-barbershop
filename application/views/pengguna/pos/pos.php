<div class="ui container">
	<div class="ui secondary pointing menu">
		<a class="active item">
			Menu
		</a>
		<a class="item" href="<?= base_url("pengguna/penjualan") ?>">
			Penjualan
		</a>
		<div class="right menu">
			<a class="ui item dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
				<?= $pengguna['nama']; ?> Logout
			</a>
		</div>
	</div>
	<div class="ui grid">
		<div class="ten wide column">
			<div class="ui inverted segment">
				<?= $this->session->flashdata('pesan_registrasi'); ?>
				<?php if (count($cukur) >= 1) : foreach ($cukur as $potong) : ?>
				<a id="tambahkan<?= $potong['id']; ?>" class="ui inverted yellow button"
					onclick="tambahkancukur('<?= base_url('pengguna/tambahCukurKeranjang/' . $potong['id']); ?>','<?= $potong['id'] ?>');">
					<?= $potong['nama']; ?>
				</a>
				<?php endforeach; else : ?>
				<div class="ui red message">
					<div class="header">
						Capster tidak ada atau tidak aktif
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="ui segment">
				<div class="ui four cards">
					<?php foreach ($menu as $menu) : ?>
					<div class="ui centered card">
						<div class="image">
							<img src="gambar/gunting.jpg">
						</div>
						<div class="content">
							<a class="header" id="menu<?= $menu['id']; ?>"
								onclick="tambahkanmenu('<?= base_url('pengguna/tambahMenuKeranjang/' . $menu['id']); ?>','<?= $menu['id'] ?>');">
								<?= $menu['nm_menu'] ?>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div id="table-transaksi" class="six wide column">
			<div class="ui segment">
				<div class="ui disabled dimmer">
					<div class="ui medium text loader">Loading</div>
				</div>
				<h2 id="tk_cukur" class="ui header">
					<img src="gambar/patrick.png" class="ui circular image">
					<?php if ($keranjangcukur['error'] === 1) :  ?>
					Pilih Capster
					<?php else : ?>
					<?= $keranjangcukur['result']['koko'] ?>

					<?php endif;?>

				</h2>
				<table class="ui celled table">
					<thead>
						<tr>
							<th>Item</th>
							<th>Total</th>
							<th class="right aligned"><i class="trash icon"></i></th>
						</tr>
					</thead>
					<tbody>

						<?php $total = null;
                    $no_nota = null;
                    foreach ($keranjang as $row) : $no_nota = $row['id_nota']; ?>
						<tr>
							<td><?= $row['nm_menu']; ?></td>
							<td><?= number_format($row['harga']); ?></td>
							<td class="right aligned">
								<button type="button" class="mini ui red vertical animated button" data-toggle="modal"
									onclick="confirm_modal('<?= base_url('pengguna/hapusMenuKeranjang/' . $row['idcukur']); ?>','<?= $row['nm_menu']; ?>');"
									data-target="#modalhapus">
									<div class="hidden content">Hapus</div>
									<div class="visible content">
										<i class="trash icon"></i>
									</div>
								</button>
								<!-- <button type="button" class="mini ui green vertical animated button"
																		onclick="example('<?= base_url('pengguna/hapusMenuKeranjang/' . $row['idcukur']); ?>','<?= $row['nm_menu']; ?>')">
																		<div class="hidden content">Hapus</div>
																		<div class="visible content">
																			<i class="trash icon"></i>
																		</div>
																	</button> -->
							</td>
						</tr>
						<?php $total += $row['harga'];
                    endforeach; ?>

						<div class="ui horizontal divider">
							<i class="heart icon"></i>
						</div>
						<tr class="ui warning">
							<td><b>TOTAL</b></td>
							<td><?= number_format($total); ?></td>
							<td>
							</td>
						</tr>

					</tbody>
				</table>
				<?php if ($no_nota == null || $keranjangcukur['error'] === 1) : ?>
				<button class="ui red button dropdown-item" href="#" onclick="shake()"><i class="shop icon"></i>Item
					Belum
					Lengkap!</button>
				<?php else : ?>
				<div class="ui tag labels">
					<a class="ui label">
						Nota : <?= $no_nota ?>
					</a>
				</div>
				<button class="ui primary button dropdown-item" href="#" data-toggle="modal"
					data-target="#selesaikanModal"
					onclick="proses('<?= base_url('pengguna/proseskeranjang/' . $no_nota); ?>', <?= $no_nota ?>)"><i
						class="shop icon"></i>Selesaikan</button>
				<?php endif; ?>
			</div>
		</div>

	</div>
</div>

<script>
	// var table = document.getElementById("table-transaksi");
	// for (var i = 0, row; row = table.rows[i]; i++) {
	// 	//iterate through rows
	// 	//rows would be accessed using the "row" variable assigned in the for loop
	// 	for (var j = 0, col; col = row.cells[j]; j++) {
	// 		//iterate through columns
	// 		//columns would be accessed using the "col" variable assigned in the for loop
	// 	}
	// }

</script>
