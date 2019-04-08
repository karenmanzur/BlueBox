$(document).ready(function(){

var imgItems = $('.slider li').length;//Este es el numero de imagenes
var imgPos = 1;

//grega los Items por paginas
for (i = 1; i <= imgItems; i++){

$('.pagination').append('<li><span class="fa fa-circle"></span></li>');

}

$('.slider li').hide(); //Oculta las otras imagenes
$('.slider li:first').show(); //Muestra la primera imagen la principal
$('.pagination li:first').css({'color' : '#CD6E2E'});// Estilo del primer Item color


//Al dar click ejecutamos las funciones 
$('.pagination li').click(pagination);
$('.right span').click(nextSlider);
$('.left span').click(prevSlider);

setInterval(function(){
	
	nextSlider();

}, 4000);

//Funciones------------------
function pagination(){
	var paginationPos = $(this).index() + 1;// Trae el valor del elemento seleccionado


$('.slider li').hide();
$('.slider li:nth-child('+ paginationPos +')').fadeIn();

$('.pagination li').css({'color' : '#858585'});
$(this).css({'color' : '#CD6E2E'});

imgPos = paginationPos;

}

function nextSlider(){

if (imgPos >= imgItems) {

    imgPos = 1

} else{
	
	imgPos++;

}   


$('.slider li').hide();//oculta los otros slider
$('.slider li:nth-child('+ imgPos +')').fadeIn();//Muestra el slider seleccionado
$('.pagination li').css({'color' : '#858585'});
$('.pagination li:nth-child('+ imgPos+')').css({'color' : '#CD6E2E'});



}

function prevSlider(){

if (imgPos <= 1) {

    imgPos = imgItems;

} else{
	
	imgPos--;

}   


$('.slider li').hide();//oculta los otros slider
$('.slider li:nth-child('+ imgPos +')').fadeIn();//Muestra el slider seleccionado
$('.pagination li').css({'color' : '#858585'});
$('.pagination li:nth-child('+ imgPos+')').css({'color' : '#CD6E2E'});



}


});