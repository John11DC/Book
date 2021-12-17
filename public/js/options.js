var carousel = document.querySelector('.carousel');
/*Nombre de slides*/
var cellCount = 3;
/*Slide initial*/
var selectedIndex = 0;

/*Fonction rotation slides selon l'axe Z et l'axe Y*/ 
function rotateCarousel() {
  var angle = selectedIndex / cellCount * -360;
  carousel.style.transform = 'translateZ(-288px) rotateY(' + angle + 'deg)';
}
 
/*On attache la fonction rotation lorsque l'on appuie sur le bouton précédent*/
var prevButton = document.querySelector('.previous-button');
prevButton.addEventListener( 'click', function() {
  selectedIndex--;
  rotateCarousel();
});

/*On attache la fonction rotation lorsque l'on appuie sur le bouton suivant*/
var nextButton = document.querySelector('.next-button');
nextButton.addEventListener( 'click', function() {
  selectedIndex++;
  rotateCarousel();
});