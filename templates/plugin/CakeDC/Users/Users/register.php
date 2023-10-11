<?php
    use Cake\Core\Configure;
    $this->layout = 'auth';
?>
<div class="col-lg-5 col-md-7 bg-white">
    <div class="p-3">
        <div class="text-center">
            <img src="/backend/assets/images/big/icon.png" alt="wrapkit">
        </div>
        <h2 class="mt-3 text-center"><?= __('Sign Up for Free'); ?></h2>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null,['class' => 'mt-4']) ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('username', ['label' => ['text' => __('Login'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('email', ['label' => ['text' => __('Email'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('password', ['label' => ['text' => __('Password'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('password_confirm', ['required' => true, 'type' => 'password', 'label' => ['text' => __('Confirm password'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                    <?php
                        if (Configure::read('Users.Tos.required')) {
                            echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('cake_d_c/users', ' Accept TOS conditions?'), 'required' => true]);
                        }
                        if (Configure::read('Users.reCaptcha.registration')) {
                            echo $this->User->addReCaptcha();
                        }
                    ?>
                    </div>
                </div>
                
                <div class="col-lg-12 text-center">
                    <?= $this->Form->button(__d('cake_d_c/users', 'Sign Up'), ['class' => 'btn w-100 btn-dark']); ?>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <?php 
                        echo __("You have an account? ").$this->Html->link(__d('cake_d_c/users', 'Sign In'), ['action' => 'login'], ['class' => 'text-danger']);
                    ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>