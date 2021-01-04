<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('history')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function history()
    {
        return new App\Modules\History\Repositories\HistoryRepository;
    }
}

if (! function_exists('date_converter')) {
	function date_converter()
	{
		return new App\Modules\Admin\Entities\DateConverter;
	}
}

if (! function_exists('projectSetting')) {
    function projectSetting()
    {
        return \App\Modules\Setting\Entities\Setting::find(1);
    }
}
