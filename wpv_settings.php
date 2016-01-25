<?php


function wpv_admin_menu(){
    add_menu_page(__('WP VAKT','wpv'),__('WP VAKT','vpv'),'manage_options','wpv_settings','wpv_settings');
}
if (is_admin()) add_action( 'admin_menu', 'wpv_admin_menu' );


function wpv_settings() {
    ?>
    <div class="wrap wpv_settings">
        <img class="wpv_settings_logo" src="<?php echo plugins_url( 'img/wpvakt-logo-2.png' , __FILE__ ) ?>" alt="">
        <div class="wpv_status"></div>
        <?php wpv_statistics(); ?>
        <?php priicing_plans(); ?>

    </div>

    <?php
    //echo wpv_core_updates();
    //echo wpv_plugin_updates();
    //echo wpv_theme_updates();
}




function wpvakt_status() {
    $data = wpv_fetch_data('http://www.wpvakt.no?status&domain='.urlencode(site_url()));
    if($data === NULL) {
        ?>
        <div class="wpv_no_plan">
            <!--<span class="wpv_warning_icon"></span>-->
            <p>
                <img src="<?php echo plugins_url( 'img/sad-face-dashboard.png' , __FILE__ ) ?>" alt="">
                <strong>Sikkerhets- og oppdateringsstatus: Ditt nettsted har ingen vaktservice aktivert, og kan være utsatt for angrep og ha utdatert programvare.</strong>
            </p>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function( $ ) {
                $('.wpvs_h1, .wpvs_h2, #wpv_statistics, .wpvs_gray, .chpp, .wpv_pricing_options').show();
                /* Aminate the statistics */
                setTimeout(function() {
                    $('.wpvs_bar span').each(function() {
                        $(this).animate({'width':$(this).attr('data-value')+'%'}, 1000, 'swing');
                    });
                    $('.wpvs_number').each(function() {
                        var t = $(this),
                            max = t.attr('data-value');

                        $({val: 0}).animate({val: max}, {
                            duration: 1000,
                            easing:'swing',
                            step: function() {
                                    t.text(Math.ceil(this.val) + "%");
                            }
                        });
                    });
                }, 1000);
            });
        </script>
        <?php
    } else {
        ?>
        <div class="wpv_plan_active">
            <p>
                <img src="<?php echo plugins_url( 'img/happy_face_green.png' , __FILE__ ) ?>" alt="">
                <strong>Du har vaktservicetjeneste aktivert.</strong>
            </p>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function( $ ) {
                <?php if($data->plan != 'premium') : ?>$('.chpp, .wpv_pricing_options').show();<?php endif ?>
                $('.chpp').text('Oppgrader tjenesten din og få et enda bedre vakthold'); //Upgrade your plan to maximize safety and protect your site even better
            });
        </script>
        <?php
        wpv_summary($data);
    }
    die();
}
add_action( 'wp_ajax_nopriv_wpv_status', 'wpvakt_status' );
add_action( 'wp_ajax_wpv_status', 'wpvakt_status' );





function wpv_summary($data) {
    //echo "<pre>"; print_r($data); echo "</pre>";
    ?>
    <div id="wpv_summary" class="postbox ">
        <h3><span>WP VAKT Oversikt</span></h3>
        <div class="inside">
            <p class="wpvs_domain"><span class="wpv_si"></span>Sikkerhetsservice for domene<span class="wpv_sv"><?php echo (isset($data->domain))? $data->domain : '-' ?></span></p>
            <p class="wpvs_plan"><span class="wpv_si"></span>Sikkerhetsservice type<span class="wpv_sv"><?php echo (isset($data->plan))? $data->plan : '-' ?></span></p>
            <p class="wpvs_last"><span class="wpv_si"></span>Forrige sjekk av siden var utført<span class="wpv_sv"><?php echo (isset($data->previous_task))? date('l d / m / Y', strtotime($data->previous_task)) : '-' ?></span></p>
            <p class="wpvs_next"><span class="wpv_si"></span>Neste sjekk av siden er planlagt<span class="wpv_sv"><?php echo (isset($data->next_task))? date('l d / m / Y', strtotime($data->next_task)) : '-' ?></span></p>
        </div>
    </div>
    <?php
}




