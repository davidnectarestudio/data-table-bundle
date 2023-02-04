<?php

declare(strict_types=1);

namespace Kreyu\Bundle\DataTableBundle\Personalization\Form\Type;

use Kreyu\Bundle\DataTableBundle\DataTableInterface;
use Kreyu\Bundle\DataTableBundle\Personalization\PersonalizationColumnData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalizationColumnDataType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $columns = $options['data_table']->getConfig()->getColumns();
        $columnName = $view->vars['name'];

        if (!array_key_exists($columnName, $columns)) {
            throw new \InvalidArgumentException("Column $columnName does not exist in the data table");
        }

        $view->vars['column'] = $columns[$columnName]->createView();
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('order', HiddenType::class)
            ->add('visible', HiddenType::class, [
                'getter' => fn (PersonalizationColumnData $column) => (int) $column->isVisible(),
                'setter' => fn (PersonalizationColumnData $column, mixed $value) => $column->setVisible((bool) $value),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', PersonalizationColumnData::class);

        $resolver->setRequired('data_table');
        $resolver->setAllowedTypes('data_table', DataTableInterface::class);
    }

    public function getBlockPrefix(): string
    {
        return 'kreyu_data_table_personalization_column';
    }
}
