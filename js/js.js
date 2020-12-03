// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "Italtrike website is ready!" );

	window.addEventListener('load', function () {
		$('.FullLoader').fadeOut();
	})
	
	// Header on scroll
	
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	
	    if (scroll >= 200) {
	        $(".Header").addClass("ShadowHeader");
	    } else {
	        $(".Header").removeClass("ShadowHeader");
	    }
	});
	
	// Sidebar pagina prodotto
	
	$('.cat-item-664').children().attr("href", "#");
	
	$(".cat-item-664").click(function () {
		$(this).children().fadeIn();
    });
	// Switch scheda prodotto
	
	$("#EducationalSingleTab").click(function () {
		$('#ProductSingleTab').removeClass('SingleTabActive');
		$(this).addClass('SingleTabActive');
		$('.ProductTab').hide();
		$('.EducationalTab').show();
    });
    
	$("#ProductSingleTab").click(function () {
		$('#EducationalSingleTab').removeClass('SingleTabActive');
		$(this).addClass('SingleTabActive');
		$('.EducationalTab').hide();
		$('.ProductTab').show();
    });    

    //Aos working with class
    $('.aos-scroll').each(function () {
        $(this).attr('data-aos', 'fade-up');
        $(this).attr('data-aos-easing', 'ease-out-cubic');
        $(this).attr('data-aos-duration', '8000');
        }
    );

    $('.aos-scroll-flip').each(function () {
        $(this).attr('data-aos', 'flip-up');
    }
    );
    
    $('.aos-scroll-zoom').each(function () {
        $(this).attr('data-aos', 'zoom-in-down');
    }
    );    
    
    
	//Varie grafica
	$("#SearchIcon").click(function () {
		$('#search-form').slideToggle();
    });

    //Aos SCROLL
	AOS.init();
	


