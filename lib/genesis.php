<?php

namespace Infinity\genesis;

function svg_logo_in_title( $title, $inside, $wrap ){
    $logo = file_get_contents( dirname(__FILE__) . '/../images/marzolf-logo.svg' );

    // Build the title.
    $title = genesis_markup( array(
        'open'    => '',
        'close'   => '',
        'content' => '<a href="' . trailingslashit( home_url() ) . '">' . $logo . '</a>',
        'context' => 'site-title',
        'echo'    => false,
        'params'  => array(
            'wrap' => $wrap,
        ),
    ) );

    return $title;
}
add_filter( 'genesis_seo_title', __NAMESPACE__ . '\\svg_logo_in_title', 10, 3 );

//* Change the footer text

function footer_creds_filter( $creds ) {
    $creds = '&copy; Copyright ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '. All rights reserved. &middot; Design/Hosting by <a href="https://wenderhost.com">WenderHost</a>';
    return $creds;
}
add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\\footer_creds_filter' );

function footer_disclaimer(){
?>
<div class="disclaimer">
<p style="text-align: center; font-size: 2.4rem;"><a href="https://brokercheck.finra.org" target="_blank">BrokerCheck</a></p>

<p>Raymond James financial advisors may only conduct business with residents of the states and/or jurisdictions for which they are properly registered. Therefore, a response to a request for information may be delayed. Please note that not all of the investments and services mentioned are available in every state. Investors outside of the United States are subject to securities and tax regulations within their applicable jurisdictions that are not addressed on this site. Contact your local Raymond James office for information and availability.</p>

<p>Links are being provided for information purposes only. Raymond James is not affiliated with and does not endorse, authorize or sponsor any of the listed websites or their respective sponsors. Raymond James is not responsible for the content of any website or the collection or use of information regarding any website's users and/or members.</p>

<p>Investment advisory services offered through Raymond James Financial Services Advisors, Inc. Marzolf Investment Group, LLC is not a registered broker/dealer and is independent of Raymond James Financial Services.</p>

<p>Securities offered through Raymond James Financial Services, Inc. member <a href="https://www.finra.org" target="_blank">FINRA</a>/<a href="https://www.sipc.org" target="_blank">SIPC</a>, marketed as Marzolf Investment Group. Investment advisory services offered through Raymond James Financial Services Advisors, Inc. Marzolf Investment Group is separately owned and operated and not independently registered as a broker-dealer or investment advisor.</p>

<p style="text-align: center;"><a href="https://www.raymondjames.com/privacy-security-and-account-protection/privacy-notice" target="_blank">Privacy, Security &amp; Account Protection</a> &bull; <a href="https://www.raymondjames.com/legal-disclosures">Raymond James Legal Disclosures (Including Form CRS)</a></p>
</div>
<?php
}
add_action( 'genesis_footer', __NAMESPACE__ . '\\footer_disclaimer', 9 );

function investor_access(){
    ?><a href="https://clientaccess.rjf.com" class="button investor-access" target="_blank">Client Access</a><?php
}
add_action( 'genesis_header', __NAMESPACE__ . '\\investor_access', 13 );
