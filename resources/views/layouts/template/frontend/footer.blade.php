<style>
    .tooltip.top .tooltip-inner {
        background-color:#e51a92!important;
    }
    .tooltip.top .tooltip-arrow {
        border-top-color:#e51a92!important;
    }
</style>
@php

    $datas = \App\CoreFunction\Helper::menufront();
   $locale = session()->get('locale');

@endphp
<footer id="ju-footer">
    <div class="ju-footer-wrap">
        <div class="container">
            <div class="row text-gotham">
                @foreach($datas as $i => $data)
                    <div class="col-lg-2 col-md-4 col-xs-6">
                        <div class="footer-widget">
                            <h5><a href="#">
                                    @if($locale == 'th')
                                        {{$data['name_th']}}
                                    @else
                                        {{$data['name_en']}}
                                    @endif</a></h5>

                                <div class="menu-footer01-container">
                                    <ul id="menu-footer01" class="menu">
                                        @foreach($data['sub_menu'] as $sub)
                                        @if($locale == 'th')
                                                <li class="menu-item"><a href="{{$sub['uri']}}">{{$sub['name_th']}}</a></li>
                                        @else
                                                <li class="menu-item"><a href="{{$sub['uri']}}">{{$sub['name_en']}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                        <!-- .footer-widget-->
                    </div>
                @endforeach
                <!-- .col-lg-2 col-md-4 col-xs-6-->
            </div>
        </div>
        <div class="footer-copyright">

            <div class="container">
                <p class="text-center">
                    <a href="#"><img src="{!!asset('jsmbeauty/src/logo_jungsammool_white.png')!!}"
                            style="max-width: 85px; height: auto;"></a>
                </p>
                <p class="footer-social-link text-center">
                    <a target="_blank" href="https://www.facebook.com/jungsaemmoolThailand/" class="btn btn-facebook"
                        data-toggle="tooltip" title="Facebook" data-placement="top" title="" data-original-title="페이스북">
                        <img    
                            src="{!!asset('jsmbeauty/src/Icon/face1.png')!!}" 
                            onmouseover="this.src='{!!asset('jsmbeauty/src/Icon/face2.png')!!}'"
                            onmouseout="this.src='{!!asset('jsmbeauty/src/Icon/face1.png')!!}'"
                            border="0" alt=""
                        />
                        
                        <!-- <i class="fa fa-facebook"></i> -->
                    </a>
                    <a target="_blank" href="https://www.instagram.com/jsmbeauty_th" class="btn btn-instagram"
                        data-toggle="tooltip" title="Instagram" data-placement="top" title="" data-original-title="인스타그램">
                        
                        <img    
                            src="{!!asset('jsmbeauty/src/Icon/ig1.png')!!}" 
                            onmouseover="this.src='{!!asset('jsmbeauty/src/Icon/ig2.png')!!}'"
                            onmouseout="this.src='{!!asset('jsmbeauty/src/Icon/ig1.png')!!}'"
                            border="0" alt=""
                        />
                        
                        <!-- <i class="fa fa-instagram"></i> -->
                    </a>

                    <a target="_blank" href="#" class="btn btn-instagram"
                        data-toggle="tooltip" title="Shopee" data-placement="top" title="" data-original-title="인스타그램">
                        
                        <img    
                            src="{!!asset('jsmbeauty/src/Icon/shop1.png')!!}" 
                            onmouseover="this.src='{!!asset('jsmbeauty/src/Icon/shop2.png')!!}'"
                            onmouseout="this.src='{!!asset('jsmbeauty/src/Icon/shop1.png')!!}'"
                            border="0" alt=""
                        />
                        
                        <!-- <i class="fa fa-instagram"></i> -->
                    </a>

                    <a target="_blank" href="https://www.lazada.co.th/shop/jung-saem-mool?" class="btn btn-instagram"
                        data-toggle="tooltip" title="Lazada" data-placement="top" title="" data-original-title="인스타그램">
                        
                        <img    
                            src="{!!asset('jsmbeauty/src/Icon/laz1.png')!!}" 
                            onmouseover="this.src='{!!asset('jsmbeauty/src/Icon/laz2.png')!!}'"
                            onmouseout="this.src='{!!asset('jsmbeauty/src/Icon/laz1.png')!!}'"
                            border="0" alt=""
                        />
                        
                        <!-- <i class="fa fa-instagram"></i> -->
                    </a>

                </p>
                <div class="text-center">
                    <ul id="menu-footer-menu" class="list-inline">
                        <li id="menu-item-342" class="menu-item">
                            <a href="#">Service Terms & Policy</a>
                        </li>
                        <li id="menu-item-341" class="menu-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                <p class="text-center text-muted">
                    <small>
                        Siam Piwat Retail Holding Company Limited Member<br> 
                        of Siam Piwat Group 5th-6th Floor, L Building, 304,<br>
                        308 Phayathai Road, Ratchathewi, <br>
                        Email : junseammool.th@gmail.com
                    </small>
                </p>
                <p class="text-center text-muted">
                    <small>COPYRIGHTⓒ2015 JUNGSAEMMOOL.COM ALL RIGHT RESERVERD.</small>
                </p>

                <div class="text-center">
                    <img src="{!!asset('jsmbeauty/src/Icon/visa.png')!!}" hidden>
                    <img src="{!!asset('jsmbeauty/src/Icon/mastercard.png')!!}" hidden>
                </div>
            </div>
        </div>
    </div>
</footer>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
