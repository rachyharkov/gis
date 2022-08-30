<style>
.owl-nav {
    text-align: center;
    font-size: 28px;
    display: flex;
    justify-content: space-evenly;
}
</style>

<div style="padding: 3rem 1rem;">
    <div class="container">
        <div class="row" style="max-width: 768px; margin: auto;">
            <div class="col-md-6">
                <h3 style="margin-bottom: 1.5rem;"><?php echo $nama_objek_wisata; ?></h3>
                <div>
                    <div class="owl-carousel owl-theme">
                        <?php 
                            foreach ($pictures as $value) {
                                ?>
                                <div class="item" style="height: 12rem;width: 100%;">
                                    <img src="<?php echo base_url('assets/img/photo/'.$value); ?>" style="width: 100%;height: 100%;object-fit: contain;"/>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- create button group -->
                <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 1.5rem; width: 77%;margin-left: 14%;">
                    <a class="btn btn-secondary" href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$latitude?>+<?=$longitude?>" target="_blank" rel="noopener noreferrer">Buka di Google Maps</a>
                    <a class="btn btn-success" href="tel:<?=$telpon ?>">Hubungi</a>
                </div>
                <table>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Alamat</label>
                        <p style="font-size: 11px;"><?php echo $alamat; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Jam Buka</label>
                        <p style="font-size: 11px;"><?php echo $jam_buka; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Jam Tutup</label>
                        <p style="font-size: 11px;"><?php echo $jam_tutup; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Telpon</label>
                        <p style="font-size: 11px;"><?php echo $telpon; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Fasilitas</label>
                        <p style="font-size: 11px;"><?php echo $fasilitas; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Harga Tiket</label>
                        <p style="font-size: 11px;"><?php echo $harga_tiket; ?></p>
                    </tr>
                    <tr>
                        <label style="font-size: 12px; font-weight: bold;">Link Video</label>
                        <p style="font-size: 11px;"><?php echo $link_video; ?></p>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var owl = $(".owl-carousel")
    owl.owlCarousel()
    $(document).ready(function() {
        owl.data('owl.carousel').destroy()
        $(".owl-carousel").owlCarousel({
            center: true,
            items: 1,
            nav: true,
            dots: true,
            loop: false,
            dots: true,
        });
    })
</script>