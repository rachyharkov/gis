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
                    <button type="button" class="btn btn-secondary">Buka di Google Maps</button>
                    <button type="button" class="btn btn-secondary">Hubungi</button>
                </div>
                <table>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Jam Buka</td>
                        <td><?php echo $jam_buka; ?></td>
                    </tr>
                    <tr>
                        <td>Jam Tutup</td>
                        <td><?php echo $jam_tutup; ?></td>
                    </tr>
                    <tr>
                        <td>Telpon</td>
                        <td><?php echo $telpon; ?></td>
                    </tr>
                    <tr>
                        <td>Fasilitas</td>
                        <td><?php echo $fasilitas; ?></td>
                    </tr>
                    <tr>
                        <td>Harga Tiket</td>
                        <td><?php echo $harga_tiket; ?></td>
                    </tr>
                    <tr>
                        <td>Link Video</td>
                        <td><?php echo $link_video; ?></td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td><?php echo $latitude; ?></td>
                    </tr>
                    <tr>
                        <td>Longitude</td>
                        <td><?php echo $longitude; ?></td>
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