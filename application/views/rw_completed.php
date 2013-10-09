<?php

    if($query_completed == NULL){ ?>
            <script>$("#edit_delete").hide();</script>
            <center><?php echo '<br /><br /><br /><br /><br />There are no completed roadworks saved in the database.<br /><br />'; ?>
            </center>
            <?php
    }else{ ?>
        
        

        <table>
        <th style="min-width: 100px; max-width:100px;">Contract #</th>
        <th style="width: 270px; max-width:270px;">Roadwork</th>
        <th style="min-width: 130px; max-width: 130px;">Classification</th>
        <th style="min-width: 200px;max-width: 200px;">Description</th>
        <th style="width: 80px;">Start</th>
        <th style="width: 80px;">End</th>
        <th style="width: 120px;">Street</th>
        <th style="width: 120px;">Barangay</th>
        <th style="width: 50px;">Status</th>

        
        <?php foreach($query_completed as $row){

            ?><tr>
            <td> <?php echo $row['0']->contract_no ?> </td>
            <td> <?php echo $row['0']->rwork_name ?> </td>
            <td> <?php echo $row['0']->rwork_type ?> </td>
            <td> <?php echo $row['0']->description ?> </td>
            <td> <?php echo $row['0']->start_date ?> </td>
            <td> <?php if($row['0']->end_date!='0000-00-00') echo $row['0']->end_date ?> </td>
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