<?php

    if($query_ongoing == NULL){ ?>
            <script>$("#edit_delete").hide();</script>
            <center><?php echo '<br /><br /><br /><br /><br />There are no ongoing incidents saved in the database.<br /><br />'; ?>
            </center>
            <?php
    }else{ ?>
        

        <table>
        <th style="width: 100px;">Incident #</th>
        <th style="width: 90px;">Classification</th>
        <th style="width: 400px;">Description</th>
        <th style="width:     80px;">Start</th>
        <th style="width:     80px;">End</th>
        <th style="width: 120px;">Street</th>
        <th style="width: 150px;">Barangay</th>

        
        <?php foreach($query_ongoing as $row){

            ?><tr>
            <td> <?php echo $row['0']->inc_id ?> </td>
            <td> <?php echo $row['0']->inc_type ?> </td>
            <td> <?php echo $row['0']->description ?> </td>
            <td> <?php echo $row['0']->start_date ?> </td>
            <td> <?php if($row['0']->end_date!='0000-00-00') echo $row['0']->end_date ?> </td>
            <td> <?php echo $row['0']->street ?> </td>
            <td> <?php echo $row['0']->barangay ?> </td>
            </tr>



            <?php
            
        }

        
    }
    ?></table> <?php 
?>