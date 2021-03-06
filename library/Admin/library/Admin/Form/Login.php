<?php

class Admin_Form_Login extends CM_Form_Abstract {

    protected function _initialize() {
        $this->registerField(new CM_FormField_Email(['name' => 'email']));
        $this->registerField(new CM_FormField_Password(['name' => 'password']));

        $this->registerAction(new Admin_FormAction_Login_Process($this));
    }
}
