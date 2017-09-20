<?php 
  $uri = $this->uri->uri_string();
  $uri = explode('/', $uri);
  $lang = $uri[0];
  if ($lang == 'id'){
?>

<footer id="acset-footer" class="hidden-xs hidden-sm">

	<div class="frame footer-container">
		
		<div class="col-md-4 nopadding">
			
			<div class="col-md-12 nopadding">
				<div class="title">
					<h5>Site Map</h5>					
				</div>
				<div class="col-md-6 col-sm-6 nopadding sitemap">
					<h6><a href="<?= base_url('id/home') ?>">Beranda</a></h6>
					<h6><a href="<?= base_url('id/about/sambutan') ?>">Tentang Kami</a></h6>
					<h6><a href="<?= base_url('id/about/aset_kami/visi_dan_misi') ?>">Aset Kami</a></h6>
					<h6><a href="<?= base_url('id/about/dewan_komisaris') ?>">Manajemen</a></h6>
					<h6><a href="<?= base_url('id/about/penghargaan') ?>">Penghargaan</a></h6>
					<h6><a href="<?= base_url('id/expertise/spesialisasi') ?>">Spesialisasi Kami</a></h6>
					<h6><a href="<?= base_url('id/expertise/mep') ?>">MEP</a></h6>
					<h6><a href="<?= base_url('id/projects/fondasi') ?>">Proyek</a></h6>
					<h6><a href="<?= base_url('id/governance/tata_kelola_perusahaan/sekilas_tata_kelola_perusahaan') ?>">GCG</a></h6>					
				</div>
				<div class="col-md-6 col-sm-6 nopadding sitemap">
					<h6><a href="<?= base_url('id/investor/front') ?>">Hubungan Investor</a></h6>
					<h6><a href="#">Agensi Pengawas</a></h6>
					<h6><a href="<?= base_url('id/investor/laporan/2016') ?>">Laporan Keuangan</a></h6>
					<h6><a href="<?= base_url('id/investor/laporan/2016') ?>">Annual Report</a></h6>
					<h6><a href="<?= base_url('id/investor/kegiatan_investor_relation/acara_dan_presentasi/2016') ?>">Kegiatan IR</a></h6>
					<h6><a href="<?= base_url('id/csr/tanggung_jawab_sosial_perusahaan') ?>">CSR</a></h6>
					<h6><a href="<?= base_url('id/media/siaran_pers') ?>">Siaran Pers</a></h6>
					<h6><a href="<?= base_url('id/media/berita') ?>">Berita</a></h6>
					<!-- <h6><a href="<?= base_url('id/career/career_with_us') ?>">Karir</a></h6> -->
				</div>				
			</div>

		</div>
		<div id="reach" class="col-md-3 nopadding">

			<div class="col-md-12 nopadding">
				<div class="title">
					<h5>Hubungi Kami</h5>					
				</div>				
					<h6 class="point">PT ACSET Indonusa Tbk</h6>
					<h6 class="default">ACSET Building</h6>
					<h6 class="default">JL. Majapahit No.26</h6>
					<h6 class="default">Petojo Selatan - Gambir</h6>
					<h6 class="default">Jakarta, Indonesia 10160</h6>
					<h6 class="telp">  +62 21 3511961</h6>
					<h6 class="fax">  +62 21 3441413</h6>
					<h6 class="default"><a href="mailto:corporate.secretary@acset.co">corporate.secretary@acset.co</a></h6>

					<div class="social-container">
						<a href="https://www.linkedin.com/company/3611287?trk=tyah">
							<img src="<?= base_url('assets/image/logo-footer/in.png'); ?>" class="img-responsive">
						</a>
						
						<a href="https://www.facebook.com/AcsetIndonusaTbk/">
							<img src="<?= base_url('assets/image/logo-footer/fb.png'); ?>" class="img-responsive">
						</a>
						<a href="https://twitter.com/ACSET_INDONUSA">
							<img src="<?= base_url('assets/image/logo-footer/twitter.png'); ?>" class="img-responsive">
						</a>

					</div>
					<h6 class="default">Language: <a href="<?= base_url('en/home')?>">English</a> | <a href="<?= base_url('id/home')?>">Indonesia</a></h6>
			</div>

		</div>

		<div id="contact" class="col-md-5 nopadding">
			<div class="col-md-12 nopadding">

				<div class="col-md-12 col-sm-12 nopadding sitemap">
					
					<div class="search-container">
						<?php 
							echo form_open('id/acset/search');
							echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'search site here' , 'style' => 'width:70%;margin:auto;'));
							echo '<button class="btn glyphicon glyphicon-search"></button>';
							echo form_close();	
						?>						
					</div>
					<div class="ukas-container">
						<div class="col-md-6 logo-ukas-footer1">
							<img src="<?= base_url('assets/image/footer/logo_footer1.png'); ?>" class='img-responsive'>
						</div>
							
						<div class="col-md-6 logo-ukas-footer2">
							<img src="<?= base_url('assets/image/footer/logo_footer2.JPG'); ?>" class='img-responsive'>
						</div>
						
						<div class="col-md-6 logo-ukas-footer1">
							<img src="<?= base_url('assets/image/footer/logo_footer3.jpg'); ?>" class='img-responsive'>
						</div>

						<div class="col-md-6">
							<img src="<?= base_url('assets/image/footer/logo_footer4.png'); ?>" class='img-responsive'>
						</div>
						<div class="clearfix"></div>
					</div>


				</div>				
			</div>		
		</div>

		<div class="clearfix"></div>		
	</div>

	<div class="copyright">
		<div class="frame">
			<h6>2017 PT ACSET Indonusa Tbk. All right reserved.  / <a href="<?php echo base_url('id/about/policy')?>">Privacy Policy</a>  /  <a href="<?php echo base_url('id/about/tnc')?>">Terms and Condition</a> </h6>			
		</div>
	</div>

	<div class="super-graphic sg-footer">
		<img src="<?= base_url('assets/image/logo-footer/logoo.png') ?>">
	</div>	

