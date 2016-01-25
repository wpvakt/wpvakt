<?php 

/**
 * The email template core  - ninified from the wpv_email_template function 
 */
function wpv_email_template_min($data) {
	return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><title></title><meta http-equiv="Content-Type" content="text/html;charset=utf-8"><meta name="viewport" content="width=320, target-densitydpi=device-dpi"><style type="text/css">#outlook a{padding: 0;}body{width: 100% !important;}.ReadMsgBody{width: 100%;}.ExternalClass{width: 100%;display:block !important;}body{background-color: #ececec;margin: 0;padding: 0;}img{outline: none;text-decoration: none;display: block;}br, strong br, b br, em br, i br{line-height:100%;}h1, h2, h3, h4, h5, h6{line-height: 100% !important;-webkit-font-smoothing: antialiased;}h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{color: blue !important;}h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active{color: red !important;}h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited{color: purple !important;}table td, table tr{border-collapse: collapse;}.yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span{color: black;text-decoration: none !important;border-bottom: none !important;background: none !important;}code{white-space: normal;word-break: break-all;}#background-table{background-color: #ececec;}.rounded_top{border-radius:6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius:6px 6px 0px 0px;-webkit-font-smoothing: antialiased;}#footer{border-radius:0px 0px 6px 6px;-moz-border-radius: 0px 0px 6px 6px;-webkit-border-radius:0px 0px 6px 6px;-webkit-font-smoothing: antialiased;}body, td{font-family: HelveticaNeue, sans-serif;}.header-content, .footer-content-left, .footer-content-right{-webkit-text-size-adjust: none;-ms-text-size-adjust: none;}.header-content{font-size: 12px;color: #ffffff;}.header-content a{font-weight: bold;color: #ffffff;text-decoration: none;}#headline p{color: #e7cba3;font-family: HelveticaNeue, sans-serif;font-size: 36px;text-align: center;margin-top:0px;margin-bottom:30px;}#headline p a{color: #e7cba3;text-decoration: none;}.article-title{font-size: 18px;line-height:24px;color: #60B99A;font-weight:bold;margin-top:0px;margin-bottom:18px;font-family: HelveticaNeue, sans-serif;}.article-title a{color: #60B99A;text-decoration: none;}.article-title.with-meta{margin-bottom: 0;}.article-meta{font-size: 13px;line-height: 20px;color: #ccc;font-weight: bold;margin-top: 0;}.article-content{font-size: 13px;line-height: 18px;color: #444444;margin-top: 0px;margin-bottom: 18px;font-family: HelveticaNeue, sans-serif;}.article-content a{color: #3F8F73;font-weight:bold;text-decoration:none;}.article-content img{max-width: 100%}.article-content ol, .article-content ul{margin-top:0px;margin-bottom:18px;margin-left:19px;padding:0;}.article-content li{font-size: 13px;line-height: 18px;color: #444444;}.article-content li a{color: #3F8F73;text-decoration:underline;}.article-content p{margin-bottom: 15px;}.footer-content-left{font-size: 12px;line-height: 15px;color: #ffffff;margin-top: 0px;margin-bottom: 15px;}.footer-content-left a{color: #ffffff;font-weight: bold;text-decoration: none;}.footer-content-right{font-size: 11px;line-height: 16px;color: #ffffff;margin-top: 0px;margin-bottom: 15px;}.footer-content-right a{color: #ffffff;font-weight: bold;text-decoration: none;}#footer{background-color: #60B99A;color: #ffffff;}#footer a{color: #ffffff;text-decoration: none;font-weight: bold;}#permission-reminder{white-space: normal;}.list_item_happy{color: #5FB89A;font-family:HelveticaNeue, sans-serif;font-size:15px;}.list_item_sad{color: #E14D43;font-family:HelveticaNeue, sans-serif;font-size:15px;}.update_link{border-radius:6px 6px 6px 6px;-moz-border-radius: 6px 6px 6px 6px;-webkit-border-radius:6px 6px 6px 6px;-webkit-font-smoothing: antialiased;background: #E14D43;padding:16px 22px;text-decoration:none;font-weight:bold;color:#fff;font-size:14px;}.update_link:hover{color:#fff;}</style><!--[if gte mso 9]><style _tmplitem="1047" >.article-content ol, .article-content ul{margin: 0 0 0 24px !important;padding: 0 !important;list-style-position: inside !important;}</style><![endif]--><meta name="robots" content="noindex,nofollow"></head><body style="width:100% !important;background-color:#ececec;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:HelveticaNeue, sans-serif;"><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table" style="background-color:#ececec;"><tbody><tr style="border-collapse:collapse;"><td align="center" bgcolor="#ececec" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="margin-top:0;margin-bottom:0;margin-right:10px;margin-left:10px;"><tbody><tr style="border-collapse:collapse;"><td class="w640" width="640" height="20" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr><tr style="border-collapse:collapse;"><td id="header" class="w640 rounded_top" width="640" align="center" bgcolor="#60B99A" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><table class="w640 rounded_top" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#60B99A" style="-webkit-font-smoothing:antialiased;background-color:#60B99A;color:#ffffff;"><tbody><tr style="border-collapse:collapse;"><td class="rounded_top" style=" font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse;text-align:left;padding:10px 30px;"><a href="http://wpvakt.no" target="_blank"><img id="customHeaderImage" label="Header Image" width="200" src="'.$data['header_image_url'].'" border="0" align="top" style="display:inline;outline-style:none;text-decoration:none;"></a></td><td style=" font-family:HelveticaNeue, sans-serif;font-size:16px;font-weight:bold;border-collapse:collapse;text-align:right;padding:10px 20px;">WORDPRESS VAKTSERVICE</td></tr></tbody></table></td></tr><tr style="border-collapse:collapse;"><td class="w640" width="640" height="30" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr><tr id="simple-content-row" style="border-collapse:collapse;"><td class="w640" width="640" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><table align="left" class="w640" width="640" cellpadding="0" cellspacing="0" border="0"><tbody><tr style="border-collapse:collapse;"><td class="w30" width="30" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td><td class="w580" width="580" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><table class="w580" width="580" cellpadding="0" cellspacing="0" border="0"><tbody><tr style="border-collapse:collapse;"><td class="w580" width="580" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><p align="left" class="article-title" style="font-size:22px;line-height:28px;color:#222222;border-bottom:1px solid #ECECEC;padding-bottom:20px;font-weight:bold;margin-top:0px;margin-bottom:25px;font-family:HelveticaNeue, sans-serif;">'.$data['title'].'</p><div align="left" class="article-content" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:HelveticaNeue, sans-serif;"> '.$data['content'].' </div></td></tr><tr style="border-collapse:collapse;"><td class="w580" width="580" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;padding-top:15px;padding-bottom:10px;"><table class="w580" width="580" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="-webkit-font-smoothing:antialiased;background-color:#ffffff;"><tbody><tr style="border-collapse:collapse;"><td width="330" style="width:330px;font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse;"><a class="update_link" href="http://www.wpvakt.no/pris-og-planer/" style="text-transform:uppercase">Prøv oss én måned gratis nå!</a></td><td width="230" style="width:230px;font-family:HelveticaNeue, sans-serif;font-size:13px;font-weight:normal;font-style:italic;border-collapse:collapse;padding-left:20px;"> Vi tilbyr oppdateringstjenester, og tjenester som vil gjøre nettsiden din sikrere og bedre rustet mot angrep og hacking. </td></tr></tbody></table></td></tr><tr style="border-collapse:collapse;"><td class="w580" width="580" height="10" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr></tbody></table></td><td class="w30" width="30" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr></tbody></table></td></tr><tr style="border-collapse:collapse;"><td class="w640" width="640" height="15" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr><tr style="border-collapse:collapse;"><td class="w640" width="640" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"><table id="footer" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#60B99A" style="border-radius:0px 0px 6px 6px;-moz-border-radius:0px 0px 6px 6px;-webkit-border-radius:0px 0px 6px 6px;-webkit-font-smoothing:antialiased;background-color:#60B99A;color:#ffffff;"><tbody><tr style="border-collapse:collapse;"><td style=" font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse;text-align:center;padding:20px 30px;">'.$data['footer_note'].'</td></tr></tbody></table></td></tr><tr style="border-collapse:collapse;"><td class="w640" width="640" height="60" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td></tr></tbody></table></td></tr></tbody></table></body></html>';

}

