<?php
namespace ControlPanel\View;

use Cake\View\View;
use Cake\Core\Configure;

class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $configure = Configure::read();
        $this->set('configure', $configure);

        $this->loadHelper('ControlPanel.Files');
        $this->loadHelper('ControlPanel.SmartHtml');
        $this->loadHelper('Form', [
            'errorClass' => 'form-control is-invalid',
            'templates'  => 'ControlPanel.app_form'
        ]);
        $this->loadHelper('Burzum/FileStorage.Image', [
            'pathPrefix' => DS . 'assets' . DS
        ]);
        $this->loadHelper('Meta.MetaForm');
    }
}
