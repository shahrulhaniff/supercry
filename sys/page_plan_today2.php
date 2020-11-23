 
            <table>
                <?php 
				$data5 = mysqli_query($conn,"SELECT * FROM newsfeed ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
				while($info5 = mysqli_fetch_array( $data5 )) { 
				$title = $info5['title'];
				$news = $info5['news'];
				//$pastdate = $info5['created_date'];
				//$pastdate = strtotime('d/m/Y', $pastdate);
				//$pastdate = date("d/m/Y", strtotime($pastdate));
				?>
                    <tr>
                        <td><strong><font color="black"><?=$title?></font></strong></td>
                    </tr>
                    <tr>
                        <td><?=$news?></td>
                    </tr>
				<?php } ?>
            </table>