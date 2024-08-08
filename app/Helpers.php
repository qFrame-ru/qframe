<?php namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * Получить id модели из модели/числа
 *
 * @param int|Model $model
 * @return int
 */
function get_model_id(int|Model $model):int {
	return is_int($model)
		? $model
		: $model->id;
}

/**
 * Получить модель по id
 *
 * @param int|Model $id
 * @param string $className
 * @return Model
 */
function get_model(int|Model $id, string $className):Model {
	return is_int($id)
		? $className::find($id)
		: $id;
}
