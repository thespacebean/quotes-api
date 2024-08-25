<?php

namespace App\DataSource;

use App\Traits\PaginatesTrait;
use Illuminate\Support\Collection;

class LoremIpsumDataSource implements DataSourceInterface
{
    use PaginatesTrait;

    public function getAll(): Collection
    {
        return collect([
            "Morbi non vestibulum nisl. Mauris lectus velit, bibendum ac mi.",
            "Quisque dolor quam, ultricies et dictum et, condimentum at eros.",
            "Vestibulum auctor placerat nibh, non dapibus arcu iaculis vitae. Vivamus.",
            "Nullam non lacus ut tortor vestibulum finibus ornare non lacus.",
            "In nec accumsan dolor, at elementum enim. Praesent hendrerit justo.",
            "Pellentesque elementum urna vel libero tristique, ut pellentesque purus consectetur.",
            "Proin venenatis felis eu ipsum imperdiet iaculis id eget mi.",
            "Cras tempor dolor auctor, hendrerit enim sit amet, hendrerit diam.",
            "Vestibulum eu diam sit amet risus tincidunt luctus id suscipit ligula.",
            "Duis congue risus sit amet ultricies sollicitudin.",
            "Fusce rutrum nibh eget orci aliquet iaculis.",
            "Cras vitae nulla interdum, maximus enim quis, tincidunt enim.",
            "Proin dignissim nisl ut metus maximus, non tincidunt tortor dignissim.",
            "Curabitur bibendum diam sed sollicitudin ultricies.",
            "Phasellus non urna posuere, faucibus odio in, consequat tortor.",
            "Nam nec diam non dolor vehicula convallis.",
            "Donec fringilla magna tempus neque venenatis tempor non luctus risus.",
            "Etiam feugiat lacus sit amet volutpat semper.",
            "Donec mattis magna fermentum arcu condimentum, ut pharetra velit iaculis.",
            "Praesent elementum augue et enim tincidunt pulvinar.",
            "Nam non velit sed urna fringilla iaculis.",
            "Sed quis lacus pellentesque, pellentesque mi nec, pharetra elit.",
            "Nam consectetur eros ut feugiat feugiat.",
            "Phasellus varius nulla elementum ullamcorper cursus.",
            "Vivamus faucibus neque et tortor iaculis dictum.",
            "Duis sodales sapien eget consequat tincidunt.",
            "Quisque semper justo nec justo fermentum facilisis.",
            "Nullam bibendum nisl a erat malesuada, elementum semper massa lobortis.",
            "Proin sit amet odio id est aliquet iaculis.",
            "Nulla sed dolor non elit tempus laoreet dictum non libero.",
            "Proin placerat massa non nisi sollicitudin, sit amet faucibus tellus facilisis.",
            "Pellentesque molestie elit in dignissim bibendum.",
            "Nam pretium felis sed nunc consectetur, at consequat dolor faucibus.",
            "Pellentesque rutrum sem ut lorem laoreet, porta vulputate mauris blandit.",
            "Maecenas et nisi vel ligula fermentum dictum.",
            "Duis pellentesque tortor ut magna iaculis, ut iaculis metus gravida.",
            "Praesent ultricies lectus maximus bibendum sagittis.",
            "Pellentesque consectetur felis sed augue ultrices, in hendrerit velit aliquet.",
            "Phasellus sit amet diam vel felis sollicitudin blandit ac at nunc.",
            "Duis sit amet ligula porta, sagittis dui non, tempor risus.",
            "Donec vel libero tempor, scelerisque metus ac, suscipit massa.",
            "Phasellus pharetra ante sit amet maximus euismod.",
            "In id lacus eu magna convallis efficitur sit amet eu urna.",
            "Mauris a dolor condimentum, finibus odio nec, iaculis sapien.",
            "Cras vestibulum nunc id eros faucibus lacinia.",
            "Aenean auctor nunc et metus consequat porttitor.",
            "Morbi vulputate lacus quis leo vulputate congue.",
        ])->shuffle();
    }

    public function getRandom(?int $count = 5): Collection
    {
        return $this->getAll()->random($count);
    }

    public function paginate(): Collection
    {
        return $this->paginateCollection($this->getAll());
    }

    public function getPaginationInfo(): array
    {
        return $this->buildAdditionalInfoArray($this->getAll());
    }
}
