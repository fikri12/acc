<?php $uri_1 = $this->uri->segment(1) ?>
<?php $uri_2 = $this->uri->segment(2) ?>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{adminlte}dist/img/fikri.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{usernama}</p>
				<a href="#"><i class="fa fa-circle text-warning"></i> Online</a>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li><a href="{site_url}dashboard"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span></a></li>
			<li class="treeview <?= ($uri_1 == 'master') ? 'active' : '' ?> ">
				<a href="#">
					<i class="fa fa-money text-yellow"></i><span> Master Data</span> <i class="fa fa-angle-left pull-right text-yellow"></i>
				</a>
				<ul class="treeview-menu">
					<li class=" <?= ($uri_2 == 'rekanan') ? 'active' : '' ?> ">
						<a href="{site_url}master/rekanan"><i class="fa fa-edit"></i> Rekanan</a>
					</li>
					<li class=" <?= ($uri_2 == 'proyek') ? 'active' : '' ?> ">
						<a href="{site_url}master/proyek"><i class="fa fa-edit"></i> Proyek</a>
					</li>
					<li class=" <?= ($uri_2 == 'posisikas') ? 'active' : '' ?> ">
						<a href="{site_url}master/posisikas"><i class="fa fa-edit"></i> Posisi Kas</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?= ($uri_1 == 'transaksi') ? 'active' : '' ?> ">
				<a href="#">
					<i class="fa fa-money text-yellow"></i> <span> Transaksi</span> <i class="fa fa-angle-left pull-right text-yellow"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?= ($uri_2 == 'cashflow') ? 'active' : '' ?> ">
						<a href="{site_url}transaksi/cashflow"><i class="fa fa-edit"></i> Cashflow</a>
					</li>
					<li class="<?= ($uri_2 == 'utang') ? 'active' : '' ?> ">
						<a href="{site_url}transaksi/utang"><i class="fa fa-edit"></i> Utang</a>
					</li>
					<li class="<?= ($uri_2 == 'piutang') ? 'active' : '' ?> ">
						<a href="{site_url}transaksi/piutang"><i class="fa fa-edit"></i> Piutang</a>
					</li>
				</ul>
			</li>
			<li class="<?= ($uri_1 == 'pengajuan_biaya') ? 'active' : '' ?> "><a href="{site_url}pengajuan_biaya"><i class="fa fa-tasks text-yellow"></i> <span>Pengajuan Biaya</span></a></li>

			<!-- <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>  -->
		</ul>
	</section>
</aside>
