<?php

namespace Pyz\Zed\Faq\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Generated\Shared\Transfer\FaqTransfer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class FaqForm extends AbstractType
{
    public const BUTTON_SUBMIT = "Submit";

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'faq';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => FaqTransfer::class
        ]);
    }

    private const FIELD_NAME = 'name';
    private const FIELD_ANSWER = 'answer';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)
            ->addAnswerField($builder)
            ->addSubmitButton($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addNameField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_NAME, TextType::class,
            [
        'constraints' => [
        new NotBlank()
    ]
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addAnswerField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_ANSWER, TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 25,
                        'minMessage' => 'Answer minimum length is at least {{ limit }}'
                    ])
                    ]
                ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addSubmitButton(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }


}
