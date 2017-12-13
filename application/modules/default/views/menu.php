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
			<?php
			$akses = $this->session->userdata('akses');
			$list_akses = $this->db->get_where("xakses",array("id"=>$akses))->first_row();
			//echo $list_akses->menu;

			$this->db->where("id in ","(".$list_akses->menu.")",false);
			$this->db->order_by("urutan","ASC");
			$list_menu = $this->db->get("xuserhakakses")->result();

			$myparent = "";

			foreach($list_menu as $row){
				if($row->parent == "0" && $row->urlstring != "#"){ ?>
						<li><a href="{site_url}<?= $row->urlstring ?>"><i class="<?= $row->icon ?> text-yellow"></i> <span><?= $row->nama_menu ?></span></a></li>
				<?php }
				elseif($row->urlstring == "#"){
					$myparent = $row->id;
					?>
					<li class="treeview <?= ($uri_1 == $row->kode) ? 'active' : '' ?> ">
						<a href="#">
							<i class="<?= $row->icon ?> text-yellow"></i> <span> <?= $row->nama_menu ?></span> <i class="fa fa-angle-left pull-right text-yellow"></i>
						</a>
					<ul class="treeview-menu">


				<?php }
				elseif($myparent != "" && $row->parent == $myparent){?>

						<li class="<?= ($uri_2 == $row->kode) ? 'active' : '' ?> ">
							<a href="{site_url}<?= $row->urlstring ?>"><i class="fa fa-edit"></i> <?= $row->nama_menu ?></a>
						</li>

						<?php
						if (strpos($row->urutan, 'x') !== false){
								echo "</ul></li>";
								$myparent = "";
						}
						?>



				<?php }
			}

			?>


		</ul>
	</section>
</aside>
