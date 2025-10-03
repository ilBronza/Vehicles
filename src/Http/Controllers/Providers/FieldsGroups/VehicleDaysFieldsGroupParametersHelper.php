<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use Carbon\Carbon;
use IlBronza\Datatables\Providers\FieldsGroupsMergerHelper;
use IlBronza\Operators\Models\WorkingDay;

class VehicleDaysFieldsGroupParametersHelper
{
	static function getCalendarFieldsGroupsByDates(string $parametersFileName, Carbon $startsAt, Carbon $endsAt)
	{
		$helper = new FieldsGroupsMergerHelper();

		$helper->addFieldsGroupParameters($parametersFileName::getFieldsGroup());

		$formParameters = static::getFieldsParametersByDates($startsAt, $endsAt);

		$helper->addFieldsGroupParameters(
			$formParameters
		);

		$helper->moveFieldToEnd('mySelfDelete');

		return $helper->getMergedFieldsGroups();
	}

	static function getFieldsParametersByDates(Carbon $startsAt, Carbon $endsAt)
	{
		$fields = [];

		$date = $startsAt->copy();

		$list = WorkingDay::gpc()::getVehiclesWorkingDaySelectArray();

		while ($date->lte($endsAt))
		{
			$day = $date->format('Y-m-d');

			$partOfTheDay = 'all';

			$fields["mySelf{$day}_{$partOfTheDay}"] = [
				'type' => 'utilities.view',
				'tDHtmlClasses' => ['workingdayselector'],
				'width' => '25px',
				'headerHtmlClasses' => ['dayheader'],
				'translatedName' => $date->translatedFormat('D') . ' ' . $date->format('d'),
				'viewName' => 'days._typeSelectSingle',
				'viewParameters' => [
					'day' => $day,
					'partOfTheDay' => $partOfTheDay,
					'list' => $list,
				],
				'viewParametersGetter' => 'getWorkingDaysDatatableFieldParameters'
			];

			$date->addDays(1);
		}

		return [
			'fields' => $fields
		];
	}
}