<?php

/**
 * SwitchToggleJD.php
 *
 * @author "Jose Daniel Stilomio" Stilomio <shop.velasquez@gmail.com>
 * @copyright 2014 Jose Velasquez
 * @package SwitchToggleJD
 * @version 1.0
 */
class SwitchToggleJD extends CWidget {
    /*
     * Variable que define Estatus del Swichet 
     * Posibles Valores: TRUE o FALSE
     */

    public $coloron;

    /* Estatus (TRUE o FALSE) */
    public $state = FALSE;

    /* Id del Checkbox */
    public $id = NULL;

    /* Modelo de la Tabla (Es opcional para usar el widget sin modelos) */
    public $model = NULL;

    /* Nombre del Atributo */
    public $attribute;

    /* Agregar Opciones HTML al CheckBox */
    public $htmlOptions = array();

    /* Clase Principal del CheckBox */
    public $classMain = 'cmn-toggle cmn-toggle-round';

    /* Class CSS para los Items */
    public $classitem = 'itembox';

    /* Class CSS para el Select ALL */
    public $classall = 'allbox';

    /* Opciones (item o selectall) */
    public $type = 'item';


    /* Opcion que Permite generar un Select All de los Checkbox */
    public $SelectAll;

    public function init() {

        if ($this->id == NULL) {
            $this->id = $this->attribute;
        }
        self::registerFile();

        echo self::Labels();
    }

    /*
     * Function que organiza y genera el CheckBox con los Atributos correspondientes
     */

    public function LabelCheckBox() {

        if ($this->model != NULL) {
            $check = CHtml::activeCheckBox($this->model, $this->attribute, $this->htmlOptions());
        } else {
            $check = CHtml::checkBox($this->attribute, $this->state, $this->htmlOptions());
        }
        return $check;
    }

    public function htmlOptions() {

        if (count($this->htmlOptions) > 0) {

            $htmlOptions = $this->htmlOptions;

            if (isset($htmlOptions['class'])) {
                $htmlOptions['class'] = $htmlOptions['class'] . ' ' . $this->classMain;
            } else {
                $htmlOptions['class'] = $this->classMain;
            }

            if (isset($htmlOptions['id'])) {
                $this->id = $htmlOptions['id'];
            } else {
                $htmlOptions['id'] = $this->id;
            }
        } else {
            $htmlOptions = array('class' => $this->classMain, 'id' => $this->id);
        }

        $htmlOptions = $this->Type($htmlOptions);

        return $htmlOptions;
    }

    private function Labels() {

        $data = '<div class="switch">';
        $data .= $this->LabelCheckBox();
        $data .= '<label for="' . $this->id . '">';
        $data .= '</label>';
        $data .= '</div>';
        return $data;
    }

    private function registerFile() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);

        if (is_dir($assets)) {
            Yii::app()->clientScript->registerCssFile($baseUrl . '/SwitchToggleJD.css');
        } else {
            throw new Exception(Yii::t('Switch Toggle JD - Error: Couldn\'t find assets folder to publish.'));
        }
    }

    public function Type($htmlOptions) {

        if ($this->type == 'item') {
            $htmlOptions['class'] = $htmlOptions['class'] . " itembox";
        } elseif ($this->type == 'selectall') {
            $htmlOptions['class'] = $htmlOptions['class'] . " allbox";

            Yii::app()->getClientScript()->registerCoreScript('jquery');

            /* Class de los checkbox Items */
            $classitem = $this->classitem;
            /* Class CSS Select ALL */
            $classall = $this->classall;

            /* JS de Select ALL de Checkbox */
            Yii::app()->clientScript->registerScript('SelectAllCheckbox', "
                jQuery(function($) {
                $('.{$classall}').click(function() {
                    if ($('.{$classall}').is(':checked')) {
                        var checkboxes = $(this).closest('form').find('.{$classitem}');
                        checkboxes.attr('checked', 'checked');
                    }
                    else {
                        var checkboxes = $(this).closest('form').find('.{$classitem}');
                        checkboxes.removeAttr('checked');
                    }
                });
            });          
            ");
        } else {
            throw new Exception('Error en Type debes seleccionar "item" o "selectall"');
        }

        return $htmlOptions;
    }

}
