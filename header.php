 <?php if(is_page( 'Pay Now' )): ?>
            <script type="text/javascript">

var theme_directory = "<?php echo get_stylesheet_directory_uri() ?>";

</script> 

    <?php   
        $url = get_stylesheet_directory_uri(); 
    ?>



    <!-- <script src="<?=$url;?>/stripe_php/script.js" defer></script> -->

    <style>

            /* Variables */

            :root {

            --body-color: rgb(247, 250, 252);

            --button-color: rgb(30, 166, 114);

            --accent-color: #074bb1;

            --link-color: #ffffff;

            --font-color: rgb(105, 115, 134);

            --body-font-family: -apple-system, BlinkMacSystemFont, sans-serif;

            --radius: 6px;

            --form-width: 600px;

            }



            /* Base */

            * {

            box-sizing: border-box;

            }

            body {

            font-family: var(--body-font-family);

            font-size: 16px;

            -webkit-font-smoothing: antialiased;

            }



            /* Layout */

            .sr-root {

            display: flex;

            flex-direction: row;

            width: 100%;

            max-width: 980px;

            padding: 48px;

            align-content: center;

            justify-content: center;

            height: auto;

            min-height: 100vh;

            margin: 0 auto;

            }

            .sr-main {

            display: flex;

            flex-direction: column;

            justify-content: center;

            height: 100%;

            align-self: center;

            padding: 5px 50px 50px 50px;

            background: var(--body-color);

            width: var(--form-width);

            border-radius: var(--radius);

            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),

            0px 2px 5px 0px rgba(50, 50, 93, 0.1),

            0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);

            }



            .sr-field-error {

            color: var(--font-color);

            text-align: left;

            font-size: 13px;

            line-height: 17px;

            margin-top: 12px;

            }



            /* Inputs */

            .sr-input,

            input[type="text"] {

            border: 1px solid var(--gray-border);

            border-radius: var(--radius);

            padding: 5px 12px;

            height: 44px;

            width: 100%;

            transition: box-shadow 0.2s ease;

            background: white;

            -moz-appearance: none;

            -webkit-appearance: none;

            appearance: none;

            }

            .sr-input:focus,

            input[type="text"]:focus,

            button:focus,

            .focused {

            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),

                0 0 0 4px rgba(50, 151, 211, 0.3);

            outline: none;

            z-index: 9;

            }

            .sr-input::placeholder,

            input[type="text"]::placeholder {

            color: var(--gray-light);

            }

            .sr-result {

            height: 44px;

            -webkit-transition: height 1s ease;

            -moz-transition: height 1s ease;

            -o-transition: height 1s ease;

            transition: height 1s ease;

            color: var(--font-color);

            overflow: auto;

            }

            .sr-result code {

            overflow: scroll;

            }

            .sr-result.expand {

            height: 350px;

            }



            .sr-combo-inputs-row {

            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),

                0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);

            border-radius: 7px;

            }



            /* Buttons and links */

            button {

            background: var(--accent-color);

            border-radius: var(--radius);

            color: white;

            border: 0;

            padding: 12px 16px;

            margin-top: 16px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;

            display: block;

            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);

            width: 100%;

            }

            button:hover {

            filter: contrast(115%);

            }

            button:active {

            transform: translateY(0px) scale(0.98);

            filter: brightness(0.9);

            }

            button:disabled {

            opacity: 0.5;

            cursor: none;

            }



            a {

            color: var(--link-color);

            text-decoration: none;

            transition: all 0.2s ease;

            }



            a:hover {

            filter: brightness(0.8);

            }



            a:active {

            filter: brightness(0.5);

            }



            /* Code block */

            code,

            pre {

            font-family: "SF Mono", "IBM Plex Mono", "Menlo", monospace;

            font-size: 12px;

            }



            /* Stripe Element placeholder */

            .sr-card-element {

            padding-top: 12px;

            }



            /* Responsiveness */

            @media (max-width: 720px) {

            .sr-root {

                flex-direction: column;

                justify-content: flex-start;

                padding: 48px 20px;

                min-width: 320px;

            }



            .sr-header__logo {

                background-position: center;

            }



            .sr-payment-summary {

                text-align: center;

            }



            .sr-content {

                display: none;

            }



            .sr-main {

                width: 100%;

                height: 305px;
                height: 550px;
                padding: 15px;

                background: rgb(247, 250, 252);

                box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),

                0px 2px 5px 0px rgba(50, 50, 93, 0.1),

                0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);

                border-radius: 6px;

            }

            }



            /* todo: spinner/processing state, errors, animations */



            .spinner,

            .spinner:before,

            .spinner:after {

            border-radius: 50%;

            }

            .spinner {

            color: #ffffff;

            font-size: 22px;

            text-indent: -99999px;

            margin: 0px auto;

            position: relative;

            width: 20px;

            height: 20px;

            box-shadow: inset 0 0 0 2px;

            -webkit-transform: translateZ(0);

            -ms-transform: translateZ(0);

            transform: translateZ(0);

            }

            .spinner:before,

            .spinner:after {

            position: absolute;

            content: "";

            }

            .spinner:before {

            width: 10.4px;

            height: 20.4px;

            background: var(--accent-color);

            border-radius: 20.4px 0 0 20.4px;

            top: -0.2px;

            left: -0.2px;

            -webkit-transform-origin: 10.4px 10.2px;

            transform-origin: 10.4px 10.2px;

            -webkit-animation: loading 2s infinite ease 1.5s;

            animation: loading 2s infinite ease 1.5s;

            }

            .spinner:after {

            width: 10.4px;

            height: 10.2px;

            background: var(--accent-color);

            border-radius: 0 10.2px 10.2px 0;

            top: -0.1px;

            left: 10.2px;

            -webkit-transform-origin: 0px 10.2px;

            transform-origin: 0px 10.2px;

            -webkit-animation: loading 2s infinite ease;

            animation: loading 2s infinite ease;

            }



            @-webkit-keyframes loading {

            0% {

                -webkit-transform: rotate(0deg);

                transform: rotate(0deg);

            }

            100% {

                -webkit-transform: rotate(360deg);

                transform: rotate(360deg);

            }

            }

            @keyframes loading {

            0% {

                -webkit-transform: rotate(0deg);

                transform: rotate(0deg);

            }

            100% {

                -webkit-transform: rotate(360deg);

                transform: rotate(360deg);

            }

            }



            /* Animated form */



            .sr-root {

            animation: 0.4s form-in;

            animation-fill-mode: both;

            animation-timing-function: ease;

            }



            .hidden {

            display: none;

            }



            @keyframes field-in {

            0% {

                opacity: 0;

                transform: translateY(8px) scale(0.95);

            }

            100% {

                opacity: 1;

                transform: translateY(0px) scale(1);

            }

            }



            @keyframes form-in {

            0% {

                opacity: 0;

                transform: scale(0.98);

            }

            100% {

                opacity: 1;

                transform: scale(1);

            }

            }



            input[type=number]::-webkit-inner-spin-button, 

            input[type=number]::-webkit-outer-spin-button { 

                -webkit-appearance: none;

                -moz-appearance: none;

                appearance: none;

                margin: 0; 

            }

            input,select {

            height: 44px;

            width: 100%;

            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1), 0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);

            border-radius: 7px;

            border: none;

            margin-bottom: 20px;

            text-align: center;

            margin-top: 5px;

            } 

            select.form-control:not([size]):not([multiple]) {

            height: 44px;

            }

            .form-control:focus {

            color: #495057;

            background-color: #fff;

            border-color: #074bb157;

            outline: 0;

            box-shadow: 0 0 0 0.2rem rgb(7 75 177 / 25%);

            }

    </style> 

