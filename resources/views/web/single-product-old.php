@include('web.header')
<style>
    ul.cl {
        display: flex;


    }

    ul.cl li {
        padding: 5px 10px;
        border-radius: 5px;
        margin-right: 10px;
    }

    ul.cl li.active {
        background-color: #ccc;
    }

    tbody input {
        height: 45px;
        font-size: 12px;
        border: 1px solid #000;
    }

    tbody img {
        width: 50px;
        height: auto;
    }

    tbody span {
        font-size: 12px;
        font-weight: bold;
        margin-left: 5px;
    }

    .cart-card {
        background-color: #ffefdf;
    }

    .cart-card h5 {
        font-size: 15px;
        font-weight: bold;
        color: #a85400;
    }

    .disabled-input {
        background-color: lightgrey;
    }

    .demo-color {
        background-color: #a85400;
        border-radius: 70px;
        border: 4px solid whitesmoke;
        height: 40px;
        width: 40px;
        margin-right: 4px;
    }

    .color-container {
        /* width: 100%; */
        padding: 20px;
        background: whitesmoke;
        margin-top: 12px;
        display: flex;
    }
</style>
<!-- </?php var_dump($singleProduct['pricing_table']); die; ?> -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <div class="single-product-cover">
                                        <?php $colorsArray = array(
                                            'aliceblue' => 'F0F8FF',
                                            'antiquewhite' => 'FAEBD7',
                                            'aqua' => '00FFFF',
                                            'aquamarine' => '7FFFD4',
                                            'azure' => 'F0FFFF',
                                            'beige' => 'F5F5DC',
                                            'bisque' => 'FFE4C4',
                                            'black' => '000000',
                                            'blanchedalmond ' => 'FFEBCD',
                                            'blue' => '0000FF',
                                            'blueviolet' => '8A2BE2',
                                            'brown' => 'A52A2A',
                                            'burlywood' => 'DEB887',
                                            'cadetblue' => '5F9EA0',
                                            'chartreuse' => '7FFF00',
                                            'chocolate' => 'D2691E',
                                            'coral' => 'FF7F50',
                                            'cornflowerblue' => '6495ED',
                                            'cornsilk' => 'FFF8DC',
                                            'crimson' => 'DC143C',
                                            'cyan' => '00FFFF',
                                            'darkblue' => '00008B',
                                            'darkcyan' => '008B8B',
                                            'darkgoldenrod' => 'B8860B',
                                            'darkgray' => 'A9A9A9',
                                            'darkgreen' => '006400',
                                            'darkgrey' => 'A9A9A9',
                                            'darkkhaki' => 'BDB76B',
                                            'darkmagenta' => '8B008B',
                                            'darkolivegreen' => '556B2F',
                                            'darkorange' => 'FF8C00',
                                            'darkorchid' => '9932CC',
                                            'darkred' => '8B0000',
                                            'darksalmon' => 'E9967A',
                                            'darkseagreen' => '8FBC8F',
                                            'darkslateblue' => '483D8B',
                                            'darkslategray' => '2F4F4F',
                                            'darkslategrey' => '2F4F4F',
                                            'darkturquoise' => '00CED1',
                                            'darkviolet' => '9400D3',
                                            'deeppink' => 'FF1493',
                                            'deepskyblue' => '00BFFF',
                                            'dimgray' => '696969',
                                            'dimgrey' => '696969',
                                            'dodgerblue' => '1E90FF',
                                            'firebrick' => 'B22222',
                                            'floralwhite' => 'FFFAF0',
                                            'forestgreen' => '228B22',
                                            'fuchsia' => 'FF00FF',
                                            'gainsboro' => 'DCDCDC',
                                            'ghostwhite' => 'F8F8FF',
                                            'gold' => 'FFD700',
                                            'goldenrod' => 'DAA520',
                                            'gray' => '808080',
                                            'green' => '008000',
                                            'greenyellow' => 'ADFF2F',
                                            'grey' => '808080',
                                            'honeydew' => 'F0FFF0',
                                            'hotpink' => 'FF69B4',
                                            'indianred' => 'CD5C5C',
                                            'indigo' => '4B0082',
                                            'ivory' => 'FFFFF0',
                                            'khaki' => 'F0E68C',
                                            'lavender' => 'E6E6FA',
                                            'lavenderblush' => 'FFF0F5',
                                            'lawngreen' => '7CFC00',
                                            'lemonchiffon' => 'FFFACD',
                                            'lightblue' => 'ADD8E6',
                                            'lightcoral' => 'F08080',
                                            'lightcyan' => 'E0FFFF',
                                            'lightgoldenrodyellow' => 'FAFAD2',
                                            'lightgray' => 'D3D3D3',
                                            'lightgreen' => '90EE90',
                                            'lightgrey' => 'D3D3D3',
                                            'lightpink' => 'FFB6C1',
                                            'lightsalmon' => 'FFA07A',
                                            'lightseagreen' => '20B2AA',
                                            'lightskyblue' => '87CEFA',
                                            'lightslategray' => '778899',
                                            'lightslategrey' => '778899',
                                            'lightsteelblue' => 'B0C4DE',
                                            'lightyellow' => 'FFFFE0',
                                            'lime' => '00FF00',
                                            'limegreen' => '32CD32',
                                            'linen' => 'FAF0E6',
                                            'magenta' => 'FF00FF',
                                            'maroon' => '800000',
                                            'mediumaquamarine' => '66CDAA',
                                            'mediumblue' => '0000CD',
                                            'mediumorchid' => 'BA55D3',
                                            'mediumpurple' => '9370D0',
                                            'mediumseagreen' => '3CB371',
                                            'mediumslateblue' => '7B68EE',
                                            'mediumspringgreen' => '00FA9A',
                                            'mediumturquoise' => '48D1CC',
                                            'mediumvioletred' => 'C71585',
                                            'midnightblue' => '191970',
                                            'mintcream' => 'F5FFFA',
                                            'mistyrose' => 'FFE4E1',
                                            'moccasin' => 'FFE4B5',
                                            'navajowhite' => 'FFDEAD',
                                            'navy' => '000080',
                                            'oldlace' => 'FDF5E6',
                                            'olive' => '808000',
                                            'olivedrab' => '6B8E23',
                                            'orange' => 'FFA500',
                                            'orangered' => 'FF4500',
                                            'orchid' => 'DA70D6',
                                            'palegoldenrod' => 'EEE8AA',
                                            'palegreen' => '98FB98',
                                            'paleturquoise' => 'AFEEEE',
                                            'palevioletred' => 'DB7093',
                                            'papayawhip' => 'FFEFD5',
                                            'peachpuff' => 'FFDAB9',
                                            'peru' => 'CD853F',
                                            'pink' => 'FFC0CB',
                                            'plum' => 'DDA0DD',
                                            'powderblue' => 'B0E0E6',
                                            'purple' => '800080',
                                            'red' => 'FF0000',
                                            'rosybrown' => 'BC8F8F',
                                            'royalblue' => '4169E1',
                                            'saddlebrown' => '8B4513',
                                            'salmon' => 'FA8072',
                                            'sandybrown' => 'F4A460',
                                            'seagreen' => '2E8B57',
                                            'seashell' => 'FFF5EE',
                                            'sienna' => 'A0522D',
                                            'silver' => 'C0C0C0',
                                            'skyblue' => '87CEEB',
                                            'slateblue' => '6A5ACD',
                                            'slategray' => '708090',
                                            'slategrey' => '708090',
                                            'snow' => 'FFFAFA',
                                            'springgreen' => '00FF7F',
                                            'steelblue' => '4682B4',
                                            'tan' => 'D2B48C',
                                            'teal' => '008080',
                                            'thistle' => 'D8BFD8',
                                            'tomato' => 'FF6347',
                                            'turquoise' => '40E0D0',
                                            'violet' => 'EE82EE',
                                            'wheat' => 'F5DEB3',
                                            'white' => 'FFFFFF',
                                            'whitesmoke' => 'F5F5F5',
                                            'yellow' => 'FFFF00',
                                            'yellowgreen' => '9ACD32',
                                            'bottlegreen' => '092E20',
                                            'deepnavyblue' => '000052',
                                            'emeraldgreen' => '50C878',
                                            'heathergrey' => '9aa297',
                                            'kellygreen' => '4CBB17',
                                            'heatherred' => 'B83A4B',
                                            'burgundyred' => '800020',
                                            'heathergreen' => '7a8768',
                                            'heathernavyblue' => '3f4868',
                                            'heatherroyalblue' => '3f4868',
                                            'sunfloweryellow' => 'E8DE2A',
                                            'navyblue' => '000080',
                                            'darkheathergrey' => '46220b',
                                        ); ?>
                                        <?php if (!empty($singleProduct['colors'])) {
                                            foreach ($singleProduct['colors'] as $color) { ?>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="<?php if ($singleProduct['type'] === "ralawise") {
                                                                                            echo asset('public/ralawise/images' . $color['ColourImage']);
                                                                                        } else if ($singleProduct['type'] === "uneek") {
                                                                                            echo $color['Small_Colour_Image'];
                                                                                        } ?>" alt="">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="single-nav-thumb">
                                        <?php
                                        if (!empty($singleProduct['colors'])) {
                                            foreach ($singleProduct['colors'] as $color) { ?>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="<?php if ($singleProduct['type'] === "ralawise") {
                                                                                            echo asset('public/ralawise/images' . $color['ColourImage']);
                                                                                        } else if ($singleProduct['type'] === "uneek") {
                                                                                            echo $color['Small_Colour_Image'];
                                                                                        } ?>" alt="">
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc single-pro-desc-no-sidebar">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{ $singleProduct['type'] === "ralawise" ? $singleProduct['Brand'].' '.$singleProduct['ProductName'] : 'Uneek '.$singleProduct['Product_Name'] }}</h5>
                                    <h6 style="margin-top: -10px; margin-bottom: 20px;">Product Code: <span>{{ $singleProduct['type'] === "ralawise" ? $singleProduct['ProductGroup'] : $singleProduct['Product_Code'] }}</span></h6>
                                    <div class="ec-single-desc">
                                        <?php if ($singleProduct['type'] === "ralawise") { ?>
                                            {{ $singleProduct['RetailDescription'] }}
                                        <?php } else if ($singleProduct['type'] === "uneek") { ?>
                                            {{ $singleProduct['Full_Description'] }}
                                        <?php } ?>
                                    </div>
                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">Price</span>
                                            <span class="new-price">£{{ round($singleProduct['multiplied_price'],2) }}</span>
                                        </div>
                                        <div class="ec-single-stoke">
                                            <span class="ec-single-ps-title">IN STOCK</span>
                                            <span class="ec-single-sku">SKU#: <?= $singleProduct['type'] === "ralawise" ? $singleProduct['SkuCode'] : $singleProduct['Short_Code'] ?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="card card-body cart-card">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="align-self-center">Customize as per your requirements</h5>
                                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="row color-container">
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                            <div class="demo-color"></div>
                                        </div>
                                        <table class="table table-borderless">
                                            {{-- <thead>
                                                <tr>
                                                    <th style="width: 180px" scope="col">Colors</th>
                                                    <?php
                                                    if (!in_array('28', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('30', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('32', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('34', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('36', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('38', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('40', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('42', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('44', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('46', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('48', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('50', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes'])) && !in_array('52', ($singleProduct['type'] === "ralawise" ? $singleProduct[$color['ColourName']]['sizes'] : $singleProduct[$color['Colour']]['sizes']))) {
                                                    ?>
                                                        <th scope="col">S</th>
                                                        <th scope="col">M</th>
                                                        <th scope="col">L</th>
                                                        <th scope="col">XL</th>
                                                        <th scope="col">2XL</th>
                                                        <th scope="col">3XL</th>
                                                        <th scope="col">4XL</th>
                                                        <th scope="col">5XL</th>
                                                    <?php } else { ?>
                                                        <th scope="col">28</th>
                                                        <th scope="col">30</th>
                                                        <th scope="col">32</th>
                                                        <th scope="col">34</th>
                                                        <th scope="col">36</th>
                                                        <th scope="col">38</th>
                                                        <th scope="col">40</th>
                                                        <th scope="col">42</th>
                                                        <th scope="col">44</th>
                                                        <th scope="col">46</th>
                                                        <th scope="col">48</th>
                                                        <th scope="col">50</th>
                                                        <th scope="col">52</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr> --}}

                                            <?php
                                            if (!empty($singleProduct['colors'])) {
                                                foreach ($singleProduct['colors'] as $k => $color) { ?>
                                                    <td>
                                                        <div class="d-flex">
                                                            <img src="./assets/images/product-image/6_2.jpg" alt="">
                                                            <span class="align-self-center" style="display: flex;width: 100%">
                                                                <?php if ($singleProduct['type'] === "ralawise") {
                                                                    echo '<div class="demo-color" id="color-demo' . $k . '"></div>' . '' . $color['ColourName'];
                                                                    $explodedString = explode(" ", $color['ColourName']);
                                                                    $colorName = '';
                                                                    foreach ($explodedString as $str) {
                                                                        $colorName .= strtolower($str);
                                                                    }

                                                                    if (isset($colorsArray[$colorName])) {
                                                                ?>
                                                                        <script>
                                                                            var color = '#<?= $colorsArray[$colorName]  ?>';
                                                                            var pos = '<?= $k ?>';
                                                                            $('#color-demo' + pos).css("background-color", color);
                                                                        </script>
                                                                    <?php
                                                                    }
                                                                } else if ($singleProduct['type'] === "uneek") {
                                                                    echo '<div class="demo-color" style="background-color:' . $color['Hex'] . '" id="color-demo' . $k . '"></div>' . '' . $color['Colour'];
                                                                    $explodedString = explode(" ", $color['Colour']);
                                                                    $colorName = '';
                                                                    foreach ($explodedString as $str) {
                                                                        $colorName .= strtolower($str);
                                                                    }
                                                                    if (isset($colorsArray[$colorName])) {
                                                                    ?>
                                                                        <script>
                                                                            var color = '#<?= $colorsArray[$colorName]  ?>';
                                                                            var pos = '<?= $k ?>';
                                                                            $('#color-demo' + pos).css("background-color", color);
                                                                        </script>
                                                                <?php }
                                                                } ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <!-- Commented Sizes Inputs -->
                                                    {{--
                                                            <?php
                                                            if ($singleProduct['type'] === "ralawise" && isset($singleProduct[$color['ColourName']]['sizes'])) {
                                                                $sortedSize = array();
                                                                $sortedPrice = array();
                                                                $sortedQuantities = array();

                                                                if (!in_array('28', $singleProduct[$color['ColourName']]['sizes']) && !in_array('30', $singleProduct[$color['ColourName']]['sizes']) && !in_array('32', $singleProduct[$color['ColourName']]['sizes']) && !in_array('34', $singleProduct[$color['ColourName']]['sizes']) && !in_array('36', $singleProduct[$color['ColourName']]['sizes']) && !in_array('38', $singleProduct[$color['ColourName']]['sizes']) && !in_array('40', $singleProduct[$color['ColourName']]['sizes']) && !in_array('42', $singleProduct[$color['ColourName']]['sizes']) && !in_array('44', $singleProduct[$color['ColourName']]['sizes']) && !in_array('46', $singleProduct[$color['ColourName']]['sizes']) && !in_array('48', $singleProduct[$color['ColourName']]['sizes']) && !in_array('50', $singleProduct[$color['ColourName']]['sizes']) && !in_array('52', $singleProduct[$color['ColourName']]['sizes'])) {
                                                                    foreach ($singleProduct[$color['ColourName']]['sizes'] as $k => $size) {
                                                                        switch ($size['SizeCode']) {
                                                                            case 'S':
                                                                                $sortedSize[0] = 'S';
                                                                                $sortedPrice[0] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[0] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case 'M':
                                                                                $sortedSize[1] = 'M';
                                                                                $sortedPrice[1] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[1] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case 'L':
                                                                                $sortedSize[2] = 'L';
                                                                                $sortedPrice[2] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[2] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case 'XL':
                                                                                $sortedSize[3] = 'XL';
                                                                                $sortedPrice[3] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[3] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case '2XL':
                                                                                $sortedSize[4] = '2XL';
                                                                                $sortedPrice[4] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[4] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case '3XL':
                                                                                $sortedSize[5] = '3XL';
                                                                                $sortedPrice[5] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[5] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case '4XL':
                                                                                $sortedSize[6] = '4XL';
                                                                                $sortedPrice[6] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[6] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                            case '5XL':
                                                                                $sortedSize[7] = '5XL';
                                                                                $sortedPrice[7] = $singleProduct[$color['ColourName']]['prices'][$k];
                                                                                $sortedQuantities[7] = $singleProduct[$color['ColourName']]['quantities'][$k];
                                                                                break;
                                                                        }
                                                                    }
                                                                }

                                                                for ($i = 0; $i < 8; $i++) {  //2XL,3XL,4XL,5XL
                                                            ?>
                                                                    <td><input type="number" value="0" data-prev-val="0" onchange="calculateTotal(this.id)" <?= isset($sortedSize[$i]) ? 'data-price="' . $sortedPrice[$i] . '"' : '' ?> <?= isset($sortedSize[$i]) ? 'id="' . $sortedSize[$i] . ($singleProduct['type'] === "ralawise" ? str_replace(" ", "", $color['ColourName']) : '') . ($singleProduct['type'] === "uneek" ? trim($color['Colour']) : '') . '"' : '' ?> <?= isset($sortedSize[$i]) ? '' : 'class="disabled-input"' ?> <?= isset($sortedQuantities[$i]['SingleQuantity']) ? 'max="' . $sortedQuantities[$i]['SingleQuantity'] . '"' : '' ?> <?= isset($sortedSize[$i]) ? 'name="' . $sortedSize[$i] . '[]"' : '' ?> <?= isset($sortedSize[$i]) ? '' : 'disabled' ?> min="0"></td>
                                                                <?php
                                                                }
                                                            } else if ($singleProduct['type'] === "uneek" && !empty($singleProduct[$color['Colour']]['sizes'])) {
                                                                $sortedSize = array();
                                                                $sortedPrice = array();
                                                                $sortedQuantities = array();

                                                                if (!in_array('28', $singleProduct[$color['Colour']]['sizes']) && !in_array('30', $singleProduct[$color['Colour']]['sizes']) && !in_array('32', $singleProduct[$color['Colour']]['sizes']) && !in_array('34', $singleProduct[$color['Colour']]['sizes']) && !in_array('36', $singleProduct[$color['Colour']]['sizes']) && !in_array('38', $singleProduct[$color['Colour']]['sizes']) && !in_array('40', $singleProduct[$color['Colour']]['sizes']) && !in_array('42', $singleProduct[$color['Colour']]['sizes']) && !in_array('44', $singleProduct[$color['Colour']]['sizes']) && !in_array('46', $singleProduct[$color['Colour']]['sizes']) && !in_array('48', $singleProduct[$color['Colour']]['sizes']) && !in_array('50', $singleProduct[$color['Colour']]['sizes']) && !in_array('52', $singleProduct[$color['Colour']]['sizes'])) {
                                                                    foreach ($singleProduct[$color['Colour']]['sizes'] as $k => $size) {
                                                                        // var_dump($size['SizeCode']);
                                                                        switch ($size['Size']) {
                                                                            case 'S':
                                                                                $sortedSize[0] = 'S';
                                                                                $sortedPrice[0] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[0] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case 'M':
                                                                                $sortedSize[1] = 'M';
                                                                                $sortedPrice[1] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[1] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case 'L':
                                                                                $sortedSize[2] = 'L';
                                                                                $sortedPrice[2] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[2] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case 'XL':
                                                                                $sortedSize[3] = 'XL';
                                                                                $sortedPrice[3] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[3] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case '2XL':
                                                                                $sortedSize[4] = '2XL';
                                                                                $sortedPrice[4] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[4] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case '3XL':
                                                                                $sortedSize[5] = '3XL';
                                                                                $sortedPrice[5] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[5] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case '4XL':
                                                                                $sortedSize[6] = '4XL';
                                                                                $sortedPrice[6] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[6] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                            case '5XL':
                                                                                $sortedSize[7] = '5XL';
                                                                                $sortedPrice[7] = $singleProduct[$color['Colour']]['prices'][$k];
                                                                                $sortedQuantities[7] = $singleProduct[$color['Colour']]['quantities'][$k];
                                                                                break;
                                                                        }
                                                                    }
                                                                }

                                                                for ($i = 0; $i < 8; $i++) {
                                                                ?>
                                                                    <td><input type="number" data-prev-val="0" value="0" onchange="calculateTotal(this.id)" <?= isset($sortedSize[$i]) ? 'data-price="' . $sortedPrice[$i] . '"' : '' ?> <?= isset($sortedSize[$i]) ? 'id="' . $sortedSize[$i] . ($singleProduct['type'] === "uneek" ? str_replace(' ', '', $color['Colour']) : '') . '"' : '' ?> <?= isset($sortedSize[$i]) ? '' : 'class="disabled-input"' ?> <?= isset($sortedQuantities[$i]) ? 'max="' . $sortedQuantities[$i]['SingleQuantity'] . '"' : '' ?> <?= isset($sortedSize[$i]) ? 'id="' . $sortedSize[$i] . $color['Colour'] . '"' : '' ?> <?= isset($sortedSize[$i]) ? 'name="' . $sortedSize[$i] . '[]"' : '' ?> <?= isset($sortedSize[$i]) ? '' : 'disabled' ?> min="0"></td>
                                                            <?php }
                                                            } ?> 
                                                            --}}

                                            <?php }
                                            } ?>
                                            {{-- </tr>
                                            </tbody>
                                        </table> --}}
                                            <div class="d-flex justify-content-between">
                                                <h5 style='font-size: 18px;font-weight: bold;'>Total</h5>
                                                <h5 style='font-size: 18px;font-weight: bold; color: #EE8013'>£<span id="total">0.00</span></h5>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist">Pricing Table</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info" role="tablist">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">QTY</th>
                                            <th scope="col">Price Per Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($singleProduct['pricing_table'])) {
                                            foreach ($singleProduct['pricing_table'] as $price) { ?>
                                                <tr>
                                                    <th>{{ $price['quantity_from'].'-'.$price['quantity_to'] }}</th>
                                                    <?php $totalPrice =  ($singleProduct['single_price'] * $price['service_charges_pp']);
                                                    $discount = ($totalPrice / 100) * $price['discount_per_percent'];
                                                    $priceWillBe = $totalPrice - $discount;
                                                    ?>
                                                    <td>£{{ round($priceWillBe,2) }}</td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    <p>
                                        <?php if ($singleProduct['type'] === "ralawise") { ?>
                                            {{ $singleProduct['RetailDescription'] }}
                                        <?php } else if ($singleProduct['type'] === "uneek") { ?>
                                            {{ $singleProduct['Full_Description'] }}
                                        <?php } ?>
                                    </p>
                                    <ul>
                                        <li>
                                            <span>Weight</span>
                                            <?php if ($singleProduct['type'] === "ralawise") { ?>
                                                {{ $singleProduct['WeightKG']*1000 }}g
                                            <?php } else if ($singleProduct['type'] === "uneek") { ?>
                                                {{ $singleProduct['Net_Weight']*1000 }}g
                                            <?php } ?>
                                        </li>
                                        <li><span>Color</span>
                                            <?php if (!empty($singleProduct['colors'])) {
                                                $k = 1;
                                                foreach ($singleProduct['colors'] as $color) { ?>
                                                    <?php if ($singleProduct['type'] === "ralawise") { ?>
                                                        {{ ucfirst(strtolower($color['ColourName'])) }}<?= !empty($singleProduct['colors']) ? ($k != sizeof($singleProduct['colors']) ? ',' : '.') : '' ?>
                                                    <?php } else if ($singleProduct['type'] === "uneek") { ?>
                                                        {{ ucfirst(strtolower($color['Colour'])) }}<?= !empty($singleProduct['colors']) ? ($k != sizeof($singleProduct['colors']) ? ',' : '.') : '' ?>
                                                    <?php } ?>
                                                <?php $k = $k + 1;
                                                } ?>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div id="ec-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="ec-t-review-wrapper">
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/1.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Jeny Doe</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/2.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Linda Morgus</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-ratting-content">
                                        <h3>Add a Review</h3>
                                        <div class="ec-ratting-form">
                                            <form action="#">
                                                <div class="ec-ratting-star">
                                                    <span>Your rating:</span>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-name" placeholder="Name" type="text" />
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-email" placeholder="Email*" type="email" required />
                                                </div>
                                                <div class="ec-ratting-input form-submit">
                                                    <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                                    <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>

        </div>
    </div>
</section>


<script>
    function activeList(name) {
        const listEl = document.querySelector(`.${name}`);
        listEl.classList.toggle('active');
        // console.log(listEl);
    }
    let cartTotal = 0;
    let qtyTotal = 0;
    var pricingArray = <?php echo json_encode($singleProduct['pricing_table']); ?>;

    function calculateTotal(id) {
        // let qty = $("#" + id).val();
        let price = $("#" + id).attr('data-price');
        // let result = price * qty;



        var prevValue = $('#' + id).attr('data-prev-val');
        var recentValue = $('#' + id).val();
        var direction = prevValue <= recentValue;
        if (direction) {
            // console.log("Increasing");
            cartTotal = cartTotal + ((recentValue - prevValue) * price);
            qtyTotal = qtyTotal + ((recentValue - prevValue));
            $('#' + id).attr('data-prev-val', recentValue);
        } else {
            // console.log("Decreasing");
            cartTotal = cartTotal - ((prevValue - recentValue) * price);
            qtyTotal = qtyTotal - ((prevValue - recentValue));
            $('#' + id).attr('data-prev-val', recentValue);
        }

        if (pricingArray) {
            var discountValid = false;
            pricingArray.forEach((pricing) => {
                // console.log(pricing['quantity_from'], pricing['quantity_to']);
                if (qtyTotal >= pricing['quantity_from'] && qtyTotal <= pricing['quantity_to']) {
                    discountedPrice = cartTotal - ((cartTotal / 100) * pricing['discount_per_percent']);
                    discountValid = true;
                    // console.log(discountedPrice,cartTotal);
                }
            });

            if (discountValid) {
                $('#total').text(discountedPrice.toFixed(2));
            } else {
                $('#total').text(cartTotal.toFixed(2));
            }
            // console.log("Getting Here", qtyTotal);
        }
    }
</script>

@include('web.footer')