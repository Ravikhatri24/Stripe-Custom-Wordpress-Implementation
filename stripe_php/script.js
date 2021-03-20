// A reference to Stripe.js

var stripe;



var orderData = {

  currency: "usd"

};



// Disable the button until we have Stripe set up on the page

document.querySelector("button").disabled = true;

 

function validateEmail(sEmail) {

  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;



  if(!sEmail.match(reEmail)) {

    jQuery('#messageemail').text('Please fill Valid Email address. ');

    return false;

  }else {

    jQuery('#messageemail').text('');

  }



  return true; 

} 

var currency = '';

var fullname = '';

var address = '';

var phone = '';  

var amount = ''; 

fetch(theme_directory+"/stripe_php/stripe-key.php")

  .then(function(result) {

    return result.json();

  })

  .then(function(data) {

    return setupElements(data);

  })

  .then(function({ stripe, card, clientSecret }) {

    document.querySelector("button").disabled = false;



    var form = document.getElementById("payment-form");

    form.addEventListener("submit", function(event) {

      event.preventDefault();

      amount = document.getElementById('amount').value;      

      currency = document.getElementById('currency').value;

      fullname = document.getElementById('fullname').value;

      address = document.getElementById('address').value;

      phone = document.getElementById('phone').value;   

      if(amount=='' || currency=='' || fullname=='' || address=='' || phone=='' ) {

        jQuery('#message').text('Please fill form before submitting. ');

        return false;

      } 

      pay(stripe, card, amount, currency, clientSecret, fullname );

    });

  }); 

var setupElements = function(data) {

  stripe = Stripe(data.publishableKey);

  /* ------- Set up Stripe Elements to use in checkout form ------- */

  var elements = stripe.elements();

  var style = {

    base: {

      color: "#32325d",

      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',

      fontSmoothing: "antialiased",

      fontSize: "16px",

      "::placeholder": {

        color: "#aab7c4"

      }

    },

    invalid: {

      color: "#fa755a",

      iconColor: "#fa755a"

    }

  };



  var card = elements.create("card", { style: style });

  card.mount("#card-element");



  return {

    stripe: stripe,

    card: card,

    clientSecret: data.clientSecret

  };

};



var handleAction = function(clientSecret) {

  stripe.handleCardAction(clientSecret).then(function(data) {

    if (data.error) {

      showError("Your card was not authenticated, please try again");

    } else if (data.paymentIntent.status === "requires_confirmation") {

      fetch(theme_directory+"/stripe_php/pay.php", {

        method: "POST",

        headers: {

          "Content-Type": "application/json"

        },

        body: JSON.stringify({

          paymentIntentId: data.paymentIntent.id

        })

      })

        .then(function(result) {

          return result.json();

        })

        .then(function(json) {

          if (json.error) {

            showError(json.error);

          } else {

            orderComplete(clientSecret);

          }

        });

    }

  });

};



/*

 * Collect card details and pays for the order

 */

var pay = function(stripe, card, amount, currency ) { 

  changeLoadingState(true); 

  stripe

    .createPaymentMethod("card", card)

    .then(function(result) {

      if (result.error) {

        showError(result.error.message);

      } else {

        orderData.paymentMethodId = result.paymentMethod.id;

        orderData.amount = amount;

        orderData.currency = currency; 

        orderData.fullname = fullname; 

        return fetch(theme_directory+"/stripe_php/pay.php", {

          method: "POST",

          headers: {

            "Content-Type": "application/json"

          },

          body: JSON.stringify(orderData)

        });

      }

    })

    .then(function(result) { 

      return result.json();

    })

    .then(function(paymentData) { 

      if (paymentData.requiresAction) {

        // Request authentication

        handleAction(paymentData.clientSecret);

      } else if (paymentData.error) {

        showError(paymentData.error);

      } else {

        orderComplete(paymentData.clientSecret);

      }

    });

};



/* ------- Post-payment helpers ------- */



/* Shows a success / error message when the payment is complete */

var orderComplete = function(clientSecret) {  


  stripe.retrievePaymentIntent(clientSecret).then(function(result) { 

    var paymentIntent = result.paymentIntent;

    var paymentIntentJson = JSON.stringify(paymentIntent, null, 2);

    var paymentIntentID = paymentIntent.id; 



    var data = { 

      action:'sendpaymentmail', 

      currency:currency, 

      fullname:fullname, 

      phone:phone,

      address:address,

      amount:amount,
      paymentIntentID:paymentIntentID

    };

    jQuery.post(window.location.origin+'/wp-admin/admin-ajax.php', data, function(response) {
      
      alert('Your Payment is successful. You will get a confirmation mail from us regarding this shortly. If you have any query you can call or WhatsApp Us at 112123');
      window.location='redirect to home page url';
    });



    document.querySelector(".sr-payment-form").classList.add("hidden");

    //document.querySelector("pre").textContent = paymentIntentJson;

    document.querySelector("pre").textContent = "Payment successful. Your Transaction ID is: "+paymentIntentID;

    document.querySelector(".sr-result").classList.remove("hidden");

    setTimeout(function() {

      document.querySelector(".sr-result").classList.add("expand");

    }, 200);



    changeLoadingState(false);

  });

};



var showError = function(errorMsgText) {

  changeLoadingState(false);

  var errorMsg = document.querySelector(".sr-field-error");

  errorMsg.textContent = errorMsgText;

  setTimeout(function() {

    errorMsg.textContent = "";

  }, 4000);

};



// Show a spinner on payment submission

var changeLoadingState = function(isLoading) {

  if (isLoading) {

    document.querySelector("button").disabled = true;

    document.querySelector("#spinner").classList.remove("hidden");

    document.querySelector("#button-text").classList.add("hidden");

  } else {

    document.querySelector("button").disabled = false;

    document.querySelector("#spinner").classList.add("hidden");

    document.querySelector("#button-text").classList.remove("hidden");

  }

};

