$(document).ready(function(){
	console.log("ddd");
	setSliderHeight();

	var countImages = $(".slider .wrepImages img").length;
	var currentImageNext = 2;
	var currentImage = 1;
	var currentImagePrev = countImages;
	$(".slider .wrepImages img:nth-child("+currentImage+")").addClass("active");

	$(".slider .wrepImages img:nth-child("+currentImageNext+")").addClass("activeNext");
	$(".slider .wrepImages img:nth-child("+currentImagePrev+")").addClass("activePrev");


	$(".slider .wrepButton .prev").click(function(){
		
		currentImage = prevImage(currentImage,countImages); 
		setClasses(currentImage,countImages);

	});

	$(".slider .wrepButton .next").click(function(){
		
		currentImage = nextImage(currentImage,countImages); 
		setClasses(currentImage,countImages);
	});

});

function setClasses(currentImage,countImages){

	currentImageNext =nextImage(currentImage,countImages); 
	currentImagePrev =prevImage(currentImage,countImages);
	
	$(".slider .wrepImages img").removeClass("active")
								.removeClass("activeNext")
								.removeClass("activePrev");

	$(".slider .wrepImages img").removeClass("active").removeClass("activeNext");
	$(".slider .wrepImages img:nth-child("+currentImage+")").addClass("active");
	$(".slider .wrepImages img:nth-child("+currentImageNext+")").addClass("activeNext");
	$(".slider .wrepImages img:nth-child("+currentImagePrev+")").addClass("activePrev");
}


function nextImage(currentImage, maxImage){
	var nextImage = currentImage+1;
	if(currentImage>=maxImage){
		nextImage = 1;
	}
	return nextImage;
}

function prevImage(currentImage, maxImage){
	var prevImage = currentImage-1;
	if(currentImage<=1){
		prevImage = maxImage;
	}
	return prevImage;
}


$(window).resize(function(){
	setSliderHeight();
});


function setSliderHeight(){
	var sliderHeight = $(".slider .wrepImages img").height();
	$(".slider .wrepImages").height(sliderHeight);
}


