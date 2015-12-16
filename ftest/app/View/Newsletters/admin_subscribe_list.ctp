<?php 
   $this->Paginator->options(array(
      'update' => '.panel-body',
      'evalScripts' => true
   )); 
?>
<!-- start: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li>
                <i class="clip-file"></i>
                <?php echo $this->Html->link('Newsletters', array('controller' => 'newsletters', 'action' => 'index', 'admin' => true));?>
            </li>
            <li class="active"><?php echo "Subscriber List";?></li>
            <li class="search-box">
            <form class="sidebar-search">
                <div class="form-group">
                    <input type="text" id="searching" name="search" placeholder="Start Searching...">
                </div>
                <?php
                    $this->Js->get('#searching');
                    $this->Js->event('keyup',
                    $this->Js->request(array(
                            'controller'=>'newsletters',
                            'action'=>'subscribeList'),
                            array('async'=>true,
                                  'update'=>'.panel-body',
                                  'dataExpression'=>true,
                                  'data' => '$(\'#searching,#perpage\').serializeArray()',
                                  'method'=>'post')
                         )
                    );
                ?>

            </form>
            </li>
        </ol>
        <div class="page-header">
            <h1><?php echo "Subscriber List";?>
                <?php echo $this->Element('records_per_page');?>     
            </h1>
        </div>
        <?php
            $this->Js->get('#perpage');
            $this->Js->event('change',
            $this->Js->request(array(
                    'controller'=>'newsletters',
                    'action'=>'subscribeList'),
                    array('async'=>true,
                          'update'=>'.panel-body',
                          'dataExpression'=>true,                          
                          'data' => '$(\'#searching,#perpage\').serializeArray()',
                          'method'=>'post')
                 )
            );
        ?>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<div class="row">
	<div align="right" class="col-md-12"><?php echo $this->Html->link(
    '<i class="clip-folder-download">&nbsp;</i>Download Subscribers List',
    array(
        'controller' => 'newsletters',
        'action' => 'exportSubscribeEmails',
        'full_base' => true
    ), array('escape' => false,'style'=>'font-weight: bold;'));?></div>
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-body" >
                <table id="sample-table-1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="center">S.No.</th>
                            <th><?php echo $this->Paginator->sort('subscribe_email_id', 'Subscribe Email'); ?></th>
                            <th><?php echo $this->Paginator->sort('is_registered', 'Type'); ?></th>
                            <th><?php echo $this->Paginator->sort('created', 'Added On'); ?></th>
                            <th><?php echo $this->Paginator->sort('is_active', 'Status'); ?></th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="professionContent">
                        <?php
                        $deleteUrl = 'admin/newsletters/subscriptionDelete/';  
                        if (!empty($subscribers)) {                            
                            foreach ($subscribers as $subscribe) {
                                $subscriberId 		= $subscribe['NewsletterSubscribe']['id'];
                                $timestampForCreate = strtotime($subscribe['NewsletterSubscribe']['created']);
                                $createdDate      	= date('m-d-Y' , $timestampForCreate);    
                                $active				= (($subscribe['NewsletterSubscribe']['is_active'])==1) ? "Active" : "Inactive";
                                $register			= (($subscribe['NewsletterSubscribe']['is_registered'])==1) ? "Registered" : "Guest";
                                ?>
                                <tr>
                                    <td class="center"><?php echo $counter;?></td>
                                    <td class="hidden-xs"><?php echo ucfirst($subscribe['NewsletterSubscribe']['subscribe_email_id']); ?></td>
                                    <td><?php echo $register;?></td>
                                    <td><?php echo $createdDate;?></td> 
                                    <td><?php echo $active;?></td>                                 
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <?php
                                            echo $this->Html->link('<i class="fa fa-times fa fa-white"></i>', 'javascript:void(0)', 
                                                  array(
                                                        'class' => 'btn btn-xs btn-bricky tooltips delete',
                                                        'data-original-title' => 'Delete',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('".$deleteUrl."','".$subscriberId."')",'escape' => false
                                                        ));
                                            ?>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <?php
                                                echo $this->Html->link('<i class="fa fa-cog"></i> <span class="caret"></span>', '#', array('data-toggle' => 'dropdown', 'class' => 'btn btn-primary dropdown-toggle btn-sm', 'escape' => false));

                                                $list = array(
                                                    $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'newsletters', 'action' => 'admin_edit', $subscriberId), array('tabindex' => '-1', 'role' => 'menuitem', 'escape' => false)),
                                                    $this->Html->link('<i class="fa fa-times fa fa-white"></i> Delete', '#', array(
                                                        'class' => 'btn btn-xs  tooltips deletesubscriber',
                                                        'data-original-title' => 'Delete',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('".$deleteUrl."','".$subscriberId."')",'escape' => false,
                                                        'style'=>"text-align:left"), false)
                                                );
                                                echo $this->Html->nestedList($list, array('class' => 'dropdown-menu pull-right', 'role' => 'menu'));
                                                ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                $counter++;
                            }
                        }else{
                            echo "<tr><td colspan='6' style='text-align:center'>No record found</td></tr>";
//                            echo "<tr><td colspan='5' style='text-align:center'>No profession has been added yet. Please add a profession</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php   
     if($this->Paginator->numbers()){
    ?>

    <div class="paging" style="float:right;">
        <ul class="pagination" style="margin:0px;">
            <li>
              <?php echo $this->Paginator->prev(__('Previous',true)); ?>      
          </li>
          <li>
              <?php echo $this->Paginator->numbers(array('separator'=>false)); ?>      
          </li>
          <li>
             <?php echo $this->Paginator->next(__('Next',true)); ?>
          </li>
        </ul>
    </div>
                <?php } ?>
    <?php echo $this->Js->writeBuffer(); ?>
            </div>
        </div>
        <!-- end: BASIC TABLE PANEL -->
    </div>
</div>

<script type="text/javascript">
    var disableFor='';
    $(document).ready(function() {        
        $(".deletesubscriber").on("click", function() {
            var action = $(this).attr('data-action');
            disableFor=$(this).attr('data-id');
            $("form").attr('action', action);
        });
        $('.closeModel').click(function(){
          $("#"+disableFor).tooltip('disable');
        });
        $('.deletesubscriber').hover(function(){
            $('.deletesubscriber').tooltip('enable');
        });
        $('#deleteConfirmation').on('hide.bs.modal', function (e) {
           $("#"+disableFor).tooltip('disable');  
        });
    });
</script>
