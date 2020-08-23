<br><br><br><br>
<div id="maincontent" class="ui main container">
	<h1 class="ui header">Dashboard</h1>
	<div class="ui stackable grid">
		<div class="nine wide column">
			<div id="regInnkommende" class="ui stacked segment">
				<a class="ui olive ribbon label">Tambah Tukang Cukur</a>
				<div class="ui form">
					<form action="<?= base_url('admin/tambahTukangCukur') ?>" method="POST">
						<div class="two fields">
							<div class="field">
								<label>Nama</label>
								<div class="ui input">
									<input name="nama" value="<?= set_value('nama') ?>" type="text" placeholder="Nama Barberman">
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="field">
								<label>Nomor Telepon</label>
								<div class="ui input">
									<input name="telepon" value="<?= set_value('telepon') ?>" type="text" placeholder="08xxxxxxxx">
									<?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
						<button class="ui green small button" tabindex="0" type="submit">Tambah</button>
					</form>
				</div>

			</div>
			<div class="ui hidden divider"></div>
			<div id="regUtgaende" class="ui stacked segment">
				<a class="ui ribbon orange label">Tambah Menu Cukur</a>
				<div class="ui form">
					<form action="<?= base_url('admin/tambahMenuCukur') ?>" method="POST">
						<div class="two fields">
							<div class="field">
								<label>Nama</label>
								<div class="ui input">
									<input name="nama" type="text" placeholder="Pangkas">
								</div>
							</div>
							<div class="field">
								<label>Harga</label>
								<div class="ui input">
									<input name="harga" type="text" placeholder="0">
								</div>
							</div>
						</div>
						<button class="ui green small button" type="submit" tabindex="0">Tambah</button>
					</form>
				</div>
			</div>
			<?= $this->session->flashdata('pesan_pemberitahuan'); ?>
		</div>
		<div class="seven wide column">
			<div class="ui secondary segment">
				<div class="ui grey small horizontal statistic">
					<div class="value">
						1000
					</div>
					<div class="label">
						hari ini
					</div>
				</div>
			</div>
			<table class="ui small very compact unstackable selectable orange table">
				<thead>
					<tr>
						<th colspan="2">
							Data Barberman
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($cukur as $cukur) : ?>
						<tr>
							<td><?= $cukur['nama']; ?></td>
							<td class="right aligned"><?= $cukur['no_tlp']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<table class="ui small very compact unstackable selectable olive table">
				<thead>
					<tr>
						<th colspan="2">
							Data Menu Cukur
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($menu as $menu) : ?>
						<tr>
							<td><?= $menu['nm_menu']; ?></td>
							<td class="right aligned">Rp.<?= number_format($menu['harga']); ?>,-</td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>


		</div>
	</div>
</div>
<?php foreach ($total_menu as $total) : ?>
	<a href=""><?= $total['nama'], $total['Total'], $total['harga'] ?></a><br>

<?php endforeach; ?>