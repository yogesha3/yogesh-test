<style> .next { display:none;}</style>
<?php $actionUrl = 'groups/popupFunction'; ?>
<div class="inner_pages_heading" style="background:#fff; border:0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="intro-text"> </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<section id="inner_pages_top_gap">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="become_head"> <span>BECOME A</span> FOXHOPR</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="select_group">
          <div class="select_tab">1</div>
          <div class="tab_border"></div>
          <div class="tab_active">2</div>
          <div class="clearfix"></div>
          <div class="sign_up_text">SIGN UP</div>
          <div class="group_select_text">GROUP SELECTION</div>
        </div>
      </div>
    </div>
    <div class="row location_search_margin_top">
      <div class="col-md-8 ">
        <div class="search-location">
          <div class="lixia_head">Hi <?php echo $userdata['BusinessOwners']['fname'];?>! <span>Time to select your team.</span></div>
        </div>
      </div>
      <!-- <div class="col-md-4 ">
        <div class="search-location">
          <div class="search-by-location">SEARCH BY LOCATION</div>
          <div id="imaginary_container">
            <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                <button type="submit"> <span class="glyphicon glyphicon-search" style="color:#8e8e8e"></span> </button>
              </span> </div>
            </div>
          </div>
        </div> -->
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div class="row ">
      <input type="hidden" class="ajaxSet">
    <div class="col-md-2 ">
      <div class="left_group">
        <div class="left_section_heading">I am looking for</div>
        <div class="checkbox">
          <label class="padd-left0">
          <input type="radio" onclick="changeView(this.value);setAjaxStatus(this.name,this.value);" name="group" value="local" checked="checked" class="pull-left groupfilter"  > &nbsp; 
            Local Group 
          </label>
        </div>
        <div class="checkbox">
          <label class="padd-left0">
            <input type="radio" onclick="changeView(this.value);setAjaxStatus(this.name,this.value);" name="group" value="global" class="pull-left groupfilter">&nbsp;Global Group 
          </label>
        </div>
      </div>
          <div class="left_group forlocal">
            <div class="left_section_heading">Show groups within</div>
            <div class="checkbox">
              <select class="form-control milesfilter" name="milesfilter" onchange="setAjaxStatus();">
                <option value="5">5 miles </option>
                <option value="10">10 miles</option>
                <option value="25">25 miles</option>
                <option value="50">50 miles</option>
              </select>
            </div>
            <div class="checkbox">
              <?php 
              $city = $userdata['BusinessOwners']['city'] != '' ? $userdata['BusinessOwners']['city'] : 'City';
              ?>
              <input type="text" disabled="disabled" class="form-control left_zipcode" name="city" value="<?php echo $city;?>">
            </div>
            <div class="left_section_or">or</div>
            <div class="checkbox">
              <input type="text" disabled="disabled" value="<?php echo $userdata['BusinessOwners']['zipcode'];?>" placeholder="Zip Code" class="form-control left_zipcode" id="exampleInputEmail1">
            </div>
          </div>
          <div class="left_group forglobal disable">
            <div class="left_section_heading">Search By Location</div>
            <div class="checkbox">
              <input type="text" onkeypress="setAjaxStatus();"  placeholder="Location" class="form-control left_zipcode searchbylocation" name="searchbylocation">
            </div>
          </div>
          <div class="left_group">
            <div class="narrow_search">NARROW YOUR SEARCH</div>
          </div>
          <div class="left_group">
            <div class="left_section_heading">By Meeting Days</div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Monday"> Monday</label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Tuesday">Tuesday</label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Wednesday"> Wednesday</label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Thursday"> Thursday</label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Friday"> Friday </label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Saturday"> Saturday</label></div>
              <div class="checkbox"><label><input onclick="setAjaxStatus();" name="day[]" class="day" type="checkbox" value="Sunday"> Sunday</label></div>
          </div>
          <div class="left_group">
            <div class="left_section_heading">By Meeting Time</div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="00:00 - 3:59" type="checkbox"> 12:00 AM - 04:00 AM</label>
              </div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="04:00 - 07:59" type="checkbox"> 04:00 AM - 08:00 AM</label>
              </div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="08:00 - 11:59" type="checkbox"> 08:00 AM - 12:00 PM</label>
              </div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="12:00 - 15:59" type="checkbox"> 12:00 PM - 04:00 PM</label>
              </div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="16:00 - 19:59" type="checkbox"> 04:00 PM - 08:00 PM</label>
              </div>
              <div class="checkbox">
                <label><input name="time[]" onclick="setAjaxStatus();" class="time" value="20:00 - 23:59" type="checkbox"> 08:00 PM - 12:00 AM</label>
              </div>
          </div>
          <div class="left_group">
            <div class="left_section_heading">Sort By</div>
            <div class="checkbox">
              <label class="padd-left0">
              <input type="radio" onclick="setAjaxStatus();" name="sorting" value="total_member"  class="pull-left sorting" >&nbsp;
                Most Members 
              </label>
            </div>
            <div class="checkbox">
              <label class="padd-left0">
                <input type="radio" onclick="setAjaxStatus();" name="sorting" value="created"  class="pull-left sorting">&nbsp;
                Newest 
              </label>
            </div>
          </div>
        </div>
            <?php
            $this->Js->get('.groupfilter,.milesfilter,.day,.time,.sorting,.searchbylocation');
            $this->Js->event('change',
              $this->Js->request(array(
                'controller'=>'Groups',
                'action'=>'groupSelection'),
                 array('async'=>true,
                  'update'=>'.ajaxLoading',
                  'dataExpression'=>true,
                  'data' => '$(\'.groupfilter,.milesfilter,.day,.time,.sorting,.searchbylocation\').serializeArray()',
                  'method'=>'post',
                  )
              )
              );
            ?>
            <?php
            $this->Js->get('.searchbylocation');
            $this->Js->event('keyup',
              $this->Js->request(array(
                'controller'=>'Groups',
                'action'=>'groupSelection'),
                 array('async'=>true,
                  'update'=>'.ajaxLoading',
                  'dataExpression'=>true,
                  'data' => '$(\'.groupfilter,.searchbylocation,.milesfilter,.day,.time\').serializeArray()',
                  'method'=>'post',
                  )
              )
              );
            ?>
            <div class="col-md-10 ">
              <div class="clearfix"></div>
              <div class="ajaxLoading">
              <div class="time_table">
              <?php if($count > 0) { ?>
              <?php 
              $i = 1;
              foreach($groupData as $group) : ?>
              <?php $groupId = $group['Group']['id']; ?>
               <!-- Start Here -->             
                <div class="col-md-3 col-sm-4">
                  <div id="ul1" class="pic time_box ">
                    <div class="city_name"><?php echo $group['Group']['stateName'];?> <br>
                      <span><?php echo $group['Group']['countryName'];?></span></div>
                      <div class="day_name"><?php echo date('l',strtotime($group['Group']['meetingDate']));?></div>
                      <div class="day_time"> <?php echo date('h:i A',strtotime($group['Group']['meetingTime']));?></div>
                      <div class="rating_icon"> 
                        <?php 
                        for($j = 0; $j < 20;$j++) {
                          if($j % 10 == 0){
                            echo '<div class="clearfix"></div>';
                          }
                          if($j < $group['Group']['members']) {
                              echo '<i class="fa fa-user icon_yellow"></i> ';
                          } else {
                              echo '<i class="fa fa-user "></i> ';
                          }
                        }
                        ?>      

                      </div>
                        <div class="group_code"> <?php echo Configure::read('GROUP_PREFIX').' '.$this->Encryption->decode($group['Group']['id']);?></div>
                       <!--  <a href="#" class="pic-caption bottom-to-top" onclick="javascript: return confirm('Do you want to join the group?');">
                          <h1 class="pic-title">Enter</h1>
                        </a> -->
                        <a class="pic-caption bottom-to-top" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" onclick="popUp('<?php echo $actionUrl;?>', '<?php echo $groupId; ?>','<?php echo 'groups'; ?>', '<?php echo 'selectGroup'; ?>', '<?php echo $this->Session->read('UID'); ?>')" escape = false><h1 class="pic-title">Enter</h1></a>
                        <?php 
                        //echo $this->Form->postLink('<h1 class="pic-title">Enter</h1>', 
                        //  array('action' => 'selectGroup',$group['Group']['id'] ,$this->Session->read('UID')),
                        //  array('escape'=>false, 'confirm' => __('Do you nt to join the group?'),'class' => 'pic-caption bottom-to-top')); 
                        ?>
                        <?php 
                        if($group['Group']['groupType'] == 'local') {
                          echo $this->Html->image('local.png',array('alt'=> '','class'=>'local'));
                        } else {
                          echo $this->Html->image('global.png',array('alt'=> '','class'=>'local'));
                        }
                        ?>
                    </div>
                </div>
                <!-- Start Here -->          
                <?php 
                if ($i % 4 == 0 && $i != $count) {
                  ?>
                  <div class="clearfix clearfix_margin"></div> 
                  </div>
                  <div class="time_table">
                  <?php
                }
                ?>                
              <!--Ends Here -->
              <?php $i++; endforeach; ?>
              <div class="clearfix clearfix_margin"></div>
              </div>
              </div>
              <div class="col-md-10 text-center"><?php  echo $this->Paginator->next();?></div>
              
              <?php } else { ?>
              </div>
                <div class="time_table2">
                    <h1>Doesn't find the suitable group? Click to create a new group! <?php echo $this->Html->link('Create New Group','/groups/createGroup',array('class' => ''));?></h1>
                </div>
                
             <?php }  ?>
            <?php echo $this->Html->script('Front/all'); ?>
