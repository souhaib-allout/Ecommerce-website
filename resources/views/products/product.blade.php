<!
<html>
<head>

    <x-parts.files/>
    <title>Home</title>
    <style>
        * {
            font-family: 'Noto Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        /*****article slider****/
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .product-swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .product-swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-container {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .product-swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .productmySwiper2 {
            height: 80%;
            width: 100%;
        }

        .productmySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .productmySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .productmySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .product-swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /*******related products******/
        .relatedproduct-swiper-container {
            width: 100%;
            height: 100%;
        }

        .relatedproduct-swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .relatedproduct-swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

</head>
<body>
<header>
    <x-parts.header/>
</header>
<div class="container mt-5">
    <div class="row">
        <div class="col-12" style="color:#6c6767 ;font-size: 15px">
            <a href="" class="pe-2"
               style="color:#6c6767;border-right: solid 1px #6c6767">{{$product->childcategory->category->name}}</a>
            <a href="" class="pe-2 ps-2"
               style="color:#6c6767;border-right: solid 1px #6c6767">{{$product->childcategory->name}}</a>
            <a href="{{url('product/'.$product->id)}}" class="ps-2" style="color:#6c6767">{{$product->title}}</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-5" style="max-height: 70vh">
            <div
                style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                class="swiper-container productmySwiper2">
                <div class="swiper-wrapper product-swiper-wrapper">
                    @foreach($product->images as $image)
                        <div class="swiper-slide product-swiper-slide">
                            <img src="{{asset('storage/products/'.$image->name)}}"/>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next product-swiper-button-next" style="color: #204f8c"></div>
                <div class="swiper-button-prev product-swiper-button-prev" style="color: #204f8c"></div>
            </div>
            <div thumbsSlider="" class="swiper-container productmySwiper">
                <div class="swiper-wrapper product-swiper-wrapper">
                    @foreach($product->images as $image)
                        <div class="swiper-slide product-swiper-slide">
                            <img src="{{asset('storage/products/'.$image->name)}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-7">
            <p style="color: #204f8c;font-size: 30px;font-weight: 535">{{$product->title}}</p>
            <p style="color: #204f8c;font-size: 22px;font-weight: 535">{{$product->price}} MAD</p>
            <p class="p-3" style="font-size:15px;color:#6c6767;border-top: solid 1px #d4cccc;border-bottom: solid 1px #d4cccc">{{$product->presentation}}</p>
            <div style="border-top: solid 1px #d4cccc;border-bottom: solid 1px #d4cccc">
            <img src="{{asset('storage/companies/'.$product->company->logo)}}" style="height: 100px;">
            </div>
            <p class="d-flex justify-content-between mt-3 pt-3 pb-3 mb-3"
               style="color: #204f8c;font-weight: 550;border-top:solid 1px #dcd6d6;border-bottom:solid 1px #dcd6d6">
                <span>État</span>
                <span>{{$product->statut}}</span>
            </p>
            @if($product->colors)
                <div class="d-flex justify-content-between mt-3 pt-3 pb-3 mb-3"
                     style="color: #204f8c;font-weight: 550;border-top:solid 1px #dcd6d6;border-bottom:solid 1px #dcd6d6">
                    <span>Coleurs</span>
                    <div class="d-flex">
                        @foreach($product->colors as $color)
                            @if($loop->first)
                                <input type="hidden" name="selectedcolor" id="selectedcolor" value="{{$color->id}}">
                            @endif
                            <div class="ms-2"
                                style="background-color:{{$color->name}};cursor:pointer;border-radius: 100px;height: 20px;width: 20px"></div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="text-end">
                @if($product->quantity>=1)
                    <p style="color: #559f45;font-size: 12.5px">
                        <img src="{{asset('media/icons/correct.svg')}}" style="width: 15px">
                        Produit en stock <span style="font-weight: 600">(22 produits)
                        </span>
                    </p>
                @else
                    <p class="text-danger" style="color: #559f45;font-size: 12.5px">
                        <img src="{{asset('media/icons/wrong.svg')}}" style="width: 15px">
                        Produit n'est pas en stock
                    </p>
                @endif

                <div class="d-flex justify-content-end mt-2">
                    <input class="form-control me-3" type="number" min="1" value="1"
                           style="border-radius:0;width: 70px!important;"/>
                    <button class="btn addbuttontype2 addbutton3" data-bs-toggle="modal"
                            data-bs-target="#addedtopanesuccess"
                            style="border-radius: 0 !important;background-color:#204f8c;height: 38px;width: 38px ">
                        <img src="{{asset('media/icons/plus.svg')}}" style="width: 18px">
                    </button>
                    <button class="btn addbuttontype2 addbutton4" data-bs-toggle="modal"
                            data-bs-target="#addedtopanesuccess"
                            style="border-radius: 0 !important;border-color: #204f8c;color: #204f8c">
                        Ajouter au panier
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 100px">
        <div class="col-6">
            <p style="color:#204f8c;font-size: 20px;border-bottom: solid 2px #204f8c">
                Description
            </p>
            {!!$product->specification !!}
        </div>
        <div class="col-6">
            <p style="color:#204f8c;font-size: 20px;border-bottom: solid 2px #204f8c">
                Fiche technique
            </p>
            {!!$product->Technical_sheet !!}
        </div>
    </div>
    <div class="row mt-5">
        <p class="mb-3" style="color: #204f8c;font-size: 20px;font-weight: 600">PRODUITS DANS LA MÊME CATÉGORIE :</p>
        <div class="swiper-container relatedproduct-mySwiper">
            <div class="swiper-wrapper relatedproduct-swiper-wrapper">
                @foreach($relatedproducts as $relatedproduct)
                    <div class="swiper-slide relatedproduct-swiper-slide" style="height: 200px">
                        <div>
                            @foreach($relatedproduct->images as $image)
                                @if($loop->first)
                                    <img src="{{asset('storage/products/'.$image->name)}}" class="img-fluid">
                                @endif
                            @endforeach
                            <p style="color: #6c6767;font-size: 15px">{{$relatedproduct->title}}</p>
                            <p style="color: #204f8c;font-size: 15px">{{$relatedproduct->price}} MAD</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next relatedproduct-swiper-button-next" style="color: #204f8c"></div>
            <div class="swiper-button-prev relatedproduct-swiper-button-prev" style="color: #204f8c"></div>
        </div>
    </div>
</div>


<x-parts.footer/>
<script>
    $(document).ready(function () {
        $('table').addClass('table')

        $('.addbutton').hover(function () {
            $(this).parent().children('.addbutton2').hide()
            $width = $(this).parent().children('.addbutton3').outerWidth() + $(this).parent().children('.addbutton4').outerWidth() + 'px'

            $(this).parent().children('.addbutton1').css('width', $width)

        })
        $('.addbutton').mouseout(function () {
            $(this).parent().children('.addbutton2').show()
            $(this).parent().children('.addbutton1').css('width', '38px')

        })

        $('.addbuttontype2').hover(function () {
            $(this).parent().children('.addbutton4').hide()
            $width = $(this).parent().children('.addbutton3').outerWidth() + $(this).parent().children('.addbutton4').outerWidth() + 'px'
            $(this).parent().children('.addbutton3').css('width', $width)
        })
        $('.addbuttontype2').mouseout(function () {
            $(this).parent().children('.addbutton4').show()
            $(this).parent().children('.addbutton3').css('width', '38px')

        })
    })
    var swiper = new Swiper(".productmySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".productmySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".product-swiper-button-next",
            prevEl: ".product-swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
    /******related product****/
    var swiper = new Swiper(".relatedproduct-mySwiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: ".relatedproduct-swiper-button-next",
            prevEl: ".relatedproduct-swiper-button-prev",
        },
    });
</script>
</body>
</html>
