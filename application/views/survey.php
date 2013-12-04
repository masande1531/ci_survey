<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css">

        <script language="javascript" type="text/javascript" src="js/jquery-1.4.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript">
            $().ready(function() {

                $(function() {
                    $('#survey').dialog({
                        bgiframe: true,
                        autoOpen: false,
                        modal: true,
                        width: 700,
                        resizable: false,
                        buttons: {
                            Submit: function() {
                                if ($("input[name='p_communication']:checked").val() !== undefined && $("input[name='p_money']:checked").val() !== undefined) {
                                    //setCookie('POPsurvey','POPsurvey',30);  disabled cookies
                                    $.post("http://localhost/ci_survey/index.php/survey/add_survey", $("#popup_survey").serialize(),
                                            function(data) {
                                                if (data.db_check == 'fail') {
                                                    $("#error_message").html("<p>Database not available. Please try again.</p>");
                                                } else {
                                                    $("div.pink").css("width", data.perPink);
                                                    $(".perPink").html(data.perPink + "% (" + data.totalPink + ")");

                                                    $("div.blue").css("width", data.perBlue);
                                                    $(".perBlue").html(data.perBlue + "% (" + data.totalBlue + ")");

                                                    $("div.soccer").css("width", data.perSoccer);
                                                    $(".perSoccer").html(data.perSoccer + "% (" + data.totalSoccer + ")");

                                                    $("div.futbol").css("width", data.perFutbol);
                                                    $(".perFutbol").html(data.perFutbol + "% (" + data.totalFutbol + ")");

                                                    $(".totalRes").html(data.totalRes);

                                                    $('#survey').dialog('close');
                                                    $('#survey_thanks').dialog('open');
                                                }
                                            }, "json");
                                } else {
                                    $("#error_message").html("<p>Please answer all questions.</p>");
                                }
                            }
                        }
                    });
                });

                $(function() {
                    $('#survey_thanks').dialog({
                        bgiframe: true,
                        autoOpen: false,
                        modal: true,
                        width: 500,
                        resizable: false,
                        buttons: {
                            Close: function() {
                                $(this).dialog('close');
                            }
                        }
                    });
                });

                $('.surveyCookieDelete').click(function() {
                    deleteCookie('POPsurvey');
                    alert('Survey cookie cleared. Hit Refresh to see the survey again.');
                });

                $('p#surveyDenied a').click(function() {
                    setCookie('POPsurvey', 'POPsurvey', 30);
                    //ajax to count denials??
                    $('#survey').dialog('close');
                });

                $('#thanksClose').click(function() {
                    $('#survey_thanks').dialog('close');
                });

                checkCookie('POPsurvey');

            });

            function setCookie(c_name, value, expiredays)
            {
                var exdate = new Date();
                exdate.setDate(exdate.getDate() + expiredays);
                document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
            }
            function getCookie(c_name)
            {
                if (document.cookie.length > 0)
                {
                    c_start = document.cookie.indexOf(c_name + "=");
                    if (c_start != -1)
                    {
                        c_start = c_start + c_name.length + 1;
                        c_end = document.cookie.indexOf(";", c_start);
                        if (c_end == -1)
                            c_end = document.cookie.length;
                        return unescape(document.cookie.substring(c_start, c_end));
                    }
                }
                return "";
            }

            function checkCookie(c_name)
            {
                cookie_value = getCookie(c_name);
                if (cookie_value == "") {
                    $('#survey').dialog('open');
                }

            }

            function deleteCookie(c_name) {
                document.cookie = c_name + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
            }

        </script>

    </head>
    <body>
        <div class="container">

            <p><a href="#" class="surveyCookieDelete">Clear survey cookie to start fresh</a></p>


            <div id="survey" title="Global Migration SA Survey">
                <p><strong>Please assist by completing a short survey.</strong></p>
                <div id="error_message"></div>
                <?php
                $attributes = array('name' => 'popup_survey', 'id' => 'popup_survey');

                echo form_open('survey/add_survey', $attributes);
                ?>
               
                    <strong>Name : </strong><input id="name" type="text" name="name"/>
                    <strong>Company : </strong><input id="company" type="text" name="company"/>
                    <strong>Contact: </strong><input id="contact" type="text" name="contact"/><br/>
                    <strong>Email : </strong><input id="email" type="text" name="email"/>
                    <strong>Consultant : </strong><input id="consultant" type="text" name="consultant"/>
                    <hr/>
                    <p><strong>Please indicate your experience regarding communication</strong><br />
                        <input id="pink" type="radio" name="p_communication" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_communication" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_communication" value="Average"  />Average
                        <input id="blue" type="radio" name="p_communication" value="Good"  />Good
                        <input id="blue" type="radio" name="p_communication" value="Excellent"  />Excellent</p>
                    <p><strong>Please indicate experience regarding value of money</strong><br />
                        <input id="pink" type="radio" name="p_money" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_money" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_money" value="Average"  />Average
                        <input id="blue" type="radio" name="p_money" value="Good"  />Good
                        <input id="blue" type="radio" name="p_money" value="blue"  />Excellent</p>
                    <p><strong>Please rate your overall experience dealing with our company</strong><br />
                        <input id="pink" type="radio" name="p_company" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_company" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_company" value="Average"  />Average
                        <input id="blue" type="radio" name="p_company" value="Good"  />Good
                        <input id="blue" type="radio" name="p_company" value="Excellent"  />Excellent</p>
                    <p><strong>Would you recommend our services to anyone else</strong><br />
                        <input id="pink" type="radio" name="recommend" value="Yes"  />Yes
                        <input id="blue" type="radio" name="recommend" value="No"  />No	</p>
                    <p><strong>Please provide feedback or suggestions which could further help us improve our services.</strong><br />
                        <textarea name="feedback" id="feedback" rows="3" ></textarea></p>
                </form>

            </div>
            <div id="survey_thanks" title="Pop-Up Survey - Thank You!">
                <p>Thank you for taking the time to answer our survey. Your input will help us improve the site.</p>
                <p>Responses: <span class="totalRes"></span></p>

                <div class="progress-container">  
                    pink <span class="perPink"></span>        
                    <div class="pink"></div>
                    blue <span class="perBlue"></span>
                    <div class="blue"></div>
                </div>

                <div class="progress-container">  
                    soccer <span class="perSoccer"></span>        
                    <div class="soccer"></div>
                    futbol <span class="perFutbol"></span>
                    <div class="futbol"></div>
                </div>
            </div>
        </div>
    </body>
</html>
