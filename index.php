<?php

$result = [];
$videos = [
    [
        'video' => '/assets/video/video-1.mp4',
        'thumb' => '/assets/video/thumb-1.jpg',
    ],
    [
        'video' => '/assets/video/video-2.mp4',
        'thumb' => '/assets/video/thumb-2.jpg',
    ],
    [
        'video' => '/assets/video/video-3.mp4',
        'thumb' => '/assets/video/thumb-3.jpg',
    ],
    [
        'video' => '/assets/video/video-4.mp4',
        'thumb' => '/assets/video/thumb-4.jpg'
    ],
];
shuffle($videos);
if (count($_POST) > 0) {
    $order = $_POST['order'] ?? [];

    if ( ! empty($order)) {
        $title            = $order['title'] ?? null;
        $text             = array_filter(["Подгузники SENSO", $title, $order['message'] ?? null]);
        $order['message'] = implode("\n", $text);
        $order['key']     = md5(date('Y-m-d') . 'ipopoOrder');
        $url              = 'https://ipopokids.ua/api/save-from-senso-request';
        $ch               = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $order);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        try {
            $result = json_decode($result, true);
        }catch (Exception $e){
            $result = [];
        }
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P6PB3NC');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Детские подгузники Senso в Украине</title>

</head>
<body data-spy="scroll" data-target=".navbar">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P6PB3NC"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php if ( ! empty($result)): ?>

    <div class="modal fade" id="response" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-<?= $result['success'] ? 'success' : 'danger' ?>">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4><?= $result['message'] ?></h4>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="page-wrapper" id="page-top">
    <header id="hero">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#page-top">
                <img src="assets/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#page-top">Главная <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#features">Преимущества</a>
                    <a class="nav-item nav-link" href="#developing-process">Технологии</a>
                    <a class="nav-item nav-link" href="#pricing">Цены</a>
                    <a class="nav-item nav-link" href="#reviews">Отзывы</a>
                    <a class="nav-item nav-link" href="#gallery">Сертификаты качества</a>
                    <a class="nav-item nav-link" href="#contact">Заказать подгузники</a>
                    <span class="divider"></span>
                    <span class="nav-info">+ 38 (050) 355-51-56</span>
                </div>
            </div>
        </nav>

        <div class="hero__background">
            <div class="background-wrapper" data-parallax="scroll" data-parallax-speed="3">
                <div class="background">
                    <div class="owl-carousel hero__slider parallax-element" data-owl-items="1" data-owl-autoplay="1"
                         data-owl-dots="0" data-owl-nav="1" data-owl-loop="1" data-owl-fadeout="1"
                         data-owl-nav-container=".slider-nav">
                        <div class="slide img-into-bg">
                            <img src="assets/img/slide-01.jpg" alt="">
                        </div>
                        <div class="slide img-into-bg">
                            <img src="assets/img/slide-02.jpg" alt="">
                        </div>
                        <div class="slide img-into-bg">
                            <img src="assets/img/slide-04.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="hero__outer-wrapper">
                    <div class="hero__inner-wrapper align-bottom">
                        <div class="col-xl-5 col-lg-5 col-md-7">
                            <div class="hero__caption has-dark-background">
                                <h1>Подгузники Senso Baby</h1>
                                <form class="form" id="oneClick" method="post" onsubmit="oneClickValidate(event)">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="form-hero-email" type="tel" inputmode="tel" class="form-control"
                                                   placeholder="Введите телефон" aria-label="Введите телефон"
                                                   name="order[phone]">
                                            <input type="hidden" name="order[type]" value="1">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </span>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="slider-nav"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="content">
        <section class="block" id="features">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title text-center">
                        <h2>Преимущества подгузников Senso Baby</h2>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <a href="#" class="box box--image box--image--full-image" data-toggle="modal"
                               data-target="#modal-feature" data-scroll-reveal="enter left and move 10px">
                                <div class="box__wrapper">
                                    <div class="box__header">
                                        <div class="box__image img-into-bg">
                                            <img src="assets/img/image-01.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__content">
                                        <h4>КОМФОРТ для малыша</h4>
                                        <h5>Узнать подробнее</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <a href="#" class="box box--image box--image--full-image" data-toggle="modal"
                               data-target="#modal-feature" data-scroll-reveal="enter bottom and move 10px after">
                                <div class="box__wrapper">
                                    <div class="box__header">
                                        <div class="box__image img-into-bg">
                                            <img src="assets/img/image-02.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__content">
                                        <h4>СПОКОЙСТВИЕ во время сна
                                        </h4>
                                        <h5>Узнать подробнее</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-md-3 offset-lg-0">
                            <a href="#" class="box box--image box--image--full-image" data-toggle="modal"
                               data-target="#modal-feature" data-scroll-reveal="enter right and move 10px">
                                <div class="box__wrapper">
                                    <div class="box__header">
                                        <div class="box__image img-into-bg">
                                            <img src="assets/img/image-10.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__content">
                                        <h4>Инновационная 3D-система впитывания</h4>
                                        <h5>Узнать подробнее</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="background-wrapper" data-background-color="#f9f9f9">
                <div class="background--image opacity-10 background--repeat-repeat">
                    <img src="assets/img/pattern-topo.png" alt="">
                </div>
            </div>
        </section>

        <section class="block" id="text-image-block">
            <div class="container">
                <div class="block__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-align-right push-down">
                                <h3 data-scroll-reveal="enter left and move 10px">Подгузники «SENSO BABY» — это самые
                                    современные технологии, экологичное сырье и непрерывный контроль качества!</h3>
                                <a href="#contact" class="btn btn-primary btn-framed">Заказать подгузники</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img class="width-100 shadow rounded-corners" src="assets/img/image-04.jpg" alt="">
                        </div>
                    </div>
                    <div class="background-wrapper">
                        <div class="background background--image opacity-70 background--repeat-repeat height-50">
                            <img src="assets/img/pattern-dot.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block" id="developing-process">
            <div class="container">
                <div class="block__title text-center">
                    <h2>Технологии изготовления</h2>
                </div>
                <div class="block__wrapper">

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                            <img src="assets/img/image-05.jpg" class="width-100 shadow rounded-corners" alt="">
                        </div>
                        <div class="col-md-6">
                            <ul class="list list--text list--dashed">
                                <li data-scroll-reveal="enter bottom and move 10px">
                                    <h5 class="opacity-50"><strong> </strong></h5>
                                    <h4>Основные характеристики подгузников «SENSO BABY»</h4>
                                    <p>
                                        <br>КОМФОРТ для Вашего малыша
                                        <br>СУХОСТЬ на длительное время
                                        <br>БЕЗОПАСНОСТЬ для чувствительной кожи ребенка
                                        <br>СПОКОЙСТВИЕ во время сна и прогулок
                                        <br>Эластичные боковые «ушки» обеспечивают идеальное прилегание к телу малыша.
                                        <br>ADL-технология равномерно распределяет влагу по всей поверхности
                                        впитывающего слоя, не допуская комкова
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                            <img src="assets/img/image-06.jpg" class="width-100 shadow rounded-corners" alt="">
                        </div>
                        <div class="col-md-6">
                            <ul class="list list--text list--dashed">
                                <li data-scroll-reveal="enter bottom and move 10px after 0.1s">
                                    <h5 class="opacity-50"><strong> </strong></h5>
                                    <h4>Подгузники «SENSO BABY» — это современные технологии, экологичное сырье и
                                        непрерывный контроль качества!</h4>
                                    <p>
                                        Надежные и мягкие боковые барьерчики предохраняют от бокового протекания в любой
                                        ситуации. Многоразовые липучки гарантируют надежную и комфортную фиксацию
                                        подгузников. Анатомическая форма подгузника обеспечивает идеальную посадку на
                                        теле малыша, как во время сна, так и во время активных игр. Дышащий наружный
                                        слой с мельчайшими микропорами, изготовленный из нетканого материала,
                                        предотвращает появление раздражения и опрелостей на чувствительной детской коже.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                            <img src="assets/img/image-07.jpg" class="width-100 shadow rounded-corners" alt="">
                        </div>
                        <div class="col-md-6">
                            <ul class="list list--text list--dashed">
                                <li data-scroll-reveal="enter bottom and move 10px after 0.2s">
                                    <h5 class="opacity-50"><strong> </strong></h5>
                                    <h4>Подгузники «SENSO BABY» - лучший выбор для ребенка</h4>
                                    <p>
                                        Нежные и эластичные резиночки не сдавливают ножки малыша и не оставляют следов.
                                        Инновационная 3D-система впитывания состоит из нескольких слоев и содержит
                                        улучшенный абсорбирующий материал (SAP) и натуральную природную целлюлозу,
                                        обеспечивающие сверхвысокую впитываемость. Крем-бальзам - внутренняя поверхность
                                        подгузника мягкая и приятная на ощупь. Нанесенный крем-бальзам дополнительно
                                        ухаживает за нежной кожей ребенка. Его состав абсолютно безвреден для кожи, ведь
                                        он прошел системный контроль качества
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="background-wrapper">
                        <div class="background--particles">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block" id="pricing">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                        <h2>Цены на подгузники</h2>
                    </div>

                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские senso baby B2 Mini (3-6 kg)</h4>
                                        <h3 class="price">от 84 до 243 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>26 шт. в упаковке - 84 грн<sup class="badge badge-success">3,23
                                                    грн/шт</sup></li>
                                            <li>52 шт. в упаковке - 163 грн<sup class="badge badge-success">3,13
                                                    грн/шт</sup></li>
                                            <li>80 шт. в упаковке - 243 грн<sup class="badge badge-success">3,04
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские senso baby B2 Mini (3-6 kg)">Заказать
                                            подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px after 0.1s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские senso baby B3 Midi (4-9 kg)</h4>
                                        <h3 class="price">от 84 до 243 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>22 шт. в упаковке - 84 грн<sup class="badge badge-success">3,8
                                                    грн/шт</sup></li>
                                            <li>44 шт. в упаковке - 163 грн<sup class="badge badge-success">3,7
                                                    грн/шт</sup></li>
                                            <li>70 шт. в упаковке - 243 грн<sup class="badge badge-success">3,47
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские senso baby B3 Midi (4-9 kg)">Заказать
                                            подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-md-3 offset-lg-0">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px after 0.2s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские senso baby B4 Maxi (7-18 kg)</h4>
                                        <h3 class="price">от 84 до 265 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>19 шт. в упаковке - 84 грн<sup class="badge badge-success">4,42
                                                    грн/шт</sup></li>
                                            <li>40 шт. в упаковке - 163 грн<sup class="badge badge-success">4,07
                                                    грн/шт</sup></li>
                                            <li>66 шт. в упаковке - 265 грн<sup class="badge badge-success">4,02
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские senso baby B4 Maxi (7-18 kg)">Заказать
                                            подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_4.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские senso baby B5 Junior (11-25 kg)</h4>
                                        <h3 class="price">от 84 до 265 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>16 шт. в упаковке - 84 грн<sup class="badge badge-success">5,25
                                                    грн/шт</sup></li>
                                            <li>32 шт. в упаковке - 164 грн<sup class="badge badge-success">5,15
                                                    грн/шт</sup></li>
                                            <li>56 шт. в упаковке - 265 грн<sup class="badge badge-success">5,73
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские senso baby B5 Junior (11-25 kg)">Заказать
                                            подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px after 0.1s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_5.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские EcoLine</h4>
                                        <h3 class="price">от 129 до 143 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>D2, 3-6 кг 52 шт/уп. - 129 грн<sup class="badge badge-success">2,48
                                                    грн/шт</sup></li>
                                            <li>D3, 4-9 кг 44 шт/уп. - 129 грн<sup class="badge badge-success">2,93
                                                    грн/шт</sup></li>
                                            <li>D4, 7-18 кг 40 шт/уп. - 129 грн<sup class="badge badge-success">3,22
                                                    грн/шт</sup></li>
                                            <li>D5, 11-25 кг 32 шт/уп. - 129 грн<sup class="badge badge-success">4,03
                                                    грн/шт</sup></li>
                                            <li>D6, 15-30 кг 32 шт/уп. - 143 грн<sup class="badge badge-success">4,46
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские EcoLine">Заказать подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-md-3 offset-lg-0">
                            <div class="box box--pricing" data-scroll-reveal="enter bottom and move 10px after 0.2s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="assets/img/product_6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Подгузники детские senso baby B5 Jun Extra (15-30 kg)</h4>
                                        <h3 class="price">333 грн</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>64 шт. в упаковке - 333 грн<sup class="badge badge-success">5,20
                                                    грн/шт</sup></li>
                                        </ul>
                                    </div>
                                    <div class="box__etc">
                                        <div class="delivery">
                                            Доставка 25 грн
                                        </div>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary order"
                                           data-order="Подгузники детские senso baby B5 Jun Extra (15-30 kg)">Заказать
                                            подгузники</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="reviews" class="block">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                        <h2 class="text-center">Отзывы покупатедей подгузников senso baby</h2>
                    </div>
                    <div class="row">
                        <div class="gallery">
                            <?php for ($i = 0; $i <= 2; $i++): ?>
                                <a data-fancybox="gallery" class="fancybox" href="<?= $videos[$i]['video'] ?>">
                                    <img class="thumb" src="<?= $videos[$i]['thumb'] ?>" alt="senso">
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-wrapper" data-background-color="#f9f9f9"
                 style="background-color: rgb(249, 249, 249);">
                <div class="background--image opacity-10 background--repeat-repeat"
                     style="background-image: url('assets/img/pattern-topo.png');">
                    <img src="assets/img/pattern-topo.png" alt="">
                </div>
            </div>
        </section>

        <section class="block" id="gallery">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                        <h2>Сертификаты качества</h2>
                    </div>
                </div>
            </div>
            <div class="owl-carousel carousel-gallery" data-owl-items="5" data-owl-dots="1" data-owl-nav="0">

                <a href="assets/img/cert_01.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_01.jpg" alt="">
                    </div>
                </a>
                <a href="assets/img/cert_02.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_02.jpg" alt="">
                    </div>
                </a>
                <a href="assets/img/cert_03.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_03.jpg" alt="">
                    </div>
                </a>
                <a href="assets/img/cert_04.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_04.jpg" alt="">
                    </div>
                </a>
                <a href="assets/img/cert_05.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_05.jpg" alt="">
                    </div>
                </a>
                <a href="assets/img/cert_06.jpg" class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="assets/img/cert_06.jpg" alt="">
                    </div>
                </a>
                </a>

            </div>
            <div class="background-wrapper">
                <div class="background background--image background--repeat-repeat opacity-50">
                    <img src="assets/img/pattern-dot.png" alt="">
                </div>
            </div>
        </section>

        <section class="block" id="contact">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                        <h2>Оформление заказа</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                            <div class="person">
                                <div class="person__description">
                                    <figure>
                                        <label>Телефон:</label>
                                        <div>+38 (050) 355 51 56</div>
                                    </figure>
                                    <figure>
                                        <label>E-mail:</label>
                                        <div>
                                            <a href="#">zakaz@ipopo.com</a>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                            <h4>Заказать подгузники</h4>
                            <form id="form-contact" method="post" class="form clearfix" onsubmit="orderValidate(event)">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="form-contact-name">Ваше имя</label>
                                            <input type="text" class="form-control" id="form-contact-name"
                                                   name="order[name]"
                                                   placeholder="Ваше имя">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="form-contact-phone">Ваш телефон</label>
                                            <input type="tel" class="form-control" inputmode="tel"
                                                   id="form-contact-phone" name="order[phone]" placeholder="Ваш телефон"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">Комментарий</label>
                                            <textarea class="form-control" id="form-contact-message" rows="8"
                                                      name="order[message]" placeholder="Комментарий"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="order[type]" value="0">
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn pull-right btn-primary btn-framed"
                                            id="form-contact-submit">Заказать подгузники
                                    </button>
                                </div>
                                <div class="form-contact-status"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-wrapper">
                <div class="background background--image background--repeat-repeat opacity-50">
                    <img src="assets/img/pattern-dot.png" alt="">
                </div>
            </div>
        </section>

    </div>

    <footer id="footer">
        <div class="container">
            <span>Ipopokids.ua</span>
        </div>
    </footer>
</div>

<div class="modal fade" id="modal-feature" tabindex="-1" role="dialog" aria-labelledby="modal-feature-label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal__title">
                    <h2>КОМФОРТ для Вашего малыша</h2>
                </div>
                <div class="owl-carousel modal__carousel" data-owl-items="1" data-owl-autoplay="1" data-owl-dots="0"
                     data-owl-nav="0" data-owl-loop="1">
                    <div class="slide img-into-bg">
                        <img src="assets/img/slide-01.jpg" alt="">
                    </div>
                    <div class="slide img-into-bg">
                        <img src="assets/img/slide-02.jpg" alt="">
                    </div>
                    <div class="slide img-into-bg">
                        <img src="assets/img/slide-03.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="float-left p-5 width-auto">
                    <h4>Подгузники Senso Baby</h4>
                    <p>Надежные и мягкие боковые барьерчики
                        предохраняют от бокового протекания в любой ситуации.

                        Многоразовые липучки
                        гарантируют надежную и комфортную фиксацию подгузников.

                        Анатомическая форма подгузника
                        обеспечивает идеальную посадку на теле малыша, как во время сна, так и во время активных игр.

                        Дышащий наружный слой
                        с мельчайшими микропорами, изготовленный из нетканого материала, предотвращает появление
                        раздражения и опрелостей на чувствительной детской коже.

                        Нежные и эластичные резиночки
                        не сдавливают ножки малыша и не оставляют следов.

                        Инновационная 3D-система впитывания
                        состоит из нескольких слоев и содержит улучшенный абсорбирующий материал (SAP) и натуральную
                        природную целлюлозу, обеспечивающие сверхвысокую впитываемость.

                        Крем-бальзам
                        Внутренняя поверхность подгузника мягкая и приятная на ощупь. Нанесенный крем-бальзам
                        дополнительно ухаживает за нежной кожей ребенка. Его состав абсолютно безвреден для кожи, ведь
                        он прошел системный контроль качества.

                        Эластичные боковые «ушки»
                        обеспечивают идеальное прилегание к телу малыша.

                        ADL-технология
                        равномерно распределяет влагу по всей поверхности впитывающего слоя, не допуская комкования.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" src="assets/js/isInViewport.jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.particleground.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/scrollReveal.min.js"></script>
<script src="assets/js/custom.js"></script>

<script>
    var latitude = 50.;
    var longitude = 30.195800;
    var markerImage = "assets/img/map-marker.png";
    var mapTheme = "light";
    var mapElement = "map";
</script>

</body>
</html>
