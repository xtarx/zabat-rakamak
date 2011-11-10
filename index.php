<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html expr:dir='data:blog.languageDirection' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
        <meta http-equiv="Content-Language" content="en-us">
            <?php
            header('Content-type: text/html; charset=UTF-8');
            error_reporting(E_ALL ^ E_NOTICE); //define('INCLUDE_CHECK', true);
            include('functions.php');
            session_start();
            $objects = scandir('uploads/');
            $expiretime = 30; //expire time in minutes
// Read file creation time
            $FileCreationTime = filectime($Filename);

// Calculate file age in seconds
            $FileAge = time() - $FileCreationTime;
            $c = 0;
            foreach ($objects as $object) {
                if ($c > 1) {
                    //  echo '</br> ' . $object;
                    // Read file creation time
                    $stat = stat('uploads/' . $object);
                    $FileCreationTime = $stat['mtime'];
                    //echo  $FileCreationTime = filectime('uploads/'.$object.'/Shanuor.eng.atif.vcf');
// Calculate file age in seconds
                    $FileAge = time() - $FileCreationTime;
                    if ($FileAge > ($expiretime * 60)) {
                        delete_directory('uploads/' . $object);
                    }
                }
                $c++;
            }
////
//        echo 'TESTIN 123 </br>';
//        $STR = "0101419774";
//        $numbers_array = extract_numbers($STR);
//        // echo $numbers_array[0];
//        // echo count($numbers_array);
//        $theNumber;
//        foreach ($numbers_array as $number) {
//            echo $number . '</br>';
//            $theNumber.=$number;
//            //  echo $theNumber+=$number . '</br>';
            //       echo readDirectory('uploads/rtolig6edv12tq9sn8dbh3i7n21317433740/');
