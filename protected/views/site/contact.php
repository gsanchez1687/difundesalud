<div class="row">
    <div class="col-md-4">

            <div class="form ">
                <blockquote class="titulo">
                      <h3 class="robotothin"><?php echo Yii::t("app", "Contáctanos"); ?></h3>
                    <small>Complete todos los campos</small>
                </blockquote>              
                
                
                <?php if (Yii::app()->user->hasFlash('contact')): ?>
                    <div class="flash-success">
                        <?php echo Yii::app()->user->getFlash('contact'); ?>
                    </div>
                <?php else: ?>

                <?php $form = $this->beginWidget('CActiveForm', array('id' => 'contact-form','enableClientValidation' => true,'clientOptions' => array('validateOnSubmit' => true))); ?>

                    <?php echo $form->errorSummary($model); ?>

                <div class="row">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array("class" => "form-control")); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array("class" => "form-control")); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'subject'); ?>
                    <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, "class" => "form-control")); ?>
                    <?php echo $form->error($model, 'subject'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'body'); ?>
                    <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50, "class" => "form-control")); ?>
                    <?php echo $form->error($model, 'body'); ?>
                </div>



                <div class="btn-group">
                  <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
                  <?php echo CHtml::submitButton(Yii::app()->params['save-text'],array('class'=>Yii::app()->params['save-btn'])); ?>
                </div>

    <?php $this->endWidget(); ?>

            </div><!-- form -->

<?php endif; ?>

    </div>
    <div class="col-md-8">
        <div class="jumbotron">
            <p>Llamanos y conviertete en nuestro promotor Certificado <i class="fa fa-star"></i><i class="fa fa-star"></i></p>
            <p><i class="fa fa-whatsapp"></i> +5804264061970</p>
          
        </div>
    </div>
</div>