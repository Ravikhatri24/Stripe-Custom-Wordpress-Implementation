<?php if(is_page( 'Pay Now' )) {?>
      <script src="https://js.stripe.com/v3/"></script> 
      <script>   
        function onlyNumberKey(evt) {  
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                return false; 
            return true; 
        } 
        jQuery('#amount').on('paste', function (event) {
          if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
          }
        });
        jQuery('#payment-form').on('focus', 'input[type=number]', function (e) {
          jQuery(this).on('wheel.disableScroll', function (e) {
            e.preventDefault()
          })
        })
        jQuery('#payment-form').on('blur', 'input[type=number]', function (e) {
          jQuery(this).off('wheel.disableScroll')
        })
        jQuery(document).ready(function(){ 

          var buyBtn = document.getElementById('submit');  
          
          var stripe = Stripe('live publish key here'); 

          var handleResult = function (result) {
              if (result.error) {
                jQuery('#paymentResponse').html('<p>'+result.error.message+'</p>');
              }
              
              jQuery('#submit').prop('disabled', false);
              jQuery('#submit').text('Pay Now') ;
          };
          
          jQuery('#submit').click( function (evt) { 
            jQuery('#submit').prop('disabled', true);
            jQuery('#submit').text('Please wait...') ;

            amount = jQuery('#amount').val();    
            currency = jQuery('#currency').val();  
            if(amount=='' || currency=='' ) {
              jQuery('#message').text('Please fill form before submitting. ');
              jQuery('#submit').prop('disabled', false);
              jQuery('#submit').text('Pay Now') ; 
              return false;
            } 
            
            var data = { 
              action:'sendpayment', 
              currency:currency,  
              amount:amount
            }; 
            jQuery.post(window.location.origin+'/wp-admin/admin-ajax.php', data, function(response) {   
              response= JSON.parse(response);  
              if(response.sessionId){ 
                stripe.redirectToCheckout({
                  sessionId: response.sessionId,
                }).then(handleResult);
              }else{
                  handleResult(response);
              }
            });  
            
          });
        });  
      </script>
      <?php } ?>
