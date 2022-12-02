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
                        <span id="jam-load" class="text-white jam-text-value"><?= substr($getApi->data->waktu, 0, -10) ?><br><?= substr($getApi->data->waktu, -5) ?> WIB</span>
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
                            <span class="text-white ug-text" style="font-size: 3vw;" align="right">ug/m<sup>3</sup></span>
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
                    $('.number-text-number').css('font-size', '40vw');
                    $('.number-text-number').css('margin-top', '');
                } else if (category == 2) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'blue');
                    $('.baik-text').html('Sedang');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '40vw');
                    $('.number-text-number').css('margin-top', '');
                } else if (category == 3) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'yellow');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '35vw');
                    $('.number-text-number').css('margin-top', '1vw');
                    $('.number-text h1').css('letter-spacing', '-3vw');
                    $('.baik-text').html('Tidak Sehat');
                } else if (category == 4) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'red');
                    $('.baik-text').html('Sangat Tidak Sehat');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '35vw');
                    $('.number-text-number').css('margin-top', '1vw');
                    $('.number-text h1').css('letter-spacing', '-3vw');
                } else if (category == 5) {
                    $('.number-text').css('background-color', '');
                    $('.number-text').css('background-color', 'black');
                    $('.baik-text').html('Berbahaya');
                    $('.number-text-number').css('font-size', '');
                    $('.number-text-number').css('font-size', '35vw');
                    $('.number-text-number').css('margin-top', '1vw');
                    $('.number-text h1').css('letter-spacing', '-3vw');

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

            e.innerHTML = h + ':' + m + ' WIB';

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
</body>

</html>