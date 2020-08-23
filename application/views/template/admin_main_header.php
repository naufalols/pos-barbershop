<div class="ui fixed  menu">
	<div class="ui container">
		<a href="<?= base_url('admin') ?>" class="header item">
			<i class="bar chart icon"></i>
			Admin Panel

		</a>
		<a href="<?= base_url('admin') ?>" <?= ($title == 'Admin Barber Bois') ? ' class="active item"' : ''; ?> class="item">Dashboard</a>
		<a href=" <?= base_url('admin/penjualan') ?>" <?= ($title == 'Admin Penjualan') ? ' class="active item"' : ''; ?> class="item">Penjualan</a>
		<a href="<?= base_url('admin/setting') ?>" <?= ($title == 'Admin Setting') ? ' class="active item"' : ''; ?> class="item">Setting</a>

		<!-- <div class="ui simple dropdown item">
      Beholdning <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="#">Balanse</a>
        <a class="item" href="#">Inngående</a>
        <a class="item" href="#">Utgående</a>
        <div class="divider"></div>
        <a class="item" href="#">Søk</a>
      </div>
    </div> -->

		<!-- <div class="ui simple dropdown item">
      Kunder <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="#">Oversikt</a>
        <div class="divider"></div>
        <a class="item" href="#">Ny kunde</a>
      </div>
    </div> -->

		<div class="right menu">
			<div class="borderless item">
				<div id="userbutton" class="ui right labeled icon teal button simple dropdown"><i class="caret down icon"></i>
					<?= $nama ?>
					<div class="menu">
						<a class="item" href="#">Profil</a>
						<div class="divider"></div>
						<a class="item" href="<?= base_url('auth/logout') ?>">Keluar</a>
					</div>
				</div>


			</div>
		</div>

	</div>

</div>