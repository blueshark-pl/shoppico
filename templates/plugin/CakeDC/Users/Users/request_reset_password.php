<?php
    use Cake\Core\Configure;
    $this->layout = 'login';
?>
<!--begin::Form-->
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create($user, ['class' => 'form w-100']) ?>
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <div class="quotation-wrap">
            <h1><span>Logowanie</span> </h1>
        </div>
    </div>
    <!--begin::Heading-->
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
        <!--end::Label-->
        <!--begin::Input-->
        <?= $this->Form->control('reference', ['label' => false, 'class' => 'form-control form-control-lg form-control-solid']) ?>
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center">
        <!--begin::Submit button-->
        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
            <span class="indicator-label">Przypomnij hasło</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Submit button-->
    </div>
    <!--end::Actions-->
<?= $this->Form->end() ?>
<!--end::Form-->