//        $arr = array();
//        $arr[] = 2;
//        $i = 0;
//        
//        if ($arr[-1] < $ar[0]) {
//            echo 'am in the condiotn';
//        }
            echo 'arabic  العربية </br>';
          // readDirectory('uploads/Newfolder/');
            
           
            ?>
            <b:include data='blog' name='all-head-content'/>

            <title>
                Zabat-Rakamak ---زبط رقمك
            </title> 

            <link href='favicon-url' rel='shortcut icon' type='image/vnd.microsoft.icon'/>

            <b:skin><![CDATA[/*
                -----------------------------------------------
                Template Name  : Placeholder | Blogger Template
                Author         : NewBloggerThemes.com
                Author URL     : http://newbloggerthemes.com/
                Created Date   : Sunday, May 19, 2011
                License        : This template is free for both personal and commercial use, But to satisfy the 'attribution' clause of the license, you are required to keep the footer links intact which provides due credit to its authors.For more information about this license, please use this link :http://creativecommons.org/licenses/by/3.0/
                ----------------------------------------------- */

                .post-body img {max-width:99% !important;}
                ]]></b:skin>

            <!-- Google Webfonts -->
            <link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
            <script type="text/javascript" src="uploadify/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="uploadify/swfobject.js"></script>
            <script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
            <script src="gen_validatorv4.js" type="text/javascript"></script>
            <link rel="stylesheet" href="style.css" type="text/css" />
            <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
            <script type='text/javascript'>
                
      
                $(document).ready(function() {
                    $('#download').hide();
                    $('#how').hide();
                    $("#downloadLink").click(function() {
                        setTimeout("location.reload()",3000);
                    });
        
                    
                    $("#howLink").click(function() {
                        $('#how').toggle();
                        // setTimeout("location.reload()",3000);
                    });
              
                
                    //  document.write('uploads/<?php echo session_id(); ?>');
                    // alert('uploads/<?php echo session_id(); ?>/');
                    $('#file_upload').uploadify({
                        'uploader'  : 'uploadify/uploadify.swf',
                        'script'    : 'uploadify/uploadify.php',
                        'cancelImg' : 'uploadify/cancel.png',
                        'folder'    : 'uploads/<?php echo $_SESSION['urlUplodify'] = session_id() . time(); ?>/',
                        'multi'       : true,
                        'queueSizeLimit' : 900,       
                        'fileExt'     : '*.vcf;',
                        'fileDesc'    : 'VCF file (bussinesscard,contact info)',
                        'onAllComplete' : function(event,data) {
                            runUpdateonDir('uploads/<?php echo $_SESSION['urlUplodify']; ?>/');
                            //  location.reload();

                        },
                        'auto'      : true
                    });
                });
                //END OF UPLOADIFY

                function runUpdateonDir(str){
              
                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                    {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function()
                    {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            $('#download').show();
                            var targetOffset = $('#download').offset().top;
                            $('html,body').animate({scrollTop: targetOffset}, 'slow');
                        }
                    }
                    xmlhttp.open("GET","functions.php?q="+str,true);
                    xmlhttp.send();
                }
                //end of the script
    
            </script>

            <style type='text/css'>

                body
                { font:12px/1.5em Arial,Helvetica,Sans-serif;
                  color:#555;
                  background:#e9e9e9 url(http://1.bp.blogspot.com/-CFDJn4O_Zo0/TjtE-oRXNAI/AAAAAAAAAVI/5khH-2-zYzs/s000/bg-grid.png) repeat; }

                h1,h2,h3,h4,h5,h6
                { margin:0;
                  color:#555;
                  font-family:sans-serif;
                  font-weight:bold; }

                h1
                { font-size:2em; }

                h2
                { font-size:1.8em; }

                h3
                { font-size:1.6em; }

                h4
                { font-size:1.2em; }

                h5
                { font-size:1em; }

                h6
                { font-size:0.8em; }

                p
                { margin:0; }

                hr
                { background-color:#e6e6e6;
                  border:0;
                  height:1px;
                  margin-bottom:20px; }

                input,textarea
                { padding:5px;
                  border-color:#EFEFEF #ccc #CCC #efefef;
                  border-width:1px;
                  border-style:solid; }

                a:link,a:visited
                { color:#3088ff;
                  text-decoration:none; }

                a:hover
                { color:red;
                  text-decoration:underline; }

                h1 a:link,h1 a:visited,h2 a:link,h2 a:visited,h3 a:link,h3 a:visited,h4 a:link,h4 a:visited,h5 a:link,h5 a:visited,h6 a:link,h6 a:visited
                { text-decoration:none; }

                h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover
                { text-decoration:underline; }

                #wrapper
                { background:url(http://2.bp.blogspot.com/-txHGXSSozJA/TjtE-zc9EYI/AAAAAAAAAVM/d5LTjO_77Qw/s000/bg-top.png) repeat-x 0 1px; }

                .col-full
                { width:660px;
                  margin:0 auto; }

                #header
                { padding:110px 0 30px;
                  clear:both;
                  position:relative; }

                #logo
                { text-align:center; }

                #logo img
                { ; }

                #logo .site-title,#logo .site-description
                { font-family:Georgia,serif;
                  color:#000;
                  display:none; }

                #logo .site-title a
                { color:#222;
                  text-transform:none;
                  font-size:40px;
                  line-height:40px;
                  font-weight:normal;
                  text-decoration:none;
                  text-shadow:0 -1px 0 #fff; }

                #logo .site-title a:hover
                { text-decoration:underline; }

                #logo .site-description
                { color:#999;
                  font:italic 14px Georgia,serif;
                  text-shadow:0 1px 0 #fff; }

                #content
                { background:#fff;
                  border:1px solid #ccc;
                  padding:0;
                  border-radius:6px;
                  -moz-border-radius:6px;
                  -webkit-border-radius:6px;
                  box-shadow:0 2px 5px rgba(0,0,0,.1);
                  -moz-box-shadow:0 2px 5px rgba(0,0,0,.1);
                  -webkit-box-shadow:0 2px 5px rgba(0,0,0,.1); }

                #main
                { padding:40px 50px; }

                #main .block
                { margin-bottom:30px;
                  font-size:13px; }

                #main .block h3
                { position:relative;
                  border-bottom:1px solid #e6e6e6;
                  text-align:center;
                  margin-bottom:30px; }

                #main .block h3 span
                { Êdisplay:block;
                  position:relative;
                  top:10px;
                  background:#fff;
                  padding:0 15px; }

                #bblock{
                    text-align:center; 
                    margin-left: auto ;
                    margin-right: auto ;
                }
                #main #intro h3
                { font-size:18px; }

                #main #social
                { Êtext-align:center;
                  margin-bottom:40px; }

                #main #social h3
                { font-size:14px; }

                #main #social .social-links
                { margin:0 auto;
                  width:500px; }

                #main #social .link
                { float:left;
                  width:110px;
                  display:inline-block;
                  margin-right:20px; }

                #main #social .link .twitter
                { background:url(http://3.bp.blogspot.com/-I53Qi1_puiA/TjtE_DcUm9I/AAAAAAAAAVQ/t5Bgf0a43GA/s000/ico-twitter.png) no-repeat left center;
                  padding-left:40px;
                  display:block; }

                #main #social .link .facebook
                { background:url(http://4.bp.blogspot.com/-pZOuYJ9fGx0/TjtE_Yp3sDI/AAAAAAAAAVU/FJi9ltv7-3g/s000/ico-facebook.png) no-repeat left center;
                  padding-left:40px;
                  display:block; }

                #main #social .link .contact
                { background:url(http://3.bp.blogspot.com/-f7VQt1s6uFU/TjtE_prrLQI/AAAAAAAAAVY/zVhP0E5ws7c/s000/ico-contact.png) no-repeat left center;
                  padding-left:40px;
                  display:block; }

                #main #social .link .subscribe
                { background:url(http://1.bp.blogspot.com/-mxlUTxwVf9Q/TjtE_u016MI/AAAAAAAAAVc/2K10IF4T2kY/s000/ico-subscribe.png) no-repeat left center;
                  padding-left:40px;
                  display:block; }

                #main #social .last
                { margin-right:0; }

                #main #social .link img
                { vertical-align:middle; }

                #main #social .link a
                { padding-left:3px;
                  color:#555;
                  text-decoration:none;
                  font-weight:bold;
                  line-height:30px; }

                #main #social .link a:hover
                { opacity:0.85; }

                #main #countdown
                { background:#fff url(http://1.bp.blogspot.com/-CFDJn4O_Zo0/TjtE-oRXNAI/AAAAAAAAAVI/5khH-2-zYzs/s000/bg-grid.png) repeat;
                  padding:10px 0;
                  border:1px solid #e6e6e6;
                  border-radius:6px;
                  -moz-border-radius:6px;
                  -webkit-border-radius:6px; }

                #main #countdown h3
                { font-size:14px;
                  background:url(http://1.bp.blogspot.com/-g1EUalIziuA/TjtE_-jLvMI/AAAAAAAAAVg/C_alxRg6HvQ/s000/bg-countdown-h3.png) no-repeat center bottom;
                  border:none;
                  margin-bottom:20px; }

                #main #countdown h3 span
                { background:none; }

                #main #countdown #timer
                { background:url(http://1.bp.blogspot.com/-tnHQuxGzDho/TjtFAHtiNjI/AAAAAAAAAVk/H7w0A00ftbw/s000/bg-timer.png) no-repeat top;
                  width:406px;
                  height:80px;
                  text-align:center;
                  margin:0 auto 10px;
                  padding-left:5px; }

                #main #countdown #timer span.countdown_section
                { float:left;
                  width:100px; }

                #main #countdown #timer span.countdown_amount
                { color:#fff;
                  text-shadow:0 1px 2px #000;
                  font-size:36px;
                  line-height:60px; }

                #main #countdown #timer .countdown_section
                { color:#555;
                  text-shadow:0 1px 1px #fff;
                  display:block;
                  font-size:11px;
                  line-height:30px;
                  font-style:normal;
                  text-transform:uppercase; }

                #main #newsletter
                { ; }

                #main #newsletter p
                { font-size:14px;
                  font-weight:bold;
                  color:#555;
                  float:left;
                  padding:8px 5px 0 30px; }

                #main #newsletter form
                { float:right;
                  padding:0 30px 0 0; }

                #main #newsletter form input.email
                { width:150px;
                  color:#888;
                  border:1px solid #ddd;
                  padding:5px 8px 4px;
                  height:20px;
                  border-radius:3px;
                  -moz-border-radius:3px;
                  -webkit-border-radius:3px;
                  box-shadow:inset 0 2px 4px rgba(0,0,0,.1);
                  -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.1);
                  -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.1); }

                #main #newsletter form input.submit
                { margin:0 0 0 5px;
                  padding:0;
                  background:url(http://3.bp.blogspot.com/-sF1NFTPDZo4/TjtFAfTnhoI/AAAAAAAAAVo/JVL5CUj8iYM/s000/btn-submit.png) no-repeat;
                  width:89px;
                  height:31px;
                  border:0;
                  cursor:pointer;
                  color:#fff;
                  text-shadow:0 -1px 0 #777;
                  font:bold 13px sans-serif; }

                #main #newsletter form input.submit:hover
                { opacity:0.85; }

                #footer
                { padding:30px 0 0;
                  color:#999;
                  text-align:center; }

                #footer p
                { text-shadow:0 1px 0 #fff; }

                #footer img
                { vertical-align:middle;
                  opacity:0.85; }

                #footer img:hover
                { opacity:1; }

                #footer span
                { display:none; }

                #footer .divider
                { padding:0 8px; }

                #main #intro p
                { font:normal 14px/1.5em Droid Serif;
                  color:#555; }

                #footer p
                { font:normal 14px/1em Lobster;
                  color:#999; }

                .fix
                { clear:both;
                  height:1px;
                  overflow:hidden;
                  margin:-1px 0 0; }

                #navbar-iframe
                { height:0;
                  visibility:hidden;
                  display:none; }

                #fb{
                    width: 50%;
                    float: right;
                    text-align:center; 
                    margin-left: auto ;
                    margin-right: auto ;


                }

            </style>

    </head>

    <body>

        <div id='wrapper'>

            <div class='col-full' id='header'>

                <div id='logo'>	       
                    <a expr:href='data:blog.homepageUrl'>
                        <a href=""><img src='logo.png'/></a>  
                    </a>             
                    <h1 class='site-title'><a expr:href='data:blog.homepageUrl'><data:blog.pageTitle/></a></h1>	      	
                </div><!-- /#logo -->

            </div><!-- /#header -->           


            <div class='col-full' id='content'>

                <div id='main'>



                    <div class='block' id='intro'>
                        <h3><span><data:blog.pageTitle/></span></h3>
                        <div style=" text-align:center; ">
                            <h4><span>الحل لمشكلة اضافة رقم جديد علي ارقام المحول في مصر</span></h4>

                            <h4><span>The solution to adding 11th number to mobiles</span></h4>
                        </div>
                        <div id="bblock">
                            </br>
                            </br>
                            <input id="file_upload" name="file_upload" type="file" />
                            <p style="border:3px solid LightYellow;background-color:#FFFFE0;"> <i>حمل ارقامك من علي المحمول و ارفعها هنا و نزلها متظبتة  11 رقم</i> </br><i>choose all your contacts in 'VCF' format & then Download them FIXED </i></p>
                            <div  id="howLink">
                                <p style="color: red;" > <a style="color: red;" > HELP see Example --اشوف مثال</a> </p></div> 
                            </br>

                            <div id="how" style="border:3px solid LightYellow;background-color:#FFFFE0;">
                                <iframe width="560" height="315" src="http://www.youtube.com/embed/jDOB_1CbK4U" frameborder="0" allowfullscreen></iframe>
                                How to get VCF (Vcard) for :
                                <a href="http://www.youtube.com/watch?v=jak4efoz1-Y">Nokia Mobile</a> --
                                <a href="http://www.youtube.com/watch?v=mUeCbbszsDo"> Andriod Mobile</a> --
                                <a href="http://www.google.com.eg/search?q=export+vcf+">Others</a>

                            </div>

                            OR </br> </br>
                            <p style="border:3px solid LightYellow;background-color:#FFFFE0;" > 
                                <i>مكسل تحمل الرقام علي الكومبيوتر او عايز تزبط كام رقم علي الماشي</i> </br> <i>Not professional enough *sigh* or just in a hurry paste numbers & get them Fixed </i></p>
                            <i> numbers must be separated by a new line --كل رقم في سطر لوحده</i>

                            <form name="input" action="#" method="POST" id="myform">
                                <input type="hidden" name="submitted" value="1">
                                    <textarea name="mobile_numbers" rows="7" cols="40" ></textarea>
                                    </br>
                                    <input name="go" type="submit" value="GO" />
                            </form>
                            <script  type="text/javascript">
                                var frmvalidator = new Validator("myform");
                                frmvalidator.addValidation("mobile_numbers","req","type at least a mobile number ,اكتب رقم المحمول");
                                frmvalidator.addValidation("mobile_numbers","minlen=10","at least a 10 digits number-علي الاقل 10 ارقام");
                                frmvalidator.addValidation("mobile_numbers","maxlen=2000","maximum reached");
                                // frmvalidator.addValidation("mobile_numbers","numeric","only numeric data should be provided..لازم يكون رقم");
                            </script>

                            <div id="results" style="border:3px solid LightYellow;background-color:#b0c4de;">
<?php
if (isset($_POST['go'])) {
    $text = $_POST["mobile_numbers"];
    $lines = explode("\r", $text);
    $num = count($lines);
    for ($i = 0; $i < $num; $i++) {
        if ($lines[$i] != " " && $lines[$i] != null) {
            $numbers_array = extract_numbers(trim($lines[$i]));
            $theNumber = "";
            foreach ($numbers_array as $number) {
                $theNumber.=$number;
            }
            echo updateMobileNumber(trim($lines[$i])) . '<br />';
        }
    }
}
?>
                            </div>
                        </div>
                    </div><!-- #intro -->



                    <div class='block' id='social'>
                        <h3><span>SHARE -انشر</span></h3>

                        <div class='social-links'>

                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) {return;}
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class='link'>
                            </div>


                            <div class='link' style=" text-align:center; 
                                 margin-left: auto ;
                                 margin-right: auto ;" >


                                <div id="fb" class="fb-like-box">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {return;}
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                                    <div class="fb-like-box" data-href="http://www.facebook.com/pages/Zabat-Rakamk-%D8%B8%D8%A8%D8%B7-%D8%B1%D9%82%D9%85%D9%83-%D8%AD%D9%84-%D9%85%D8%B4%D9%83%D9%84%D8%A9-%D8%A7%D9%84%D8%B1%D9%82%D9%85-%D8%A7%D9%84%D8%AC%D8%AF%D9%8A%D8%AF-%D9%84%D9%84%D9%85%D9%88%D8%A8%D9%8A%D9%84/287017507976459" data-width="400"  data-show-faces="true" data-stream="false" data-header="true"></div>

                                </div>
                            </div>
                            <div class='fix'/>
                        </div>

                    </div><!-- #social -->


                    <div class='block' id='countdown'>
                        <h3><span>DOWNLOAD LINK</span></h3>
                        <div id='timer'/>
                        </br>
                        <div id="download" >
                            <li><a style=" position: relative; top: -50%;font-size:20pt;" id="downloadLink" href="download.php?d=<?php echo $_SESSION['urlUplodify']; ?>&f=contacts.zip" >Download Contacts</a></li>
                        </div>
                    </div>

                    <div id='newsletter'>



                        <div class='fix'/>

                    </div>


                </div>

            </div><!-- /#content -->



            <div class='col-full' id='footer' >


                <div id='copyright' style="text-align:center; ">

                    <p> Follow Me <a href='http://twitter.com/#!/xtarx' />@xtarx</a> Devoloped  by<a href='http://xtarx0.wordpress.com/' target='_blank'> XtarX</a> | Logo by<a href='http://twitter.com/#!/alialaa' > @alialaa</a></p> 

                </div>

            </div><!-- /#footer  -->

        </div><!-- /#wrapper -->

    </body>


</html>