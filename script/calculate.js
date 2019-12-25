let width = document.getElementById('width');
let diametor = document.getElementById('diametor');
let length = document.getElementById('length');
let perimetr = document.getElementById('S');
let form = document.getElementById('test');
let diff;
let S;
let diff_level = document.getElementById('diff');
let powder_cons = document.getElementById('powder_cons');
let diff_100;
let diff_70;
let powder_capasity = document.getElementById('paint_one_prod');
let end_price = document.getElementById('end_price');
let polimerization_one_prod;
let furnauce_degazation;
let one_furnauce_degazation;


let labelDiametor = document.querySelector('.diametor');
let prod_width = document.querySelector('.prod_width');
let count_value = document.getElementById('count_value');


let prepar_painting = document.getElementById('prepar_painting');
let paint_prod = document.getElementById('paint_prod');
let in_out_prod = document.getElementById('in_out_prod');
let rail_count = document.getElementById('rail_count');
let min_work_price = document.getElementById('min_work_price');
let max_pod = document.getElementById('max_pod');
let energy_need = document.getElementById('energy_need');
let time_furnauce_work = document.getElementById('time_furnauce_work');
let cost_for_15_metr_pack = document.getElementById('cost_for_15_metr_pack');

//первый слой
let eoruLayer1 = document.getElementById('eoruLayer1');
let euroCourslayer1 = document.getElementById('euroCourslayer1');
let layer1Price = document.getElementById('layer1Price');

//второй слой
let eoruLayer2 = document.getElementById('eoruLayer2');
let euroCourslayer2 = document.getElementById('euroCoursLayer2');
let layer2Price = document.getElementById('layer2Price');

//третий слой
let eoruLayer3 = document.getElementById('eoruLayer3');
let euroCoursLayer3 = document.getElementById('euroCoursLayer3');
let layer3Price = document.getElementById('layer3Price');

//четвертый слой
let eoruLayer4 = document.getElementById('eoruLayer4');
let euroCoursLayer4 = document.getElementById('euroCoursLayer4');
let layer4Price = document.getElementById('layer4Price');

//пятый слой
let eoruLayer5 = document.getElementById('eoruLayer5');
let euroCoursLayer5 = document.getElementById('euroCoursLayer5');
let layer5Price = document.getElementById('layer5Price');

//
//
//
//
//
//
//
//

function diffEasy() {
    diff = document.getElementById('diff_work_id1')
    diff_level = diff.value

}

function diffMedium() {
    diff = document.getElementById('diff_work_id2')
    diff_level = diff.value


}

function diffHard() {
    diff = document.getElementById('diff_work_id3')
    diff_level = diff.value


}

function check1() {

    diametor.style.display = 'none';
    labelDiametor.style.display = 'none';
    width.style.display = 'block';
    prod_width.style.display = 'block';

    max_pod.value = 36;
    cost_for_15_metr_pack.value = 0;
    form.addEventListener("keyup", function (event) {
        S = (length.value * width.value) * count_value.value;
        console.log(count_value.value)
        perimetr.value = S.toFixed(4);
    });

}

function check2() {
    width.style.display = 'none';
    prod_width.style.display = 'none';
    diametor.style.display = 'block';
    labelDiametor.style.display = 'block';

    max_pod.value = 11;
    form.addEventListener("keyup", function (event) {
        S = 2 * length.value * diametor.value * Math.PI.toFixed(2);

        perimetr.value = S.toFixed(4);
    });
}

function calcDiff_100() {
    diff_100 = Math.round(powder_cons.value * diff.value);

    powder_capasity.value = (S * diff_100 / 1000).toFixed(5);

}

function calcDiff_70() {
    diff_70 = Math.round(powder_cons.value * diff.value).toFixed(1) * 0.7;

    powder_capasity.value = (S * diff_70 / 1000).toFixed(5);

}


