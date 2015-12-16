<?php echo $this->Html->script('../assets/plugins/ckeditor/ckeditor');?>
<!-- start: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li>
                <i class="clip-file"></i>
                <?php
                 echo $this->Html->link('Pages', array('controller' => 'cms', 'action' => 'about', 'admin' => true));
                ?>
            </li>
            <li class="active">Edit FAQ</li>
        </ol>
        <div class="page-header">
            <?php echo $this->Html->tag('h1','Edit FAQ'); ?>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<!-- end: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <div id="responseMessage"></div>
        <!-- start: FORM WIZARD PANEL -->
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $this->Form->create('Faq', array('url' => array('controller' => 'faqs', 'action' => 'edit', 'admin' => true), 'type'=>'post','class' => 'smart-wizard form-horizontal', 'id' => 'editQuestionForm','inputDefaults' => array('error' => false))); ?>
                <div id="wizard" class="swMain">
                    <div class="form-group">
                            <?php echo $this->Form->label('', 'Select Category'.$this->Html->tag('span', '', array('class' => 'symbol required', 'for' => 'categorylist')), array('class' => 'col-sm-3 control-label')); ?>
                        <div class="col-sm-5">
                            <?php 
                            echo $this->Form->select('Faqcategorie.category_id', $categoryList,
                                array(
                                        'label' => false, 
                                        'class' => 'form-control', 
                                        'id' => 'category',
                                        'required'=>false,
                                        'empty' => 'Select Category',
                                        'default'=>$categoryId));

                           
                            ?>                            
                        </div>
                    </div>   
                    <div class="form-group">
                            <?php echo $this->Form->label('', 'Question'.$this->Html->tag('span', '', array('class' => 'symbol required', 'for' => 'question')), array('class' => 'col-sm-3 control-label')); ?>
                        <div class="col-sm-7">

                            <?php echo $this->Form->input('Faq.question', array('label' => false, 'class' => 'form-control', 'id' => 'question', 'placeholder'=>'Question','autocomplete'=>'off','required'=>false));?>
                        </div>
                    </div>  

                    <div class="form-group">
                            <?php echo $this->Form->label('', 'Answer', array('class' => 'col-sm-3 control-label')); ?>
                        <div class="col-sm-7">
                            <?php  
                            echo $this->Form->textarea('Faq.answers', array('rows' => 5, 'label' => false, 'class' => 'ckeditor form-control', 'id' => 'page_content','style'=>"resize: none")); ?>
                        </div>
                    </div> 
					<?php echo $this->Form->hidden('id');?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>                            
                        <div class="col-sm-2">
                            <div class="input text"></div>
                        </div>
                        <label class="col-sm-1 control-label"></label>                            
                        <div class="col-sm-4">
                            <div class="input text pull-right">
                           <?php echo $this->Html->link($this->Form->button('<i class="fa fa-circle-arrow-left"></i>Cancel', array('type' => 'button', 'class' => 'btn btn-light-grey go-back')), array('controller' => 'faqs', 'action' => 'index', 'admin' => true), array('escape' => false)); 
                           echo '&nbsp';
                           ?>

                           <?php
                            echo $this->Form->button('Update <i class="fa fa-arrow-circle-right"></i>', array('type' => 'submit', 'class' => 'btn btn-bricky pull-right'));
                            ?>
                            </div>
                        </div>
                    </div>


                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- end: FORM WIZARD PANEL -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('page_content', {
            filebrowserUploadUrl : '<?php echo $this->webroot?>app/webroot/ckeditorupload/upload.php',
            filebrowserWindowWidth  : 800,
            filebrowserWindowHeight : 500
        });
        CKEDITOR.disableAutoInline = true;      
    });

</script>