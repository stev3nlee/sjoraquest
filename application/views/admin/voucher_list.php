

<div class="contentArea">
    <div class="contentBox">
    	<h1>Voucher &raquo; List</h1>
		
        <div class="contentTable">
            <table class="tablesorter" id="homebanner_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">User Name</th>
                        <th width="15%">Voucher ID</th>
                        <th width="15%">Is Used</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; if($detail) foreach($detail as $list){?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td><?php echo $list['user_name'] ?></td>
                            <td><?php echo $list['voucher_unique_id'] ?></td>
                            <?php if($list['is_used'] == 0){ $used = 'No'; } else{ $used = 'Yes'; } ?>
                            <td><?php echo $used ?></td>
                        </tr>
                    <?php $no++;}?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
         </div>
      </div>
</div>