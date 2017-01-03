<?php

use Faker\Factory as Faker;
use App\Models\menus;
use App\Repositories\menusRepository;

trait MakemenusTrait
{
    /**
     * Create fake instance of menus and save it in database
     *
     * @param array $menusFields
     * @return menus
     */
    public function makemenus($menusFields = [])
    {
        /** @var menusRepository $menusRepo */
        $menusRepo = App::make(menusRepository::class);
        $theme = $this->fakemenusData($menusFields);
        return $menusRepo->create($theme);
    }

    /**
     * Get fake instance of menus
     *
     * @param array $menusFields
     * @return menus
     */
    public function fakemenus($menusFields = [])
    {
        return new menus($this->fakemenusData($menusFields));
    }

    /**
     * Get fake data of menus
     *
     * @param array $postFields
     * @return array
     */
    public function fakemenusData($menusFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'abc' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $menusFields);
    }
}
