<?php $this->Paginator->options(array('update' => '.panel-body','evalScripts' => true)); ?>
<?php echo $this->Paginator->options(array('url' => array("perpage"=>$perpage,"search"=>$search,'sort'=> $this->Session->read('sort'),'direction'=> $this->Session->read('direction'))));
?>
<table id="sample-table-1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="center">S.No.</th>
                            <th><?php echo $this->Paginator->sort('Faqcategorie.category', 'Category'); ?></th>
                            <th><?php echo $this->Paginator->sort('Faqcategorie.question', 'Question'); ?></th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                        if (!empty($faqs)) {
                          //$statusUrl='admin/coupons/status/';
                          $deleteUrl='admin/faqs/delete/';
                            foreach ($faqs as $faq) {
                                $faqId=$faq['Faq']['id'];
                       ?>
                                <tr>
                                  <td class="center"><?php echo $counter;?></td>
                                  <td><?php echo $faq['Faqcategorie']['category_name']; ?></td>
                                    <td><?php echo $faq['Faq']['question']; ?></td>
                                    <td class="center">
                                   
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <?php
                                            $cur_date=date('Y-m-d');
                                            echo $this->Html->link('<i class="fa fa-edit"></i>', array('controller' => 'faqs', 'action' => 'admin_edit', $faq['Faq']['id']), array('class' => 'btn btn-xs btn-teal tooltips', 'data-original-title' => 'Edit', 'data-placement' => 'top', 'escape' => false));
                                            echo '&nbsp';
                                            echo $this->Html->link('<i class="fa fa-times fa fa-white"></i>', 'javascript:void(0)', 
                                                  array(
                                                        'class' => 'btn btn-xs btn-bricky tooltips delete',
                                                        'data-original-title' => 'Delete',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('".$deleteUrl."','".$faq['Faq']['id']."')",'escape' => false
                                                        ));
                                            ?>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <?php
                                                echo $this->Html->link('<i class="fa fa-cog"></i> <span class="caret"></span>', '#', array('data-toggle' => 'dropdown', 'class' => 'btn btn-primary dropdown-toggle btn-sm', 'escape' => false));

                                                $list = array(
                                                    $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'faqs', 'action' => 'admin_edit', $faq['Faq']['id']), array('tabindex' => '-1', 'role' => 'menuitem', 'escape' => false)),
                                                    $this->Html->link('<i class="fa fa-times fa fa-white"></i> Delete', '#', array(
                                                        'class' => 'btn btn-xs tooltips delete',
                                                        'data-original-title' => 'Delete',
                                                        'data-toggle' => 'modal',
                                                        'data-backdrop'=>'static',
                                                        'data-placement' => 'top',
                                                        'data-target' => '#popup',
                                                        'onclick'=>"popUp('".$deleteUrl."','".$faq['Faq']['id']."')",
                                                        'escape' => false,'style'=>"text-align:left"), false)
                                                );
                                                echo $this->Html->nestedList($list, array('class' => 'dropdown-menu pull-right', 'role' => 'menu'));
                                                ?>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                </tr>

                            <?php
                            $counter++;
                            }
                        }
                        else {
                            echo "<tr><td colspan='6' style='text-align:center'>No record found</td></tr>";
                        }
                       ?>
                    </tbody>
                </table>              
<?php 
if($this->Paginator->numbers()){ ?>
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