</footer>


<footer id="acset-footer" class="hidden-lg hidden-md">

	<div class="frame footer-container">
		
		<div id="reach" class="col-sm-6 nopadding">

			<div class="col-sm-12 nopadding">
				<div class="title">
					<h5>Hubungi Kami</h5>					
				</div>				
					<h6 class="point">PT ACSET Indonusa Tbk</h6>
					<h6 class="default">ACSET Building</h6>
					<h6 class="default">JL. Majapahit No.26</h6>
					<h6 class="default">Petojo Selatan - Gambir</h6>
					<h6 class="default">Jakarta, Indonesia 10160</h6>
					<h6 class="telp">  +62 21 3511961</h6>
					<h6 class="fax">  +62 21 3441413</h6>
					<h6 class="default"><a href="mailto:corporate.secretary@acset.co">corporate.secretary@acset.co</a></h6>
			</div>

		</div>

		<div id="contact" class="col-sm-6 nopadding">

			<div class="sitemap">
				
				<div class="search-container">
					<?php 
						echo form_open('acset/search');
						echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'search site here', 'style' => 'width:70%;'));
						echo '<button class="src-btn btn glyphicon glyphicon-search"></button>';
						echo form_close();	
					?>						
				</div>

			</div>				
				<div class="social-container">
						<a href="https://www.linkedin.com/company/3611287?trk=tyah">
							<img src="<?= base_url('assets/image/logo-footer/in.png'); ?>" class="img-responsive">
						</a>
						
						<a href="https://www.facebook.com/AcsetIndonusaTbk/">
							<img src="<?= base_url('assets/image/logo-footer/fb.png'); ?>" class="img-responsive">
						</a>
						<a href="https://twitter.com/ACSET_INDONUSA">
							<img src="<?= base_url('assets/image/logo-footer/twitter.png'); ?>" class="img-responsive">
						</a>
				</div>
			</div>
			<h6 class="default">Language: <a href="<?= base_url('en/home')?>">English</a> | <a href="<?= base_url('id/home')?>">Indonesia</a></h6>

		<div class="clearfix"></div>		
	</div>

	<div class="copyright">
		<div class="frame">
			<h6>2017 PT ACSET Indonusa Tbk. All right reserved.  / Privacy Policy  /  Terms and Condition </h6>			
		</div>
	</div>

	<div class="super-graphic sg-footer">
		<img src="<?= base_url('assets/image/logo-footer/logoo.png') ?>">
	</div>		

