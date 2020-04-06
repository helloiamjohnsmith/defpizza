<?php


namespace App\Actions;


use App\Models\Pizza;
use App\Models\PizzaType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DeterminePizzaType
{
    public function run()
    {
        $vegetarianType = PizzaType::where('slug', 'vegetarian')->first();
        $newType = PizzaType::where('slug', 'new')->first();
        $spicyType = PizzaType::where('slug', 'spicy')->first();
        $forKidsType = PizzaType::where('slug', 'for-kids')->first();
        $healthyType = PizzaType::where('slug', 'healthy')->first();
        $seaFoodType = PizzaType::where('slug', 'sea-food')->first();
        $dietType = PizzaType::where('slug', 'diet')->first();

        $this->truncateCurrentPizzaTypes();

        $vegetarianPizzas = $this->determineVegetarianPizzas();
        foreach ($vegetarianPizzas as $pizza) {
            $pizza->types()->attach($vegetarianType->id);
        }

        $newPizzas = $this->determineNewPizzas();
        foreach ($newPizzas as $pizza) {
            $pizza->types()->attach($newType->id);
        }

        $spicyPizzas = $this->determineSpicyPizzas();
        foreach ($spicyPizzas as $pizza) {
            $pizza->types()->attach($spicyType->id);
        }

        $pizzasForKids = $this->determinePizzaForKids();
        foreach ($pizzasForKids as $pizza) {
            $pizza->types()->attach($forKidsType->id);
        }

        $healthyPizzas = $this->determineHealthyPizzas();
        foreach ($healthyPizzas as $pizza) {
            $pizza->types()->attach($healthyType->id);
        }

        $seaFoodPizzas = $this->determineSeaFoodPizzas();
        foreach ($seaFoodPizzas as $pizza) {
            $pizza->types()->attach($seaFoodType->id);
        }

        $dietPizzas = $this->determineDietPizzas();
        foreach ($dietPizzas as $pizza) {
            $pizza->types()->attach($dietType->id);
        }

    }

    private function truncateCurrentPizzaTypes()
    {
        DB::statement('TRUNCATE TABLE current_pizza_types');
    }

    private function determineVegetarianPizzas()
    {
        $query = "
            SELECT p.*
            FROM pizzas p
                 INNER JOIN pizza_ingredients pi on p.id = pi.pizza_id AND p.deleted_at IS NULL
                 INNER JOIN ingredients i on pi.ingredient_id = i.id
            GROUP BY 1
            HAVING count(i.id) = sum(i.vegetarian)
        ";

        return Pizza::fromQuery($query);
    }

    private function determineNewPizzas()
    {
        // As all pizza created at the same time we will limit it to 5 positions
        return Pizza::where('created_at', '>=', Carbon::now()->subDays(30))->orderBy('id')->limit(5)->get();
    }

    private function determineSpicyPizzas()
    {
        $query = "
            SELECT p.*,  max(i.spicy) AS spicy_rate
            FROM pizzas p
                 INNER JOIN pizza_ingredients pi on p.id = pi.pizza_id AND p.deleted_at IS NULL
                 INNER JOIN ingredients i on pi.ingredient_id = i.id
            GROUP BY 1
            HAVING sum(i.spicy) > 0
        ";

        return Pizza::fromQuery($query);
    }

    private function determinePizzaForKids()
    {
        $query = "
            SELECT p.*
            FROM pizzas p
                 INNER JOIN pizza_ingredients pi on p.id = pi.pizza_id AND p.deleted_at IS NULL
                 INNER JOIN ingredients i on pi.ingredient_id = i.id
            GROUP BY 1
            HAVING count(i.id) = sum(i.for_kids)
        ";

        return Pizza::fromQuery($query);
    }

    private function determineHealthyPizzas()
    {
        $query = "
            SELECT p.*
            FROM pizzas p
                 INNER JOIN pizza_ingredients pi on p.id = pi.pizza_id AND p.deleted_at IS NULL
                 INNER JOIN ingredients i on pi.ingredient_id = i.id
            GROUP BY 1
            HAVING count(i.id) = sum(i.healthy)
        ";

        return Pizza::fromQuery($query);
    }

    private function determineSeaFoodPizzas()
    {
        $query = "
            SELECT p.*
            FROM pizzas p
                 INNER JOIN pizza_ingredients pi on p.id = pi.pizza_id AND p.deleted_at IS NULL
                 INNER JOIN ingredients i on pi.ingredient_id = i.id
            GROUP BY 1
            HAVING sum(i.sea) > 0
        ";

        return Pizza::fromQuery($query);
    }

    private function determineDietPizzas()
    {
        return Pizza::where('energy', '<', 220)->where('fat', '<', 15)->get();
    }

}