</section>
<script>
  $(function(){
    var count = '<?php echo $count;?>';
    var checkClassLength = $('.time_table').length;
    if(checkClassLength == 1 && count == 0) {
      $('.time_table').last().hide();
    }
  
  var $container = $('.ajaxLoading');

  $container.infinitescroll({
    navSelector  : '.next',    // selector for the paged navigation 
    nextSelector : '.next a',  // selector for the NEXT link (to page 2)
    itemSelector : '.time_table',     // selector for all items you'll retrieve
    debug     : false,
    dataType    : 'html',
    //path : ["group-selection/page:","/milesfilter:"+$('.milesfilter').val()+"/"],
    //path : ["group-selection/page:","/group:global/"],
    loading: {
      finishedMsg: 'Thats all folks !!',
      //img: '<?php echo $this->webroot; ?>img/spinner.gif'
    }
    }
  );

	/*if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
                window.location='group-selection';
                return false;
            }
          }
        });

        window.history.pushState('forward', null, './group-selection');
      }*/
  });

  function changeView(category) 
  {
    if(category == 'local') {
      $('.forlocal').removeClass('disable');
      $('.forglobal').addClass('disable');
    } 
    if(category == 'global') {
      $('.forglobal').removeClass('disable');
      $('.forlocal').addClass('disable');
    }
  }
  function setAjaxStatus(name,value)
  {
     var $container = $('.ajaxLoading');
    $container.infinitescroll('destroy');
    $container.data('infinitescroll', null);
    $container.infinitescroll({                      
      state: {                                              
        isDestroyed: false,
        isDone: false                           
      }
    });
     $container.infinitescroll({
    navSelector  : '.next',    // selector for the paged navigation 
    nextSelector : '.next a',  // selector for the NEXT link (to page 2)
    itemSelector : '.time_table',     // selector for all items you'll retrieve
    debug     : false,
    dataType    : 'html',
    loading: {
      finishedMsg: 'Thats all folks !!',
      //img: '<?php echo $this->webroot; ?>img/spinner.gif'
    }
    });
  }

</script>

