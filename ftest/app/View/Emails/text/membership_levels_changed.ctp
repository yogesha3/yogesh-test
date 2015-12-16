Dear <?php echo $name;?>,

Admin have updated the limit of shared referrals for the membership levels.
The new values to unlock the next membership level are as follows -

Bronze Member - Upto '<?php echo $membershipData[0]['Membership']['upper_limit'];?>' sent referrals
Silver Member - Between '<?php echo $membershipData[1]['Membership']['lower_limit'];?>-<?php echo $membershipData[1]['Membership']['upper_limit'];?>' sent referrals 
Gold Member - Between '<?php echo $membershipData[2]['Membership']['lower_limit'];?>-<?php echo $membershipData[2]['Membership']['upper_limit'];?>' sent referrals
Platinum Member - Above '<?php echo $membershipData[2]['Membership']['upper_limit'];?>' sent referrals


Thanks,
Foxhopr Team