/**
 * The email template core  - expanded version for adjustments - NOT DIRECTLY IN USE
 */
function wpv_email_template($data) {
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html><!--@(window)--><!--@(document)-->
		<head>
			<title></title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
			<style type="text/css">
				#outlook a { padding: 0; }	
				body { width: 100% !important; }
				.ReadMsgBody { width: 100%; }
				.ExternalClass { width: 100%; display:block !important; } 
				body { background-color: #ececec; margin: 0; padding: 0; }
				img { outline: none; text-decoration: none; display: block;}
				br, strong br, b br, em br, i br { line-height:100%; }
				h1, h2, h3, h4, h5, h6 { line-height: 100% !important; -webkit-font-smoothing: antialiased; }
				h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: blue !important; }
				h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {	color: red !important; }
				h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited { color: purple !important; }
				  
				table td, table tr { border-collapse: collapse; }
				.yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span {
				color: black; text-decoration: none !important; border-bottom: none !important; background: none !important;
				}	
				code {
				  white-space: normal;
				  word-break: break-all;
				}
				#background-table { background-color: #ececec; }
				.rounded_top { border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; -webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; }
				#footer { border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; -webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; }
				body, td { font-family: HelveticaNeue, sans-serif; }
				.header-content, .footer-content-left, .footer-content-right { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }
				.header-content { font-size: 12px; color: #ffffff; }
				.header-content a { font-weight: bold; color: #ffffff; text-decoration: none; }
				#headline p { color: #e7cba3; font-family: HelveticaNeue, sans-serif; font-size: 36px; text-align: center; margin-top:0px; margin-bottom:30px; }
				#headline p a { color: #e7cba3; text-decoration: none; }
				.article-title { font-size: 18px; line-height:24px; color: #60B99A; font-weight:bold; margin-top:0px; margin-bottom:18px; font-family: HelveticaNeue, sans-serif; }
				.article-title a { color: #60B99A; text-decoration: none; }
				.article-title.with-meta {margin-bottom: 0;}
				.article-meta { font-size: 13px; line-height: 20px; color: #ccc; font-weight: bold; margin-top: 0;}
				.article-content { font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: HelveticaNeue, sans-serif; }
				.article-content a { color: #3F8F73; font-weight:bold; text-decoration:none; }
				.article-content img { max-width: 100% }
				.article-content ol, .article-content ul { margin-top:0px; margin-bottom:18px; margin-left:19px; padding:0; }
				.article-content li { font-size: 13px; line-height: 18px; color: #444444; }
				.article-content li a { color: #3F8F73; text-decoration:underline; }
				.article-content p {margin-bottom: 15px;}
				.footer-content-left { font-size: 12px; line-height: 15px; color: #ffffff; margin-top: 0px; margin-bottom: 15px; }
				.footer-content-left a { color: #ffffff; font-weight: bold; text-decoration: none; }
				.footer-content-right { font-size: 11px; line-height: 16px; color: #ffffff; margin-top: 0px; margin-bottom: 15px; }
				.footer-content-right a { color: #ffffff; font-weight: bold; text-decoration: none; }
				#footer { background-color: #60B99A; color: #ffffff; }
				#footer a { color: #ffffff; text-decoration: none; font-weight: bold; }
				#permission-reminder { white-space: normal; }
				.list_item_happy { color: #5FB89A; font-family:HelveticaNeue, sans-serif; font-size:15px; }
				.list_item_sad { color: #E14D43; font-family:HelveticaNeue, sans-serif; font-size:15px; }
				.update_link { border-radius:6px 6px 6px 6px; -moz-border-radius: 6px 6px 6px 6px; -webkit-border-radius:6px 6px 6px 6px; -webkit-font-smoothing: antialiased; background: #E14D43; padding:16px 22px; text-decoration:none; font-weight:bold; color:#fff; font-size:14px; }
				.update_link:hover { color:#fff;}
			</style>
			<!--[if gte mso 9]>
			<style _tmplitem="1047" >
				.article-content ol, .article-content ul {
				   margin: 0 0 0 24px !important;
				   padding: 0 !important;
				   list-style-position: inside !important;
				}
			</style>
			<![endif]-->
			<meta name="robots" content="noindex,nofollow">
		</head>
		<body style="width:100% !important;background-color:#ececec;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:HelveticaNeue, sans-serif;">
			<table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table" style="background-color:#ececec;">
				<tbody>
					<tr style="border-collapse:collapse;">
						<td align="center" bgcolor="#ececec" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
        					<table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="margin-top:0;margin-bottom:0;margin-right:10px;margin-left:10px;">
            					<tbody>
            						<tr style="border-collapse:collapse;">
            							<td class="w640" width="640" height="20" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
            						</tr>

            						<!-- header -->
                					<tr style="border-collapse:collapse;">
                						<td id="header" class="w640 rounded_top" width="640" align="center" bgcolor="#60B99A" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
											<table class="w640 rounded_top" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#60B99A" style="-webkit-font-smoothing:antialiased;background-color:#60B99A;color:#ffffff;">
										        <tbody>
										        	<tr style="border-collapse:collapse;">
										        		<td class="rounded_top" style=" font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse; text-align:left; padding:10px 30px;">
										        			<a href="http://wpvakt.no" target="_blank"><img id="customHeaderImage" label="Header Image" width="200" src="'.$data['header_image_url'].'" border="0" align="top" style="display:inline;outline-style:none;text-decoration:none;"></a>
										        		</td>
										        		<td style=" font-family:HelveticaNeue, sans-serif;font-size:16px;font-weight:bold;border-collapse:collapse; text-align:right; padding:10px 20px;">WORDPRESS VAKTSERVICE</td>
										        	</tr>
										    	</tbody>
										    </table>
										</td>
                					</tr>

                					<tr style="border-collapse:collapse;">
                						<td class="w640" width="640" height="30" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
                					</tr>

                					<!-- content -->
                					<tr id="simple-content-row" style="border-collapse:collapse;">
                						<td class="w640" width="640" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
    										<table align="left" class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        										<tbody>
        											<tr style="border-collapse:collapse;">
            											<td class="w30" width="30" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
            											<td class="w580" width="580" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
                
									                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
									                            <tbody>
									                            	<tr style="border-collapse:collapse;">
										                                <td class="w580" width="580" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
										                                    <p align="left" class="article-title" style="font-size:22px;line-height:28px;color:#222222;border-bottom:1px solid #ECECEC;padding-bottom:20px;font-weight:bold;margin-top:0px;margin-bottom:25px;font-family:HelveticaNeue, sans-serif;">'.$data['title'].'</p>
										                                    <div align="left" class="article-content" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:HelveticaNeue, sans-serif;">
										                                        '.$data['content'].'
										                                    </div>
										                                </td>
										                            </tr>
										                            <tr style="border-collapse:collapse;">
									                            		<td class="w580" width="580"  style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse; padding-top:15px; padding-bottom:10px;">
									                            			<table class="w580" width="580" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="-webkit-font-smoothing:antialiased;background-color:#ffffff;">
																		        <tbody>
																		        	<tr style="border-collapse:collapse;">
																		        		<td width="330" style="width:330px;font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse;">
																		        			<a class="update_link" href="http://www.wpvakt.no/pris-og-planer/" style="text-transform:uppercase">Prøv oss én måned gratis nå!</a>
																		        		</td>
																		        		<td width="230" style="width:230px;font-family:HelveticaNeue, sans-serif;font-size:13px;font-weight:normal;font-style:italic;border-collapse:collapse; padding-left:20px;">
																		        			Vi tilbyr oppdateringstjenester, og tjenester som vil gjøre nettsiden din sikrere og bedre rustet mot angrep og hacking.
																		        		</td>
																		        	</tr>
																		    	</tbody>
																		    </table>
									                            		</td>
									                            	</tr>
									                            	<tr style="border-collapse:collapse;">
									                            		<td class="w580" width="580" height="10" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
									                            	</tr>
									                        	</tbody>
									                        </table>
                    
            											</td>
            											<td class="w30" width="30" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
        											</tr>
    											</tbody>
    										</table>
										</td>
									</tr>

                					<tr style="border-collapse:collapse;">
                						<td class="w640" width="640" height="15" bgcolor="#ffffff" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
                					</tr>

                					<!-- footer -->
                					<tr style="border-collapse:collapse;">
                						<td class="w640" width="640" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;">
										    <table id="footer" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#60B99A" style="border-radius:0px 0px 6px 6px;-moz-border-radius:0px 0px 6px 6px;-webkit-border-radius:0px 0px 6px 6px;-webkit-font-smoothing:antialiased;background-color:#60B99A;color:#ffffff;">
										        <tbody>
										        	<tr style="border-collapse:collapse;">
										        		<td style=" font-family:HelveticaNeue, sans-serif;font-size:14px;border-collapse:collapse; text-align:center; padding:20px 30px;">'.$data['footer_note'].'</td>
										        	</tr>
										    	</tbody>
										    </table>
										</td>
                					</tr>

                					<tr style="border-collapse:collapse;">
                						<td class="w640" width="640" height="60" style="font-family:HelveticaNeue, sans-serif;border-collapse:collapse;"></td>
                					</tr>
            					</tbody>
            				</table>
        				</td>
					</tr>
				</tbody>
			</table>
    	</body>
    </html>
    <?php
} 