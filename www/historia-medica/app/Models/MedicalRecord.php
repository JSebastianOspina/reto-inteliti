<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalRecord
 *
 * @property int $id
 * @property string $name
 * @property string $birthDate
 * @property string $gender
 * @property int $height
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MedicalRecordFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalRecord whereWeight($value)
 * @mixin \Eloquent
 */
class MedicalRecord extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function getMessage(): string
    {
        if ($this->getAge() < 18) {
            return $this->getUnderEighteenMessage();
        }
        return $this->getOverEighteenMessage();

    }

    public function getAge(): int
    {
        $now = Carbon::now();
        return (new Carbon($this->birthDate))->diffInYears($now);
    }

    private function getUnderEighteenMessage(): string
    {
        return "Hola $this->name eres " . ($this->gender === 'masculino' ? 'un' : 'una')
            . " joven muy saludable, te recomiendo salir a jugar al aire libre durante " .
            $this->getPlayHours() . " horas diarias";
    }

    private function getOverEighteenMessage(): string
    {
        return "Hola $this->name eres una persona muy saludable, te recomiendo comer "
            . ($this->weight >= 30 ? 'mas' : 'menos') . " y salir a correr "
            . $this->getRunDistance() . " km diarios";
    }

    private function getRunDistance(): string
    {
        $birthDate = new Carbon($this->birthDate);
        $birthYear = $birthDate->year;
        $lastTwoDigits = substr($birthYear, -2);
        return number_format(sqrt($lastTwoDigits), 2);
    }

    private function getPlayHours(): int
    {
        //Get the first 4 Fibonacci's numbers (the 4th corresponds to someone near to 300CM tall)
        $MAXIMUM_FIBONACCI_NUMBER = 4;
        $fibonacci = $this->fibonacci($MAXIMUM_FIBONACCI_NUMBER);

        //Arbitrary number to establish a high difference start point.
        $lowerDifference = 999;
        $finalNumber = 0;
        foreach ($fibonacci as $number) {
            $TempDifference = abs(($this->height / 100) - $number);
            if ($TempDifference < $lowerDifference) {
                $lowerDifference = $TempDifference;
                $finalNumber = $number;
            }
        }
        return $finalNumber;
        //iterate over the whole sequence
    }

    private function fibonacci($number): array
    {
        //First two series number
        $fibonacci = [0, 1];

        for ($i = 2; $i <= $number; $i++) {
            //The actual Fibonacci Sequence is the sum of the last two numbers.
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
        return $fibonacci;
    }
}
