<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kementrian Lingkungan Hidup</title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/icon type">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/style-3.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <section id="main" style="display: block; height: 100%">
        <div class="container-fluid layout-baru" style="background-color: #242948;">
            <div class="d-flex justify-content-between navbar-1-baru ">
                <div class="d-flex justify-content-center tempat-gambar">
                    <div class="gambar">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
                    </div>
                    <div class="klu-kiri">
                        <span class="text-center text-white">KEMENTERIAN <br>LINGKUNGAN HIDUP <br>DAN KEHUTANAN</span>
                    </div>
                </div>

                <div class="d-flex justify-content-center tempat-gambar">
                    <div class="gambar">
                        <img src="<?= base_url('assets/img/logo-bengkulu.png') ?>" alt="">
                    </div>
                    <div class="klu-kanan">
                        <span class="text-center text-white">PEMERINTAH <br>KOTA BENGKULU</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center navbar-2-baru">
                <div class="d-flex justify-content-center">
                    <div class="kualitas-text text-center">
                        <span class="text-white">KUALITAS UDARA <br>KOTA BENGKULU</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center navbar-3-baru">
                <div class="d-flex justify-content-center">
                    <div class="jam-text text-center">
                        <span class="text-white jam-text-value"><?= substr($getApi->data->waktu, 0, -10) ?><br></span>
                        <span id="jam-load" class="text-white jam-text-value"></span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center navbar-4-baru">
                <div class="d-flex justify-content-center">
                    <div class="number-text text-center">
                        <h1 class="number-text-number text-center text-white"><?= $getApi->data->o3 ?></h1>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center navbar-5-baru">
                <div class="d-flex justify-content-center">
                    <div class="category-text category-nya text-center">
                        <input hidden class="category" type="text" value="<?= $getApi->data->c_o3 ?>">
                        <span class="text-white baik-text"></span>
                    </div>
                </div>
            </div>

            <div class="row navbar-6-baru">
                <div class="col-kiri col-6">
                    <div class="tes">
                        <div class="lay-param-text">
                            <span class="text-left text-white param-text">Parameter Kritis</span>
                        </div>
                        <div class="d-flex justify-content-end value-text">
                            <span class="o3-text" align="right">O<sub>3</sub></span>
                        </div>
                    </div>
                </div>
                <div class="col-kanan col-6">
                    <div class="tes2">
                        <div class="lay-param-text">
                            <span class="text-left text-white param-text">Nilai Konsentrasi</span>
                        </div>
                        <div class="d-flex justify-content-end value-text">
                            <span class="konsentrasi-text" align="right"><?= $getApi->data->o3; ?></span>
                        </div>
                        <div class="d-flex justify-content-end value-text">
                            <span class="text-white ug-text" align="right">ug/m<sup>3</sup></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="errorya" style="display: none;">
        <div class="errornya">
            <span style="font-size: 20vw;">Tidak ada koneksi Internet !</span>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('document').ready(function() {
            // cek while no internet, show text no connection 
            noInternet();

            function noInternet() {
                var error_text = $('.number-text-number h4').html();
                if (error_text == 'A PHP Error was encountered') {
                    $('.jam-text-value').html('---');
                    $('.number-text-number').html('');
                    $('.baik-text').html('---');
                    $('.konsentrasi-text').html('---');
                    $('.category-nya').html('<span class="text-white text-center baik-text">Tidak Ada Koneksi Internet !</span>');
                } else {
                    $('#main').css('display', 'block');
                    $('#errorya').css('display', 'none');
                }
            }

            // setInterval(ajaxCall, 300000); //300000 MS == 5 minutes
            // setInterval(ajaxCall, 120000); //120000 MS == 2 minutes

            // set interval, reload page every 3 minutes 
            setInterval(ajaxCall, 180000); //180000 MS == 3 minutes

            // change color while category is different, follow the api 
            changeColor();

            function ajaxCall() {
                window.location.reload()
            }

            function changeColor() {
                var category = $('.category').val();
                if (category == 1) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'green');
                    $('.baik-text').html('Baik');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '15.5vw');
                    $('.number-text-number').css('margin-top', '');
                    $('.number-text h1').css('letter-spacing', '-1.2vw');
                } else if (category == 2) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'blue');
                    $('.baik-text').html('Sedang');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '15.5vw');
                    $('.number-text-number').css('margin-top', '');
                    $('.number-text h1').css('letter-spacing', '-1.2vw');
                } else if (category == 3) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'yellow');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '14vw');
                    $('.number-text h1').css('letter-spacing', '-2vw');
                    $('.number-text-number').css('margin-top', '-0.7vw');
                    $('.number-text h1').css('-webkit-text-stroke-width', '0.4vw');
                    $('.baik-text').html('Tidak Sehat');
                } else if (category == 4) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'red');
                    $('.baik-text').html('Sangat Tidak Sehat');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '14vw');
                    $('.number-text h1').css('letter-spacing', '-2vw');
                    $('.number-text-number').css('margin-top', '-0.7vw');
                    $('.number-text h1').css('-webkit-text-stroke-width', '0.4vw');
                } else if (category == 5) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'black');
                    $('.baik-text').html('Berbahaya');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '14vw');
                    $('.number-text h1').css('letter-spacing', '-2vw');
                    $('.number-text-number').css('margin-top', '-0.7vw');
                    $('.number-text h1').css('-webkit-text-stroke-width', '0.4vw');

                }
            }
        })
    </script>

    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam-load'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            if (h == 0) {
                e.innerHTML = '00' + ':' + m + ' WIB';
            } else {
                e.innerHTML = h + ':' + m + ' WIB';
            }

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
        updateData();

        function updateData() {
            $.ajax({
                url: 'https://ispu.menlhk.go.id/internal/web/site/detail-data',
                type: 'GET',
                data: {
                    id: 'BENGKULU'
                },
                success: (function(data) {
                    console.log(data);
                    $('#last-update').html(moment().format('DD-MM-YYYY HH:mm:ss'));
                    if (data.status === 1) {
                        let d = data.data;
                        console.log(d.param);
                        if (d.param !== null)
                            $('#' + d.id_stasiun + '-sum-param').html(d.param);
                        if (d.val !== null)
                            $('#' + d.id_stasiun + '-sum-value').html(d.val);
                        if (d.waktu !== null)
                            $('#' + d.id_stasiun + '-sum-waktu').html(d.waktu);
                        if (d.kons !== null)
                            $('#' + d.id_stasiun + '-sum-kons').html(d.kons);


                        if (d.weather) {
                            $('#' + d.id_stasiun + '-ws-ws').html(d.weather.ws);
                            $('#' + d.id_stasiun + '-ws-wd').html(d.weather.wd);
                            $('#' + d.id_stasiun + '-ws-temperature').html(d.weather.temperature);
                            $('#' + d.id_stasiun + '-ws-humidity').html(d.weather.humidity);
                            $('#' + d.id_stasiun + '-ws-pressure').html(d.weather.pressure);
                            $('#' + d.id_stasiun + '-ws-sr').html(d.weather.sr);
                            $('#' + d.id_stasiun + '-ws-rain-intensity').html(d.weather.rain_intensity);
                            $('#' + d.id_stasiun + '-ws-waktu').html(d.weather.waktu);
                        }

                        if (d.pm10 !== null) {
                            $('#' + d.id_stasiun + '-pm10-val').html(d.pm10);
                            $('#' + d.id_stasiun + '-pm10').removeClass().addClass('value ' + d.cat_pm10).css('height', d.pr_pm10 + '%');
                        } else {
                            $('#' + d.id_stasiun + '-pm10-val').html('-');
                            $('#' + d.id_stasiun + '-pm10').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.pm25 !== null) {
                            $('#' + d.id_stasiun + '-pm25-val').html(d.pm25);
                            $('#' + d.id_stasiun + '-pm25').removeClass().addClass('value ' + d.cat_pm25).css('height', d.pr_pm25 + '%');
                        } else {
                            $('#' + d.id_stasiun + '-pm25-val').html('-');
                            $('#' + d.id_stasiun + '-pm25').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.so2 !== null) {
                            $('#' + d.id_stasiun + '-so2-val').html(d.so2);
                            $('#' + d.id_stasiun + '-so2').removeClass().addClass('value ' + d.cat_so2).css('height', d.pr_so2 + '%');
                        } else {
                            $('#' + d.id_stasiun + '-so2-val').html('-');
                            $('#' + d.id_stasiun + '-so2').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.co !== null) {
                            $('#' + d.id_stasiun + '-co-val').html(d.co);
                            $('#' + d.id_stasiun + '-co').removeClass().addClass('value ' + d.cat_co).css('height', d.pr_co + '%');
                        } else {
                            $('#' + d.id_stasiun + '-co-val').html('-');
                            $('#' + d.id_stasiun + '-co').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.o3 !== null) {
                            $('#' + d.id_stasiun + '-o3-val').html(d.o3);
                            $('#' + d.id_stasiun + '-o3').removeClass().addClass('value ' + d.cat_o3).css('height', d.pr_o3 + '%');
                        } else {
                            $('#' + d.id_stasiun + '-o3-val').html('-');
                            $('#' + d.id_stasiun + '-o3').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.no2 !== null) {
                            $('#' + d.id_stasiun + '-no2-val').html(d.no2);
                            $('#' + d.id_stasiun + '-no2').removeClass().addClass('value ' + d.cat_no2).css('height', d.pr_no2 + '%');
                        } else {
                            $('#' + d.id_stasiun + '-no2-val').html('-');
                            $('#' + d.id_stasiun + '-no2').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.hc !== null) {
                            $('#' + d.id_stasiun + '-hc-val').html(d.hc);
                            $('#' + d.id_stasiun + '-hc').removeClass().addClass('value ' + d.cat_hc).css('height', d.pr_hc + '%');
                        } else {
                            $('#' + d.id_stasiun + '-hc-val').html('-');
                            $('#' + d.id_stasiun + '-hc').removeClass().addClass('value').css('height', 0);
                        }

                        if (d.val !== null) {
                            $('#' + d.id_stasiun + '-category').html(d.cat);
                            $('#kualitas-udara').removeClass().addClass('kualitas-udara ' + d.cat_class);
                        } else {
                            $('#' + d.id_stasiun + '-category').html('-');
                            $('#kualitas-udara').removeClass().addClass('kualitas-udara category-invalid');
                        }

                        if (d.real) {
                            $('#' + d.id_stasiun + '-kons-pm10-val').html(d.real.pm10 == 0 ? '-' : d.real.pm10);
                            $('#' + d.id_stasiun + '-kons-pm25-val').html(d.real.pm25 == 0 ? '-' : d.real.pm25);
                            $('#' + d.id_stasiun + '-kons-so2-val').html(d.real.so2 == 0 ? '-' : d.real.so2);
                            $('#' + d.id_stasiun + '-kons-co-val').html(d.real.co == 0 ? '-' : d.real.co);
                            $('#' + d.id_stasiun + '-kons-o3-val').html(d.real.o3 == 0 ? '-' : d.real.o3);
                            $('#' + d.id_stasiun + '-kons-no2-val').html(d.real.no2 == 0 ? '-' : d.real.no2);
                            $('#' + d.id_stasiun + '-kons-hc-val').html(d.real.hc == 0 ? '-' : d.real.hc);

                            $('#' + d.id_stasiun + '-kons-pm10').removeClass().addClass('value ' + d.real.cat_pm10).css('height', d.real.pr_pm10 + '%');
                            $('#' + d.id_stasiun + '-kons-pm25').removeClass().addClass('value ' + d.real.cat_pm25).css('height', d.real.pr_pm25 + '%');
                            $('#' + d.id_stasiun + '-kons-so2').removeClass().addClass('value ' + d.real.cat_so2).css('height', d.real.pr_so2 + '%');
                            $('#' + d.id_stasiun + '-kons-co').removeClass().addClass('value ' + d.real.cat_co).css('height', d.real.pr_co + '%');
                            $('#' + d.id_stasiun + '-kons-o3').removeClass().addClass('value ' + d.real.cat_o3).css('height', d.real.pr_o3 + '%');
                            $('#' + d.id_stasiun + '-kons-no2').removeClass().addClass('value ' + d.real.cat_no2).css('height', d.real.pr_no2 + '%');
                            $('#' + d.id_stasiun + '-kons-hc').removeClass().addClass('value ' + d.real.cat_hc).css('height', d.real.pr_hc + '%');

                            $('#kons-waktu').html(d.real.waktu);
                        }

                        if (d.pm25_sum) {
                            $('#max-ispu-pm25').html(d.pm25_max);
                            $('#min-ispu-pm25').html(d.pm25_min);
                            $('#avg-ispu-pm25').html(d.pm25_avg);

                            $('#tgl-ispupm25-left').html(d.pm25_wleft);
                            $('#tgl-ispupm25-right').html(d.pm25_wright);
                        } else {
                            $('#max-ispu-pm25').html('MAX: -');
                            $('#min-ispu-pm25').html('MIN: -');
                            $('#avg-ispu-pm25').html('AVERAGE: -');

                            $('#tgl-ispupm25-left').html('-');
                            $('#tgl-ispupm25-right').html('-');
                        }

                        if (d.pm25_kons_sum) {
                            $('#max-kons-pm25').html(d.pm25_kons_max);
                            $('#min-kons-pm25').html(d.pm25_kons_min);
                            $('#avg-kons-pm25').html(d.pm25_kons_avg);

                            $('.w-left').html(d.wleft);
                            $('.w-right').html(d.wright);
                        } else {
                            $('#max-kons-pm25').html('MAX: -');
                            $('#min-kons-pm25').html('MIN: -');
                            $('#avg-kons-pm25').html('AVERAGE: -');

                            $('.w-left').html('-');
                            $('.w-right').html('-');
                        }

                        Chart.helpers.each(Chart.instances, function(instance) {
                            if (instance.chart.canvas.id === d.id_stasiun + 'pm25_ispu') {
                                instance.chart.data.datasets[0].data = d.pm25_24;
                                instance.chart.data.datasets[0].backgroundColor = d.pm25_color;
                                instance.chart.data.labels = d.pm25_waktu;
                                instance.chart.update();
                            } else if (instance.chart.canvas.id === d.id_stasiun + 'pm25_kons') {
                                instance.chart.data.datasets[0].data = d.pm25_kons;
                                instance.chart.data.labels = d.time;
                                instance.chart.update();
                            } else if (instance.chart.canvas.id === d.id_stasiun + 'temperature') {
                                instance.chart.data.datasets[0].data = d.temp;
                                instance.chart.data.labels = d.time;
                                instance.chart.update();
                            } else if (instance.chart.canvas.id === d.id_stasiun + 'pressure') {
                                instance.chart.data.datasets[0].data = d.press;
                                instance.chart.data.labels = d.time;
                                instance.chart.update();
                            } else if (instance.chart.canvas.id === d.id_stasiun + 'humidity') {
                                instance.chart.data.datasets[0].data = d.humidity;
                                instance.chart.data.labels = d.time;
                                instance.chart.update();
                            }
                        });
                    }
                }),
                dataType: 'json'
            });
        }
    </script>
</body>

</html>