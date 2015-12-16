Dear <?php echo $name;?>, <br/><br/>

Admin have updated the limit of shared referrals for the membership levels. <br/>
The new values to unlock the next membership level are as follows - <br/><br/>
Bronze Member - Upto '<?php echo $membershipData[0]['Membership']['upper_limit'];?>' sent referrals <br/>
Silver Member - Between '<?php echo $membershipData[1]['Membership']['lower_limit'];?>-<?php echo $membershipData[1]['Membership']['upper_limit'];?>' sent referrals<br/> 
Gold Member - Between '<?php echo $membershipData[2]['Membership']['lower_limit'];?>-<?php echo $membershipData[2]['Membership']['upper_limit'];?>' sent referrals <br/>
Platinum Member - Above '<?php echo $membershipData[2]['Membership']['upper_limit'];?>' sent referrals<br/>

<br/>
<br/>
Thanks,<br/>
Foxhopr Team