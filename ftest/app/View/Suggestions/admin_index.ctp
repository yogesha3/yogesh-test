<?php
/**
 * Advertisement listing page
 * @author Laxmi Saini
 */

$this->Paginator->options(array('update' => '.panel-body', 'evalScripts' => true )); 
?>
<!-- start: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li>
                <i class="clip-file"></i>
                <?php echo $this->Html->link('Suggestions', array('controller' => 'suggestions', 'action' => 'index', 'admin' => true));?>
            </li>
            <li class="active"><?php echo "Suggestion List";?></li>
            <li class="search-box">
            <form class="sidebar-search">
                <div class="form-group">
                    <input type="text" id="searching" name="search" placeholder="Start Searching...">
                </div>
                <?php
                    $this->Js->get('#searching');
                    $this->Js->event('keyup',
                    $this->Js->request(array(
                            'controller'=>'suggestions',
                            'action'=>'index'),
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
            <h1><?php echo "Suggestion List";?>
            <?php echo $this->Element('records_per_page');?>                       
            </h1>
        </div>
        <?php
            $this->Js->get('#perpage');
            $this->Js->event('change',
            $this->Js->request(array(
                    'controller'=>'suggestions',
                    'action'=>'index'),
                    array('async'=>true,
                          'update'=>'.panel-body',
                          'dataExpression'=>true,
                          /*'data' => $this->Js->serializeForm(array(
                                        'isForm' => true,
                                        'inline' => true
                                    )),*/
                            'data' => '$(\'#searching,#perpage\').serializeArray()',
                          'method'=>'post')
                 )
            );
        ?>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-body" >
                <table id="sample-table-1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="center">S.No.</th>
                            <th><?php echo $this->Paginator->sort('BusinessOwner.fname', 'Sender Name'); ?></th>
                            <th><?php echo $this->Paginator->sort('BusinessOwner.email', 'Sender E-mail'); ?></th>
                            <th><?php echo $this->Paginator->sort('Suggestion.created', 'Sent On'); ?></th>
                            <th><?php echo $this->Paginator->sort('BusinessOwner.group_id', 'Group Id'); ?></th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="AdvertisementContent">
                        <?php
                        $deleteUrl = 'admin/suggestions/delete/';
                        if (!empty($feedbacks)) {                            
                            foreach ($feedbacks as $feedback) {                                
                                $feedbackID = $feedback['Suggestion']['id'];
                                $createdDate = date('m-d-Y' , strtotime($feedback['Suggestion']['created']));
                                
                        ?>
                                <tr>
                                    <td class="center"><?php echo $counter;?></td>
                                    <td class="hidden-xs"><?php echo ucfirst($feedback['BusinessOwner']['fname']).' '.ucfirst($feedback['BusinessOwner']['lname']); ?></td>
                                    <td class="hidden-xs"><?php echo ucfirst($feedback['BusinessOwner']['email']); ?></td>
                                    <td class="hidden-xs"><?php echo (!empty($createdDate))? $createdDate:'-'; ?></td>
                                    <td class="hidden-xs"><?php echo $feedback['BusinessOwner']['group_id']; ?></td>
                                    
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <?php
                                            echo $this->Html->link('<i class="clip-search"></i>', 'javascript:void(0)',
                                                    array(
                                                            'class' => 'btn btn-xs btn-teal tooltips view_suggestion',
                                                            'data-original-title' => 'View',
                                                            'data-toggle' => 'modal',
                                                            'data-backdrop'=>'static',
                                                            'data-placement' => 'top',
                                                            'data-id'=>$feedbackID,
                                                            'data-target' => '#popup',
                                                            'onclick'=>"popUp('admin/suggestions/view','".$feedbackID."')",'escape' => false
                                                    ));
                                            echo '&nbsp;';
                                            echo $this->Html->link('<i class="fa fa-times fa fa-white"></i>', 'javascript:void(0)', 
                                                  array(
                                                        'class' => 'btn btn-xs btn-bricky tooltips delete',
                                                        'data-original-title' => 'Delete',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('admin/suggestions/delete','".$feedbackID."')",'escape' => false
                                                        ));
                                            ?>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <?php
                                                echo $this->Html->link('<i class="fa fa-cog"></i> <span class="caret"></span>', '#', array('data-toggle' => 'dropdown', 'class' => 'btn btn-primary dropdown-toggle btn-sm', 'escape' => false, ));

                                                $list = array(
                                                    $this->Html->link('<i class="clip-search-2"></i> View', 'javascript:void(0)', array('tabindex' => '-1', 'role' => 'menuitem','data-toggle' => 'modal', 'escape' => false,'data-backdrop'=>'static', 'data-placement' => 'top', 'data-target' => '#popup','onclick'=>"popUp('admin/suggestions/view','".$feedbackID."')")),
                                                    $this->Html->link('<i class="fa fa-times fa fa-white"></i> Delete', '#', array(
                                                        'class' => 'btn btn-xs  tooltips deleteAdvertisement',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('admin/suggestions/delete','".$feedbackID."')",
                                                        'escape' => false,
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
                        } else {
                            echo "<tr><td colspan='5' style='text-align:center'>No record found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php if ($this->Paginator->numbers()) { ?>
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
            <?php }
            echo $this->Js->writeBuffer(); 
            ?>
            </div>
        </div>
        <!-- end: BASIC TABLE PANEL -->
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function() {
        $('body').on('click','.popup_btn',function(){
                $(this).css('pointer-events','none');
            });
        
    });
    
</script>
