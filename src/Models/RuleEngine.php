<?php

namespace Samsin33\DecisionEngine\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
use Samsin33\DecisionEngine\DecisionEngine;

class RuleEngine extends Model
{
    /**
     * @var MessageBag|null $errors
     */
    private ?MessageBag $errors = null;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rule_engines';

    /**
     *
     * @var array<string>
     */
    protected $fillable = ['created_by', 'name', 'type', 'validation', 'business_rules', 'status'];

    /**
     *
     * @var array<string>
     */
    protected $visible = ['id', 'created_by', 'name', 'type', 'validation', 'business_rules', 'status', 'created_at', 'updated_at'];

    protected static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub

        self::creating(function ($rule_engine) {
            $rule_engine->created_by = Auth::user()->id ?? null;
            $rule_engine->status = 0;
            $rule_engine->ipaddress = request()->ip();
        });

        self::saving(function ($rule_engine) {
            $validates = Validator::make($rule_engine->getAttributes(), $rule_engine->getValidationRules());
            if ($validates->fails()) {
                $rule_engine->errors = $validates->errors();
                return false;
            }
            return $rule_engine;
        });
    }

    //--------------------- Validations --------------------------------

    /**
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:150', 'alpha_dash'],
            'type' => ['required', Rule::in(array_keys(config('decision-engine.types')))],
            'validation' => ['nullable',
                Rule::requiredIf(function () {
                    return $this->status == 1;
                }),
            ],
            'business_rules' => ['nullable',
                Rule::requiredIf(function () {
                    return $this->status == 1;
                }),
            ],
            'status' => ['required', 'integer', Rule::in([0, 1])],
        ];
    }

    /**
     * @return MessageBag
     */
    public function getErrors(): MessageBag
    {
        return $this->errors ?? new MessageBag();
    }

    //--------------------- Relationships ------------------------------

    /**
     *
     * @return HasMany
     */
    public function ruleExecutions(): HasMany
    {
        return $this->hasMany(DecisionEngine::$ruleExecutionModel, 'rule_engine_id', 'id');
    }
}
