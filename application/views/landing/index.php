<!-- template html -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website yang menyajika objek wisata">
    <meta name="author" content="Nama pembuat disini">
    <link rel="icon" href="../../favicon.ico">
    <title>Objek Wisata Maps</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap-progressbar -->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/owlcarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/owlcarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <style>
        body {
            overflow: hidden;
        }

        .map-embed {
            width: 100%;
            height: 100vh;
        }

        .floating-element-cool {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 340px;
            z-index: 999;
        }

        .search-box input#searchField {
            height: 45px;
            width: 100%;
            padding: 0 12px 0 35px;
            background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 12px 17px no-repeat;
            border: none;
            border-radius: 13px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            -moz-box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            -ms-box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            -o-box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            margin: 1rem 0;
            transition: all 0.5s ease-in-out;
        }

        .search-box input#searchField:focus {
            outline: none;
            border-color: #66b1ee;
            transition: all 0.5s ease-in-out;
            -webkit-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -moz-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -ms-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -o-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        .lt-ie9 .search input#searchField {
            line-height: 26px
        }

        #table_dynamic_wrapper>div:nth-child(1) {
            display: none;
        }

        #table_dynamic_wrapper>div:nth-child(2) {
            height: 55rem;
        }

        .map .ol-zoom {
            top: 10px;
            left: auto;
            right: 10px;
        }

        .owl-carousel {
            margin-top: 1rem;
        }

        .owl-carousel .slide {
            height: 160px;
            width: 380px;
            margin: 1rem;
        }

        .owl-carousel .slide .slide-child {
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            box-shadow: rgb(0 0 0 / 2%) 0px 1px 3px 0px, rgb(27 31 35 / 15%) 0px 0px 0px 1px;
            margin: auto;
            display: flex;
            padding: 1rem;
            flex-direction: row;
        }

        .owl-carousel .slide .slide-child .img-wrapper img {
            object-fit: cover;
            width: 139px;
            height: 100%;
            border-radius: 12px;
        }

        .owl-carousel .slide .slide-child .info-overview-wrapper {
            padding-left: 7px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .floating-recommendation {
            position: absolute;
            bottom: -50%;
            width: 100%;
            z-index: 999;
            background: white;
            transition: all 0.5s ease-in-out;
            -webkit-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -moz-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -ms-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -o-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        .button-recommendation {
            background-color: #4CAF50;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            height: 5rem;
            width: 5rem;
            border-radius: 50%;
            position: absolute;
            top: -125%;
            left: 0;
            transform: translateX(50%);
            transition: all 0.5s ease-in-out;
        }

        .button-recommendation svg {
            font-size: 24px;
            margin-bottom: 0px;
            transition: all 0.5s ease-in-out;
        }

        .floating-r-activated {
            bottom: 0 !important;
            transition: all 0.5s ease-in-out;
        }

        .floating-r-activated .button-recommendation{
            top: -45px;
            transition: all 0.5s ease-in-out;
        }

        .floating-r-activated .button-recommendation svg {
            font-size: 30px !important;
            margin-bottom: 0 !important;
            transition: all 0.5s ease-in-out;
        }


        .pong-loader {
            position: absolute;
            margin: 0 auto;
            left: 100px;
            top: 40%;
            height: 40px;
            width: 6px;
            background-color: transparent;
            animation: paddles 0.75s ease-out infinite;
            transform: translate3d(0, 0, 0);
            z-index: 1;
        }

        .pong-loader:before {
            content: "";
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 15px;
            width: 10px;
            height: 10px;
            background-color: #565656d9;
            border-radius: 50%;
            animation: ballbounce 0.6s ease-out infinite;
        }

        @keyframes paddles {
            0% {
                box-shadow: -25px -10px 0px #565656d9, 25px 10px 0px #565656d9;
            }

            50% {
                box-shadow: -25px 8px 0px #565656d9, 25px -10px 0px #565656d9;
            }

            100% {
                box-shadow: -25px -10px 0px #565656d9, 25px 10px 0px #565656d9;
            }
        }

        @keyframes ballbounce {
            0% {
                transform: translateX(-20px) scale(1, 1.2);
            }

            25% {
                transform: scale(1.2, 1);
            }

            50% {
                transform: translateX(15px) scale(1, 1.2);
            }

            75% {
                transform: scale(1.2, 1);
            }

            100% {
                transform: translateX(-20px);
            }
        }

        .leaflet-control-zoom.leaflet-bar.leaflet-control {
            margin-bottom: 50vh !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid content" style="background-color: white; height: 100vh; width: 100%; padding: 0;">
        <section>
            <div class="map-embed" id="map-embed">
                
            </div>
        </section>

        <div class="floating-element-cool">
            <div class="image-container" style="height: 80px; width: auto;">
                <img src="https://desa-pasawahan.kuningankab.go.id/sites/des1857/files/pasawahan.png" alt="Logo Desa Pasawahan" style="object-fit: contain; width: 100%; height: 100%;">
            </div>

            <div class="search-box">
                <input type="text" class="div-control" name="search-loc" id="searchField" placeholder="Cari Nama Lokasi, Lat/Long, atau lainnya..." autocomplete="off" />
            </div>
        </div>
        <div class="floating-recommendation">
            <button class="button-recommendation">
                <i class="fa-solid fa-map-location-dot"></i>
            </button>
            <div>
                <h3 style="text-align: center;margin-top:1rem;">Objek Wisata Pilihan</h3>
                <div class="owl-carousel" id="recommendation-objek-wisata">
                    <?php
                    foreach ($list_objek_wisata as $v) {


                    ?>
                        <div class="slide">
                            <div class="slide-child">
                                <div class="img-wrapper">
                                    <img class="lazy" style="opacity: 0;" alt="Sneakers &amp; Tennis shoes basse" data-src="<?php echo base_url('assets/img/photo/' . $da_controller->ListPicture($v->objek_wisata_id)[0]); ?>" alt="<?php echo $v->nama_objek_wisata; ?>" />
                                    <div class="pong-loader"></div>
                                </div>
                                <div class="info-overview-wrapper">
                                    <h4 style="font-size: 1.2rem;">Nama Tempat</h4>
                                    <p style="font-size: 10px;">Jl. Kampung Jati No.437</p>
                                    <div>
                                        <button class="btn btn-primary" style="margin-right: 9px;"><i class="fa-solid fa-diamond-turn-right"></i></button><button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="<?php echo base_url() ?>assets/vendors/owlcarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script>

    // buat deteksi doang
    function logElementEvent(eventName, element) {
        console.log(Date.now(), eventName, element.getAttribute("data-src"));
    }

    var callback_enter = function(element) {
        logElementEvent("🔑 ENTERED", element);
    };
    var callback_exit = function(element) {
        logElementEvent("🚪 EXITED", element);
    };
    var callback_loading = function(element) {
        logElementEvent("⌚ LOADING", element);
    };
    var callback_loaded = function(element) {
        logElementEvent("👍 LOADED", element);
        // remove next element of element
        element.nextElementSibling.remove();
        element.style.opacity = 1;

    };
    var callback_error = function(element) {
        logElementEvent("💀 ERROR", element);
        element.src =
            "https://via.placeholder.com/440x560/?text=Error+Placeholder";
    };
    var callback_finish = function() {
        logElementEvent("✔️ FINISHED", document.documentElement);
    };
    var callback_cancel = function(element) {
        logElementEvent("🔥 CANCEL", element);
    };

    window.lazyLoadOptions = {
        threshold: 0,
        // Assign the callbacks defined above
        callback_enter: callback_enter,
        callback_exit: callback_exit,
        callback_cancel: callback_cancel,
        callback_loading: callback_loading,
        callback_loaded: callback_loaded,
        callback_error: callback_error,
        callback_finish: callback_finish
    };
    window.addEventListener(
        "LazyLoad::Initialized",
        function(e) {
            console.log(e.detail.instance);
        },
        false
    );
</script>
<script async src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            center: true,
            items: 1,
            loop: false,
            margin: 10,
            autoWidth: true,
            responsive: {
                600: {
                    items: 3
                }
            }
        });

        $(".button-recommendation").click(function() {
            $(".floating-recommendation").toggleClass("floating-r-activated");
        });

        // ref: https://switch2osm.org/using-tiles/getting-started-with-leaflet/


        // // initialize map
        const getLocationMap = L.map('map-embed');

        // initialize OSM
        const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const osmAttrib='Map Objek Wisata © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
        const osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 50, attribution: osmAttrib});		

        getLocationMap.scrollWheelZoom.disable()
        getLocationMap.setView(new L.LatLng('-6.8384545', '108.431134'), 10)
        getLocationMap.addLayer(osm)
        const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);								

        getLocationMap.zoomControl.setPosition('bottomright');

        function refreshMarkers(data) {
        	let list_of_location = data


        	getLocationMap.eachLayer(function (layer) {
        		if (layer.options.attribution !== osmAttrib) {
        			getLocationMap.removeLayer(layer);
        		}
        	})

        	let list_of_location_html = ''
        	for(let i = 0; i < list_of_location.length; i++){

        		list_of_location_html += `<li class="list-group-item" data-lat="${list_of_location[i].latitude}" data-lng="${list_of_location[i].longitude}">${list_of_location[i].nama_objek_wisata}</li>`
        		let marker = L.marker([list_of_location[i].latitude, list_of_location[i].longitude]).addTo(getLocationMap);
        		marker.bindPopup(`<b>${list_of_location[i].nama_objek_wisata}</b><br>${list_of_location[i].alamat}<br>
        		<a href="<?php echo base_url('objek_wisata/update/') ?>${list_of_location[i].objek_wisata_id}" class="btn btn-primary" style="color: white; margin-top: 1rem;">Edit</a>
        		`);

        	}
        	$('.results').html(list_of_location_html)
        }

        $("#searchField").on("keyup change", function() {
        	var input = $(this);
        	table.search(input.val()).draw();

        	var array = table.rows({ search: 'applied' }).data();
        	dataarray = []

        	for(let i = 0; i < array.length; i++){
        		dataarray.push({
        			objek_wisata_id: array[i][1],
        			latitude: array[i][9],
        			longitude: array[i][10],
        			nama_objek_wisata: array[i][2],
        			alamat: array[i][3],
        		})
        	}
        	if(input.val() != ''){
        		$('.indikator-lagi-nyari').html('<b>Pencarian untuk : </b><i>' + input.val() + '</i> (' + dataarray.length + ' data ditemukan)')
        		refreshMarkers(dataarray)
        	} else {
        		$('.indikator-lagi-nyari').empty()
        	}
        });

        function GetListofLocation(){
        	$.ajax({
        		url: '<?= base_url('objek_wisata/get_list_location') ?>',
        		type: 'GET',
        		dataType: 'json',
        		success: function(data){
        			console.log(data)
        			refreshMarkers(data)
        		}
        	})
        }

        GetListofLocation()

        function getToLoc(lat, lng, displayname = null) {
        	const zoom = 17;

        	getLocationMap.setView(new L.LatLng(lat, lng), zoom);
        	getLocationMapMarker.setLatLng([lat, lng])

        }
    });
</script>

</html>