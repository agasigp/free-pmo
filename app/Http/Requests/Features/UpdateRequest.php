<?php

namespace App\Http\Requests\Features;

use App\Entities\Projects\Project;
use App\Http\Requests\Request;

class UpdateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$project = Project::findOrFail($this->get('project_id'));
		return auth()->user()->can('manage_features', $project);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:60',
			'worker_id' => 'required|numeric',
			'price' => 'required',
			'description' => 'max:255',
		];
	}

}
