$(document).ready(function(){
    //настройки слайдера Slick
    $(".section-block__first-sliders").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        fade: true,
        asNavFor: '.section-block__second-sliders'
    });
    $(".section-block__second-sliders").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        asNavFor: '.section-block__first-sliders',
        dots: false,
        centerMode: true,
        focusOnSelect: true
    });

    //функционал калькулятора
    let bindButtons = document.querySelectorAll("td[data-calc]");
    for (let i = 0, length = bindButtons.length; i < length; i++) {
        //bindButtons[i]("click", addFuncButtonCalc);
        bindButtons[i].addEventListener("click", addFuncButtonCalc);

    };
    function addFuncButtonCalc(){
        //нажатая кнопка
        let pressButton = this.dataset.calc;
        //контейнер с результатом
        let containerResult = document.querySelector(".calculator .calculator_result");
        let textResult = containerResult.textContent;
        if(!isNaN(pressButton)){

            console.log("я цифра: " + pressButton);

            addNumberOrBelongs();
            //функция добавления числа (символа)
            function addNumberOrBelongs() {
                //вторая и последующая цифра
                if((containerResult.textContent !== "") &&
                    (Number(containerResult.textContent) !== 0) &&
                    (Number(containerResult.textContent.length) < 8)
                ){
                    containerResult.textContent += pressButton;
                //первая цифра замены (привели строку к числу и сравнили)
                }else if(Number(containerResult.textContent) === 0){
                    containerResult.textContent = pressButton;
                }
            }

        }else{
            if(pressButton === "," && !containerResult.textContent.includes(",")){
                containerResult.textContent += ",";
            }
            if(pressButton === "C"){
                containerResult.textContent = "0";
            }
            if(pressButton === "X"){
                containerResult.textContent = containerResult.textContent.slice(0,-1);
            }
            if(pressButton === "+/-"){
                if(containerResult.textContent.includes("-")){
                    containerResult.textContent = containerResult.textContent.slice(1)
                }else{
                    containerResult.textContent = "-" + containerResult.textContent;
                }
            }
            if(pressButton === "+"){
                containerResult.textContent += "+";
            }
            if(pressButton === "-"){
                containerResult.textContent += "-";
            }
            if(pressButton === "*"){
                containerResult.textContent += "*";
            }
            if(pressButton === "/"){
                containerResult.textContent += "/";
            }
            if(pressButton === "="){
                containerResult.textContent = eval(containerResult.textContent);
                //containerResult.textContent = +containerResult.textContent + operator + numberOne;
            }
            console.log("я не цифра: " + pressButton);
        }
    }
});