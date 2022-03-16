<?php
declare(strict_types = 1);
namespace Typoheads\Formhandler\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Utility\DebugUtility;

/**
 * Display log entr values
 */
class FormhandlerLogParamsElement extends AbstractFormElement
{
    public function render()
    {
        // Custom TCA properties and other data can be found in $this->data, for example the above
        // parameters are available in $this->data['parameterArray']['fieldConf']['config']['parameters']
        $result = $this->initializeResultArray();
        $PA = $this->data['parameterArray'];
        $params = unserialize($PA['itemFormElValue']);

        $result['html'] =
            '<input
			readonly="readonly" style="display:none"
			name="' . $PA['itemFormElName'] . '"
			value="' . htmlspecialchars($PA['itemFormElValue']) . '"
			onchange="' . htmlspecialchars(implode('', $PA['fieldChangeFunc'])) . '"
			' . ($PA['onFocus'] ?? '') . '/>
		';
        $result['html'] .= DebugUtility::viewArray($params);
        return $result;
    }
}