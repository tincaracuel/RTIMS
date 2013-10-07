<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>styles/css/jquery-ui.css"  rel="stylesheet"></link>
    <link href="<?php echo base_url() ?>styles/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.autosize.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>

    <script>

        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });
        $(function(){   $( "#start2" ).datepicker();    });
        $(function(){   $( "#end2" ).datepicker();    });
        $(document).ready(function(){
            $("#editrw").colorbox({inline:true, width:"50%"});
        });

    </script>


    
  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">
      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System    
    </div>


     <div id="queryMessage"></div>

    <div id="lowerbox">
        <div id="table_view" style="width: 75%;" ><br /><br />
            <?php
                if($query == NULL){
                    ?> <center><?php echo 'There are no roadworks saved in the database.'; ?></center> <?php
                }else{ ?>
                    
                    <div class="edit_delete">
                    <a id='editrw' href="#edit_roadwork" onclick='javascript:listEditRoadworks();'>Edit Roadwork</a> <a id='deleterw' href="#delete_roadwork">Delete Roadwork</a>
                    </div>

                    <table>
                    <th style="min-width: 100px;">Contract #</th>
                    <th style="min-width: 150px;">Roadwork</th>
                    <th style="min-width: 110px;">Classification</th>
                    <th style="max-width: 400px;">Description</th>
                    <th style="min-width: 75px;">Start</th>
                    <th style="min-width: 75px;">End</th>
                    <th style="min-width: 90px;">Street</th>
                    <th style="min-width: 75px;">Barangay</th>
                    <th style="min-width: 50px;">Status</th>

                    
                    <?php foreach($query as $row){

                        ?><tr>
                        <td> <?php echo $row['0']->contract_no ?> </td>
                        <td> <?php echo $row['0']->rwork_name ?> </td>
                        <td> <?php echo $row['0']->rwork_type ?> </td>
                        <td> <?php echo $row['0']->description ?> </td>
                        <td> <?php echo $row['0']->start_date ?> </td>
                        <td> <?php echo $row['0']->end_date ?> </td>
                        <td> <?php echo $row['0']->street ?> </td>
                        <td> <?php echo $row['0']->barangay ?> </td>
                        <td> <?php if ($row['0']->status == 100) echo 'Finished';
                                else echo $row['0']->status.'%'?> </td>
                        </tr>
                        <?php
                        
                    }

                    
                }
                ?></table> <?php 
            ?>


        </div>

        <div id="adminFunctions">

            <div id="admin_roadwork">
                <a href='<?php echo base_url() ?>index.php/roadworksManager'><img src='<?php echo base_url() ?>styles/img/bg/menu_back.png' id="menu_back_rw_btn" /></a><br /><br /><br />
               
            </div>
            

        </div>


        <div style="display:none">
            <div id='edit_roadwork' style='background:#fff;'>
                <form class="editRoadwork"  method='post'>
                    <div name="left">
                        <div id="listOfRoadworks">
                        </div>
                    <br /> 
                    <input type="button" name="selectRoadwork" class="edit_delete_input_btn" id="editRwBtn1" value="SELECT" onclick='javascript:viewRoadworkDetails();'>
                    </div>
                    
                    <div name="right">
                        <div id="roadworkDetails">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

   
     


    
  </body>
</html>