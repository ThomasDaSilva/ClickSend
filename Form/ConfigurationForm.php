<?php

namespace ClickSend\Form;

use ClickSend\ClickSend;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class ConfigurationForm extends BaseForm
{
    protected function buildForm(): void
    {
        $translator = Translator::getInstance();

        $this->formBuilder
            ->add("api_username", TextType::class, [
                "label" => $translator?->trans("Api username", [], ClickSend::DOMAIN_NAME),
                "required" => true,
                "constraints" => [
                    new NotBlank()
                ],
                "data" => ClickSend::getConfigValue(ClickSend::API_USERNAME_CONFIG_KEY)
            ])
            ->add("api_key", TextType::class, [
                "label" => $translator?->trans("Api key", [], ClickSend::DOMAIN_NAME),
                "required" => true,
                "constraints" => [
                    new NotBlank()
                ],
                "data" => ClickSend::getConfigValue(ClickSend::API_KEY_CONFIG_KEY)
            ])
        ;
    }
}