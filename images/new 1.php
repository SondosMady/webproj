for ($i=0; $i<($maxday+$startday); $i++) 
                        {

                            $query = "SELECT * from events order by date desc limit 3;
                            $q = mysql_query($query);
                            $rs=mysql_fetch_array($q);

                            if(($i % 7) == 0 ) echo "<tr >";
                            if($i < $startday) echo "<td style='border:3px solid #fff;background-color:#fff'></td>";
                            else 
                                if($i <= $maxday+$startday)
                                        {
                                            echo "<td align='center' valign='middle' height='83px' style='border:3px solid #fff;background-color:#d9d9d9' ><span style='float:right;font-weight:bold'>" .($i - $startday + 1) ."</span><br><textarea name=''  maxlength='50' style='width:108px; height:50px; resize:none;'>";
                                            echo $rs['cal_event']; 
                                            echo "</textarea></td>";  



                                        }
                            if(($i % 7) == 6 ) echo "</tr>";
                        }