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
              <a href="<?php echo base_url() ?>index.php/roadworksTableManager/all_roadworks">
                <span class="icon"> F </span> All Roadworks</a>    
            </li>

            <li>
              <a href="<?php echo base_url() ?>index.php/roadworksTableManager/completed_roadworks">
                <span class="icon"> / </span> Completed</a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/roadworksTableManager/ongoing_roadworks" id="selected">
                <span class="icon"> J </span> Ongoing</a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/roadworksTableManager/planned_roadworks">
                <span class="icon"> P </span> Not Yet Started</a>
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/roadworksManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Roadworks</a>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


     <div id="queryMessage"></div>

    <div id="lowerbox">
        <div id="table_view" style="width: 100%;" >

            <!--TABLE-->
            <?php

                if($query_ongoing == NULL){ ?>
                    <center><?php echo '<br /><br /><br /><br /><br />There are no ongoing roadworks saved in the database.<br /><br />'; ?>
                    </center>
                    <?php
                }else{ ?>
            
                    <table>
                    <th style="min-width: 100px; max-width:100px;">Contract #</th>
                    <th style="width: 200px; max-width:200px;">Roadwork</th>
                    <th style="min-width: 130px; max-width: 130px;">Classification</th>
                    <th style="min-width: 200px;max-width: 200px;">Description</th>
                    <th style="width: 90px;">Start</th>
                    <th style="width: 90px;">End</th>
                    <th style="width: 120px;">Street</th>
                    <th style="width: 95px;">Barangay</th>
                    <th style="width: 40px;">Status</th>
                    
                    <?php foreach($query_ongoing as $row){

                        ?><tr>
                        <td> <?php echo $row->contract_no ?> </td>
                        <td> <?php echo $row->rwork_name ?> </td>
                        <td> <?php echo $row->rwork_type ?> </td>
                        <td> <?php echo $row->description ?> </td>
                        <td> <?php echo $row->start_date ?> </td>
                        <td> <?php if($row->end_date!='0000-00-00') echo $row->end_date ?> </td>
                        <td> <?php echo $row->street ?> </td>
                        <td> <?php echo $row->barangay ?> </td>
                        <td> <?php if($row->end_date!='0000-00-00') require('date.php')?> </td>
                        </tr>

                        <?php  
                    }
                } ?></table>
                <p style="text-align: center;"><?php echo $links; ?></p><?php 
            ?>            

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

        $(function(){
            $('textarea').autosize();
        });

    </script>
</html>