


var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {slideIndex = 1} 

  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }

  slides[slideIndex-1].style.display = "block"; 
}


var keys = {};

function trackMultipleKeyStroke (e) {
    e = e || event;
    e.which = e.which || e.keyCode;
  
    keys[e.which] = e.type === 'keydown';

    if (keys[37]) {
        plusSlides(-1);

    }
    if (keys[39]) {
        plusSlides(1);

    }

}

function addEvent(element, event, func) {
    if (element.attachEvent) {
        return element.attachEvent('on' + event, func);
    } else {
        return element.addEventListener(event, func, false);
    }
}

addEvent(window, "keydown", trackMultipleKeyStroke);
addEvent(window, "keyup", trackMultipleKeyStroke);