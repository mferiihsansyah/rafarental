 <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                     <li >
                        <a href="<?php echo base_url();?>kendaraan" target="_blank">
                            <i class="menu-icon glyphicon glyphicon-th"></i>
                            <span class="menu-text"> Halaman Customer </span>
                        </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'beranda' ? 'active': '' ?>">
                        <a href="<?php echo base_url();?>admin/">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <!--Databoxes-->
                    <li class="<?php echo $this->uri->segment(2) == 'bus' ? 'active open': '' ?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-text"> Mobil </span>
                            <i class="menu-expanded"></i>
                        </a>    
                        <ul class="submenu">
                            <li class="<?php echo $this->uri->segment(3) == 'tampil' ? 'active': '' ?>">
                                <a href="<?php echo base_url();?>admin/bus/tampil">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Data Mobil </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'kursi' ? 'active': '' ?>">
                                <a href="<?php echo base_url();?>admin/bus/kursi">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Jumlah Kursi </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'tipe' ? 'active': '' ?>">
                                <a href="<?php echo base_url();?>admin/bus/tipe">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Tipe Kendaraan </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'pelanggan' ? 'active open': '' ?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Pelanggan</span>
                            <i class="menu-expanded"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php echo $this->uri->segment(3) == 'tampil' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/pelanggan/tampil">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Data Pelanggan </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'saran' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/pelanggan/saran">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Saran & Keluhan </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'promo' ? 'active open': '' ?>">
                            <a href="<?php echo base_url();?>admin/pelanggan/promo">
                                <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                <span class="menu-text"> Kode Promo </span>
                            </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                   <li class="<?php echo $this->uri->segment(2) == 'tagihan' ? 'active open': '' ?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-barcode"></i>
                            <span class="menu-text"> Tagihan</span>
                            <i class="menu-expanded"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php echo $this->uri->segment(3) == 'cancel' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/tagihan/cancel">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Tagihan Dibatalkan </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'pending' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/tagihan/pending">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Tagihan Pending </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'confirm' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/tagihan/confirm">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Tagihan Konfirmasi </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'process' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/tagihan/process">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Tagihan Berjalan </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'clear' ? 'active open': '' ?>">
                            <a href="<?php echo base_url();?>admin/tagihan/clear">
                                <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                <span class="menu-text"> Tagihan Selesai </span>
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'waitinglist' ? 'active open': '' ?>">
                        <a href="<?php echo base_url();?>admin/waitinglist">
                            <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                            <span class="menu-text"> Waiting List </span>
                        </a>
                    </li>
                    <!--
                     <li class="<?php echo $this->uri->segment(2) == 'halaman' ? 'active open': '' ?>">
                        <a href="<?php echo base_url();?>admin/halaman">
                            <i class="menu-icon fa fa-sitemap"></i>
                            <span class="menu-text"> Halaman</span>
                        </a>
                    </li>
                -->
                    <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active open': '' ?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-book"></i>
                            <span class="menu-text"> Laporan </span>
                            <i class="menu-expanded"></i>
                        </a>    
                        <ul class="submenu">
                            <li class="<?php echo $this->uri->segment(3) == 'cs' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/laporan/cs">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Laporan Pelanggan </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'mobil' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/laporan/mobil">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Laporan Mobil </span>
                                </a>
                            </li>
                             <li class="<?php echo $this->uri->segment(3) == 'transaksi' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/laporan/transaksi">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Laporan Transaksi </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'setting' ? 'active open': '' ?>">
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-cog"></i>
                            <span class="menu-text"> Pengaturan</span>
                            <i class="menu-expanded"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?php echo $this->uri->segment(3) == 'website' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/setting/website">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Website </span>
                                </a>
                            </li>
                            <li class="<?php echo $this->uri->segment(3) == 'bank' ? 'active open': '' ?>">
                                <a href="<?php echo base_url();?>admin/setting/bank">
                                    <i class="menu-icon glyphicon glyphicon-tasks"></i>
                                    <span class="menu-text"> Bank </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'chatting' ? 'active open': '' ?>">
                        <a href="<?php echo base_url();?>admin/chatting">
                            <i class="menu-icon glyphicon glyphicon-inbox"></i>
                            <span class="menu-text"> Chatting </span>
                        </a>
                    </li>
                </ul>
                <!-- /Sidebar Menu -->
            </div>