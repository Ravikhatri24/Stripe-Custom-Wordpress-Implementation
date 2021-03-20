<?php

/* Template name: paymentcheck */
 
    require_once( __DIR__ . '/stripe-php/init.php');  
    $sSessnId = $_GET['sChkId']; 
?>
    <style>
                primary-col = #6C7BEE

                .bg { 
                background-color: primary-col;
                width: 480px;
                overflow: hidden;
                margin: 0 auto;
                box-sizing: border-box;
                padding: 40px;
                font-family: 'Roboto';
                margin-top: 40px; 
                } .card {   
                background-color: white;
                width: 100%;
                float: left;
                margin-top: 40px;
                border-radius: 5px;
                box-sizing: border-box;
                padding: 80px 30px 25px 30px;
                text-align: center;
                position: relative;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24)
                
                &__success {
                    
                    position: absolute;
                    top: -50px;
                    left: 145px;
                    width: 100px;
                    height: 100px;
                    border-radius: 100%;
                    background-color: #60c878;
                    border: 5px solid white;
                    
                    i {
                    
                    color: white;
                    line-height: 100px;
                    font-size: 45px;
                    
                    }
                    
                }
                
                &__msg {
                    
                    text-transform: uppercase;
                    color: #55585b;
                    font-size: 18px;
                    font-weight: 500;
                    margin-bottom: 5px;
                    
                }
                
                &__submsg {
                    
                    color: #959a9e;
                    font-size: 16px;
                    font-weight: 400;
                    margin-top: 0px;
                    
                }
                
                &__body {
                    
                    background-color: #f8f6f6;
                    border-radius: 4px;
                    width: 100%;
                    margin-top: 30px;
                    float: left;
                    box-sizing: border-box;
                    padding: 30px;
                    
                }
                
                &__avatar {
                    
                    width: 50px;
                    height: 50px;
                    border-radius: 100%;
                    display: inline-block;
                    margin-right: 10px;
                    position: relative;
                    top: 7px;
                    
                }
                
                &__recipient-info {
                    
                    display: inline-block;
                    
                }
                
                &__recipient {
                    
                    color: #232528;
                    text-align: left;
                    margin-bottom: 5px;
                    font-weight: 600;
                    
                }
                
                &__email {
                    
                    color: #838890;
                    text-align: left;
                    margin-top: 0px;
                    
                }
                
                &__price {
                    
                    color: #232528;
                    font-size: 70px;
                    margin-top: 25px;
                    margin-bottom: 30px;
                    
                    span {
                    
                    font-size: 60%;
                    
                    }
                    
                }
                
                &__method {
                    
                    color: #d3cece;
                    text-transform: uppercase;
                    text-align: left;
                    font-size: 11px;
                    margin-bottom: 5px;
                    
                }
                
                &__payment { 
                    background-color: white;
                    border-radius: 4px;
                    width: 100%;
                    height: 100px;
                    box-sizing: border-box;
                    display: flex;
                    align-items: center;
                    justify-content center; 
                }
                
                &__credit-card { 
                    width: 50px;
                    display: inline-block;
                    margin-right: 15px; 
                }
                
                &__card-details { 
                    display: inline-block;
                    text-align: left; 
                }
                
                &__card-type { 
                    text-transform: uppercase;
                    color: #232528;
                    font-weight: 600;
                    font-size: 12px;
                    margin-bottom: 3px; 
                }
                
                &__card-number { 
                    color: #838890;
                    font-size: 12px;    
                    margin-top: 0px; 
                }
                
                &__tags { 
                    clear: both;
                    padding-top: 15px; 
                }
                
                &__tag { 
                    text-transform: uppercase;
                    background-color: #f8f6f6;
                    box-sizing: border-box;
                    padding: 3px 5px;
                    border-radius: 3px;
                    font-size: 10px;
                    color: #d3cece; 
                } 
                }
                .lds-roller {
                    display: inline-block;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    }
                    .lds-roller div {
                    animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
                    transform-origin: 40px 40px;
                    }
                    .lds-roller div:after {
                    content: " ";
                    display: block;
                    position: absolute;
                    width: 7px;
                    height: 7px;
                    border-radius: 50%;
                    background: #000;
                    margin: -4px 0 0 -4px;
                    }
                    .lds-roller div:nth-child(1) {
                    animation-delay: -0.036s;
                    }
                    .lds-roller div:nth-child(1):after {
                    top: 63px;
                    left: 63px;
                    }
                    .lds-roller div:nth-child(2) {
                    animation-delay: -0.072s;
                    }
                    .lds-roller div:nth-child(2):after {
                    top: 68px;
                    left: 56px;
                    }
                    .lds-roller div:nth-child(3) {
                    animation-delay: -0.108s;
                    }
                    .lds-roller div:nth-child(3):after {
                    top: 71px;
                    left: 48px;
                    }
                    .lds-roller div:nth-child(4) {
                    animation-delay: -0.144s;
                    }
                    .lds-roller div:nth-child(4):after {
                    top: 72px;
                    left: 40px;
                    }
                    .lds-roller div:nth-child(5) {
                    animation-delay: -0.18s;
                    }
                    .lds-roller div:nth-child(5):after {
                    top: 71px;
                    left: 32px;
                    }
                    .lds-roller div:nth-child(6) {
                    animation-delay: -0.216s;
                    }
                    .lds-roller div:nth-child(6):after {
                    top: 68px;
                    left: 24px;
                    }
                    .lds-roller div:nth-child(7) {
                    animation-delay: -0.252s;
                    }
                    .lds-roller div:nth-child(7):after {
                    top: 63px;
                    left: 17px;
                    }
                    .lds-roller div:nth-child(8) {
                    animation-delay: -0.288s;
                    }
                    .lds-roller div:nth-child(8):after {
                    top: 56px;
                    left: 12px;
                    }
                    @keyframes lds-roller {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                    }
                
                </style>
    <?php
        try {
            if(isset($sSessnId) && !empty($sSessnId)) {
                \Stripe\Stripe::setApiKey('live secret key put here');
                $oChkData 		= \Stripe\Checkout\Session::retrieve($sSessnId);
                $oPymntData 	= \Stripe\PaymentIntent::retrieve($oChkData->payment_intent);
                $sPayStatus 	= $oPymntData->status;
                if($sPayStatus == 'succeeded') {
    ?> 
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                    <div class="bg">
                        <div class="card">
                            <span class="card__success"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></span>
                            <h1 class="card__msg">Payment Complete</h1>
                            
                            <h2 class="card__submsg">Thanks for your Order <br>
                                We got your money and will finish the paper before the deadline. For any Query please contact us 24x7 on following Whatsapp number 6234234234 or Email us at info@asdsasdf.com. Please Wait redirecting...
                            </h2> 
                        </div>
                    </div>
                    <script> 
                        //Using setTimeout to execute a function after 5 seconds.
                        setTimeout(function () {
                        //Redirect with JavaScript
                        window.location.href= '<?php echo site_url(); ?>'
                        }, 10000);
                    </script> 
            <?php               
                        }
                } else {
            ?>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                    <div class="bg">
                        <div class="card">
                        <span class="card__success"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></span>
                            <h1 class="card__msg">Payment Canclled</h1>
                            <h2 class="card__submsg">Please Wait Redirecting back to payment page</h2> 
                        </div>
                    </div>
                    <script> 
                        //Using setTimeout to execute a function after 5 seconds.
                        setTimeout(function () {
                        //Redirect with JavaScript
                        window.location.href= '<?php echo site_url(); ?>/pay-now'
                        }, 5000);
                    </script>
            <?php
                }
            } catch(Exception $e) { 
            ?> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <div class="bg">
                <div class="card">
                    <span class="card__success"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></span>
                    <h1 class="card__msg">Payment Failed</h1>
                    <h2 class="card__submsg">We are unable to process your request right now</h2> 
                </div>
            </div>

            <script>
                //Using setTimeout to execute a function after 5 seconds.
                setTimeout(function () {
                //Redirect with JavaScript
                window.location.href= '<?php echo site_url(); ?>'
                }, 5000);
            </script>
<?php 
    }
?>
