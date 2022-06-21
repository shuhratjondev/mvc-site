<?php

use shuhratjon\mvc\form\Form;

/* @var $this \shuhratjon\mvc\View */
/* @var $model \app\models\ContactForm */

$this->title = 'Contact';
?>
<h1><?= $this->title ?></h1>

<?php $form = Form::begin('', 'post') ?>

<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'email') ?>
<?= $form->textarea($model, 'body') ?>
<button type="submit" class="btn btn-primary">Send</button>

<?php $form::end(); ?>
