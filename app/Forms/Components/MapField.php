<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class MapField extends Field
{
    protected string $view = 'forms.components.map-field';

    protected string $latitudeField = '';
    protected string $longitudeField = '';

    public function latitudeField(string $fieldName): static
    {
        $this->latitudeField = $fieldName;
        return $this;
    }

    public function longitudeField(string $fieldName): static
    {
        $this->longitudeField = $fieldName;
        return $this;
    }

    public function getLatitudeField(): ?string
    {
        return $this->latitudeField;
    }

    public function getLongitudeField(): ?string
    {
        return $this->longitudeField;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false);
    }
}