form.addEventListener("keyup",

    function calcPaintLayer(e) {
        if (euroCourslayer1.value !== "" && eoruLayer1.value !== "") {
            layer1Price.value = ((euroCourslayer1.value).replace(/,/, '.') * (eoruLayer1.value).replace(/,/, '.')).toFixed(2);
            console.log(layer1Price.value + '  layer1Price ');
            if (euroCourslayer2.value !== "" && eoruLayer2.value !== "") {

                layer2Price.value = ((euroCourslayer2.value).replace(/,/, '.') * (eoruLayer2.value).replace(/,/, '.')).toFixed(2);
                console.log(layer2Price.value + '  layer2Price ');
                if (euroCoursLayer3.value !== "" && eoruLayer3.value !== "") {

                    layer3Price.value = ((euroCoursLayer3.value).replace(/,/, '.') * (eoruLayer3.value).replace(/,/, '.')).toFixed(2)

                    if (euroCoursLayer4.value !== "" && eoruLayer4.value !== "") {

                        layer4Price.value = ((euroCoursLayer4.value).replace(/,/, '.') * (eoruLayer4.value).replace(/,/, '.')).toFixed(2)

                        if (euroCoursLayer5.value !== "" && eoruLayer5.value !== "") {

                            layer5Price.value = ((euroCoursLayer5.value).replace(/,/, '.') * (eoruLayer5.value).replace(/,/, '.')).toFixed(2)

                        }
                    }
                }
            }
        }

        console.log(layer1Price.value, layer2Price.value, layer3Price.value, layer4Price.value, layer5Price.value)
    }
);


function calcPriceForWork() {


    //Стоимость окраски одного изделия
    let paint_one_rail = (min_work_price.value / rail_count.value).toFixed(2);
    //Полимеризация одного изделия
    polimerization_one_prod = (paint_one_rail / max_pod.value).toFixed(2);

    //Стоимость дегазации печи
    furnauce_degazation = (energy_need.value * time_furnauce_work.value * 5 * 1.5).toFixed(2);
    one_furnauce_degazation = (furnauce_degazation / (max_pod.value * rail_count.value)).toFixed(2);
    console.log(one_furnauce_degazation);
}

