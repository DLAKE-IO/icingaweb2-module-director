<?php

namespace Icinga\Module\Director\Forms;

use Icinga\Module\Director\Web\Form\DirectorObjectForm;
use Icinga\Module\Director\Objects\IcingaService;
use Icinga\Module\Director\Objects\IcingaHost;

class IcingaDictionaryMemberForm extends DirectorObjectForm
{
    /** @var IcingaObject */
    protected $object;

    private $succeeded;

    protected $object_class;

    /**
     * @throws \Zend_Form_Exception
     */
    public function setup()
    {
        $this->addHidden('object_type', 'object');
        $this->addElement('text', 'object_name', [
            'label'       => $this->translate('Name'),
            'required'    => !$this->object()->isApplyRule(),
            'description' => $this->translate(
                'Name for the instance you are going to create'
            )
        ]);
        $this->groupMainProperties()->setButtons();
    }

    public function setType($object_class) {
        $this->object_class = $object_class;
    }

    protected function isNew()
    {
        return $this->object === null;
    }

    protected function deleteObject($object)
    {
    }

    protected function getObjectClassname()
    {
	return $this->object_class;
    }

    public function succeeded()
    {
        return $this->succeeded;
    }

    public function onSuccess()
    {
        $this->succeeded = true;
    }
}
