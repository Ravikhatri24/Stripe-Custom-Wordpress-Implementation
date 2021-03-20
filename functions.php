<?php 

add_action( 'wp_ajax_sendpaymentmail', 'wpse_sendmail' );
add_action( 'wp_ajax_nopriv_sendpaymentmail', 'wpse_sendmail' );

function wpse_sendmail() {  
    require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');  
    $for = 'Payment Confirmation';
    $to = $_POST['address'];      
    
    $htmlContent = '
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html style="width:100%;font-family:arial, helvetica neue, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
      <head> 
        <meta charset="UTF-8"> 
        <meta content="width=device-width, initial-scale=1" name="viewport"> 
        <meta name="x-apple-disable-message-reformatting"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta content="telephone=no" name="format-detection"> 
        <title>hitendra2f@gmail.com</title> 
        <!--[if (mso 16)]>
          <style type="text/css">
          a {text-decoration: none;}
          </style>
          <![endif]--> 
        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
        <style type="text/css">
      @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:14px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
      #outlook a {
        padding:0;
      }
      .ExternalClass {
        width:100%;
      }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height:100%;
      }
      .es-button {
        mso-style-priority:100!important;
        text-decoration:none!important;
      }
      a[x-apple-data-detectors] {
        color:inherit!important;
        text-decoration:none!important;
        font-size:inherit!important;
        font-family:inherit!important;
        font-weight:inherit!important;
        line-height:inherit!important;
      }
      .es-desk-hidden {
        display:none;
        float:left;
        overflow:hidden;
        width:0;
        max-height:0;
        line-height:0;
        mso-hide:all;
      }
      </style> 
      </head> 
      <body style="width:100%;font-family:arial, helvetica neue, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
        <div class="es-wrapper-color" style="background-color:#F6F6F6;"> 
     
          Mail data
        </div> 
        
      </body>
      </html>
    '; 
    
    $headers = array('Content-Type: text/html; charset=UTF-8'); 

    wp_mail( $to, $for, $htmlContent, $headers );
    

    $headerss = array('Content-Type: text/html; charset=UTF-8');
    $mailmessage = '<html><body>
    <div>Name : '.$_POST['fullname'].' </div>
    <div>Phone Number: '.$_POST['phone'].' </div>
    <div>Email address : '.$_POST['address'].' </div>
    <div>Amount : '.$_POST['amount'].' '.$_POST['currency'].' </div>
    <div>Transaction ID : '.$_POST['paymentIntentID'].' </div>
    </body></html>';
    
    wp_mail( 'info@hsasdasd.com', 'Payment Received asd', $mailmessage, $headerss );

    die();
}
 


add_action( 'wp_ajax_sendpayment', 'wpse_sendpayment' );
add_action( 'wp_ajax_nopriv_sendpayment', 'wpse_sendpayment' );

function wpse_sendpayment() {  
    require_once( __DIR__ . '/stripe-php/init.php'); 
    \Stripe\Stripe::setApiKey('secret api key');
     
     
    // Create new Checkout Session for the order 
    try {          
        $successurl = site_url().'/check-payment'.'?sChkId={CHECKOUT_SESSION_ID}';
        $failureurl = site_url().'/check-payment';
        $session = \Stripe\Checkout\Session::create([ 
            'payment_method_types' => ['card'], 
            'line_items' => [[ 
                'price_data' => [ 
                    'product_data' => [ 
                        'name' => 'Writing Services', 
                    ], 
                    'unit_amount' => $_REQUEST['amount'] * 100, 
                    'currency' => $_REQUEST['currency'], 
                ], 
                'quantity' => 1, 
                'description' => 'Writing Services', 
            ]], 
            'mode' => 'payment', 
            'success_url' =>  $successurl,
            'cancel_url' => $failureurl, 
        ]); 
    } catch(Exception $e) {  
        $api_error = $e->getMessage();  
    }     
    if(empty($api_error) && $session) { 
        $response = array( 
            'status' => 1, 
            'message' => 'Checkout Session created successfully!', 
            'sessionId' => $session['id'] 
        ); 
    } else { 
        $response = array( 
            'status' => 0, 
            'error' => array( 
                'message' => 'Checkout Session creation failed! '.$api_error    
            ) 
        ); 
    }  
                
    // Return response 
    echo json_encode($response);
    die();
}

 