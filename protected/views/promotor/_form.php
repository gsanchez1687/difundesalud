<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <blockquote class="titulo">
            <h1 class="robotothin">Regístrate Promotor</h1>
            <small><cite title="Source Title">Regístrate como promotor para DifundeSalud</cite></small>
        </blockquote>

        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array('id' => 'promotor-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'),)); ?>


            <div class="row">                
                <?php echo $form->labelEx($model, 'promotor_type_id'); ?>
                <?php echo $form->dropDownList($model, 'promotor_type_id', PromotorTypes::getListPromotorType(), array('prompt' => 'Seleccione', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'promotor_type_id'); ?>                
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

            <div class="row">                
                <?php echo $form->labelEx($model, 'state_id'); ?>
                <?php
                echo $form->dropDownList($model, 'state_id', States::getListStates(), array('prompt' => 'Seleccione',
                    'class' => 'form-control',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listmunicipalities'),
                        'update' => '#' . CHtml::activeId($model, 'municipality_id'),
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'state_id'); ?>              
            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'municipality_id'); ?>

                <?php
                echo $form->dropDownList($model, 'municipality_id', Municipalities::getListMunicipalities($model->state_id), array('prompt' => 'Seleccione',
                    'class' => 'form-control',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listparishes'),
                        'update' => '#' . CHtml::activeId($model, 'parishe_id'),
                    ),));
                ?>
                <?php echo $form->error($model, 'municipality_id'); ?>

            </div>

            <div class="row">

                <?php echo $form->labelEx($model, 'parishe_id'); ?>
                <?php echo $form->dropDownList($model, 'parishe_id', Parishes::getListParishes($model->municipality_id), array('prompt' => 'Seleccione', 'class' => 'form-control',)); ?>
                <?php echo $form->error($model, 'parishe_id'); ?>
            </div>

            <div class="row">               
                <?php echo $form->labelEx($model, 'address'); ?>
                <?php echo $form->textArea($model, 'address', array('rows' => 1, 'class' => 'form-control',)); ?>
                <?php echo $form->error($model, 'address'); ?>

            </div>


            <div class="row">               
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>                
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <label>Telefono Oficina</label>
                </div>
                <div class="col-xs-12 col-sm-8">

                    <div class="row">                       

                        <div class="col-xs-4">

                            <?php echo $form->textField($model, 'code_phone_office', array('size' => 4, 'maxlength' => 4, 'class' => '')); ?>

                        </div>

                        <div class="col-xs-8">

                            <?php echo $form->textField($model, 'number_phone_office', array('size' => 7, 'maxlength' => 7)); ?>

                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">

                            <?php echo $form->error($model, 'code_phone_office'); ?>
                            <?php echo $form->error($model, 'number_phone_office'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <label>Telefono personal</label>
                </div>
                <div class="col-xs-12 col-sm-8">

                    <div class="row">                       

                        <div class="col-xs-4">                            
                            <?php echo $form->textField($model, 'code_phone_personal', array('size' => 4, 'maxlength' => 4)); ?>

                        </div>

                        <div class="col-xs-8">                            
                            <?php echo $form->textField($model, 'number_phone_personal', array('size' => 7, 'maxlength' => 7)); ?>                            
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">

                            <?php echo $form->error($model, 'code_phone_personal'); ?>
                            <?php echo $form->error($model, 'number_phone_personal'); ?>
                        </div>
                    </div> 
                </div>
            </div>

            <br /><br />

            <div class="row">
                <div class="col-xs-12">
                    <label>Anexar documentos de acreditacion en caso de ser necesarios</label>
                    <p>Formatos Permitidos: .jpg .doc .docx .pdf</p>

                    <?php
                    $this->widget('CMultiFileUpload', array(
                        'model' => $model,
                        'attribute' => 'files',
                        'accept' => 'jpg|doc|docx|pdf',
                        'options' => array(
                        // 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
                        // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
                        // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
                        // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
                        // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
                        // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
                        ),
                        'denied' => 'Formato de archivo no permitido',
                        'max' => 3, // max 10 files
                    ));
                    ?>
                </div>
            </div>
            <br />
            <div class="btn-group">
                <?php echo CHtml::Button(Yii::app()->params['cancel-text'], array('class' => Yii::app()->params['cancel-btn'], 'onclick' => 'history.back(-1)')); ?>	
                <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
            </div>
            <?php $this->endWidget(); ?>

        </div>

    </div>

</div>