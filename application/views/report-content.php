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
    <link href="<?php echo base_url() ?>styles/css/bootstrap.css"  rel="stylesheet"></link>
    <link href="<?php echo base_url() ?>styles/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

  </head>
  <body>
    <div class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: white"><img src="<?php echo base_url() ?>styles/img/calamba_seal.png" style="margin-top: -6px; margin-right: 5px; height: 22px" />Calamba City Roadworks and Traffic Incidents Monitoring System</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon"> U </span><?php echo $username?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                    <a href='<?php echo base_url() ?>index.php/logManager/editAccount' ><span class="icon"> S </span> My Account </a>
                  </li>
                  <li>
                    <a href='<?php echo base_url() ?>index.php/logManager/logout' ><span class="icon"> X </span> Log Out </a>
                  </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->


        <div class="navbar-collapse collapse" id="functions">
        <form name="markUnread" id="markUnread" action="<?php echo base_url() ?>index.php/reportsManager/markAsUnread" method="post">
          <ul class="nav navbar-nav">
            
            <li>
                <input type="hidden" name="report_id" id="report_id" value="<?php echo $query[0]->report_id ?>" >
            </li>

            <li><br />
                <input type="submit" value="Mark as unread" style="margin-top: -6px"/>
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/reportsManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Reports</a></form>
            </li>
          </ul>
        </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>


     <div id="queryMessage"></div>


    <div id="lowerbox">

        <div id="table_view" style="width: 100%;" ><br />

            <br />
            <div id="report-content">



            <p style="font-size: 20px;"> <?php if ($query[0]->subject != NULL) echo $query[0]->subject;
                else if ($query[0]->rw_id != NULL) echo 'Re: Roadwork # '.$query[0]->rw_id;
                else if ($query[0]->inc_id != NULL) echo 'Re: Incident # '.$query[0]->inc_id; ?></p>
            <hr />

            <b><?php echo $query[0]->sender_name ?></b> < <?php echo $query[0]->sender_email ?> >
            <p style="float: right; margin-top: -0px;"> <?php echo $query[0]->date_received ?> </p>
            <br />
            <?php if($query[0]->sender_contact_no != NULL) echo 'Contact number: '.$query[0]->sender_contact_no ?>
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

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.autosize.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>
    <script src="<?php echo base_url() ?>styles/js/bootstrap.min.js"></script>

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
</html>