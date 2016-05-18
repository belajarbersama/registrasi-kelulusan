    <!--start section-->
    <section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img-excursions">
        <div class="nicdark_filter greydark">
            <!--start nicdark_container-->
            <div class="nicdark_container nicdark_clearfix">
                <div class="grid grid_12">
                    <div class="nicdark_space100"></div>
                    <div class="nicdark_space100"></div>
                    <h1 class="white subtitle">{page}</h1>
                    <div class="nicdark_space10"></div>
                    <h3 class="subtitle white">{sub}</h3>
                    <div class="nicdark_space20"></div>
                    <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
                    <div class="nicdark_space40"></div>
                    <div class="nicdark_space50"></div>
                </div>
            </div>
            <!--end nicdark_container-->
        </div>
    </section>
    <!--end section-->

    <!--start section-->
    <section class="nicdark_section">
        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">
            <div class="nicdark_space50"></div>
            
            <?php
                foreach ($data_jadwal as $key => $value) {
                    ?>
                    <div class="grid grid_3">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <a title="<?php echo date('d-m-Y',strtotime($value->tgl_mulai));?>" href="#" class="nicdark_tooltip nicdark_btn_icon nicdark_bg_greydark white medium nicdark_radius_circle nicdark_absolute_left"><i class="icon-calendar"></i></a>
                            <a title="SD Ar-Rafi'" href="#" class="nicdark_tooltip nicdark_btn_icon nicdark_bg_greydark white medium nicdark_radius_circle nicdark_absolute_right"><i class="icon-location-outline"></i></a>
                            <img alt="" src="<?php echo base_url('assets/homepage/img/events/img4.jpg');?>">
                            <div class="nicdark_textevidence nicdark_bg_greydark center">
                                <h4 class="white nicdark_margin20"><?php echo $value->nama_kegiatan;?></h4>
                            </div>
                            <div class="nicdark_textevidence nicdark_bg_blue center">
                                <h5 class="white nicdark_margin20"><?php echo date('d-m-Y',strtotime($value->tgl_mulai));?></h5>
                                <i class="icon-calendar nicdark_iconbg right medium blue"></i>
                            </div>
                            <div class="nicdark_textevidence center">
                                <div class="nicdark_margin20">
                                    <p><?php echo $value->keterangan;?></p>
                                    <div class="nicdark_space20"></div>
                                    <a href="single-excursion.php" class="nicdark_press white nicdark_btn nicdark_bg_blue medium nicdark_radius nicdark_shadow">Selanjutnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>

        </div>
    </section>
    <!--end section-->
    <div class="nicdark_space3 nicdark_bg_gradient"></div>
</section>
<!--end section-->