form.addEventListener("keyup", function calcEndPrice() {
    calcPriceForWork();
    let price_for_one_layer_pant_for_layer1;
    let end_price_for_one_layer_pant_for_layer1;
    let price_for_one_layer_pant_for_layer2;
    let end_price_for_one_layer_pant_for_layer2;
    let price_for_one_layer_pant_for_layer3;
    let end_price_for_one_layer_pant_for_layer3;
    let price_for_one_layer_pant_for_layer4;
    let end_price_for_one_layer_pant_for_layer4;
    let price_for_one_layer_pant_for_layer5;
    let end_price_for_one_layer_pant_for_layer5;


    //  * 1.3
    console.log(polimerization_one_prod);
    console.log(furnauce_degazation)


    if (euroCourslayer1.value !== "" && eoruLayer1.value !== "") {

        price_for_one_layer_pant_for_layer1 = Number(layer1Price.value * powder_capasity.value).toFixed(2);
        let someCalc = Number(prepar_painting.value) + Number(paint_prod.value) + Number(in_out_prod.value) + Number(in_out_prod.value) + Number(polimerization_one_prod) + Number(cost_for_15_metr_pack.value);
        console.log(price_for_one_layer_pant_for_layer1 + ' Окрас одного слоя');
        end_price_for_one_layer_pant_for_layer1 = ((parseFloat(price_for_one_layer_pant_for_layer1) + parseFloat(someCalc)) * 1.3).toFixed(2);
        console.log(Number(prepar_painting.value) + ' ' + Number(paint_prod.value) + ' ' + Number(in_out_prod.value) + ' ' + Number(polimerization_one_prod) + ' ' + Number(cost_for_15_metr_pack.value))
        console.log(end_price_for_one_layer_pant_for_layer1 + '  one')

        end_price.value = end_price_for_one_layer_pant_for_layer1;

        if (euroCourslayer2.value !== "" && eoruLayer2.value !== "") {


            price_for_one_layer_pant_for_layer2 = Number(layer2Price.value * powder_capasity.value).toFixed(2);
            let someCalc = Number(paint_prod.value) + Number(polimerization_one_prod);


            console.log(price_for_one_layer_pant_for_layer2 + ' Окрас одного слоя');

            end_price_for_one_layer_pant_for_layer2 = ((parseFloat(price_for_one_layer_pant_for_layer2) + parseFloat(someCalc)) * 1.3).toFixed(2);

            console.log(Number(prepar_painting.value) + ' ' + Number(paint_prod.value) + ' ' + Number(in_out_prod.value) + ' ' + Number(polimerization_one_prod) + ' ' + Number(cost_for_15_metr_pack.value))
            console.log(end_price_for_one_layer_pant_for_layer2 + '     Two')

            end_price.value = (parseFloat(end_price.value) + parseFloat(end_price_for_one_layer_pant_for_layer2) + Number(cost_for_15_metr_pack.value) + parseFloat(one_furnauce_degazation)).toFixed(2);
            console.log(end_price.value);
            if (euroCoursLayer3.value !== "" && eoruLayer3.value !== "") {


                price_for_one_layer_pant_for_layer3 = Number(layer3Price.value * powder_capasity.value).toFixed(2);
                let someCalc = Number(prepar_painting.value) + Number(paint_prod.value) + Number(in_out_prod.value) + Number(polimerization_one_prod) + Number(cost_for_15_metr_pack.value);

                end_price_for_one_layer_pant_for_layer3 = ((parseFloat(price_for_one_layer_pant_for_layer3) + parseFloat(someCalc)) * 1.3).toFixed(2);
                console.log(Number(prepar_painting.value) + ' ' + Number(paint_prod.value) + ' ' + Number(in_out_prod.value) + ' ' + Number(polimerization_one_prod) + ' ' + Number(cost_for_15_metr_pack.value))
                console.log(end_price_for_one_layer_pant_for_layer3 + '     Three')

                if (euroCoursLayer4.value !== "" && eoruLayer4.value !== "") {

                    price_for_one_layer_pant_for_layer4 = Number(layer4Price.value * powder_capasity.value).toFixed(2);
                    let someCalc = Number(prepar_painting.value) + Number(paint_prod.value) + Number(in_out_prod.value) + Number(polimerization_one_prod) + Number(cost_for_15_metr_pack.value);

                    end_price_for_one_layer_pant_for_layer4 = ((parseFloat(price_for_one_layer_pant_for_layer4) + parseFloat(someCalc)) * 1.3).toFixed(2);
                    console.log(Number(prepar_painting.value) + ' ' + Number(paint_prod.value) + ' ' + Number(in_out_prod.value) + ' ' + Number(polimerization_one_prod) + ' ' + Number(cost_for_15_metr_pack.value))
                    console.log(end_price_for_one_layer_pant_for_layer4 + '     Four')

                    if (euroCoursLayer5.value !== "" && eoruLayer5.value !== "") {

                        price_for_one_layer_pant_for_layer5 = Number(layer5Price.value * powder_capasity.value).toFixed(2);
                        let someCalc = Number(prepar_painting.value) + Number(paint_prod.value) + Number(in_out_prod.value) + Number(polimerization_one_prod) + Number(cost_for_15_metr_pack.value);

                        end_price_for_one_layer_pant_for_layer5 = ((parseFloat(price_for_one_layer_pant_for_layer5) + parseFloat(someCalc)) * 1.3).toFixed(2);
                        console.log(Number(prepar_painting.value) + ' ' + Number(paint_prod.value) + ' ' + Number(in_out_prod.value) + ' ' + Number(polimerization_one_prod) + ' ' + Number(cost_for_15_metr_pack.value))
                        console.log(end_price_for_one_layer_pant_for_layer5 + '     Five')

                    }
                }
            }
        }
    }
});



