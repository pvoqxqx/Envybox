<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackForm
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $message
 */
class FeedbackForm extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $id;
}
