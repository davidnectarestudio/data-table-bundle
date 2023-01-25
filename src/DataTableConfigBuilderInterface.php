<?php

declare(strict_types=1);

namespace Kreyu\Bundle\DataTableBundle;

use Kreyu\Bundle\DataTableBundle\Column\ColumnFactoryInterface;
use Kreyu\Bundle\DataTableBundle\Column\Type\ColumnTypeInterface;
use Kreyu\Bundle\DataTableBundle\Filter\FilterFactoryInterface;
use Kreyu\Bundle\DataTableBundle\Filter\Type\FilterTypeInterface;
use Kreyu\Bundle\DataTableBundle\Persistence\PersistenceAdapterInterface;
use Kreyu\Bundle\DataTableBundle\Persistence\PersistenceSubjectInterface;
use Kreyu\Bundle\DataTableBundle\Request\RequestHandlerInterface;
use Kreyu\Bundle\DataTableBundle\Type\ResolvedDataTableTypeInterface;
use Symfony\Component\Form\FormFactoryInterface;

interface DataTableConfigBuilderInterface extends DataTableConfigInterface
{
    public function setName(string $name): static;

    public function setType(ResolvedDataTableTypeInterface $type): void;

    public function setOptions(array $options): static;

    /**
     * @param class-string<ColumnTypeInterface> $type
     */
    public function addColumn(string $name, string $type, array $options = []): static;

    public function removeColumn(string $name): static;

    public function getColumnFactory(): ColumnFactoryInterface;

    public function setColumnFactory(ColumnFactoryInterface $columnFactory): static;

    /**
     * @param class-string<FilterTypeInterface> $type
     */
    public function addFilter(string $name, string $type, array $options = []): static;

    public function removeFilter(string $name): static;

    public function getFilterFactory(): FilterFactoryInterface;

    public function setFilterFactory(FilterFactoryInterface $filterFactory): static;

    public function setPersonalizationEnabled(bool $personalizationEnabled): static;

    public function setPersonalizationPersistenceEnabled(bool $personalizationPersistenceEnabled): static;

    public function setPersonalizationPersistenceAdapter(?PersistenceAdapterInterface $personalizationPersistenceAdapter): static;

    public function setPersonalizationPersistenceSubject(?PersistenceSubjectInterface $personalizationPersistenceSubject): static;

    public function setPersonalizationFormFactory(?FormFactoryInterface $personalizationFormFactory): static;

    public function setFiltrationEnabled(bool $filtrationEnabled): static;

    public function setFiltrationPersistenceEnabled(bool $filtrationPersistenceEnabled): static;

    public function setFiltrationPersistenceAdapter(?PersistenceAdapterInterface $filtrationPersistenceAdapter): static;

    public function setFiltrationPersistenceSubject(?PersistenceSubjectInterface $filtrationPersistenceSubject): static;

    public function setFiltrationFormFactory(?FormFactoryInterface $filtrationFormFactory): static;

    public function setSortingEnabled(bool $sortingEnabled): static;

    public function setSortingPersistenceEnabled(bool $sortingPersistenceEnabled): static;

    public function setSortingPersistenceAdapter(?PersistenceAdapterInterface $sortingPersistenceAdapter): static;

    public function setSortingPersistenceSubject(?PersistenceSubjectInterface $sortingPersistenceSubject): static;

    public function setPaginationEnabled(bool $paginationEnabled): static;

    public function setPaginationPersistenceEnabled(bool $paginationPersistenceEnabled): static;

    public function setPaginationPersistenceAdapter(?PersistenceAdapterInterface $paginationPersistenceAdapter): static;

    public function setPaginationPersistenceSubject(?PersistenceSubjectInterface $paginationPersistenceSubject): static;

    public function setRequestHandler(?RequestHandlerInterface $requestHandler): static;

    public function getDataTableConfig(): DataTableConfigInterface;
}