// Mobile button
	$(".hamburger").click(function () {
		$(this).toggleClass('is-active');
		$('.MobileMenuContainer').toggle();
    });

    //Slider Home
    $('#Slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        autoplay: true,
        arrows: false,
        dots: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
        nextArrow: '<button class="slide-arrow next-arrow">></button>',
        autoplaySpeed: 4500
    });

	 $('#SliderCategoria').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: true,
		dots: false,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
		});

	 $('#SliderProdotti').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: false,
		dots: true,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
		});
		
	 $('#SliderNews').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: false,
		dots: true,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 5000
		});
		
	$('#SliderEventi').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: true,
		dots: false,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
	});
		
		


	/* MODAL POPUP*/

	$(".add_to_cart_button").click(function () {
		$(".CartModal").fadeIn();
    });

	$(".single_add_to_cart_button").click(function () {
		$(".CartModal").fadeIn();
    });

	$(".closeModal").click(function () {
		$(".CartModal").fadeOut();
		$("#message").fadeOut();
    });

	$("#HelpMenuButton").click(function () {
		$(".HelpMenuContainer").slideToggle();
    });

	$(".HelpMenuContainer li a").click(function () {
		$(".MenuDesc").removeClass('MenuDescVisible');
		$(this).children(".MenuDesc").toggleClass('MenuDescVisible');
    });

	$(".MenuHelpLink").click(function () {
		var CurrentLink = $(this).data( "link" );
		window.location = CurrentLink;
    });

	// SELECT ANNI

	$('#SelectAnni').on('change', function() {
	  var AnniSelected = ( this.value );
	  $('#AnniForm').val(AnniSelected);
	  $('#search-form-sidebar').submit();
	});


	// WOOCOMMERCE PRODUCT TAB

	$(".ProductLabel").click(function () {
		$(".ProductLabel").removeClass('ProductLabelActive');
		$(this).addClass('ProductLabelActive');
		var CurrentLink = $(this).data( "link" );
		var CurrentLinkClass = '.'+CurrentLink;
		console.log(CurrentLinkClass);
		$(".ProductBox").hide();
		$(CurrentLinkClass).show();

    });

	// VARIE

	$(".SingleVariation").click(function () {
		var CurrentVariation = $(this).data( "variation" );
		$(".SingleVariation").removeClass('SingleVariationActive');
		$(this).toggleClass('SingleVariationActive');
    });

	$("#RecensioneToggle").click(function () {
		$("#reviews").slideToggle();
    });


	// Aggiungo al checkout la possibilità di selezionare la fattura o meno

	$( "#billing_email_field" ).append( $( "<div id='RichiediFatturaButton'>Clicca qui per richiedere la fattura</div>" ) );

	$("#RichiediFatturaButton").click(function () {
		$("#codice_fiscale_field").toggle();
		$("#partita_iva_field").toggle();
    });


	// Controllo form registrazione utente download 
	
	$("#RegisterDownloadUser").click(function () {
		
		if($("#acf-field_5e4a9b1a6160f").val() == '' || $("#acf-field_5e4ad1b60d2bf").val() == '' || $("#acf-field_5e4a9b2361610").val() == '' || $("#acf-field_5e4a9b2c61611").val() == '' || $("#acf-field_5e4ac51576409").val() == '' || $("#acf-field_5e4ac51a7640a").val() == ''){
			alert('Tutti i campi sono obbligatori');
			console.log($("#acf-field_5e4a9b1a6160f").val());
			console.log($("#acf-field_5e4ad1b60d2bf").val());
			console.log($("#acf-field_5e4a9b2361610").val());
			console.log($("#acf-field_5e4a9b2c61611").val());
			console.log($("#acf-field_5e4ac51576409").val());
			console.log($("#acf-field_5e4ac51a7640a").val());
		} else {
			$("#form-registrazione").submit();
		};
    });



		//////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////// AREA RISERVATA ////////////////////////////////

        $("#RegistrationButton").click(function () {
            $('#LoginContainer').fadeOut();
            $('#RegistrationContainer').fadeIn();
        });

        $("#CancelRegistrationButton").click(function () {
            $('#LoginContainer').show();
            $('#RegistrationContainer').hide();
        });

        $("#RegistrationButtonRequest").click(function () {

            if ($('#NomeAzienda').val() == '') {
                alert('Inserire nome azienda');
                return;
            };
            if ($('#PartitaIva').val() == '') {
                alert('Inserire Partita Iva');
                return;
            };
            if ($('#NomePersona').val() == '') {
                alert('Inserire Nome Persona');
                return;
            };
            if ($('#CognomePersona').val() == '') {
                alert('Inserire Cognome Persona');
                return;
            };
            if ($('#Email').val() == '') {
                alert('Inserire Email');
                return;
            };
            if ($('#Indirizzo').val() == '') {
                alert('Inserire Indirizzo');
                return;
            };
            if ($('#Paese').val() == '') {
                alert('Inserire il paese');
                return;
			};
            if ($('#Provincia').val() == '') {
                alert('Inserire la provincia');
                return;
            };
            if ($('#Cap').val() == '') {
                alert('Inserire il Cap');
                return;
            };
            if ($('#Telefono').val() == '') {
                alert('Inserire il Telefono');
                return;
            };
            if ($('#Username').val() == '') {
                alert('Inserire il Nome utente');
                return;
            };
            if ($('#Password').val() == '') {
                alert('Inserire la password');
                return;
            };

            /*
            //Registro il rivenditore nel DB
            $.ajax({
                type: "POST",
                url: "../ajax/register-user.php",
                data: $("#RegistrationForm").serialize(),
                dataType: "html",
                success: function (result) {
                    console.log(result);
                },
                error: function () {
                    alert('Errore di registrazione');
                }
            })
            */
            $('#LoginContainer').hide();
            $('#RegistrationContainer').hide();
            $('#RegistrationContainerFinal').show();
		});


        // Effettuo l'accesso del rivenditore
        /*
        $("#LoginButton").click(function () {
            $.ajax({
                type: "POST",
                url: "../ajax/area-riservata-login.php",
                data: $("#LoginForm").serialize(),
                dataType: "html",
                success: function (result) {
                    if (result == 1) {
                        $('#ShowLogin').fadeIn();
                        $('#LoginContainer').fadeOut();
                    } else {
                        alert('Inserisci nomeutente e password');
                    }
                },
                error: function () {
                    alert('Errore di connessione');
                }
                })
        });
        */


        $(".login_btn_rivenditori").click(function () {
          //console.log('click1');
          $('.ErrorMessage').hide();
          //$('#RegistrationBox').hide();
          //$('.LoginBoxContainer').hide();
          //$('.ButtonContainer').fadeIn();
          jQuery.ajax({
            type : "post",
            dataType : "json",
            url : woocommerce_params.ajax_url,
            data : {action: "login", form: $("#login_form").serialize() },
            success: function(response) {
              //console.log(response);
              if(response!='' && response.result=='success'){
                  //alert(response.percentuale_sconto);
                  $('#DiscountExpress').val(response.percentuale_sconto);
                  $('#DiscountNegozio').val(response.percentuale_sconto);
                  $('.ButtonContainer').fadeIn();
              }
              if(response!='' && response.result=='error'){
                  $('.ErrorMessage').fadeIn();
              }
            },
            error: function(xhrRequest, status, errorMessage)  {
			        alert('error ajax')
            }
          });
        });
		// LOGIN ALL'AREA DOWNLOAD
		
        $(".login_download_btn").click(function () {
          //console.log('click2');
          $('.ErrorMessage').hide();
          //$('#RegistrationBox').hide();
          //$('.LoginBoxContainer').hide();
          $('.FullScreenLoader').css("display", "flex").fadeIn();
          jQuery.ajax({
            type : "post",
            dataType : "json",
            url : woocommerce_params.ajax_url,
            data : {action: "login_download", form: $("#login_form").serialize() },
            success: function(response) {
              //console.log(response);
              if(response!='' && response.result=='success'){
				  $('.FullScreenLoader').fadeOut();
                  window.location.replace("https://www.italtrike.com/download-files/");
              }
              if(response!='' && response.result=='error'){
				  $('.FullScreenLoader').fadeOut();
                  $('.ErrorMessage').fadeIn();
              }
            },
            error: function(xhrRequest, status, errorMessage)  {
              alert('error ajax')
            }
          });
        });
        /////////////////////////////////////////////////////////////////////////////

});
