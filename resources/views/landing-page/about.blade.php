@extends('landing-page.layout.main-layout')
@section('title', 'Beranda Pengguna')
@include('landing-page.layout.navigation')
@section('container')

<div class="content">
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5" style="margin-top: 50px;">
            <div class="col-10 col-sm-8 col-lg-6">
                <h2 class="display-5 fw-bold lh-1 mb-3">About US</h2>
                <h1 class="display-2 fw-bold text-body-emphasis lh-1 mb-3">Sintesia</h1>
                <p class="custom-lead" style="font-size:13px">
                    Diambil dari kata “synthesis” yang berarti gabungan gagasan untuk membentuk teori atau sistem baru, atau percampuran gagasan, pengaruh, dan hal-hal yang berbeda menjadi satu kesatuan yang berbeda atau baru.
                </p>
                <p class="custom-lead"  style="font-size:13px">
                    Sintesia mengacu pada apa yang ingin kami lakukan melalui organisasi ini, yaitu membentuk sistem yang membangun kesejahteraan hewan dengan menggabungkan beberapa ide, teori, dan basis pengetahuan yang kami miliki.
                </p>
            </div>
            <div class="col-lg-6" style="height: 260px">
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('landing-page/images/dokumentasi_1.png') }}" class="d-block mx-auto img-fluid" alt="Slide 1" width="700" height="500" loading="lazy">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('landing-page/images/dokumentasi_2.jpg') }}" class="d-block mx-auto img-fluid" alt="Slide 2" width="700" height="500" loading="lazy">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('landing-page/images/dokumentasi_3.png') }}" class="d-block mx-auto img-fluid" alt="Slide 3" width="700" height="500" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="custom-heading fw-bold text-body-emphasis">Animalia</h2>
                <p class="custom-lead" style="font-size:13px">Animalia mengacu pada kerajaan animalia, yang mencakup setiap spesies hewan dan juga manusia. Menjadi target kami untuk membantu setiap hewan dan bahkan mendukung kesejahteraan manusia untuk kesejahteraan hewan dengan cara yang juga mendukung lingkungan kita.</p>
            </div>
            <div class="col-md-6 ">
                <h2 class="custom-heading fw-bold text-body-emphasis">Indonesia</h2>
                <p class="custom-lead" style="font-size:13px">Indonesia mengacu pada tempat kita ingin bekerja.</p>
            </div>
        </div>
    </div>

    <div class="text-center">
        <div class="col-12 col-sm-12 col-lg-12">
            <h2 class="custom-heading fw-bold mb-5" style="color:#ce2127;">Sejarah Sintesia Animalia Indonesia</h2>
            <div class="responsive-ul">
            <ul class="nav nav-tabs justify-content-center mb-4" style="border-bottom:none;">
                <li class="nav-item">
                    <a class="btn-danger rounded me-3"  style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2017">2017</a>
                </li>
                <li class="nav-item">
                    <a class="btn-danger rounded me-3" style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2018">2018</a>
                </li>
                <li class="nav-item">
                    <a class="btn-danger rounded me-3"style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2019">2019</a>
                </li>
                <li class="nav-item">
                    <a class="btn-danger rounded me-3"style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2020">2020</a>
                </li>
                <li class="nav-item">
                    <a class="btn-danger rounded me-3"style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2021">2021</a>
                </li>
                <li class="nav-item">
                    <a class="btn-danger rounded me-3"style="font-size: 20px; padding: 10px 30px;" data-toggle="tab" href="#tab-2022">2022</a>
                </li>
            </ul>
        </div>
            <div class="tab-content container">
                <div id="tab-2017" class="tab-pane fade show active">
                    <p class="custom-lead fw-bold" style="font-size:13px">Animals Internasional atau Animals Australia membentuk Tim Animals International Bali untuk melakukan proyek penelitian perdagangan daging anjing. </p>
                </div>
                <div id="tab-2018" class="tab-pane fade">
                    <p class="custom-lead fw-bold" style="font-size:13px">Inisiatif Perdagangan Daging Anjing dimulai di empat dari sembilan kabupaten dan kotamadya di Bali, kemudian diperluas hingga mencakup setiap kabupaten dan kotamadya di Bali. Tim mengembangkan hubungan yang baik dan kuat dengan pemangku kepentingan di Bali.</p>
                </div>
                <div id="tab-2019" class="tab-pane fade">
                    <p class="custom-lead fw-bold" style="font-size:13px">Bali Animal Defender didirikan dan menangani kasus kekejaman pertama mereka dengan Polsek Blahbatuh di Kabupaten Gianyar, Bali. Ini adalah kasus kekejaman terhadap hewan pertama di Indonesia yang berhasil diadili berdasarkan hukum kekejaman terhadap hewan di Indonesia.</p>
                    <p class="custom-lead fw-bold" style="font-size:13px">Sementara itu, Tim Animals International Bali terus mengerjakan Proyek Perdagangan Daging Anjing dan proyek kecil lainnya di Bali.</p>
                </div>
                <div id="tab-2020" class="tab-pane fade">
                    <p class="custom-lead fw-bold" style="font-size:13px">Tim Animals International Bali bertemu dengan Bali Animal Defender dan memulai kerjasama. Animals Australia mendukung kedua tim untuk peningkatan kapasitas mereka (termasuk memberikan pendampingan, dukungan, dan pelatihan dari pendekatan yang sebagian besar reaktif ke pendekatan yang lebih terencana, berkelanjutan, dan terarah).</p>
                </div>
                <div id="tab-2021" class="tab-pane fade">
                    <p class="custom-lead fw-bold" style="font-size:13px">Tim Animals International Bali dan Bali Animal Defender membangun hubungan yang lebih kuat dan mengembangkan kebijakan kerja yang lebih baik dengan menggabungkan kedua kemampuan tersebut. Bali Animal Defender telah berhasil menyelesaikan lebih dari 100 kasus minor kesejahteraan hewan melalui mediasi yang melibatkan pemerintah daerah dan perangkat desa, serta berhasil menuntut 3 kasus kekejaman terhadap hewan besar di Bali. Kami juga mampu membangun kepercayaan antar lembaga pemerintah dan berhasil meyakinkan 3 lembaga fundamental pemerintah (Polri, Satpol PP, dan TNI) untuk menjadi pengawas Bali Animal Defender, mendapat dukungan dari berbagai pemangku kepentingan.</p>
                </div>
                <div id="tab-2022" class="tab-pane fade">
                    <p class="custom-lead fw-bold" style="font-size:13px">Animals Australia memfasilitasi kedua tim untuk menjadi tim yang lebih profesional dan efisien. Tim Animals International Bali dan Bali Animal Defender memutuskan untuk menggabungkan kedua keterampilan tersebut untuk menciptakan organisasi kesejahteraan hewan yang lebih baik, lebih kuat. Gunakan strategi ahli untuk menyelesaikan masalah kesejahteraan hewan di Indonesia dan dapatkan lebih banyak kepercayaan dari pemerintah Indonesia dan publik.</p>
                    <p class="custom-lead fw-bold" style="font-size:13px">Tujuannya adalah untuk menggabungkan kekuatan masing-masing tim: Bali Animal Defender memiliki pengalaman yang baik menggunakan hukum dalam kasus individu sementara Tim Animals International Bali fokus pada pendekatan ilmiah dan hukum secara umum.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
