<?php

use shuhratjon\mvc\form\Form;
use app\models\LoginForm;

/* @var $this \shuhratjon\mvc\View */
/* @var $model LoginForm */
$this->title = 'Login';

?>

    <h1><?= $this->title ?></h1>

<?php $form = Form::begin('', 'post'); ?>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php $form::end(); ?>