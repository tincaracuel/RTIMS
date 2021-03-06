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
          <ul class="nav navbar-nav">
            <li>
                 <a href='<?php echo base_url() ?>index.php/reportsManager/markAllAsRead' />
                <span class="icon"> / </span> Mark all reports as read</a>   
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/reportsManager/markAllAsUnread' />
                <span class="icon"> / </span> Mark all reports as unread</a>
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/mapsManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Main Menu</a>
            </li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

     <div id="queryMessage"></div>

    <div id="lowerbox">
        <div id="table_view" style="width: 100%;" ><br />

            <!--TABLE-->
            <?php

                if($query_report == NULL){ ?>
                    <center><?php echo '<p><br /><br /><br /><br />There are no reports saved in the database</p>'; ?>
                    </center>
                    <?php
                }else{ ?>
            
                    <table style="width: 95%">
                        <th style="min-width: 60px; width: 60px; max-width: 60px;">#</th>
                        <th>Subject</th>
                        <th style="min-width: 160px; width: 160px; max-width: 160px;">Sender</th>
                        <th style="min-width: 210px; width: 210px; max-width: 210px;">Email Address</th>
                        <th style="min-width: 130px; width: 130px; max-width: 130px;">Date Received</th>
                        <th style="min-width: 50px; width: 50px; max-width: 50px; font-size: 14px">Action</th>

                        
                        <?php foreach($query_report as $row){
                            ?><form name="<?php echo $row->report_id?> " action="<?php echo base_url() ?>index.php/reportsManager/report" method="post">
                                
                                <!-- ROW IS IN BOLD FACE IF THE REPORT IS NOT YET READ-->
                                <?php if ($row->status == "unread") { ?>
                                <tr style="font-weight: bold; background-color: #EEEEEE;">
                                <?php } else { ?> <tr> <?php } ?>

                                    <td> <?php echo $row->report_id ?> </td>

                                    <td style='text-align: justify;'>
                                        <?php if ($row->subject != NULL) echo $row->subject;
                                        else if ($row->rw_id != NULL) echo 'Re: Roadwork # '.$row->rw_id;
                                        else if ($row->inc_id != NULL) echo 'Re: Incident # '.$row->inc_id; ?> </td>


                                    <td> <?php echo $row->sender_name ?> </td>
                                    <td> <?php echo $row->sender_email ?> </td>
                                    <td> <?php echo $row->date_received ?> </td>
                                    <td> <input type="hidden" name="report_id" id="report_id" value="<?php echo $row->report_id ?>" />
                                    <input type="submit" id="selectReportToDisplayBtn" value="View" /> </td>

                                </tr>
                                
                            </form> <?php  
                        } /* END LOOP */ ?>
                    </table>
                    <?php
                } /* END ELSE */?>       

        </div>

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
    </script>
</html>