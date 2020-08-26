@extends('backend.layout')


@section('content')


    <style>
        element.style {
            background-image: url(//cdn.yemeksepeti.com/App_Themes/Default_tr-TR/images/citySelectImg/sehirsecim-gorseller-big01.jpg);
        }
        .ys-CitySelect .background {
            position: absolute;
            width: 450px;
            height: 450px;
            right: 0;
            bottom: -366px;
            z-index: 1;
            background-repeat: no-repeat;
            background-position: 100%;
        }
        *, :after, :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        user agent stylesheet
        div {
            display: block;
        }
        body {
            background-color: #fff;
            font-size: 11px;
            font-family: Verdana,Geneva,sans-serif;
            color: #333;
            position: relative;
            height: 100%;
        }
        body {
            font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857;
        }
        html {
            font-size: 10px;
            -webkit-tap-highlight-color: transparent;
        }
        html {
            font-family: sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        *, :after, :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *, :after, :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
    </style>
    <div class="citySelectionWrapper">
        <div class="background"
             style="background-image: url(//cdn.yemeksepeti.com/App_Themes/Default_tr-TR/images/citySelectImg/sehirsecim-gorseller-big01.jpg)"></div>
        <div class="innerHeader"><h1>Yemeksepeti'yle yemeğin sadece birkaç tık uzaklıkta! Şehrinizi seçip sipariş
                verin.</h1></div>
        <div class="container ys-main">
            <div class="row">
                <div class="col-md-16">
                    <div class="cityPlatesContainer"><a data-catalog="ADANA" class="cityLink col-md-1 " href="/adana">
                            <div class="cityContainer"><span class="plateNo">01</span></div>
                            <span class="name">Adana</span> </a> <a data-catalog="TR_ADIYAMAN"
                                                                    class="cityLink col-md-1 " href="/adiyaman">
                            <div class="cityContainer"><span class="plateNo">02</span></div>
                            <span class="name">Adıyaman</span> </a> <a data-catalog="TR_AFYONKARAHISAR"
                                                                       class="cityLink col-md-1 "
                                                                       href="/afyonkarahisar">
                            <div class="cityContainer"><span class="plateNo">03</span></div>
                            <span class="name">Afyon karahisar</span> </a> <a data-catalog="TR_AGRI"
                                                                              class="cityLink col-md-1 " href="/agri">
                            <div class="cityContainer"><span class="plateNo">04</span></div>
                            <span class="name">Ağrı</span> </a> <a data-catalog="TR_AMASYA" class="cityLink col-md-1 "
                                                                   href="/amasya">
                            <div class="cityContainer"><span class="plateNo">05</span></div>
                            <span class="name">Amasya</span> </a> <a data-catalog="TR_ANKARA" class="cityLink col-md-1 "
                                                                     href="/ankara">
                            <div class="cityContainer"><span class="plateNo">06</span></div>
                            <span class="name">Ankara</span> </a> <a data-catalog="TR_ANTALYA"
                                                                     class="cityLink col-md-1 " href="/antalya">
                            <div class="cityContainer"><span class="plateNo">07</span></div>
                            <span class="name">Antalya</span> </a> <a data-catalog="TR_AYDIN" class="cityLink col-md-1 "
                                                                      href="/aydin">
                            <div class="cityContainer"><span class="plateNo">09</span></div>
                            <span class="name">Aydın</span> </a> <a data-catalog="TR_BALIKESIR"
                                                                    class="cityLink col-md-1 " href="/balikesir">
                            <div class="cityContainer"><span class="plateNo">10</span></div>
                            <span class="name">Balıkesir</span> </a> <a data-catalog="TR_BILECIK"
                                                                        class="cityLink col-md-1 " href="/bilecik">
                            <div class="cityContainer"><span class="plateNo">11</span></div>
                            <span class="name">Bilecik</span> </a> <a data-catalog="TR_BINGOL"
                                                                      class="cityLink col-md-1 " href="/bingol">
                            <div class="cityContainer"><span class="plateNo">12</span></div>
                            <span class="name">Bingöl</span> </a> <a data-catalog="TR_BOLU" class="cityLink col-md-1 "
                                                                     href="/bolu">
                            <div class="cityContainer"><span class="plateNo">14</span></div>
                            <span class="name">Bolu</span> </a> <a data-catalog="TR_BURDUR" class="cityLink col-md-1 "
                                                                   href="/burdur">
                            <div class="cityContainer"><span class="plateNo">15</span></div>
                            <span class="name">Burdur</span> </a> <a data-catalog="TR_BURSA" class="cityLink col-md-1 "
                                                                     href="/bursa">
                            <div class="cityContainer"><span class="plateNo">16</span></div>
                            <span class="name">Bursa</span> </a> <a data-catalog="TR_CANAKKALE"
                                                                    class="cityLink col-md-1 " href="/canakkale">
                            <div class="cityContainer"><span class="plateNo">17</span></div>
                            <span class="name">Çanakkale</span> </a> <a data-catalog="TR_CANKIRI"
                                                                        class="cityLink col-md-1 " href="/cankiri">
                            <div class="cityContainer"><span class="plateNo">18</span></div>
                            <span class="name">Çankırı</span> </a> <a data-catalog="TR_CORUM" class="cityLink col-md-1 "
                                                                      href="/corum">
                            <div class="cityContainer"><span class="plateNo">19</span></div>
                            <span class="name">Çorum</span> </a> <a data-catalog="TR_DENIZLI" class="cityLink col-md-1 "
                                                                    href="/denizli">
                            <div class="cityContainer"><span class="plateNo">20</span></div>
                            <span class="name">Denizli</span> </a> <a data-catalog="TR_DIYARBAKIR"
                                                                      class="cityLink col-md-1 " href="/diyarbakir">
                            <div class="cityContainer"><span class="plateNo">21</span></div>
                            <span class="name">Diyarbakır</span> </a> <a data-catalog="TR_EDIRNE"
                                                                         class="cityLink col-md-1 " href="/edirne">
                            <div class="cityContainer"><span class="plateNo">22</span></div>
                            <span class="name">Edirne</span> </a> <a data-catalog="TR_ELAZIG" class="cityLink col-md-1 "
                                                                     href="/elazig">
                            <div class="cityContainer"><span class="plateNo">23</span></div>
                            <span class="name">Elazığ</span> </a> <a data-catalog="TR_ERZINCAN"
                                                                     class="cityLink col-md-1 " href="/erzincan">
                            <div class="cityContainer"><span class="plateNo">24</span></div>
                            <span class="name">Erzincan</span> </a> <a data-catalog="TR_ERZURUM"
                                                                       class="cityLink col-md-1 " href="/erzurum">
                            <div class="cityContainer"><span class="plateNo">25</span></div>
                            <span class="name">Erzurum</span> </a> <a data-catalog="TR_ESKISEHIR"
                                                                      class="cityLink col-md-1 " href="/eskisehir">
                            <div class="cityContainer"><span class="plateNo">26</span></div>
                            <span class="name">Eskişehir</span> </a> <a data-catalog="TR_GAZIANTEP"
                                                                        class="cityLink col-md-1 " href="/gaziantep">
                            <div class="cityContainer"><span class="plateNo">27</span></div>
                            <span class="name">Gaziantep</span> </a> <a data-catalog="TR_GIRESUN"
                                                                        class="cityLink col-md-1 " href="/giresun">
                            <div class="cityContainer"><span class="plateNo">28</span></div>
                            <span class="name">Giresun</span> </a> <a data-catalog="TR_HATAY" class="cityLink col-md-1 "
                                                                      href="/hatay">
                            <div class="cityContainer"><span class="plateNo">31</span></div>
                            <span class="name">Hatay</span> </a> <a data-catalog="TR_ISPARTA" class="cityLink col-md-1 "
                                                                    href="/isparta">
                            <div class="cityContainer"><span class="plateNo">32</span></div>
                            <span class="name">Isparta</span> </a> <a data-catalog="TR_MERSIN"
                                                                      class="cityLink col-md-1 " href="/mersin">
                            <div class="cityContainer"><span class="plateNo">33</span></div>
                            <span class="name">Mersin</span> </a> <a data-catalog="TR_ISTANBUL"
                                                                     class="cityLink col-md-1 " href="/istanbul">
                            <div class="cityContainer"><span class="plateNo">34</span></div>
                            <span class="name">İstanbul</span> </a> <a data-catalog="TR_IZMIR"
                                                                       class="cityLink col-md-1 " href="/izmir">
                            <div class="cityContainer"><span class="plateNo">35</span></div>
                            <span class="name">İzmir</span> </a> <a data-catalog="TR_KASTAMONU"
                                                                    class="cityLink col-md-1 " href="/kastamonu">
                            <div class="cityContainer"><span class="plateNo">37</span></div>
                            <span class="name">Kastamonu</span> </a> <a data-catalog="TR_KAYSERI"
                                                                        class="cityLink col-md-1 " href="/kayseri">
                            <div class="cityContainer"><span class="plateNo">38</span></div>
                            <span class="name">Kayseri</span> </a> <a data-catalog="TR_KIRKLARELI"
                                                                      class="cityLink col-md-1 " href="/kirklareli">
                            <div class="cityContainer"><span class="plateNo">39</span></div>
                            <span class="name">Kırklareli</span> </a> <a data-catalog="TR_KIRSEHIR"
                                                                         class="cityLink col-md-1 " href="/kirsehir">
                            <div class="cityContainer"><span class="plateNo">40</span></div>
                            <span class="name">Kırşehir</span> </a> <a data-catalog="TR_KOCAELI"
                                                                       class="cityLink col-md-1 " href="/kocaeli">
                            <div class="cityContainer"><span class="plateNo">41</span></div>
                            <span class="name">Kocaeli</span> </a> <a data-catalog="TR_KONYA" class="cityLink col-md-1 "
                                                                      href="/konya">
                            <div class="cityContainer"><span class="plateNo">42</span></div>
                            <span class="name">Konya</span> </a> <a data-catalog="TR_KUTAHYA" class="cityLink col-md-1 "
                                                                    href="/kutahya">
                            <div class="cityContainer"><span class="plateNo">43</span></div>
                            <span class="name">Kütahya</span> </a> <a data-catalog="TR_MALATYA"
                                                                      class="cityLink col-md-1 " href="/malatya">
                            <div class="cityContainer"><span class="plateNo">44</span></div>
                            <span class="name">Malatya</span> </a> <a data-catalog="TR_MANISA"
                                                                      class="cityLink col-md-1 " href="/manisa">
                            <div class="cityContainer"><span class="plateNo">45</span></div>
                            <span class="name">Manisa</span> </a> <a data-catalog="TR_KAHRAMANMARAS"
                                                                     class="cityLink col-md-1 " href="/kahramanmaras">
                            <div class="cityContainer"><span class="plateNo">46</span></div>
                            <span class="name">Kahraman maraş</span> </a> <a data-catalog="TR_MARDIN"
                                                                             class="cityLink col-md-1 " href="/mardin">
                            <div class="cityContainer"><span class="plateNo">47</span></div>
                            <span class="name">Mardin</span> </a> <a data-catalog="MUGLA" class="cityLink col-md-1 "
                                                                     href="/mugla">
                            <div class="cityContainer"><span class="plateNo">48</span></div>
                            <span class="name">Muğla</span> </a> <a data-catalog="TR_NEVSEHIR"
                                                                    class="cityLink col-md-1 " href="/nevsehir">
                            <div class="cityContainer"><span class="plateNo">50</span></div>
                            <span class="name">Nevşehir</span> </a> <a data-catalog="TR_NIGDE"
                                                                       class="cityLink col-md-1 " href="/nigde">
                            <div class="cityContainer"><span class="plateNo">51</span></div>
                            <span class="name">Niğde</span> </a> <a data-catalog="TR_ORDU" class="cityLink col-md-1 "
                                                                    href="/ordu">
                            <div class="cityContainer"><span class="plateNo">52</span></div>
                            <span class="name">Ordu</span> </a> <a data-catalog="TR_RIZE" class="cityLink col-md-1 "
                                                                   href="/rize">
                            <div class="cityContainer"><span class="plateNo">53</span></div>
                            <span class="name">Rize</span> </a> <a data-catalog="TR_SAKARYA" class="cityLink col-md-1 "
                                                                   href="/sakarya">
                            <div class="cityContainer"><span class="plateNo">54</span></div>
                            <span class="name">Sakarya</span> </a> <a data-catalog="TR_SAMSUN"
                                                                      class="cityLink col-md-1 " href="/samsun">
                            <div class="cityContainer"><span class="plateNo">55</span></div>
                            <span class="name">Samsun</span> </a> <a data-catalog="TR_SIIRT" class="cityLink col-md-1 "
                                                                     href="/siirt">
                            <div class="cityContainer"><span class="plateNo">56</span></div>
                            <span class="name">Siirt</span> </a> <a data-catalog="TR_SINOP" class="cityLink col-md-1 "
                                                                    href="/sinop">
                            <div class="cityContainer"><span class="plateNo">57</span></div>
                            <span class="name">Sinop</span> </a> <a data-catalog="TR_SIVAS" class="cityLink col-md-1 "
                                                                    href="/sivas">
                            <div class="cityContainer"><span class="plateNo">58</span></div>
                            <span class="name">Sivas</span> </a> <a data-catalog="TR_TEKIRDAG"
                                                                    class="cityLink col-md-1 " href="/tekirdag">
                            <div class="cityContainer"><span class="plateNo">59</span></div>
                            <span class="name">Tekirdağ</span> </a> <a data-catalog="TR_TOKAT"
                                                                       class="cityLink col-md-1 " href="/tokat">
                            <div class="cityContainer"><span class="plateNo">60</span></div>
                            <span class="name">Tokat</span> </a> <a data-catalog="TR_TRABZON" class="cityLink col-md-1 "
                                                                    href="/trabzon">
                            <div class="cityContainer"><span class="plateNo">61</span></div>
                            <span class="name">Trabzon</span> </a> <a data-catalog="TR_URFA" class="cityLink col-md-1 "
                                                                      href="/sanliurfa">
                            <div class="cityContainer"><span class="plateNo">63</span></div>
                            <span class="name">Şanlıurfa</span> </a> <a data-catalog="TR_USAK"
                                                                        class="cityLink col-md-1 " href="/usak">
                            <div class="cityContainer"><span class="plateNo">64</span></div>
                            <span class="name">Uşak</span> </a> <a data-catalog="TR_VAN" class="cityLink col-md-1 "
                                                                   href="/van">
                            <div class="cityContainer"><span class="plateNo">65</span></div>
                            <span class="name">Van</span> </a> <a data-catalog="TR_YOZGAT" class="cityLink col-md-1 "
                                                                  href="/yozgat">
                            <div class="cityContainer"><span class="plateNo">66</span></div>
                            <span class="name">Yozgat</span> </a> <a data-catalog="TR_ZONGULDAK"
                                                                     class="cityLink col-md-1 " href="/zonguldak">
                            <div class="cityContainer"><span class="plateNo">67</span></div>
                            <span class="name">Zonguldak</span> </a> <a data-catalog="TR_AKSARAY"
                                                                        class="cityLink col-md-1 " href="/aksaray">
                            <div class="cityContainer"><span class="plateNo">68</span></div>
                            <span class="name">Aksaray</span> </a> <a data-catalog="TR_KARAMAN"
                                                                      class="cityLink col-md-1 " href="/karaman">
                            <div class="cityContainer"><span class="plateNo">70</span></div>
                            <span class="name">Karaman</span> </a> <a data-catalog="TR_KIRIKKALE"
                                                                      class="cityLink col-md-1 " href="/kirikkale">
                            <div class="cityContainer"><span class="plateNo">71</span></div>
                            <span class="name">Kırıkkale</span> </a> <a data-catalog="TR_BATMAN"
                                                                        class="cityLink col-md-1 " href="/batman">
                            <div class="cityContainer"><span class="plateNo">72</span></div>
                            <span class="name">Batman</span> </a> <a data-catalog="TR_BARTIN" class="cityLink col-md-1 "
                                                                     href="/bartin">
                            <div class="cityContainer"><span class="plateNo">74</span></div>
                            <span class="name">Bartın</span> </a> <a data-catalog="TR_IGDIR" class="cityLink col-md-1 "
                                                                     href="/igdir">
                            <div class="cityContainer"><span class="plateNo">76</span></div>
                            <span class="name">Iğdır</span> </a> <a data-catalog="TR_YALOVA" class="cityLink col-md-1 "
                                                                    href="/yalova">
                            <div class="cityContainer"><span class="plateNo">77</span></div>
                            <span class="name">Yalova</span> </a> <a data-catalog="TR_KARABUK"
                                                                     class="cityLink col-md-1 " href="/karabuk">
                            <div class="cityContainer"><span class="plateNo">78</span></div>
                            <span class="name">Karabük</span> </a> <a data-catalog="TR_OSMANIYE"
                                                                      class="cityLink col-md-1 " href="/osmaniye">
                            <div class="cityContainer"><span class="plateNo">80</span></div>
                            <span class="name">Osmaniye</span> </a> <a data-catalog="TR_DUZCE"
                                                                       class="cityLink col-md-1 " href="/duzce">
                            <div class="cityContainer"><span class="plateNo">81</span></div>
                            <span class="name">Düzce</span> </a> <a data-catalog="TR_KIBRIS"
                                                                    class="cityLink col-md-1 btnKibris" href="/kktc">
                            <div class="cityContainer"><i class="ys-icons ys-icons-kibrisWhite"></i></div>
                            <span class="name">KKTC</span> </a></div>
                </div>
            </div>
        </div>
    </div>


@endsection
