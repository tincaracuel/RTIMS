<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>styles/css/jquery-ui.css"  rel="stylesheet"></link>
    <link href="<?php echo base_url() ?>styles/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>

    <script>
        $(document).ready(function(){
            $("#editrw").colorbox({inline:true, width:"70%"});
            $("#deleterw").colorbox({inline:true, width:"auto"});

        });

        $(function(){ $('textarea').autosize(); });

        $(function() {
            $('#markAsUnreadBtn').click(function() {
                $('#markUnread').submit();
            });
        })
    </script>


  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">

      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System

      <div id="logout">
      <span><a href='<?php echo base_url() ?>' ><span class="icon"> X </span>&nbsp;Log Out</a></span>
      </div>    
    </div>


     <div id="queryMessage"></div>

    <div id="lowerbox">

        <div id="functions">
            <form name="markUnread" id="markUnread" action="<?php echo base_url() ?>index.php/reportsManager/markAsUnread" method="post">
            Reports / Problem Manager:     
                <input type="hidden" name="report_id" id="report_id" value="<?php echo $query[0]->report_id ?>" >
            <input type="submit" value="Mark as unread" />
            <a href='<?php echo base_url() ?>index.php/reportsManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Reports</a></form>
        </div>

        <div id="table_view" style="width: 100%;" ><br />

            <br />
            <div id="report-content">



            <p style="font-size: 20px;"> <?php if ($query[0]->subject != NULL) echo $query[0]->subject;
                else if ($query[0]->rw_id != NULL) echo 'Re: Roadwork # '.$query[0]->rw_id;
                else if ($query[0]->inc_id != NULL) echo 'Re: Incident # '.$query[0]->inc_id; ?></p>
            <hr />

            <b><?php echo $query[0]->sender_name ?></b> < <?php echo $query[0]->sender_email ?> >
            <p style="float: right; margin-top: -0px;"> <?php echo $query[0]->date_received ?> </p>
            <br /><br />
            <p> <?php echo $query[0]->description ?> </p>
            <br />
            <hr />
            <br /><br />



            <center><a href='<?php echo base_url() ?>index.php/reportsManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Reports</a></center>
            </div>
            

        </div>




        <!--<div style="display:none">
            <div id='edit_roadwork' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="editRoadwork"  method='post'>
                    <div name="left">
                        <div id="listOfRoadworks">
                        </div>
                    <br /> 
                    <input type="button" name="selectRoadwork" class="lightboxSubmitBtn" id="editRwBtn1" value="SELECT" onclick='javascript:viewRoadworkDetails();'>
                    </div>
                    
                    <div name="right">
                        <div id="roadworkDetails">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div style="display:none">
            <div id='delete_roadwork' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="deleteRoadwork"  method='post'>
                    <div name="delete_roadwork">
                        <div id="listOfRoadworks2">
                        </div>
                    <br />
                    <input type="button" name="selectRoadwork" class="lightboxSubmitBtn" id="deleteRwBtn1" value="DELETE" onclick='javascript:deleteSelectedRoadwork();'>
                    </div>
                </form>
            </div>
        </div>-->





    </div>

   
     


    
  </body>
</html>