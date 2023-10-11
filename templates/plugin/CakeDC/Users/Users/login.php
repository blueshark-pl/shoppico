<?php
    use Cake\Core\Configure;
    $this->layout = 'auth';
?>

<div class="col-lg-5 col-md-7 bg-white">
    <div class="p-3">
        <div class="text-center">
            <img src="/backend/assets/images/big/icon.png" alt="wrapkit">
        </div>
        <h2 class="mt-3 text-center"><?= __('Sign In'); ?></h2>
        <p class="text-center"><?= __('Enter your email address and password to access admin panel.'); ?></p>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null,['class' => 'mt-4']) ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('username', ['label' => ['text' => __('E-mail'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('password', ['label' => ['text' => __('Password'), 'class' => 'form-label text-dark'], 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                    <?php
                        if (Configure::read('Users.Email.required')) {
                            echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <?= $this->Form->button(__d('cake_d_c/users', 'Sign In'), ['class' => 'btn w-100 btn-dark']); ?>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <?php 
                        $registrationActive = Configure::read('Users.Registration.active');
                        if ($registrationActive) {
                            echo __("Don't have an account? ").$this->Html->link(__d('cake_d_c/users', 'Sign Up'), ['action' => 'register'], ['class' => 'text-danger']);
                        }
                    ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>