<section id="home" class="hero-four">
<div class="overlay"></div>
<div class="biz-slider-wrap ptb-10 innerpage-slide">
    <div class="container">
        <div class="row">

            <div class="col-md-6 mt-5">
                <div
                    class="registration-form-left video-biz-slider-text video-slider-text-padding text-center m-20" style=" margin-top: 135px;">

                </div>
                <h1> <?php wp_title('', true,''); ?> </h1>
                <p>
                    <?echo get_field('header_tag_line')?>
                </p>
                <br>
                <div class="best_gradee clearfix hidden-sm hidden-xs">
                    <ul>
                        <li>
                            <p class="assignment_wr">100% Quality Assurance</p>
                        </li>
                        <li>
                            <p class="assignment_wr">24X7 Assistance</p>
                        </li>
                        <li>
                            <p class="assignment_wr">On Time Delivery</p>
                        </li>
                        <li>
                            <p class="assignment_wr">100% Plagiarism Free Paper</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 ptb-100   mb-5">
                <div
                    class="registration-form-left video-biz-slider-text video-slider-text-padding text-center m-20">

                </div>
                <div class="biz-hero-registration-form "> 

                    <div class="sr-root">

                        <div class="sr-main">

                            <form id="payment-form" class="sr-payment-form pt-5">  
                                <div id="message" style="color:red;text-align:center;">
                                </div>
                                <div class="row"> 

                                    <div class="col-12">

                                        <div class="inputamount" id="inputamount">

                                            <label for="amount">Amount</label>

                                            <input type="number" name="amount" id="amount"
                                                class="form-control"
                                                onkeypress="return onlyNumberKey(event)" autocomplete="off" >

                                        </div>

                                    </div>

                                </div>

                                <div class="inputcurrency" id="inputcurrency">

                                    <label for="currency">Currency</label>

                                    <select name="currency" id="currency" class="form-control">

                                        <option value="AUD">Australia Dollars (AUD)</option>

                                        <option value="AED">United Arab Emirates Dirham (AED)</option>

                                        <option value="GBP">Pounds Sterling (GBP)</option>

                                        <option value="USD" selected>US Dollars (USD)</option>

                                        <option value="INR">Indian Rupee (INR)</option>

                                    </select>

                                </div>  

                                <button id="submit">  
                                    <span id="payButton">Pay Now</span> 
                                </button> 
                                <div id="dd">
                                    <div class="output"></div>
                                </div>
                            </form>

                            <div class="sr-result hidden">

                                <p>Payment completed<br /></p>

                                <pre>

                                <code></code>

                                </pre>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
 <?php endif; ?>
