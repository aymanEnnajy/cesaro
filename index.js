/*const toglBtn = document.querySelector('toglBtn')
const toglBtnIcon = document.querySelector('toglBtn i')
const dropDown = document.querySelector('dropDown')
toglBtn.onclick= function() {
    dropDown.classList.toggle('open')
    const isOpen= dropDown.classList.contains('opens')
}
*/

$(document).ready(function(){
    // Activate carousel
    $('#product-slider').carousel({
      interval: 10000, // Change slide every 10 seconds
      pause: 'hover'
    });

    // Manually advance carousel
    $('.carousel-control-next').click(function(){
      $('#product-slider').carousel('next');
    });

    $('.carousel-control-prev').click(function(){
      $('#product-slider').carousel('prev');
    });
  });

  



  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
    breakpoints: {
      360: {
        slidesPerView: 1.5,
        spaceBetween: 20,
      },
      540: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
  });


  const showMenu = (toggleId,navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId)

    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            nav.classList.toggle('show')
        })
    }
}
showMenu('nav-toggle','nav-menu')

/*----- CAMBIO COLORS -----*/
const sizes = document.querySelectorAll('.size__tallas');
const colors = document.querySelectorAll('.sneaker__color');
const sneaker = document.querySelectorAll('.sneaker__img');

function changeSize(){
    sizes.forEach(size => size.classList.remove('active'));
    this.classList.add('active');
}

function changeColor(){
    let primary = this.getAttribute('primary');
    let color = this.getAttribute('color');
    let sneakerColor = document.querySelector(`.sneaker__img[color="${color}"]`);

    colors.forEach(c => c.classList.remove('active'));
    this.classList.add('active');

    document.documentElement.style.setProperty('--primary', primary);

    sneaker.forEach(s => s.classList.remove('shows'));
    sneakerColor.classList.add('shows')
}

sizes.forEach(size => size.addEventListener('click', changeSize));
colors.forEach(c => c.addEventListener('click', changeColor));



/* */
/* details produit */

function changerValeurInput(nouvelleValeur) {
  document.getElementById('inp').value = nouvelleValeur;
}

changerValeurInput("456");



/*calcul */



function calculate() {
  var number1 = parseFloat(document.querySelector('#var1').textContent);
  var number2 = parseFloat(document.querySelector('#var2').textContent);
  var prix = parseFloat(document.querySelector('#prix').textContent);
  
  var resul_cm = number1 * number2;
  var resul_m= resul_cm / 10000;
  var inp2 = document.getElementById('inp2').value;
  var  piece= parseFloat(inp2);
  
  




  
  var inp2 = document.getElementById('inp2').value;
var  piece= parseFloat(inp2);
  // Récupérer la valeur de l'entrée
  var dimention = parseFloat(document.getElementById('inp').value);
  var dim_parcarton= resul_m * piece
  // Effectuer le calcul (par exemple, multiplier par 2)
  var nbr_boite = dimention / dim_parcarton;
  if (!isNaN(nbr_boite)) {
    // Convertit en entier et ajoute 1
    var integerNumber = Math.round(nbr_boite) + 1;
    
  // Afficher le résultat dans l'input résultat
  document.getElementById('result').value = integerNumber;}
  // Afficher le résultat dans l'input résultat
 var calculdemetre= resul_m* piece;
 var prix1boite= calculdemetre*prix;
  
  var mant_total= prix1boite*integerNumber
  document.getElementById('prix_tot').value = mant_total;
  
}
//---------------//



document.getElementById("searchInput").addEventListener("keyup", function(event) {
  // Code pour effectuer la recherche en fonction de la saisie de l'utilisateur
});



//paiemnt //





paypal.Buttons({

	// Configurer la transaction
	createOrder : function (data, actions) {

		// Les produits à payer avec leurs details
		var produits = [
			{
				name : "Produit 1",
				description : "Description du produit 1",
				quantity : 1,
				unit_amount : { value : 9.9, currency_code : "USD" }
			},
			{
				name : "Produit 2",
				description : "Description du produit 2",
				quantity : 1,
				unit_amount : { value : 8.0, currency_code : "USD" }
			}
		];

		// Le total des produits
		var total_amount = produits.reduce(function (total, product) {
			return total + product.unit_amount.value * product.quantity;
		}, 0);

		// La transaction
		return actions.order.create({
			purchase_units : [{
				items : produits,
				amount : {
					value : total_amount,
					currency_code : "USD",
					breakdown : {
						item_total : { value : total_amount, currency_code : "USD" }
					}
				}
			}]
		});
	}

}).render("#paypal-boutons");


paypal.Buttons({

	// Capturer la transaction après l'approbation de l'utilisateur
	onApprove : function (data, actions) {
		return actions.order.capture().then(function(details) {

			// Afficher les details de la transaction dans la console
			console.log(details);

			// On affiche un message de succès
			alert(details.payer.name.given_name + ' ' + details.payer.name.surname + ', votre transaction est effectuée. Vous allez recevoir une notification très bientôt lorsque nous validons votre paiement.');

		});
	}

}).render("#paypal-boutons");
paypal.Buttons({

	// Annuler la transaction
	onCancel : function (data) {
		alert("Transaction annulée !");
	}

}).render("#paypal-boutons");




//---------------------------------------//

//message whatsapp//
function sendMessage() {
  const phoneNumber = '0676170551'; // Replace with the target phone number
  const message = 'Hello, this is a pre-filled message'; // Your default message

  const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

  window.open(whatsappUrl, '_blank');
}