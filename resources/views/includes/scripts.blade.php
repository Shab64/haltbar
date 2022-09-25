<script>
    function activeList(name) {
        const listEl = document.querySelector(`.${name}`);
        listEl.classList.toggle('active');
    }

    //To get the global quantity and global price
    let grandTotalQuantGlobal = 0;
    let grandTotalPriceGlobal = 0;
    let grandTotalCustomizationPrice = 0;
    let grandTotalSetupCharges = 0;

    //initally append color Array to add color to prevent from reappends at the time of append
    var appendColors = [];

    function myFunction1(colorSpecs, color, colorCode) {
        //active the same shirt on which color user clicks
        // let previewclas = $('.preview_active_color_code').find('.slick-current')
        // $(previewclas).removeClass('slick-current slick-active')
        // let clas = $('.active_color_code').find('.slick-current')
        // $(clas).removeClass('slick-current')
        // $('.product_'+color).parent().parent().parent().addClass('slick-current')
        // $('.preview_product_'+color).parent().parent().parent().addClass('slick-current slick-active')

        //if there is no color exists in append color before
        if (appendColors.indexOf(color) == -1) {
            //convert php encoded array to javascript array
            let colorSpecsArr = JSON.parse(colorSpecs);
            let sizes = typeof colorSpecsArr['sizes'] !== "undefined" ? colorSpecsArr['sizes'] : [];
            let quantities = typeof colorSpecsArr['quantities'] !== "undefined" ? colorSpecsArr['quantities'] : [];
            let prices = typeof colorSpecsArr['prices'] !== "undefined" ? colorSpecsArr['prices'] : [];

            var explodedColor = color.split(" ");
            var text = `
        <div class="slider4 mt-4" id="${color}-div">
    <h5 style="font-weight: 800;">Sizes + Quantity:</h5>
    <div class=" colors ">
       <ul>
    <li><p ${colorCode !== "no color" ? 'style="background-color:' + colorCode + '";' : ''}></p></li>
     <li><h6>` + color + `</h6></li>
         <li class="remove_colorbox"><i class="ecicon eci-remove cross_color_cart" id="${color}"></i></li>
    </ul>
    </div>
    <div class="row custom-div">
        ${sizes.indexOf("S") != -1 ? `<div class="">
            <label for="`+ color + '-' + sizes[sizes.indexOf("S")] + `" style="font-size:20px; color:black; font-weight:600;">S</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')"  data-price="` + prices[sizes.indexOf("S")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("S")] + `" min="0" max="` + quantities[sizes.indexOf("S")] + `" style="border-radius: 25px; text-align:center;" type="number" value="0" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("S")] + `">
        </div>` : ``}
        ${sizes.indexOf("M") != -1 ?
                `<div class=" ">
            <label for="`+ color + '-' + sizes[sizes.indexOf("M")] + `" style="font-size:20px; color:black; font-weight:600;">M</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("M")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("M")] + `" min="0" max="` + quantities[sizes.indexOf("M")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("M")] + `" placeholder="0">
        </div>` : ``}
        ${sizes.indexOf("L") != -1 ?
                `<div class=" ">
            <label for="`+ color + '-' + sizes[sizes.indexOf("L")] + `" style="font-size:20px; color:black; font-weight:600;">L</label>
            <input  value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("L")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("L")] + `" min="0" max="` + quantities[sizes.indexOf("L")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("L")] + `" placeholder="0">
        </div>` : ``}
        ${sizes.indexOf("XL") != -1 ?
                `<div class=" ">
            <label for="`+ color + '-' + sizes[sizes.indexOf("XL")] + `" style="font-size:20px; color:black; font-weight:600;">XL</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("XL")] + `" min="0" max="` + quantities[sizes.indexOf("XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("XL")] + `" placeholder="0">
        </div>` : ``}
        ${sizes.indexOf("2XL") != -1 ?
                `<div class="">
            <label for="`+ color + '-' + sizes[sizes.indexOf("2XL")] + `" style="font-size:20px; color:black; font-weight:600;">2XL</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("2XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("2XL")] + `" min="0" max="` + quantities[sizes.indexOf("2XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("2XL")] + `" placeholder="0">
            </div>` : ``}
        ${sizes.indexOf("3XL") != -1 ?
                `<div class="">
            <label for="`+ color + '-' + sizes[sizes.indexOf("3XL")] + `" style="font-size:20px; color:black; font-weight:600;">3XL</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("3XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("3XL")] + `" min="0" max="` + quantities[sizes.indexOf("3XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("3XL")] + `" placeholder="0">
            </div>` : ``}
        ${sizes.indexOf("4XL") != -1 ?
                `<div class="">
            <label for="`+ color + '-' + sizes[sizes.indexOf("4XL")] + `" style="font-size:20px; color:black; font-weight:600;">4XL</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("4XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("4XL")] + `" min="0" max="` + quantities[sizes.indexOf("4XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("4XL")] + `" placeholder="0">
            </div>` : ``}
        ${sizes.indexOf("5XL") != -1 ?
                `<div class="">
            <label for="`+ color + '-' + sizes[sizes.indexOf("5XL")] + `" style="font-size:20px; color:black; font-weight:600;">5XL</label>
            <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("5XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("5XL")] + `" min="0" max="` + quantities[sizes.indexOf("5XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("5XL")] + `" placeholder="0">
            </div>` : ``}
        ${sizes.indexOf("6XL") != -1 ?
                `<div class="">
             <label for="`+ color + '-' + sizes[sizes.indexOf("6XL")] + `" style="font-size:20px; color:black; font-weight:600;">6XL</label>
             <input value="0" onkeyup="effectTotal('`+color+`')" onchange="effectTotal('`+color+`')" data-price="`+ prices[sizes.indexOf("6XL")] + `" name="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("6XL")] + `" min="0" max="` + quantities[sizes.indexOf("6XL")] + `" style="border-radius: 25px; text-align:center;" type="number" class="" id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizes[sizes.indexOf("6XL")] + `" placeholder="0">
             </div>` : ``}
    </div>

    <div class="row">
            <div class="col-md text-center mt-3">
                <input id="` + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-total' + `" readonly value="0" style="background-color:black; text-align:center; color: white; border-radius: 25px;" type="number" class="form-control" placeholder="0">
            </div>
    </div>
    </div>`;

            //add color to append Colors array to prevent from reappending
            appendColors.push(color);
            $('#showSizes').append(text);
            $('#selected_colors').val(JSON.stringify(appendColors));
        }
        //removing color boxes
        $(".cross_color_cart").on('click',function (e){
            if($('li').hasClass(this.id) === true) {
                $('li').removeClass("active")
            }
            //removing the color from color array so it can again show the color div
            appendColors.pop(this.id)
            $("#"+this.id+'-div').remove()
        })
    }

    function effectTotal(color) {
        var explodedColor = color.split(" ");
        var sizeArr = ["S", "M", "L", "XL", "2XL", "3XL", "4XL", "5XL", "6XL"];
        var totalCount = 0;
        for (var i = 0; i < sizeArr.length; i++) {
            //getting each size associated with this
            var colorName = $("[name='" + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizeArr[i] + "']");
            if (typeof colorName !== "undefined" && typeof colorName.val() !== "undefined") {
                totalCount += parseInt(colorName.val());
            }
        }

        //Calculation Grand total price of each colors and Quantity for discount cal

        var totalPrice = 0;
        var grandTotalQuantity = 0;


        var pricingTable = '{{ json_encode($singleProduct["pricing_table"]) }}';
        //removed /&quot;/ from pricingTable & parse JSON to array
        var pricingTable = JSON.parse(pricingTable.replace(/&quot;/g, '"'));

        for (var z = 0; z < appendColors.length; z++) {
            var explodedColor = appendColors[z].split(" ");
            for (var i = 0; i < sizeArr.length; i++) {
                var colorName = $("[name='" + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-' + sizeArr[i] + "']");
                if (typeof colorName != undefined && typeof colorName.val() !== "undefined") {
                    if (parseInt(colorName.val()) !== "NAN") {

                        totalPrice += parseFloat(colorName.data("price")) * colorName.val();
                        grandTotalQuantity += parseInt(colorName.val());
                    }
                }
            }
        }

        grandTotalQuantGlobal = grandTotalQuantity;

        //set the total of individual color
        $('#' + explodedColor[0] + (explodedColor[1] ? '-' + explodedColor[1] : '') + '-total').val(totalCount);

        if (grandTotalQuantity == 0) {
            $('#confirm-container').html(`<div class="alert alert-danger" role="alert">
                                             *Please Select the Garment Size and Color Quantity
                                          </div>`);
            $('#confirm-container1').html(`<div class="alert alert-danger" role="alert">
                                             *Please Select the Garment Size and Color Quantity
                                          </div>`);
            $('#confirm-container2').html(`<div class="alert alert-danger" role="alert">
                                             *Please Select the Garment Size and Color Quantity
                                          </div>`);
        } else if (grandTotalQuantity > 0) {
            $('#confirm-container').html(`<button type="button" class="btn btn-primary" onclick="validatingCustomization('printEmbroidery','text')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button>`);
            $('#confirm-container1').html(`<button type="button" class="btn btn-primary" onclick="validatingCustomization('printEmbroidery','image')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button>`);
            $('#confirm-container2').html(`<button type="button" class="btn btn-primary" onclick="validatingCustomization('nameNumbers','text')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button>`);
        }

        //discount the total price according to requirement

        if (grandTotalQuantity <= pricingTable[0]['quantity_to'] && pricingTable[0]['discount_per_percent'] == 0) {
            $('#totalPrice').text('$' + totalPrice.toFixed(2));
            $('#garmentTotalPrice').text('$' + totalPrice.toFixed(2));
            $('#noDiscount').text('');
            $('#discountPercent').text('');
            grandTotalPriceGlobal = totalPrice;
            //set the Price according to customization
            effectCustomizationPrice(grandTotalQuantity, totalPrice);
        } else {
            //DISPLAY THESE WITH DISCOUNT
            var discountedPrice = 0;
            var discountedPercent = 0;
            if (pricingTable[0] != undefined && grandTotalQuantity >= pricingTable[0]['quantity_from'] && grandTotalQuantity <= pricingTable[0]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[0]['discount_per_percent']);
                discountedPercent = pricingTable[0]['discount_per_percent'];
            } else if (pricingTable[1] != undefined && grandTotalQuantity >= pricingTable[1]['quantity_from'] && grandTotalQuantity <= pricingTable[1]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[1]['discount_per_percent']);
                discountedPercent = pricingTable[1]['discount_per_percent'];
            } else if (pricingTable[2] != undefined && grandTotalQuantity >= pricingTable[2]['quantity_from'] && grandTotalQuantity <= pricingTable[2]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[2]['discount_per_percent']);
                discountedPercent = pricingTable[2]['discount_per_percent'];
            } else if (pricingTable[3] != undefined && grandTotalQuantity >= pricingTable[3]['quantity_from'] && grandTotalQuantity <= pricingTable[3]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[3]['discount_per_percent']);
                discountedPercent = pricingTable[3]['discount_per_percent'];
            } else if (pricingTable[4] != undefined && grandTotalQuantity >= pricingTable[4]['quantity_from'] && grandTotalQuantity <= pricingTable[4]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[4]['discount_per_percent']);
                discountedPercent = pricingTable[4]['discount_per_percent'];
            } else if (pricingTable[5] != undefined && grandTotalQuantity >= pricingTable[5]['quantity_from'] && grandTotalQuantity <= pricingTable[5]['quantity_to']) {
                discountedPrice = totalPrice - (totalPrice / 100 * pricingTable[5]['discount_per_percent']);
                discountedPercent = pricingTable[5]['discount_per_percent'];
            }


            if (totalPrice == discountedPrice) {
                $('#noDiscount').html('');
                $('#discountPercent').text('');
            } else {
                $('#noDiscount').html(`<del>$ ${totalPrice.toFixed(2)}</del>`);
                $('#discountPercent').text(`(With ${discountedPercent}% Discount)`);
            }

            $('#totalPrice').text('$' + discountedPrice.toFixed(2));
            $('#garmentTotalPrice').text('$' + discountedPrice.toFixed(2));

            grandTotalPriceGlobal = discountedPrice;

            //set the Price according to customization
            effectCustomizationPrice(grandTotalQuantity, discountedPrice);
        }

        //hide and display price card
        if (grandTotalQuantity > 0) {
            $('#priceCard').css('display', 'block');
        } else {
            $('#priceCard').css('display', 'none');
        }
        // console.log(totalCount,totalPrice,grandTotalQuantity)

        //removing color boxes
        $(".cross_color_cart").on('click',function (e){
            // console.log(e)
        })
    }

    function test(e) {
        console.log("Any", e);
    }

    var y = document.getElementById("Myid");
    var x = document.getElementById('print-embroidery');

    function togleText() {
        x.style.display = "block"
        y.style.display = "none";
    }

    function hide() {
        y.style.display = "none";
    }

    function toggleText() {
        y.style.display = "block";
        // console.log("HEY");

    }

    //Validating Customization
    var customizationID = 1;

    var customizationIDArr = [];
    var customizationTypes = {};
    var customizationPositions = {};
    var customizationArtWorks = {};
    var customizationNames = {};
    var designWidth = {};
    var specialInstructions = {};
    var uploads = {};

    var line1s = {};
    var line1Fonts = {};
    var line1Sizes = {};
    var line1Colors = {};
    var line2s = {};
    var line2Fonts = {};
    var line2Sizes = {};
    var line2Colors = {};
    var line3s = {};
    var line3Fonts = {};
    var line3Sizes = {};
    var line3Colors = {};

    var customizationNumbers = {};

    var displaying = false;

    function disableAddToCart() {
        if (displaying) {
            $('#add-to-cart').attr('disabled', false);
            if (customizationIDArr.length < 3) {
                $('#button-container').html(`<button type="button" id="add-customization" class="btn btn-primary mt-2" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="disableAddToCart()">Add Customization</button>`);
            } else {
                //show maximum limit message here
                $('#button-container').html(`Maximum 3 customizations per product.`);
            }
            // $('#cancel-customization').css('display', 'none');
            $('#Myid').css('display', 'none');
            $('#multiCollapseExample1').toggleClass("show", false);
            $('#pills-text-tab').removeClass("active")
            $('#pills-upload-tab').removeClass("active")
            displaying = false;
        } else {
            $('#add-to-cart').attr('disabled', true);
            $('#button-container').html(`<button type="button" id="cancel-customization" class="btn btn-primary mt-2" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="disableAddToCart()">Cancel Customization</button>`);
            $('#multiCollapseExample1').toggleClass("show", true);
            displaying = true;
        }
    }

    function validatingCustomization(type, artwork) {
        // console.log($('#selected-type').val(), $('#selected-position').val(), $('#selected-artwork').val());
        //For Print and Text Work
        if (type === "printEmbroidery" && artwork === "text") {
            var vall_1 = validationLine1();
            var vall_2 = validationLine2();
            var vall_3 = validationLine3();
            var valCW = validationCustomWidth(); //Cutom width validaton
            var valCN = validationCustomName(); //Cutom Name validaton

            // console.log(vall_1, vall_2, vall_3, valCW, valCN);
            if (vall_1 && vall_2 && vall_3 && valCW && valCN) {
                $('#err1').css('display', 'none');
                // alert('Alert');
                //Append Created Customization
                $('#customization-container').append(`<div class="slider4" id="customization-${customizationID}">
                                                <div class="slide4">
                                                    <h2 id="cHead-${customizationID}">CUSTOMISATION ${customizationIDArr.length + 1} - <span>${$('#customization-name').val()}</span></h2>
                                                    <div class="icon-action">
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="editCustomization(${customizationID})"><i class="ecicon eci-edit"></i>&nbsp;edit</a>
                                                        </span>
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="deleteCustomization(${customizationID})"><i class="ecicon eci-trash-o"></i>&nbsp;Delete</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="cpc_row cpc_detail">
                                                    <div class="cpc_desc">
                                                        <div class="cpc_desc_col">
                                                            <h3>TYPE OF CUSTOMISATION:</h3>
                                                            <span id="customization-type${customizationID}">${$('#selected-type').val()}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>TEXT CREATOR:</h3>
                                                            <span id="line1${customizationID}">${(function(){
                    if($('#line1').length>0){
                        return $('#line1').val();
                    }
                }())}</span>
                                                            <span id="line2${customizationID}">${(function(){
                    if($('#line2').length>0){
                        return $('#line2').val();
                    }
                }())}</span>
                                                            <span id="line3${customizationID}">${(function(){
                    if($('#line3').length>0){
                        return $('#line3').val();
                    }
                }())}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN POSITION:</h3>
                                                            <span id="design-position${customizationID}">${$('#selected-position').val()}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN WIDTH:</h3>
                                                            <span id="design-width${customizationID}">${$('#custom-width').val()} cm</span>
                                                        </div>
                                                    </div>
                                                    <div class="cpc_preview">
                                                        <div class="label">Text Preview</div>
                                                        <div class="PTRed large">
                                                            <p id="line1-preview${customizationID}" style="text-align: center"></p>
                                                            <p id="line2-preview${customizationID}" style="text-align: center"></p>
                                                            <p id="line3-preview${customizationID}" style="text-align: center"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`);


                //set the line preview For Line 1
                if ($('#line1').length > 0) {
                    var createPreviewSize = '1erm';
                    switch ($('#l1-size').val()) {
                        case '25px':
                            createPreviewSize = '1erm';
                            break;
                        case '40px':
                            createPreviewSize = '1.1erm';
                            break;
                        case '60px':
                            createPreviewSize = '1.2erm';
                            break;
                        case '80px':
                            createPreviewSize = '1.3erm';
                            break;
                    }


                    $('#line1-preview' + customizationID).css('font-size', createPreviewSize);
                    $('#line1-preview' + customizationID).css('line-height', createPreviewSize);
                    $('#line1-preview' + customizationID).css('font-family', $('#l1-font').val());
                    $('#line1-preview' + customizationID).css('color', $('#l1-color').val());
                    $('#line1-preview' + customizationID).text($('#line1').val());
                }

                //set the line preview For Line 2
                if ($('#line2').length > 0) {
                    var createPreviewSize = '1erm';
                    switch ($('#l2-size').val()) {
                        case '25px':
                            createPreviewSize = '1erm';
                            break;
                        case '40px':
                            createPreviewSize = '1.1erm';
                            break;
                        case '60px':
                            createPreviewSize = '1.2erm';
                            break;
                        case '80px':
                            createPreviewSize = '1.3erm';
                            break;
                    }


                    $('#line2-preview' + customizationID).css('font-size', createPreviewSize);
                    $('#line2-preview' + customizationID).css('line-height', createPreviewSize);
                    $('#line2-preview' + customizationID).css('font-family', $('#l2-font').val());
                    $('#line2-preview' + customizationID).css('color', $('#l2-color').val());
                    $('#line2-preview' + customizationID).text($('#line2').val());
                }

                //set the line preview For Line 3
                if ($('#line3').length > 0) {
                    var createPreviewSize = '1erm';
                    switch ($('#l3-size').val()) {
                        case '25px':
                            createPreviewSize = '1erm';
                            break;
                        case '40px':
                            createPreviewSize = '1.1erm';
                            break;
                        case '60px':
                            createPreviewSize = '1.2erm';
                            break;
                        case '80px':
                            createPreviewSize = '1.3erm';
                            break;
                    }


                    $('#line3-preview' + customizationID).css('font-size', createPreviewSize);
                    $('#line3-preview' + customizationID).css('line-height', createPreviewSize);
                    $('#line3-preview' + customizationID).css('font-family', $('#l3-font').val());
                    $('#line3-preview' + customizationID).css('color', $('#l3-color').val());
                    $('#line3-preview' + customizationID).text($('#line3').val());
                }


                //Storing customization Items in array
                customizationIDArr.push(customizationID);
                customizationTypes[customizationID] = $('#selected-type').val();
                customizationPositions[customizationID] = $('#selected-position').val();
                customizationArtWorks[customizationID] = $('#selected-artwork').val();
                customizationNames[customizationID] = $('#customization-name').val();
                designWidth[customizationID] = $('#custom-width').val();

                //Insert Line1  Items
                line1s[customizationID] = $('#line1').val();
                line1Fonts[customizationID] = $('#l1-font').val();
                line1Sizes[customizationID] = $('#l1-size').val();
                line1Colors[customizationID] = $('#l1-color').val();

                //Insert Line2 Items
                if ($('#line2').length > 0) {
                    line2s[customizationID] = $('#line2').val();
                    line2Fonts[customizationID] = $('#l2-font').val();
                    line2Sizes[customizationID] = $('#l2-size').val();
                    line2Colors[customizationID] = $('#l2-color').val();
                }

                if ($('#line2').length > 0) {
                    line3s[customizationID] = $('#line3').val();
                    line3Fonts[customizationID] = $('#l3-font').val();
                    line3Sizes[customizationID] = $('#l3-size').val();
                    line3Colors[customizationID] = $('#l3-color').val();
                }

                //If Special Instruction Exists
                if ($('#special-instruction').length > 0) {
                    specialInstructions[customizationID] = $('#special-instruction').val()
                }

                customizationID += 1;
                // console.log("Length",customizationIDArr,customizationIDArr.length)

                //Enable Add to Cart Button After customization created successfully
                disableAddToCart();
                resetChanges();
                // console.log("quantity + price",grandTotalQuantGlobal,grandTotalPriceGlobal);
                effectCustomizationPrice(grandTotalQuantGlobal, grandTotalPriceGlobal);
            } else {
                $('#err1').css('display', 'inline-block');
            } //------ If the Upload Image customization selected ------//
        } else if (type === "printEmbroidery" && artwork === "image") {
            //$('[name="fileUpload"]').val();
            var customWidth2 = $('#custom-width2').val();
            var customName2 = $('#customization-name2').val();
            var customImage = $('[name="fileUpload"]')[0].files[0];
            var fakePath = $('[name="fileUpload"]').val();

            // console.log(customImage,customImage.size,ustomWidth2.length,customName2.length);

            // console.log(selectedImage.length,selectedWidth.length,customizationName.length);
            if (fakePath.length > 0 && customWidth2.length > 0 && customName2.length > 0) {
                $('#uploadErr').css('display', 'none');
                //create customization box
                $('#customization-container').append(`
                <div class="slider4" id="customization-${customizationID}">
                    <div class="slide4">
                        <h2 id="cHead-${customizationID}">CUSTOMISATION ${customizationIDArr.length + 1} - <span>${$('#customization-name2').val()}</span></h2>
                        <div class="icon-action">
                            <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="editCustomization(${customizationID})"><i class="ecicon eci-edit"></i>&nbsp;edit</a>
                            </span>
                            <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="deleteCustomization(${customizationID})"><i class="ecicon eci-trash-o"></i>&nbsp;Delete</a>
                            </span>
                        </div>
                    </div>
                    <div class="cpc_row cpc_detail">
                        <div class="cpc_desc">
                            <div class="cpc_desc_col">
                                <h3>TYPE OF CUSTOMISATION:</h3>
                                <span id="customization-type${customizationID}">${$('#selected-type').val()}</span>
                            </div>
                            <div class="cpc_desc_col">
                                <h3>UPLOADED ARTWORK:</h3>
                                <span id="custom-file-name${customizationID}">${customImage.name}</span>
                            </div>
                            <div class="cpc_desc_col">
                                <h3>DESIGN POSITION:</h3>
                                <span id="design-position${customizationID}">${$('#selected-position').val()}</span>
                            </div>
                            <div class="cpc_desc_col">
                                <h3>DESIGN WIDTH:</h3>
                                <span id="design-width${customizationID}">${$('#custom-width2').val()} cm</span>
                            </div>
                        </div>
                        <div class="cpc_preview">
                            <div class="label">Image Preview</div>
                            <div class="PTRed large">
                                <img src="#" id="custom-file-preview${customizationID}" width="100%" height="100%"/>
                            </div>
                        </div>
                    </div>
                </div>
                `);

                var reader = new FileReader();
                reader.readAsDataURL(customImage);
                reader.onloadend = function() {
                    $('#custom-file-preview' + customizationID).attr("src", reader.result);
                    customizationID += 1; //This function called at the end so we increment there
                }

                // console.log('new',customizationID);

                //throw new Error("Error");

                customizationIDArr.push(customizationID);
                customizationTypes[customizationID] = $('#selected-type').val();
                customizationPositions[customizationID] = $('#selected-position').val()
                customizationArtWorks[customizationID] = $('#selected-artwork').val()
                customizationNames[customizationID] = $('#customization-name2').val()
                designWidth[customizationID] = $('#custom-width2').val()
                uploads[customizationID] = customImage;

                if ($('#special-instruction2').length > 0) {
                    specialInstructions[customizationID] = $('#special-instruction2').val()
                }

                // console.log("Length",customizationIDArr,customizationIDArr.length)

                disableAddToCart();
                resetChanges();
                effectCustomizationPrice(grandTotalQuantGlobal, grandTotalPriceGlobal);
            } else {
                $('#uploadErr').css('display', 'inline-block');
                if (fakePath.length == 0) {
                    $('#file-drag').css('border', '3px solid red');
                    $('#file-drag').hover(function() {
                        $(this).attr('style', 'border: 3px solid red')
                    });
                } else {
                    $('#file-drag').css('border', '3px solid #ccc');
                    $('#file-drag').hover(function() {
                        $(this).attr('style', 'border: 3px solid #EE8013')
                    });
                }

                if (customWidth2 >= 1 && customWidth2 <= 13) {
                    $('#custom-width2').attr('style', 'border: 1px solid #CED4DA');
                    $('#widthRangeErr2').text('');
                } else {
                    $('#custom-width2').css('border', '2px solid red');
                    $('#widthRangeErr2').text('* Please select the value with in the range from 1cm to 13cm');
                }

                if (customName2.length == 0) {
                    $('#customization-name2').css('border', '2px solid red');
                } else {
                    $('#customization-name2').attr('style', 'border: 1px solid #CED4DA');
                }
            }
            // console.log("Upload Image Called");
        } else if (type === "nameNumbers" && artwork === "text") {
            var nnFont = $('#nn-font').val();
            var nnColor = $('#nn-color').val();
            var nnName = $('#nn-name').val();
            var nnNumber = $('#nn-number').val();
            var nnCName = $('#nn-cname').val(); //
            if (nnFont.length > 0 && nnColor.length > 0 && nnName.length > 0 && nnNumber.length > 0 && nnCName.length > 0) {
                $('#nameNumberErr').css("display", "none");

                //append customization here and store value in arrays
                $('#customization-container').append(`<div class="slider4" id="customization-${customizationID}">
                                                <div class="slide4">
                                                    <h2 id="cHead-${customizationID}">CUSTOMISATION ${customizationIDArr.length + 1} - <span>${$('#nn-cname').val()}</span></h2>
                                                    <div class="icon-action">
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="editCustomization(${customizationID})"><i class="ecicon eci-edit"></i>&nbsp;edit</a>
                                                        </span>
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="javascript:void(0)" onclick="deleteCustomization(${customizationID})"><i class="ecicon eci-trash-o"></i>&nbsp;Delete</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="cpc_row cpc_detail">
                                                    <div class="cpc_desc">
                                                        <div class="cpc_desc_col">
                                                            <h3>TYPE OF CUSTOMISATION:</h3>
                                                            <span id="customization-type${customizationID}">${$('#selected-type').val()}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>Name:</h3>
                                                            <span id="name${customizationID}">${(function(){
                    if($('#nn-name').length>0){
                        return $('#nn-name').val();
                    }
                }())}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN POSITION:</h3>
                                                            <span id="design-position${customizationID}">${$('#selected-position').val()}</span>
                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>NUMBER:</h3>
                                                            <span id="number${customizationID}">${$('#nn-number').val()}</span>
                                                        </div>
                                                    </div>
                                                    <div class="cpc_preview">
                                                        <div class="label">Text Preview</div>
                                                        <div class="PTRed large">
                                                            <p id="name-preview${customizationID}" style="text-align: center;padding-top: 12px"></p>
                                                            <p id="number-preview${customizationID}" style="text-align: center;font-size: 30px"></p>
                                                            <!--
                                                            <p id="line2-preview${customizationID}" style="text-align: center"></p>
                                                            <p id="line3-preview${customizationID}" style="text-align: center"></p>
                                                            -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`);


                //Storing customization Items in array
                customizationIDArr.push(customizationID);
                customizationTypes[customizationID] = $('#selected-type').val();
                customizationPositions[customizationID] = $('#selected-position').val();
                customizationNames[customizationID] = nnCName;
                customizationNumbers[customizationID] = nnNumber;
                line1s[customizationID] = nnName;
                line1Fonts[customizationID] = nnFont;
                line1Colors[customizationID] = nnColor;

                $('#name-preview' + customizationID).css('color', nnColor);
                $('#number-preview' + customizationID).css('color', nnColor);
                $('#name-preview' + customizationID).css('font-family', nnFont);
                $('#number-preview' + customizationID).css('font-family', nnFont);
                $('#name-preview' + customizationID).text(nnCName);
                $('#number-preview' + customizationID).text(nnNumber);

                $('#nn-color').css('border', '1px solid #CED4DA');
                $('#nn-name').css('border', '1px solid #CED4DA');
                $('#nn-number').css('border', '1px solid #CED4DA');
                $('#nn-cname').css('border', '1px solid #CED4DA');

                disableAddToCart();
                resetChanges();
                customizationID += 1;
            } else {
                if (nnFont.length <= 0) {
                    $('#nn-font').attr('style', 'border:3px solid red!important');
                } else {
                    $('#nn-font').attr('style', 'border:1x solid #CED4DA!important');
                }

                if (nnColor.length <= 0) {
                    $('#nn-color').css('border', '3px solid red');
                } else {
                    $('#nn-color').css('border', '1px solid #CED4DA');
                }

                if (nnName.length <= 0) {
                    $('#nn-name').css('border', '3px solid red');
                } else {
                    $('#nn-name').css('border', '1px solid #CED4DA');
                }

                if (nnNumber.length <= 0) {
                    $('#nn-number').css('border', '3px solid red');
                } else {
                    $('#nn-number').css('border', '1px solid #CED4DA');
                }

                if (nnCName.length <= 0) {
                    $('#nn-cname').css('border', '3px solid red');
                } else {
                    $('#nn-cname').css('border', '1px solid #CED4DA');
                }

                $('#nameNumberErr').css("display", "inline-block");
            }
            //console.log(nnFont,nnColor,nnName,nnNumber,"Name Numbers Called");
        }
    }

    function validationLine1() {
        var line1 = $('#line1').val();
        var line1size = $('#l1-size').val();
        var line1font = $('#l1-font').val();
        var line1color = $('#l1-color').val();
        if (line1 === '') {
            $('#line1').css("border", "2px solid red");
        } else {
            $('#line1').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line1size === '') {
            $('#l1-size').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l1-size').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line1font === '') {
            $('#l1-font').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l1-font').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line1color === '') {
            $('#l1-color').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l1-color').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line1.length > 0 && line1size.length > 0 && line1font.length > 0 && line1color.length > 0) {
            return true;
        }
        return false;
    }

    function validationLine2() {
        var line2 = $('#line2').val();
        var line2size = $('#l2-size').val();
        var line2font = $('#l2-font').val();
        var line2color = $('#l2-color').val();
        if (line2 !== '' && line2size === '') {
            $('#l2-size').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l2-size').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line2 !== '' && line2font === '') {
            $('#l2-font').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l2-font').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line2 !== '' && line2color === '') {
            $('#l2-color').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l2-color').attr('style', 'border: 1px solid #CED4DA');
        }

        if (line2.length > 0 && line2size.length > 0 && line2font.length > 0 && line2color.length > 0) {
            return true;
        } else if (line2.length == 0) {
            return true;
        }

        return false;
    }

    function validationLine3() {
        var line3 = $('#line3').val();
        var line3size = $('#l3-size').val();
        var line3font = $('#l3-font').val();
        var line3color = $('#l3-color').val();
        if (line3 !== '' && line3size === '') {
            $('#l3-size').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l3-size').attr('style', 'border: 2px solid #CED4DA!important');
        }

        if (line3 !== '' && line3font === '') {
            $('#l3-font').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l3-font').attr('style', 'border: 2px solid #CED4DA!important');
        }

        if (line3 !== '' && line3color === '') {
            $('#l3-color').attr('style', 'border: 2px solid red!important');
        } else {
            $('#l3-color').attr('style', 'border: 2px solid #CED4DA!important');
        }

        if (line3.length > 0 && line3size.length > 0 && line3font.length > 0 && line3color.length > 0) {
            return true;
        } else if (line3.length == 0) {
            return true;
        }

        return false;
    }

    function validationCustomWidth() {
        var customWidth = $('#custom-width').val();
        if (customWidth >= 1 && customWidth <= 13) {
            $('#widthRangeErr').text('');
            $('#custom-width').attr('style', 'border: 2px solid #CED4DA!important');
            return true;
        }
        $('#custom-width').attr('style', 'border: 2px solid red!important');
        $('#widthRangeErr').text('* Please select the value with in the range from 1cm to 13cm');
        return false;
    }

    function validationCustomName() {
        var customName = $('#customization-name').val();
        if (customName !== '') {
            $('#customization-name').attr('style', 'border: 2px solid #CED4DA!important');
            return true;
        }
        $('#customization-name').attr('style', 'border: 2px solid red!important');
        return false;
    }

    function setPreview(what) {
        if (what === "line1" && ($('#line1').length > 0)) {
            var text = $('#line1').val();
            if (text.length > 0) {
                var line1Font = $('#l1-font').val();
                var line1Color = $('#l1-color').val();
                var line1Size = $('#l1-size').val();
                if (line1Font.length > 0) {
                    $('#line1-preview').css('font-family', line1Font);
                }
                if (line1Color.length > 0) {
                    $('#line1-preview').css('color', line1Color);
                }
                if (line1Size.length > 0) {
                    $('#line1-preview').css('font-size', line1Size);
                    $('#line1-preview').css('line-height', line1Size);
                }
                $('#line1-preview').text(text);
            }
        } else if (what === "line2" && ($('#line2').length > 0)) {
            var text2 = $('#line2').val();
            if (text2.length > 0) {
                var line2Font = $('#l2-font').val();
                var line2Color = $('#l2-color').val();
                var line2Size = $('#l2-size').val();
                if (line2Font.length > 0) {
                    $('#line2-preview').css('font-family', line2Font);
                }
                if (line2Color.length > 0) {
                    $('#line2-preview').css('color', line2Color);
                }
                if (line2Size.length > 0) {
                    $('#line2-preview').css('font-size', line2Size);
                    $('#line2-preview').css('line-height', line2Size);
                }
                $('#line2-preview').text(text2);
            }
        } else if (what === "line3" && ($('#line3').length > 0)) {
            var text3 = $('#line3').val();
            if (text3.length > 0) {
                var line3Font = $('#l3-font').val();
                var line3Color = $('#l3-color').val();
                var line3Size = $('#l3-size').val();
                if (line3Font.length > 0) {
                    $('#line3-preview').css('font-family', line3Font);
                    $('#line3-preview').css('line-height', line3Font);
                }
                if (line3Color.length > 0) {
                    $('#line3-preview').css('color', line3Color);
                }
                if (line3Size.length > 0) {
                    $('#line3-preview').css('font-size', line3Size);
                    $('#line3-preview').css('line-height', line3Size);
                }
                $('#line3-preview').text(text3);
            }
        }
    }

    //Resetting the field of Text Art Work
    function resetChanges() {
        $('#selected-position').val('Left Chest');
        $('#selected-type').val('Print');
        $('#selected-artwork').val('Upload Image');

        ///----- Text Art Reset ------///
        ///---------------------------///
        ///---------------------------///
        //reset Line1
        $('#line1').val('');
        $('#l1-font').val('');
        $('#l1-size').val('');
        $('#l1-color').val('');
        //reset Line2
        $('#line2').val('');
        $('#l2-font').val('');
        $('#l2-size').val('');
        $('#l2-color').val('');
        //reset Line3
        $('#line3').val('');
        $('#l3-font').val('');
        $('#l3-size').val('');
        $('#l3-color').val('');
        //reset Preview
        $('#line1-preview').text('');
        $('#line2-preview').text('');
        $('#line3-preview').text('');
        //reset Special Instruction
        $('#special-instruction').val('');
        //reset Customization name
        $('#customization-name').val('');
        //reset Custom Width
        $('#custom-width').val('');

        //reset CSS
        $('button').removeClass('active');
        $('#print-button').addClass('active');
        $('div').removeClass('active');
        $('#pe1').addClass('active');

        $('#line1').attr('style', 'border: 1px solid #CED4DA');
        $('#l1-size').attr('style', 'border: 1px solid #CED4DA');
        $('#l1-font').attr('style', 'border: 1px solid #CED4DA');
        $('#l1-color').attr('style', 'border: 1px solid #CED4DA');
        $('#line2').attr('style', 'border: 1px solid #CED4DA');
        $('#l2-size').attr('style', 'border: 1px solid #CED4DA');
        $('#l2-font').attr('style', 'border: 1px solid #CED4DA');
        $('#l2-color').attr('style', 'border: 1px solid #CED4DA');
        $('#line3').attr('style', 'border: 1px solid #CED4DA');
        $('#l3-size').attr('style', 'border: 1px solid #CED4DA');
        $('#l3-font').attr('style', 'border: 1px solid #CED4DA');
        $('#l3-color').attr('style', 'border: 1px solid #CED4DA');

        $('#custom-width').attr('style', 'border: 1px solid #CED4DA');
        $('#customization-name').attr('style', 'border: 1px solid #CED4DA');

        //errors reset
        $('#widthRangeErr').text('');
        $('#err1').css('display', 'none');

        //Hide Name & Number and display Print Embroidery
        $('#names').css('display', 'none');
        $('#print-embroidery').css('display', 'block');

        ///-- Upload Image Art Reset --///
        ///---------------------------///
        ///---------------------------///


        //reset Special Instruction
        $('#special-instruction2').val('');
        //reset Customization name
        $('#customization-name2').val('');
        //reset Custom Width
        $('#custom-width2').val('');

        //css reset
        $('#file-drag').attr('style', 'border: 3px solid #eee');
        $('#file-drag').hover(function() {
            $(this).attr('style', 'border-color: #EE8013');
        });
        $('#custom-width2').css('border', '1px solid #CED4DA');
        $('#customization-name2').css('border', '1px solid #CED4DA');

        //errors reset
        $('#widthRangeErr2').text('');
        $('#uploadErr').css('display', 'none');

        //reset Image Preview
        document.getElementById('file-image').classList.add("hidden");
        document.getElementById('file-image').src = '#'
        document.getElementById('response').classList.add("hidden");
        document.getElementById('start').classList.remove("hidden");

        ///-- Text Name & Number Reset --///
        ///------------------------------///
        ///-----------------------------///
        $('#nn-font').val('');
        $('#nn-name').val('');
        $('#nn-number').val('');
        $('#nn-cname').val('');
        $('#nn-name-preview').text('');
        $('#nn-number-preview').text('');

        $('#nn-font').css('border', '1px solid #CED4DA');
        $('#nn-name').css('border', '1px solid #CED4DA');
        $('#nn-number').css('border', '1px solid #CED4DA');
        $('#nn-cname').css('border', '1px solid #CED4DA');

        //error reset
        $('#nameNumberErr').css('display', 'none');
    }

    //set Name And Number View
    function previewNameAndNumber() {
        var nnName = $('#nn-name').val();
        var nnNumber = $('#nn-number').val();
        var nnFont = $('#nn-font').val();
        var nnColor = $('#nn-color').val();

        if (nnFont.length > 0) {
            $('#nn-name-preview').css('font-family', nnFont);
            $('#nn-number-preview').css('font-family', nnFont);
        }

        if (nnColor.length > 0) {
            $('#nn-name-preview').css('color', nnColor);
            $('#nn-number-preview').css('color', nnColor);
        }

        $('#nn-name-preview').text(nnName);
        $('#nn-number-preview').text(nnNumber);
    }

    function submitCart() {
        if (grandTotalQuantGlobal == 0) {
            $('#cartAlertModal').modal('show');
        } else {

        }
    }

    function effectCustomizationPrice(quantity, price) {
        //total quantity and withoutCustomization Price
        // var sizeOf = Object.keys(customizationTypes).length;
        var embroidery = "{{ json_encode($singleProduct['embroidery']) }}";
        var print = "{{ json_encode($singleProduct['printing']) }}";
        var name_numbers = "{{ json_encode($singleProduct['name_numbers']) }}";
        var setup_charges = "{{ json_encode($singleProduct['setup_charges']) }}";

        //remove /&quot;/ g ->globally from json encode
        var embroidery = JSON.parse(embroidery.replace(/&quot;/g, '"'));
        var print = JSON.parse(print.replace(/&quot;/g, '"'));
        var name_numbers = JSON.parse(name_numbers.replace(/&quot;/g, '"'));
        var setup_charges = JSON.parse(setup_charges.replace(/&quot;/g, '"'));

        // console.log("price test",price,"quant2 + price2",grandTotalQuantGlobal,grandTotalPriceGlobal);

        // console.log(setup_charges);
        // console.log(customizationIDArr.length);

        if (customizationIDArr.length > 0 && quantity > 0) {
            var currentPrice = price; //Price without Customization
            var customizationPrice = 0;
            var setupCharges = 0;
            //check the type and positions and set the customization
            //price and setup charges according to the requirement
            for (var pos = 0; pos < customizationIDArr.length; pos++) {
                // console.log(customizationIDArr[pos],customizationTypes[pos],customizationTypes);
                //calculating the customization price of Print
                if (customizationTypes[customizationIDArr[pos]] === "Print") {
                    // console.log(print[customizationPositions[customizationIDArr[pos]]],print);
                    // console.log("check",customizationPositions[customizationIDArr[pos]],print[customizationPositions[customizationIDArr[pos]]].length,print);
                    for (var pos1 = 0; pos1 < print[customizationPositions[customizationIDArr[pos]]].length; pos1++) {
                        // print[customizationPositions[customizationIDArr[pos]]].map(function(val,index){
                        // console.log(val,index);
                        var val = print[customizationPositions[customizationIDArr[pos]]][pos1];
                        // console.log("val",val);
                        if (quantity >= val['quantity_from'] && quantity <= val['quantity_to']) {
                            customizationPrice += quantity * val['price'];
                            // console.log("0-",customizationPrice);
                            break;
                        }
                        // });
                    }
                    //setup charges from database with position Print
                    for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                        if (setup_charges[pos4]['type'] === "Print") {
                            setupCharges += parseFloat(setup_charges[pos4]['setup_charges']);
                        }
                    }
                } else if (customizationTypes[customizationIDArr[pos]] === "Embroidery") { //calculating the customization Price of Embroidery
                    for (var pos2 = 0; pos2 < embroidery[customizationPositions[customizationIDArr[pos]]].length; pos2++) {
                        var val = embroidery[customizationPositions[customizationIDArr[pos]]][pos2];
                        if (quantity >= val['quantity_from'] && quantity <= val['quantity_to']) {
                            customizationPrice += quantity * val['price'];
                            break;
                        }
                    }
                    //setup charges from database with position Embroidery
                    for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                        if (setup_charges[pos4]['type'] === "Embroidery") {
                            setupCharges += parseFloat(setup_charges[pos4]['setup_charges']);
                        }
                    }
                } else if (customizationTypes[customizationIDArr[pos]] === "Name & Numbers") {
                    for (var pos3 = 0; pos3 < name_numbers[customizationPositions[customizationIDArr[pos]]].length; pos3++) {
                        var val = name_numbers[customizationPositions[customizationIDArr[pos]]][pos3];
                        if (quantity >= val['quantity_from'] && quantity <= val['quantity_to']) {
                            customizationPrice += quantity * val['price'];
                            break;
                        }
                    }
                    //setup charges from database with position Name & Numbers
                    for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                        if (setup_charges[pos4]['type'] === "Name & Numbers") {
                            setupCharges += parseFloat(setup_charges[pos4]['setup_charges']);
                            break;
                        }
                    }
                }
            }
            // console.log(customizationPrice);
            $('#customizationPrice').text('$' + customizationPrice);
            $('#customPriceContainer').css("display", "block");
            grandTotalCustomizationPrice = customizationPrice;

            $('#setupCharges').text("$" + setupCharges);
            $('#setupChargesContainer').css("display", "block");
            grandTotalSetupCharges = setupCharges;

            // console.log("bb",currentPrice,"mutiplied",currentPrice * customizationIDArr.length);
            // currentPrice = currentPrice * customizationIDArr.length;

            totalPriceWithCustomization = parseFloat(currentPrice * customizationIDArr.length) + parseFloat(customizationPrice) + parseFloat(setupCharges);
            $('#')

            // grandTotalPriceGlobal = totalPriceWithCustomization;
            // console.log(grandTotalPriceGlobal,currentPrice,totalPriceWithCustomization,customizationIDArr.length);

            $('#totalPrice').text('$' + totalPriceWithCustomization.toFixed(2));
        } else {
            $('#customizationPrice').text('');
            $('#setupCharges').text('');
            $('#setupChargesContainer').css("display", "none");
            $('#customPriceContainer').css("display", "none");
        }
        // console.log(sizeOf, quantity, price);
    }

    function deleteCustomization(customizationID) {
        // console.log("1", customizationID, customizationIDArr);

        var embroidery = "{{ json_encode($singleProduct['embroidery']) }}";
        var print = "{{ json_encode($singleProduct['printing']) }}";
        var name_numbers = "{{ json_encode($singleProduct['name_numbers']) }}";
        var setup_charges = "{{ json_encode($singleProduct['setup_charges']) }}";


        var embroidery = JSON.parse(embroidery.replace(/&quot;/g, '"'));
        var print = JSON.parse(print.replace(/&quot;/g, '"'));
        var name_numbers = JSON.parse(name_numbers.replace(/&quot;/g, '"'));
        var setup_charges = JSON.parse(setup_charges.replace(/&quot;/g, '"'));

        // var minimizePrice = 0;
        var minimizeCustPrice = 0;
        var minimizeSetupCharges = 0;
        // console.log("Before Minimizing",grandTotalPriceGlobal);

        //Get the type of removed customization and minmize the
        if (customizationTypes[customizationID] === "Print") {
            for (var pos1 = 0; pos1 < print[customizationPositions[customizationID]].length; pos1++) {
                // print[customizationPositions[customizationIDArr[pos]]].map(function(val,index){
                // console.log(val,index);
                var val = print[customizationPositions[customizationID]][pos1];
                // console.log("val",val);
                if (grandTotalQuantGlobal >= val['quantity_from'] && grandTotalQuantGlobal <= val['quantity_to']) {
                    minimizeCustPrice -= grandTotalQuantGlobal * val['price'];
                    break;
                }
                // });
            }
            //setup charges from database with position Print
            for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                if (setup_charges[pos4]['type'] === "Print") {
                    minimizeSetupCharges -= parseFloat(setup_charges[pos4]['setup_charges']);
                }
            }
        } else if (customizationTypes[customizationID] === "Embroidery") {
            for (var pos2 = 0; pos2 < embroidery[customizationPositions[customizationID]].length; pos2++) {
                var val = embroidery[customizationPositions[customizationID]][pos2];
                if (grandTotalQuantGlobal >= val['quantity_from'] && grandTotalQuantGlobal <= val['quantity_to']) {
                    customizationPrice -= grandTotalQuantGlobal * val['price'];
                    break;
                }
            }
            //setup charges from database with position Embroidery
            for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                if (setup_charges[pos4]['type'] === "Embroidery") {
                    setupCharges -= parseFloat(setup_charges[pos4]['setup_charges']);
                }
            }
        } else if (customizationTypes[customizationID] === "Name & Numbers") {
            for (var pos3 = 0; pos3 < name_numbers[customizationPositions[customizationID]].length; pos3++) {
                var val = name_numbers[customizationPositions[customizationID]][pos3];
                if (grandTotalQuantGlobal >= val['quantity_from'] && grandTotalQuantGlobal <= val['quantity_to']) {
                    customizationPrice -= grandTotalQuantGlobal * val['price'];
                    break;
                }
            }
            //setup charges from database with position Name & Numbers
            for (pos4 = 0; pos4 < setup_charges.length; pos4++) {
                if (setup_charges[pos4]['type'] === "Name & Numbers") {
                    setupCharges -= parseFloat(setup_charges[pos4]['setup_charges']);
                    break;
                }
            }
        }

        // console.log(minimizeCustPrice,minimizeSetupCharges,grandTotalPriceGlobal);

        grandTotalPriceGlobal = grandTotalPriceGlobal + (minimizeCustPrice + (minimizeSetupCharges));
        //display total Price
        $('#totalPrice').text('$'+grandTotalPriceGlobal.toFixed(2));
        // var removedDollarSign = $('#customizationPrice').text().split('$'); //remove dollar sign
        var currentCustPrice = grandTotalCustomizationPrice - minimizeCustPrice;
        // var removedDollarSign2 = $('#setupCharges').text().split('$'); //remove dollar sign
        var currentSetupCharges = grandTotalSetupCharges - minimizeSetupCharges;



        // console.log(removedDollarSign,removedDollarSign2);
        if(currentCustPrice > 0){
            //display Customization Price
            $('#customizationPrice').text('$'+currentCustPrice.toFixed(2));
            //display Setup Charges
            $('#setupCharges').text('$'+currentSetupCharges.toFixed(2));
        }else{
            $('#customizationPrice').text('');
            $('#setupCharges').text('');
            $('#customPriceContainer').css('display','none');
            $('#setupChargesContainer').css('display','none');
        }

        //Remove Elements from objects and arrays
        //array
        if (customizationIDArr.includes(customizationID)) {
            // customizationIDArr.pop(customizationID); //removes the last element
            var valIndex = customizationIDArr.indexOf(customizationID) //get the index of customizationID
            customizationIDArr.splice(valIndex, 1) //remove the value from array splice(index,deleteCount)
        }

        //objects
        if (customizationID in customizationTypes) {
            delete customizationTypes[customizationID];
        }

        if (customizationID in customizationPositions) {
            delete customizationPositions[customizationID];
        }

        if (customizationID in customizationArtWorks) {
            delete customizationArtWorks[customizationID];
        }

        if (customizationID in customizationNames) {
            delete customizationNames[customizationID];
        }

        if (customizationID in designWidth) {
            delete designWidth[customizationID];
        }

        if (customizationID in specialInstructions) {
            delete specialInstructions[customizationID];
        }

        if (customizationID in uploads) {
            delete uploads[customizationID];
        }

        if (customizationID in line1s) {
            delete line1s[customizationID];
        }

        if (customizationID in line1Fonts) {
            delete line1Fonts[customizationID];
        }

        if (customizationID in line1Sizes) {
            delete line1Sizes[customizationID];
        }

        if (customizationID in line1Colors) {
            delete line1Colors[customizationID];
        }

        if (customizationID in line2s) {
            delete line2s[customizationID];
        }

        if (customizationID in line2Fonts) {
            delete line2Fonts[customizationID];
        }

        if (customizationID in line2Sizes) {
            delete line2Sizes[customizationID];
        }

        if (customizationID in line2Colors) {
            delete line2Colors[customizationID];
        }

        if (customizationID in line3s) {
            delete line3s[customizationID];
        }

        if (customizationID in line3Fonts) {
            delete line3Fonts[customizationID];
        }

        if (customizationID in line3Sizes) {
            delete line3Sizes[customizationID];
        }

        if (customizationID in line3Colors) {
            delete line3Colors[customizationID];
        }

        if (customizationID in customizationNumbers) {
            delete customizationNumbers[customizationID];
        }


        //set the serial or order of the customization and customization names
        if (customizationIDArr.length > 0) {
            // console.log(customizationIDArr);
            for (pos = 0; pos < customizationIDArr.length; pos++) {
                $('#cHead-' + customizationIDArr[pos]).html(`CUSTOMISATION ${pos + 1} - <span>${customizationNames[customizationIDArr[pos]]}</span>`);
            }
        }


        //remove the div of the customization


        // console.log("2", customizationID, customizationIDArr, customizationTypes, customizationPositions);
        // console.log(customizationPositions,customizationNames)
        //remove Customization
        // $('#customization-container').find('customization-'+customizationID).remove();
    }

    function showQuoteModal(){
        let quoteModal = `<div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"style="margin-right: auto;margin-left: 2px">Request Quote</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('submitQuotes') }}" enctype="multipart/form-data">
                                    @csrf
        <input type="ralawise" name="supplier" hidden/>
        <div class="modal-body">
@csrf
        <input name="product_id" value="{{ $singleProduct['id'] }}" hidden/>
                                            <div class="mb-3">
                                                <input class="form-control" name="name" required placeholder="Full Name" type="text"/>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="email" required placeholder="Email" type="email"/>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="phone" placeholder="Phone Number" type="text" onkeypress="onlyNumber(event)"/>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="quantity" placeholder="Quantity" type="number"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="line1">Line 1</label>
                                                <input class="form-control" name="line1" placeholder="Line 1" type="text"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="line2">Line 2</label>
                                                <input class="form-control" name="line2" placeholder="Line 2" type="text"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="line3">Line 3</label>
                                                <input class="form-control" name="line3" placeholder="Line 3" type="text"/>
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" required style="border: 1px solid #CED4DA !important;" name="position_type">
                                                    <option value="">Select Position</option>
                                                    <option value="print">Print</option>
                                                    <option value="embroidery">Embroidery</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="images">Logos (If Any)</label>
                                                <input name="images[]" multiple class="form-control" type="file" accept="ai, cdr, eps, psd, jpeg, tiff, pdf, png" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="company_name">Business Name(If Applicable)</label>
                                                <input class="form-control" name="business_name" placeholder="Business Name" type="text"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="company_name">Other Details</label>
                                                <textarea name="other_details" placeholder="Product Code, Colour, Size..."></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>`;
        $(quoteModal).modal('show');
    }

</script>