function wpv_statistics() {
    ?>
    <!--<h1 class="wpvs_h1"><span></span>Make sure your website is secure.</h1>-->
    <h2 class="wpvs_h2">Fakta om sikkerhet:</h2>
    <ul id="wpv_statistics">
        <li>
            <div class="wpvs_number" data-value="73">0%</div>
            <div class="wpv_more">
                <div class="wpvs_bar"><span data-value="73"></span></div>
                <p class="wpvs_header">Av de mest populære WordPress-installasjoner ble funnet sårbare for hackerangrep.<!--Of the most popular WordPress installations were found vulnerable to hacker attacks.--></p>
                <p class="wpvs_desc">Det betyr at nesten en tredjedel av alle WordPress nettsteder kan bli hacket i løpet av bare noen få minutter med gratis hacker verktøy tilgjengelig på internett.<!--That means that almost 3 quorters of wordpress websites can be hacked in just few minutes using free tools awailable online.--></p>
            </div>
        </li>
        <li>
            <div class="wpvs_number" data-value="70">0%</div>
            <div class="wpv_more">
                <div class="wpvs_bar"><span data-value="70"></span></div>
                <p class="wpvs_header">Av alle hackerangrep på WordPress nettsteder ble gjort mulig på grunn av utdatert programvare.<!--Of all hacker attacks on wordpress websites were made possible because of outdated software.--></p>
                <p class="wpvs_desc">Det betyr at en utdatert WordPress versjon, utdaterte utvidelser eller temaer er årsak nummer én til at de fleste WordPress nettsteder blir hacket.<!--That means that outdated wordpress version, plugins and themes are number one reason of most wordpress websites being hacked.--></p>
            </div>
        </li>
        <li>
            <div class="wpvs_number" data-value="20">0%</div>
            <div class="wpv_more">
                <div class="wpvs_bar"><span data-value="20"></span></div>
                <p class="wpvs_header">Av de 50 beste WordPress utvidelsene ble funnet sårbare for vanlige hackerangrep.<!--Of the top 50 wordpress plugins were found vulnerable to common hacker attacks.--></p>
                <p class="wpvs_desc">Det betyr at over 8 millioner WordPress nettsteder kan bli hacket på grunn av sikkerhetshull i WordPress Utvidelser.<!--That means that over 8 million WordPress sites can be hacked in some way because of the security hols in used plugins.--></p>
            </div>
        </li>
    </ul>
    <!--<div class="wpvs_gray">
        <h3 class="wpvs_h3">Don't spend money on data recovery and fixing your site after the attack.</h3>
        <h4 class="wpvs_h4">Make your website secure today. Signup to WP VAKT and get instant database and file backups, wordpress core, plugin & theme updates, malaware scans and many more.</h4>
    </div>-->
    <div class="wpvs_gray">
        <h3 class="wpvs_h3">Sørg for at ditt nettsted ikke er utdatert eller utsatt for angrep.</h3>
        <h4 class="wpvs_h4">Aktiver vår WordPress vaktservice tjeneste i dag, og la oss ta vare på nettsiden din.</h4>
    </div>
    <?php
}



function priicing_plans() {
    ?>
    <h2 class="chpp">VELG EN AV VÅRE VAKTHOLD PLANER HER: ( Første måned gratis! )</h2>
    <br><br>
    <table class="wpv_pricing_options">
        <thead>
            <tr>
                <th class="ptc1"><img src="<?php echo plugins_url( 'img/pricing-table-logo.png' , __FILE__ ) ?>" alt=""></th>
                <th>Standard vakthold</th>
                <th>Utvidet vakthold</th>
                <th>Premium vakthold</th>
            </tr>
        </thead>
        <tbody>
            <tr class="ptrp">
                <td class="pttbc1"></td>
                <td><table><tbody><tr><td><div>299</div></td><td><span>kr</span>mnd</td></tr></tbody></table></td>
                <td><table><tbody><tr><td><div>499</div></td><td><span>kr</span>mnd</td></tr></tbody></table></td>
                <td><table><tbody><tr><td><div>799</div></td><td><span>kr</span>mnd</td></tr></tbody></table></td>
            </tr>

            <!-- feature list -->
            <tr class="ptincl">
                <td class="pttbc1">E-post oppdateringsstatus</td>
                <td><span class="ptok"></span><span class="ptper">Månedlig</span></td>
                <td><span class="ptok"></span><span class="ptper">Annenhver uke</span></td>
                <td><span class="ptok"></span><span class="ptper">Ukentlig</span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">WordPress oppdatering</td>
                <td><span class="ptok"></span><span class="ptper">Månedlig</span></td>
                <td><span class="ptok"></span><span class="ptper">Annenhver uke</span></td>
                <td><span class="ptok"></span><span class="ptper">Ukentlig</span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Oppdatering av WordPress Utvidelser</td>
                <td><span class="ptok"></span><span class="ptper">Månedlig</span></td>
                <td><span class="ptok"></span><span class="ptper">Annenhver uke</span></td>
                <td><span class="ptok"></span><span class="ptper">Ukentlig</span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Backup</td>
                <td><span class="ptok"></span><span class="ptper">Månedlig</span></td>
                <td><span class="ptok"></span><span class="ptper">Annenhver uke</span></td>
                <td><span class="ptok"></span><span class="ptper">Ukentlig</span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Gratis tilbakestilling av siste backup</td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Beskyttelse mot hackerangrep</td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Overvåking av malware</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Rensing av Wordpress spam kommentarer</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Sikker logg inn adresse</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Lockout av roboter</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Sikrere brukernavn og passord tjeneste</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Rensing og tilbakestilling ved Malware angrep</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
            </tr>
            <tr class="ptincl">
                <td class="pttbc1">Overvåking av oppetid</td>
                <td><span class="ptno"></span></td>
                <td><span class="ptno"></span></td>
                <td><span class="ptok"></span></td>
            </tr>

            <!-- action row -->
            <tr class="ptaction">
                <td class="pttbc1"></td>
                <td><a href="http://www.wpvakt.no/bestill?plan=standard" class="ptbestill">PRØV GRATIS NÅ!</a></td>
                <td><a href="http://www.wpvakt.no/bestill?plan=utvidet" class="ptbestill">PRØV GRATIS NÅ!</a></td>
                <td><a href="http://www.wpvakt.no/bestill?plan=premium" class="ptbestill">PRØV GRATIS NÅ!</a></td>
            </tr>
        </tbody>
    </table>
    <?php
}