</footer>

<?php 
} else{
?>

<footer id="acset-footer" class="hidden-xs hidden-sm">

	<div class="frame footer-container">
		
		<div class="col-md-4 nopadding">
			
			<div class="col-md-12 nopadding">
				<div class="title">
					<h5>Site Map</h5>					
				</div>
				<div class="col-md-6 col-sm-6 nopadding sitemap">
					<h6><a href="<?= base_url('en/home') ?>">Home</a></h6>
					<h6><a href="<?= base_url('en/about/greetings') ?>">About Acset</a></h6>
					<h6><a href="<?= base_url('en/about/acset_legacy/vision_and_mission') ?>">Acset Legacy</a></h6>
					<h6><a href="<?= base_url('en/about/board_of_commisioners') ?>">Management</a></h6>
					<h6><a href="<?= base_url('en/about/achievement') ?>">Achievement</a></h6>
					<h6><a href="<?= base_url('en/expertise/our_expertise') ?>">Our Expertise</a></h6>
					<h6><a href="<?= base_url('en/expertise/mep') ?>">MEP</a></h6>
					<h6><a href="<?= base_url('en/projects/Foundation') ?>">Projects</a></h6>
					<h6><a href="<?= base_url('en/governance/good_corporate_governance/good_corporate_governance_at_a_glance') ?>">Governance</a></h6>					
				</div>
				<div class="col-md-6 col-sm-6 nopadding sitemap">
					<h6><a href="<?= base_url('en/investor/front') ?>">Investor Relations</a></h6>
					<h6><a href="#">Supervisor Agency</a></h6>
					<h6><a href="<?= base_url('en/investor/reports/2016') ?>">Financial Report</a></h6>
					<h6><a href="<?= base_url('en/investor/reports/2016') ?>">Annual Report</a></h6>
					<h6><a href="<?= base_url('en/investor/ir_activities/event_and_presentation/2016') ?>">IR Activities</a></h6>
					<h6><a href="<?= base_url('en/csr/corporate_social_responsibility') ?>">CSR</a></h6>
					<h6><a href="<?= base_url('en/media/press_release') ?>">Press Releases</a></h6>
					<h6><a href="<?= base_url('en/media/news') ?>">News</a></h6>
					<!-- <h6><a href="<?= base_url('en/career/career_with_us') ?>">Karir</a></h6> -->
				</div>				
			</div>

		</div>
		<div id="reach" class="col-md-3 nopadding">

			<div class="col-md-12 nopadding">
				<div class="title">
					<h5>Reach Us</h5>					
				</div>				
					<h6 class="point">PT ACSET Indonusa Tbk</h6>
					<h6 class="default">ACSET Building</h6>
					<h6 class="default">JL. Majapahit No.26</h6>
					<h6 class="default">Petojo Selatan - Gambir</h6>
					<h6 class="default">Jakarta, Indonesia 10160</h6>
					<h6 class="telp">  +62 21 3511961</h6>
					<h6 class="fax">  +62 21 3441413</h6>
					<h6 class="default"><a href="mailto:corporate.secretary@acset.co">corporate.secretary@acset.co</a></h6>

					<div class="social-container">
						<a href="https://www.linkedin.com/company/3611287?trk=tyah">
							<img src="<?= base_url('assets/image/logo-footer/in.png'); ?>" class="img-responsive">
						</a>
						
						<a href="https://www.facebook.com/AcsetIndonusaTbk/">
							<img src="<?= base_url('assets/image/logo-footer/fb.png'); ?>" class="img-responsive">
						</a>
						<a href="https://twitter.com/ACSET_INDONUSA">
							<img src="<?= base_url('assets/image/logo-footer/twitter.png'); ?>" class="img-responsive">
						</a>
					</div>
					<h6 class="default">Language: <a href="<?= base_url('en/home')?>">English</a> | <a href="<?= base_url('id/home')?>">Indonesia</a></h6>
			</div>

		</div>

		<div id="contact" class="col-md-5 nopadding">
			<div class="col-md-12 nopadding">

				<div class="col-md-12 col-sm-12 nopadding sitemap">
					
					<div class="search-container">
						<?php 
							echo form_open('acset/search');
							echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'search site here' , 'style' => 'width:70%;margin:auto;'));
							echo '<button class="btn glyphicon glyphicon-search"></button>';
							echo form_close();	
						?>						
					</div>
					<div class="ukas-container">
						<div class="col-md-6 logo-ukas-footer1">
							<img src="<?= base_url('assets/image/footer/logo_footer1.png'); ?>" class='img-responsive'>
						</div>
							
						<div class="col-md-6 logo-ukas-footer2">
							<img src="<?= base_url('assets/image/footer/logo_footer2.JPG'); ?>" class='img-responsive'>
						</div>
						
						<div class="col-md-6 logo-ukas-footer1">
							<img src="<?= base_url('assets/image/footer/logo_footer3.jpg'); ?>" class='img-responsive'>
						</div>

						<div class="col-md-6">
							<img src="<?= base_url('assets/image/footer/logo_footer4.png'); ?>" class='img-responsive'>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>				
			</div>		
		</div>

		<div class="clearfix"></div>		
	</div>

	<div class="copyright">
		<div class="frame">
			<h6>2017 PT ACSET Indonusa Tbk. All right reserved.  / <a href="<?php echo base_url('en/about/policy_en');?>">Privacy Policy</a>  /  <a href="<?php echo base_url('en/about/tnc_en');?>">Terms and Condition</a> </h6>			
		</div>
	</div>

	<div class="super-graphic sg-footer">
		<img src="<?= base_url('assets/image/logo-footer/logoo.png') ?>">
	</div>	

