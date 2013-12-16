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
    
    <script src="<?php echo base_url() ?>styles/js/jquery.autosize.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>

    <script>
        $(document).ready(function(){
            $("#editrw").colorbox({inline:true, width:"70%"});
            $("#deleterw").colorbox({inline:true, width:"auto"});

        });

        $(function(){
            $('textarea').autosize();
        });

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



        <div id="functions">
            Roadworks Table Manager:
            <a href="<?php echo base_url() ?>index.php/roadworksTableManager/all_roadworks">
                <span class="icon"> F </span> All Roadworks</a>
            <a href="<?php echo base_url() ?>index.php/roadworksTableManager/completed_roadworks">
                <span class="icon"> / </span> Completed</a>
            <a href="<?php echo base_url() ?>index.php/roadworksTableManager/ongoing_roadworks" id="selected">
                <span class="icon"> J </span> Ongoing</a>
            <a href="<?php echo base_url() ?>index.php/roadworksTableManager/planned_roadworks">
                <span class="icon"> P </span> Not Yet Started</a>
            <a href='<?php echo base_url() ?>index.php/roadworksManager' id="menu_back_rw_btn" />
                <span class="icon"> h </span> Back to Roadworks</a>
        </div>

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
                    <th style="width: 70px;">Start</th>
                    <th style="width: 70px;">End</th>
                    <th style="width: 120px;">Street</th>
                    <th style="width: 95px;">Barangay</th>
                    <th style="width: 50px;">Status</th>
                    
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
                        <td> <?php if ($row->status == 100) echo 'Finished';
                                else echo $row->status.'%'?> </td>
                        </tr>

                        <?php  
                    }
                } ?></table>
                <p style="text-align: center;"><?php echo $links; ?></p><?php 
            ?>
            

        </div>




    </div>

   
     


    
  </body>
</html>