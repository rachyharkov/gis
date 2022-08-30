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
            height: 100%;
        }

        .floating-element-cool {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 340px;
            z-index: 999;
        }

        .search-box {
            overflow: hidden;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            position: relative
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

        .search-box .results {
            background: white;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 0rem 0 0 0;
            max-height: 40vh;
            height: 0;
            overflow: hidden auto;
            transition: all 0.5s ease-in-out;
        }

        .search-box .results.show-results {
            height: 40vh !important;
            transition: all 0.5s ease-in-out;
        }

        #results li a {
            text-decoration: none;
            font-size: 1rem;
            color: black;
            padding: 15px 5px 15px 24px;
        }

        #results li {
            padding: 11px 5px 5px 18px;
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
            height: 0%;
            overflow: hidden;
            width: 100%;
            background: white;
            transition: all 0.5s ease-in-out;
            -webkit-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -moz-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -ms-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            -o-box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        #button-special {
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
            bottom: 2vh;
            left: 0;
            z-index: 999;
            transform: translateX(50%);
            transition: all 0.5s ease-in-out;
        }

        #button-special svg {
            font-size: 24px;
            margin-bottom: 0px;
            transition: all 0.5s ease-in-out;
        }

        .floating-r-activated {
            height: 48vh;
            transition: all 0.5s ease-in-out;
            overflow: hidden auto;
        }

        .a-bit-higher {
            height: 70vh;
        }

        .floating-r-activated .button-recommendation {
            bottom: 28vh !important;
            transition: all 0.5s ease-in-out;
        }

        .floating-r-activated .button-back {
            bottom: 37vh !important;
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
    </style>
</head>

<body>
    <div class="container-fluid content" style="background-color: white; height: 100vh; width: 100%; padding: 0;">
        <section style="display: flex; flex-direction: column; height: 100vh;">
            <div class="map-embed" id="map-embed">
                
            </div>
            <div class="floating-recommendation" id="floating-recommendation">
                <button class="button-recommendation" id="button-special">
                    <i class="fa-solid fa-map-location-dot"></i>
                </button>
                <div class="detail-wrapper">

                </div>
                <div class="floating-wrapper">
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
                                        <h4 style="font-size: 1.2rem;"><?= $v->nama_objek_wisata ?></h4>
                                        <p style="font-size: 10px;"><?= $v->alamat ?></p>
                                        <div>
                                            <a class="btn btn-primary redirect-gmaps" data-lat="<?=$v->latitude?>" data-lng="<?=$v->longitude?>" href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$v->latitude?>+<?=$v->longitude?>" target="_blank" style="margin-right: 9px;"><i class="fa-solid fa-diamond-turn-right"></i></a><button class="btn btn-primary marker-w-info" data-lat="<?=$v->latitude?>" data-lng="<?=$v->longitude?>" id="<?=$v->objek_wisata_id?>" >Detail</button>
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
        </section>

        <div class="floating-element-cool">
            <div class="image-container" style="height: 80px; width: auto;">
                <img src="<?php echo base_url() ?>assets/img/pasawahan-logo.png" alt="Logo Desa Pasawahan" style="object-fit: contain; width: 100%; height: 100%;">
            </div>

            <div class="search-box">
                <input type="text" class="div-control" name="search-loc" id="searchField" placeholder="Cari Nama Lokasi, Lat/Long, atau lainnya..." autocomplete="off" />
                <ul class="results" id="results">

                </ul>
            </div>
        </div>
    </div>

    <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex" id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
            Tautan Google Maps telah terbuka
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
            nav: true,
            dots: true,
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

        var delay = (function () {
			var timer = 0;
			return function (callback, ms) {
				clearTimeout(timer);
				timer = setTimeout(callback, ms);
			};
		})()

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

        function cleanMarkers() {				
			getLocationMap.eachLayer(function (layer) {
				if (layer.options.attribution !== osmAttrib) {
					getLocationMap.removeLayer(layer);
				}
			})
		}

        function insertMarker(list_of_location) {
			for(let i = 0; i < list_of_location.length; i++){
				let marker = L.marker([list_of_location[i].latitude, list_of_location[i].longitude]).addTo(getLocationMap);
				
                marker.bindPopup(`<b>${list_of_location[i].nama_objek_wisata}</b><br>${list_of_location[i].alamat}`);

			}
        }

        function doSearching(elem) {
			$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Mengetik...</li>');
			const search = elem.val()
			delay(function () {
				console.log('test');         
				if(search.length >= 3) {
					$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;"><i class="fa fa-refresh fa-spin"></i> Mencari...</li>');
					const url = '<?php echo base_url().'landing/searchPlace?q=' ?>' + search;
					$.ajax({
						url: url,
						dataType: 'json',
						success: function(data) {
							$('.results').empty();
							if(data.length > 0) {
								$.each(data, function(i, item) {
									$('.results').append('<li><a class="resultnya" data-id="'+ item.objek_wisata_id +'" href="#" data-lat="' + item.latitude + '" data-lng="' + item.longitude + '" data-dispname="' + item.nama_objek_wisata + '">' + item.nama_objek_wisata + '<br/><i class="fa fa-map-marker"></i><span style="margin-left: 13px;font-size: 12px;">'+ item.latitude + ','+ item.longitude +'</span></a></li>');
								})
							} else {
								$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Tidak ditemukan (Mungkin ada yang salah dengan ejaan, typo, atau kesalahan ketik)</li>');
							}
						}
					});
				} else {
					$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Masukan Pencarian (Min. 3 Karakter)</li>');
				}
			}, 1000);
		}

        function fetchDetailPage(id) {

            $.ajax({
                url: '<?= base_url('landing/getdetail/') ?>' + id,
        		type: 'GET',
        		success: function(data){
                    $('.detail-wrapper').css({display: 'block'}).html(data)
                    $('.floating-recommendation').addClass('a-bit-higher')
                    $('#button-special').removeClass().addClass('button-back').html('<i class="fa-solid fa-angle-left"></i>')
                    $('.floating-wrapper').css({display: 'none'})
        		}
            })

        }

        function refreshMarkers(data) {
        	let list_of_location = data
            cleanMarkers()
        	insertMarker(list_of_location)
        }

        $('#searchField').focus(function(){
			$('#results').addClass('show-results')
		}).keyup(function() {
			doSearching($(this))
		})

        $(document).on("click", function(e) {
            if (!$(e.target).closest(".search-box").length) {
                $('#results').removeClass('show-results')
            }
        });

        $('#searchField').on('paste', doSearching($(this)))

        function GetListofLocation(){
            let list_of_location = []
            $.ajax({
                url: '<?= base_url('landing/get_list_location') ?>',
                type: 'GET',
                success: function(data){
                    return data
                }
            })
        }

        function initializeMarkerList() {
            // get list of location
            $.ajax({
                url: '<?= base_url('landing/get_list_location') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data)
                // refreshMarkers(data)
                    insertMarker(data)
                }
            })
        }

        initializeMarkerList()

        function getToLoc(lat, lng, displayname = null) {
        	const zoom = 17;

        	getLocationMap.setView(new L.LatLng(lat, lng), zoom);
        	getLocationMapMarker.setLatLng([lat, lng])

        }

        $(document).on('click', '.button-back', function() {
            $('#floating-recommendation').removeClass('a-bit-higher').addClass('floating-r-activated')
            $('.detail-wrapper').css({display: 'none'}).html('')
            $('.floating-wrapper').css({display: 'block'})
            $('#button-special').removeClass().addClass('button-recommendation').html('<i class="fa-solid fa-map-location-dot"></i>')
        })

        $(document).on('click','.redirect-gmaps', function() {
        
            const lat = $(this).data('lat')
            const lng = $(this).data('lng')

            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()

            getToLoc(lat, lng)
        })

        $(document).on('click', '.marker-w-info', function() {
            const lat = $(this).data('lat')
            const lng = $(this).data('lng')
            const id = $(this).attr('id')

            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()

            getToLoc(lat, lng)

            fetchDetailPage(id)
            
        })

        $(document).on('click', '.resultnya', function(e) {
            e.preventDefault()
            const lat = $(this).data('lat')
            const lng = $(this).data('lng')
            const id = $(this).data('id')
            $('#searchField').val($(this).data('dispname'))
            $('#results').removeClass('show-results')
            $('#floating-recommendation').addClass('floating-r-activated')

            getToLoc(lat, lng)
            fetchDetailPage(id)
        })
    });
</script>

</html>