

<div class="contentArea">
    <div class="contentBox">
    	<h1>User &raquo; List</h1>
		
        <div class="contentTable">
            <table class="tablesorter" id="homebanner_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Name</th>
                        <th width="15%">Email</th>
                        <th width="15%">Phone</th>
                        <th width="15%">Last Win</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; if($detail) foreach($detail as $list){?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td><?php echo $list['name'] ?></td>
                            <td><?php echo $list['email'] ?></td>
                            <td><?php echo $list['phone'] ?></td>
                            <td><?php echo $list['last_win'] ?></td>
                        </tr>
                    <?php $no++;}?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
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