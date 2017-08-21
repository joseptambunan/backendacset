    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">ACSET Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= base_url('admin/signout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
<!--                         <li>
                            <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> -->
                        <li>
                            <a href=""><i class="fa fa-home fa-fw"></i> Home/Beranda <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/sliding_banner') ?>">Sliding Banner</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/still_banner') ?>">Still Banner</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/why_acset') ?>">Why ACSET - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/mengapa_acset') ?>">Mengapa ACSET - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/projects') ?>">Projects - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/proyek') ?>">Proyek - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/our_clients') ?>">Our Clients</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-fw"></i> About Us/Tentang Kami <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/greetings') ?>">Greetings - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/sambutan') ?>">Sambutan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/visionmission') ?>">Vision and Mission - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/visimisi') ?>">Visi dan Misi - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/philosophy') ?>">Corporate Philosophy - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/filosofi') ?>">Filosofi Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/principal') ?>">Corporate Principal - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/prinsip') ?>">Prinsip Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/glance') ?>">ACSET at Glance - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/sekilas') ?>">Sekilas ACSET - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/milestone') ?>">Milestone</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/commissioners') ?>">Board of Commissioners - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/komisaris') ?>">Dewan Komisaris - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/directors') ?>">Board of Directors - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/direksi') ?>">Dewan Direksi - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/subsidiaries') ?>">Subsidiaries - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/anakperusahaan') ?>">Anak Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/achievement') ?>">Achievement - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/penghargaan') ?>">Penghargaan - ID</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Expertise/Spesialisasi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/expertise') ?>">Our Expertise - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/spesialisasi') ?>">Spesialisasi Kami - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/foundation') ?>">Foundation - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/fondasi') ?>">Fondasi - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/demolition') ?>">Demolition - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pembongkaran') ?>">Pembongkaran - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/building') ?>">Building Construction - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/bangunan') ?>">Konstruksi Bangunan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/civil') ?>">Civil Construction - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/sipil') ?>">Konstruksi Sipil - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/mep_en') ?>">MEP - EN</a>
                                </li> 
                                <li>
                                    <a href="<?= base_url('admin/mep_id') ?>">MEP - ID</a>
                                </li>     
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building fa-fw"></i> Projects/Proyek <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/fondasi_proyek') ?>">Foundation</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/perkantoran') ?>">Office Blocks</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/perbelanjaan') ?>">Mall and Shopping Area</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/hotel') ?>">Hotel and High-Rise Residential</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/industri') ?>">Industrial Building</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/lainlain') ?>">Others</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/silo') ?>">Silos</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/listrik') ?>">Power Plant</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/tol') ?>">Toll-Road Supporting Facilities</a>
                                </li>   
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw"></i> Governance <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/governanceglance') ?>">Good Corporate Governance at A Glance - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/tatakelolasekilas') ?>">Sekilas Tata Kelola Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/governanceobjectives') ?>">Good Corporate Governance Objectives - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/tujuantatakelola') ?>">Tujuan Tata Kelola Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/governanceroadmap') ?>">GCG Roadmap - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/roadmaptatakelola') ?>">Roadmap Tata Kelola Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/governanceimplementation') ?>">Implementation of Good Corporate Governance - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/implementasitatakelola') ?>">Implementasi Tata Kelola Perusahaan yang Baik - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/governancestructure') ?>">Corporate Governance Structure - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/strukturtatakelola') ?>">Struktur Tata Kelola Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/governancedocuments') ?>">Supporting Documents for GCG - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/dokumentatakelola') ?>">Dokumen Pendukung Tata Kelola Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/auditcommittee') ?>">Audit Committee - EN</a>
                                </li> 
                                <li>
                                    <a href="<?= base_url('admin/komiteaudit') ?>">Komite Audit - ID</a>
                                </li> 
                                <li>
                                    <a href="<?= base_url('admin/auditcommitteeprofile') ?>">Audit Committee Profile - EN</a>
                                </li>  
                                <li>
                                    <a href="<?= base_url('admin/profilkomiteaudit') ?>">Profil Komite Audit - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/nomination') ?>">Nomination and Remuneration Committee - EN</a>
                                </li> 
                                <li>
                                    <a href="<?= base_url('admin/nominasi') ?>">Komite Nominasi dan Remunerasi - ID</a>
                                </li>  
                                <li>
                                    <a href="<?= base_url('admin/nominationprofile') ?>">Nomination and Remuneration Committee Profile - EN</a>
                                </li>  
                                <li>
                                    <a href="<?= base_url('admin/profilnominasi') ?>">Profil Komite Nominasi dan Remunerasi - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/internalunit') ?>">Internal Audit Unit - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/unitinternal') ?>">Unit Audit Internal - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/internalunitprofile') ?>">Internal Audit Unit Profile - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/profilunitinternal') ?>">Profil Unit Audit Internal - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/secretary') ?>">Corporate Secretary - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/sekretaris') ?>">Sekretaris Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/secretaryprofile') ?>">Corporate Secretary Profile - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/profilsekretaris') ?>">Profil Sekretaris Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/relation') ?>">Investor Relations - EN</a>
                                </li>  
                                <li>
                                    <a href="<?= base_url('admin/relasi') ?>">Hubungan Investor - ID</a>
                                </li>    
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Investor <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/investorglance') ?>">Investor Relations at a Glance - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/investorsekilas') ?>">Sekilas Tentang Hubungan Investor - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/laporankeuangan') ?>">Financial Report</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/laporantahunan') ?>">Annual Report</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/laporanprospektus') ?>">Prospectus Report</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/laporananalis') ?>">Analyst Report</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/sahamkomposisi') ?>">Shareholder Composition</a>
                                </li>   
                                <li>
                                    <a href="<?= base_url('admin/sahamstruktur') ?>">Shareholder Structure</a>
                                </li>   
                                
                                <li>
                                    <a href="<?= base_url('admin/stockinformation') ?>">Stock Information - EN</a>
                                </li>  
                                <li>
                                    <a href="<?= base_url('admin/sahaminformasi') ?>">Informasi Saham - ID</a>
                                </li>   
                                <li>
                                    <a href="<?= base_url('admin/dividen') ?>">Dividend</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/ikhtisar') ?>">Financial Highlights</a>
                                </li>   
                                <li>
                                    <a href="<?= base_url('admin/regulasi') ?>">Regulation Filling</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/acarapresentasi') ?>">Event and Presentation</a>
                                </li>   
                                <li>
                                    <a href="<?= base_url('admin/keterbukaan') ?>">Disclosure</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> CSR <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/csr') ?>">Corporate Social Responsibility - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/csr_id') ?>">Tanggung Jawab Sosial Perusahaan - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actrees') ?>">ACTrees - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actrees_id') ?>">ACTrees - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actgrowth') ?>">ACTGrowth - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actgrowth_id') ?>">ACTGrowth - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actfuture') ?>">ACTFuture - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actfuture_id') ?>">ACTFuture - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actcare') ?>">ACTCare - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/actcare_id') ?>">ACTCare - ID</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-video-camera fa-fw"></i> Media <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/pressrelease') ?>">Press Release - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/siaranpers') ?>">Siaran Pers - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/news') ?>">News - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/berita') ?>">Berita - ID</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/announcement') ?>">Announcement - EN</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pengumuman') ?>">Pengumuman - ID</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-o fa-fw"></i> Career <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/career') ?>">Career Open</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog"></i> Setting <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('admin/setting') ?>"> Maintenance</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/logs') ?>"> Log</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <?php 
                            $data = $this->help->get_menu('catalyst-attribute',true);

                            $c = count($data['attribute']['main_menu']);
                            $d = count($data['attribute']['sub_menu']);
                            
                            for ($i=0; $i < $c; $i++) 
                            {
                                $index = $i+1;
                                $key = $data['attribute']['main_menu'][$i]['menu'.$index];
                                $link = $data['attribute']['main_menu'][$i]['link'];
                                $icon = $data['attribute']['main_menu'][$i]['icon'];        

                                if($link == '#'): $arrow = '<span class="fa arrow"></span>';
                                else: $arrow = null;
                                endif;

                                echo    '<li>'.
                                            '<a href="'.base_url($link).'" class="'.$key.'"><i class="fa fa-'.$icon.' fa-fw"></i> '.ucfirst($key).$arrow.'</a>';

                                if($data['attribute']['sub_menu'][$i][$key] !== ""):
                                    $second_menu = $data['attribute']['sub_menu'][$i][$key];
                                    $second_link = $data['attribute']['sub_menu'][$i]['link'];
                                    
                                    $raw_menu = explode(',',$second_menu);
                                    $raw_link = explode(',',$second_link);            
                                    
                                    $e = count($raw_menu);

                                    echo    '<ul class="nav nav-second-level">';

                                    for ($j=0; $j < $e; $j++) 
                                    {
                                        echo   '<li>'.
                                                    '<a href="'.base_url($raw_link[$j]).'">'.ucfirst($raw_menu[$j]).'</a>'.
                                                '</li>';
                                    }

                                    echo    '</ul>'.
                                         '</li>';

                                endif;
                            }
                        ?>                -->         
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">        