<?php
/*************************************************************************************/
/*      This file is part of the module ProductRegistration                          */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ProductRegistration\Form;

use ProductRegistration\Model\ProductRegistrationQuery;
use Symfony\Component\Validator\Constraints;
use ProductRegistration\ProductRegistration;
use Symfony\Component\Validator\ExecutionContextInterface;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

/**
 * Class ProductRegistrationForm
 * @package ProductRegistration\Form
 */
class ProductRegistrationForm extends BaseForm
{

    const PHP_DATETIME_FORMAT = "Y-m-d H:i:s";
    const PHP_INTLDATE_FORMAT = "yyyy-MM-dd HH:mm:ss";
    const MOMENT_JS_DATE_FORMAT = "YYYY-MM-DD HH:mm:ss";
    const PHP_DATEONLY_FORMAT = "Y-m-d";
    const PHP_INTLDATEONLY_FORMAT = "yyyy-MM-dd";
    const MOMENT_JS_DATEONLY_FORMAT = "YYYY-MM-DD";

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'product_registration_form';
    }

    /**
     * Validate a field only if serial number is unique
     *
     * @param string                    $value
     * @param ExecutionContextInterface $context
     */
    public function checkSerialNumber($value, ExecutionContextInterface $context)
    {
        $serialNumber = ProductRegistrationQuery::create()->findOneBySerialNumber($value);
        if ($serialNumber) {
            $context->addViolation(Translator::getInstance()->trans(
                "This serial number %serialNumber already exists.",
                array(
                    '%serialNumber' => $value
                ),
                ProductRegistration::DOMAIN_NAME));
        }
    }

    /**
     *
     * in this function you add all the fields you need for your Form.
     * Form this you have to call add method on $this->formBuilder attribute :
     *
     * $this->formBuilder->add("name", "text")
     *   ->add("email", "email", array(
     *           "attr" => array(
     *               "class" => "field"
     *           ),
     *           "label" => "email",
     *           "constraints" => array(
     *               new \Symfony\Component\Validator\Constraints\NotBlank()
     *           )
     *       )
     *   )
     *   ->add('age', 'integer');
     *
     * @return null
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'transceiver_id',
                'integer',
                array(
                    'constraints' => array(
                        new Constraints\NotBlank()
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Transceiver',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'transceiver_id'
                    )
                )
            )
            ->add(
                'antenna_id',
                'integer',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => false,
                    'label' => Translator::getInstance()->trans(
                        'Antenna',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'antenna_id'
                    )
                )
            )
            ->add(
                'serial_number',
                'text',
                array(
                    'constraints' => array(
                        new Constraints\Callback(array("methods" => array(
                            array($this, "checkSerialNumber")
                        )))
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Serial number',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'serial_number'
                    )
                )
            )
            ->add(
                'date_purchase',
                'date',
                array(
                    "constraints" => array(
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Date purchase',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'date_purchase',
                        "php_datetime_format" => static::PHP_DATEONLY_FORMAT,
                        "moment_js_date_format" => static::MOMENT_JS_DATEONLY_FORMAT,
                    ),
                    "widget" => "single_text",
                    "format" => static::PHP_INTLDATEONLY_FORMAT,
                )
            )
            ->add(
                'where_purchase',
                'text',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => false,
                    'label' => Translator::getInstance()->trans(
                        'Where purchase',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'where_purchase'
                    )
                )
            )
            ->add(
                'other_antenna',
                'text',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => false,
                    'label' => Translator::getInstance()->trans(
                        'other antenna',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'other_antenna'
                    )
                )
            )
        ;
    }
}