</footer>


<footer id="acset-footer" class="hidden-lg hidden-md">

	<div class="frame footer-container">
		
		<div id="reach" class="col-sm-6 nopadding">

			<div class="col-sm-12 nopadding">
				<div class="title">
					<h5>Reach Us</h5>					
				</div>				
					<h6 class="point">PT ACSET Indonusa Tbk</h6>
					<h6 class="default">ACSET Building</h6>
					<h6 class="default">JL. Majapahit No.26</h6>
					<h6 class="default">Petojo Selatan - Gambir</h6>
					<h6 class="default">Jakarta, Indonesia 10160</h6>
					<h6 class="telp">  +62 21 3511961</h6>
					<h6 class="fax">  +62 21 3441413</h6>
					<h6 class="default"><a href="mailto:corporate.secretary@acset.co">corporate.secretary@acset.co</a></h6>
			</div>

		</div>

		<div id="contact" class="col-sm-6 nopadding">

			<div class="sitemap">
				
				<div class="search-container">
					<?php 
						echo form_open('dacset/search');
						echo form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'search site here', 'style' => 'width:70%;'));
						echo '<button class="src-btn btn glyphicon glyphicon-search"></button>';
						echo form_close();	
					?>						
				</div>

			</div>				
				<div class="social-container">
						<a href="https://www.linkedin.com/company/3611287?trk=tyah">
							<img src="<?= base_url('assets/image/logo-footer/in.png'); ?>" class="img-responsive">
						</a>
						
						<a href="https://www.facebook.com/AcsetIndonusaTbk/">
							<img src="<?= base_url('assets/image/logo-footer/fb.png'); ?>" class="img-responsive">
						</a>
						<a href="https://twitter.com/ACSET_INDONUSA">
							<img src="<?= base_url('assets/image/logo-footer/twitter.png'); ?>" class="img-responsive">
						</a>
				</div>
				<h6 class="default">Language: <a href="<?= base_url('en/home')?>">English</a> | <a href="<?= base_url('id/home')?>">Indonesia</a></h6>
			</div>

		<div class="clearfix"></div>		
	</div>

	<div class="copyright">
		<div class="frame">
			<h6>2017 PT ACSET Indonusa Tbk. All right reserved.  / <a href="<?php echo base_url('en/about/privacy_en');?>">Privacy Policy</a>  /  <a href="<?php echo base_url('en/about/tnc_en');?>">Terms and Condition</a> </h6>			
		</div>
	</div>

	<div class="super-graphic sg-footer">
		<img src="<?= base_url('assets/image/logo-footer/logoo.png') ?>">
	</div>		

</footer>

<?php
}
?>